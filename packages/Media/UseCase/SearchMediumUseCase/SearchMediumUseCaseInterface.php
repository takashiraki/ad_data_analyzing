<?php

namespace Media\UseCase\SearchMediumUseCase;

/**
 * --------------------------------------------------------------------------
 * # Interactor
 * --------------------------------------------------------------------------
 *
 *
 * ## Responsibility
 * The responsibility this interface has is compose the application usecase.
 * You have to implement this interface if you create usecase.
 *
 *
 * ## Dependency injection
 * This interface doing dependency injection in the AppServiceProvider.
 *
 *
 * ## UseCase
 * The usecase of this class is media search.
 */
interface SearchMediumUseCaseInterface
{
    public function index(SearchMediumRequest $request): SearchMediumResponse;
}
