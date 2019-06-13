<?php

namespace App\Http\Requests;

use App\Hastalar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyHastalarRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('hastalar_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hastalars,id',
        ];
    }
}
