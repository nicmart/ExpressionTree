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
 * Abstract base class for Expression Dumpers
 */
abstract class ExpressionDumper implements NodeDumperInterface
{
    protected $openingDelimiter;
    protected $closingDelimiter;
    protected $spaceDelimiter;

    /**
     * @param string $opening
     * @param string $closing
     * @param string $space
     */
    public function __construct($opening = '(', $closing = ')', $space = ' ')
    {
        $this->openingDelimiter = $opening;
        $this->closingDelimiter = $closing;
        $this->spaceDelimiter = $space;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function dump(NodeInterface $node);
}