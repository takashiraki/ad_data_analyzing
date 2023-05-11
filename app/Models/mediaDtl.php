<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mediaDtl extends Model
{
    use HasFactory;

    protected $fillable = [
        'medium_dtl_name',
        'medium_id',
    ];

    /**
     * Get all records
     *
     * @return void
     */
    public function get_all_records()
    {
        $all_records = $this->orderBy('id', 'desc')->get();

        return $all_records;
    }
}
