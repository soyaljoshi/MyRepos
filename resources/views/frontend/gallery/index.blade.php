@extends('frontend.layouts.master')

@section('title', 'VaRG | Photo Gallery')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
    {{ Html::style('assets/frontend/css/jgallery.min.css')}}
    <!-- altair admin -->
 
    <link rel="stylesheet" href="{{url('assets/frontend/css/blueimp-gallery.css')}}">
     {{-- overide the main.min.css padding --}} 
    <style>#map {width: 100%;height: 400px;}body{padding-top: 0px!important}</style>
@stop

@section('body')
  <div class="container">
    <ol class="breadcrumb" style="background: none;">
      <li> <i class="fa fa-home"></i> <a href="/">Home</a></li>
      <li><a href="active">Album</a></li>
    </ol>
  </div>
  <div class="container">
    <div class="row" @if(!($first_photos)) style="margin-bottom: 50px;" @endif > 
    @if(!($first_photos))
    <h1>Photo Gallery</h1> 
    <em>There are no Photos Available</em>
    @endif
      @foreach($first_photos as $first_photo)
        <div class="col-md-4 col-sm-6" style="margin-bottom: 48px;">
        <div class="single_coudown">
          <div>
            <a href="{{url('photogallery/detail/'.$first_photo->imageable_id)}}">
            <div class="album_image" style="overflow: hidden;">
              <img class="card-img-top"  src="{{ url('/') }}/{{$first_photo['path']}}">
              </div>
                <p class="pull-left">
                  Total Photo : {{App\Models\Image::where('imageable_id', $first_photo->imageable_id)->count()}}
                </p>
                <p class="pull-right" style="margin-top: 0px">
                  Total Photo : {{App\Models\Album::where('id', $first_photo->imageable_id)->value('title')}}
                </p>
            </a>
          </div>
          </div>
        </div>
       
      @endforeach
    </div>  
  </div>
@stop
