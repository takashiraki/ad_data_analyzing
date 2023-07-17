<?php

namespace MediaDtl\UseCase\EditMediumDtlUseCase;

use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlRequest\EditMediumDtlSaveRequest;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlRequest\EditMediumDtlViewRequest;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlResponse\EditMediumDtlSaveResponse;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlResponse\EditMediumDtlViewResponse;

interface EditMediumDtlUseCaseInterface
{
    public function index(EditMediumDtlViewRequest $request): EditMediumDtlViewResponse;

    public function handle(EditMediumDtlSaveRequest $request): EditMediumDtlSaveResponse;
}
