<?php

namespace MediaDtl\Domain\MediaDtlSummary;

interface MediumDtlSummaryRepositoryInterface
{
    public function find(
        ?string $medium_dtl_id,
        ?string $medium_dtl_name,
        ?string $medium_name
    ): ?array;
}
