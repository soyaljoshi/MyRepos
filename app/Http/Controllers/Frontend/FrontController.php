<?php
namespace App\Http\Controllers\Frontend;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Page;
use App\Models\Image;
use App\Models\Slider;
use App\Models\Package;
use App\Models\Popular;
use App\Models\Service;
use App\Models\Product;
use App\Models\Departments;
use App\Models\Staffmanagement;
use App\Models\Homesectionsetting;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\ProductController;




class FrontController extends Controller
{
    public function index(Request $request)
    {
      if($request->get('msg'))
      {
        $msg = $request->get('msg');    
      }
      else
      {
        $msg = null;
      }
       $packages = Package::select()->where('status','1')->get();
       $section = Homesectionsetting::select()->where('status','1')->get();
       $test = Popular::select()->orderBy('id', 'desc')->where('status','1')->get();
       $department = Departments::select()->where('status','1')->where('isClinical','1')->orderBy('displayOrder','asc')->get();
       $staff = Staffmanagement::select()->where('status','1')->where('view_professional','1')->orderBy('order','asc')->get();
       $tag = Tag::select()->get();
       $slider = Slider::select()->where('status',1)->get();
       $image =  Image::all();
       $images = new Image;
       $news = new Post;


       return view( 'frontend.index', compact('section','test','department','staff','news','tag','slider','image','images','msg','packages'));
    }

    public function help()
    {
        return view( 'frontend.help.index' );
    }

    public function page( Page $page )
    {
      if($page->is_draft){
      $image = new Image;  

        return view( 'frontend.pages.show', compact( 'page','image' ));
      }
      else{
        return redirect('/page-not-found');
      }
    }

    public function post( Post $post )

    {

        return view( 'frontend.post.show', compact( 'post') );
    }

    public function departments($department){
        $images = new Image;
        $departments= Departments::select()->where('slug',$department)->first();
      
        return view('frontend.department.show', compact('images','departments'));    
    }
}
