<?php

namespace Lp\UseCase\SearchLp\Request;

class SearchLpIndexRequest
{
    private $lp_name;
    private $lp_directory;

    public function __construct(
        ?string $name,
        ?string $dir
    ) {
        $this->lp_name = $name;
        $this->lp_directory = $dir;
    }

    public function getLpName(): ?string
    {
        return $this->lp_name;
    }

    public function getLpDirectory(): ?string
    {
        return $this->lp_directory;
    }
}
