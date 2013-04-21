<?php
/*
 * This file is part of ExpressionTree.
 *
 * (c) 2013 Nicolò Martini
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ExpressionTree\Dumper;

use Tree\Node\NodeInterface;

/**
 * Dumps a tree into a prefix expression representation.
 *
 * A tree node will be treated as an "operator", and it will be dumped
 * as the list of the children dumps separated by the node value.
 * If a child is a tree it will be enclosed by brackets
 *
 * A leaf node will be dumped as its value.
 *
 * Nodes values must be string-castable.
 *
 * Example: the tree
 *
 *              *
 *             / \
 *            +   10
 *           / \
 *          1   3
 *
 * Will be dumped as
 *
 *   *(+(1 3) 10)
 */
class PrefixDumper extends ExpressionDumper
{
    /**
     * {@inheritdoc}
     */
    public function dump(NodeInterface $node)
    {
        if ($node->isLeaf())
            return (string) $node->getValue();

        $dumps = array();

        foreach ($node->getChildren() as $child) {
            $dumps[] = $this->dump($child);
        }

        return (string) $node->getValue()
            . $this->openingDelimiter
            . implode($this->spaceDelimiter, $dumps)
            . $this->closingDelimiter
        ;
    }
}