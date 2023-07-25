<?php

namespace User\UseCase\SearchUserUseCase\Response;

class SearchUserIndexResponse
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

    public function getReocrds(): ?array
    {
        return $this->records;
    }
}
