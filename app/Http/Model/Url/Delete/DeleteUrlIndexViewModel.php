<?php

namespace App\Http\Model\Url\Delete;

class DeleteUrlIndexViewModel
{
    /**
     * @var string
     */
    private $url_id;

    /**
     * @var string
     */
    private $url_name;

    /**
     * @var string
     */
    private $medium_name;

    /**
     * @var string
     */
    private $medium_dtl_name;

    /**
     * @var string
     */
    private $lp_name;

    /**
     * @var string
     */
    private $form_name;


    /**
     * Constructer
     *
     * @param string $url_id
     * @param string $url_name
     * @param string $medium_name
     * @param string $medium_dtl_name
     * @param string $lp_name
     * @param string $form_name
     */
    public function __construct(
        string $url_id,
        string $url_name,
        string $medium_name,
        string $medium_dtl_name,
        string $lp_name,
        string $form_name
    ) {
        $this->url_id = $url_id;
        $this->url_name = $url_name;
        $this->medium_name = $medium_name;
        $this->medium_dtl_name = $medium_dtl_name;
        $this->lp_name = $lp_name;
        $this->form_name = $form_name;
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


    /**
     * Getter of url name
     *
     * @return string
     */
    public function getUrlName(): string
    {
        return $this->url_name;
    }


    /**
     * Getter of medium name
     *
     * @return string
     */
    public function getMediumName(): string
    {
        return $this->medium_name;
    }


    /**
     * Getter of medium detail name
     *
     * @return string
     */
    public function getMediumDtlName(): string
    {
        return $this->medium_dtl_name;
    }


    /**
     * Getter of lp name
     *
     * @return string
     */
    public function getLpName(): string
    {
        return $this->lp_name;
    }


    /**
     * Getter of form name
     *
     * @return string
     */
    public function getFormname(): string
    {
        return $this->form_name;
    }
}
