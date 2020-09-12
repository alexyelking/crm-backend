<?php

namespace App\Http\Requests\Email;

use App\Exceptions\AlreadyHaveEmailTodayException;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        $this->body = htmlentities($this->body);
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

    /**
     * @throws AlreadyHaveEmailTodayException
     */
    public function passedValidation()
    {
        $email = auth::user()->emails->last();
        if ($email != NULL) {
            if (!$email->created_at->lt(Carbon::now()->subMinutes(1))) {
                throw new AlreadyHaveEmailTodayException();
            }
        }
    }
}
