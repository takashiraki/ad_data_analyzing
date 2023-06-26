<?php

namespace MediaDtl\DebugInfrastructure;

use illuminate\Support\Str;
use MediaDtl\Domain\Media\MediumId;
use MediaDtl\Domain\Media\Medium;
use MediaDtl\Domain\Media\MediumName;
use MediaDtl\Domain\MediaDtl\MediumDtlName;
use MediaDtl\Domain\MediaDtl\MediumDtl;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;


class FileMediumDtlRepository implements MediumDtlRepositoryInterface
{

    public function save(MediumDtl $medium_dtl): MediumDtl
    {
        return $medium_dtl;
    }

    public function findMediumById(MediumId $id): ?Medium
    {
        return new Medium(
            new MediumId((string)Str::uuid()),
            new MediumName('hogehoge')
        );
    }

    public function findById(MediumDtlId $id): ?MediumDtl
    {
        return new MediumDtl(
            $id,
            new MediumDtlName('hogehoge'),
            new MediumId((string)Str::uuid())
        );
    }

    public function findByName(MediumDtlName $name): ?MediumDtl
    {
        return new MediumDtl(
            new MediumDtlId((string)Str::uuid()),
            new MediumDtlName('fugafuga'),
            new MediumId((string)Str::uuid())
        );
    }

    public function getMediumRecords(): ?array
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
