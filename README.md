# ExpressionTree

A simple php library to build and dump expression trees.

Documentation coming soon.

[![Build Status](https://secure.travis-ci.org/nicmart/ExpressionTree.png?branch=master)](http://travis-ci.org/nicmart/ExpressionTree)

## Install

The best way to install ExpressionTree is [through composer](http://getcomposer.org).

Just create a composer.json file for your project:

```JSON
{
    "require": {
        "nicmart/ExpressionTree": "dev-master"
    }
}
```

Then you can run these two commands to install it:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install

or simply run `composer install` if you have have already [installed the composer globally](http://getcomposer.org/doc/00-intro.md#globally).

Then you can include the autoloader, and you will have access to the library classes:

```php
<?php
require 'vendor/autoload.php';
```