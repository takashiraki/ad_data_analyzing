<?php

namespace Url\UseCase\DeleteUrlUseCase\Response;

use Url\Application\ApplicationService\Delete\DeleteUrlHandleResult;

class DeleteUrlHandleResponse
{
    private $result;

    private $url_id;

    public function __construct(
        DeleteUrlHandleResult $result
    ) {
        $this->result = $result;

        if (!$result->isError()) {
            $this->url_id = $result->getUrlId();
        }
    }

    public function getResult(): ?DeleteUrlHandleResult
    {
        return $this->result;
    }


    public function getUrlId(): ?string
    {
        return $this->url_id;
    }
}
