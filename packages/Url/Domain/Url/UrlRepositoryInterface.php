<?php

namespace Url\Domain\Url;

use Form\Domain\Form\FormName;
use Lp\Domain\Lp\LpName;
use Media\Domain\Media\MediumName;
use MediaDtl\Domain\MediaDtl\MediumDtlName;

interface UrlRepositoryInterface
{
    public function getAllMedia(): ?array;

    public function getAllMediaDtls(): ?array;

    public function getAllLps(): ?array;

    public function getAllForms(): ?array;

    public function findById(UrlId $id): ?Url;

    public function findByName(UrlName $name): ?Url;

    public function save(Url $url): Url;

    public function update(Url $url): Url;

    public function delete(UrlId $id): bool;

    public function search(
        ?UrlName $url_name,
        ?MediumName $medium_name,
        ?MediumDtlName $medium_dtl_name,
        ?LpName $lp_name,
        ?FormName $form_name
    ): ?array;
}
