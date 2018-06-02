<?php

namespace TripSorter\Card;

use TripSorter\Card\Exception\CardException;

/**
 * Class CardFactory
 * @package TripSorter\Card
 */
class CardFactory
{
    /**
     * @param $type
     * @param array $args
     * @return AirportBusCard|PlaneCard|TrainCard
     * @throws CardException
     */
    public static function create($type, array $args = [])
    {
        $card = null;
        switch($type) {
            case "AirportBus":
                $card = new AirportBusCard();
                break;
            case "Train":
                $card = new TrainCard();
                break;
            case "Plane":
                $card = new PlaneCard();
                break;
        }

        if ($card === null) {
           throw new CardException("Invalid card type", CardException::INVALID_CARD_TYPE);
        }

        if ($card instanceof TransportationCardInterface) {
            $card->setPrevious(isset($args["start"]) ? $args["start"] : '');
            $card->setNext(isset($args["end"]) ? $args["end"] : '');
            $card->setNumber(isset($args["number"]) ? $args["number"] : '');
            $card->setSeat(isset($args["seat"]) ? $args["seat"] : '');
        }

        if ($card instanceof PlaneCardInterface) {
            $card->setGate(isset($args["gate"]) ? $args["gate"] : '');
            $card->setBaggageInformation(isset($args["baggageInformation"]) ? $args["baggageInformation"] : '');
        }

        return $card;
    }
}
