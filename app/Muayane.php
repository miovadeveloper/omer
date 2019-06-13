<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Muayane extends Model
{
    use SoftDeletes;

    public $table = 'muayanes';

    protected $dates = [
        'sat',
        'tarih',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const USG_TIPI_RADIO = [
        'Vaginal'   => 'Vaginal',
        'Abdominal' => 'Abdominal',
    ];

    const RANDEVU_TIPI_SELECT = [
        'muayene'          => 'Muayene',
        'kontrol'          => 'Kontrol',
        'girisimsel_islem' => 'Girişimsel İşlem',
    ];

    protected $fillable = [
        'vki',
        'sat',
        'oyku',
        'tani',
        'tarih',
        'sonuc',
        'uterus',
        'tedavi',
        'boy_cm',
        'sikayet',
        'kilo_kg',
        'sol_over',
        'takip_id',
        'usg_notu',
        'sag_over',
        'icd_kodu',
        'usg_tipi',
        'created_at',
        'updated_at',
        'deleted_at',
        'randevu_tipi',
        'diger_notlar',
        'smear_notlari',
        'jinekolojik_muayene',
        'istenilen_tetkikler',
    ];

    public function getTarihAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTarihAttribute($value)
    {
        $this->attributes['tarih'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSatAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSatAttribute($value)
    {
        $this->attributes['sat'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function takip()
    {
        return $this->belongsTo(Takipler::class, 'takip_id');
    }
}
