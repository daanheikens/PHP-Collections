<?php
declare(strict_types=1);

namespace Fi\Functions\Scalar;

/**
 * Interface ToIntFunction
 * @package Fi\Functions\Scalar
 * @template T
 */
interface ToIntFunction
{
    /**
     * @param T $value
     * @return int
     */
    public function toInt($value): int;
}