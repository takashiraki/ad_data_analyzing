<?php

namespace Url\UseCase\EditUrlUseCase\Response;

use Url\Domain\DomainService\ValueObject\UrlSummary;

class EditUrlHandleResponse
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

    public function __construct(UrlSummary $url_summary)
    {
        $this->url_name = $url_summary->getUrlName()->getValue();
        $this->medium_name = $url_summary->getMedium()->getMediumName()->getValue();
        $this->medium_dtl_name = $url_summary->getMediumDtl()->getMediumDtlName()->getValue();
        $this->lp_name = $url_summary->getLp()->getLpName()->getValue();
        $this->form_name = $url_summary->getForm()->getFormName()->getValue();
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
