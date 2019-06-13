<?php

namespace App\Http\Requests;

use App\Takipler;
use Illuminate\Foundation\Http\FormRequest;

class StoreTakiplerRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('takipler_create');
    }

    public function rules()
    {
        return [
            'takip_tipi' => [
                'required',
            ],
            'hasta_id'   => [
                'required',
                'integer',
            ],
            'baslangic'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
