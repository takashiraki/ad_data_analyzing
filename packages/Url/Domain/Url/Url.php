<?php

namespace Url\Domain\Url;

use Form\Domain\Form\FormId;
use Lp\Domain\Lp\LpId;
use Media\Domain\Media\MediumId;
use MediaDtl\Domain\MediaDtl\MediumDtlId;

class Url
{
    private $url_id;
    private $url_name;
    private $medium_id;
    private $medium_dtl_id;
    private $lp_id;
    private $form_id;

    public function __construct(
        UrlId $url_id,
        UrlName $name,
        MediumId $medium_id,
        MediumDtlId $medium_dtl_id,
        LpId $lp_id,
        FormId $form_id,
    ) {
        $this->url_id = $url_id;
        $this->url_name = $name;
        $this->medium_id = $medium_id;
        $this->medium_dtl_id = $medium_dtl_id;
        $this->lp_id = $lp_id;
        $this->form_id = $form_id;
    }

    public function getUrlId(): UrlId
    {
        return $this->url_id;
    }

    public function getUrlName(): UrlName
    {
        return $this->url_name;
    }

    public function getMediumId(): MediumId
    {
        return $this->medium_id;
    }

    public function getMedimDtlId(): MediumDtlId
    {
        return $this->medium_dtl_id;
    }

    public function getLpId(): LpId
    {
        return $this->lp_id;
    }

    public function getFormId(): FormId
    {
        return $this->form_id;
    }
}
