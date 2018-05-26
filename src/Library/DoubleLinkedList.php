<?php

namespace TripSorter\Library;

use TripSorter\Library\Exception\DoubleLinkedListException;

/**
 * Class DoubleLinkedList
 * @package TripSorter\Library
 */
class DoubleLinkedList implements DoubleLinkedListInterface
{
    const FIRST_NODE_SIGNIFICATION = 'first';
    const LAST_NODE_SIGNIFICATION  = 'last';

    /** @var array */
    protected $nodes = [];

    /** @var int */
    protected $nodeId = 0;

    /** @var bool */
    protected $isLinked = false;

    /** @var array */
    protected $previousIndex = [];

    /** @var array */
    protected $nextIndex = [];

    /** @var array */
    protected $groupedIndex = [];

    /** @var array */
    protected $mostSignificantIndex = [];

    /**
     * @param DoubleLinkedNodeInterface $node
     */
    public function add(DoubleLinkedNodeInterface $node)
    {
        $this->previousIndex[$node->getPrevious()] = $this->nodeId;
        $this->nextIndex[$node->getNext()] = $this->nodeId;
        $this->nodes[$this->nodeId++] = $node;

        $this->groupIndex($node->getNext(), self::LAST_NODE_SIGNIFICATION);
        $this->groupIndex($node->getPrevious(), self::FIRST_NODE_SIGNIFICATION);
    }

    /**
     * This method is trying to link unordered nodes
     *
     * @throws DoubleLinkedListException
     */
    public function link()
    {
        $head[] = $this->getFirst();
        $tail[] = $this->getLast();


        for($i = 0; $i < count($this->nodes) / 2; $i++)
        {
            /** @var DoubleLinkedNodeInterface $headNode */
            $headNode = $head[count($head) - 1];
            /** @var DoubleLinkedNodeInterface $tailNode */
            $tailNode = $tail[0];

            if ($headNode->getNext() == $tailNode->getPrevious()) {
                $this->isLinked = true;
                break;
            }

            if (isset($this->previousIndex[$headNode->getNext()])) {
                $headNode = $this->nodes[$this->previousIndex[$headNode->getNext()]];
                $head[] = $headNode;
            } else {
                throw new DoubleLinkedListException('There is no next node in list.', DoubleLinkedListException::UNDEFINED_NEXT_NODE);
            }

            if ($headNode->getNext() == $tailNode->getPrevious()) {
                $this->isLinked = true;
                break;
            }

            if (isset($this->nextIndex[$tailNode->getPrevious()])) {
                $tail = array_merge([$this->nodes[$this->nextIndex[$tailNode->getPrevious()]]], $tail);
            } else {
                throw new DoubleLinkedListException('There is no previous node in list.', DoubleLinkedListException::UNDEFINED_PREVIOUS_NODE);
            }
        }

        if ($this->isLinked) {
            $this->nodes = array_merge($head, $tail);
        } else {
            throw new DoubleLinkedListException('The list cant be linked, nodes are missing.', DoubleLinkedListException::FAIL_TO_LINK_HEAD_WITH_TAIL);
        }
    }

    /**
     * @return array
     */
    public function getList()
    {
        return $this->nodes;
    }

    /**
     * @return DoubleLinkedNodeInterface
     * @throws DoubleLinkedListException
     */
    protected function getFirst()
    {
        if (count($this->mostSignificantIndex) == 2) {
            $mostSignificantIndex = array_flip($this->mostSignificantIndex);
            if (isset($mostSignificantIndex[self::FIRST_NODE_SIGNIFICATION])) {
                return $this->nodes[$this->previousIndex[$mostSignificantIndex[self::FIRST_NODE_SIGNIFICATION]]];
            }
        }

        throw new DoubleLinkedListException('There is no first node in list.', DoubleLinkedListException::UNDEFINED_FIRST_NODE);
    }

    /**
     * @return DoubleLinkedNodeInterface
     * @throws DoubleLinkedListException
     */
    protected function getLast()
    {
        if (count($this->mostSignificantIndex) == 2) {
            $mostSignificantIndex = array_flip($this->mostSignificantIndex);
            if (isset($mostSignificantIndex[self::LAST_NODE_SIGNIFICATION])) {
                return $this->nodes[$this->nextIndex[$mostSignificantIndex[self::LAST_NODE_SIGNIFICATION]]];
            }
        }

        throw new DoubleLinkedListException('There is no last node in list', DoubleLinkedListException::UNDEFINED_LAST_NODE);
    }

    /**
     * @param $index
     * @param $nodeType
     */
    protected function groupIndex($index, $nodeType)
    {
        if (!isset($this->groupedIndex[$index])) {
            $this->groupedIndex[$index] = 0;
            $this->mostSignificantIndex[$index] = $nodeType;
        } else {
            unset($this->mostSignificantIndex[$index]);
        }

        $this->groupedIndex[$index]++;
    }
}
