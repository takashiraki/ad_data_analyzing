<?php

namespace Media\UseCase\DeleteMediumUseCase;

/**
 * --------------------------------------------------------------------------
 * # Data structure.
 * --------------------------------------------------------------------------
 * This class compose the response component.
 *
 *
 * ## Responsibility
 * The responsibility of this class has is make data structure of response.
 */
class DeleteMediumResponse
{
    /**
     * # Medium id.
     *
     * @var string
     */
    private $medium_id;

    /**
     * # Medium name.
     *
     * @var string
     */
    private $medium_name;

    /**
     * # Constructer.
     *
     * @param string $medium_id
     * @param string $medium_name
     */
    public function __construct(string $medium_id, string $medium_name)
    {
        $this->medium_id = $medium_id;
        $this->medium_name = $medium_name;
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
     * # Getter of medium name.
     *
     * @return string
     */
    public function getMediumName(): string
    {
        return $this->medium_name;
    }
}
