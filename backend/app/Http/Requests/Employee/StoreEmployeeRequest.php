<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $user = $this->user();

        $isAdmin = $user->role->name === 'admin';

        if (!$isAdmin) {

            $this->merge([
                'agency_id' => $user->agency->id,
            ]);
        }

        return [
            'nip' => ['required', 'unique:employees'],
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'username' => ['required', 'without_spaces', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'agency_id' => [$isAdmin ? 'required' : 'nullable'],
        ];
    }

    /**
     * @return void
     */
    protected function passedValidation()
    {
        $password = $this->input('password', false);

        $this->merge([
            'password' => Hash::make($password),
        ]);
    }
}
