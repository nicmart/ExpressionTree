# ExpressionTree [![Build Status](https://secure.travis-ci.org/nicmart/ExpressionTree.png?branch=master)](http://travis-ci.org/nicmart/ExpressionTree)

In this library you can find some dumpers that convert simple expression trees to common string notations.

## What is an expression tree?
Take for example a simple algebraic expression like
```
2 * (100 : (1 + 3)) * (98 - 7)
```
In evaluating this expression we have to find out which expressions has to be evaluated first, in which order, 
and their hierarchical relationship.

In this case the expression tree is
```
       *
      /|\
     / | \
    2  :  -
      /|   |\
     / |   | \
  100  +   98 7
      / \
     1   3
```
In such a tree leaf node are numbers and tree nodes are operators.

## Building the tree
This library does not offer (at least now) an expression parser, and it is supposed we already have the expression in the
tree format.

Since this library depends on [nicmart/Tree](https://github.com/nicmart/ExpressionTree) library, 
you can build the tree with its Builder:
```php
<?php
    $builder = new Tree\Builder\NodeBuilder;
    
    $builder
        ->value('*')
        ->leaf(2)
        ->tree(':')
            ->leaf(100)
            ->tree('+')
                ->leaf(1)
                ->leaf(3)
            ->end()
            ->tree('-')
                ->leaf(98)
                ->leaf(7)
            ->end()
        ->end()
    ;
    
    $expressionTree = $builder->getNode();
```
What you get is an instance of `Tree\Node\Node` that reflects the expressions.

## Dumping
You can dump a tree expression giving your own implementation of the ```ExpressionTree\Dumper\NodeDumperInterface``` interface.
However, included in this package you can find three dumper ready to use. They reflect the three classical way for 
traversing a tree (inorder, preorder and postorder traversing).

### Infix dumper
Infix notation is the one commonly used in writing math expressions. 
In this notation operators are written bewtween operands.

The code
```php
    $dumper = new ExpressionTree\Dumper\InfixDumper;
    
    echo $dumper->dump($expressionTree);
```
will print
```
2 * (100 : (1 + 3)) * (98 - 7)
```

### Prefix dumper
In prefix notation (aka [reverse Polish notation](http://en.wikipedia.org/wiki/Polish_notation)) opators 
are written before operands. The code
The code
```php
    $dumper = new ExpressionTree\Dumper\PrefixDumper;
    
    echo $dumper->dump($expressionTree);
```
will print
```
*(2 :(100 +(1 3)) -(98 7))
```
### Postfix dumper
In postfix notation operators are suffixed, so they are written after operands.
The code
```php
    $dumper = new ExpressionTree\Dumper\PostfixDumper;
    
    echo $dumper->dump($expressionTree);
```
will print
```
(2 (100 (1 3)+): (98 7)-)*
```

## Install

The best way to install ExpressionTree is [through composer](http://getcomposer.org).

Just create a composer.json file for your project:

```JSON
{
    "require": {
        "nicmart/expression-tree": "dev-master"
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

# Tests
The library is fully tested. You can run the test suite with
```
phpunit
```
