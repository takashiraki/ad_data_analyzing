<?php

namespace App\Http\Model;

/**
 * --------------------------------------------------------------------------
 * # Data Structure of ViewModel
 * --------------------------------------------------------------------------
 * 
 * ## Responsibility
 * The responsibility this class has is for Media.
 * This class has to create view model.
 * 
 */
class CreateMediumViewModel
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
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name)
    {
        $this->medium_id = $id;
        $this->medium_name = $name;
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
