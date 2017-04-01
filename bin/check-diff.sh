#!/bin/sh

## Part of CodeIgniter Composer Installer
##
## @author     Kenji Suzuki <https://github.com/sabri-elgueder>
## @license    MIT License
## @copyright  2017 Sabri El Gueder
## @link       https://github.com/sabri-elgueder/codeigniter-composer

cd `dirname $0`
cd ..

diff -urN vendor/codeigniter/framework/application application
diff -u vendor/codeigniter/framework/index.php public/index.php
