<?php

namespace TripSorter\Card;

/**
 * Class PlaneCard
 * @package TripSorter\Card
 */
final class PlaneCard implements PlaneCardInterface
{
    /** @var string */
    protected $baggageInformation;

    /** @var string */
    protected $gate;

    use TransportationCardSetterAndGetterTrait;

    /**
     * PlaneCard constructor.
     * @param string $previous
     * @param string $next
     * @param string $number
     * @param string $gate
     * @param string $seat
     * @param string $baggageInformation
     */
    public function __construct($previous = '', $next = '', $number = '', $gate = '', $seat = '', $baggageInformation = '')
    {
        $this->previous = $previous;
        $this->next = $next;
        $this->number = $number;
        $this->gate = $gate;
        $this->seat = $seat;
        $this->baggageInformation = $baggageInformation;
    }

    /**
     * @param $baggageInformation
     * @return $this
     */
    public function setBaggageInformation($baggageInformation)
    {
        $this->baggageInformation = $baggageInformation;

        return $this;
    }

    /**
     * @return string
     */
    public function getBaggageInformation()
    {
        return $this->baggageInformation;
    }

    /**
     * @param $gate
     * @return $this
     */
    public function setGate($gate)
    {
        $this->gate = $gate;

        return $this;
    }

    /**
     * @return string
     */
    public function getGate()
    {
        return $this->gate;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "From {$this->previous}, take flight {$this->number} to {$this->next}. Gate {$this->gate}, seat {$this->seat}." . PHP_EOL .
               "   {$this->baggageInformation}.";
    }
}
