<?php

namespace App\Http\Requests;

use App\Receteitem;
use Illuminate\Foundation\Http\FormRequest;

class StoreReceteitemRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('receteitem_create');
    }

    public function rules()
    {
        return [
        ];
    }
}
