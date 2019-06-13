<?php

namespace App\Http\Requests;

use App\Receteler;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyRecetelerRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('receteler_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:recetelers,id',
        ];
    }
}
