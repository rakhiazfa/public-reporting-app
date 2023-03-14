<?php

namespace App\Http\Requests\SocietyReport;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreSocietyReportRequest extends FormRequest
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
        return [
            'type' => ['required', Rule::in(['pengaduan', 'aspirasi', 'permintaan-informasi'])],
            'image' => ['nullable'],
            'title' => ['required'],
            'body' => ['required'],
            'date' => ['required', 'date'],
            'attachment' => ['required', 'file', 'mimes:pdf', 'size:2056'],
            'category_id' => ['required'],
            'destination_agency_id' => ['required'],
        ];
    }
}
