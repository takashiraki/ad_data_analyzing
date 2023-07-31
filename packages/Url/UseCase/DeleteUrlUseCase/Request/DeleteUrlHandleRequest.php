<?php

namespace Url\UseCase\DeleteUrlUseCase\Request;

class DeleteUrlHandleRequest
{

    /**
     * @var string
     */
    private $url_id;


    /**
     * Constructer
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
    public function getIUrlId(): string
    {
        return $this->url_id;
    }
}
