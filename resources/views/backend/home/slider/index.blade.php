@extends('backend.layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/kendo.common-material.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/backend/css/kendo.material.min.css') }}"/>
@endpush

@section('title', 'Slider Setting')

@section('content')
     <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">All Sliders</h3>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-1-1">
                            <div class="uk-overflow-container">
                                <table id="dt_default" class="uk-table">
                                    <thead>
                                        <tr>
                                            <th class="uk-width-2-6">Title</th>
                                            <th class="uk-width-1-6 uk-text-center">Caption</th>
                                            <th class="uk-width-1-6 uk-text-center">URL</th>
                                            <th class="uk-width-1-6 uk-text-center">Status</th>
                                            <th class="uk-width-1-6 uk-text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($slider as $slider)
                                        <tr>
                                            <td>{{ $slider->title }}</td>
                                            <td class="uk-text-center">{{ $slider->caption }}</td>
                                            <td class="uk-text-center">{{ $slider->url }}</td>
                                             <td class="uk-text-nowrap uk-text-center"><span class="uk-badge uk-badge-{{ $slider->status ? 'Default' : 'Success' }}">{{  $slider->status ? 'Published' : 'Draft' }}</span></td>



                                           <td class="uk-text-center">

                                            <a href="{{ route('admin::slidersetting.edit', $slider->id) }}" data-uk-tooltip="{pos:'left'}" title="Edit Slider">
                                                        <i class="material-icons md-24">&#xE254;</i>
                                                    </a>
                                              <a class="item_delete" data-source="{{ route('admin::slidersetting.destroy', $slider->id) }}" data-uk-tooltip="{pos:'left'}" title="Delete Slider">
                                                <i class="material-icons md-24">&#xE872;</i>
                                            </a>
                                            </td>
                                        </tr>
                                        @endforeach                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')

<script src="{{ asset('assets/backend/js/pages/kendoui.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/kendoui.custom.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/uikit_custom.min.js') }}"></script>


    <!-- datatables -->
    <script src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <!-- datatables tableTools-->
    <script src="{{ asset('assets/plugins/datatables-tabletools/js/dataTables.tableTools.js') }}"></script>
    <!-- datatables custom integration -->
    <script src="{{ asset('assets/backend/js/custom/datatables_uikit.min.js') }}"></script>

    <script src="{{ asset('assets/backend/js/pages/plugins_datatables.min.js') }}"></script>
    
    <script>
        $(document).ready(function () {
            $(document).on('click', '.item_delete', function() {
                var p = $(this);

                UIkit.modal.confirm('Are you sure?', function() {
                    $.ajax({
                        type: 'post',
                        url: p.data('source'),
                        data: { _method: 'delete' },
                        success: function (response) {

                            location.reload();

                        },
                        error: function (response) {
                            
                            UIkit.modal.alert('Remove failed!');

                        }
                    });
                });
            });
        });
    </script>
@endpush
