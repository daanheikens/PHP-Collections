<?php
declare(strict_types=1);

namespace Fi\Stream\Collectors;

use Closure;
use Fi\Collection\Map;
use Fi\Collection\Set;
use Fi\Functions\BiFunction;
use Fi\Functions\Consumer\BiConsumer;
use Fi\Functions\MonoFunction;

/**
 * Class Collectors
 * @package Fi\Stream\Collectors
 */
final class Collectors
{
    public static function toSet(): Collector
    {
        return new Collector(new Set(), new class implements BiConsumer {
            /**
             * @param Set $set
             * @param array $values
             */
            public function consume($set, $values): void
            {
                $set->getData()->add(...$values);
            }
        });
    }

    public static function toMap(MonoFunction $keyMapper, MonoFunction $valueMapper, BiFunction $mapMerger = null): Collector
    {
        return new Collector(new Map(), new class($keyMapper, $valueMapper, $mapMerger) implements BiConsumer {
            private MonoFunction $keyMapper;
            private MonoFunction $valueMapper;
            private ?BiFunction $mapMerger;

            public function __construct(MonoFunction $keyMapper, MonoFunction $valueMapper, ?BiFunction $mapMerger)
            {
                $this->keyMapper = $keyMapper;
                $this->valueMapper = $valueMapper;
                $this->mapMerger = $mapMerger;
            }

            /**
             * @param Map $map
             * @param array $values
             */
            public function consume($map, $values): void
            {
                $mapTable = $map->getData();
                if ($this->mapMerger === null) {
                    foreach ($values as $value) {
                        $key = $this->keyMapper->apply($value);
                        $mapTable->put($key, $this->valueMapper->apply($value));
                    }
                    return;
                }

                foreach ($values as $value) {
                    $key = $this->keyMapper->apply($value);
                    if ($mapTable->hasKey($key)) {
                        $mapTable->put($key, $this->mapMerger->apply($mapTable->get($key), $this->valueMapper->apply($value)));
                    } else {
                        $mapTable->put($key, $this->valueMapper->apply($value));
                    }
                }
            }
        });
    }
}
