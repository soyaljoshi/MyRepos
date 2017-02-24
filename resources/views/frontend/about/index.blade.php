@extends('frontend.layouts.master')

@section('title', 'NPHL | About Us')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
    <style>
        #map {
            width: 100%;
            height: 400px;
        }
    </style>
@stop

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
   {{--  <div class="container">
           <ol class="breadcrumb" style="background: none;">
                   <li><a href="/">Home</a></li>
                   <li class="active">About</li>
            </ol>
    </div> --}}
   
@stop

@section('footer')
    <script>
        function initMap() {
            var mapDiv = document.getElementById('map');
            var map = new google.maps.Map(mapDiv, {
                center: {lat: 27.68108, lng: 85.30170},
                zoom: 17
            });
        }
    </script>
    <script async
            defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw8YWCFSFe4plsU7xT8UUNehWwhnizUSM&callback=initMap">
    </script>
@stop