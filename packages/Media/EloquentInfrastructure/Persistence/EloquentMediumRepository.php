<?php

namespace Media\EloquentInfrastructure\Persistence;

use Media\Domain\Media\Medium;
use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;
use Media\Domain\Media\MediumRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * --------------------------------------------------------------------------
 * Repository
 * --------------------------------------------------------------------------
 * 
 * --- Responsibility ---
 * The responsibility this class has is for Media.
 * This class use Database so you can test useing database.
 */
class EloquentMediumRepository implements MediumRepositoryInterface
{
    public function save(Medium $medium)
    {
        $query = DB::table('media');

        $query->updateOrInsert(
            ['medium_id' => $medium->getMediumId()->getValue()],
            ['medium_name' => $medium->getMediumName()->getValue()]
        );
    }

    public function find(MediumId $medium_id): ?Medium
    {
        $query = DB::table('Media');

        $record = $query->where('medium_id', $medium_id->getMediumId())->first();

        if (!empty($record)) {
            $medium_instance = new Medium(
                new MediumId($record->medium_id),
                new MediumName($record->medium_name)
            );

            return $medium_instance;
        }

        return $record;
    }

    public function findByName(MediumName $medium_name): ?Medium
    {
        $query = DB::table('media');

        $record = $query->where('medium_name', $medium_name->getMediumName())->first();

        if (!empty($record)) {
            $medium_instance = new Medium(
                new MediumId($record->medium_id),
                new MediumName($record->medium_name)
            );

            return $medium_instance;
        }

        return $record;
    }
}
