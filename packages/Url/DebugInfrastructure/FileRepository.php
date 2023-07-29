<?php

namespace Url\DebugInfrastructure;

use Form\Domain\Form\FormId;
use Lp\Domain\Lp\LpId;
use Media\Domain\Media\MediumId;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
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
}
