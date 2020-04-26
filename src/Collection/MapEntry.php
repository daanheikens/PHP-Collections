<?php
declare(strict_types=1);

namespace Fi\Collection;

final class MapEntry
{
    private string $key;
    private $value;

    public function __construct(string $key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }
}
