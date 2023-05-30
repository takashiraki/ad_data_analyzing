<?php

namespace Media\UseCase\DeleteMediumUseCase;

interface DeleteMediumUseCaseInterface
{

    /**
     * Index info of Media.
     *
     * @param DeleteMediumRequest $request
     * @return DeleteMediumResponse
     */
    public function index(DeleteMediumRequest $request): DeleteMediumResponse;


    /**
     * # Input Boudary of media delete.
     *
     * @param DeleteMediumRequest $request
     * @return DeleteMediumResponse
     */
    public function handle(DeleteMediumRequest $request): DeleteMediumResponse;
}
