<?php

namespace Url\MockInteractor\Delete;

use Url\Application\ApplicationService\Common\ErrorCode;
use Url\Application\ApplicationService\Delete\DeleteUrlIndexResult;
use Url\Application\ApplicationService\UrlApplicationService;
use Url\Domain\DomainService\UrlDomainService;
use Url\Domain\Url\UrlId;
use Url\Domain\Url\UrlRepositoryInterface;
use Url\UseCase\DeleteUrlUseCase\DeleteUrlUseCaseInterface;
use Url\UseCase\DeleteUrlUseCase\Request\DeleteUrlHandleRequest;
use Url\UseCase\DeleteUrlUseCase\Request\DeleteUrlIndexRequest;
use Url\UseCase\DeleteUrlUseCase\Response\DeleteUrlHandleResponse;
use Url\UseCase\DeleteUrlUseCase\Response\DeleteUrlIndexResponse;

class MockDeleteUrlInteractor implements DeleteUrlUseCaseInterface
{

    /**
     * @var UrlDomainService
     */
    private $domain_service;


    /**
     * @var UrlApplicationService
     */
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
                DeleteUrlIndexResult::isFail(ErrorCode::URL_ID_ALREADY_EXISTED)
            );
        }

        return new DeleteUrlIndexResponse(
            DeleteUrlIndexResult::isIndex(
                $this->application_service->getUrlSummary($this->repository->findById($url_id))
            )
        );
    }

    public function handle(DeleteUrlHandleRequest $request): DeleteUrlHandleResponse
    {
        return new DeleteUrlHandleResponse();
    }
}
