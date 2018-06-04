<?php

namespace TripSorter\Card;

/**
 * Class PlaneCard
 * @package TripSorter\Card
 */
final class PlaneCard extends AbstractTransportationCard
{
    /** @var string */
    private $baggageInformation;

    /** @var string */
    private $gate;

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
        return "From {$this->getPrevious()}, take flight {$this->getNumber()} to {$this->getNext()}. Gate {$this->getGate()}, seat {$this->getSeat()}." . PHP_EOL .
               "   {$this->getBaggageInformation()}.";
    }
}
