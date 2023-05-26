<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Media\DebugInfrastructure\FileMediumRepository;
use Media\Domain\DomainService\MediumDomainService;
use Media\Domain\Media\MediumRepositoryInterface;
use Media\MockInteractor\Create\MockCreateMediumInteractor;
use Media\UseCase\CreateMediumUseCase\CreateMediumUseCaseInterface;
use Media\MockInteractor\Edit\MockEditMediumInteractor;
use Media\UseCase\EditMediumUseCase\EditMediumUseCaseInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerForMock();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Mocke services.
     */
    private function registerForMock()
    {
        $this->app->bind(
            CreateMediumUseCaseInterface::class,
            MockCreateMediumInteractor::class
        );

        $this->app->bind(
            EditMediumUseCaseInterface::class,
            MockEditMediumInteractor::class
        );

        $this->app->bind(
            MediumDomainService::class,
            MediumDomainService::class
        );

        $this->app->bind(
            MediumRepositoryInterface::class,
            FileMediumRepository::class
        );
    }
}
