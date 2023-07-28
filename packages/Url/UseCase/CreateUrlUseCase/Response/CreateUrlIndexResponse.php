<?php

namespace Url\UseCase\CreateUrlUseCase\Response;

class CreateUrlIndexResponse
{
    /**
     * @var null|array
     */
    private $media;

    /**
     * @var null|array
     */
    private $media_dtls;

    /**
     * @var null|array
     */
    private $lps;

    /**
     * @var null|array
     */
    private $forms;

    public function __construct(
        ?array $media,
        ?array $media_dtls,
        ?array $lps,
        ?array $forms,
    ) {
        $this->media = $media;
        $this->media_dtls = $media_dtls;
        $this->lps = $lps;
        $this->forms = $forms;
    }
}
