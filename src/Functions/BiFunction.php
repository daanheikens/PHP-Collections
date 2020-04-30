<?php
declare(strict_types=1);

namespace Fi\Functions;

interface BiFunction
{
    /**
     * @param mixed $valueA
     * @param mixed $valueB
     * @return mixed
     */
    public function apply($valueA, $valueB);
}
