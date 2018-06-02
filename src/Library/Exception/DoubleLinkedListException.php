<?php

namespace TripSorter\Library\Exception;

/**
 * Class DoubleLinkedListException
 * @package TripSorter\Library\Exception
 */
class DoubleLinkedListException extends \Exception
{
    const UNDEFINED_NEXT_NODE = 1;
    const UNDEFINED_PREVIOUS_NODE = 2;
    const FAIL_TO_LINK_HEAD_WITH_TAIL = 3;
    const UNDEFINED_FIRST_NODE = 4;
    const UNDEFINED_LAST_NODE = 5;
    const UNDEFINED_NODE = 6;
}
