<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Http\Requests\PackageCreateRequest;
use App\Http\Requests\PackageUpdateRequest;


class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packages = Package::select()->get();
        return view('backend.package.index')->with('packages',$packages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('backend.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageCreateRequest $request)
    {
        //
      
        DB::transaction(function () use ($request)
        {
            $package = Package::create($request->postFillData());

            $this->uploadFeaturedImage($request, $package);
        });

        return redirect()->back()->withSuccess(trans('messages.create_success', ['entity' => 'Packages']));

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
        $package = Package::find($id);
         return view('backend.package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackageUpdateRequest $request, $id)
    {
         $package = Package::find($id);
	        DB::transaction(function () use ($request, $package)
	        {
	            $package->update($request->postFillData());
	            $this->uploadFeaturedImage($request, $package);
	          
	        });

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'Packages']));

        
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

        $package = Package::find($id);
         if ($package->delete())
        {
            return response()->json([
                'Result' => 'OK'
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }

     private function uploadFeaturedImage($request, $package)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');

            if ($package->image)
            {
                $package->image->upload($image);
            } else
            {
                $package->image()->create(['name' => cleanFileName($image)])->upload($image);
            }
        }
    }
}
