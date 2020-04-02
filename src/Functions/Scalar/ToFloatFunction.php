<?php
declare(strict_types=1);

namespace Fi\Functions\Scalar;
/**
 * Interface ToFloatFunction
 * @package Fi\Functions\Scalar
 * @template T
 */
interface ToFloatFunction
{
    public const TO_FLOAT = 'toFloat';

    /**
     * @param T $value
     * @return float
     */
    public function toFloat($value): float;
}