<?php
declare(strict_types=1);

namespace Fi\Stream\Collectors;

use Fi\Collection\Map;
use Fi\Collection\Set;
use Fi\Functions\Consumer\BiConsumer;

final class Collector
{
    /** @var Map|Set */
    private $targetCollection;

    private BiConsumer $accumulator;

    public function __construct($targetCollection, BiConsumer $accumulator)
    {
        $this->targetCollection = $targetCollection;
        $this->accumulator = $accumulator;
    }

    /**
     * @param array $collectionValues
     * @return Map|Set
     */
    public function collect(array $collectionValues)
    {
        $this->accumulator->consume($this->targetCollection, $collectionValues);
        return $this->targetCollection;
    }
}
