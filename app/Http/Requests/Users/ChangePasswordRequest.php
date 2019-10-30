<?php

namespace App\Http\Requests\Users;

use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->route('user');
        if ($user instanceof Model) {
            $user = $user->id;
        }
        return auth()->id() == $user;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required|password',
            'password' => 'required|different:old_password|confirmed'
        ];
    }
}
