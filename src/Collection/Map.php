<?php
declare(strict_types=1);

namespace Fi\Collection;

use Ds\Map as InternalMap;

/**
 * Class Map
 * @package Fi\Collection
 * @method InternalMap get()
 */
final class Map extends Collection
{
    public function __construct(array $values = null)
    {
        parent::__construct($values ? new InternalMap($values) : new InternalMap());
    }
}
