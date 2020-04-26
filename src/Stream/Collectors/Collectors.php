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
        return new Collector(new Set(), fn(Set $set, array $values) => $set->get()->add(array_values($values)));
    }

    public static function toMap(string $keyName, string $valueName): Collector
    {
        return new Collector(new Map(), function (Map $map, array $values) use ($keyName, $valueName) {
            $mapTable = $map->get();
            foreach ($values as $value) {
                $mapTable->put($value[$keyName], $value[$valueName]);
            }
        });
    }
}
