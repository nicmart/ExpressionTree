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

use ExpressionTree\Tree\NodeInterface;

/**
 * Dumps a tree into a expression representation, like it's done in
 * a basic algebraic math expression
 *
 * A tree node will be treated as an "operator", and it will be dumped
 * as the list of the children dumps separated by the node value.
 * If a child is a tree it will be enclosed by brackets
 *
 * A leaf node will be dumped as its value.
 *
 * Nodes values must be string-castable.
 */
class InfixDumper extends ExpressionDumper
{
    /**
     * {@inheritdoc}
     */
    public function dump(NodeInterface $node)
    {
        if ($node->isLeaf())
            return (string) $node->getValue();

        $delimiter = $this->spaceDelimiter . (string) $node->getValue() . $this->spaceDelimiter;

        return implode($delimiter, $this->getChildrenDumps($node));
    }

    private function getChildrenDumps(NodeInterface $node)
    {
        $dumps = array();

        foreach ($node->getChildren() as $child) {
            $dump = $this->dump($child);

            if (!$child->isLeaf()) {
                $dump = $this->openingDelimiter . $dump . $this->closingDelimiter;
            }

            $dumps[] = $dump;
        }

        return $dumps;
    }
}