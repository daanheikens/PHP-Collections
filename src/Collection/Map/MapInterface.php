<?php
declare(strict_types=1);

namespace Fi\Collection\Map;

use Countable;
use IteratorAggregate;

interface MapInterface extends IteratorAggregate, Countable
{
    public function get($key);

    public function add($key, $item): bool;

    public function remove($key): bool;

    public function isEmpty(): bool;

    public function clear(): void;
}
