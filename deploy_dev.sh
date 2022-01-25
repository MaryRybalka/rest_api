#!/bin/bash

git push
ssh ubuntu@138.2.41.169 "cd /var/www/rest_api_dev; bash build.sh"