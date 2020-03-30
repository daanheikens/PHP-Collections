<?php
declare(strict_types=1);

namespace Fi\Stream;

interface Streamable
{
    public function stream(): Stream;
}