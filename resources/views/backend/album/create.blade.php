@extends('backend.layout')

@section('title', 'Photo Album')

@push('styles')
<link href="{{ asset('assets/plugins/kendo-ui/styles/kendo.common-material.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/kendo-ui/styles/kendo.material.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css"/>

@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            {{ Form::open([ 'route' => 'admin::albumsetting.store', 'class' => 'uk-form-stacked', 'id' => 'page_create_form','files' => 'true' ]) }}
                @include('backend.album.partials.form', [ 'title' => 'Create Albums' ])
            {{ Form::close() }}
        </div>
    </div>
@stop

@push('scripts')
    
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
     This must be loaded before fileinput.min.js -->
<script src="{{ asset('assets/backend/js/canvas-to-blob.min.js') }}" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
     This must be loaded before fileinput.min.js -->
<script src="{{ asset('assets/backend/js/sortable.min.js') }}" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
     This must be loaded before fileinput.min.js -->
<script src="{{ asset('assets/backend/js/purify.min.js') }}" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="{{ asset('assets/backend/js/fileinput.min.js') }}"></script>
<!-- bootstrap.js below is needed if you wish to zoom and view file content 
     in a larger detailed modal dialog -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script> --}}
<!-- optionally if you need a theme like font awesome theme you can include 
    it as mentioned below -->
<script src="{{ asset('assets/backend/js/theme.js') }}"></script>

<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/forms_wysiwyg.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/js/kendoui_custom.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/kendoui.min.js') }}"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
     This must be loaded before fileinput.min.js -->
<script src="{{ asset('assets/backend/js/canvas-to-blob.min.js') }}" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
     This must be loaded before fileinput.min.js -->
<script src="{{ asset('assets/backend/js/sortable.min.js') }}" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
     This must be loaded before fileinput.min.js -->
<script src="{{ asset('assets/backend/js/purify.min.js') }}" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="{{ asset('assets/backend/js/fileinput.min.js') }}"></script>
<!-- bootstrap.js below is needed if you wish to zoom and view file content 
     in a larger detailed modal dialog -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
<script>
    $('.selectpicker').selectize({
        plugins: {
            'remove_button': {
                label: ''
            }
        },
        maxItems: null,
        valueField: 'id',
        labelField: 'title',
        searchField: 'title',
        create: false,
        render: {
            option: function (data, escape) {
                return '<div class="option">' +
                    '<span class="title">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function (data, escape) {
                return '<div class="item"><a href="' + escape(data.url) + '" target="_blank">' + escape(data.title) + '</a></div>';
            }
        },
        onDropdownOpen: function ($dropdown) {
            $dropdown
                .hide()
                .velocity('slideDown', {
                    begin: function () {
                        $dropdown.css({'margin-top': '0'})
                    },
                    duration: 200,
                    easing: easing_swiftOut
                })
        },
        onDropdownClose: function ($dropdown) {
            $dropdown
                .show()
                .velocity('slideUp', {
                    complete: function () {
                        $dropdown.css({'margin-top': ''})
                    },
                    duration: 200,
                    easing: easing_swiftOut
                })
        }
    });

    $('.datetimepicker').kendoDateTimePicker({
        parseFormats: ["yyyy-MM-dd HH:mm:ss"]
    });
</script>
@endpush