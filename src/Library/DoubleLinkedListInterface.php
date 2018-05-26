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
     * This method is trying to link unordered nodes
     */
    public function link();

    /**
     * @return array
     */
    public function getList();
}
