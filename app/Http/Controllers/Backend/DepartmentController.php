<?php

namespace App\Http\Controllers\Backend;

use DB;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Http\Requests\DepartmentsCreateRequest;
use App\Http\Requests\DepartmentsUpdateRequest;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $department = Departments::select()->orderBy('displayOrder','asc')->get();

        return view('backend.departments.index')->with('department', $department);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

         return view('backend.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentsCreateRequest $request)
    {
         DB::transaction(function () use ($request)
        {
            $department = Departments::create($request->postFillData());

            $this->uploadFeaturedImage($request, $department);
        });

        return redirect()->back()->withSuccess(trans('messages.create_success', ['entity' => 'Departments']));

        


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
          // dd($department);
          // echo "$id";
          // die();
         $department = Departments::find($id);
         // dd($department);
         return view('backend.departments.edit', compact('department'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentsUpdateRequest $request, $id)
    {
        //
        // echo "$id";
        // dd($request->pageFillData());


        $department = Departments::find($id);
             DB::transaction(function () use ($request, $department)
        {
           
            $department->update($request->pageFillData());

            $this->uploadFeaturedImage($request, $department);

          
        });

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'Departments']));
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
        $department = Departments::find($id);
         if ($department->delete())
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
