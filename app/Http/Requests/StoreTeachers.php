<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachers extends FormRequest
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
            'Email' => 'required|unique:teachers,Email,'.$this->id,
            'Password' => 'required',
            'Name_ar' => 'required',
            'Name_en' => 'required',
            'Specialization_id' => 'required',
            'Gender_id' => 'required',
            'Joining_Date' => 'required|date|date_format:Y-m-d',
            'Address' => 'required',
        ];
    }
}
