@extends('frontend.layouts.master')

@section('title', 'NPHL | Archieved')

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
#tabbed ul li:before {
   content: " " !important;
}
   </style>
@stop

@section('body')
{{ Html::style('assets/frontend/css/custom.css')}}
   <div class="container">
          <ol class="breadcrumb" style="background: none;">
                  <li><i class="fa fa-home"></i> <a href="/">Home</a></li>
                  <li class="active">Archieved</li>
           </ol>
   </div>
   <!--Start of Achieve Body -->
   <div class="container" id="tab">
<section id="tabbed">
           <!-- First tab input and label -->
           <input id="t-1" name="tabbed-tabs" type="radio" checked="checked" />
           <label for="t-1" class="tabs shadow ">News</label>
           <!-- Second tab input and label -->
           <input id="t-2" name="tabbed-tabs" type="radio" />
           <label for="t-2" class="tabs shadow ">Notice & Events</label>
           <!-- Third tab input and label -->
           <input id="t-3" name="tabbed-tabs" type="radio" />
           <label for="t-3" class="tabs shadow ">Publications</label>
           <!-- Tabs wrapper -->
           <div class="wrapper shadow">
               <!-- Tab 1 content --> <!-- && $posts->expired_date < '$mytime' -->
               <div class="tab-1">
                  @if(!$posts->getarchieve(1))
                   <em>There are no News Available</em>
                  @else
                      <div class="row">
                         <div class="cell w-100 customclass">
                             <!-- Large title -->
                             <ul class="mad-list">
                                 <li style="background-color: #dce4dc;">
                                        <div class="row" style="padding: 7px;">
                                             <div class="col-md-6" style="padding-left: 5px;"><span><strong  style="font-weight: bold;">Title</strong></span></div>
                                            <div class="col-md-4 hidden-xs hidden-sm" > <strong style="font-weight: bold;">Published Date</strong></div>
                                            <div class="col-md-2 hidden-xs hidden-sm" style="padding-left: 5px;"><strong style="font-weight: bold;">Action</strong></div>
                                        </div>
                                  </li>
                                  @foreach($posts->getarchieve(1) as $postss)
                                  <hr>
                                  <li>
                                 <div class="post_table_row row">
                                     <div class="col-md-6" style="padding: 10px;"><span style="top: 18px;">{{$postss->title}}</span></div>
                                     <div class="col-md-4" style="color: #01579b; padding: 9px;"><i class="fa fa-calendar"></i> {{ date('Y-m-d', strtotime($postss->published_at)) }} </div>
                                     <div class="col-md-2"><a class="btn btn-info" style="padding: 7px;margin-top: 0;color: white;font-size: 14px;" title="View Details" target="_blank" @if($postss->is_file == 1) href="{{asset($postss->path)}}" @elsehref="/post/{{$postss->slug}}" @endif"><span class="glyphicon glyphicon-th-large">&nbsp;</span> View Details</a></div>
                                 </div>
                               </li>
                               <hr>
                               @endforeach
                             </ul>
                         </div>
                      </div>
                  @endif 
               </div>
               <hr>
               <!-- / Tab 1 content -->

               <!-- Tab 2 content -->

               <div class="tab-2">
                @if(!$posts->getarchieve(2))
                 <em>There are no Events Available</em>
                @else
                    <div class="row">
                       <div class="cell w-100 customclass">
                           <!-- Large title -->
                           <ul class="mad-list">
                               <li style="background-color: #dce4dc;">
                                      <div class="row" style="padding: 7px;">
                                           <div class="col-md-6" style="padding-left: 5px;"><span><strong  style="font-weight: bold;">Title</strong></span></div>
                                          <div class="col-md-4 hidden-xs hidden-sm" > <strong style="font-weight: bold;">Published Date</strong></div>
                                          <div class="col-md-2 hidden-xs hidden-sm" style="padding-left: 5px;"><strong style="font-weight: bold;">Action</strong></div>
                                      </div>
                                </li>
                                @foreach($posts->getarchieve(2) as $postss)
                                <hr>
                                <li>
                               <div class="post_table_row row">
                                   <div class="col-md-6" style="padding: 10px;"><span style="top: 18px;">{{$postss->title}}</span></div>
                                   <div class="col-md-4" style="color: #01579b; padding: 9px;"><i class="fa fa-calendar"></i> {{ date('Y-m-d', strtotime($postss->published_at)) }} </div>
                                   <div class="col-md-2"><a class="btn btn-info" style="padding: 7px;margin-top: 0;color: white;font-size: 14px;" title="View Details" target="_blank" @if($postss->is_file == 1) href="{{asset($postss->path)}}" @else  href="/post/{{$postss->slug}}" @endif"><span class="glyphicon glyphicon-th-large">&nbsp;</span> View Details</a></div>
                               </div>
                             </li>
                             <hr>
                             @endforeach
                           </ul>
                       </div>
                    </div>
                @endif 
               </div>
               <!-- / Tab 2 content -->
               <!-- Tab 3 content -->
               <div class="tab-3">
               @if(!$posts->getarchieve(3))
               <em>There are no Publication Available</em>
               @else
                  <div class="row">
                     <div class="cell w-100 customclass">
                         <!-- Large title -->
                         <ul class="mad-list">
                             <li style="background-color: #dce4dc;">
                                    <div class="row" style="padding: 6px;">
                                         <div class="col-md-6" style="padding-left: 5px;"><span><strong  style="font-weight: bold;">Title</strong></span></div>
                                        <div class="col-md-4 hidden-xs hidden-sm" > <strong style="font-weight: bold;">Published Date</strong></div>
                                        <div class="col-md-2 hidden-xs hidden-sm" style="padding-left: 5px;"><strong style="font-weight: bold;">Download Link</strong></div>
                                    </div>
                              </li>
                              @foreach($posts->getarchieve(3) as $postss)
                              <hr>
                              <li>
                             <div class="post_table_row row">
                                 <div class="col-md-6" style="padding: 10px;"><span style="top: 18px;">{{$postss->title}}</span></div>
                                 <div class="col-md-4" style="color: #01579b; padding: 9px;"><i class="fa fa-calendar"></i> {{ date('Y-m-d', strtotime($postss->published_at)) }} </div>
                                 <div class="col-md-2"><a class="btn btn-info" style="padding: 7px;margin-top: 0;color: white;font-size: 14px;" title="Download" download href="{{asset($postss->path)}}"><span class="glyphicon glyphicon-download"></span> Download</a></div>
                             </div>
                           </li>
                           <hr>
                           @endforeach
                         </ul>
                     </div>
                  </div>
                @endif   
               </div>
               <!-- / Tab 3 content -->

           </div>
           <!-- / Tabs wrapper -->
       </section>
   </div>

@stop


