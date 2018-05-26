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
        return "Take train {$this->number} from {$this->previous} to {$this->next}. Sit in seat {$this->seat}.";
    }
}
