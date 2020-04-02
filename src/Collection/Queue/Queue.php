<?php

namespace Fi\Collection\Queue;

use Ds\Queue as InternalQueue;
use Fi\Collection\Collection;

/**
 * Class Queue
 * @package Fi\Collection\Queue
 * @method InternalQueue get()
 */
final class Queue extends Collection
{
    public function __construct(array $data = [], int $capacity = InternalQueue::MIN_CAPACITY)
    {
        parent::__construct(new InternalQueue($data));
        $this->collection->allocate($capacity);
    }
}
