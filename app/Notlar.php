<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notlar extends Model
{
    use SoftDeletes;

    public $table = 'notlars';

    protected $dates = [
        'tarih',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'not',
        'tarih',
        'takip_id',
        'created_at',
        'updated_at',
        'deleted_at',
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
