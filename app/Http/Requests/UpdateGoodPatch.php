<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGoodPatch extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'good.title' => 'required|between:1,50',
            'good.price' => 'required|max:1000000',
            'good.unit' => 'required|between:1,5',
            'good.store' => 'required|max:1000000',
        ];
    }
}
