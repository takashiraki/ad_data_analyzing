<?php

namespace Media\UseCase\EditMediumUseCase;

/**
 * --------------------------------------------------------------------------
 * # Interactor
 * --------------------------------------------------------------------------
 * Achieving UseCase of edit medium.
 * 
 * ## Responsibility
 * 
 * The responsibility of this interface is to compose the application Usecase.
 * 
 * ## Dependency injection
 * 
 * This interface doing dependency injection in the AppServiceProvider.
 * 
 * ## UseCase
 * 
 * The UseCas of this class is media editing.
 */
interface EditMediumUseCaseInterface
{

    /**
     * # Index info of media.
     *
     * @param EditMediumRequest $request
     * @return EditMediumResponse
     */
    public function index(EditMediumRequest $request): EditMediumResponse;


    /**
     * # Input Boundary of medium edit
     *
     * @param EditMediumRequest $request
     * @return EditMediumResponse
     */
    public function handle(EditMediumRequest $request): EditMediumResponse;
}
