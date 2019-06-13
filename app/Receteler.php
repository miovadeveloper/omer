<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receteler extends Model
{
    use SoftDeletes;

    public $table = 'recetelers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'takip_id',
        'hasta_id',
        'receteadi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function takip()
    {
        return $this->belongsTo(Takipler::class, 'takip_id');
    }

    public function hasta()
    {
        return $this->belongsTo(Hastalar::class, 'hasta_id');
    }
}
