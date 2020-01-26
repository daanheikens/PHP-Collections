<?php
declare(strict_types=1);

namespace Fi\Stream;

use function is_countable;
use function is_iterable;

trait StreamAccessor
{
    /**
     * @param StreamInterface $streamable
     * @return Stream
     * @throws StreamException
     */
    public function stream(StreamInterface $streamable): Stream
    {
        if (!is_iterable($streamable) || !is_countable($streamable)) {
            throw new StreamException(StreamException::ERR_UNPROCCESABLE_STREAMABLE);
        }
        return new Stream($streamable);
    }
}
