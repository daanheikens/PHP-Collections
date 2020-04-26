<?php
declare(strict_types=1);

namespace Fi\Stream;

final class FloatStream
{
    /** @var float[] */
    private array $values;

    /**
     * @param float[] $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }
}
