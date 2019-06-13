<?php

namespace App\Http\Requests;

use App\Muayane;
use Illuminate\Foundation\Http\FormRequest;

class StoreMuayaneRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('muayane_create');
    }

    public function rules()
    {
        return [
            'tarih' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'sat'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
