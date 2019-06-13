<?php

namespace App\Http\Requests;

use App\Usg;
use Illuminate\Foundation\Http\FormRequest;

class StoreUsgRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('usg_create');
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
