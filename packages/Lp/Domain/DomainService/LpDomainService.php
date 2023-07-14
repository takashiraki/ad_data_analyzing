<?php

namespace Lp\Domain\DomainService;

use Lp\Application\Services\OldLp\OldLp;
use Lp\Domain\Lp\Lp;
use Lp\Domain\Lp\LpDirectory;
use Lp\Domain\Lp\LpId;
use Lp\Domain\Lp\LpName;
use Lp\Domain\Lp\LpRepositoryInterface;

class LpDomainService
{
    private $lp_repository;

    public function __construct(LpRepositoryInterface $repository)
    {
        $this->lp_repository = $repository;
    }

    public function existById(LpId $id): bool
    {
        $exist_lp = $this->lp_repository->findById($id);

        return isset($exist_lp) ? true : false;
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

    public function equalByName(Lp $new_lp, OldLp $old_lp): bool
    {
        $old_lp_name = $old_lp->getOldLp()->getLpName();
        $new_lp_name = $new_lp->getLpName();

        return $old_lp_name->equals($new_lp_name);
    }

    public function equalByDirectory(Lp $new_lp, OldLp $old_lp): bool
    {
        $old_lp_directory = $old_lp->getOldLp()->getLpDir();
        $new_lp_directory = $new_lp->getLpDir();

        return $old_lp_directory->equals($new_lp_directory);
    }
}
