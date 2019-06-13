<?php

namespace App\Http\Requests;

use App\Receteitem;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReceteitemRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('receteitem_edit');
    }

    public function rules()
    {
        return [
        ];
    }
}
