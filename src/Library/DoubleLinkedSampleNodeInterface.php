<?php

namespace TripSorter\Library;

/**
 * Interface DoubleLinkedSampleNodeInterface
 * @package TripSorter\Library
 */
interface DoubleLinkedSampleNodeInterface extends DoubleLinkedNodeInterface
{
    /**
     * @param $value
     * @return mixed
     */
    public function setValue($value);

    /**
     * @return mixed
     */
    public function getValue();
}
