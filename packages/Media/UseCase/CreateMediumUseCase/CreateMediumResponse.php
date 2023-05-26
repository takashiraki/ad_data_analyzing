<?php

namespace Media\UseCase\CreateMediumUseCase;

use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;

/**
 * --- Data structure ---
 * This class composes the response component.
 * 
 * --- Responsibility ---
 * The responsibility that this class has is make data structure of response.
 */
class CreateMediumResponse
{

    /**
     * Medium id
     *
     * @var string
     */
    private $medium_id;


    /**
     * Medium name
     *
     * @var string
     */
    private $medium_name;


    /**
     * Constructer.
     *
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name)
    {
        $this->medium_id = $id;
        $this->medium_name = $name;
    }


    /**
     * Getter of medium id.
     *
     * @return string
     */
    public function getMediumId(): string
    {
        return $this->medium_id;
    }


    /**
     * Getter of medium name.
     *
     * @return string
     */
    public function getMediumName(): string
    {
        return $this->medium_name;
    }
}
