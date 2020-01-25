<?php
declare(strict_types=1);

namespace Fi\Collection;

use ArrayIterator;

/**
 * Class Collection
 * @package Fi\Collection
 */
abstract class Collection implements CollectionInterface
{
    /** @var array */
    protected $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get(int $index)
    {
        return $this->items[$index] ?? null;
    }

    public function add($item): bool
    {
        $this->items[] = $item;
        return true;
    }

    public function addAll(array $items): bool
    {
        $this->items = array_merge($this->items, $items);
        return true;
    }

    public function remove($item): bool
    {
        $key = array_search($item, $this->items, true);
        if ($key !== false) {
            unset($this->items[$key]);
            return true;
        }
        return false;
    }

    public function removeAll(array $items): bool
    {
        $this->items = array_diff($this->items, $items);
    }

    public function indexOf($item): int
    {
        $key = array_search($item, $this->items, true);
        return $key ?? -1;
    }

    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    public function clear(): void
    {
        $this->items = [];
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}