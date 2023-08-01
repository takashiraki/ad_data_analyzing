<?php

namespace Url\UseCase\SearchUrlUseCase;

class SearchUrlIndexResponse
{
    /**
     * @var array|null
     */
    private $records;


    /**
     * Constructer
     *
     * @param array|null $records
     */
    public function __construct(?array $records)
    {
        $this->records = $records;
    }


    /**
     * Getter of records
     *
     * @return array|null
     */
    public function getRecords(): ?array

    {
        return $this->records;
    }
}
