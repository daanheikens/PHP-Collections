<?php
declare(strict_types=1);

namespace Fi\Collection\Queue;

use Fi\Collection\CollectionInterface;

/**
 * Interface QueueInterface
 * @package Fi\Collection\Queue
 */
interface QueueInterface extends CollectionInterface
{
    /**
     * Method to get the first item in the queue and remove it from the queue.
     * @return mixed
     */
    public function poll();

    /**
     * Method to get the first item in the queue.
     * @return mixed
     */
    public function peek();
}
