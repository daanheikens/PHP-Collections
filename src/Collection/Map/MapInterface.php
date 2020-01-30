<?php
declare(strict_types=1);

namespace Fi\Collection\Map;

use Countable;
use IteratorAggregate;

/**
 * Interface MapInterface
 * @package Fi\Collection\Map
 */
interface MapInterface extends IteratorAggregate, Countable
{
    /**
     * Method to get an item from the map by the given key
     * @param mixed|null $key
     * @return mixed The value which belongs to the provided key or null if not exists
     */
    public function get($key);

    /**
     * Add an entry to the map
     * @param mixed $key
     * @param mixed $item
     * @return void
     */
    public function add($key, $item): void;

    /**
     * Method to remove an entry from the map
     * @param mixed $key
     * @return bool indicates if the removal has succeeded
     */
    public function remove($key): bool;

    /**
     * Method to check if the map is empty.
     * @return bool true if the map is empty, false if not
     */
    public function isEmpty(): bool;

    /**
     * Method to clear the map of all it's items.
     */
    public function clear(): void;
}
