<?php

namespace Url\Domain\DomainService\ValueObject;

use Url\Domain\Url\UrlName;

class OldUrlName
{

    /**
     * @var UrlName
     */
    private $old_url;

    public function __construct(UrlName $url)
    {
        $this->old_url = $url;
    }

    public function getOldUrlName(): UrlName
    {
        return $this->old_url;
    }
}
