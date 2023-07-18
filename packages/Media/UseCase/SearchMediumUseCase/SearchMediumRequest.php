<?php

namespace Media\UseCase\SearchMediumUseCase;

/**
 * --------------------------------------------------------------------------
 * # Data structure
 * --------------------------------------------------------------------------
 *
 *
 * ## Responsibility
 * The responsibility this class has is to make data structure of request.
 */
class SearchMediumRequest
{
    /**
     * # Medium id.
     *
     * @var string|null
     */
    private $medium_id;

    /**
     * # Medium name.
     *
     * @var string|null
     */
    private $medium_name;

    public function __construct(
        null|string $medium_id,
        null|string $medium_name
    ) {
        $this->medium_id = $medium_id;
        $this->medium_name = $medium_name;
    }

    /**
     * Getter of medium id.
     *
     * @return string|null
     */
    public function getMediumId(): ?string
    {
        return $this->medium_id;
    }

    /**
     * Getter of medium name.
     *
     * @return string|null
     */
    public function getMediumName(): ?string
    {
        return $this->medium_name;
    }
}
