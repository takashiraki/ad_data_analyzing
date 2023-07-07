<?php

namespace Lp\Domain\Lp;

class Lp
{
    private $lp_id;
    private $lp_name;
    private $lp_directory;
    private $lp_memo;

    public function __construct(
        LpId $id,
        LpName $name,
        LpDirectory $dir,
        ?LpMemo $memo
    ) {
        $this->lp_id = $id;
        $this->lp_name = $name;
        $this->lp_directory = $dir;
        $this->lp_memo = $memo;
    }

    public function getLpId(): LpId
    {
        return $this->lp_id;
    }

    public function getLpName(): LpName
    {
        return $this->lp_name;
    }

    public function getLpDir(): LpDirectory
    {
        return $this->lp_directory;
    }

    public function getLpMemo(): ?LpMemo
    {
        return $this->lp_memo;
    }
}
