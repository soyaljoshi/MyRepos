@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Customer Login')

@section('body')
    @include('frontend.partials.banner', ['title' => 'Login'])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container uk-container-center uk-block-default bl-margin-top-ve bl-padding-2-tb">
            @include('shared.errors')
            <div class="uk-grid data-uk-grid-match uk-grid-divider">
                <div class="uk-width-1-3">
                    <div class="uk-panel">
                        <h1 class="uk-article-title">Login</h1>
                        {{ Form::open(['url' => 'login', 'class' => 'uk-form' ]) }}
                        <div class="uk-form-row">
                            {{ Form::text('login', old('login'), ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Email/Username', 'required']) }}
                        </div>
                        <div class="uk-form-row">
                            {{ Form::password('password', ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'password', 'required']) }}
                        </div>
                        <div class="uk-form-row">
                            <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large" type="submit">
                                Login
                            </button>
                        </div>
                        <div class="uk-form-row uk-text-small">
                            <label class="uk-float-left">
                                <input type="checkbox" name="remember_me">
                                Remember Me
                            </label>
                            <a class="uk-float-right uk-link uk-link-muted" href="#forgot-password-modal" data-uk-modal>Forgot Password?</a>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="uk-width-2-3">
                    <h1 class="uk-article-title">Sign Up</h1>
                    {{ Form::open(['url' => '/register', 'class' => 'uk-form uk-panel' ]) }}

                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label class="uk-form-label">First Name*</label>
                            {{ Form::text('first_name', old('first_name'), [ 'class' => 'uk-width-1-1'.($errors->has('first_name') ? ' uk-form-danger':''), 'required']) }}
                        </div>

                        <div class="uk-width-1-2">
                            <label class="uk-form-label">Last Name*</label>
                            {{ Form::text('last_name', old('last_name'), [ 'class' => 'uk-width-1-1'.($errors->has('last_name') ? ' uk-form-danger':''), 'required']) }}
                        </div>
                    </div>

                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label class="uk-form-label">Username</label>
                            {{ Form::text('username', old('username'), [ 'class' => 'uk-width-1-1'.($errors->has('username') ? ' uk-form-danger':''), 'required']) }}
                        </div>

                        <div class="uk-width-1-2">
                            <label class="uk-form-label">Email</label>
                            {{ Form::email('email', old('email'), [ 'class' => 'uk-width-1-1'.($errors->has('email') ? ' uk-form-danger':''), 'required']) }}
                        </div>
                    </div>

                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label class="uk-form-label">Password</label>
                            {{ Form::password('password', [ 'class' => 'uk-width-1-1'.($errors->has('password') ? ' uk-form-danger':''), 'required']) }}
                        </div>

                        <div class="uk-width-1-2">
                            <label class="uk-form-label">Confirm Password</label>
                            {{ Form::password('password_confirmation', [ 'class' => 'uk-width-1-1'.($errors->has('password') ? ' uk-form-danger':''), 'required']) }}
                        </div>
                    </div>

                    <div class="uk-grid">
                        <label>
                            <input type="checkbox" name="terms" class="uk-margin-small-right{{ $errors->has('terms') ? ' uk-form-danger':'' }}" required>
                            I agrees to the terms and conditions
                        </label>
                    </div>

                    <div class="uk-grid">
                        <div class="uk-width-1-3">
                            <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large" type="submit">Sign
                                Up
                            </button>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
    <div id="forgot-password-modal" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <form class="uk-form" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <label for="email" class="uk-form-label">E-Mail Address</label>
                        <input id="email" type="email" class="uk-width-1-1 {{ $errors->has('email') ? ' uk-form-danger':'' }}" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <button type="submit" class="uk-button uk-button-primary uk-float-right">
                            <i class="material-icons uk-vertical-align-middle">&#xE0BE;</i> Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
