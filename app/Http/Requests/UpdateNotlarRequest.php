<?php

namespace App\Http\Requests;

use App\Notlar;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNotlarRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('notlar_edit');
    }

    public function rules()
    {
        return [
            'tarih'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'takip_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
