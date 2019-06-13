<?php

namespace App\Http\Requests;

use App\Receteitem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyReceteitemRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('receteitem_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:receteitems,id',
        ];
    }
}
