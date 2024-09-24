<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlquilereRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'fechaInicial' => 'required',
			'fechaFinal' => 'required',
			'tpAlquiler' => 'required|string',
			'id_users' => 'required',
			'id_bicicletas' => 'required',
        ];
    }
}
