<?php
namespace App\Http\Requests;

use Carbon\Carbon;

class PostCreateRequest extends Request {

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
            'published_at' => 'required',
            'expired_at'   => 'required',
            'content'      => 'required'
        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function postFillData()
    {
    
        $inputs = [
            'title'            => $this->title,
            'content_raw'      => $this->get('content'),
            'meta_description' => $this->meta_description,
            'published_at'     => Carbon::parse($this->published_at)->toDateTimeString(),
              'expired_at'        =>  Carbon::parse($this->expired_at)->toDateTimeString()

        ];

        $inputs[ 'is_draft' ] = $this->get( 'is_draft')? 1: 0;
        $tag = $this->get('tags');
        if($tag[0] == "publication")
        {
        $inputs[ 'is_file' ] = 1;    
        }
        else
        {
        $inputs[ 'is_file' ] = $this->get( 'is_file')? 1: 0;
        }
        $inputs['admin_id'] = auth()->guard('admin')->id();
        
        return $inputs;
    }
}