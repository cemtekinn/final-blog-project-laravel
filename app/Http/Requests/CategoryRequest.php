<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title'=>"required|string|max:255|unique:categories,title",
            'description'=>"nullable|string"
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Başlık alanı zorunludur.',
            'title.string' => 'Başlık alanı metin olmalıdır.',
            'title.max' => 'Başlık alanı en fazla 255 karakter olmalıdır.',
            'title.unique' => 'Bu başlık zaten kullanılmış.',
            'description.string' => 'Açıklama alanı metin olmalıdır.'
        ];
    }
}
