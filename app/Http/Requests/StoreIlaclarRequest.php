<?php

namespace App\Http\Requests;

use App\Ilaclar;
use Illuminate\Foundation\Http\FormRequest;

class StoreIlaclarRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('ilaclar_create');
    }

    public function rules()
    {
        return [
        ];
    }
}
