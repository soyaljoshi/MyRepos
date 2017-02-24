@extends('frontend.layouts.master')

@section('title', 'NPHL :: Post')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop
@push('styles')
.single_news figure img {
  
  width:30%;
}
@endpush

@section('body')
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
    <section class="latestNews ">
        <div class="container">
            <div class="single_news">
                <div class="col-md-12 page"  style="margin-bottom: 70px;">
                <h2>{{ $post->title }}</h2>
                    <p id="publish_date">Published Date : <i class="fa fa-calendar"> {{ date('Y-m-d', strtotime($post->published_at)) }}</i></p>
                    <div>
                        <figure>
                            @if( !empty($post->image) )
                               <img id="post_img" src="{{ asset($post->image->thumbnail(327,215)) }}" />
                            @else
                                <img src="{{asset('assets/frontend/img/image_not_found.png')}}" alt="">
                            @endif
                        </figure> 
                    </div>
                    
                     <div class="post_body">
                        {!! $post->content_html !!}
                        
                     </div>
                     {{-- <div id="readMore">
                        <a class="care_bt">Show More <i class="fa fa-angle-down"></i></a>
                     </div> --}}
                </div>
            </div>
        </div>
    </section>
@stop
