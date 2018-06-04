<?php

namespace TripSorter\Test\Library;

use PHPUnit\Framework\TestCase;
use TripSorter\Library\DoubleLinkedList;
use TripSorter\Library\DoubleLinkedListInterface;
use TripSorter\Library\DoubleLinkedListService;
use TripSorter\Library\DoubleLinkedNode;
use TripSorter\Library\DoubleLinkedNodeInterface;

/**
 * Class DoubleLinkedListTest
 * @package TripSorter\Test\Library
 */
class DoubleLinkedListServiceTest extends TestCase
{
    /**
     * Test Linked list
     */
    public function testLink()
    {
        $fixtures = [
            $this->oddListFixture(),
            $this->evenListFixture()
        ];

        foreach ($fixtures as $fixture) {
            /** @var $doubleLinkedList DoubleLinkedListInterface */
            list($doubleLinkedList, $expectedValues, $fixtureName) = $fixture;

            $doubleLinkedListService = new DoubleLinkedListService();
            $doubleLinkedListService->link($doubleLinkedList);

            $listValues = [];
            /** @var DoubleLinkedNodeInterface $node */
            foreach ($doubleLinkedList as $node)
            {
                $listValues[] = $node->getPrevious() . ' - ' . $node->getNext();
            }

            $this->assertEquals($expectedValues, $listValues, "Test linked list -> fixture {$fixtureName}");
        }
    }

    /**
     * @return array
     */
    private function oddListFixture()
    {
        $doubleLinkedList = new DoubleLinkedList();

        $doubleLinkedList->add(new DoubleLinkedNode("constanta", "end"));
        $doubleLinkedList->add(new DoubleLinkedNode("arad", "cluj"));
        $doubleLinkedList->add(new DoubleLinkedNode("brasov", "arges"));
        $doubleLinkedList->add(new DoubleLinkedNode("iasi", "arad"));
        $doubleLinkedList->add(new DoubleLinkedNode("arges", "constanta"));
        $doubleLinkedList->add(new DoubleLinkedNode("cluj", "brasov"));
        $doubleLinkedList->add(new DoubleLinkedNode("start", "iasi"));

        $expectedValues = [
            "start - iasi",
            "iasi - arad",
            "arad - cluj",
            "cluj - brasov",
            "brasov - arges",
            "arges - constanta",
            "constanta - end"
        ];

        return [
            $doubleLinkedList,
            $expectedValues,
            'odd'
        ];
    }

    /**
     * @return array
     */
    private function evenListFixture()
    {
        $doubleLinkedList = new DoubleLinkedList();

        $doubleLinkedList->add(new DoubleLinkedNode("arad", "cluj"));
        $doubleLinkedList->add(new DoubleLinkedNode("constanta", "end"));
        $doubleLinkedList->add(new DoubleLinkedNode("arges", "constanta"));
        $doubleLinkedList->add(new DoubleLinkedNode("cluj", "brasov"));
        $doubleLinkedList->add(new DoubleLinkedNode("brasov", "arges"));
        $doubleLinkedList->add(new DoubleLinkedNode("start", "arad"));

        $expectedValues = [
            "start - arad",
            "arad - cluj",
            "cluj - brasov",
            "brasov - arges",
            "arges - constanta",
            "constanta - end"
        ];

        return [
            $doubleLinkedList,
            $expectedValues,
            'even'
        ];
    }
}
