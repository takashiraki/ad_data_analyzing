<?php

namespace Media\Domain\DomainService;

use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;
use Media\Domain\Media\MediumRepositoryInterface;

/**
 * --------------------------------------------------------------------------
 * # Domain Service
 * --------------------------------------------------------------------------
 * 
 * 
 * ## Responsibility
 * The responsibility of this class is to help medium ValueObject.
 * But if you are not sure whether to write ValueObject or DomainService, you should write in DomainService.
 * And you have to check make sure there is no discomfort.
 * 
 */
class MediumDomainService
{

    /**
     * # Medium repository.
     *
     * @var MediumRepositoryInterface
     */
    private $medium_repository;


    /**
     * # Constructer.
     *
     * @param MediumRepositoryInterface $repository
     */
    public function __construct(MediumRepositoryInterface $repository)
    {
        $this->medium_repository = $repository;
    }


    /**
     * # Check existing medium name.
     *
     * @param string $name
     * @return boolean
     */
    public function ExistByName(string $name): bool
    {
        $medium_name_for_check = new MediumName($name);

        $check_medium_exist = $this->medium_repository->findByName($medium_name_for_check);

        return !empty($check_medium_exist) ? true : false;
    }


    /**
     * # Check existing medium id.
     *
     * @param string $id
     * @return boolean
     */
    public function ExistById(string $id): bool
    {
        $medium_id_for_check = new MediumId($id);

        $check_data_of_media = $this->medium_repository->find($medium_id_for_check);

        return !empty($check_data_of_media) ? true : false;
    }
}
