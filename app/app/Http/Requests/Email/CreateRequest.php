<?php

namespace App\Http\Requests\Email;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed body
 * @property mixed to
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */
class CreateRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->body = (string)$this->body;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => ['required', 'string'],
            'to' => ['required', 'string', 'email'],
        ];
    }
}
