<?php
declare(strict_types=1);

namespace Fi\Collection\Queue;

use Ds\PriorityQueue as InternalPriorityQueue;

final class PriorityQueue
{
    private InternalPriorityQueue $queue;

    public function __construct(int $capacity = InternalPriorityQueue::MIN_CAPACITY)
    {
        $this->queue = new InternalPriorityQueue();
        $this->queue->allocate($capacity);
    }

    public function getData(): InternalPriorityQueue
    {
        return $this->queue;
    }
}
