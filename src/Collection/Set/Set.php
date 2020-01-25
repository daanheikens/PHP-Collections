<?php
declare(strict_types=1);

namespace Fi\Collection\Set;

use Fi\Collection\Collection;

/**
 * Class Set
 * @package Fi\Collection\Set
 */
abstract class Set extends Collection
{
    /** @var string */
    private $type;

    public function __construct(string $type, array $items = [])
    {
        parent::__construct();
        foreach ($items as $item) {
            $class = get_class($item);
            if ($class !== $type) {
                return;
            }
        }
        $this->type = $type;
        $this->items = $items;
    }

    public function add($item): bool
    {
        if (get_class($item) !== $this->type) {
            return false;
        }
        return parent::add($item);
    }

    public function addAll(array $items): bool
    {
        foreach ($items as $item) {
            if (get_class($item) !== $this->type) {
                return false;
            }
        }
        return parent::addAll($items);
    }
}
