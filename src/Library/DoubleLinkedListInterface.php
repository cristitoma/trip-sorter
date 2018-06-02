<?php

namespace TripSorter\Library;

/**
 * Interface DoubleLinkedListInterface
 * @package TripSorter\Library
 */
interface DoubleLinkedListInterface
{
    /**
     * @param DoubleLinkedNodeInterface $node
     */
    public function add(DoubleLinkedNodeInterface $node);

    /**
     * @param DoubleLinkedNodeInterface $node
     * @param $index
     */
    public function set(DoubleLinkedNodeInterface $node, $index);

    /**
    * @param DoubleLinkedNodeInterface $node
    */
    public function remove(DoubleLinkedNodeInterface $node);

    /**
     * @return \ArrayIterator
     */
    public function getIterator();

    /**
     * @return boolean
     */
    public function isLinked();

    /**
     * @return DoubleLinkedNodeInterface
     */
    public function getFirst();

    /**
     * @return DoubleLinkedNodeInterface
     */
    public function getLast();

    /**
     * @param $index
     * @return DoubleLinkedNodeInterface
     */
    public function getNodeByIndex($index);

    /**
     * @param $key
     * @return integer
     */
    public function getNextIndex($key);

    /**
     * @param $key
     * @return integer
     */
    public function getPreviousIndex($key);
}
