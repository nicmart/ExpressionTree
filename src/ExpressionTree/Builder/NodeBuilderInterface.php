<?php
/*
 * This file is part of library-template.
 *
 * (c) 2013 Nicolò Martini
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ExpressionTree\Builder;

use ExpressionTree\Tree\NodeInterface;

/**
 * Interface that allows a fluent tree building.
 *
 * @package    ExpressionTree
 * @author     Nicolò Martini <nicmartnic@gmail.com>
 */
interface NodeBuilderInterface
{
    /**
     * Set the node the builder will manage
     *
     * @param NodeInterface $node
     *
     * @return NodeBuilderInterface The current instance
     */
    public function setNode(NodeInterface $node);

    /**
     * Get the node the builder manages
     *
     * @return NodeInterface
     */
    public function getNode();

    /**
     * Add a leaf to the node
     *
     * @param mixed $value The value of the leaf node
     *
     * @return NodeBuilderInterface The current instance
     */
    public function leaf($value = null);

    /**
     * Add several leafs to the node
     *
     * @param array $values The values of the leafs
     *
     * @return NodeBuilderInterface The current instance
     */
    public function leafs(array $values);

    /**
     * Add a child to the node enter in its scope
     *
     * @param null $value
     *
     * @return NodeBuilderInterface A NodeBuilderInterface instance linked to the child node
     */
    public function tree($value = null);

    /**
     * Goes up to the parent node context
     *
     * @return null|NodeBuilderInterface A NodeBuilderInterface instanced linked to the parent node
     */
    public function end();
}

