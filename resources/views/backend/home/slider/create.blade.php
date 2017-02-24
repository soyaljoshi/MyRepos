@extends('backend.layout')

@section('title', 'Create Slider')

@push('styles')
<link href="{{ asset('assets/plugins/kendo-ui/styles/kendo.common-material.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/kendo-ui/styles/kendo.material.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            {{ Form::open([ 'route' => 'admin::slidersetting.store', 'class' => 'uk-form-stacked', 'id' => 'page_create_form','files'=>'true' ]) }}
                @include('backend.home.slider.partials.form', [ 'title' => 'Create Slider' ])
            {{ Form::close() }}
        </div>
    </div>
@stop

@push('scripts')
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/forms_wysiwyg.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/js/kendoui_custom.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/kendoui.min.js') }}"></script>
<script>
    $('.datetimepicker').kendoDateTimePicker({
        parseFormats: ["yyyy-MM-dd HH:mm:ss"]
    });
</script>
@endpush