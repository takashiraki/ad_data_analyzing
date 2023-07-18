<?php

namespace App\Http\Model;

/**
 * --------------------------------------------------------------------------
 * # Data structure of ViewModel
 * --------------------------------------------------------------------------
 *
 *
 * ## Responsibility
 * The responsibility this  class has is for Media.
 * This class has to create view model.
 */
class SearchMediumViewModel
{
    /**
     * # medium records
     *
     * @var array|null
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
     * # Getter of Medium records.
     *
     * @return array|null
     */
    public function getMediumRecords(): ?array
    {
        return $this->records;
    }
}
