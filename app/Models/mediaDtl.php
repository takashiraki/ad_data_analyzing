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
}
