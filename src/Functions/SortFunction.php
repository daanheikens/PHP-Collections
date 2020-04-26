<?php
declare(strict_types=1);

namespace Fi\Functions;

use Fi\Util\Comparator;

interface SortFunction
{
    public function __invoke(Comparator $comparator): void;
}
