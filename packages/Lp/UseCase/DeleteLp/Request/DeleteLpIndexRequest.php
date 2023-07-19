<?php

namespace Lp\UseCase\DeleteLp\Request;

class DeleteLpIndexRequest
{
    private $lp_id;

    public function __construct(string $id)
    {
        $this->lp_id = $id;
    }

    public function getLpId(): string
    {
        return $this->lp_id;
    }
}
