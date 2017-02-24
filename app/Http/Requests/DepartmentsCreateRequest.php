<?php
namespace App\Http\Requests;

use Carbon\Carbon;

class DepartmentsCreateRequest extends Request {

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
            'sub_title'      => 'required',
            'desc' => 'required',
            'slug' => 'required'
        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function postFillData()
    {
        $inputs = [
            'title'     => $this->title,
            'sub_title' => $this->sub_title,
            'slug'      => $this->slug,
            'desc'     => $this->desc,
            'displayOrder'=>$this->displayOrder,
            'url'   =>$this->url

        ];

        $inputs[ 'status' ] = $this->get( 'status')? 1: 0 ;
        $inputs['isClinical'] = $this->get('isClinical') ? 1: 0 ;

        return $inputs;
    }
}