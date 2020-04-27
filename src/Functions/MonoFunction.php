<?php
declare(strict_types=1);

namespace Fi\Functions;

interface MonoFunction
{
    /**
     * @param $value
     * @return mixed
     */
    public function apply($value);
}
