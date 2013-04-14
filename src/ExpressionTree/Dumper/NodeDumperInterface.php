<?php
/*
 * This file is part of library-template.
 *
 * (c) 2013 Nicolò Martini
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ExpressionTree\Dumper;

use ExpressionTree\Tree\NodeInterface;
/**
 * Interface for dumping a tree to a string representation
 *
 * @package    ExpressionTree
 * @author     Nicolò Martini <nicmartnic@gmail.com>
 */
interface NodeDumperInterface
{
    /**
     * Dumps a node in a string representation
     *
     * @param NodeInterface $node
     * @return string
     */
    public function dump(NodeInterface $node);
}