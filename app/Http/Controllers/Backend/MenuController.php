<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Models\Menu;
use App\Models\Page;
use App\Models\SubMenu;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller {

    protected $menu;

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $primaryMenus = Menu::with('image', 'subMenus')->orderBy('order')->get();

        $allPages = Page::where('is_draft',1)->get();
        $pages = [];
        foreach ($allPages as $key => $page)
        {
            $pages[route('page::show', $page->slug)] = $page->title;
            // $pages[$page->title] = $page->id;
        }
        $menus = Menu::select()->get();
        $menulist = array();
        foreach ($menus as  $value) {
            $menulist[$value['id']] = $value['name'];
        }
        $menulist['0'] = 'Main Category';
        // dd($menulist);

        return view('backend.menu.index', compact('primaryMenus', 'pages','menulist'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        DB::transaction(function () use ($request)
        {

         // dd($request);
            $order = 0;
            $menuIds = [];
            $subMenuIds = [];
            foreach ($request->get('primary-menu-list') as $key => $data)
            {
                $data['slug'] = str_slug($data['name']);
                $data['order'] = $order;
                // $data['parent_id'] = $data['type'];
                if ($menu = Menu::find($key))
                    $menu->update($data);
                else
                    $menu = Menu::create($data);

                array_push($menuIds, $menu->id);

                if ($request->hasFile('primary-menu-list.' . $key))
                {
                    $image = $request->file('primary-menu-list.' . $key . '.image');
                    if ($menu->image)
                        $menu->image->upload($image);
                    else
                        $menu->image()->create(['name' => cleanFileName($image)])->upload($image);
                }

                // for submenus
                if ($subMenus = $request->get('dropdown-menu-list-' . $key, false))
                {
                    $suborder = 1;
                    foreach ($subMenus as $key => $subData)
                    {
                        $subData['slug'] = str_slug($subData['name']);
                        if ($submenu = $menu->subMenus()->find($key))
                            $submenu->update($subData);
                        else
                            $submenu = $menu->subMenus()->create($subData);

                        array_push($subMenuIds, $submenu->id);
                    }
                }

                $order ++;
            }

            Menu::whereNotIn('id', $menuIds)->delete();
            SubMenu::whereNotIn('id', $subMenuIds)->delete();

        });

        return redirect()->back()->with('success', trans('messages.update_success', ['entity' => 'Menu']));
    }
}
