<?php
declare(strict_types=1);

namespace Fi\Util;

interface Comparator
{
    /**
     * @param mixed $varA
     * @param mixed $varB
     * @return int
     */
    public function compare($varA, $varB): int;
}