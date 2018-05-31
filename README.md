# Ahmedabad Showcase API
This repository contains the docker containers for the Ahmedabad Showcase API. Call the API using the IP addresses specified in the .env or the Dockerfile.

In order to start the API,
- Start cmd and enter `docker-compose up -d`
- Read the logs using `docker-compose logs -f php`, if you see a line saying `fpm is running`, the API-Platform has started successfully.

To shut down the API:
- Start cmd and enter `docker-compose down`

The *scripts* folder contains the CRON script as well as the script to call Google Places API to fill the database with places.
