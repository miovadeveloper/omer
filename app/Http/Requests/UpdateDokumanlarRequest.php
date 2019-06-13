<?php

namespace App\Http\Requests;

use App\Dokumanlar;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDokumanlarRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('dokumanlar_edit');
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
