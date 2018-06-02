<?php

include "vendor/autoload.php";

$boardingCardList = new \TripSorter\BoardingCardList();

$boardingCardList->add(
    \TripSorter\Card\CardFactory::create(
        "AirportBus",
        [
            "start" => "Barcelona",
            "end" => "Gerona Airport",
            "number" => "",
            "seat" => "No seat assignment"
        ]
    )
);
$boardingCardList->add(
    \TripSorter\Card\CardFactory::create(
        "Train",
        [
            "start" => "Madrid",
            "end" => "Barcelona",
            "number" => "78A",
            "seat" => "45B"
        ]
    )
);
$boardingCardList->add(
    \TripSorter\Card\CardFactory::create(
        "Plane",
        [
            "start" => "Stockholm",
            "end" => "New York JFK",
            "number" => "SK22",
            "seat" => "7B",
            "gate" => "22",
            "baggageInformation" => "Baggage will we automatically transferred from your last leg"
        ]
    )
);
$boardingCardList->add(
    \TripSorter\Card\CardFactory::create(
        "Plane",
        [
            "start" => "Gerona Airport",
            "end" => "Stockholm",
            "number" => "SK455",
            "seat" => "3A",
            "gate" => "45B",
            "baggageInformation" => "Baggage drop at ticket counter 344"
        ]
    )
);

$doubleLinkedListService = new \TripSorter\Library\DoubleLinkedListService();
$doubleLinkedListService->link($boardingCardList);

echo $boardingCardList;
