<?php

namespace App\Http\Requests\Admin\Episodes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEpisodeRequest extends FormRequest
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
            'name' => 'required|string',
            'season' => 'required|integer',
            'director_id' => 'required|integer|exists:directors,id',
            'publisher_id' => 'required|integer|exists:publishers,id',
        ];
    }
}
