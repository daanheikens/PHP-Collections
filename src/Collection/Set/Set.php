<?php
declare(strict_types=1);

namespace Fi\Collection;

use ArrayIterator;
use Fi\Stream\Stream;

/**
 * Class Collection
 * @package Fi\Collection
 */
abstract class Set implements CollectionInterface
{
    /** @var array */
    private $items;

    /**
     * Set constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @inheritDoc
     */
    public function add($item): void
    {
        $this->items[] = $item;
    }

    /**
     * @inheritDoc
     */
    public function addAll(array $items): void
    {
        array_push($this->items, ...$items);
    }

    /**
     * @inheritDoc
     */
    public function contains($item): bool
    {
        return in_array($item, $this->items, true);
    }

    /**
     * @inheritDoc
     */
    public function remove($item): bool
    {
        $key = array_search($item, $this->items, true);
        if ($key !== false) {
            unset($this->items[$key]);
            return true;
        }
        return false;
    }

    /**
     * @inheritDoc
     */
    public function removeAll(array $items): bool
    {
        $beforeRemoval = $this->items;
        $this->items = array_diff($this->items, $items);

        if (abs(count($beforeRemoval) - count($this->items)) === $items) {
            return true;
        }

        $this->items = $beforeRemoval;
        return false;
    }

    /**
     * @inheritDoc
     */
    public function indexOf($item): int
    {
        return array_search($item, $this->items, true) ?? -1;
    }

    /**
     * @inheritDoc
     */
    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    /**
     * @inheritDoc
     */
    public function clear(): void
    {
        $this->items = [];
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @inheritDoc
     */
    public function stream(): Stream
    {
        return new Stream($this);
    }

    /**
     * Method to return an iterator for this collection
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}
