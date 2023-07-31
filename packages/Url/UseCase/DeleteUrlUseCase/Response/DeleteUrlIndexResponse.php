<?php

namespace Url\UseCase\DeleteUrlUseCase\Response;

use Url\Application\ApplicationService\Delete\DeleteUrlResult;
use Url\Domain\DomainService\ValueObject\UrlSummary;

class DeleteUrlIndexResponse
{

    /**
     * @var null|DeleteUrlResult
     */
    private $result;

    /**
     * @var null|string
     */
    private $url_id;


    /**
     * @var null|string
     */
    private $url_name;


    /**
     * @var null|string
     */
    private $medium_name;


    /**
     * @var null|string
     */
    private $medium_dtl_name;


    /**
     * @var null|string
     */
    private $lp_name;


    /**
     * @var null|string
     */
    private $form_name;



    /**
     * Constructer.
     *
     * @param array|null $error_message
     * @param string|null $url_id
     * @param string|null $url_name
     * @param string|null $medium_name
     * @param string|null $medium_dtl_name
     * @param string|null $lp_name
     * @param string|null $form_name
     */
    public function __construct(
        ?DeleteUrlResult $result,
    ) {
        $this->result = $result;
        $this->url_id = $result->getUrlSummary()->getUrlId()->getValue();
        $this->url_name = $result->getUrlSummary()->getUrlName()->getValue();
        $this->medium_name = $result->getUrlSummary()->getMedium()->getMediumName()->getValue();
        $this->medium_dtl_name = $result->getUrlSummary()->getMediumDtl()->getMediumDtlName()->getValue();
        $this->lp_name = $result->getUrlSummary()->getLp()->getLpName()->getValue();
        $this->form_name = $result->getUrlSummary()->getForm()->getFormName()->getValue();
    }


    /**
     * Getter of error message.
     *
     * @return DeleteUrlResult|null
     */
    public function getResult(): ?DeleteUrlResult
    {
        return $this->result;
    }



    /**
     * Getter of url id
     *
     * @return string|null
     */
    public function getUrlId(): ?string
    {
        return $this->url_id;
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
