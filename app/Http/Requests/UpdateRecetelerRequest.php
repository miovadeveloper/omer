<?php

namespace App\Http\Requests;

use App\Receteler;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRecetelerRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('receteler_edit');
    }

    public function rules()
    {
        return [
        ];
    }
}
