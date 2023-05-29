<?php

namespace Media\Domain\Media;

/**
 * --------------------------------------------------------------------------
 * # Repository
 * --------------------------------------------------------------------------
 * 
 * ## Responsibility
 * The responsibility this class has is Dependency injection principle for Media.
 * This class has to protect dependency for Infrastructure.
 * 
 */
interface MediumRepositoryInterface
{

    /**
     * # Save medium info
     *
     * @param Medium $medium
     * @return void
     */
    public function save(Medium $medium);


    /**
     * # Update medium info.
     *
     * @param Medium $medium
     * @return void
     */
    public function update(Medium $medium);


    /**
     * # Delete medium info.
     *
     * @param Medium $medium
     * @return void
     */
    public function delete(Medium $medium);



    /**
     * # Find by medium id.
     *
     * @param MediumId $medium_id
     * @return Medium|null
     */
    public function find(MediumId $medium_id): ?Medium;


    /**
     * # Find medium info using medium name.
     *
     * @param MediumName $medium_name
     * @return Medium
     */
    public function findByName(MediumName $medium_name): ?Medium;
}
