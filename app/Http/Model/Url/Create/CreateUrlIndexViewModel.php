<?php

namespace App\Http\Model\Url\Create;

class CreateUrlIndexViewModel
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

    public function getMedia(): ?array
    {
        return $this->media;
    }

    public function getMediaDtls(): ?array
    {
        return $this->media_dtls;
    }

    public function getLps(): ?array
    {
        return $this->lps;
    }

    public function getForms(): ?array
    {
        return $this->forms;
    }
}
