<?php
declare(strict_types=1);

namespace Fi\Collection;

use Ds\Set as InternalSet;

/**
 * Class Set
 * @package Fi\Collection
 * @method InternalSet get()
 */
final class Set extends Collection
{
    public function __construct(array $values = null)
    {
        parent::__construct($values ? new InternalSet($values) : new InternalSet());
    }
}