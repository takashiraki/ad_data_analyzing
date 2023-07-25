<?php

namespace App\Http\Model\User\Search;

class SearchUserIndexViewModel
{
    /**
     *
     * @var null|array
     */

    private $records;

    public function __construct(?array $records)
    {
        $this->records = $records;
    }

    public function getUserRecords(): ?array
    {
        return $this->records;
    }
}
