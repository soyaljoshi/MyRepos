@extends('backend.layout')

@section('title', 'Staff')

@push('styles')
    <link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
    
    <link rel="stylesheet" href="https://rawgit.com/MEYVN-digital/mdl-selectfield/master/mdl-selectfield.min.css">
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            @include('backend.partials.errors')
            @include('backend.Staff.partials.edit-form', [ 'title' => 'Edit Staff', 'banners' => true ])
        </div>
    </div>
@stop

@push('scripts')
<script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>

  <script src="https://rawgit.com/MEYVN-digital/mdl-selectfield/master/mdl-selectfield.min.js"></script>
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_wysiwyg.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
    $('.selectpicker').selectize({
        plugins: {
            'remove_button': {
                label: ''
            }
        },
        maxItems: 1,
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
                return '<div class="item">' + escape(data.title) + '</div>';
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