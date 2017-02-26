@extends('frontend.layouts.master')
@section('title','VaRG')
@section('body')
@include('frontend.partials.slider')
    

    {{-- Recent dynamic section begin --}}
    @include('frontend.partials.section')
    {{-- Recent dynamic section End --}}

    
    {{-- Recent Research begin --}}
    @include('frontend.partials.populartest')
    {{-- Recent Research End --}}

    {{-- Recent Partners begin --}}
    @include('frontend.partials.packages')
    {{-- Recent Partners End --}}

    {{-- Recent news begin --}}
    @include('frontend.partials.news')
    {{-- Recent news End --}}
   


@stop


     
