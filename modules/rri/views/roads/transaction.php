<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ <?= t('កែ ឬលុប ខ្សែផ្លូវ') ?></h3>
            <input type="hidden" class="form-control"  value="1"  id="ba1" name="ba1">  
        </div>

        <div class="panel-body">        
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                <thead>
                    <tr>
                        <th style=""><?= t('ល.រ') ?></th>
                        <th style=""><?= t('លេខ​ផ្លូវ') ?></th>
                        <th style=""><?= t('ឈ្មោះ​ផ្លូវ') ?></th>
                        <th style=""><?= t('ប្រភេទ​ផ្លូវ') ?></th>
                        <th style=""><?= t('ប្រវែង​ផ្លូវ') ?></th>
                        <th style=""><?= t('ទទឹង​ផ្លូវ') ?></th>
                        <th style="width: 12%;"><a href="<?= site_url('rri/roads/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូលថ្មី') ?></a></th>            
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
    th{text-align: center;vertical-align: middle;}
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
            "sAjaxSource": "<?= site_url('rri/roads/grid') ?>"
        });

        $("body").delegate(".editor_edit", "click", function(e) {
            var tr = $(this).parent().parent();
            var id = tr.attr('id') - 0;
            var eid = (id);
            window.location = '<?= site_url('rri/roads/edit') ?>/' + encodeURIComponent(eid);
        });

        $("body").delegate(".editor_remove", "click", function(e) {
            if (confirm('<?= t('តើអ្នកពិតជាលុបឬ?') ?>')) {
                var tr = $(this).parent().parent();
                var id = tr.attr('id') - 0;
                var eid = (id);
                window.location = '<?= site_url('rri/roads/delete') ?>/' + encodeURIComponent(eid);
            }
        });

    });
    /* Get the rows which are currently selected */
    function fnGetSelected(oTableLocal)
    {
        return oTableLocal.$('tr.row_selected');
    }

</script>