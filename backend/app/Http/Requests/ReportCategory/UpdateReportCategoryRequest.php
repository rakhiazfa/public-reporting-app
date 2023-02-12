<?php

namespace App\Http\Requests\ReportCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateReportCategoryRequest extends FormRequest
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
        $reportCategory = $this->route('reportCategory');

        return [
            'name' => ['required', 'unique:report_categories,name,' . $reportCategory->id],
        ];
    }
}
