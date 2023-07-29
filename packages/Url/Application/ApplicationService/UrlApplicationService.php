<?php

namespace Url\Application\ApplicationService;

use Form\Domain\Form\FormRepositoryInterface;
use Lp\Domain\Lp\LpRepositoryInterface;
use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumRepositoryInterface;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;
use Url\Domain\DomainService\ValueObject\UrlSummary;
use Url\Domain\Url\Url;

class UrlApplicationService
{
    private $medium_repository;
    private $medium_dtl_repository;
    private $lp_repository;
    private $form_repository;

    public function __construct(
        MediumRepositoryInterface $medium_repository,
        MediumDtlRepositoryInterface $medium_dtl_repository,
        LpRepositoryInterface $lp_repository,
        FormRepositoryInterface $form_repository
    ) {
        $this->medium_repository = $medium_repository;
        $this->medium_dtl_repository = $medium_dtl_repository;
        $this->lp_repository = $lp_repository;
        $this->form_repository = $form_repository;
    }

    public function getUrlSummary(Url $url): UrlSummary
    {
        return new UrlSummary(
            $url->getUrlId(),
            $url->getUrlName(),
            $this->medium_repository->find($url->getMediumId()),
            $this->medium_dtl_repository->findById($url->getMedimDtlId()),
            $this->lp_repository->findById($url->getLpId()),
            $this->form_repository->findById($url->getFormId())
        );
    }
}
