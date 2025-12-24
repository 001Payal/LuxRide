#!/bin/sh
# entrypoint.sh

# Write the FLAG environment variable to the flag.txt file
echo "$FLAG" > /var/www/html/flag.txt

exec "$@"
