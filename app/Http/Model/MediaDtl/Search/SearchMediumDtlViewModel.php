<?php

namespace App\Http\Model\MediaDtl\Search;

class SearchMediumDtlViewModel
{
    private $query_medium_dtl_id;

    private $query_medium_dtl_name;

    private $query_medium_name;

    private $medium_dtl_reocords;

    public function __construct(
        ?string $query_medium_dtl_id,
        ?string $query_medium_dtl_name,
        ?string $query_medium_name,
        ?array $medium_dtl_reocords
    ) {
        $this->query_medium_dtl_id = $query_medium_dtl_id;
        $this->query_medium_dtl_name = $query_medium_dtl_name;
        $this->query_medium_name = $query_medium_name;
        $this->medium_dtl_reocords = $medium_dtl_reocords;
    }

    public function getQueryMediumDtlId(): ?string
    {
        return $this->query_medium_dtl_id;
    }

    public function getQueryMediumDtlName(): ?string
    {
        return $this->query_medium_dtl_name;
    }

    public function getQueryMediumName(): ?string
    {
        return $this->query_medium_name;
    }

    public function getMediumDtlRecords(): ?array
    {
        return $this->medium_dtl_reocords;
    }
}
