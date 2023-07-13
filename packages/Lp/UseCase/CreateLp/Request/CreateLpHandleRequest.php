<?php

namespace Lp\UseCase\CreateLp\Request;

class CreateLpHandleRequest
{
    private $lp_name;
    private $lp_directory;
    private $lp_memo;

    public function __construct(string $lp_name, string $lp_directory, ?string $lp_memo)
    {
        $this->lp_name = $lp_name;
        $this->lp_directory = $lp_directory;
        $this->lp_memo = $lp_memo;
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
