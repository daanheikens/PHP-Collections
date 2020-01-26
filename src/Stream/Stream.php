<?php
declare(strict_types=1);

namespace Fi\Stream;

class Stream
{
    /** @var StreamInterface */
    private $streamable;

    /**
     * Stream constructor.
     * @param StreamInterface $streamable
     */
    public function __construct(StreamInterface $streamable)
    {
        $this->streamable = $streamable;
    }
}
