<?php

namespace Url\MockInteractor\Delete;

use Url\Application\ApplicationService\Common\DoseNotExist;
use Url\Application\ApplicationService\Delete\DeleteUrlResult;
use Url\Application\ApplicationService\UrlApplicationService;
use Url\Domain\DomainService\UrlDomainService;
use Url\Domain\Url\UrlId;
use Url\Domain\Url\UrlRepositoryInterface;
use Url\UseCase\DeleteUrlUseCase\DeleteUrlUseCaseInterface;
use Url\UseCase\DeleteUrlUseCase\Request\DeleteUrlIndexRequest;
use Url\UseCase\DeleteUrlUseCase\Response\DeleteUrlIndexResponse;

class MockDeleteUrlInteractor implements DeleteUrlUseCaseInterface
{

    /**
     * @var UrlDomainService
     */
    private $domain_service;


    private $application_service;


    /**
     * @var UrlRepositoryInterface
     */
    private $repository;



    /**
     * Constructer
     *
     * @param UrlDomainService $domain_service
     * @param UrlApplicationService $application_service
     * @param UrlRepositoryInterface $repository
     */
    public function __construct(
        UrlDomainService $domain_service,
        UrlApplicationService $application_service,
        UrlRepositoryInterface $repository
    ) {
        $this->domain_service = $domain_service;
        $this->application_service = $application_service;
        $this->repository = $repository;
    }



    /**
     * Index
     *
     * @param DeleteUrlIndexRequest $request
     * @return DeleteUrlIndexResponse
     */
    public function index(DeleteUrlIndexRequest $request): DeleteUrlIndexResponse
    {
        $url_id = new UrlId($request->getUrlId());

        if (!$this->domain_service->existById(
            $url_id
        )) {
            return new DeleteUrlIndexResponse(
                DeleteUrlResult::isFail(DoseNotExist::URL_ID_ALREADY_EXISTED)
            );
        }

        return new DeleteUrlIndexResponse(
            DeleteUrlResult::isSuccess(
                $this->application_service->getUrlSummary($this->repository->findById($url_id))
            )
        );
    }
}
