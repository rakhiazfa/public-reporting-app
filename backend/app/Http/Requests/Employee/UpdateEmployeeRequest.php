<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateEmployeeRequest extends FormRequest
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

        $employee = $this->route('employee');
        $employee->load('user');

        $isAdmin = $user->role->name === 'admin';

        if (!$isAdmin) {

            $this->merge([
                'agency_id' => $user->agency->id,
            ]);
        }

        $rules = [
            'nip' => ['required', 'unique:employees,nip,' . $employee->id],
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $employee->user->id],
            'username' => ['required', 'without_spaces', 'unique:users,username,' . $employee->user->id],
            'agency_id' => [$isAdmin ? 'required' : 'nullable'],
        ];

        $this->input('password', false) && $rules['password'] = ['required', 'min:8', 'confirmed'];

        return $rules;
    }

    /**
     * @return void
     */
    protected function passedValidation()
    {
        $employee = $this->route('employee');

        $password = $this->input('password', false);

        $this->merge([
            'password' => $password ? Hash::make($password) : $employee->user->password,
        ]);
    }
}
