<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BicicletaRequest extends FormRequest
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
			'img' => 'file|mimes:png,jpg,jpeg,gif|max:2048',
			'marca' => 'required|string',
			'color' => 'required|string',
			'estado' => 'required|string',
			'precioHora' => 'required',
			'id_centros' => 'required',
        ];
    }
}
