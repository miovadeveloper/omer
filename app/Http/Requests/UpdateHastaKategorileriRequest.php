<?php

namespace App\Http\Requests;

use App\HastaKategorileri;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHastaKategorileriRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('hasta_kategorileri_edit');
    }

    public function rules()
    {
        return [
        ];
    }
}
