<?php

namespace App\Http\Requests;

use App\Hastalar;
use Illuminate\Foundation\Http\FormRequest;

class StoreHastalarRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('hastalar_create');
    }

    public function rules()
    {
        return [
            'ilk_gelis_tarihi' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'dogum_tarihi'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
