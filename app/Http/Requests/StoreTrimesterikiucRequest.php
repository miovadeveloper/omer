<?php

namespace App\Http\Requests;

use App\Trimesterikiuc;
use Illuminate\Foundation\Http\FormRequest;

class StoreTrimesterikiucRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('trimesterikiuc_create');
    }

    public function rules()
    {
        return [
            'tarih' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
