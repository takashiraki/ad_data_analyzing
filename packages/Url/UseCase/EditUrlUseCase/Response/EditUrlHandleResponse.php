<?php

namespace Url\UseCase\EditUrlUseCase\Response;

use Url\Domain\DomainService\ValueObject\UrlSummary;

class EditUrlHandleResponse
{
    /**
     * @var UrlSummary
     */
    private $url_summary;

    public function __construct(UrlSummary $summary)
    {
        $this->url_summary = $summary;
    }

    public function getUrlSummary(): UrlSummary
    {
        return $this->url_summary;
    }
}
