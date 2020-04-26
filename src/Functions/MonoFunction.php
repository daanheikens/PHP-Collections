<?php
declare(strict_types=1);

namespace Fi\Functions;

interface MonoFunction
{
    public function apply($value);
}
