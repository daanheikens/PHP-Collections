<?php
declare(strict_types=1);

namespace Fi\Stream\Collectors;

use Fi\Collection\Map;
use Fi\Collection\Set;

final class Collector
{
    /** @var Map|Set */
    private $targetCollection;
    /** @var callable */
    private $transformer;

    public function __construct($targetCollection, callable $transformer)
    {
        $this->targetCollection = $targetCollection;
        $this->transformer = $transformer;
    }

    /**
     * @param array $collectionValues
     * @return Map|Set
     */
    public function collect(array $collectionValues)
    {
        call_user_func_array($this->transformer, [$this->targetCollection, $collectionValues]);
        return $this->targetCollection;
    }
}
