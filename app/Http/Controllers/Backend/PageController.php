<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use App\Http\Requests; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageCreateRequest;
use App\Http\Requests\PageUpdateRequest;

class PageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::with('author')->get();

        return view('backend.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\PageCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageCreateRequest $request)
    {

        $page = Page::create($request->pageFillData());
        $this->uploadFeaturedImage($request, $page);

        return redirect()
            ->route('admin::page.edit', $page->slug)
            ->with('success', trans('messages.create_success', ['entity' => 'Page']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('backend.page.edit', compact('page'));
    }

    /**
     * @param \App\Http\Requests\PageUpdateRequest $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PageUpdateRequest $request, Page $page)
    {
        $page->update($request->pageFillData());
         $this->uploadFeaturedImage($request, $page);

        return redirect()
            ->back()
            ->with('success', trans('messages.update_success', ['entity' => 'Page']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if ($page->delete())
        {
            return response()->json([
                'Result' => 'OK'
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }

    private function uploadFeaturedImage($request, $page)
    {

      
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');

            if ($page->image)
            {
                $page->image->upload($image);
            } else
            {
                $page->image()->create(['name' => cleanFileName($image)])->upload($image);
            }
        }
    }
}
