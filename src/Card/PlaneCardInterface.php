<?php

namespace TripSorter\Card;

/**
 * Interface PlaneCardInterface
 * @package TripSorter\Card
 */
interface PlaneCardInterface extends TransportationCardInterface
{
    /**
     * @param string $baggageInformation
     * @return PlaneCardInterface
     */
    public function setBaggageInformation($baggageInformation);

    /**
     * @return string
     */
    public function getBaggageInformation();

    /**
     * @param string $gate
     * @return PlaneCardInterface
     */
    public function setGate($gate);

    /**
     * @return string
     */
    public function getGate();
}
