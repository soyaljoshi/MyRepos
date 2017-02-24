<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepartmentsUpdateRequest extends Request {

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
           'title'        => 'required',
            'sub_title'      => 'required',
            'desc' => 'required',
            'slug' => 'required'
        ];
    }

    /**
     * Return the fields and values to update a page from
     */
    public function pageFillData()
    {
        $inputs = $this->all();


        $inputs[ 'status' ] = $this->get( 'status')? 1: 0;
        $inputs['isClinical'] = $this->get('isClinical') ? 1: 0  ;        

        return $inputs;
    }
}
