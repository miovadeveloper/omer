<?php

namespace App\Http\Requests;

use App\Dokumanlar;
use Illuminate\Foundation\Http\FormRequest;

class StoreDokumanlarRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('dokumanlar_create');
    }

    public function rules()
    {
        return [
            'takip_id' => [
                'required',
                'integer',
            ],
            'tarih'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
