# CodeIgniter 4 Composer Installer


This package installs the offical [CodeIgniter4](https://github.com/bcit-ci/CodeIgniter4) (version `dev-develop`) via Composer.

You can update CodeIgniter system folder to latest version with one command.

## Folder Structure

```
codeigniter/
├── application/
├── tests/
├── writable/
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

* PHP 7.0 or later
* `composer` command (See [Composer Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx))
* Git

## How to Use

### Install CodeIgniter

```
$ composer create-project satoripophq/codeigniter-composer:4.x-dev codeigniter
```

### Update CodeIgniter

```
$ cd /path/to/codeigniter
$ composer update
```

You must update files manually if files in `application` or `public` folder change. Check [CodeIgniter4 User Guide](https://sabri-elgueder.github.io/CodeIgniter4/installation/upgrading.html).

## Reference

* [Composer Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* [CodeIgniter4](https://github.com/bcit-ci/CodeIgniter4)
* [CodeIgniter4 User Guide](https://bcit-ci.github.io/CodeIgniter4/)
