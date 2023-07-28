<?php

namespace Url\UseCase\CreateUrlUseCase\Request;

class CreateUrlHandleRequest
{
    /**
     * @var string
     */
    private $url_name;

    /**
     * @var string
     */
    private $medium_id;

    /**
     * @var string
     */
    private $medium_dtl_id;

    /**
     * @var string
     */
    private $lp_id;

    /**
     * @var string
     */
    private $form_id;

    public function __construct(
        string $url_name,
        string $medium_id,
        string $medium_dtl_id,
        string $lp_id,
        string $form_id
    ) {
        $this->url_name = $url_name;
        $this->medium_id = $medium_id;
        $this->medium_dtl_id = $medium_dtl_id;
        $this->lp_id = $lp_id;
        $this->form_id = $form_id;
    }

    public function getUrlName(): string
    {
        return $this->url_name;
    }

    public function getMediumId(): string
    {
        return $this->medium_id;
    }

    public function getMediumDtlId(): string
    {
        return $this->medium_dtl_id;
    }

    public function getLpId(): string
    {
        return $this->lp_id;
    }

    public function getFormId(): string
    {
        return $this->form_id;
    }
}
