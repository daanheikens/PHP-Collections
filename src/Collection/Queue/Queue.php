<?php
declare(strict_types=1);

namespace Fi\Queue;

use Fi\Collection\Queue\QueueInterface;
use Fi\Stream\Stream;

/**
 * Class Queue
 * @package Fi\Queue
 */
abstract class Queue implements QueueInterface
{
    /** @var array */
    private $queue;

    public function poll()
    {
       // TODO: Implement poll() method.
    }

    public function peek()
    {
        // TODO: Implement peek() method.
    }

    public function add($item): void
    {
        // TODO: Implement add() method.
    }

    public function addAll(array $items): void
    {
        // TODO: Implement addAll() method.
    }

    public function contains($item): bool
    {
        // TODO: Implement contains() method.
    }

    public function remove($item): bool
    {
        // TODO: Implement remove() method.
    }

    public function removeAll(array $items): bool
    {
        // TODO: Implement removeAll() method.
    }

    public function indexOf($item): int
    {
        // TODO: Implement indexOf() method.
    }

    public function isEmpty(): bool
    {
        // TODO: Implement isEmpty() method.
    }

    public function clear(): void
    {
        // TODO: Implement clear() method.
    }

    public function stream(): Stream
    {
        // TODO: Implement stream() method.
    }

}