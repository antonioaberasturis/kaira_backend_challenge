<?php

declare(strict_types=1);

namespace KairaDigital\UrlShortener\Infrastructure\Requests\Laravel;

use Illuminate\Foundation\Http\FormRequest;

class UrlPostRequest extends FormRequest
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
            "url" => 'required|url',
        ];
    }

    public function messages(): array
    {
        return [
            "url.url"       => "the url is not valid",
            "url.required"  => "the url is required",
        ];
    }
}
