<?php

namespace App\Http\Requests;

use App\Trimesterbir;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTrimesterbirRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('trimesterbir_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:trimesterbirs,id',
        ];
    }
}
