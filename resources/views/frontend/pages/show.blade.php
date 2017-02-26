
@extends('frontend.layouts.master')

@section('title', 'VaRG | Pages')

@section('header')
    
@stop

@section('body')

<div class="top-image">
  <img src="{{ asset('assets/frontend/images/single-page-top3.jpg') }}" alt="" />
</div><!-- Page Top Image -->
  
<section class="inner-page">
  <div class="container">
    <div class="page-title">
      <h1><span>{{$page->title}}</span></h1>
    </div><!-- Page Title -->
    <div class="row">
        {!! $page->content_html !!}
    </div>  
  </div>
</section>
@stop


@push('script')

@endpush
