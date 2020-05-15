<?php
declare(strict_types=1);

namespace Fi\Stream;

final class IntStream
{
    /** @var int[] */
    private array $values;

    /**
     * @param int[] $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public function toArray(): array
    {
        return $this->values;
    }
}
