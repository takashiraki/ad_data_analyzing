<?php

namespace MediaDtl\UseCase\CreateMediaDtlUseCase;

interface CreateMediumDtlUseCaseInterface
{
    public function index(): CreateMediumDtlResponse;

    public function handle(CreateMediumDtlRequest $request): CreateMediumDtlResponse;
}
