<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MediaDtl extends Model
{
    use HasFactory;


    /**
     * The Primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'medium_dtl_id';


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
        'medium_dtl_id',
        'medium_dtl_name',
        'medium_id',
    ];


    public function media()
    {
        return $this->belongsTo(Medium::class, 'medium_id');
    }


    /**
     * Get all records order by desc.
     *
     * @return void
     */
    public function get_all_records()
    {
        $all_data = $this->orderBy('medium_dtl_id', 'desc')->get();

        return $all_data;
    }


    public function get_records($query_parameter)
    {

        // $query = sprintf(
        //     'SELECT %s.%s,' .
        //         '%s.%s,' .
        //         '%s.%s,' .
        //         '%s.%s ' .
        //         'FROM media_dtls ',
        //     'media_dtls',
        //     'medium_dtl_id',
        //     'media_dtls',
        //     'medium_dtl_name',
        //     'media',
        //     'medium_id',
        //     'media',
        //     'medium_name'

        // );
        // $query .= sprintf(
        //     'LEFT JOIN %s ' .
        //         'ON %s.%s = %s.%s ',
        //     'media',
        //     'media',
        //     'medium_id',
        //     'media_dtls',
        //     'medium_id'
        // );

        // $where = '';
        // foreach ($query_parameter as $key => $value) {
        //     if (empty($value)) {
        //         continue;
        //     }

        //     if ($key === 'medium_name') {
        //         $key = 'media.medium_name';
        //     }

        //     $where .= sprintf(
        //         "WHERE %s LIKE '%%%s%%'",
        //         $key,
        //         $value
        //     );
        // }

        // $query .= $where;

        // $records = DB::statement($query)->get();
        // var_dump($records);
        // exit();
    }
}
