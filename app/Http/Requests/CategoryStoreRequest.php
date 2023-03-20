<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', "max:255"],
            "slug" => ["max:255"],
            "description" => ["max:255"],
            "seo_keywords" => ["max:255"],
            "seo_description" => ["max:255"],
            "image" => ["image", "mimes:png,jpeg,jpg", "nullable", "max:2048"],
        ];
    }

    public function messages()
    {
        return [
          'name.required' => "Kategori adı alanı zorunludur",
          'name.max' => "Kategori adı alanı en fazla 255 karakterden oluşabilir.",
          'description.max' => "Kategori açıklama alanı en fazla 255 karakterden oluşabilir.",
          'seo_keywords.max' => "Kategori Seo Keywords adı alanı en fazla 255 karakterden oluşabilir.",
          'seo_description.max' => "Kategori Seo Description alanı en fazla 255 karakterden oluşabilir.",
        ];
    }
}
