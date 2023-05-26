<?php

namespace Media\UseCase\CreateMediumUseCase;

/**
 * --- Data structure ---
 * This class composes the request component.
 * 
 * --- Responsibility ---
 * The responsibility that this class has is make data structure of request.
 */
class CreateMediumRequest
{

    /**
     * Medium name user inputing from form.
     *
     * @var string
     */
    private $medium_name;


    /**
     * Constructer.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->medium_name = $value;
    }


    /**
     * Getter of medium name user inputing from form.
     *
     * @return string
     */
    public function getMediumName(): string
    {
        return $this->medium_name;
    }
}
