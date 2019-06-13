<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HastaKategorileri extends Model
{
    use SoftDeletes;

    public $table = 'hasta_kategorileris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hastak',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
