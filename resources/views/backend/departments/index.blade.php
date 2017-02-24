@extends('backend.layout')

@section('title', 'Departments')

@section('content')
     <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">All Departments</h3>

            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-1-1">
                            <div class="uk-overflow-container">
                                <table id="dt_default" class="uk-table">
                                    <thead>
                                        <tr>
                                            <th class="uk-width-2-6">Title</th>
                                            <th class="uk-text-center">Status</th>
                                            <th class="uk-width-1-6 uk-text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($department as $departments)
                                        <tr>
                                            <td>{{ $departments->title }}</td>
                                            <td class="uk-text-nowrap uk-text-center"><span class="uk-badge uk-badge-{{ $departments->status ? 'Default' : 'Success' }}">{{  $departments->status ? 'Published' : 'Draft' }}</span></td>
                                           <td>

                                            <a href="{{ route('admin::departments.edit', $departments->id) }}" data-uk-tooltip="{pos:'left'}" title="Edit Department">
                                                        <i class="material-icons md-24">&#xE254;</i>
                                                    </a>
                                              <a class="item_delete" data-source="{{ route('admin::departments.destroy', $departments->id) }}" data-uk-tooltip="{pos:'left'}" title="Delete Department">
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

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent" href="{{ route('admin::departments.create') }}" id="pageAdd" data-uk-tooltip="{pos:'left'}" title="Create Department">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>
@stop

@push('scripts')
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
