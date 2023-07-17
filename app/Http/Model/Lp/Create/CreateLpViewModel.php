<?php

namespace App\Http\Model\Lp\Create;

class CreateLpViewModel
{
    private $lp_id;

    private $lp_name;

    private $lp_direcrtory;

    private $lp_memo;

    public function __construct(
        string $id,
        string $name,
        string $dir,
        ?string $memo
    ) {
        $this->lp_id = $id;
        $this->lp_name = $name;
        $this->lp_direcrtory = $dir;
        $this->lp_memo = $memo;
    }

    public function getLpId(): string
    {
        return $this->lp_id;
    }

    public function getLpName(): string
    {
        return $this->lp_name;
    }

    public function getLpDirectory(): string
    {
        return $this->lp_direcrtory;
    }

    public function getLpMemo(): ?string
    {
        return $this->lp_memo;
    }
}
