#!/bin/sh

## Part of CodeIgniter Composer Installer
##
## @author     Kenji Suzuki <https://github.com/sabri-elgueder>
## @license    MIT License
## @copyright  2017 Sabri El Gueder
## @link       https://github.com/sabri-elgueder/codeigniter-composer

cd `dirname $0`/..

php -S 127.0.0.1:8000 -t public/ bin/router.php
