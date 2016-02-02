#!/bin/bash

./vendor/bin/jane-openapi generate swagger.json 'Customerio\API' generated
./vendor/bin/php-cs-fixer fix --config .php_cs