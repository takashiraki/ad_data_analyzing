<?php

namespace Media\Domain\Media;

/**
 * --------------------------------------------------------------------------
 * # ValueObject of medium
 * --------------------------------------------------------------------------
 */
class Medium
{
    /**
     * # Medium Id.
     *
     * @var MediumId
     */
    private $medium_id;


    /**
     * # Medium Name.
     *
     * @var MediumName
     */
    private $medium_name;


    /**
     * # Constructer.
     *
     * @param MediumId $medium_id
     * @param MediumName $medium_name
     */
    public function __construct(MediumId $medium_id, MediumName $medium_name)
    {
        $this->medium_id = $medium_id;
        $this->medium_name = $medium_name;
    }


    /**
     * # Getter of medium id.
     *
     * @return MediumId
     */
    public function getMediumId(): MediumId
    {
        return $this->medium_id;
    }


    /**
     * # Getter of medium name.
     *
     * @return MediumName
     */
    public function getMediumName(): MediumName
    {
        return $this->medium_name;
    }
}
