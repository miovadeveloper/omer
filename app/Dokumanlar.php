<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Dokumanlar extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'dokumanlars';

    protected $dates = [
        'tarih',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tarih',
        'takip_id',
        'dosya_adi',
        'dosya_notu',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function takip()
    {
        return $this->belongsTo(Takipler::class, 'takip_id');
    }

    public function getTarihAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTarihAttribute($value)
    {
        $this->attributes['tarih'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getdosyaAttribute()
    {
        return $this->getMedia('dosya');
    }
}
