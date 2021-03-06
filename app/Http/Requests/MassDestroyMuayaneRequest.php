<?php

namespace App\Http\Requests;

use App\Muayane;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyMuayaneRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('muayane_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:muayanes,id',
        ];
    }
}
