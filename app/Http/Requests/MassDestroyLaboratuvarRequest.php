<?php

namespace App\Http\Requests;

use App\Laboratuvar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyLaboratuvarRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('laboratuvar_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:laboratuvars,id',
        ];
    }
}
