<?php

namespace Media\UseCase\SearchMediumUseCase;

class SearchMediumResponse
{
    private $records;

    public function __construct(?array $records)
    {
        $this->records = $records;
    }

    public function getMediumRecords()
    {
        return $this->records;
    }
}
