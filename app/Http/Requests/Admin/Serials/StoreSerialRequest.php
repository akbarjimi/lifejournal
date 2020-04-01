<?php

namespace App\Http\Requests\Admin\Serials;

use Illuminate\Foundation\Http\FormRequest;

class StoreSerialRequest extends FormRequest
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
            'imdb_id' => 'required|string'
        ];
    }
}
