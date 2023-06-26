<?php

namespace MediaDtl\UseCase\EditMediumDtlUseCase;

use Media\UseCase\EditMediumUseCase\EditMediumDtlResponse\EditMediumDtlSaveResponse;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlRequest\EditMediumDtlSaveRequest;

interface EditMediumDtlUseCaseInterface
{
    public function index(EditMediumDtlRequest $request): EditMediumDtlResponse;

    public function handle(EditMediumDtlSaveRequest $request): EditMediumDtlSaveResponse;
}
