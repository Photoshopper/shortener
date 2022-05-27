<?php

namespace App\Http\Requests\API;

use App\Rules\SafeUrl;
use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => ['required', 'url', new SafeUrl]
        ];
    }
}
