<?php
declare(strict_types=1);

namespace Fi\Collection\Queue;

use Ds\Queue as InternalQueue;
use Fi\Stream\QueueStream;

/**
 * Class Queue
 * @package Fi\Collection\Queue
 */
final class Queue
{
    private InternalQueue $queue;

    public function __construct(array $data = [], int $capacity = InternalQueue::MIN_CAPACITY)
    {
        $this->queue = new InternalQueue($data);
        $this->queue->allocate($capacity);
    }

    public function get(): InternalQueue
    {
        return $this->queue;
    }

    public function stream()
    {
        return new QueueStream($this->queue);
    }
}
