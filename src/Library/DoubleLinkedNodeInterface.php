<?php

namespace TripSorter\Library;

/**
 * Interface DoubleLinkedNodeInterface
 * @package TripSorter\Library
 */
interface DoubleLinkedNodeInterface
{
    /**
     * DoubleLinkedNodeInterface constructor.
     * @param $previous
     * @param $next
     */
    public function __construct($previous, $next);

    /**
     * @return mixed
     */
    public function getPrevious();

    /**
     * @return mixed
     */
    public function getNext();
}
