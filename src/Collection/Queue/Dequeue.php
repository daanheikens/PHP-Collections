<?php
declare(strict_types=1);

namespace Fi\Collection\Queue;

use Ds\Deque;
use Ds\Deque as InternalDeque;

/**
 * Class Dequeue
 * @package Fi\Collection
 */
final class Dequeue
{
    private Deque $deque;

    public function __construct(array $data = [], int $capacity = InternalDeque::MIN_CAPACITY)
    {
        $this->deque = new InternalDeque($data);
        $this->deque->allocate($capacity);
    }

    public function get(): Deque
    {
        return $this->deque;
    }
}
