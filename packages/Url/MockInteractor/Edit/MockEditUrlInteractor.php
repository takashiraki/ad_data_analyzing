<?php

namespace Url\MockInteractor\Edit;

use Form\Domain\Form\FormRepositoryInterface;
use Lp\Domain\Lp\LpRepositoryInterface;
use Media\Domain\Media\MediumRepositoryInterface;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;
use UnexpectedValueException;
use Url\Application\ApplicationService\UrlApplicationService;
use Url\Domain\DomainService\UrlDomainService;
use Url\Domain\DomainService\ValueObject\UrlSummary;
use Url\Domain\Url\UrlId;
use Url\Domain\Url\UrlRepositoryInterface;
use Url\UseCase\EditUrlUseCase\EditUrlUseCaseInterface;
use Url\UseCase\EditUrlUseCase\Request\EditUrlIndexRequest;
use Url\UseCase\EditUrlUseCase\Response\EditUrlIndexResponse;

class MockEditUrlInteractor implements EditUrlUseCaseInterface
{
    private $domain_service;
    private $application_service;
    private $repository;

    public function __construct(
        UrlDomainService $domain_service,
        UrlApplicationService $application_service,
        UrlRepositoryInterface $repository,
    ) {
        $this->domain_service = $domain_service;
        $this->application_service = $application_service;
        $this->repository = $repository;
    }
    public function index(EditUrlIndexRequest $request): EditUrlIndexResponse
    {
        $url_id = new UrlId($request->getUrlId());

        if (!$this->domain_service->existById($url_id)) {
            throw new UnexpectedValueException("This url id dose not exist");
        }

        $url_summary = $this->application_service->getUrlSummary($this->repository->findById($url_id));

        return new EditUrlIndexResponse(
            $url_summary->getUrlId()->getValue(),
            $url_summary->getUrlName()->getValue(),
            $url_summary->getMedium()->getMediumName()->getValue(),
            $url_summary->getMediumDtl()->getMediumDtlName()->getValue(),
            $url_summary->getLp()->getLpName()->getValue(),
            $url_summary->getForm()->getFormName()->getValue()
        );
    }
}
