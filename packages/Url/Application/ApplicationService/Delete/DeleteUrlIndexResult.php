<?php

namespace Url\Application\ApplicationService\Delete;

use Url\Domain\DomainService\ValueObject\UrlSummary;
use Url\Domain\Url\UrlId;

class DeleteUrlIndexResult
{
    /**
     * Success
     *
     * @param UrlSummary $summary
     * @return DeleteUrlIndexResult
     */
    public static function isIndex(UrlSummary $summary): DeleteUrlIndexResult
    {
        return new DeleteUrlIndexResult($summary, null);
    }



    /**
     * Fail
     *
     * @param integer $code
     * @return DeleteUrlIndexResult
     */
    public static function isFail(int $code): DeleteUrlIndexResult
    {
        return new DeleteUrlIndexResult(null, $code);
    }


    /**
     * @var int|null
     */
    private $error_code;


    /**
     * @var UrlSummary|null
     */
    private $url_summary;



    /**
     * Constructer
     *
     * @param UrlSummary|null $summary
     * @param integer|null $code
     */
    public function __construct(
        ?UrlSummary $summary,
        ?int $code
    ) {
        $this->url_summary = $summary;
        $this->error_code = $code;
    }



    /**
     * Getter of url summary
     *
     * @return UrlSummary|null
     */
    public function getUrlSummary(): ?UrlSummary
    {
        return $this->url_summary;
    }



    /**
     * Getter of error code
     *
     * @return integer|null
     */
    public function getErrorCode(): ?int
    {
        return $this->error_code;
    }



    /**
     * Check error
     *
     * @return boolean
     */
    public function isError(): bool
    {
        return $this->error_code !== null ? true : false;
    }
}