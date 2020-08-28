<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Clients
 *
 * Получаем
 * @property string $name
 * @property string $email
 * @property string $phone
 */
class UpdateRequest extends FormRequest
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
            'name' => ['string', 'min:3', 'max:50'],
            'email' => ['string', 'min:3', 'max:50', 'email', 'unique:clients'],
            'phone' => ['string', 'min:8', 'max:15', 'unique:clients'],
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'validation.clients.name.string',
            'name.min' => 'validation.clients.name.min.length',
            'name.max' => 'validation.clients.name.max.length',

            'email.string' => 'validation.clients.email.string',
            'email.min' => 'validation.clients.email.min.length',
            'email.max' => 'validation.clients.email.max.length',
            'email.email' => 'validation.clients.email.email',
            'email.unique' => 'validation.clients.email.unique',

            'phone.string' => 'validation.clients.phone.string',
            'phone.min' => 'validation.clients.phone.min.length',
            'phone.max' => 'validation.clients.phone.max.length',
            'phone.unique' => 'validation.clients.phone.unique',
        ];
    }
}
