<?php
declare(strict_types=1);

namespace Fi\Util;

use RuntimeException;

class ScalarComparator implements Comparator
{
    /**
     * @param int|float $varA
     * @param int|float $varB
     * @return int
     */
    public function compare($varA, $varB): int
    {
        if ($varA > $varB) {
            return 1;
        }
        if ($varA < $varB) {
            return -1;
        }
        if ($varA == $varB) {
            return 0;
        }

        throw new RuntimeException("Scalar comparison failed");
    }
}
