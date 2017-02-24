@extends('frontend.layouts.master')

@section('title', 'NPHL | Search')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
    <style>
 		   #map {
  	    	  width: 100%;
   	 	    height: 400px;
 		   }

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
			#tabbed ul li:before {
			    content: " " !important;
			}
    </style>
@stop

@section('body')
{{ Html::style('assets/frontend/css/custom.css')}}
    <div class="container">
           <ol class="breadcrumb" style="background: none;">
                   <li><i class="fa fa-home"></i> <a href="{{ url('/')}}">Home</a></li>
                   <li class="active">Search</li>
            </ol>
    </div>
    <!--Start of Achieve Body -->
    @if(count($post)>0)
    <div class="container" id="tab">
        <section id="tabbed">
            <!-- First tab input and label -->
    
    
                @if($news_count > 0)  
                <input id="t-1" name="tabbed-tabs" type="radio" checked="checked" />
                <label for="t-1" class="tabs shadow ">News<sup class="top"> <i class="fa fa-exclamation-circle"></i>  
                        ({{ $news_count }})
                </sup> </label>
                @endif
            <!-- Second tab input and label -->
 
             @if($event_count > 0)  
            <input id="t-2" name="tabbed-tabs" type="radio" checked="checked" />
            <label for="t-2" class="tabs shadow ">Notice & Events <sup class="top"> <i class="fa fa-comments"></i>
                    ({{ $event_count }})
            </sup></label>
            @endif


            <!-- Third tab input and label -->
             
            @if($publication_count > 0)  
            <input id="t-3" name="tabbed-tabs" type="radio" checked="checked"/>
            <label for="t-3" class="tabs shadow ">Publications <sup class="top"> <i class="fa fa-envelope"></i> 
                    ({{ $publication_count }})
            </sup></label>
            @endif
            <!-- Tabs wrapper -->
            <div class="wrapper shadow">
                <!-- Tab 1 content --> <!-- && $posts->expired_date < '$mytime' -->
                <div class="tab-1">
                    <div class="row">
                        <div class="cell w-100 customclass">
                            <ul class="mad-list">
                                <li style="background-color: #dce4dc;">
                                    <div class="row " style="padding: 7px;">
                                         <div class="col-md-6" style="padding-left: 5px;"><span><strong  style="font-weight: bold;">Title</strong></span></div>
                                        <div class="col-md-4 hidden-xs hidden-sm" > <strong style="font-weight: bold;">Published Date</strong></div>
                                        <div class="col-md-2 hidden-xs hidden-sm" style="padding-left: 5px;"><strong style="font-weight: bold;">Action</strong></div>
                                    </div>
                                </li>
                            @foreach($post as $posts)
                                @if($posts->tag_id=='1')
                                 <hr>
                                 <li>
                                <div class="row post_table_row" >
                                    <div class="col-md-6" style="padding: 10px;"><span style="top: 18px;">{{$posts->title}}</span></div>
                                    <div class="col-md-4" style="color: #01579b; padding: 9px;"><i class="fa fa-calendar"></i> {{ date('Y-m-d', strtotime($posts->published_at)) }} </div>
                                    <div class="col-md-2"><a class="btn btn-info" style="padding: 7px;margin-top: 0;color: white;font-size: 14px;" title="View Details" @if($posts->is_file == 1) href="{{asset($posts->path)}}" @else href="/post/{{$posts->slug}}" @endif"><span class="glyphicon glyphicon-th-large">&nbsp;</span> View Details</a></div>
                                </div>
                                 </li>
                                 <hr>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                     
                </div>
                <!-- / Tab 1 content -->
                <!-- Tab 2 content -->

                <div class="tab-2">
                    <div class="row">
                        <div class="cell w-100 customclass">
                            <ul class="mad-list">
                                <li style="background-color: #dce4dc;">
                                    <div class="row" style="padding: 7px;">
                                         <div class="col-md-6" style="padding-left: 5px;"><span><strong  style="font-weight: bold;">Title</strong></span></div>
                                        <div class="col-md-4 hidden-xs hidden-sm" > <strong style="font-weight: bold;">Published Date</strong></div>
                                        <div class="col-md-2 hidden-xs hidden-sm" style="padding-left: 5px;"><strong style="font-weight: bold;">Action</strong></div>
                                    </div>
                                </li>
                            @foreach($post as $posts)
                                @if($posts->tag_id=='2')
                                 <hr>
                                 <li>
                                <div class="row post_table_row" >
                                    <div class="col-md-6" style="padding: 10px;"><span style="top: 18px;">{{$posts->title}}</span></div>
                                    <div class="col-md-4" style="color: #01579b; padding: 9px;"><i class="fa fa-calendar"></i> {{ date('Y-m-d', strtotime($posts->published_at)) }} </div>
                                    <div class="col-md-2"><a class="btn btn-info" style="padding: 7px;margin-top: 0;color: white;font-size: 14px;" title="View Details" @if($posts->is_file == 1) href="{{asset($posts->path)}}" @else href="/post/{{$posts->slug}}" @endif"><span class="glyphicon glyphicon-th-large">&nbsp;</span> View Details</a></div>
                                </div>
                                 </li>
                                 <hr>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- / Tab 2 content -->
                <!-- Tab 3 content -->
                <div class="tab-3">
                    <div class="row">
                        <div class="cell w-100 customclass">
                            <ul class="mad-list">
                                <li style="background-color: #dce4dc;">
                                    <div class="row" style="padding: 7px;">
                                         <div class="col-md-6" style="padding-left: 5px;"><span><strong  style="font-weight: bold;">Title</strong></span></div>
                                        <div class="col-md-4 hidden-xs hidden-sm" > <strong style="font-weight: bold;">Published Date</strong></div>
                                        <div class="col-md-2 hidden-xs hidden-sm" style="padding-left: 5px;"><strong style="font-weight: bold;">Download Link</strong></div>
                                    </div>
                                </li>
                            @foreach($post as $posts)
                                @if($posts->tag_id=='3')
                                 <hr>
                                 <li>
                                <div class="row post_table_row">
                                    <div class="col-md-6" style="padding: 10px;"><span style="top: 18px;">{{$posts->title}}</span></div>
                                    <div class="col-md-4" style="color: #01579b; padding: 9px;"><i class="fa fa-calendar"></i> {{ date('Y-m-d', strtotime($posts->published_at)) }} </div>
                                    <div class="col-md-2"><a class="btn btn-info" style="padding: 7px;margin-top: 0;color: white;font-size: 14px;" title="Download" download href="{{asset($posts->path)}}"><span class="glyphicon glyphicon-download"></span> Download</a></div>
                                </div>
                                 </li>
                                 <hr>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <!-- / Tab 3 content -->

            </div>
            <!-- / Tabs wrapper -->
        </section>
    </div>
    @else
    <div class="container text-center" style="margin-bottom: 20px;"><em style="text-align: center;">No Result Found</em></div>
    @endif
   
@stop


@section('footer')
   
@stop