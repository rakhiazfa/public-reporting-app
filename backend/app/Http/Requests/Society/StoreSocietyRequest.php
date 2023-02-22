<?php

namespace App\Http\Requests\Society;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSocietyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nik' => ['required', 'unique:societies'],
            'name' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', Rule::in(['Pria', 'Wanita'])],
            'phone' => ['required', 'numeric'],
            'job_id' => ['required'],
            'email' => ['required', 'unique:users'],
            'username' => ['required', 'unique:users', 'without_spaces'],
            'password' => ['required', 'min:8', 'confirmed'],
            'country' => ['nullable'],
            'province' => ['required'],
            'city' => ['required'],
            'sub_district' => ['required'],
            'urban_village' => ['required'],
            'postal_code' => ['required'],
            'address' => ['required'],
        ];
    }
}
