<?php

namespace Media\DebugInfrastructure;

use Media\Domain\Media\Medium;
use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;
use Media\Domain\Media\MediumRepositoryInterface;

/**
 * --------------------------------------------------------------------------
 * # Debug Infrastructure
 * --------------------------------------------------------------------------
 * 
 * 
 * ## Responsibility
 * 
 * The responsibility this class has is for Media.
 * 
 * 
 * ## Debug Infrastructure
 * 
 * This class is including code about infrastructure for debug.
 * 
 */
class FileMediumRepository implements MediumRepositoryInterface
{
    public function save(Medium $medium)
    {
        return $medium;
    }

    public function update(Medium $medium)
    {
        return $medium;
    }

    public function delete(Medium $medium)
    {
        //
    }

    public function find(MediumId $medium_id): ?Medium
    {
        return new Medium(
            new MediumId($medium_id->getMediumId()),
            new MediumName('hogehoge')
        );
    }

    public function findByName(MediumName $medium_name): ?Medium
    {
        return null;
    }
}
