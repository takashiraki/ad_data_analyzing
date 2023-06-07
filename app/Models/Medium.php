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
}
