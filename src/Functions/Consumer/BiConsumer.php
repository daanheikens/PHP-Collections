<?php
declare(strict_types=1);

namespace Fi\Functions\Consumer;

interface BiConsumer
{
    /**
     * @param mixed $valueA
     * @param mixed $valueB
     */
    public function consume($valueA, $valueB): void;
}
