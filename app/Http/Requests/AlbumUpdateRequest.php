<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AlbumUpdateRequest extends Request {

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
            'description' => 'required',
            'slug' => 'required',
            
        ];
    }

    /**
     * Return the fields and values to update a page from
     */
    public function pageFillData()
    {
        $inputs = $this->all();

        // dd($inputs);

        $inputs[ 'status' ] = $this->get( 'status');
       

        return $inputs;
    }
}
