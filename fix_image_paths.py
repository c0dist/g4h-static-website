#!/usr/bin/env python3

import os
from glob import glob

from bs4 import BeautifulSoup

BASE_DIR = "/home/c0dist/dev/g4h-website-work/html/garage4hackers.com"


def fix_img_tags(html_content):
    # Using 'html5lib' parser instead of 'html.parser' due to unknown issue breaking resulting html
    try:
        soup = BeautifulSoup(html_content, "html5lib")
    except Exception as e:
        print(f"[-] Failed to parse HTML file. {e}")
        return None

    # Finding all <img> tags
    all_img_tags = soup.find_all("img")
    print(f"[+] Found {len(all_img_tags)} img tags.")

    for img_tag in all_img_tags:
        # Finding exisiting image src.
        img_src = img_tag.get("src")
        print(f"\n[+] Processing {img_src}")

        if img_src:
            # A lot of image URLs have GET parameters, "attachment00bb.jpg?attachmentid=822&cid=18&thumb=1&stc=1".
            # Ideally we would want to preserve them. There, we extract and store the file name and URL params
            # separately. We add the URL params part later on.
            url_params = None
            img_src_parts = img_src.split("?", 1)
            image_path = img_src_parts[0]

            # We only process the image tags where file name ends with ".html"
            if image_path.endswith(".html"):
                if len(img_src_parts) == 2:
                    url_params = "?".join(img_src_parts[1:])

                print(f"[+] Image path is {image_path}.")
                # We separate file path and file extension.
                path, ext = image_path.split(".", 1)

                # To find the file in our file system, we make the file path absolute without extension
                # and then add '.*' at the end to search using glob pattern.
                partial_path_pattern = os.path.join(BASE_DIR, path) + ".*"
                possible_imgs = glob(partial_path_pattern)

                if possible_imgs:
                    # Observed that lot of image files have a .tmp file too which is caught
                    # when we find files using glob pattern, hence below code to remove that.
                    for idx, img in enumerate(possible_imgs):
                        if img.endswith(".tmp"):
                            possible_imgs.pop(idx)

                    # After all is done, only one image path should exist in this list
                    if len(possible_imgs) == 1:
                        # We remove the BASE_DIR path to make image path relative again
                        fixed_img_src = possible_imgs[0].replace(BASE_DIR, "")
                        # Then if there were URL params, we add those again
                        if url_params:
                            fixed_img_src = "?".join([img_src, url_params])

                        # If the original path didn't start with a "/", we remove it from our fixed path too, if needed.
                        # We also do it vice-versa
                        if not img_src.startswith("/"):
                            if fixed_img_src.startswith("/"):
                                fixed_img_src = fixed_img_src[1:]
                        else:
                            if not fixed_img_src.startswith("/"):
                                fixed_img_src = "/" + fixed_img_src

                        # Update the fixed source in <img> tag.
                        img_tag["src"] = fixed_img_src
                        print(f'[+] Fixed image: {img_tag["src"]}')
                else:
                    print("[-] No possible images found for this img in local system.")
            else:
                print(f"[+] {image_path}: path is possibly already correct.")

    # Returning the fixed HTML source in str form.
    return str(soup)


def get_html_files():
    for root, dirs, files in os.walk(BASE_DIR):
        for file in files:
            if file.endswith(".html"):
                yield os.path.join(root, file)


def main():
    for full_path in get_html_files():
        print(f"[+] Processing: {full_path}")
        with open(full_path, "rb") as fp:
            html_content = fp.read()

        fixed_html_content = fix_img_tags(html_content)

        if fixed_html_content:
            # Writing the fixed content back to original file.
            print("[+] Writing the file.")
            with open(full_path, "w") as fp:
                fp.write(fixed_html_content)


if __name__ == "__main__":
    main()
