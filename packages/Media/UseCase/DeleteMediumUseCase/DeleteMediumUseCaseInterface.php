<?php

namespace Media\UseCase\DeleteMediumUseCase;

/**
 * --------------------------------------------------------------------------
 * # Interactor
 * --------------------------------------------------------------------------
 * Achieving UseCase of delete medium.
 *
 *
 * ## Responsibility
 * The responsibility this interface has is to compose the application usecase.
 * You have to implement this interface if you create usecase.
 *
 *
 * ## Dependency injection
 * This interface doing dependency injection in the AppServiceProvider.
 *
 *
 * ## UseCase
 * The usecase of this class is media delete.
 */
interface DeleteMediumUseCaseInterface
{
    /**
     * Index info of Media.
     *
     * @param DeleteMediumRequest $request
     *
     * @return DeleteMediumResponse
     */
    public function index(DeleteMediumRequest $request): DeleteMediumResponse;

    /**
     * # Input Boudary of media delete.
     *
     * @param DeleteMediumRequest $request
     *
     * @return DeleteMediumResponse
     */
    public function handle(DeleteMediumRequest $request): DeleteMediumResponse;
}
