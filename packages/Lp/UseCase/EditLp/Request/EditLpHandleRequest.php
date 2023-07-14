<?php

namespace Lp\UseCase\EditLp\Request;

class EditLpHandleRequest
{
    private $lp_Id;
    private $lp_name;
    private $lp_directory;
    private $lp_memo;

    public function __construct(
        string $id,
        string $name,
        string $dir,
        ?string $memo
    ) {
        $this->lp_Id = $id;
        $this->lp_name = $name;
        $this->lp_directory = $dir;
        $this->lp_memo = $memo;
    }

    public function getLpId(): string
    {
        return $this->lp_Id;
    }

    public function getLpName(): string
    {
        return $this->lp_name;
    }

    public function getLpDirectory(): string
    {
        return $this->lp_directory;
    }

    public function getLpMemo(): ?string
    {
        return $this->lp_memo;
    }
}
