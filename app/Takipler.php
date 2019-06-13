<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Takipler extends Model
{
    use SoftDeletes;

    public $table = 'takiplers';

    const SAT_EMIN_RADIO = [
        'Evet'  => 'Evet',
        'Hayır' => 'Hayır',
    ];

    const GEB_HAFT_DUZELTILDI_RADIO = [
        'Evet'  => 'Evet',
        'Hayır' => 'Hayır',
    ];

    protected $dates = [
        'tarih',
        'baslangic',
        'created_at',
        'updated_at',
        'deleted_at',
        'bitis_tarihi',
    ];

    const TAKIP_TIPI_SELECT = [
        'gebe' => 'Gebe',
        'jine' => 'Jinekoloji',
        'infe' => 'İnfertilite',
    ];

    protected $fillable = [
        'sat',
        'vki',
        'fat',
        'oyku',
        'oneri',
        'durum',
        'tarih',
        'g_t_t',
        'boy_cm',
        'kilo_kg',
        'hasta_id',
        'sat_emin',
        'fetal_dna',
        'baslangic',
        'updated_at',
        'created_at',
        'takip_tipi',
        'deleted_at',
        'sonuc_notu',
        'bitis_tarihi',
        'bir_trimaster',
        'iki_trimaster',
        'genetik_inceleme',
        'geb_haft_duzeltildi',
    ];

    public function hasta()
    {
        return $this->belongsTo(Hastalar::class, 'hasta_id');
    }

    public function getBaslangicAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBaslangicAttribute($value)
    {
        $this->attributes['baslangic'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBitisTarihiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBitisTarihiAttribute($value)
    {
        $this->attributes['bitis_tarihi'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTarihAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTarihAttribute($value)
    {
        $this->attributes['tarih'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
