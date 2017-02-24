@extends('backend.layout')

@section('title', 'Plan')

@push('styles')
    <link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            {{ Form::model($plan, [ 'route' => ['admin::plan.update', $plan->slug], 'id' => 'plan_edit_form', 'method' => 'put', 'files' => true ]) }}
                @include('backend.plan.partials.form', [ 'title' => 'Edit Plan' ])
            {{ Form::close() }}
        </div>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_wysiwyg.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}" type="text/javascript"></script>
@endpush