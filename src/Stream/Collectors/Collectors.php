<?php
declare(strict_types=1);

namespace Fi\Stream\Collectors;

use Fi\Collection\Map;
use Fi\Collection\Set;
use function array_values;

final class Collectors
{
    public static function toSet(): Collector
    {
        return new Collector(new Set(), fn(Set $set, array $values) => $set->get()->add(...$values));
    }

    public static function toMap(string $keyMapper, string $valueMapper): Collector
    {
        return new Collector(new Map(), function (Map $map, array $values) use ($keyMapper, $valueMapper) {
            $mapTable = $map->get();
            foreach ($values as $value) {
                if (is_object($value)) {
                    $mapTable->put($value->$keyMapper(), $value->$valueMapper());
                } else {
                    $mapTable->put($value[$keyMapper], $value[$valueMapper]);
                }
            }
        });
    }
}
