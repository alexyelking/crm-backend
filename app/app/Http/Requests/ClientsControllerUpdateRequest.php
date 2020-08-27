<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsControllerUpdateRequest extends FormRequest
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
}
