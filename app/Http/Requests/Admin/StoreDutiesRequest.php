<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreDutiesRequest extends FormRequest
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
            'date' => 'required|date_format:'.config('app.date_format').'|unique:duties,date',
            'date_kh'=>'required',
            'board_duty_id'=>'required',
            'chef_duty_id'=>'required',
            'chef_salle_id'=>'required' ,
            'beds'=>'required|numeric',
            'restants'=>'required|numeric',
            'dispo'=>'required|numeric',
            'payants'=>'required|numeric',
            'examen1'=>'required',
            'examen2'=>'required',
        ];
    }
}
