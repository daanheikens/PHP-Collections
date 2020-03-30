<?php
declare(strict_types=1);

namespace Fi\Stream;

use Traversable;

class Stream
{
    private Traversable $collection;

    public function __construct(Traversable $collection)
    {
        $this->collection = $collection;
    }

    public static function of(Traversable $collection): self
    {
        return new self($collection);
    }
}