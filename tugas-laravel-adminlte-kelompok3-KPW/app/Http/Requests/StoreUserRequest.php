<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Wajib diubah ke true
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id'  => 'required|exists:roles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Nama user wajib diisi!',
            'email.required'    => 'Email wajib diisi!',
            'email.email'       => 'Format email tidak valid!',
            'email.unique'      => 'Email sudah terdaftar, gunakan email lain!',
            'password.required' => 'Password wajib diisi!',
            'password.min'      => 'Password minimal 6 karakter!',
            'role_id.required'  => 'Role user wajib dipilih!',
            'role_id.exists'    => 'Role yang dipilih tidak valid!',
        ];
    }
}