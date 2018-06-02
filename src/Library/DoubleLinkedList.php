<?php

namespace TripSorter\Library;

use TripSorter\Library\Exception\DoubleLinkedListException;

/**
 * Class DoubleLinkedList
 * @package TripSorter\Library
 */
class DoubleLinkedList implements DoubleLinkedListInterface, \IteratorAggregate
{
    const FIRST_NODE_SIGNIFICATION = 'first';
    const LAST_NODE_SIGNIFICATION  = 'last';

    /** @var array */
    private $nodes = [];

    /** @var int */
    private $nodeId = 0;

    /** @var bool */
    private $isLinked = true;

    /** @var array */
    private $previousIndex = [];

    /** @var array */
    private $nextIndex = [];

    /** @var array */
    private $groupedIndex = [];

    /** @var array */
    private $mostSignificantIndex = [];

    /**
     * DoubleLinkedList constructor.
     * @param integer $n
     */
    public function __construct($n = null)
    {
        if ($n !== null) {
            $this->nodes = array_fill(0, $n - 1, null);
        }
    }

    /**
     * @param DoubleLinkedNodeInterface $node
     */
    public function add(DoubleLinkedNodeInterface $node)
    {
        if (count($this->nodes) > 0) {
            /** @var DoubleLinkedNodeInterface $tailNode */
            $tailNode = $this->nodes[count($this->nodes) - 1];
            if ($tailNode->getNext() != $node->getPrevious()) {
                $this->isLinked = false;
            }
        }

        $this->previousIndex[$node->getPrevious()] = $this->nodeId;
        $this->nextIndex[$node->getNext()] = $this->nodeId;
        $this->nodes[$this->nodeId++] = $node;

        $this->groupIndex($node->getNext(), self::LAST_NODE_SIGNIFICATION);
        $this->groupIndex($node->getPrevious(), self::FIRST_NODE_SIGNIFICATION);
    }

    /**
     * @param DoubleLinkedNodeInterface $node
     * @param $index
     */
    public function set(DoubleLinkedNodeInterface $node, $index)
    {
        $this->isLinked = true;

        if (array_key_exists(($index-1), $this->nodes)) {
            if ($this->nodes[$index-1] === null) {
                $this->isLinked = false;
            } else {
                /** @var DoubleLinkedNodeInterface $previousNode */
                $previousNode = $this->nodes[$index-1];
                if ($previousNode->getNext() != $node->getPrevious()) {
                    $this->isLinked = false;
                }
            }
        }

        if (array_key_exists(($index+1), $this->nodes)) {
            if ($this->nodes[$index+1] === null) {
                $this->isLinked = false;
            } else {
                /** @var DoubleLinkedNodeInterface $nextNode */
                $nextNode = $this->nodes[$index+1];
                if ($nextNode->getPrevious() != $node->getNext()) {
                    $this->isLinked = false;
                }
            }
        }

        $this->previousIndex[$node->getPrevious()] = $index;
        $this->nextIndex[$node->getNext()] = $index;
        $this->nodes[$index] = $node;

        $this->groupIndex($node->getNext(), self::LAST_NODE_SIGNIFICATION);
        $this->groupIndex($node->getPrevious(), self::FIRST_NODE_SIGNIFICATION);
    }

    /**
     * @param $index
     * @return DoubleLinkedNodeInterface
     * @throws DoubleLinkedListException
     */
    public function getNodeByIndex($index)
    {
        if (isset($this->nodes[$index])) {
            return $this->nodes[$index];
        }

        throw new DoubleLinkedListException('Node dose not exist.', DoubleLinkedListException::UNDEFINED_NODE);
    }

    /**
     * @param DoubleLinkedNodeInterface $node
     * @throws DoubleLinkedListException
     */
    public function remove(DoubleLinkedNodeInterface $node)
    {
        if (isset($this->previousIndex[$node->getPrevious()])
            && isset($this->nextIndex[$node->getNext()])
            && $this->previousIndex[$node->getPrevious()] == $this->nextIndex[$node->getNext()]) {

            //unset indexes
            unset($this->nodes[$this->previousIndex[$node->getPrevious()]]);
            unset($this->previousIndex[$node->getPrevious()]);
            unset($this->nextIndex[$node->getNext()]);
            unset($this->mostSignificantIndex[$node->getPrevious()]);
            unset($this->mostSignificantIndex[$node->getNext()]);

            //decrease grouped index
            if ($this->groupedIndex[$node->getPrevious()] == 1) {
                unset($this->groupedIndex[$node->getPrevious()]);
            } else {
                $this->groupedIndex[$node->getPrevious()]--;
            }

            if ($this->groupedIndex[$node->getNext()] == 1) {
                unset($this->groupedIndex[$node->getNext()]);
            } else {
                $this->groupedIndex[$node->getNext()]--;
            }

            //reindex array nodes
            $this->nodes = array_values($this->nodes);
            $this->nodeId = count($this->nodes);
        } else {
            throw new DoubleLinkedListException('Node dose not exist.', DoubleLinkedListException::UNDEFINED_NODE);
        }
    }

    /**
     * @return bool
     */
    public function isLinked()
    {
        return $this->isLinked;
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->nodes);
    }

    /**
     * @return DoubleLinkedNodeInterface
     * @throws DoubleLinkedListException
     */
    public function getFirst()
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
    public function getLast()
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
     * @param $key
     * @return integer
     * @throws DoubleLinkedListException
     */
    public function getPreviousIndex($key)
    {
        if (!isset($this->previousIndex[$key])) {
            throw new DoubleLinkedListException('Node dose not exist.', DoubleLinkedListException::UNDEFINED_NODE);
        }

        return $this->previousIndex[$key];
    }

    /**
     * @param $key
     * @return integer
     * @throws DoubleLinkedListException
     */
    public function getNextIndex($key)
    {
        if (!isset($this->nextIndex[$key])) {
            throw new DoubleLinkedListException('Node dose not exist.', DoubleLinkedListException::UNDEFINED_NODE);
        }

        return $this->nextIndex[$key];
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
