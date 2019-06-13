<?php

namespace App\Http\Requests;

use App\Receteler;
use Illuminate\Foundation\Http\FormRequest;

class StoreRecetelerRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('receteler_create');
    }

    public function rules()
    {
        return [
        ];
    }
}
