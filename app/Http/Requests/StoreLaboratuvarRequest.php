<?php

namespace App\Http\Requests;

use App\Laboratuvar;
use Illuminate\Foundation\Http\FormRequest;

class StoreLaboratuvarRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('laboratuvar_create');
    }

    public function rules()
    {
        return [
        ];
    }
}
