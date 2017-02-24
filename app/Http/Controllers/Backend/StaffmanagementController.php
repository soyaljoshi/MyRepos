<?php

namespace App\Http\Controllers\Backend;

use DB;
use Datatables;
use App\Http\Requests;
use App\Models\Departments;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\Staffmanagement;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffmanagementCreateRequest;
use App\Http\Requests\StaffmanagementUpdateRequest;

class StaffmanagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $stafflist = DB::select(DB::raw("select s.* ,d.name as divName, s.id as doctor_id from staffmanagements s  LEFT JOIN divisions d ON s.division = d.id order by d.hierarchy asc, s.order asc"));

        return view('backend.Staff.index', compact('stafflist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $division = Division::lists('name','id')->all();

        return view('backend.Staff.create')->with('division', $division);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffmanagementCreateRequest $request)
    {
         DB::transaction(function () use ($request)
        {
            $Staffmanagement = Staffmanagement::create($request->postFillData());

            $this->uploadFeaturedImage($request, $Staffmanagement);
        });

        return redirect()->back()->withSuccess(trans('messages.create_success', ['entity' => 'Staffmanagement']));


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
        $staffmanagement = Staffmanagement::find($id);
        $division = Division::lists('name','id')->all();


         // dd($staffmanagement);

        // $staffmanagement = compact('Departments','staff');
        return view('backend.Staff.edit', compact('staffmanagement', 'division'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffmanagementUpdateRequest $request, $id)
    {

           
         $department = Staffmanagement::find($id);
        // dd($department);
        DB::transaction(function () use ($request, $department)
        {
           
            $department->update($request->pageFillData());

            $this->uploadFeaturedImage($request, $department);

          
        });

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'Staff']));

      
        
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

         $department = Staffmanagement::find($id);
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
