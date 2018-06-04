<?php

namespace TripSorter\Library;

/**
 * Class DoubleLinkedNode
 * @package TripSorter\Library
 */
class DoubleLinkedNode implements DoubleLinkedNodeInterface
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
     * DoubleLinkedNode constructor.
     * @param mixed $previous
     * @param mixed $next
     * @internal param mixed $value
     */
    public function __construct($previous, $next)
    {
        $this->previous = $previous;
        $this->next = $next;
    }

    /**
     * @return mixed
     */
    public function getPrevious()
    {
        return $this->previous;
    }

    /**
     * @return mixed
     */
    public function getNext()
    {
        return $this->next;
    }
}
