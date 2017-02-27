@extends('frontend.layouts.master')
@section('title', 'VaRG :: Photo Gallery')
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
      <li><a href="{{ url('/photogallery') }}">Album</a></li>
      <li class="active">Photo Gallery</li>
    </ol>
  </div>
{{-- control for light box --}} 
<div class="container">
  <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
  </div>
</div>
{{ Html::script('assets/frontend/js/vendor/jquery-2.2.3.min.js') }}
<script src={{ url('assets/frontend/js/blueimp-gallery.js') }}></script>
{{-- photo displyay on light box --}}
<div class="container">
    <div id="links">
      <div class="row">
        @foreach($all_photos as $all_photo)
        <div class="col-md-4" style="margin-bottom: 48px;">
        <div class="single_coudown">
          <div>
            <div class="album_image" style="height: 180px; overflow: hidden;">
            <a href="{{ url('/') }}/{{$all_photo['path']}}">
              <img src="{{ url('/') }}/{{$all_photo['path']}}"> 
            </a>
              </div>
          </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
{{-- initialization for lightbox --}}
<script>
  document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
    link = target.src ? target.parentNode : target,
    options = {index: link, event: event},
    links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
  };
</script>
@stop

