<?php

namespace Basic\DomainService;

/**
 * --------------------------------------------------------------------------
 * # Value Object
 * --------------------------------------------------------------------------
 */
abstract class StringValueObject
{

    /**
     * # String value object.
     *
     * @var string
     */
    private $value;


    /**
     * # Constructer.
     *
     * @param string $value
     */
    protected function __construct(string $value)
    {
        $this->value = $value;
    }


    /**
     * # Getter of value object.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
