<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trimesterikiuc extends Model
{
    use SoftDeletes;

    public $table = 'trimesterikiucs';

    protected $dates = [
        'tarih',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RANDEVU_TIPI_SELECT = [
        'muayene'          => 'Muayene',
        'kontrol'          => 'Kontrol',
        'girisimsel_islem' => 'Girişimsel İşlem',
    ];

    protected $fillable = [
        'odem',
        'tarih',
        'sonuc',
        'kilo_kg',
        'yakinma',
        'icd_kodu',
        'tansiyon',
        'ultrason',
        'takip_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'usg_ile_gun',
        'sat_ile_gun',
        'uterin_arter',
        'randevu_tipi',
        'usg_ile_hafta',
        'sat_ile_hafta',
        'servikal_kanal',
        'trimestertipi',
        'plesanta',

    ];

    public function getTarihAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTarihAttribute($value)
    {
        $this->attributes['tarih'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function takip()
    {
        return $this->belongsTo(Takipler::class, 'takip_id');
    }
}
