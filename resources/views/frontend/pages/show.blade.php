@extends('frontend.layouts.master')

@section('title', 'NPHL | Pages')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
    <style>
.banner_area{
    @if(count($image->getImage('Page',$page->id)) == 0)
    background: url({{asset('assets/frontend/img/pagebanner.jpg')}});
    @else
    @foreach($image->getImage('Page',$page->id) as $images)
    background: url({{asset($images->path)}});
    @endforeach
    @endif
    padding:90px 0 !important;
    background-position: bottom center;
    background-size: cover;
    padding: 112px 0;
    position: relative;
}

.banner_area:after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,.6);
}

.page_body{
    margin-top: 40px;
    margin-bottom: 30px;
    box-shadow: 2px 2px 10px 0 rgba(0, 0, 0, 0.3);
    padding: 10px 50px 10px 50px;
    
   }

   .banner_area h1
   {
    text-align: left;
    color: white;
    z-index: 1;
    position:relative;
   }
    
    </style>
@stop
@section('body')
	<div class="banner_area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h1>{{$page->title}}</h1>     
            </div>
        </div>
    </div>
</div> 
<div class="container">
    <div class="page_body">
        <p>{{$page->meta_description}}</p>
        {!! $page->content_html !!}
    </div>
</div>
@stop