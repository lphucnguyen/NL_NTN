#! /bin/bash -l

php artisan queue:work --tries=3 --once