<?php
namespace App\Http\Requests;

use Carbon\Carbon;

class PhotogalleryCreateRequest extends Request {

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
           
        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function postFillData()
    {
        $inputs = [
            

        ];

     

        return $inputs;
    }
}