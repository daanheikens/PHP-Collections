<?php
declare(strict_types=1);

namespace Fi\Collection;

use Fi\Stream\StreamInterface;

/**
 * Interface CollectionInterface
 * @package Fi\Collection
 */
interface CollectionInterface extends StreamInterface, \IteratorAggregate, \Countable
{
    public function get(int $index);

    public function add($item): bool;

    public function addAll(array $items): bool;

    public function remove($item): bool;

    public function removeAll(array $items): bool;

    public function indexOf($item): int;

    public function isEmpty(): bool;

    public function clear(): void;
}