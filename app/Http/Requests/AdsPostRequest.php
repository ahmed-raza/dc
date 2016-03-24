<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdsPostRequest extends Request
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
        switch ($this->method) {
            case 'PATCH':
                $rules = [
                'title'=>'required',
                'category_list'=>'required',
                'city'=>'required',
                'description'=>'required',
                ];
                break;

            default:
                $rules = [
                'title'=>'required|unique:ads',
                'category_list'=>'required',
                'city'=>'required',
                'description'=>'required',
                ];
                break;
        }
        return $rules;
    }
}
