<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ <?= t('ស្វែងរកតាមប្រភេទសំណង់') ?></h3>
        </div>

        <div class="panel-body">        
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                <thead>
                    <tr>
                        <th style="text-align: center;"><?= t('ប្រភេទ​សំណង់') ?></th>
                        <th style="text-align: center;"><?= t('ឈ្មោះ​​សំណង់') ?></</th>
                        <th style="text-align: center;"><?= t('X') ?></th>
                        <th style="text-align: center;"><?= t('Y') ?></th>
                        <th style="text-align: center;"><?= t('ទិស') ?></</th>
                        <th style="text-align: center;width: 120px;"><a href="<?= site_url('rri/roads/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូលថ្មី') ?></a></th>            
                    </tr>
                </thead>
                <tbody>
                <td colspan="5" class="dataTables_empty"><?= t('កំពុងទាញព័ត៌មានពី server !') ?></td>
                </tbody>
            </table>
        </div>
    </div>
</form>

<style>
    .table-hover tbody tr:hover td {background: #EDEFF5;}
</style>

<script>

    /* Table initialisation */
    var oTable;
    $(document).ready(function() {

        /* Init the table */
        oTable = $('#example').dataTable({
            "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ កំណត់ត្រាក្នុងមួយទំព័រ"
            },
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?= site_url('rri/search_type_construction/grid_type_construction') ?>"
        });

        $("body").delegate(".editor_edit", "click", function(e) {
            var tr = $(this).parent().parent();
            var id = tr.attr('id') - 0;
            var eid = (id);
            window.location = '<?= site_url('rri/roads/edit') ?>/' + encodeURIComponent(eid);
        });

        /* $("body").delegate(".editor_remove", "click", function(e) {
            if (confirm('<?= t('តើអ្នកពិតជាលុបឬ?') ?>')) {
                var tr = $(this).parent().parent();
                var id = tr.attr('id') - 0;
                var eid = (id);
                window.location = '<?= site_url('rri/roads/delete') ?>/' + encodeURIComponent(eid);
            }
        }); */

    });
    /* Get the rows which are currently selected */
    function fnGetSelected(oTableLocal)
    {
        return oTableLocal.$('tr.row_selected');
    }
</script>