<?php
declare(strict_types=1);

namespace Fi\Functions\Consumer;

/**
 * Interface Consumer
 * @package Fi\Functions\Consumer
 * @template T
 */
interface Consumer
{
    /**
     * @param T $value
     */
    public function accept($value): void;
}