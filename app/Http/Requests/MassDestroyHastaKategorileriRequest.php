<?php

namespace App\Http\Requests;

use App\HastaKategorileri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyHastaKategorileriRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('hasta_kategorileri_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hasta_kategorileris,id',
        ];
    }
}
