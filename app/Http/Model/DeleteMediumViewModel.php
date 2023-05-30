<?php

namespace App\Http\Model;

class DeleteMediumViewModel
{
    private $medium_id;
    private $medium_name;

    public function __construct(string $medium_id, string $medium_name)
    {
        $this->medium_id = $medium_id;
        $this->medium_name = $medium_name;
    }

    public function getMediumId()
    {
        return $this->medium_id;
    }

    public function getMediumName()
    {
        return $this->medium_name;
    }
}
