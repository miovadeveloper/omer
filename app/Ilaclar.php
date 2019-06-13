<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ilaclar extends Model
{
    use SoftDeletes;

    public $table = 'ilaclars';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ilac_adi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
