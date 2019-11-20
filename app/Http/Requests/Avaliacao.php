<?php

namespace Doomus\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class Avaliacao extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_rating' => 'required||string',
            'description_text' => 'required||string',
            'note_rating' => 'required||numeric'
        ];
    }

    public function messages()
    {
        return [
            'title_rating.required' => 'É preciso definir um título para sua avaliação', 
            'description_text.required' => 'É preciso definir uma descrição para sua avaliação', 
            'note_rating.required' => 'É preciso definir uma nota para sua avaliação'
        ];
    }
}
