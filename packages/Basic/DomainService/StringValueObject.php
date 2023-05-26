<?php

namespace Basic\DomainService;

abstract class StringValueObject
{
    private $value;

    protected function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
