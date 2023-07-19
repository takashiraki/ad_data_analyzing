<?php

namespace Lp\DebugInfrastructure;

use Lp\Domain\Lp\Lp;
use Lp\Domain\Lp\LpDirectory;
use Lp\Domain\Lp\LpId;
use Lp\Domain\Lp\LpMemo;
use Lp\Domain\Lp\LpName;
use Lp\Domain\Lp\LpRepositoryInterface;

class FileLpRepository implements LpRepositoryInterface
{
    public function findById(LpId $id): ?Lp
    {
        return new Lp(
            $id,
            new LpName('hogehoge'),
            new LpDirectory('directory'),
            null
        );
    }

    public function findByName(LpName $name): ?Lp
    {
        return null;
    }

    public function findByDirectory(LpDirectory $dir): ?LpDirectory
    {
        return null;
    }

    public function save(Lp $lp): Lp
    {
        return $lp;
    }

    public function update(Lp $lp): Lp
    {
        return $lp;
    }

    public function delete(Lp $lp): Lp
    {
        return $lp;
    }

    public function search(?LpName $name, ?LpDirectory $dir): ?array
    {
        $lps = [
            0 => [
                'lp_id' => '7bbc275b-b13b-433b-890e-e986b7c28977',
                'lp_name' => 'lp hoge 1',
                'lp_directory' => 'lp',
                'lp_memo' => null,
                'created_at' => '2023-05-30 15:47:43',
                'update_at' => '2023-05-30 15:47:43',
            ],
            1 => [
                'lp_id' => '92590962-8310-4506-90c0-22272f82acad',
                'lp_name' => 'lp hoge 2',
                'lp_directory' => 'lp2',
                'lp_memo' => 'hogehoge',
                'created_at' => '2023-05-30 15:47:43',
                'update_at' => '2023-05-30 15:47:43',
            ],
        ];

        $records = [];

        foreach ($lps as $value) {
            $records[] = new Lp(
                new LpId($value['lp_id']),
                new LpName($value['lp_name']),
                new LpDirectory($value['lp_directory']),
                new LpMemo($value['lp_memo']),

            );
        }

        return $records;
    }
}
