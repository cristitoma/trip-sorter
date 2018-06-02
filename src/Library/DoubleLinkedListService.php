<?php

namespace TripSorter\Library;

use TripSorter\Library\Exception\DoubleLinkedListException;

/**
 * Class DoubleLinkedListService
 * @package TripSorter\Library
 */
final class DoubleLinkedListService
{
    /**
     * @param DoubleLinkedListInterface $list
     * @throws DoubleLinkedListException
     */
    public function link(DoubleLinkedListInterface &$list)
    {
        if ($list->isLinked()) {
            return;
        }

        $numberOfNodes = count($list->getIterator());
        $head = 0;
        $tail = $numberOfNodes - 1;

        /** @var DoubleLinkedListInterface $linkedList */
        $listClassName = get_class($list);
        $linkedList = new $listClassName($numberOfNodes);

        $linkedList->set($list->getFirst(), $head);
        $linkedList->set($list->getLast(), $tail);

        for($i = 0; $i < $numberOfNodes / 2; $i++)
        {
            /** @var DoubleLinkedNodeInterface $headNode */
            $headNode = $linkedList->getNodeByIndex($head);
            /** @var DoubleLinkedNodeInterface $tailNode */
            $tailNode = $linkedList->getNodeByIndex($tail);

            $head++;
            $tail--;

            if ($linkedList->isLinked()) {
                break;
            }

            try {
                $previousIndex = $list->getPreviousIndex($headNode->getNext());
                $headNode = $list->getNodeByIndex($previousIndex);
                $linkedList->set($headNode, $head);
            } catch (DoubleLinkedListException $exception) {
                throw new DoubleLinkedListException('There is no next node in list.', DoubleLinkedListException::UNDEFINED_NEXT_NODE);

            }

            if ($linkedList->isLinked()) {
                break;
            }

            try {
                $nextIndex = $list->getNextIndex($tailNode->getPrevious());
                $tailNode = $list->getNodeByIndex($nextIndex);
                $linkedList->set($tailNode, $tail);
            } catch (DoubleLinkedListException $exception) {
                throw new DoubleLinkedListException('There is no previous node in list.', DoubleLinkedListException::UNDEFINED_PREVIOUS_NODE);
            }
        }

        if ($linkedList->isLinked()) {
            $list = $linkedList;
        } else {
            throw new DoubleLinkedListException('The list cant be linked, nodes are missing.', DoubleLinkedListException::FAIL_TO_LINK_HEAD_WITH_TAIL);
        }
    }
}
