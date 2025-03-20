<?php

namespace App\Http\Requests;

use App\Rules\RequiredIfNanashi;
use Illuminate\Foundation\Http\FormRequest;

class UserSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string'],
            'email'    => ['required', 'email'],
            'nickname' => ['nullable', 'string', new RequiredIfNanashi($this->input('name'))],
        ];
    }

    protected function prepareForValidation()
    {
        $email = $this->input('email');
        if ($email) {
            $this->merge([
                'email' => strtolower($email),
            ]);
        }
    }
}
