<?php

namespace Media\UseCase\EditMediumUseCase;

/**
 * --------------------------------------------------------------------------
 * Data structure
 * --------------------------------------------------------------------------
 * 
 * 
 * ## Responsibility
 * 
 * The responsibility this class has is to make data structure of request.
 */
class EditMediumRequest
{

    /**
     * # Medium id.
     *
     * @var [type]
     */
    private $medium_id;


    /**
     * # Medium name user inputing from form.
     *
     * @var [type]
     */
    private $medium_name;


    /**
     * # Constructer.
     *
     * @param string $id
     * @param string|null $update_medium_name
     */
    public function __construct(string $id, string $update_medium_name = null)
    {
        $this->medium_id = $id;
        $this->medium_name = $update_medium_name;
    }


    /**
     * # Getter of medium id.
     *
     * @return string
     */
    public function getMediumId(): string
    {
        return $this->medium_id;
    }


    /**
     * # Getter of medium name user inputing from form.
     *
     * @return string
     */
    public function getMediumName(): string
    {
        return $this->medium_name;
    }
}
