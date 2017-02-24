@extends('frontend.layouts.master')

@section('title', 'NPHL :: Publication')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
    <style>
       [class^=mad-icon-]{
  display: inline-block;
  vertical-align: top;
  border-radius: 50%;
  background: #999 50% / cover;
  color: #fff;
}
.mad-icon-24{
  width:  24px;
  height: 24px;
}
.mad-icon-32{
  width:  32px;
  height: 32px;
}
.mad-icon-40{
  width:  40px;
  height: 40px;
}

/*
Material Design - Lists
*/

ul.mad-list{
  display: table;
  width: 100%;
  padding: 8px 0; /* 8 padding T/B */
  margin: 0;
  list-style: none;
}
ul.mad-list li{
  display: table-row;
  height: 48px; /* that's actually min-height for rows */
}
ul.mad-list li > *{
  /* Align always to middle */
  display: table-cell;
  margin: 0;
  padding: 0;
  vertical-align: middle;
}
ul.mad-list li > *:first-child{
  /* Whoever is the first child it needs 16px left space */
  padding-left: 16px;
  background: rgba(0,255,0,0.05);
}
ul.mad-list li > *:last-child{
  /* Whoever is the last child it needs 16 right space */
  padding-right: 16px;
}
ul.mad-list .mad-list-icon{
  /* Always left-align! Don't center icons */
  width: 72px; /* 72-16 but we already use box-sizing */
}
ul.mad-list .mad-list-text{
  background: rgba(0,0,255,0.05);
}
ul.mad-list .mad-list-icon-secundary{
  /* Secundary actions will have already 16 right padding 
  since it's :last-child but it needs also a left 16*/
  padding-left: 16px;
  width: 1px; /* Always h-center align content */
  text-align: center; /* Just to make sure if we use combinations of larger icons */
  background: rgba(255,0,255,0.05)
}

/*
Special classes
*/
.border-bottom{
  border-bottom:1px solid rgba(0,0,0,0.1);
}
    </style>
@stop

@section('body')
{{ Html::style('assets/frontend/css/custom.css')}}
    <div class="container">
       <ol class="breadcrumb" style="background: none;">
           <li> <i class="fa fa-home"></i> <a href="/">Home</a></li>
           <li class="active">Publication</li>
        </ol>   
    </div>
    <div class="container" id="tab">
        <h1>Publications</h1>
        <ul class="mad-list">
            @if(!$post->getPost(3))
             <em>There are No Publications Available</em>   
            @else
            <li style="background-color: #dce4dc;">
                <div class="row">
                    <div class="col-md-6"><span style="top: 18px;"><strong>Title</strong></span></div>
                    <div class="col-md-4 hidden-xs hidden-sm"> <strong>Published Date</strong></div>
                    <div class="col-md-2 hidden-xs hidden-sm"><strong>Download Link</strong></div>
                </div>
            </li>
             <hr>
              @foreach($post->getPost(3) as $posts)
                        <li>
                          <div class="row" style="background-color:rgba(51, 181, 229, .24); ">
                              <div class="col-md-6"><span style="top: 18px;">{{$posts->title}}</span></div>
                              <div class="col-md-4" style="color: #01579b;"><i class="fa fa-calendar"></i> {{ date('Y-m-d', strtotime($posts->published_at)) }} </div>
                              <div class="col-md-2"><a class="btn btn-info" style="margin-top: 0;" title="Download" download href="{{asset($posts->path)}}"><span class="glyphicon glyphicon-download"></span> Download</a></div>
                          </div>
                        </li>
                        <hr> 

              @endforeach
            @endif
        </ul>
    </div>
@stop

