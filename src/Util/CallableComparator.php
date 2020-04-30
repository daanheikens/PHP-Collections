<?php
declare(strict_types=1);

namespace Fi\Stream;

interface CallableComparator
{
    /**
     * @param mixed $varA
     * @param mixed $varB
     * @return int
     */
    public function __invoke($varA, $varB): int;
}
