@extends('backend.layout')

@section('title', 'Settings')

@push('styles')
<link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div id="page_content">
    
        <div id="page_content_inner">
            <h4 class="heading_a uk-margin-bottom">Settings</h4>
            {{ Form::open(['route' => 'admin::setting.update', 'class' => 'uk-form-stacked', 'id' => 'site_settings', 'method' => 'put', 'files' => true]) }}
                <div class="uk-grid" data-uk-grid-margin>

                    <!-- Contacts Section -->
                    <div class="uk-width-large-1-3 uk-width-medium-1-1">
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    {{ config('website.title') }} Contacts
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <label for="settings_address">Address</label>
                                    <textarea class="md-input" name="setting['address']" id="settings_address" cols="30" rows="3">{{ setting('address') }}</textarea>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_phone">Phone</label>
                                    <input class="md-input" type="text" id="settings_phone" name="setting['phone']" value="{{ setting('phone') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_fax">Fax</label>
                                    <input class="md-input" type="text" id="settings_fax" name="setting['fax']" value="{{ setting('fax') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_email">Email</label>
                                    <input class="md-input" type="text" id="settings_email" name="setting['email']" value="{{ setting('email') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_gpo">GPO</label>
                                    <input class="md-input" type="text" id="settings_gpo" name="setting['gpo']" value="{{ setting('gpo') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_long">Longitude</label>
                                    <input class="md-input" type="text" id="settings_long" name="setting['longitude']" value="{{ setting('longitude') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_lat">Latitude</label>
                                    <input class="md-input" type="text" id="settings_lat" name="setting['latitude']" value="{{ setting('latitude') }}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Business Hours and Pop Up Section -->
                    <div class="uk-width-large-1-3 uk-width-medium-1-2">
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Business Hours
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <label for="settings_bh_sales">Sales</label>
                                    <textarea class="md-input" name="setting['bh-sales']" id="settings_bh_sales" cols="30" rows="2">{{ setting('bh-sales') }}</textarea>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_customer_care">Customer Care</label>
                                    <textarea class="md-input" name="setting['bh-customer-care']" id="settings_customer_care" cols="30" rows="2">{{ setting('bh-customer-care') }}</textarea>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_technical_support">Technical Support</label>
                                    <textarea class="md-input" name="setting['bh-technical-support']" id="settings_technical_support" cols="30" rows="2">{{ setting('bh-technical-support') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Footer 1 
                                </h3>
                            </div>
                            <div class="md-card-content">
                               <textarea name="setting['footer-1']" id="wysiwyg_tinymce" cols="30" rows="10">{{ setting('footer-1') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links Section -->
                    <div class="uk-width-large-1-3 uk-width-medium-1-2">
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Social Links
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <label for="settings_facebook">Facebook</label>
                                    <input class="md-input" type="text" id="settings_facebook" name="setting['facebook']" value="{{ setting('facebook') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_twitter">Twitter</label>
                                    <input class="md-input" type="text" id="settings_twitter" name="setting['twitter']" value="{{ setting('twitter') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_google_plus">Google Plus</label>
                                    <input class="md-input" type="text" id="settings_google_plus" name="setting['google-plus']" value="{{ setting('google-plus') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Footer 2 
                                </h3>
                            </div>
                            <div class="md-card-content">                                
                                   <textarea name="setting['footer-2']" id="wysiwyg_tinymce1" cols="30" rows="10">{{ setting('footer-2') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md-fab-wrapper">
                    <button type="submit" class="md-fab md-fab-primary" href="#" id="page_settings_submit">
                        <i class="material-icons">&#xE161;</i>
                    </button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@push('scripts')
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/forms_wysiwyg.min.js') }}"></script>
@endpush