<?php

namespace App\Providers;

use Form\DebugInfrastructure\FileFormRepository;
use Form\Domain\Form\FormRepositoryInterface;
use Form\MockInteractor\Create\MockCreateFormInteractor;
use Form\MockInteractor\Delete\MockDeleteFormInteractor;
use Form\MockInteractor\Edit\MockEditFormInteractor;
use Form\MockInteractor\Search\MockSearchFormInteractor;
use Form\UseCase\CreateForm\CreateFormUseCaseInterface;
use Form\UseCase\DeleteForm\DeleteFormUseCaseInterface;
use Form\UseCase\EditForm\EditFormUseCaseInterface;
use Form\UseCase\SearchForm\SearchFormUseCaseInterface;
use Illuminate\Support\ServiceProvider;
use Lp\DebugInfrastructure\FileLpRepository;
use Lp\Domain\Lp\LpRepositoryInterface;
use Lp\MockInteractor\Create\MockCreateLpInteractor;
use Lp\MockInteractor\Delete\MockDeleteLpInteractor;
use Lp\MockInteractor\Edit\MockEditLpInteractor;
use Lp\MockInteractor\Search\MockSearchLpInteractor;
use Lp\UseCase\CreateLp\CreateLpUseCaseInterface;
use Lp\UseCase\DeleteLp\DeleteLpUseCaseInterface;
use Lp\UseCase\EditLp\EditLpUseCaseInterface;
use Lp\UseCase\SearchLp\SearchLpUseCaseInterface;
use Media\DebugInfrastructure\FileMediumRepository;
use Media\Domain\DomainService\MediumDomainService;
use Media\Domain\Media\MediumRepositoryInterface;
use Media\EloquentInfrastructure\Persistence\EloquentMediumRepository;
use Media\MockInteractor\Create\MockCreateMediumInteractor;
use Media\MockInteractor\Delete\MockDeleteMediumInteractor;
use Media\MockInteractor\Edit\MockEditMediumInteractor;
use Media\MockInteractor\Search\MockSearchMediumInteractor;
use Media\UseCase\CreateMediumUseCase\CreateMediumUseCaseInterface;
use Media\UseCase\DeleteMediumUseCase\DeleteMediumUseCaseInterface;
use Media\UseCase\EditMediumUseCase\EditMediumUseCaseInterface;
use Media\UseCase\SearchMediumUseCase\SearchMediumUseCaseInterface;
use MediaDtl\DebugInfrastructure\FileMediumDtlRepository;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;
use MediaDtl\MockInteractor\Create\MockCreateMediumDtlInteractor;
use MediaDtl\MockInteractor\Delete\MockDeleteMediumDtlInteractor;
use MediaDtl\MockInteractor\Edit\MockEditMediumDtlInteractor;
use MediaDtl\MockInteractor\Search\MockSearchMediumDtlInteractor;
use MediaDtl\UseCase\CreateMediaDtlUseCase\CreateMediumDtlUseCaseInterface;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlUseCaseInterface;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlUseCaseInterface;
use MediaDtl\UseCase\SearchMediumDtlUseCase\SearchMediumDtlUseCaseInterface;
use User\DebugInfrastructure\FileUserRepository;
use User\Domain\User\UserRepositoryInterface;
use User\MockInteractor\Create\MockCreateUserInteractor;
use User\UseCase\CreateUserUseCase\CreateUserUseCaseInterface;

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

        $this->app->bind(
            MediumRepositoryInterface::class,
            FileMediumRepository::class
        );

        // $this->app->bind(
        //     MediumRepositoryInterface::class,
        //     EloquentMediumRepository::class,
        // );

        $this->app->bind(
            CreateMediumDtlUseCaseInterface::class,
            MockCreateMediumDtlInteractor::class,
        );

        $this->app->bind(
            EditMediumDtlUseCaseInterface::class,
            MockEditMediumDtlInteractor::class
        );

        $this->app->bind(
            DeleteMediumDtlUseCaseInterface::class,
            MockDeleteMediumDtlInteractor::class
        );

        $this->app->bind(
            SearchMediumDtlUseCaseInterface::class,
            MockSearchMediumDtlInteractor::class
        );

        $this->app->bind(
            MediumDtlRepositoryInterface::class,
            FileMediumDtlRepository::class
        );

        $this->app->bind(
            LpRepositoryInterface::class,
            FileLpRepository::class
        );

        $this->app->bind(
            CreateLpUseCaseInterface::class,
            MockCreateLpInteractor::class
        );

        $this->app->bind(
            EditLpUseCaseInterface::class,
            MockEditLpInteractor::class
        );

        $this->app->bind(
            DeleteLpUseCaseInterface::class,
            MockDeleteLpInteractor::class
        );

        $this->app->bind(
            SearchLpUseCaseInterface::class,
            MockSearchLpInteractor::class
        );

        $this->app->bind(
            FormRepositoryInterface::class,
            FileFormRepository::class
        );

        $this->app->bind(
            CreateFormUseCaseInterface::class,
            MockCreateFormInteractor::class
        );

        $this->app->bind(
            EditFormUseCaseInterface::class,
            MockEditFormInteractor::class
        );

        $this->app->bind(
            DeleteFormUseCaseInterface::class,
            MockDeleteFormInteractor::class
        );

        $this->app->bind(
            SearchFormUseCaseInterface::class,
            MockSearchFormInteractor::class,
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            FileUserRepository::class,
        );

        $this->app->bind(
            CreateUserUseCaseInterface::class,
            MockCreateUserInteractor::class,
        );
    }
}
