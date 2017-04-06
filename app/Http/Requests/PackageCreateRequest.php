<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PackageCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
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
            'description'      => 'required',
            'slug'  =>'required'

        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function postFillData()
    {
        $inputs = [
            'title'            => $this->title,
            'description'      => $this->description,
            'slug'  => $this->slug,
            'icon'  =>$this->icon
        ];

        $inputs[ 'status' ] = $this->get( 'status')? 1: 0;

        return $inputs;
    }
}
