<?php

namespace Lp\Application\Services\OldLp;

use Lp\Domain\Lp\Lp;

class OldLp
{
    private $old_lp;

    public function __construct(Lp $lp)
    {
        $this->old_lp = $lp;
    }

    public function getOldLp(): Lp
    {
        return $this->old_lp;
    }
}
