<?php

namespace TripSorter\Test\Library;

use PHPUnit\Framework\TestCase;
use TripSorter\Library\DoubleLinkedList;
use TripSorter\Library\DoubleLinkedListInterface;
use TripSorter\Library\DoubleLinkedListService;
use TripSorter\Library\DoubleLinkedNode;
use TripSorter\Library\DoubleLinkedSampleNodeInterface;

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
            /** @var DoubleLinkedSampleNodeInterface $node */
            foreach ($doubleLinkedList as $node)
            {
                $listValues[] = $node->getValue();
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

        $doubleLinkedList->add(new DoubleLinkedNode("Constanta - End", "constanta", "end"));
        $doubleLinkedList->add(new DoubleLinkedNode("Arad - Cluj", "arad", "cluj"));
        $doubleLinkedList->add(new DoubleLinkedNode("Brasov - Arges", "brasov", "arges"));
        $doubleLinkedList->add(new DoubleLinkedNode("Iasi - Arad", "iasi", "arad"));
        $doubleLinkedList->add(new DoubleLinkedNode("Arges - Constanta", "arges", "constanta"));
        $doubleLinkedList->add(new DoubleLinkedNode("Cluj - Brasov", "cluj", "brasov"));
        $doubleLinkedList->add(new DoubleLinkedNode("Start - Iasi", "start", "iasi"));

        $expectedValues = [
            "Start - Iasi",
            "Iasi - Arad",
            "Arad - Cluj",
            "Cluj - Brasov",
            "Brasov - Arges",
            "Arges - Constanta",
            "Constanta - End"
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

        $doubleLinkedList->add(new DoubleLinkedNode("Arad - Cluj", "arad", "cluj"));
        $doubleLinkedList->add(new DoubleLinkedNode("Constanta - End", "constanta", "end"));
        $doubleLinkedList->add(new DoubleLinkedNode("Arges - Constanta", "arges", "constanta"));
        $doubleLinkedList->add(new DoubleLinkedNode("Cluj - Brasov", "cluj", "brasov"));
        $doubleLinkedList->add(new DoubleLinkedNode("Brasov - Arges", "brasov", "arges"));
        $doubleLinkedList->add(new DoubleLinkedNode("Start - Arad", "start", "arad"));

        $expectedValues = [
            "Start - Arad",
            "Arad - Cluj",
            "Cluj - Brasov",
            "Brasov - Arges",
            "Arges - Constanta",
            "Constanta - End"
        ];

        return [
            $doubleLinkedList,
            $expectedValues,
            'even'
        ];
    }
}
