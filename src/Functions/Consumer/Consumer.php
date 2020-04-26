<?php
declare(strict_types=1);

namespace Fi\Functions\Consumer;

interface Consumer
{
    public function consume($value): void;
}
