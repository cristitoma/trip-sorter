<?php

namespace TripSorter\Card;

/**
 * Class PlaneCard
 * @package TripSorter\Card
 */
final class PlaneCard extends AbstractTransportationCard implements PlaneCardInterface
{
    /** @var string */
    protected $baggageInformation;

    /** @var string */
    protected $gate;

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
