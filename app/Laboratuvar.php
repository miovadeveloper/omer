<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Laboratuvar extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'laboratuvars';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'takip_id',
        'tetkik_adi',
        'created_at',
        'updated_at',
        'deleted_at',
        'tetkik_detaylari',
    ];

    public function takip()
    {
        return $this->belongsTo(Takipler::class, 'takip_id');
    }

    public function getlaboratuvarDosyaAttribute()
    {
        return $this->getMedia('laboratuvar_dosya');
    }
}
