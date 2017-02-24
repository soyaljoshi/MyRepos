@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Services')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => $service->name, 'images' => $service->banners])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark services">
        <div class="uk-container uk-container-center uk-block-default bl-margin-top-ve bl-padding-2-tb">
            <p>{!! $service->description_html !!}</p>
        </div>
        <div class="uk-container uk-container-center uk-block-default uk-margin-top">
            <ul class="uk-tab bl-tab" data-uk-tab="{connect:'#services'}">
                @foreach($service->plans as $plan)
                    <li><a href="javascript:void(0);">{{ $plan->name }}</a></li>
                @endforeach
            </ul>
            <ul class="uk-switcher bl-switcher" id="services">
                @foreach($service->plans as $plan)
                    <li>@include('frontend.services.plan', compact('plan'))</li>
                @endforeach
            </ul>
        </div>
    </section>
    @include('frontend.partials.notes')
@stop