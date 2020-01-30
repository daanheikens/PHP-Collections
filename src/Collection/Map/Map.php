<?php
declare(strict_types=1);

namespace Fi\Collection\Map;

use ArrayIterator;

/**
 * Class Map
 * @package Fi\Collection\Map
 */
abstract class Map implements MapInterface
{
    /** @var array */
    private $map;

    /**
     * Map constructor.
     * @param array $map
     */
    public function __construct(array $map = [])
    {
        $this->map = $map;
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->map);
    }

    /**
     * @inheritDoc
     */
    public function get($key)
    {
        return $this->map[$key] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function add($key, $item): void
    {
        $this->map[$key] = $item;
    }

    /**
     * @inheritDoc
     */
    public function remove($key): bool
    {
        if (isset($this->map[$key])) {
            unset($this->map[$key]);
            return true;
        }
        return false;
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
        $this->map = [];
    }

    /**
     * Method to return an iterator for this map
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->map);
    }
}
