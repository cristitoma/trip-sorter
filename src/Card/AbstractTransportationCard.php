<?php

namespace TripSorter\Card;

/**
 * Class AbstractTransportationCard
 * @package TripSorter\Card
 */
abstract class AbstractTransportationCard implements TransportationCardInterface
{
    use TransportationCardSetterAndGetterTrait;

    /**
     * AbstractTransportationCard constructor.
     * @param string $previous
     * @param string $next
     * @param string $number
     * @param string $seat
     */
    public function __construct($previous = '', $next = '', $number = '', $seat = '')
    {
        $this->previous = $previous;
        $this->next = $next;
        $this->number = $number;
        $this->seat = $seat;
    }
}
