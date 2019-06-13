<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receteitem extends Model
{
    use SoftDeletes;

    public $table = 'receteitems';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ZAMAN_SELECT = [
        'Günde'   => 'Günde',
        'Haftada' => 'Haftada',
        'Ayda'    => 'Ayda',
        'Yılda'   => 'Yılda',
    ];

    protected $fillable = [
        'dbir',
        'diki',
        'zaman',
        'ilac_id',
        'kullanim',
        'kutuadeti',
        'created_at',
        'updated_at',
        'deleted_at',
        'receteadi_id',
    ];

    const KUTUADETI_SELECT = [
        'I'    => '1',
        'II'   => '2',
        'III'  => '3',
        'IV'   => '4',
        'V'    => '5',
        'VI'   => '6',
        'VII'  => '7',
        'VIII' => '8',
        'IX'   => '9',
        'X'    => '10',
        'XI'   => '11',
        'XII'  => '12',
        'XIII' => '13',
        'XIV'  => '14',
        'XV'   => '15',
    ];

    const KULLANIM_SELECT = [
        'AĞIZDAN'         => 'AĞIZDAN',
        'İİNTRAVAJİNAL'   => 'İİNTRAVAJİNAL',
        'HARİCEN'         => 'HARİCEN',
        'İNTRAMÜSKÜLER'   => 'İNTRAMÜSKÜLER',
        'İNTRAVENÖZ'      => 'İNTRAVENÖZ',
        'SOLUNUM YOLUYLA' => 'SOLUNUM YOLUYLA',
        'REKTAL'          => 'REKTAL',
        'NAZAL'           => 'NAZAL',
    ];

    public function receteadi()
    {
        return $this->belongsTo(Receteler::class, 'receteadi_id');
    }

    public function ilac()
    {
        return $this->belongsTo(Ilaclar::class, 'ilac_id');
    }
}
