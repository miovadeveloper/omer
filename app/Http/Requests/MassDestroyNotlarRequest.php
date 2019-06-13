<?php

namespace App\Http\Requests;

use App\Notlar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyNotlarRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('notlar_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:notlars,id',
        ];
    }
}
