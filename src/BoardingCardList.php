<?php

namespace TripSorter;

use TripSorter\Card\TransportationCardInterface;
use TripSorter\Library\DoubleLinkedList;

/**
 * Class BoardingCardList
 * @package TripSorter
 */
final class BoardingCardList extends DoubleLinkedList
{
    /**
     * @return string
     */
    public function __toString()
    {
        $story = "";
        if ($this->isLinked) {
            $storyRow = 1;
            /** @var TransportationCardInterface $node */
            foreach ($this->nodes as $node) {
                $nodeStory = (string)$node;
                $story .= "{$storyRow}. {$nodeStory}\n";
                $storyRow++;
            }
            $story .= "{$storyRow}. You have arrived at your final destination.\n";
        } else {
            $story = "You must link the list, before you can get the story.";
        }
        return $story;
    }
}
