<?php

namespace App\Http\Requests;

use App\Ilaclar;
use Illuminate\Foundation\Http\FormRequest;

class UpdateIlaclarRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('ilaclar_edit');
    }

    public function rules()
    {
        return [
        ];
    }
}
