<?php

include "vendor/autoload.php";

$boardingCardList = new \TripSorter\BoardingCardList();

$boardingCardList->add(
    (new \TripSorter\Card\AirportBusCard("Barcelona", "Gerona Airport"))
    ->setNumber("")
    ->setSeat("No seat assignment")
);

$boardingCardList->add(
    (new \TripSorter\Card\TrainCard("Madrid", "Barcelona"))
        ->setNumber("78A")
        ->setSeat("45B")
);

$boardingCardList->add(
    (new \TripSorter\Card\PlaneCard("Stockholm", "New York JFK"))
        ->setNumber("SK22")
        ->setSeat("7B")
        ->setGate("22")
        ->setBaggageInformation("Baggage will we automatically transferred from your last leg")
);

$boardingCardList->add(
    (new \TripSorter\Card\PlaneCard("Gerona Airport", "Stockholm"))
        ->setNumber("SK455")
        ->setSeat("3A")
        ->setGate("45B")
        ->setBaggageInformation("Baggage drop at ticket counter 344")
);

$doubleLinkedListService = new \TripSorter\Library\DoubleLinkedListService();
$doubleLinkedListService->link($boardingCardList);

echo $boardingCardList;
