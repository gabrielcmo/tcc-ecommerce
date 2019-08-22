<?php

namespace Doomus\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelLegends\PtBrValidator\Validator;
use Auth;

class Address extends FormRequest
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
            'cpf' => 'required||formato_cpf||cpf',
            'cep' => 'formato_cep||numeric',
            'bairro' => 'required||string',
            'address' => 'required||string',
            'n' => 'required||numeric',
            'state' => 'required||string',
            'city' => 'required||string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'body.required'  => 'A message is required',
        ];
    }
}
