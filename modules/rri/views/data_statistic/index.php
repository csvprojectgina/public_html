<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ <?= t('ស្វែងរកតាមស្ថិតិ') ?></h3>
        </div>

        <div class="panel-body">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="gr_data">
                <thead>
                    <tr>
                        <th style="text-align: center;width: 10px;"><?= t('#') ?></th>
                        <th style="text-align: center;"><?= t('លេខកូដខេត្ត') ?></th>
                        <th style="text-align: center;"><?= t('ចំនួនខ្សែសរុប') ?></th>
                        <th style="text-align: center;"><?= t('ប្រវែងខ្សែសរុប (គ.ម)') ?></th>
                        <th style="text-align: center;width: 20px;"><?= t('សកម្មភាព') ?></th>            
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <div id="dv_t" style="text-align: left;">
            </div>
        </div>

    </div>
</form>

<style>
    .table-hover tbody tr:hover td {background: #EDEFF5;}
</style>

<script type="text/javascript">
    $(function() {
        grid();
    });// ready f. ======================

    // grid ====================
    function grid() {
        var isearch = $('#isearch').val();
        $.ajax({
            url: "<?= site_url('rri/data_statistic/grid') ?>",
            type: "post",
            datatype: "json",
            async: false,
            data: {
                
            },
            success: function(data) {
                var re = data.re;
                var total = data.total;
                var total_show = data.total_show;
                
                // =======================
                if (re.length > 0) {
                    var tr = "";
                    var ii = 0;
                    $.each(re, function(i, item) {
                        ii++;
                        tr += "<tr>" +
                                "<td style='text-align: center;'>" + ii + "</td>" +
                                "<td>" + item.khmer_name + "</td>" +
                                "<td style='text-align: right;'>" + item.to_line + "</td>" +
                                "<td style='text-align: right;'>" + item.to_l + "</td>" +
                                "<td style='text-align: center;'><a href='<?= site_url('rri/data_statistic/edit') ?>/" + item.id + "'>កែព័ត៌មាន</a></td>" +
                                "</tr>";
                    });
                    $('#gr_data tbody').html(tr);
                    $('#dv_t').html("<span>បង្ហាញទិន្នន័យ: <b>" + total_show + " / " + total + "</b></span>");
                }
            },
            error: function() {

            }
        });
    }
</script>