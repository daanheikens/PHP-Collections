<?php
declare(strict_types=1);

namespace Fi\Stream;

use Ds\Set;
use Fi\Collection\Map;
use Fi\Functions\Consumer\Consumer;
use Fi\Functions\MonoFunction;
use Fi\Functions\Predicate\Predicate;
use Fi\Functions\Scalar\ToFloatFunction;
use Fi\Functions\Scalar\ToIntFunction;
use Fi\Stream\Collectors\Collector;
use Fi\Util\CallableComparator;

final class SetStream
{
    private Set $set;

    public function __construct(Set $set)
    {
        /** @var Set $copiedSet */
        $copiedSet = $set->copy();
        $this->set = $copiedSet;
    }

    public function mapToInt(ToIntFunction $toIntFunction): IntStream
    {
        $intValues = [];
        foreach ($this->set as $item) {
            $intValues[] = $toIntFunction->applyAsInt($item);
        }

        return new IntStream($intValues);
    }

    public function mapToFloat(ToFloatFunction $toFloatFunction): FloatStream
    {
        $floatValues = [];
        foreach ($this->set as $item) {
            $floatValues[] = $toFloatFunction->applyAsFloat($item);
        }

        return new FloatStream($floatValues);
    }

    public function filter(Predicate $predicate): self
    {
        foreach ($this->set as $item) {
            if (!$predicate->test($item)) {
                $this->set->remove($item);
            }
        }
        return $this;
    }

    public function map(MonoFunction $mapFunction): self
    {
        $newValues = [];
        foreach ($this->set as $item) {
            $newValues[] = $mapFunction->apply($item);
        }
        $this->set = new Set($newValues);
        return $this;
    }

    public function sort(CallableComparator $comparator = null): self
    {
        if ($comparator instanceof CallableComparator) {
            $this->set->sort($comparator);
        } else {
            $this->set->sort();
        }
        return $this;
    }

    /**
     * @param Collector $collector
     * @return Map|\Fi\Collection\Set
     */
    public function collect(Collector $collector)
    {
        return $collector->collect($this->set->toArray());
    }

    public function forEach(Consumer $consumer): void
    {
        foreach ($this->set as $item) {
            $consumer->consume($item);
        }
    }

    public function findFirst()
    {
        return $this->set->first();
    }

    public function toArray(): array
    {
        return $this->set->toArray();
    }
}
