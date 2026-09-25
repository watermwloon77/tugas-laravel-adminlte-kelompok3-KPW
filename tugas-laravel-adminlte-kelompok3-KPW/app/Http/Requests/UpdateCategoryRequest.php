<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Abaikan unik untuk ID kategori yang sedang diedit
            'nama' => 'required|min:5|unique:categories,nama,' . $this->route('category'),
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama kategori wajib diisi!',
            'nama.min'      => 'Nama kategori minimal 5 karakter!',
            'nama.unique'   => 'Nama kategori sudah ada!',
        ];
    }
}
