<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatisticsRequest extends FormRequest
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
            'department_id'=>'required',
//            'beds'=>'required',
//            'et_payant'=>'required',
//            'et_gratuit'=>'required',
//            'et_credit'=>'required',
//            'et_bss'=>'required',
//            'et_hef'=>'required',
//            'et_indigent'=>'required',
//            'sortant'=>'required',
//            'rt_payant'=>'required',
//            'rt_gratuit'=>'required',
//            'rt_credit'=>'required',
//            'rt_bss'=>'required',
//            'rt_hef'=>'required',
//            'rt_indigent'=>'required',
//            'dispo'=>'required',
//            'sida'=>'required',
//            'hiv'=>'required',
        ];
    }
}
