<?php

namespace Media\UseCase\DeleteMediumUseCase;

/**
 * --------------------------------------------------------------------------
 * # Data structure
 * --------------------------------------------------------------------------
 * This class compose the request componet.
 * 
 * 
 * ## Responsibility
 * The responsibility this class has is make data structure of request.
 */
class DeleteMediumRequest
{

    /**
     * # Medium id.
     *
     * @var string
     */
    private $medium_id;


    /**
     * # Constructer.
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->medium_id = $id;
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
}
