<?php

namespace Form\DebugInfrastructure;

use Form\Domain\Form\FormName;
use Form\Domain\Form\Form;
use Form\Domain\Form\FormDirectory;
use Form\Domain\Form\FormId;
use Form\Domain\Form\FormMemo;
use Form\Domain\Form\FormRepositoryInterface;

class FileFormRepository implements FormRepositoryInterface
{
    public function findById(FormId $id): ?Form
    {
        return new Form(
            $id,
            new FormName('hoge form'),
            new FormDirectory('hoge02'),
            null
        );
    }

    public function findByName(FormName $name): ?Form
    {
        return null;
    }

    public function findByDirectory(FormDirectory $dir): ?Form
    {
        return null;
    }

    public function save(Form $form): Form
    {
        return $form;
    }

    public function update(Form $form): Form
    {
        return $form;
    }

    public function delete(Form $form): Form
    {
        return $form;
    }

    public function search(?FormName $name, ?FormDirectory $dir): ?array
    {
        $lps = [
            0 => [
                'form_id' => '7bbc275b-b13b-433b-890e-e986b7c28977',
                'form_name' => 'lp hoge 1',
                'form_directory' => 'lp',
                'form_memo' => null,
                'created_at' => '2023-05-30 15:47:43',
                'update_at' => '2023-05-30 15:47:43',
            ],
            1 => [
                'form_id' => '92590962-8310-4506-90c0-22272f82acad',
                'form_name' => 'lp hoge 2',
                'form_directory' => 'lp2',
                'form_memo' => 'hogehoge',
                'created_at' => '2023-05-30 15:47:43',
                'update_at' => '2023-05-30 15:47:43',
            ],
        ];

        $records = [];

        foreach ($lps as $value) {
            $records[] = new Form(
                new FormId($value['form_id']),
                new FormName($value['form_name']),
                new FormDirectory($value['form_directory']),
                new FormMemo($value['form_memo']),
            );
        }

        return $records;
    }
}
