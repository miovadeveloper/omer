<?php

namespace App\Http\Requests;

use App\Trimesterikiuc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTrimesterikiucRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('trimesterikiuc_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:trimesterikiucs,id',
        ];
    }
}
