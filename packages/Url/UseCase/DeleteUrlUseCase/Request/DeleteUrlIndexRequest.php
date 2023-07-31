<?php

namespace Url\UseCase\DeleteUrlUseCase\Request;

class DeleteUrlIndexRequest
{
    /**
     * url id
     *
     * @var string
     */
    private $url_id;



    /**
     * Constructer.
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->url_id = $id;
    }



    /**
     * Getter of url id
     *
     * @return string
     */
    public function getUrlId(): string
    {
        return $this->url_id;
    }
}
