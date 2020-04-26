<?php
declare(strict_types=1);

namespace Fi\Stream;

use Ds\Queue;

final class QueueStream
{
    private Queue $queue;

    public function __construct(Queue $queue)
    {
        /** @var Queue $copiedQueue */
        $copiedQueue = $queue->copy();
        $this->queue = $copiedQueue;
    }
}
