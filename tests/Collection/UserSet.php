<?php
declare(strict_types=1);

namespace Tests\Collection;

use Fi\Collection\Set;
use Tests\TestObjects\User;

/**
 * Class UserSet
 * @package Tests\Collection
 * @method add(User $item) : bool
 * @method addAll(User[] $items) : bool
 */
class UserSet extends Set
{

}
