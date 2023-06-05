<?php

namespace App\Http\Model;

use Illuminate\Support\Collection;

class SearchMediumViewModel
{
    private $records;

    public function __construct(?array $records)
    {
        $this->records = $records;
    }

    public function getMediumRecords(): ?array
    {
        return $this->records;
    }
}
