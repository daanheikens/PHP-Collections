<?php
declare(strict_types=1);

namespace Fi\Collection\Queue;

use Ds\PriorityQueue as InternalPriorityQueue;
use Fi\Collection\Collection;
use Fi\Stream\Stream;

final class PriorityQueue extends Collection
{
    public function __construct(int $capacity = InternalPriorityQueue::MIN_CAPACITY)
    {
        parent::__construct(new InternalPriorityQueue());
        $this->collection->allocate($capacity);
    }
}
