<?php

namespace Url\UseCase\EditUrlUseCase\Request;

class EditUrlIndexRequest
{
    /**
     * @var string
     */
    private $url_id;

    public function __construct(string $id)
    {
        $this->url_id = $id;
    }

    public function getUrlId(): string
    {
        return $this->url_id;
    }
}
