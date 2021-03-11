<?php

namespace :uc:vendor\:uc:package\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class :uc:packageRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
//             'critical_finding'     => 'required|alpha_spaces',
// //            'entry_date'           => 'required|date_time',
//             'entry_date'           => 'required',
//             'note'                 => 'required|alpha_spaces',
// //            'patient_id'           => 'required|numeric',
//             'treatment'            => 'required|alpha_spaces',
// //            'treatment_date'       => 'required|date_time',
//             'treatment_date'       => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'critical_finding.alpha_spaces' => 'Only contain letter or with spaces'
        ];
    }
}
