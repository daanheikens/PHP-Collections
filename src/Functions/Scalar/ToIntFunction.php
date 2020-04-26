<?php
declare(strict_types=1);

namespace Fi\Functions\Scalar;

interface ToIntFunction
{
    public function applyAsInt($value): int;
}