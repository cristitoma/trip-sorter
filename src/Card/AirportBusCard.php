<?php

namespace TripSorter\Card;

/**
 * Class AirportBusCard
 * @package TripSorter\Card
 */
final class AirportBusCard extends AbstractTransportationCard
{
    /**
     * @return string
     */
    public function __toString()
    {
        return str_replace("  ", " ","Take the airport bus {$this->number} from {$this->previous} to {$this->next}. {$this->seat}.");
    }
}
