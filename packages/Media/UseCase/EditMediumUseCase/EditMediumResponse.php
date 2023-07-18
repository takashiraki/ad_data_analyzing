<?php

namespace Media\UseCase\EditMediumUseCase;

/**
 * --------------------------------------------------------------------------
 * # Data Structure
 * --------------------------------------------------------------------------
 * This class compose the response component.
 *
 * ## Responsibility
 * The responsibility this class has is to make data structure of response.
 */
class EditMediumResponse
{
    /**
     * # Medium id
     *
     * @var string
     */
    private $medium_id;

    /**
     * # Medium name
     *
     * @var string
     */
    private $medium_name;

    /**
     * # Constructer.
     *
     * @param string $id
     * @param string $value
     */
    public function __construct(string $id, string $value)
    {
        $this->medium_id = $id;
        $this->medium_name = $value;
    }

    /**
     * # Getter of Medium id.
     *
     * @return string
     */
    public function getMediumId(): string
    {
        return $this->medium_id;
    }

    /**
     * # Getter of Medium name.
     *
     * @return string|null
     */
    public function getMediumName(): ?string
    {
        return $this->medium_name;
    }
}
