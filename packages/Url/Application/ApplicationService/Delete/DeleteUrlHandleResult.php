<?php

namespace Url\Application\ApplicationService\Delete;

use Url\Domain\Url\UrlId;

class DeleteUrlHandleResult
{
    public static function success(UrlId $id)
    {
        return new DeleteUrlHandleResult($id, null);
    }

    public static function fail(int $code)
    {
        return new DeleteUrlHandleResult(null, $code);
    }

    private $url_id;
    private $error_code;

    public function __construct(
        ?UrlId $id,
        ?int $code
    ) {
        $this->url_id = $id;
        $this->error_code = $code;
    }

    public function getUrlId(): ?UrlId
    {
        return $this->url_id;
    }

    public function getErrorCode(): ?int
    {
        return $this->error_code;
    }

    public function isError(): bool
    {
        return $this->error_code !== null ? true : false;
    }
}
