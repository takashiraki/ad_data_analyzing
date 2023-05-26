<?php

namespace Media\DebugInfrastructure;

use Media\Domain\Media\Medium;
use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;
use Media\Domain\Media\MediumRepositoryInterface;

/**
 * --------------------------------------------------------------------------
 * Debug Infrastructure
 * --------------------------------------------------------------------------
 * 
 * 
 * --- Responsibility ---
 * The responsibility that this class has is for Media.
 * 
 * --- Debug Infrastructure ---
 * This class is including code about infrastructure for debug.
 */
class FileMediumRepository implements MediumRepositoryInterface
{
    public function save(Medium $medium)
    {
        return null;
    }

    public function find(MediumId $medium_id): ?Medium
    {
        return null;
    }

    public function findByName(MediumName $medium_name): ?Medium
    {
        return null;
    }
}
