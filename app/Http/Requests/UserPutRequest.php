<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPutRequest extends FormRequest
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
        $userId = \Request::instance()->user;
        return [
            'name' => 'required|max:255',
            'password' => 'max:255',
            'email' => 'required|max:255|unique:users,email,'. $userId,
        ];
    }
}
