<?php
/*
 * This file is part of ExpressionTree.
 *
 * (c) 2013 Nicolò Martini
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ExpressionTree\Test\Dumper;

use ExpressionTree\Tree\Node;
use ExpressionTree\Dumper\InfixDumper;

/**
 * Unit tests for InfixDumper class
 */
class InfixDumperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var InfixDumper
     */
    protected $dumper;

    public function setUp()
    {
        $this->dumper = new InfixDumper;
    }

    public function testDumpSimpleValue()
    {
        $this->assertEquals('foo', $this->dumper->dump(new Node('foo')));
    }

    public function testDumpOneLevelExpression()
    {
        $root = new Node('+');

        $root
            ->addChild(new Node(2))
            ->addChild(new Node(3))
            ->addChild(new Node(5))
            ->addChild(new Node(7))
       ;

        $this->assertEquals('2 + 3 + 5 + 7', $this->dumper->dump($root));
    }

    public function testDumpMultilevelExpression()
    {
        $root = new Node('*');

        $root
            ->addChild(new Node(2))
            ->addChild($node1 = new Node('+'))
            ->addChild($node2 = new Node('-'))
        ;

        $node1->setChildren(array(new Node(1), new Node(10), new Node(1000)));
        $node2->setChildren(array(new Node(98), new Node(7)));

        $expected = '2 * (1 + 10 + 1000) * (98 - 7)';

        $this->assertEquals($expected, $this->dumper->dump($root));
    }
}