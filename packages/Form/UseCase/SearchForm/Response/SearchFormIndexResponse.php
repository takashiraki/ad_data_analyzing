<?php

namespace Form\UseCase\SearchForm\Response;

class SearchFormIndexResponse
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
