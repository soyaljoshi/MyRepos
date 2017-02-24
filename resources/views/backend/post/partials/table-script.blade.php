<script>
    $(function () {
        // post datatable
        altair_datatables.dt_post();
    });

    altair_datatables = {
        dt_post: function () {
            var $dt_post = $('#dt_post');
            if ($dt_post.length) {

                // Setup - add a text input to each footer cell
                $dt_post.find('tfoot th').each(function () {
                    var title = $dt_post.find('tfoot th').eq($(this).index()).text();
                    $(this).html('<input type="text" class="md-input" placeholder="' + title + '" />');
                });

                // reinitialize md inputs
                altair_md.inputs();

                // DataTable
                var post_table = $dt_post.DataTable({
                    ajax: {
                        type: 'POST',
                        url: $('#dt_post').data('source')
                    },
                    columns: [
                        {'data': 'title', 'class': 'uk-text-nowrap uk-text-left'},
                        {'data': 'type', 'class': 'uk-text-nowrap uk-text-center'},
                        {'data': 'status', 'class': 'uk-text-nowrap uk-text-center'},
                        {'data': 'author', 'class': 'uk-text-nowrap uk-text-center'},
                        {'data': 'action', 'class': 'uk-text-nowrap uk-text-right'}
                    ]
                });

                var tt = new $.fn.dataTable.TableTools(post_table, {
                    "sSwfPath": window.sSwfPath
                });

                $(tt.fnContainer()).insertBefore($dt_post.closest('.dt-uikit').find('.dt-uikit-header'));

                $body.on('click', function (e) {
                    if ($body.hasClass('DTTT_Print')) {
                        if (!$(e.target).closest(".DTTT").length && !$(e.target).closest(".uk-table").length) {
                            var esc = $.Event("keydown", {keyCode: 27});
                            $body.trigger(esc);
                        }
                    }
                })
            }
        }
    };
</script>