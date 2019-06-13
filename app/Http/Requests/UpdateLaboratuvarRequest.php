<?php

namespace App\Http\Requests;

use App\Laboratuvar;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLaboratuvarRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('laboratuvar_edit');
    }

    public function rules()
    {
        return [
        ];
    }
}
