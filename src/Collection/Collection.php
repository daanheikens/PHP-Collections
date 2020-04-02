<?php
declare(strict_types=1);

namespace Fi\Collection;

use Ds\Collection as InternalCollection;
use Fi\Stream\Stream;

abstract class Collection
{
    protected InternalCollection $collection;

    public function __construct(InternalCollection $collection)
    {
        $this->collection = $collection;
    }

    public function get()
    {
        return $this->collection;
    }

    public function stream(): Stream
    {
        return new Stream($this->collection);
    }
}
