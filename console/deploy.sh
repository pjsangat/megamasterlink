#!/bin/sh

ENV="$1"

# AVAILABLE ENVIROMENTS:
# 1. prod = Production / Live Environment.
# 2. test001 = Pre-prod / Regression Environment.
# 3. test = Test Environment.
# 4. dev = Dev Environment
if [ "$ENV" != "prod" ] && [ "$ENV" != "test001" ] && [ "$ENV" != "test" ] && [ "$ENV" != "dev" ]; then
    printf "\n\n"
    printf "> UNKNOWN ENV '$ENV'. AVAILABLE ENV: 'prod', 'test001', 'test', or 'dev'."
    printf "\n\n"
    exit 1
fi

# FROM LOCAL
APP_RESOURCES_DIST="/web/gmanetwork/depedtv/resources/dist/"
APP_RESOURCES_IMG="/web/gmanetwork/depedtv/resources/img/"
APP_RESOURCES_WEBFONTS="/web/gmanetwork/depedtv/resources/webfonts/"

# TO AWS S3 SERVICE
S3_BUCKET="s3://dev.gmanetwork.com"
S3_RESOURCES_DIST="depedtv/resources/dist"
S3_RESOURCES_IMG="depedtv/resources/img"
S3_RESOURCES_WEBFONTS="depedtv/resources/webfonts"

if [ "$ENV" = "prod" ]; then
    S3_BUCKET="s3://aphrodite.gmanetwork.com"
fi

if [ "$ENV" = "test001" ]; then
    S3_BUCKET="s3://tdata001.gmanetwork.com"
fi

if [ "$ENV" = "test" ]; then
    S3_BUCKET="s3://test.gmanetwork.com"
fi

printf "\n"
printf "> USING BUCKET: $S3_BUCKET"
printf "\n\n"
printf "> FULL S3 PATH: $S3_BUCKET/$S3_RESOURCES_DIST/"

printf "\n\n"
printf "> SYNCING DIST FOLDER"
printf " FROM $APP_RESOURCES_DIST TO $S3_BUCKET/$S3_RESOURCES_DIST/"

# FOR REGULAR JS
aws s3 sync "$APP_RESOURCES_DIST" "$S3_BUCKET/$S3_RESOURCES_DIST/" --exclude "*" --include "js/*" --exclude "js/*.gz" --cache-control "max-age=120"
# FOR COMPRESSED JS VERSION
aws s3 sync "$APP_RESOURCES_DIST" "$S3_BUCKET/$S3_RESOURCES_DIST/" --exclude "*" --include "js/*.gz" --content-type "text/javascript" --content-encoding gzip --cache-control "max-age=120"

printf "\n\n"
printf "> SYNCING IMG FOLDER"
printf " FROM $APP_RESOURCES_IMG TO $S3_BUCKET/$S3_RESOURCES_IMG/"

# FOR STANDARD FORMAT
aws s3 sync "$APP_RESOURCES_IMG" "$S3_BUCKET/$S3_RESOURCES_IMG/" --include "*" --exclude "*.svg" --cache-control "max-age=31536000"
# FOR SVG FORMAT
aws s3 sync "$APP_RESOURCES_IMG" "$S3_BUCKET/$S3_RESOURCES_IMG/" --exclude "*" --include "*.svg" --content-type "image/svg+xml" --cache-control "max-age=31536000"

printf "\n\n"
printf "> SYNCING WEBFONTS FOLDER"
printf " FROM $APP_RESOURCES_WEBFONTS TO $S3_BUCKET/$S3_RESOURCES_WEBFONTS/"

aws s3 sync "$APP_RESOURCES_WEBFONTS" "$S3_BUCKET/$S3_RESOURCES_WEBFONTS/" --include "*" --cache-control "max-age=31536000" 

printf "\n\n"
