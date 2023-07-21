<?php

namespace App\Http\Model\Form\Search;

class SearchFormIndexViewModel
{
    private $records;

    public function __construct(?array $records)
    {
        $this->records = $records;
    }

    public function getRecords(): ?array
    {
        return $this->records;
    }
}
