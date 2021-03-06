<?php
declare(strict_types=1);

namespace Fi\Util;

class ScalarComparator implements Comparator
{
    /**
     * @param int|float $varA
     * @param int|float $varB
     * @return int
     */
    public function compare($varA, $varB): int
    {
        return $varA <=> $varB;
    }
}
