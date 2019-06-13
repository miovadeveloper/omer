<?php

namespace App\Http\Requests;

use App\Dokumanlar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyDokumanlarRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('dokumanlar_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dokumanlars,id',
        ];
    }
}
