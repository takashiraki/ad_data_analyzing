<?php

namespace Url\Domain\Url;

interface UrlRepositoryInterface
{
    public function getAllMedia(): ?array;

    public function getAllMediaDtls(): ?array;

    public function getAllLps(): ?array;

    public function getAllForms(): ?array;
}
