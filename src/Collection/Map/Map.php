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
     * @param string $keyType
     * @param string $valueType
     * @param array $map
     */
    public function __construct(array $map = [])
    {
        $this->map = $map;
    }

    public function count()
    {
        return count($this->map);
    }

    public function get($key)
    {
        return $this->map[$key] ?? null;
    }

    public function add($key, $item): bool
    {
        $this->map[$key] = $item;
        return true;
    }

    public function remove($key): bool
    {
        if (isset($this->map[$key])) {
            unset($this->map[$key]);
            return true;
        }
        return false;
    }

    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    public function clear(): void
    {
        $this->map = [];
    }

    public function getIterator()
    {
        return new ArrayIterator($this->map);
    }
}
