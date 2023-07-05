#!/bin/bash

set -e

composer install --no-scripts --no-interaction --classmap-authoritative

exec "$@"