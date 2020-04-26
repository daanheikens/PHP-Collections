<?php
declare(strict_types=1);

namespace Fi\Functions\Scalar;

interface ToFloatFunction
{
    public function applyAsFloat($value): float;
}
