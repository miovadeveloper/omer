<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usg extends Model
{
    use SoftDeletes;

    public $table = 'usgs';

    protected $dates = [
        'tarih',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const USG_TIPI_RADIO = [
        'Vaginal'   => 'Vaginal',
        'Abdominal' => 'Abdominal',
    ];

    protected $fillable = [
        'not',
        'tarih',
        'uterus',
        'takip_id',
        'sag_over',
        'sol_over',
        'usg_tipi',
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
}
