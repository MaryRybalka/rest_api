#!/bin/bash

git push
ssh ubuntu@140.83.58.44 "cd /var/www/rest_api_prod; bash build.sh"