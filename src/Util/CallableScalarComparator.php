<?php
declare(strict_types=1);

namespace Fi\Util;

use Fi\Stream\CallableComparator;

class CallableScalarComparator implements CallableComparator
{
    /**
     * @param int|float $varA
     * @param int|float $varB
     * @return int
     */
    public function __invoke($varA, $varB): int
    {
        return $varA <=> $varB;
    }
}
