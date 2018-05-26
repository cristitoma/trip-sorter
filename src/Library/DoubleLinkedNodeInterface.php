<?php

namespace TripSorter\Library;

/**
 * Interface DoubleLinkedNodeInterface
 * @package TripSorter\Library
 */
interface DoubleLinkedNodeInterface
{
    /**
     * @return mixed
     */
    public function getPrevious();

    /**
     * @return mixed
     */
    public function getNext();

    /**
     * @param $previous
     * @return mixed
     */
    public function setPrevious($previous);

    /**
     * @param $next
     * @return mixed
     */
    public function setNext($next);
}
