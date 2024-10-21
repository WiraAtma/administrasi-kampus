<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nim' => 'max:10|unique:mahasiswa',
            'name' => 'min:3|max:100',
            'phone' => 'max:20|unique:mahasiswa',
            'email' => 'min:10|unique:mahasiswa'
        ];
    }

    public function messages()
    {
        return [
            'nim.max' => 'Karakter NIM Melebihi :max angka',
            'nim.unique' => 'NIM sudah terpakai mohon isi dengan angka lain',
            'name.min' => 'Karakter Name Tidak Boleh Kurang Dari :min Karakter',
            'name.max' => 'Karakter Name Tidak Boleh Lebih Dari :max Karakter',
            'phone.max' => 'Nomor Telepon Tidak Boleh Lebih Dari 20 Karakter',
            'phone.unique' => 'Nomor Telepon Sudah Digunakan',
            'email.min' => 'Email Tidak Boleh Kuramg Dari 10 Karakter',
            'email.unique' => 'Email Sudah Digunakan'
        ];
    }
}
