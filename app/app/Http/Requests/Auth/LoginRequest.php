<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests\Auth
 *
 * Получаем
 * @property string $email
 * @property string $password
 */
class LoginRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'min:3', 'max:50', 'email'],
            'password' => ['required', 'string', 'min:6', 'max:50'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'validation.auth.email.required',
            'email.string' => 'validation.auth.email.string',
            'email.min' => 'validation.auth.email.min.length',
            'email.max' => 'validation.auth.email.max.length',
            'email.email' => 'validation.auth.email.email',

            'password.required' => 'validation.auth.password.required',
            'password.string' => 'validation.auth.password.string',
            'password.min' => 'validation.auth.password.min.length',
            'password.max' => 'validation.auth.password.max.length',
        ];
    }
}
