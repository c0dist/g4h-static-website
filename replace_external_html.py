#!/usr/bin/env python3

# Command used to find external.html URLs:
# grep -irEo '"\.\./external\.html\?link=(http|https)://[a-zA-Z0-9./?=_-]*"'

import os
import subprocess
import fileinput

BASE_DIR = "/home/c0dist/dev/g4h-website-work/html/garage4hackers.com"


def get_external_html_urls(file_name, combined_list_file):
    grep_pattern = f"^{file_name}:"
    print(grep_pattern)
    output = subprocess.check_output(["grep", grep_pattern, combined_list_file])
    if output:
        return [url.split(":", 1)[1] for url in output.decode().split("\n") if url.strip()]


def main(html_files_list, combined_list_file):
    g4h_urls = set()
    with open(html_files_list) as fp:
        for file_name in fp:
            file_name = file_name.strip()
            full_path = os.path.join(BASE_DIR, file_name)
            print(f"[+] Processing {full_path}")
            all_external_urls = get_external_html_urls(
                file_name,
                combined_list_file
            )

            with open(full_path) as fh:
                data = fh.read()
                for external_url in all_external_urls:
                    print(external_url)
                    url_part = external_url.replace('"../external.html?link=', '"')
                    print(url_part)

                    replacement_url = url_part

                    if "garage4hackers.com/" in url_part:
                        g4h_urls.add(url_part)
                        continue

                    elif "glowhost.com/" in url_part:
                        replacement_url = "#"

                    data = data.replace(url_part, replacement_url)

                with open(full_path, "w") as out:
                    out.write(data)

    print(g4h_urls)


if __name__ == "__main__":
    main("external_html_file_list.txt", "external_html.txt")
