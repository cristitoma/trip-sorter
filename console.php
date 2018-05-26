<?php

include "vendor/autoload.php";

$boardingCardList = new \TripSorter\BoardingCardList();

$boardingCardList->add(new \TripSorter\Card\AirportBusCard("Barcelona", "Gerona Airport", "", "No seat assignment"));
$boardingCardList->add(new \TripSorter\Card\TrainCard("Madrid", "Barcelona", "78A", "45B"));
$boardingCardList->add(new \TripSorter\Card\PlaneCard("Stockholm", "New York JFK", "SK22", "22", "7B", "Baggage will we automatically transferred from your last leg"));
$boardingCardList->add(new \TripSorter\Card\PlaneCard("Gerona Airport", "Stockholm", "SK455", "45B", "3A", "Baggage drop at ticket counter 344"));

$boardingCardList->link();

echo $boardingCardList;
