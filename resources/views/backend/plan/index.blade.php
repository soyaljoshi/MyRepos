@extends('backend.layout')

@section('title', 'Plan')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">All Plans</h3>
            <span id="sort_url" class="hidden" data-source="{{ route('admin::plan.sort.order') }}"></span>
            @forelse($servicePlans as $service => $plans)
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h4 class="md-card-toolbar-heading-text">
                            {{ $service }}
                        </h4>
                    </div>
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-1-1">
                                <div class="uk-overflow-container">
                                    <table class="uk-table" data-paging=false>
                                        <thead>
                                        <tr>
                                            <th class="uk-width-1-6 uk-text-center"><i class="material-icons">&#xE164;</i></th>
                                            <th class="uk-width-1-6">Name</th>
                                            <th class="uk-width-1-6">Service</th>
                                            <th class="uk-width-1-6 uk-text-center">Status</th>
                                            <th class="uk-width-2-6 uk-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($plans as $key => $plan)
                                            <tr>
                                                <td class="uk-text-center sort_item" data-id="{{ $plan->id }}">
                                                    <a class="move_item_up" data-uk-tooltip="{pos:'left'}" title="Move Up">
                                                        <i class="material-icons md-24">&#xE5C7;</i>
                                                    </a>
                                                    <a class="move_item_down" data-uk-tooltip="{pos:'right'}" title="Move Down">
                                                        <i class="material-icons md-24">&#xE5C5;</i>
                                                    </a>
                                                </td>
                                                <td class="uk-text-large uk-text-nowrap">{{ $plan->name }}</td>
                                                <td class="uk-text-nowrap">{{ $plan->service->name }}</td>
                                                <td class="uk-text-nowrap uk-text-center">
                                                <span class="uk-badge uk-badge-{{ $plan->is_active ? 'Success' : 'Default' }}">
                                                    {{ $plan->is_active ? 'Active' : 'Passive' }}
                                                </span>
                                                </td>
                                                <td class="uk-text-nowrap uk-text-center">
                                                    <a href="{{ route('admin::plan.edit', $plan->slug) }}" data-uk-tooltip="{pos:'left'}" title="Edit Plan">
                                                        <i class="material-icons md-24">&#xE254;</i>
                                                    </a>
                                                    <a class="item_delete" data-source="{{ route('admin::plan.destroy', $plan->slug) }}" data-uk-tooltip="{pos:'left'}" title="Delete Plan">
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
            @empty
                <div class="md-card">
                    <div class="md-card-content">
                        <h4 class="heading_b uk-text-center">{{ trans('messages.empty', ['entity' => 'plans']) }}</h4>
                    <div>
                </div>
            @endforelse
        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent" href="{{ route('admin::plan.create') }}" id="planAdd"  data-uk-tooltip="{pos:'left'}" title="Create Plan">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-tabletools/js/dataTables.tableTools.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/datatables_uikit.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/plugins_datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            function updateSortOrder() {
                var order = getOrder();
                $.ajax({
                    type: 'post',
                    url: $('#sort_url').data('source'),
                    data: {order: order},
                    success:function (response) {
                        showNotify('success', response.Message);
                    },
                    error: function () {
                        UIkit.modal.alert('Order update failed!');
                    }
                });
            }

            function getOrder() {
                var order = [];
                $.each($('.sort_item'), function (index, value) {
                    order[index] = $(value).data('id');
                });
                return order;
            }

            $(document).on('click', '.move_item_up,.move_item_down', function(){
                var row = $(this).parents("tr:first");
                if ($(this).is('.move_item_up')) {
                    row.insertBefore(row.prev());
                } else if ($(this).is('.move_item_down')) {
                    row.insertAfter(row.next());
                }
                updateSortOrder();
            });

            function deleteItem(item) {
                $.ajax({
                    type: 'post',
                    url: item.data('source'),
                    data: {_method: 'delete'},
                    success: function () {
                        location.reload();
                    },
                    error: function () {
                        UIkit.modal.alert('Remove failed!');
                    }
                });
            }

            $(document).on('click', '.item_delete', function() {
                var item = $(this);

                UIkit.modal.confirm('Are you sure?', function() {
                    deleteItem(item);
                });
            });
        });
    </script>
@endpush