<?php

namespace TripSorter\Card;

use TripSorter\Library\DoubleLinkedNode;

/**
 * Class AbstractTransportationCard
 * @package TripSorter\Card
 */
abstract class AbstractTransportationCard extends DoubleLinkedNode
{
    /** @var  string */
    protected $number;

    /** @var  string */
    protected $seat;

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $seat
     * @return $this
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;

        return $this;
    }

    /**
     * @return string
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @return string
     */
    abstract public function  __toString();
}
