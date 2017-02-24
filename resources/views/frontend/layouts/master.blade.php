<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

    <title>@yield('title')</title>

   <link href='http://fonts.googleapis.com/css?family=Roboto:400,900italic,700italic,900,700,500italic,500,400italic,300italic,300,100italic,100|Open+Sans:400,300,400italic,300italic,600,600italic,700italic,700,800|Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700' rel='stylesheet' type='text/css'>


<!-- Styles -->
<link href="{{ asset('assets/frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/frontend/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/frontend/css/icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/frontend/layerslider/css/layerslider.css') }}" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/sea-green.css') }}" title="sea-green" />
<link href="{{ asset('assets/frontend/css/contact.css') }}" rel="stylesheet" type="text/css" /> <!-- AJAX Contact Form Stylesheet -->


    
</head>

<body> 
<div class="theme-layout">

@include('frontend.layouts.header')
   
    @yield('body')
</div>
@include('frontend.layouts.footer')
{{ Html::script('assets/frontend/js/jquery-2.2.2.js') }}

{{ Html::script('assets/frontend/js/perfect-scrollbar.jquery.js') }}
{{ Html::script('assets/frontend/js/bootstrap.js') }}
{{ Html::script('assets/frontend/js/html5lightbox.js') }}
{{ Html::script('assets/frontend/js/script.js') }}
{{ Html::script('assets/frontend/js/styleswitcher.js') }}
{{ Html::script('assets/frontend/js/jquery.flexslider.js') }}
{{ Html::script('assets/frontend/js/jquery.mousewheel.js') }}
{{ Html::script('assets/frontend/js/jquery.downCount.js') }}

<script>
$(window).load(function(){

    $('.countdown').downCount({
    /* ==== Month / Date / Year ===*/ 
    date: '10/17/2017 12:00:00',
    offset: +10
    }); 


    $('.countdown.time2').downCount({
    /* ==== Month / Date / Year ===*/ 
    date: '04/30/2017 12:00:00',
    offset: +10
    }); 

  $('.mission-carousel').flexslider({
    animation: "slide",
    animationLoop: true,
    slideShow:true,
    controlNav: false,  
    maxItems: 1,
    pausePlay: false,
    mousewheel:false,
    start: function(slider){
      $('body').removeClass('loading');
    }
    });

  $('.footer_carousel').flexslider({
    animation: "slide",
    animationLoop: true,
    slideShow:false,
    controlNav: true,   
    maxItems: 1,
    pausePlay: false,
    mousewheel:false,
    start: function(slider){
      $('body').removeClass('loading');
    }
    });
});
</script>
{{ Html::script('assets/frontend/layerslider/js/greensock.js') }}
{{ Html::script('assets/frontend/layerslider/js/layerslider.transitions.js') }}
{{ Html::script('assets/frontend/layerslider/js/layerslider.kreaturamedia.jquery.js') }}
<script>
$(document).ready(function(){
jQuery("#layerslider").layerSlider({
    responsive: true,
    responsiveUnder: 1280,
    layersContainer: 1170,
    skin: 'fullwidth',
    hoverPrevNext: true,
    skinsPath: 'layerslider/skins/'
});
});
</script>
    @yield('footer')
</body>
</html>
