<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;

    protected $fillable = [
        'medium_name'
    ];

    /**
     * Get all Records order by desc
     *
     * @return void
     */
    public function get_all_records()
    {
        $all_data = $this->orderBy('id', 'desc')->get();

        return $all_data;
    }



    /**
     * Get records with making where query
     *
     * @param string|null $name
     * @param string|null $id
     * @return void
     */
    public function get_records(string $name = null, string $id = null)
    {
        if ($name !== null && $id !== null) {
            $records = $this->where('medium_name', 'LIKE', '%' . $name . '%')->where('id', 'LIKE', '%' . $id . '%')->orderBy('id', 'desc')->get();
        } elseif ($name !== null && $id === null) {
            $records = $this->where('medium_name', 'LIKE', '%' . $name . '%')->orderBy('id', 'desc')->get();
        } elseif ($name === null && $id !== null) {
            $records = $this->where('id', 'LIKE', '%' . $id . '%')->orderBy('id', 'desc')->get();
        }

        return $records;
    }
}
