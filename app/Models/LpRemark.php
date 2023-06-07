<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LpRemark extends Model
{
    use HasFactory;


    /**
     * The Primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'lp_id';


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
        'lp_id',
        'lp_remark',
    ];
}
