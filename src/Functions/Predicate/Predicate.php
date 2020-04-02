<?php
declare(strict_types=1);

namespace Fi\Functions\Predicate;
/**
 * Interface Predicate
 * @package Fi\Functions\Predicate
 * @template T
 */
interface Predicate
{
    /**
     * @param T $value
     * @return bool
     */
    public function test($value): bool;
}