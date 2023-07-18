<?php

namespace Lp\DebugInfrastructure;

use Lp\Domain\Lp\Lp;
use Lp\Domain\Lp\LpDirectory;
use Lp\Domain\Lp\LpId;
use Lp\Domain\Lp\LpName;
use Lp\Domain\Lp\LpRepositoryInterface;

class FileLpRepository implements LpRepositoryInterface
{
    public function findById(LpId $id): ?Lp
    {
        return new Lp(
            $id,
            new LpName('hogehoge'),
            new LpDirectory('directory'),
            null
        );
    }

    public function findByName(LpName $name): ?Lp
    {
        return null;
    }

    public function findByDirectory(LpDirectory $dir): ?LpDirectory
    {
        return null;
    }

    public function save(Lp $lp): Lp
    {
        return $lp;
    }

    public function update(Lp $lp): Lp
    {
        return $lp;
    }
}
