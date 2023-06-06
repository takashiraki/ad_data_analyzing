<?php

namespace Media\UseCase\SearchMediumUseCase;

/**
 * --------------------------------------------------------------------------
 * # Data structure
 * --------------------------------------------------------------------------
 * 
 * 
 * ## Responsibility
 * The responsiblity this class has is to make data structure of response.
 */
class SearchMediumResponse
{

    /**
     * # medium records
     *
     * @var null|array
     */
    private $records;


    /**
     * # Constructer.
     *
     * @param array|null $records
     */
    public function __construct(?array $records)
    {
        $this->records = $records;
    }


    /**
     * # Getter of medium records.
     *
     * @return array|null
     */
    public function getMediumRecords(): ?array
    {
        return $this->records;
    }
}
