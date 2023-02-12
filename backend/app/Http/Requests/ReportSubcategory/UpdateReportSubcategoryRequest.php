<?php

namespace App\Http\Requests\ReportSubcategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateReportSubcategoryRequest extends FormRequest
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
        $reportSubcategory = $this->route('reportSubcategory');

        return [
            'name' => ['required', 'unique:report_subcategories,name,' . $reportSubcategory->id],
        ];
    }
}
