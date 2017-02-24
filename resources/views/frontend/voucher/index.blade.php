@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Shop')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => 'Shop'])
    <section id="our-services-index" class="uk-block uk-margin-remove uk-padding-remove">
        <div class="uk-container uk-container-center bl-margin-top-ve uk-block-default bl-padding-2-tb bl-card">
            <div class="uk-grid">
                @foreach(vouchers() as $voucher )
                    <div class="uk-width-small-1-2 uk-width-medium-1-3">
                        <figure class="uk-overlay uk-overlay-hover uk-hover">
                            <img src="{{ image('assets/frontend/img/'.str_slug($voucher->voucher).'.png') }}" class="uk-overlay-spin">
                            <figcaption class="uk-overlay-panel uk-overlay-slide-bottom uk-overlay-bottom uk-overlay-background uk-text-center bl-text-light">
                                <h2>{{ $voucher->voucher }}</h2>
                                <a href="{{ route('voucher::show', str_slug($voucher->voucher)) }}" class="uk-button uk-button-large bl-button">
                                    <i class="material-icons">&#xE88E;</i>
                                    View
                                </a>
                                <a href="{{ route('voucher::buy', str_slug($voucher->voucher)) }}" class="uk-button uk-button-large bl-button">
                                    <i class="material-icons">&#xE854;</i>
                                    Add to Cart
                                </a>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('frontend.partials.notes')
@stop