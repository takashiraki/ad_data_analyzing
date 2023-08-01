<?php

namespace Url\DebugInfrastructure;

use Form\Domain\Form\FormId;
use Form\Domain\Form\FormName;
use Lp\Domain\Lp\LpId;
use Lp\Domain\Lp\LpName;
use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlName;
use Url\Domain\Url\UrlName;
use Url\Domain\Url\Url;
use Url\Domain\Url\UrlId;
use Url\Domain\Url\UrlRepositoryInterface;

class FileRepository implements UrlRepositoryInterface
{
    public function getAllMedia(): ?array
    {
        return null;
    }

    public function getAllMediaDtls(): ?array
    {
        return null;
    }

    public function getAllLps(): ?array
    {
        return null;
    }

    public function getAllForms(): ?array
    {
        return null;
    }

    public function findById(UrlId $id): ?Url
    {
        return new Url(
            $id,
            new UrlName('hogehoge'),
            new MediumId('hogehogehogehogehogehogehogehogehoge'),
            new MediumDtlId('hogehogehogehogehogehogehogehogehoge'),
            new LpId('hogehogehogehogehogehogehogehogehoge'),
            new FormId('hogehogehogehogehogehogehogehogehoge')
        );
    }

    public function findByName(UrlName $name): ?Url
    {
        return null;
    }

    public function save(Url $url): Url
    {
        return $url;
    }

    public function update(Url $url): Url
    {
        return $url;
    }

    public function delete(UrlId $id): bool
    {
        return true;
    }

    public function search(
        ?UrlName $url_name,
        ?MediumName $medium_name,
        ?MediumDtlName $medium_dtl_name,
        ?LpName $lp_name,
        ?FormName $form_name
    ): ?array {
        return null;
    }
}
