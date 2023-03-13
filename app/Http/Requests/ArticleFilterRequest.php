<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleFilterRequest extends FormRequest
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
            'min_view_count' => ['integer', "nullable"],
            'max_view_count' => ['integer', "nullable"],
            'min_like_count' => ['integer', "nullable"],
            'max_like_count' => ['integer', "nullable"]
        ];
    }
}
