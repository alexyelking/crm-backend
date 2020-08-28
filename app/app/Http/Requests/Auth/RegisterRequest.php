<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterRequest
 * @package App\Http\Requests\Auth
 *
 * Получаем
 * @property string $name
 * @property string $email
 * @property string $password
 */
class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'string', 'min:3', 'max:50', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:50', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'validation.auth.name.required',
            'name.string' => 'validation.auth.name.string',
            'name.min' => 'validation.auth.name.min.length',
            'name.max' => 'validation.auth.name.max.length',

            'email.required' => 'validation.auth.email.required',
            'email.string' => 'validation.auth.email.string',
            'email.min' => 'validation.auth.email.min.length',
            'email.max' => 'validation.auth.email.max.length',
            'email.email' => 'validation.auth.email.email',
            'email.unique' => 'validation.auth.email.unique',

            'password.required' => 'validation.auth.password.required',
            'password.string' => 'validation.auth.password.string',
            'password.min' => 'validation.auth.password.min.length',
            'password.max' => 'validation.auth.password.max.length',
            'password.confirmed' => 'validation.auth.password.confirmed',
        ];
    }
}
