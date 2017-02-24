<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Requests;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Image;
use App\Models\Post;
use App\Models\Division;
use App\Models\Album;
use App\Models\Staffmanagement;
use App\Models\Departments;
use App\Models\Page;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //

    public function contact(){
          
       $setting = Setting::select()->get();
       $contact_page = Page::select()->where('slug','contact')->get();

        return view('frontend.contact.index', compact('setting','contact_page'));
    }

    public function about(){

        return view('frontend.about.index');
    }

      public function archieved(){
          $posts = new Post;     
          $image =  Image::all();
          $images = new Image;

          return view('frontend.archieved.index', compact('posts','image','images'));
    }
      public function photogallery(){
        $image = new Image;
        $albums = Album::select('id')->where('status','1')->get();
       /**
        * store first photos of each album
        * for display 
        * @var array
        */
        $first_photos = [];
        foreach ($albums as $album) {
          $first_photos[] = Image::where('imageable_id', $album->id)->first();   
        }
      
        return view('frontend.gallery.index', compact('image','first_photos'));
    }

    /**
     * dispaly all photo of each
     * album
     */
    public function photogallerydetail($album_id)
    {
       $image = new Image;
        
        $all_photos = Image::where('imageable_id', $album_id)->get();
        return view('frontend.gallery.album_all_photo', compact('image','all_photos')); 
    }
    public function report(){
           
      return view('frontend.report.index');
  
    }

    public function stafflist($dept=null){

        $images = new Image;
        $image= Image::all();
        $staff= new Staffmanagement;
        $divisions = new Division;
        // $departments = new Departments;
        // $department = Departments::select()->where('status','1')->orderBy('displayOrder','asc')->get();
        $division = Division::select()->orderBy('hierarchy','asc')->get();
        return view('frontend.stafflist.index', compact('image','images','staff','division','dept','divisions'));    
    }


    public function publication(){
        $post = new Post;
            
        return view('frontend.publication.index', compact('post'));
  }


  public function search(Request $request)
    {
        $this->validate($request, [
          'search' => 'required',
        ]);
        $image =  Image::all();
        $images = new Image;
        $query = $request->search;
        $post = DB::table('postsview')
                ->where('title','LIKE',"%$query%")
                ->orWhere('content_raw','LIKE',"%$query%")
                ->get();
                $news_count = 0;
                $event_count = 0;
                $publication_count = 0;
                foreach ($post as  $value) {
                
                  if($value->tag_id == 1){
                    $news_count++;
                  }

                  if($value->tag_id == 2){
                    $event_count++;
                  }

                  if($value->tag_id == 3){
                    $publication_count++;
                  }
                }
          
       return view('frontend.search.index', compact('post','news_count','event_count','publication_count'));

    }

}
