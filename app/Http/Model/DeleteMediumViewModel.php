<?php

namespace App\Http\Model;

/**
 * --------------------------------------------------------------------------
 * # Data structure of ViewModel
 * --------------------------------------------------------------------------
 *
 *
 * ## Responsibility
 * The responsibility this class has is for Media.
 * This class has to create view model.
 */
class DeleteMediumViewModel
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
     * @return string
     */
    public function getMediumName(): string
    {
        return $this->medium_name;
    }
}
