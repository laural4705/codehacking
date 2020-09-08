<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUsersUpdateRequest extends FormRequest
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
        if ('is_active' == 1) {
            return [
                'name' => 'required',
                'email' => 'required',
                'role_id' => 'required',
                'photo_id' => 'max:10000|mimes:jpg,jpeg',
            ];
        }
        else {
            return [
                'name' => 'required',
                'email' => 'required',
                'role_id' => 'required',
                'photo_id' => 'max:10000|mimes:jpg,jpeg',
            ];
        }
    }
}
