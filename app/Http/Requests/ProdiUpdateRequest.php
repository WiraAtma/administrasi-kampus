<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdiUpdateRequest extends FormRequest
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
            'name' => 'min:3|unique:prodi'
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Nama Tidak Boleh Kurang Dari :min Karakter',
            'name.unique' => 'Nama Program Studi Sudah Pernah Dipakai'
        ];
    }
}
