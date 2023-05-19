<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;


    /**
     * The Primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'medium_id';


    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'medium_id',
        'medium_name',
    ];


    public function medium_dtl()
    {
        return $this->hasMany(MediaDtl::class, 'medium_dtl_id');
    }


    /**
     * Get all Records order by desc
     *
     * @return void
     */
    public function get_all_records()
    {
        $all_data = $this->orderBy('medium_id', 'desc')->get();

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
            $records = $this->where('medium_name', 'LIKE', '%' . $name . '%')
                ->where('medium_id', 'LIKE', '%' . $id . '%')->orderBy('id', 'desc')->get();
        } elseif ($name !== null && $id === null) {
            $records = $this->where('medium_name', 'LIKE', '%' . $name . '%')
                ->orderBy('medium_id', 'desc')->get();
        } elseif ($name === null && $id !== null) {
            $records = $this->where('medium_id', 'LIKE', '%' . $id . '%')
                ->orderBy('medium_id', 'desc')->get();
        }

        return $records;
    }
}
