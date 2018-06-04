<?php

namespace TripSorter\Card;

/**
 * Class TrainCard
 * @package TripSorter\Card
 */
final class TrainCard extends AbstractTransportationCard
{
    /**
     * @return string
     */
    public function __toString()
    {
        return "Take train {$this->getNumber()} from {$this->getPrevious()} to {$this->getNext()}. Sit in seat {$this->getSeat()}.";
    }
}
