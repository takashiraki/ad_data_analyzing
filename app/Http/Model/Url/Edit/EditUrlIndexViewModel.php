<?php

namespace App\Http\Model\Url\Edit;

class EditUrlIndexViewModel
{
    private $url_id;

    private $url_name;

    private $mediuma_name;

    private $medium_dtl_name;

    private $lp_name;

    private $form_name;

    public function __construct(
        string $url_id,
        string $url_name,
        string $mediuma_name,
        string $medium_dtl_name,
        string $lp_name,
        string $form_name
    ) {
        $this->url_id = $url_id;
        $this->url_name = $url_name;
        $this->mediuma_name = $mediuma_name;
        $this->medium_dtl_name = $medium_dtl_name;
        $this->lp_name = $lp_name;
        $this->form_name = $form_name;
    }

    public function getUrlId(): string
    {
        return $this->url_id;
    }

    public function getUrlName(): string
    {
        return $this->url_name;
    }

    public function getMediumName(): string
    {
        return $this->mediuma_name;
    }

    public function getMediumDtlName(): string
    {
        return $this->medium_dtl_name;
    }

    public function getLpName(): string
    {
        return $this->lp_name;
    }

    public function getFormName(): string
    {
        return $this->form_name;
    }
}
