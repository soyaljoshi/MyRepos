<?php

namespace App\Http\Controllers\Backend;

use DB;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Popular;
use App\Http\Requests\PopularCreateRequest;
use App\Http\Requests\PopularUpdateRequest;



class PopularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Popular::select()->get();
        return view('backend.home.popular.index')->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('backend.home.popular.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PopularCreateRequest $request)
    {
        //
      
        DB::transaction(function () use ($request)
        {
            $post = Popular::create($request->postFillData());

            $this->uploadFeaturedImage($request, $post);
        });

        return redirect()->back()->withSuccess(trans('messages.create_success', ['entity' => 'Technology']));

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

        $popularpost = Popular::find($id);
         // dd($department);
         return view('backend.home.popular.edit', compact('popularpost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PopularUpdateRequest $request, $id)
    {
        //


        //

         $popularpost = Popular::find($id);
        // dd($department);
        // $updateval = $request->pageFillData();
        // // dd($updateval);

        // $popularpost->title = $updateval['title'];
        // $popularpost->subtitle = $updateval['subtitle'];
        // $popularpost->price = $updateval['price'];
        // $popularpost->status = $updateval['status'];

        DB::transaction(function () use ($request, $popularpost)
        {
           
            $popularpost->update($request->pageFillData());

            $this->uploadFeaturedImage($request, $popularpost);

          
        });

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'Technology']));

        
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

        $populartest = Popular::find($id);
         if ($populartest->delete())
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

            // dd($request->file('image'));

            if ($post->image)
            {
                $post->image->upload($image);
            } else
            {
                $post->image()->create(['name' => cleanFileName($image)])->upload($image);
            }
        }
        // else{

        //     $image ='assets/frontend/img/populartest_placeholder.png';
        //     $post->image()->create(['name' => cleanFileName($image)])->upload($image);

        // }
    }
}
