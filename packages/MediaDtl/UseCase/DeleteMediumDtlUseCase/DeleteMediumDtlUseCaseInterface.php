<?php

namespace MediaDtl\UseCase\DeleteMediumDtlUseCase;

use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlRequest\DeleteMediumDtlHandleRequest;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlRequest\DeleteMediumDtlIndexRequest;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlResponse\DeleteMediumDtlHandleResponse;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlResponse\DeleteMediumDtlIndexResponse;

interface DeleteMediumDtlUseCaseInterface
{
    public function index(DeleteMediumDtlIndexRequest $request): DeleteMediumDtlIndexResponse;

    public function handle(DeleteMediumDtlHandleRequest $request): DeleteMediumDtlHandleResponse;
}
