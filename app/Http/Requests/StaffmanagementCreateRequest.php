<?php
namespace App\Http\Requests;

use Carbon\Carbon;

class StaffmanagementCreateRequest extends Request {

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
            'name'        => 'required',
            'designation'      => 'required',
            'division' => 'required',
            'slug' =>'required',
        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function postFillData()
    {
        $inputs = [
            'name'     => $this->name,
            'designation' => $this->designation,
            'division'      => $this->division,
            'desc'     => $this->desc,
            'slug'      => $this->slug,
            'order'  =>$this->order

            ];
        $inputs[ 'status' ] = $this->get( 'status')? 1: 0;
        $inputs[ 'view_photo' ] = $this->get( 'view_photo')? 1: 0;
        $inputs[ 'view_professional' ] = $this->get( 'view_professional')? 1: 0;
        
        // dd($inputs);
        
        return $inputs;
    }
}