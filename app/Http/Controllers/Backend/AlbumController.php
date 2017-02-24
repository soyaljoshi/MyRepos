<?php

namespace App\Http\Controllers\Backend;

use DB;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Http\Requests\AlbumCreateRequest;
use App\Http\Requests\AlbumUpdateRequest;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $album = Album::select()->get();
        return view('backend.album.index',compact('album'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumCreateRequest $request)
    {
        //

          //
         DB::transaction(function () use ($request)
        {
            $album = Album::create($request->postFillData());
             $this->uploadFeaturedImage($request, $album);
            
        });

        return redirect()->back()->withSuccess(trans('messages.create_success', ['entity' => 'Album']));

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


        $album = Album::find($id);
       
        return view('backend.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumUpdateRequest $request, $id)
    {
        //
         $album = Album::find($id);
        // dd($department);
        $updateval = $request->pageFillData();
        // dd($updateval);

        $album->title = $updateval['title'];
        $album->slug = $updateval['slug'];
        $album->description = $updateval['description'];
        $album->status = $updateval['status'];

        $album->save();
        return redirect()
            ->back()
            ->with('success', trans('messages.update_success', ['entity' => 'Album']));
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

         $albums = Album::find($id);
         if ($albums->delete())
        {
            return response()->json([
                'Result' => 'OK'
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }

     private function uploadFeaturedImage($request, $album)
    {
        if ($request->hasFile('image'))
        {

                 if ($request->hasFile('image'))
         {

             if(count($request['image']) <= 1  ) {


                        $images = $request->file('image');
                        

                        if ($album->image)
                        {
                            $album->image->upload($images);
                        } else
                        {
                            $album->image()->create(['name' => cleanFileName($images)])->upload($images);
                        }
                    
                }else{
                 
                    $files = $request->file('image');
                      
                        foreach($files as $file)
                        {                           

                                if ($album->image)
                                {
                                    $album->image->upload($file);
                                } else
                                {
                                    $album->image()->create(['name' => cleanFileName($file)])->upload($file);
                                }
                               
                        }                          
                }
            }
           
        }
    }
}
