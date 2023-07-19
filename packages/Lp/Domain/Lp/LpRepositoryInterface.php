<?php

namespace Lp\Domain\Lp;

interface LpRepositoryInterface
{
    public function findById(LpId $id): ?Lp;

    public function findByName(LpName $name): ?Lp;

    public function findByDirectory(LpDirectory $dir): ?LpDirectory;

    public function save(Lp $lp): Lp;

    public function update(Lp $lp): Lp;

    public function delete(Lp $lp): Lp;
}
