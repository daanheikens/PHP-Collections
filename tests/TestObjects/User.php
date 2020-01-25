<?php

namespace Tests\TestObjects;

/**
 * Class User
 * @package Tests\TestObjects
 */
class User
{
    /** @var string */
    private $name;

    /** @var int */
    private $age;

    /**
     * User constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}
