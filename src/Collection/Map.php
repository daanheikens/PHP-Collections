<?php
declare(strict_types=1);

namespace Fi\Collection;

use Ds\Map as InternalMap;

/**
 * Class Map
 * @package Fi\Collection
 */
final class Map
{
    private InternalMap $map;

    public function __construct(array $values = null)
    {
        $this->map = $values ? new InternalMap($values) : new InternalMap();
    }

    public function get(): InternalMap
    {
        return $this->map;
    }

    public function entrySet(): Set
    {
        $entries = [];
        foreach ($this->map as $key => $value) {
            $entries[] = new MapEntry($key, $value);
        }

        return new Set($entries);
    }
}
