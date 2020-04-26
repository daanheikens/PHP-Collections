<?php
declare(strict_types=1);

namespace Fi\Functions\Predicate;

interface Predicate
{
    public function test($value): bool;
}
