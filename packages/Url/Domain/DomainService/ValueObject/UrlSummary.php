<?php

namespace Url\Domain\DomainService\ValueObject;

use Form\Domain\Form\Form;
use Lp\Domain\Lp\Lp;
use Media\Domain\Media\Medium;
use MediaDtl\Domain\MediaDtl\MediumDtl;
use Url\Domain\Url\UrlId;
use Url\Domain\Url\UrlName;

class UrlSummary
{
    private $url_id;
    private $url_name;
    private $medium;
    private $medium_dtl;
    private $lp;
    private $form;

    public function __construct(
        UrlId $url_id,
        UrlName $url_name,
        Medium $medium,
        MediumDtl $medium_dtl,
        Lp $lp,
        Form $form
    ) {
        $this->url_id = $url_id;
        $this->url_name = $url_name;
        $this->medium = $medium;
        $this->medium_dtl = $medium_dtl;
        $this->lp = $lp;
        $this->form = $form;
    }

    public function getUrlId(): UrlId
    {
        return $this->url_id;
    }

    public function getUrlName(): UrlName
    {
        return $this->url_name;
    }

    public function getMedium(): Medium
    {
        return $this->medium;
    }

    public function getMediumDtl(): MediumDtl
    {
        return $this->medium_dtl;
    }

    public function getLp(): Lp
    {
        return $this->lp;
    }

    public function getForm(): Form
    {
        return $this->form;
    }
}
