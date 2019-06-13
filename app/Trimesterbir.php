<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trimesterbir extends Model
{
    use SoftDeletes;

    public $table = 'trimesterbirs';

    const MIDE_SELECT = [
        'EVET'  => 'EVET',
        'HAYIR' => 'HAYIR',
    ];

    const MESANE_SELECT = [
        'EVET'  => 'EVET',
        'HAYIR' => 'HAYIR',
    ];

    protected $dates = [
        'tarih',
        'crl_tarih',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RANDEVU_TIPI_SELECT = [
        'muayane'          => 'Muayene',
        'kontrol'          => 'Kontrol',
        'girisimsel_islem' => 'Girişimsel İşlem',
    ];

    protected $fillable = [
        'nt',
        'ta',
        'crl',
        'kilo',
        'mide',
        'tarih',
        'mesane',
        'notlar',
        'crl_gun',
        'icd_kodu',
        'takip_id',
        'crl_tarih',
        'created_at',
        'updated_at',
        'deleted_at',
        'fka_vuru_dk',
        'nazal_kemik',
        'yolk_kesesi',
        'randevu_tipi',
        'gebelik_kesesi',
    ];

    public function getTarihAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTarihAttribute($value)
    {
        $this->attributes['tarih'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCrlTarihAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCrlTarihAttribute($value)
    {
        $this->attributes['crl_tarih'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function takip()
    {
        return $this->belongsTo(Takipler::class, 'takip_id');
    }
}
