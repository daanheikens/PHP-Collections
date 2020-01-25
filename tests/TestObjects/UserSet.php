<?php
declare(strict_types=1);

namespace Tests\TestObjects;

use Fi\Collection\Set\Set;

/**
 * Class UserSet
 * @package Tests\TestObjects
 * @method User|null get(int $index)
 * @method add(User $item) : bool
 * @method addAll(User[] $items) : bool
 * @method remove(User $item) : bool
 * @method removeAll(User[] $items) : bool
 * @method User[] getIterator()
 */
class UserSet extends Set
{
    /**
     * @param User[] $items
     */
    public function __construct(array $items = [])
    {
        parent::__construct(User::class, $items);
    }
}
