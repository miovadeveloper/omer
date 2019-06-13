<?php

namespace App\Http\Requests;

use App\Trimesterbir;
use Illuminate\Foundation\Http\FormRequest;

class StoreTrimesterbirRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('trimesterbir_create');
    }

    public function rules()
    {
        return [
            'tarih'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'crl_tarih' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
