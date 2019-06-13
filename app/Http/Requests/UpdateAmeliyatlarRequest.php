<?php

namespace App\Http\Requests;

use App\Ameliyatlar;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAmeliyatlarRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('ameliyatlar_edit');
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
