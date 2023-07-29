<?php

namespace Url\Domain\Url;

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
}
