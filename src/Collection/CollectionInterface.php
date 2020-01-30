<?php
declare(strict_types=1);

namespace Fi\Collection;

use Countable;
use Fi\Stream\Stream;
use IteratorAggregate;

/**
 * Interface CollectionInterface
 * @package Fi\Collection
 */
interface CollectionInterface extends IteratorAggregate, Countable
{
    public function add($item): void;

    public function addAll(array $items): void;

    public function contains($item): bool;

    public function remove($item): bool;

    public function removeAll(array $items): bool;

    public function indexOf($item): int;

    public function isEmpty(): bool;

    public function clear(): void;

    public function stream(): Stream;
}