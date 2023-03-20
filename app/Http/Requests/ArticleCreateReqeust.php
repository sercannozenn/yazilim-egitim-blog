<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateReqeust extends FormRequest
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
            "title" => ['required', "max:255"],
            "slug" => ["nullable", "max:255"],
            "body" => ["required"],
            "category_id" => ["required"],
            "image" => ['image', 'mimetypes:image/jpeg,image/jpg,image/png', "max:2048"]
        ];
    }
}
