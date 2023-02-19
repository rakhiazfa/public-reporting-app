<?php

namespace App\Http\Requests\Agency;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAgencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $agency = $this->route('agency');

        $rules = [
            'name' => ['required', 'unique:agencies,name,' . $agency->id],
            'country' => ['nullable'],
            'province' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $agency->user->id],
            'username' => ['required', 'without_spaces', 'unique:users,username,' . $agency->user->id],
        ];;

        $password = $this->input('password', false);

        $password && $rules['password'] = ['required', 'min:8', 'confirmed'];

        $this->merge([
            'password' => $password ? $password : $agency->user->password,
        ]);

        return $rules;
    }
}
