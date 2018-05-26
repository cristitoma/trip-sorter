<?php

namespace TripSorter\Library;

/**
 * Class DoubleLinkedNode
 * @package TripSorter\Library
 */
class DoubleLinkedNode implements DoubleLinkedSampleNodeInterface
{
    /**
     * @var mixed
     */
    private $previous;

    /**
     * @var mixed
     */
    private $next;

    /**
     * @var mixed
     */
    private $value;

    /**
     * DoubleLinkedNode constructor.
     * @param mixed $value
     * @param mixed $previous
     * @param mixed $next
     */
    public function __construct($value = null, $previous = null, $next = null)
    {
        $this->value = $value;
        $this->previous = $previous;
        $this->next = $next;
    }

    /**
     * @return mixed|null
     */
    public function getPrevious()
    {
        return $this->previous;
    }

    /**
     * @return mixed|null
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param $previous
     * @return $this
     */
    public function setPrevious($previous)
    {
        $this->previous = $previous;

        return $this;
    }

    /**
     * @param $next
     * @return $this
     */
    public function setNext($next)
    {
        $this->next = $next;

        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getValue()
    {
        return $this->value;
    }
}
