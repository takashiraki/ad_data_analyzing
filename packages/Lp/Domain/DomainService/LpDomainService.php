<?php

namespace Lp\Domain\DomainService;

use Lp\Domain\Lp\Lp;
use Lp\Domain\Lp\LpDirectory;
use Lp\Domain\Lp\LpName;
use Lp\Domain\Lp\LpRepositoryInterface;

class LpDomainService
{
    private $lp_repository;

    public function __construct(LpRepositoryInterface $repository)
    {
        $this->lp_repository = $repository;
    }

    public function existByName(LpName $name): bool
    {
        $exist_lp = $this->lp_repository->findByName($name);

        return isset($exist_lp) ? true : false;
    }

    public function existByDirectory(LpDirectory $dir): bool
    {
        $exist_lp = $this->lp_repository->findByDirectory($dir);

        return isset($exist_lp) ? true : false;
    }
}
