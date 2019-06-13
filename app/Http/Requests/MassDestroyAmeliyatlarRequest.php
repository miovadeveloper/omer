<?php

namespace App\Http\Requests;

use App\Ameliyatlar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyAmeliyatlarRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('ameliyatlar_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ameliyatlars,id',
        ];
    }
}
