<?php

namespace App\Http\Controllers\Backend;

use DB;
use Datatables;
use App\Models\Album;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Photogallery;
use App\Models\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhotogalleryCreateRequest;
// use App\Http\Requests\PhotogalleryUpdateRequest;

class PhotogalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        //

         $albumid = Album::where('slug', $slug)->first();
          $image = Image::select()
                    ->where('imageable_id',$albumid->id)
                    ->where('imageable_type','Albums')
                    ->get();
         

         return view('backend.photogallery.index',compact('albumid','image'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        

        DB::transaction(function () use ($request)
        {   
             $albumId=$request->albumid;
             $album = Album::find($albumId);

            $this->multiple_upload($request, $album);
        });

        return redirect()->back()->withSuccess(trans('messages.create_success', ['entity' => 'Gallery']));

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,$id)
    {
        //
        

        $delimage = Image::find($id);

         if ($delimage->delete())
        {
            $delimage->removeImage();

            return redirect()->back()->withSuccess(trans('messages.delete_success', ['entity' => 'Gallery']));

        }

        
    }


    public function multiple_upload($request, $album) {

        
        
         $files = $request->files;
         
        // getting all of the post data
        // // Making counting of uploaded images
        // // start count how many uploaded
        // $uploadcount = 0;
         foreach($files as $file) {
            foreach ($file as $key => $fileupload) {
            $multiupload = new Image();
            $destinationPath = 'uploads/albums';
            $filename = $fileupload->getClientOriginalName();
            
            $upload_success = $fileupload->move($destinationPath, $filename);
            $multiupload->name = $filename;
            $multiupload->path = 'uploads/albums/'.$filename;
            $multiupload->size = $fileupload->getClientSize();
            $multiupload->imageable_id = $album->id;
            $multiupload->imageable_type = 'Albums';
            $multiupload->save();
            }
         }
        
    }
}
