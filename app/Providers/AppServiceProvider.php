<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Media\DebugInfrastructure\FileMediumRepository;
use Media\Domain\DomainService\MediumDomainService;
use Media\Domain\Media\MediumRepositoryInterface;
use Media\EloquentInfrastructure\Persistence\EloquentMediumRepository;
use Media\MockInteractor\Create\MockCreateMediumInteractor;
use Media\MockInteractor\Delete\MockDeleteMediumInteractor;
use Media\UseCase\CreateMediumUseCase\CreateMediumUseCaseInterface;
use Media\MockInteractor\Edit\MockEditMediumInteractor;
use Media\MockInteractor\Search\MockSearchMediumInteractor;
use Media\UseCase\DeleteMediumUseCase\DeleteMediumUseCaseInterface;
use Media\UseCase\EditMediumUseCase\EditMediumUseCaseInterface;
use Media\UseCase\SearchMediumUseCase\SearchMediumUseCaseInterface;

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
     * Register any mocke services.
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
            DeleteMediumUseCaseInterface::class,
            MockDeleteMediumInteractor::class
        );

        $this->app->bind(
            EditMediumUseCaseInterface::class,
            MockEditMediumInteractor::class
        );

        $this->app->bind(
            SearchMediumUseCaseInterface::class,
            MockSearchMediumInteractor::class
        );

        $this->app->bind(
            MediumDomainService::class,
            MediumDomainService::class
        );

        // $this->app->bind(
        //     MediumRepositoryInterface::class,
        //     FileMediumRepository::class
        // );

        $this->app->bind(
            MediumRepositoryInterface::class,
            EloquentMediumRepository::class,
        );
    }
}
