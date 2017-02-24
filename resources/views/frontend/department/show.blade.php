@extends('frontend.layouts.master')

@section('title', 'NPHL :: Departments')
@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
    <style>
.banner_area{ 
    background: url({{asset('assets/frontend/img/pagebanner.jpg')}});
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
                <h1>Our Units</h1>     
            </div>
        </div>
    </div>
</div> 
  <div class="container">
   <ol class="breadcrumb" style="background: none;">
        <li>
         <i class="fa fa-home"></i>
            <a href="/">Home</a>
        </li>

        @for($i = 1; $i <= count(Request::segments()); $i++)
            <li>
                  {{ ucfirst(Request::segment($i))  }}
                  @if($i < count(Request::segments()) & $i > 1)
                    {!!'<i class="fa fa-angle-right"></i>'!!}
                  @endif
            </li>
        @endfor
    </ol>
</div>
   <section class="latestNews section-padding" style="
    padding-top: 0;">
            <div class="container">
                <div class="row all_news area_content">
                    <div class="col-sm-12">
                    <h1 class="sec_Hd">{{$departments->title}}</h1>
                        <div class="single_news">
                            {{-- <figure>
                            @if(count($images->getImage('Departments',$departments->id)) > 0 )
                                            @foreach($images->getImage('Departments',$departments->id) as $image)
                                                @if($image->imageable_type === 'Departments' && $image->imageable_id == $departments->id )
                                                    <img alt="slider" src="{{ asset($image->thumbnail(1200,500)) }} " style=" padding-top: 24px;">
                                                @endif
                                            @endforeach                                            
                                       @else 
                                            <img src="{{ asset('assets/frontend/img/department_placeholder.png')}}" alt="img-fluid" style="height: 400px; width: 100%; padding-top: 24px;">
                                            
                                       @endif 
                            </figure> --}} 
                            <div class="news_txt">
                                  {!! $departments->desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@stop
 