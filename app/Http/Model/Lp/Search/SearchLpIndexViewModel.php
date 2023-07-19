<?php

namespace App\Http\Model\Lp\Search;

class SearchLpIndexViewModel
{
    private $query_lp_name;
    private $query_lp_directory;
    private $lp_records;

    public function __construct(
        ?string $query_lp_name,
        ?string $query_lp_directory,
        ?array $lp_records
    ) {
        $this->query_lp_name = $query_lp_name;
        $this->query_lp_directory = $query_lp_directory;
        $this->lp_records = $lp_records;
    }

    public function getQueryLpName(): ?string
    {
        return $this->query_lp_name;
    }

    public function getQueryLpDirectory(): ?string
    {
        return $this->query_lp_directory;
    }

    public function getLpRecords(): ?array
    {
        return $this->lp_records;
    }
}
