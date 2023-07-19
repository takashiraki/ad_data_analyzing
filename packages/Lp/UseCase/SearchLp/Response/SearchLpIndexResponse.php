<?php

namespace Lp\UseCase\SearchLp\Response;

class SearchLpIndexResponse
{
    private $records;

    public function __construct(?array $records)
    {
        $this->records = $records;
    }

    public function getLpRecords(): ?array
    {
        return $this->records;
    }
}
