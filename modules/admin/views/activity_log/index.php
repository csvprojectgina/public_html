<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ <?= t('សកម្មភាពអ្នកប្រើប្រាស់') ?></h3> 
        </div>

        <div class="panel-body">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                <thead>
                    <tr>
                        <th style=""><?= t('អ្នកប្រើប្រាស់') ?></th>
                        <th style=""><?= t('នាម-គោត្តនាម') ?></th>
                        <th style=""><?= t('នាម-មន្ត្រី') ?></th>
                        <th style=""><?= t('សកម្មភាព') ?></th>                        
                        <th style=""><?= t('កាលបរិច្ឆេទ') ?></th>
                        <!--<th style="width: 3%;"><?= t('') ?></th>-->                        
                    </tr>
                </thead>
                <tbody>
                <td colspan="5" class="dataTables_empty"><?= t('កំពុងទាញព័ត៌មានពី server !') ?></td>
                </tbody>
                <tfoot>
                    <!--<tr>-->
<!--                <th rowspan="1" colspan="1"><input  placeholder="អ្នកប្រើប្រាស់" id="user_name" class="user_name search_init" name="user_name"></th>
                <th rowspan="1" colspan="1"><input  placeholder="នាម-គោត្តនាម" id="full_name" class="full_name search_init" name="full_name" ></th>
                        <th rowspan="1" colspan="1"><input  placeholder="នាម-មន្ត្រី" id="english_name" class="english_name search_init" name="english_name" ></th>
                        <th rowspan="1" colspan="1"><input  placeholder="សកម្មភាព" id="activity" class="activity search_init" name="activity"  ></th>
                        <th rowspan="1" colspan="1"><input  placeholder="កាលបរិច្ឆេទ" id="date" class="date search_init" name="date" ></th>-->
<!--                        <th rowspan="1" colspan="1"><input  placeholder="អ្នកប្រើប្រាស់"></th>
                        <th rowspan="1" colspan="1"><input  placeholder="នាម-គោត្តនាម"></th>
                        <th rowspan="1" colspan="1"><input  placeholder="នាម-មន្ត្រី"></th>
                        <th rowspan="1" colspan="1"><input  placeholder="សកម្មភាព"></th>
                        <th rowspan="1" colspan="1"><input  placeholder="កាលបរិច្ឆេទ"></th>-->
                        <!--<th></th>-->
                    <!--</tr>-->
                </tfoot>
            </table>
        </div>

    </div>
</form>

<style>
    .table-hover tbody tr:hover td {background: #EDEFF5;}
    th{text-align: center;vertical-align: middle;}
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>

<script>
    /* Table initialisation */
    
    $(document).ready(function() {
        var oTable;
        // Setup - add a text input to each footer cell
//    $('#example tfoot th').each( function () {
//        var title = $('#example thead th').eq( $(this).index() ).text();
//        $(this).html( '<input class="input" style="width: 150px;" type="text" placeholder="'+title+'" />' );
//    } );
 
    // DataTable
         /* Init the table */
        var oTable = $('#example').DataTable({
            "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ កំណត់ត្រាក្នុងមួយទំព័រ"
            },
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?= site_url('admin/activity_log/grid') ?>",
             "order": [[ 4, "desc" ]]
        });

    // Apply the search
    
oTable.api().columns().every( function () {
    var column = this; 
    $( 'input', this.footer() ).on( 'keyup change', function () {
        column
            .search( this.value )
            .draw();
    } );
} );

        $("body").delegate(".editor_remove", 'click', function(e) {
            if (confirm('<?= t('តើអ្នកពិតជាលុប?') ?>')) {
                var tr = $(this).parent().parent();
                var id = tr.attr('id') - 0;
                var eid = simple_encrypt(id);
                window.location = '<?= site_url('admin/activity_log/delete') ?>/' + encodeURIComponent(eid);
            }
        });
        
       
    });
    /* Get the rows which are currently selected */
    function fnGetSelected(oTableLocal)
    {
        return oTableLocal.$('tr.row_selected');
    }
// //auto com user name============
//     $("body").delegate("#user_name", "focus", function(e) {
//        $(this).autocomplete({
//            minLength: 0,
//            autoFocus: true,
//            delay: 0,
//            source: function(request, response) {
//                $.ajax({
//                    url: "<?= site_url('admin/activity_log/opt_user_name') ?>",
//                    type: "post",
//                    datatype: "json",
//                    async: false,
////                    beforeSend: function() {
////                        $('.xmodal').show();
////                    },
//                    data: {
//                        q: request.term
//                    },
//                    success: function(data) {
//                        response($.map(data.slice(0, 15), function(i, item) {
//                            return {
//                                label: i.user_name,
//                                value: item.user_name
//                            };
//                        }));
//                    },
//                    error: function() {
//
//                    }
//                });
//            }
//        });
//    });
</script>

