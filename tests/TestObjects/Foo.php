<?php
declare(strict_types=1);

namespace Tests\TestObjects;

class Foo
{
    private $name = 'foo';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}