<?php
declare(strict_types=1);

namespace Fi\Collection\Queue;

use Fi\Collection\CollectionInterface;

interface QueueInterface extends CollectionInterface
{
    public function poll();

    public function peek();
}
