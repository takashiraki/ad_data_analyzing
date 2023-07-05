<?php

namespace MediaDtl\Domain\MediaDtlSummary;

use MediaDtl\Domain\Media\MediumName;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlName;

interface MediumDtlSummaryRepositoryInterface
{
    public function find(
        ?string $medium_dtl_id,
        ?string $medium_dtl_name,
        ?string $medium_name
    ): ?array;
}
