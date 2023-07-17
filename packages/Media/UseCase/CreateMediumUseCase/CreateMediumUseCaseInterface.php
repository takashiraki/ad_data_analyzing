<?php

namespace Media\UseCase\CreateMediumUseCase;

/**
 * --------------------------------------------------------------------------
 * # Interactor
 * --------------------------------------------------------------------------
 * Achieving UseCase of create Medium.
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
 * The usecase of this class is media registration.
 */
interface CreateMediumUseCaseInterface
{
    /**
     * # Input Boundary.
     *
     * Create Response using request data stucture.
     *
     * @param CreateMediumRequest $request
     *
     * @return CreateMediumResponse
     */
    public function handle(CreateMediumRequest $request): CreateMediumResponse;
}
