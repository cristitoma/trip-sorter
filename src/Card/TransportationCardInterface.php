<?php

namespace TripSorter\Card;

use TripSorter\Library\DoubleLinkedNodeInterface;

/**
 * Interface TransportationCardInterface
 * @package TripSorter\Card
 */
interface TransportationCardInterface extends DoubleLinkedNodeInterface
{
    /**
     * @param string $number
     * @return TransportationCardInterface
     */
    public function setNumber($number);

    /**
     * @return string
     */
    public function getNumber();

    /**
     * @param string $seat
     * @return TransportationCardInterface
     */
    public function setSeat($seat);

    /**
     * @return string
     */
    public function getSeat();

    /**
     * @return string
     */
    public function __toString();
}
