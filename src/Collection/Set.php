<?php
declare(strict_types=1);

namespace Fi\Collection;

use Ds\Set as InternalSet;
use Fi\Stream\SetStream;

/**
 * Class Set
 * @package Fi\Collection
 */
final class Set
{
    private InternalSet $set;

    public function __construct(array $values = [])
    {
        $this->set = new InternalSet($values);
    }

    public function getData()
    {
        return $this->set;
    }

    public function stream()
    {
        return new SetStream($this->set);
    }
}
