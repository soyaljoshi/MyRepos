<?php

namespace App\Http\Controllers\Backend;

use DB;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Homesectionsetting;
use App\Http\Requests\HomesectionsettingCreateRequest;
use App\Http\Requests\HomesectionsettingUpdateRequest;

class HomesectionsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $section = Homesectionsetting::select()->get();

        return view('backend.home.section.index')->with('section', $section);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.home.section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomesectionsettingCreateRequest $request)
    {
      
         DB::transaction(function () use ($request)
        {
            $sectionsetting = Homesectionsetting::create($request->postFillData());

            $this->uploadFeaturedImage($request, $sectionsetting);
        });

        return redirect()->back()->withSuccess(trans('messages.create_success', ['entity' => 'Homesectionsetting']));

        
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

         $homesetting = Homesectionsetting::find($id);
         // dd($department);
         return view('backend.home.section.edit', compact('homesetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomesectionsettingUpdateRequest $request, $id)
    {
        //

        $homesection = Homesectionsetting::find($id);
        // dd($department);
        $updateval = $request->pageFillData();
        // dd($updateval);

        $homesection->title = $updateval['title'];
        $homesection->subtitle = $updateval['subtitle'];
        $homesection->status = $updateval['status'];
        $homesection->description = $updateval['description'];

        $homesection->save();
        return redirect()
            ->back()
            ->with('success', trans('messages.update_success', ['entity' => 'Home Section']));
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
        $sectionsetting = Homesectionsetting::find($id);
         if ($sectionsetting->delete())
        {
            return response()->json([
                'Result' => 'OK'
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }


     /**
     * @param $request
     * @param $post
     */
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
