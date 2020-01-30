<?php
declare(strict_types=1);

namespace Fi\Stream;

use Fi\Collection\CollectionInterface;

/**
 * Class Stream
 * @package Fi\Stream
 */
class Stream
{
    /** @var CollectionInterface */
    private $collection;

    /**
     * Stream constructor.
     * @param CollectionInterface $collection
     */
    public function __construct(CollectionInterface $collection)
    {
        $this->collection = $collection;
    }
}
