<?php
/**
 * Part of CodeIgniter Composer Installer
 *
 * @author     Sabri El Gueder <https://github.com/sabri-elgueder>
 * @license    MIT License
 * @copyright  2017 Sabri El Gueder
 * @link       https://github.com/sabri-elgueder/codeigniter-composer
 */

namespace satoripophq\CodeIgniter;

use Composer\Script\Event;

class Installer
{
    const DOCROOT = 'public';

    /**
     * Composer post install script
     *
     * @param Event $event
     */
    public static function postInstall(Event $event = null)
    {
        // Copy CodeIgniter files
        self::recursiveCopy('vendor/codeigniter/framework/application', 'application');
        mkdir(static::DOCROOT, 0755);
        copy('vendor/codeigniter/framework/index.php', static::DOCROOT . '/index.php');
        copy('dot.htaccess', static::DOCROOT . '/.htaccess');
        copy('src/favicon.ico', static::DOCROOT . '/favicon.ico');
        copy('src/robots.txt', static::DOCROOT . '/robots.txt');
        copy('src/tools_helper.php', 'application/helpers/tools_helper.php');
        copy('vendor/codeigniter/framework/.gitignore', '.gitignore');

        // Fix paths in index.php
        $file = static::DOCROOT . '/index.php';
        $contents = file_get_contents($file);
        $contents = str_replace(
            '$system_path = \'system\';',
            '$system_path = \'../vendor/codeigniter/framework/system\';',
            $contents
        );
        $contents = str_replace(
            '$application_folder = \'application\';',
            '$application_folder = \'../application\';',
            $contents
        );
        file_put_contents($file, $contents);

        // Enable Composer Autoloader
        $file = 'application/config/config.php';
        $contents = file_get_contents($file);
        $contents = str_replace(
            '$config[\'composer_autoload\'] = FALSE;',
            '$config[\'composer_autoload\'] = realpath(APPPATH . \'../vendor/autoload.php\');',
            $contents
        );


        // Set 'base_url' HTTP_HOST
        $contents = str_replace(
            '$config[\'base_url\'] = \'\';',
            'if (! empty($_SERVER[\'HTTPS\'])){
                $config[\'base_url\'] = \'https://\' . $_SERVER[\'HTTP_HOST\'];
            } else {
                $config[\'base_url\'] = \'http://\' . $_SERVER[\'HTTP_HOST\'];
            }',
            $contents
        );

        // Set 'index_page' blank
        $contents = str_replace(
            '$config[\'index_page\'] = \'index.php\';',
            '$config[\'index_page\'] = \'\';',
            $contents
        );

        // Set 'subclass_prefix' SP_
        $contents = str_replace(
            '$config[\'subclass_prefix\'] = \'MY_\';',
            '$config[\'subclass_prefix\'] = \'SP_\';',
            $contents
        );
        file_put_contents($file, $contents);


        // Enable helper tools
        $file = 'application/config/autoload.php';
        $contents = file_get_contents($file);
        $contents = str_replace(
            '$autoload[\'helper\'] = array();',
            '$autoload[\'helper\'] = array(\'tools\');',
            $contents
        );
        file_put_contents($file, $contents);


        // Change welcome message
        $file = 'application/Views/welcome_message.php';
        $file2 = 'src/welcome.php';
        $contents = file_get_contents($file2);
        file_put_contents($file, $contents);


        // Update composer.json
        copy('composer.json.dist', 'composer.json');

        // Run composer update
        self::composerUpdate();

        // Show message
        self::showMessage($event);

        // Delete unneeded files
        self::deleteSelf();
    }

    private static function composerUpdate()
    {
        passthru('composer update');
    }

    /**
     * Composer post install script
     *
     * @param Event $event
     */
    private static function showMessage(Event $event = null)
    {
        $io = $event->getIO();
        $io->write('====================================================================================================');
        $io->write(" ");
        $io->write("<info>        _____         _                 _                                                 </info>");
        $io->write("<info>       /  ___|       | |               (_)                                                </info>");
        $io->write("<info>       \ `--.   __ _ | |_   ___   _ __  _  _ __    ___   _ __       ___   ___   _ __ ___  </info>");
        $io->write("<info>        `--. \ / _` || __| / _ \ | '__|| || '_ \  / _ \ | '_ \     / __| / _ \ | '_ ` _ \ </info>");
        $io->write("<info>       /\__/ /| (_| || |_ | (_) || |   | || |_) || (_) || |_) | _ | (__ | (_) || | | | | |</info>");
        $io->write("<info>       \____/  \__,_| \__| \___/ |_|   |_|| .__/  \___/ | .__/ (_) \___| \___/ |_| |_| |_|</info>");
        $io->write("<info>                                          | |           | |                               </info>");
        $io->write("<info>                                          |_|           |_|                               </info>");
        $io->write(" ");
        $io->write("                              generated by Sabri El Gueder (sabri-elgueder@satoripop.com)");
        $io->write(" ");
        $io->write(" ");
        $io->write(
            '<info>`public/.htaccess` was installed. If you don\'t need it, please remove it.</info>'
        );
        $io->write(" ");
        $io->write(
            '<info>If you want to install translations for system messages or some third party libraries,</info>'
        );
        $io->write('$ cd <codeigniter_project_folder>');
        $io->write('$ php bin/install.php');
        $io->write(" ");
        $io->write('<info>Above command will show help message.</info>');
        $io->write('See <https://github.com/sabri-elgueder/codeigniter-composer> for details');
        $io->write(" ");
        $io->write('====================================================================================================');
    }

    private static function deleteSelf()
    {
        unlink(__FILE__);
        unlink('src/favicon.ico');
        unlink('src/robots.txt');
        unlink('src/tools_helper.php');
        unlink('src/welcome.php');
        rmdir('src');
        unlink('composer.json.dist');
        unlink('dot.htaccess');
        unlink('LICENSE.md');
    }

    /**
     * Recursive Copy
     *
     * @param string $src
     * @param string $dst
     */
    private static function recursiveCopy($src, $dst)
    {
        mkdir($dst, 0755);

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($src, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $file) {
            if ($file->isDir()) {
                mkdir($dst . '/' . $iterator->getSubPathName());
            } else {
                copy($file, $dst . '/' . $iterator->getSubPathName());
            }
        }
    }
}
