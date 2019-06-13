<?php

namespace App\Http\Requests;

use App\HastaKategorileri;
use Illuminate\Foundation\Http\FormRequest;

class StoreHastaKategorileriRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('hasta_kategorileri_create');
    }

    public function rules()
    {
        return [
        ];
    }
}
