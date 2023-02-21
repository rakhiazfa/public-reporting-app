<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreEmployeeRequest extends FormRequest
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
        $isAdmin = $this->user()->role->name === 'admin';

        return [
            'name' => ['required', 'unique:agencies'],
            'email' => ['required', 'email', 'unique:users'],
            'username' => ['required', 'without_spaces', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'agency_id' => [$isAdmin ? 'required' : 'nullable'],
        ];
    }
}
