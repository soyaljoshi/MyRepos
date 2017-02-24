<?php

namespace App\Http\Controllers\Backend;

use DB;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Http\Requests\SliderCreateRequest;
use App\Http\Requests\SliderUpdateRequest;

class SlidersettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slider = Slider::select()->get();
        return view('backend.home.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backend.home.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderCreateRequest $request)
    {
        //

        DB::transaction(function () use ($request)
        {
            $slider = Slider::create($request->postFillData());

            $this->uploadFeaturedImage($request, $slider);
        });

        return redirect()->back()->withSuccess(trans('messages.create_success', ['entity' => 'Slider']));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

         $slider = Slider::find($id);
         // dd($department);
         return view('backend.home.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderUpdateRequest $request, $id)
    {
        // //

        $slider = Slider::find($id);
        // // dd($department);
        // $updateval = $request->pageFillData();
        // // dd($updateval);

        // $slider->title = $updateval['title'];
        // $Slider->slug = $updateval['slug'];
        // $slider->subtitle = $updateval['subtitle'];
        // $slider->status = $updateval['status'];
        // $slider->caption = $updateval['caption'];
        // $this->uploadFeaturedImage($request, $slider);


        DB::transaction(function () use ($request, $slider)
        {
           
            $slider->update($request->pageFillData());

            $this->uploadFeaturedImage($request, $slider);

          
        });

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'Slider']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //


          //
        $slider = Slider::find($id);
         if ($slider->delete())
        {
            return response()->json([
                'Result' => 'OK'
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }


    private function uploadFeaturedImage($request, $post)
    {

        
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');

            if ($post->image)
            {
                $post->image->upload($image);
            } else
            {
                $post->image()->create(['name' => cleanFileName($image)])->upload($image);
            }
        }
    }
}
