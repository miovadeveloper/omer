<?php

namespace App\Http\Requests;

use App\Takipler;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTakiplerRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('takipler_edit');
    }

    public function rules()
    {
        return [
            'takip_tipi'   => [
                'required',
            ],
            'hasta_id'     => [
                'required',
                'integer',
            ],
            'baslangic'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'bitis_tarihi' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'tarih'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
