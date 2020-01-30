<?php
declare(strict_types=1);

namespace Fi\Collection;

use Countable;
use Fi\Stream\Stream;
use IteratorAggregate;

/**
 * Interface CollectionInterface
 * @package Fi\Collection
 */
interface CollectionInterface extends IteratorAggregate, Countable
{
    /**
     * Method to add an item to the collection
     * @param mixed $item
     * @return void
     */
    public function add($item): void;

    /**
     * Method to add multiple items to the collection
     * @param array $items
     * @return void
     */
    public function addAll(array $items): void;

    /**
     * Method to check if an item exist in the current collection
     * @param mixed $item
     * @return bool Which indicates if the item exists in the collection
     */
    public function contains($item): bool;

    /**
     * Method to remove an item from the collection
     * @param mixed $item
     * @return bool Which indicates if the removal has succeeded
     */
    public function remove($item): bool;

    /**
     * Method to remove multiple items from the collection
     * @param array $items
     * @return bool Which indicates if the method has removed all the items
     */
    public function removeAll(array $items): bool;

    /**
     * Method to get the index of an item
     * @param mixed $item
     * @return int The index of the provided item
     */
    public function indexOf($item): int;

    /**
     * Method to check if the collection is empty
     * @return bool true if the collection is empty, false if not
     */
    public function isEmpty(): bool;

    /**
     * Method to clear the collection of all it's items.
     */
    public function clear(): void;

    /**
     * Method to get access to the Stream API for this collection
     * @return Stream
     */
    public function stream(): Stream;
}
