<?php

namespace Url\MockInteractor\Create;

use illuminate\Support\Str;
use Form\Domain\DomainService\FormDomainService;
use Form\Domain\Form\FormId;
use Form\Domain\Form\FormRepositoryInterface;
use Lp\Domain\DomainService\LpDomainService;
use Lp\Domain\Lp\LpId;
use Lp\Domain\Lp\LpRepositoryInterface;
use Media\Domain\DomainService\MediumDomainService;
use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumRepositoryInterface;
use MediaDtl\Domain\DomainService\MediumDtlDomainService;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;
use UnexpectedValueException;
use Url\Domain\DomainService\UrlDomainService;
use Url\Domain\Url\Url;
use Url\Domain\Url\UrlId;
use Url\Domain\Url\UrlName;
use Url\Domain\Url\UrlRepositoryInterface;
use Url\UseCase\CreateUrlUseCase\CreateUrlUseCaseInterface;
use Url\UseCase\CreateUrlUseCase\Request\CreateUrlHandleRequest;
use Url\UseCase\CreateUrlUseCase\Response\CreateUrlHandleResponse;
use Url\UseCase\CreateUrlUseCase\Response\CreateUrlIndexResponse;

class MockCreateUrlInteractor implements CreateUrlUseCaseInterface
{
    private $repository;
    private $medium_repository;
    private $medium_dtl_repository;
    private $lp_repository;
    private $form_repository;
    private $url_domain_service;
    private $medium_domain_service;
    private $medium_dtl_domain_service;
    private $lp_domain_service;
    private $form_domain_service;

    public function __construct(
        UrlRepositoryInterface $repository,
        MediumRepositoryInterface $medium_repository,
        MediumDtlRepositoryInterface $medium_dtl_repository,
        LpRepositoryInterface $lp_repository,
        FormRepositoryInterface $form_repository,
        UrlDomainService $url_domain_service,
        MediumDomainService $medium_domain_service,
        MediumDtlDomainService $medium_dtl_domain_service,
        LpDomainService $lp_domain_service,
        FormDomainService $form_domain_service,
    ) {
        $this->repository = $repository;
        $this->medium_repository = $medium_repository;
        $this->medium_dtl_repository = $medium_dtl_repository;
        $this->lp_repository = $lp_repository;
        $this->form_repository = $form_repository;
        $this->url_domain_service = $url_domain_service;
        $this->medium_domain_service = $medium_domain_service;
        $this->medium_dtl_domain_service = $medium_dtl_domain_service;
        $this->lp_domain_service = $lp_domain_service;
        $this->form_domain_service = $form_domain_service;
    }

    public function index(): CreateUrlIndexResponse
    {
        return new CreateUrlIndexResponse(
            $this->repository->getAllMedia(),
            $this->repository->getAllMediaDtls(),
            $this->repository->getAllLps(),
            $this->repository->getAllForms(),
        );
    }

    public function handle(CreateUrlHandleRequest $request): CreateUrlHandleResponse
    {
        if ($this->url_domain_service->existByName(new UrlName($request->getUrlName()))) {
            throw new UnexpectedValueException("This Url name already existed");
        }

        if (!$this->medium_domain_service->ExistById($request->getMediumId())) {
            throw new UnexpectedValueException("This medium id dose not exist");
        }

        if (!$this->medium_dtl_domain_service
            ->existMediumDtlById(new MediumDtlId($request->getMediumDtlId()))) {
            throw new UnexpectedValueException("This medium detail id dose not exist");
        }

        if (!$this->lp_domain_service->existById(new LpId($request->getLpId()))) {
            throw new UnexpectedValueException("This lp id dose not exist");
        }

        if (!$this->form_domain_service->existById(new FormId($request->getFormId()))) {
            throw new UnexpectedValueException("This form id dose not exist");
        }

        $url = new Url(
            new UrlId((string)Str::uuid()),
            new UrlName($request->getUrlName()),
            new MediumId($request->getMediumId()),
            new MediumDtlId($request->getMediumDtlId()),
            new LpId($request->getLpId()),
            new FormId($request->getFormId())
        );

        $this->repository->save($url);

        $medium = $this->medium_repository->find(new MediumId($request->getMediumId()));
        $medium_dtl = $this->medium_dtl_repository->findById(new MediumDtlId($request->getMediumDtlId()));
        $lp = $this->lp_repository->findById(new LpId($request->getLpId()));
        $form = $this->form_repository->findById(new FormId($request->getFormId()));

        return new CreateUrlHandleResponse(
            $url->getUrlId()->getValue(),
            $url->getUrlName()->getValue(),
            $medium->getMediumName()->getValue(),
            $medium_dtl->getMediumDtlName()->getValue(),
            $lp->getLpName()->getValue(),
            $form->getFormName()->getValue()
        );
    }
}
