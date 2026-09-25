<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Wajib diubah ke true
    }

    public function rules(): array
    {
        $user = $this->route('user');
        $userId = is_object($user) ? $user->id : $user;

        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $userId,
            'password' => 'nullable|string|min:6', // Optional saat edit
            'role_id'  => 'required|exists:roles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Nama user wajib diisi!',
            'email.required'   => 'Email wajib diisi!',
            'email.email'      => 'Format email tidak valid!',
            'email.unique'     => 'Email sudah digunakan oleh user lain!',
            'password.min'     => 'Password minimal 6 karakter jika ingin diubah!',
            'role_id.required' => 'Role user wajib dipilih!',
        ];
    }
}