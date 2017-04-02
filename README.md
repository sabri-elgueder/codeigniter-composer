# The CodeIgniter framework 3 Composer Installer

[![Latest Stable Version](https://poser.pugx.org/satoripophq/codeigniter-composer/v/stable)](https://packagist.org/packages/satoripophq/codeigniter-composer)
[![Total Downloads](https://poser.pugx.org/satoripophq/codeigniter-composer/downloads)](https://packagist.org/packages/satoripophq/codeigniter-composer)
[![Latest Unstable Version](https://poser.pugx.org/satoripophq/codeigniter-composer/v/unstable)](https://packagist.org/packages/satoripophq/codeigniter-composer)
[![License](https://poser.pugx.org/satoripophq/codeigniter-composer/license)](https://packagist.org/packages/satoripophq/codeigniter-composer)

This package installs the offical [CodeIgniter](https://github.com/bcit-ci/CodeIgniter) (version `3.1.*`) with secure folder structure via Composer.

**Note:** If you want to install CodeIgniter4 (under development), see <https://github.com/sabri-elgueder/codeigniter-composer/tree/4.x>.

You can update CodeIgniter system folder to latest version with one command.

## Folder Structure

```
codeigniter/
├── application/
├── composer.json
├── composer.lock
├── public/
│   ├── .htaccess
│   └── index.php
└── vendor/
    └── codeigniter/
        └── framework/
            └── system/
```

## Requirements

* PHP 5.3.7 or later
* `composer` command (See [Composer Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx))
* Git

## How to Use

### Install CodeIgniter

```
$ composer create-project satoripophq/codeigniter-composer codeigniter
```

Above command installs `public/.htaccess` to remove `index.php` in your URL. If you don't need it, please remove it.

And it changes `application/config/config.php`:

~~~
$config['composer_autoload'] = FALSE;
↓
$config['composer_autoload'] = realpath(APPPATH . '../vendor/autoload.php');
~~~

~~~
$config['index_page'] = 'index.php';
↓
$config['index_page'] = '';
~~~

#### Install Translations for System Messages

If you want to install translations for system messages:

```
$ cd /path/to/codeigniter
$ php bin/install.php translations 3.1.0
```

#### Install Third Party Libraries

[Codeigniter Matches CLI](https://github.com/avenirer/codeigniter-matches-cli):

```
$ php bin/install.php matches-cli master
```

[CodeIgniter HMVC Modules](https://github.com/sabri-elgueder/codeigniter-hmvc-modules):

```
$ php bin/install.php hmvc-modules master
```

[Modular Extensions - HMVC](https://github.com/sabri-elgueder/codeigniter-modular-extensions-hmvc):

```
$ php bin/install.php modular-extensions-hmvc master
```

[CodeIgniter Template Library](https://github.com/jenssegers/codeigniter-template-library):

```
$ php bin/install.php codeigniter-template-library master
```

[Ion Auth](https://github.com/benedmunds/CodeIgniter-Ion-Auth):

```
$ php bin/install.php ion-auth 2
```

[CodeIgniter3 Filename Checker](https://github.com/sabri-elgueder/codeigniter3-filename-checker):

```
$ php bin/install.php filename-checker master
```

[CodeIgniter Rest Server](https://github.com/chriskacerguis/codeigniter-restserver):

```
$ php bin/install.php restserver 2.7.2
```

### Update CodeIgniter

```
$ cd /path/to/codeigniter
$ composer update
```

You must update files manually if files in `application` folder or `index.php` change. Check [CodeIgniter User Guide](http://www.codeigniter.com/user_guide/installation/upgrading.html).

## Reference

* [Composer Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* [CodeIgniter](https://github.com/bcit-ci/CodeIgniter)
* [Translations for CodeIgniter System](https://github.com/bcit-ci/codeigniter3-translations)
