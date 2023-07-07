<?php

namespace Lp\Domain\Lp;

interface LpRepositoryInterface
{
    public function findByName(LpName $name): ?Lp;

    public function findByDirectory(LpDirectory $dir): ?LpDirectory;

    public function save(Lp $lp): Lp;
}
