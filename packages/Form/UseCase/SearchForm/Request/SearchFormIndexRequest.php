<?php

namespace Form\UseCase\SearchForm\Request;

class SearchFormIndexRequest
{
    private $query_form_name;
    private $query_form_directory;

    public function __construct(
        ?string $name,
        ?String $dir
    ) {
        $this->query_form_name = $name;
        $this->query_form_directory = $dir;
    }

    public function getQueryName(): ?string
    {
        return $this->query_form_name;
    }

    public function getQueryDirectory(): ?string
    {
        return $this->query_form_directory;
    }
}
