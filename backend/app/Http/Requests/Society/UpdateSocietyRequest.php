<?php

namespace App\Http\Requests\Society;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateSocietyRequest extends FormRequest
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
        $society = $this->route('society');

        return [
            'nik' => ['required', 'unique:societies,nik,' . $society->id],
            'name' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', Rule::in(['Pria', 'Wanita'])],
            'phone' => ['required'],
            'job_id' => ['required'],
            'email' => ['required', 'unique:users,email,' . $society->user->id],
            'username' => ['required', 'unique:users,username,' . $society->user->id, 'without_spaces'],
            'password' => ['required', 'min:8', 'confirmed'],
            'country' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required'],
            'address' => ['required'],
        ];
    }
}
