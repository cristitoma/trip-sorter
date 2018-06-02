<?php

namespace TripSorter\Card;

/**
 * Class AbstractTransportationCard
 * @package TripSorter\Card
 */
abstract class AbstractTransportationCard implements TransportationCardInterface
{
    /** @var  string */
    protected $number;

    /** @var  string */
    protected $seat;

    /** @var  string */
    protected $next;

    /** @var  string */
    protected $previous;

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
    public function getPrevious()
    {
        return $this->previous;
    }

    /**
     * @return string
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param string $previous
     * @return $this
     */
    public function setPrevious($previous)
    {
        $this->previous = $previous;

        return $this;
    }

    /**
     * @param string $next
     * @return $this
     */
    public function setNext($next)
    {
        $this->next = $next;

        return $this;
    }
}
