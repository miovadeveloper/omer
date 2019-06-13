<?php

namespace App\Http\Requests;

use App\Usg;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyUsgRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('usg_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:usgs,id',
        ];
    }
}
