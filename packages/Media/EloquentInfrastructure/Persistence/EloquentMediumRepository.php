<?php

namespace Media\EloquentInfrastructure\Persistence;

use Media\Domain\Media\Medium;
use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;
use Media\Domain\Media\MediumRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Media\UseCase\SearchMediumUseCase\SearchMediumRequest;

/**
 * --------------------------------------------------------------------------
 * # Repository
 * --------------------------------------------------------------------------
 * 
 * 
 * ## Responsibility
 * 
 * The responsibility this class has is for Media.
 * This class use Database so you can test useing database.
 */
class EloquentMediumRepository implements MediumRepositoryInterface
{
    public function save(Medium $medium)
    {
        $query = DB::table('media');

        $query->insert(
            [
                'medium_id' => $medium->getMediumId()->getValue(),
                'medium_name' => $medium->getMediumName()->getValue(),
                'created_at' => Carbon::parse(Carbon::now())->timezone('Asia/Tokyo'),
                'updated_at' => Carbon::parse(Carbon::now())->timezone('Asia/Tokyo')
            ]
        );
    }

    public function update(Medium $medium)
    {
        $query = DB::table('media');

        $query->where(
            'medium_id',
            $medium->getMediumId()->getValue()
        )->update(
            [
                'medium_name' => $medium->getMediumName()->getValue(),
                'updated_at' => Carbon::parse(Carbon::now())->timezone('Asia/Tokyo')
            ]
        );
    }

    public function delete(Medium $medium)
    {
        $query = DB::table('media');

        $query->where('medium_id', $medium->getMediumId()->getValue())->delete();
    }

    public function find(MediumId $medium_id): ?Medium
    {
        $query = DB::table('media');

        $record = $query->where('medium_id', $medium_id->getValue())->first();

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

        $record = $query->where('medium_name', $medium_name->getValue())->first();

        if (!empty($record)) {
            $medium_instance = new Medium(
                new MediumId($record->medium_id),
                new MediumName($record->medium_name)
            );

            return $medium_instance;
        }

        return $record;
    }

    public function getRecords(SearchMediumRequest $request)
    {

        $query = DB::table('media');

        if ($request->getMediumId() !== null) {
            $query->where('medium_id', 'LIKE', '%' . $request->getMediumId() . '%');
        }

        if ($request->getMediumName() !== null) {
            $query->where('medium_name', 'LIKE', '%' . $request->getMediumName() . '%');
        }

        $records = $query->get();

        return $records;
    }
}
