<?php

namespace MediaDtl\Domain\Media;

class Medium
{
    private $medium_id;
    private $medium_name;

    public function __construct(MediumId $id, MediumName $name)
    {
        $this->medium_id = $id;
        $this->medium_name = $name;
    }

    public function getMediumId(): MediumId
    {
        return $this->medium_id;
    }

    public function getMediumName(): MediumName
    {
        return $this->medium_name;
    }
}
