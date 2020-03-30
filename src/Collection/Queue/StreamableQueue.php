<?php

namespace Fi\Collection;

use Ds\Queue;
use Fi\Stream\Stream;
use Fi\Stream\Streamable;

class StreamableQueue implements Streamable
{
    private Queue $queue;

    public function __construct(array $data = [])
    {
        $this->queue = new Queue($data);
    }

    public function stream(): Stream
    {
        return new Stream($this->queue);
    }

    public function getQueue(): Queue
    {
        return $this->queue;
    }
}
