<!--datatable style-->
<style media="screen">
    .panel-title > a{
        color: #498fcc !important;
        font-size: 16px;
        margin-top: -10px;
        margin-right: -16px;
        padding: 5px;
        border-top-left-radius: 0px;
        border-down-left-radius: 0px;
        background: #ddd;}
    .container{
        padding-right: 0px ;
        padding-left: 0px;
    }

</style>
<form class="form-horizontal" action="" role="form" method="post" style="padding-left:0px; padding-right:0px;">
    <div class="panel panel-default">

        <div class="panel-heading thumbnail btn-group">
            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ --><?= t('ព័ត៌មានមន្ត្រី') ?></h3>
        </div>
        <div class="panel-body" style="padding-top: 0px; padding-bottom: 0px;">
            <table  id="table" style="width: 100%!important;" cellpadding="0" cellspacing="0" border="1" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <?php
                    $dmid = $this->session->all_userdata()['dmid'];
                    ?>
                    <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
                        <th type="hidden" style="text-align: center;width: 5%;"><?= t('id') ?></th>
                        <th style="text-align: center;"><?= t('ឈ្មោះ') ?></th>
                        <th style="text-align: center;"><?= t('ភេទ') ?></th>
                        <th style="text-align: center;"><?= t('មុខតំណែង') ?></th>
                        <th style="text-align: center;"><?= t('លេខទូរស័ព្ទ') ?></th>
                        <th style="text-align: center;"><?= t('') ?></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                </tfoot>
            </table>

        </div>
    </div>
</form>

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $('#table tbody th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    });
    var table;
    $(document).ready(function () {
        //datatables
        table = $('#table').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                url: "<?php echo base_url() . 'crud/fetch_user'; ?>",
                "type": "POST"
            },
            "oLanguage": {
                "sLengthMenu": "\_MENU_", //menu
                "sSearch": " _INPUT_", //search
                "sInfo": "​ _START_ នៃ _END_​ នៃធាតុ _MAX_ ",
                "sInfoEmpty": "", //under sZeroRecords
                "sZeroRecords": "អត់មានទិន្ទន័យ",
                "sInfoFiltered": "",
                "oPaginate": {
                    "sPrevious": "ទំព័រមុន",
                    "sFirst": "First page",
                    "sNext": "ទំព័របន្ទាប់",
                    "sLast": "ចុងក្រោយ",
                },
            },
            "lengthMenu": [[15, 25, 50, 100, 500, 1000, -1], [15, 25, 50, 100, 500, 1000, "All"]],
            "columnDefs": [
                {
                    "render": function (data, type, row) {
                        return "<a href='edit/" + row[0] + "'>" + row[1] + "</a>";
                    },
                    "targets": 1
                },
                {"visible": false, "targets": [0]}

            ],
             "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(3, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {

                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="4">'+group+'</td><td></td></tr>'
                    );
 
                    last = group;
                }
            } );
        },
        });
    });
</script>
