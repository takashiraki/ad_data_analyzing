<?php

namespace Url\UseCase\SearchUrlUseCase;

class SearchUrlIndexRequest
{
    /**
     * @var string|null
     */
    private $url_name;

    /**
     * @var string|null
     */
    private $medium_name;

    /**
     * @var string|null
     */
    private $medium_dtl_name;

    /**
     * @var string|null
     */
    private $lp_name;

    /**
     * @var string|null
     */
    private $form_name;


    /**
     * Constructer
     *
     * @param string|null $url_name
     * @param string|null $medium_name
     * @param string|null $medium_dtl_name
     * @param string|null $lp_name
     * @param string|null $form_name
     */
    public function __construct(
        ?string $url_name,
        ?string $medium_name,
        ?string $medium_dtl_name,
        ?string $lp_name,
        ?string $form_name
    ) {
        $this->url_name = $url_name;
        $this->medium_name = $medium_name;
        $this->medium_dtl_name = $medium_dtl_name;
        $this->lp_name = $lp_name;
        $this->form_name = $form_name;
    }


    /**
     * Getter of url name
     *
     * @return string|null
     */
    public function getUrlName(): ?string
    {
        return $this->url_name;
    }


    /**
     * Getter of medium name
     *
     * @return string|null
     */
    public function getMediumName(): ?string
    {
        return $this->medium_name;
    }


    /**
     * Getter of medium detail name
     *
     * @return string|null
     */
    public function getMediumDtlName(): ?string
    {
        return $this->medium_dtl_name;
    }


    /**
     * Getter of lp name
     *
     * @return string|null
     */
    public function getLpName(): ?string
    {
        return $this->lp_name;
    }


    /**
     * Getter of form name
     *
     * @return string|null
     */
    public function getFormName(): ?string
    {
        return $this->form_name;
    }
}
