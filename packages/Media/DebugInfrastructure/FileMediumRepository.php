<?php

namespace Media\DebugInfrastructure;

use Illuminate\Support\Arr;
use Media\Domain\Media\Medium;
use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;
use Media\Domain\Media\MediumRepositoryInterface;
use Media\UseCase\SearchMediumUseCase\SearchMediumRequest;

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
            new MediumId($medium_id->getValue()),
            new MediumName('hogehoge')
        );
    }

    public function findByName(MediumName $medium_name): ?Medium
    {
        return null;
    }

    public function getRecords(?string $medium_id, ?string $medium_name): ?array
    {
        $media = [
            0 => [
                "medium_id" => "7bbc275b-b13b-433b-890e-e986b7c28977",
                "medium_name" => "テスト媒体100",
                "created_at" => "2023-05-30 15:47:49",
                "updated_at" => "2023-05-30 15:47:49"
            ],
            1 => [
                "medium_id" => "92590962-8310-4506-90c0-22272f82acad",
                "medium_name" => "テスト媒体200",
                "created_at" => "2023-05-30 15:47:43",
                "updated_at" => "2023-05-30 15:47:43"
            ],
        ];


        $records = [];
        foreach ($media as $value) {
            $records[] = new Medium(
                new MediumId($value['medium_id']),
                new MediumName($value['medium_name'])
            );
        }

        return $records;
    }
}
