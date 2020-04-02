<?php

namespace Fi\Collection;

use Ds\Deque as InternalDeque;

/**
 * Class Dequeue
 * @package Fi\Collection
 * @method InternalDeque get()
 */
final class Dequeue extends Collection
{
    public function __construct(array $data = [], int $capacity = InternalDeque::MIN_CAPACITY)
    {
        parent::__construct(new InternalDeque($data));
        $this->collection->allocate($capacity);
    }
}
