<?php

namespace App\Http\Model\Url\Edit;

class EditUrlHandleViewModel
{
    /**
     * @var string
     */
    private $url_name;

    /**
     * @var string
     */
    private $medium_name;

    /**
     * @var string
     */
    private $medium_dtl_name;

    /**
     * @var string
     */
    private $lp_name;

    /**
     * @var string
     */
    private $form_name;

    public function __construct(
        string $url_name,
        string $medium_name,
        string $medium_dtl_name,
        string $lp_name,
        string $form_name
    ) {
        $this->url_name = $url_name;
        $this->medium_name = $medium_name;
        $this->medium_dtl_name = $medium_dtl_name;
        $this->lp_name = $lp_name;
        $this->form_name = $form_name;
    }

    public function getUrlName(): string
    {
        return $this->url_name;
    }

    public function getMediumName(): string
    {
        return $this->medium_name;
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