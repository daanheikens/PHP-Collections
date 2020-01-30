<?php
declare(strict_types=1);

namespace Fi\Stream;

use Exception;

class StreamException extends Exception
{
    public const ERR_UNPROCCESABLE_STREAMABLE = "Provided object of type Streamable must be iterable and countable";
}
