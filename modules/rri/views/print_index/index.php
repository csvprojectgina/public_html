<a name=top></a>
<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/reports.gif') ?>" /> <?= t('របាយការណ៍តាម រាជធានី-ខេត្ត') ?></h3>
        </div>
        <div class="panel-body">
            <div class = "form-group">
                <label for = "pro_id" class = "col-sm-2 control-label"><?= t('រាជធានី-ខេត្ត') ?></label>
                <div class="col-sm-10">
                    <select required data-toggle="tooltip" data-placement="left" title="រាជធានី-ខេត្ត (ឧ.​ រាជធានីភ្នំពេញ...)" class="form-control" id="pro_id" placeholder="រាជធានី-ខេត្ត" name="pro_id">
                        <?php
                        // con. ======================
                        $sWhere = "";
                        $pr_code = $this->session->userdata('pr_code');
                        if ($pr_code == "") {
                            $sWhere .= "WHERE 1=1 ";
                        } else {
                            $sWhere .= "WHERE pr.id IN (" . $pr_code . ") ";
                        }
                        // ===========================
                        echo getoption("SELECT
                                                    pr.khmer_name,
                                                    pr.id
                                            FROM
                                                    province AS pr
                                            {$sWhere} ", "id", "khmer_name", set_value('pro_id', isset($row->pro_id) ? $row->pro_id : ''), true);
                        ?>
                    </select>
                </div>
            </div>            
        </div>

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg" >
                <button data-toggle="tooltip" data-placement="left" title="ស្វែងរកតាមសន្ទទស្សន័" id="btn_search" name="btn_search" type="button" class="btn btn-default  glyphicon glyphicon-search" value=""> <?= t('ស្វែងរក') ?></button>  
                <button data-toggle="tooltip" data-placement="left" title="បោះពុម្ពតាមសន្ទទស្សន៍" id="btn_print" name="btn_print" type="button" class="btn btn-default glyphicon glyphicon-print" value=""> <?= t('បោះពុម្ព') ?></button>
            </div>
        </div>
    </div>
</form>

<div id="go_bottom" class="go_bottom"></div>

<div class="dv_search_data" id="dv_search_data" style="text-align: center;">
</div><br />

<div id="go_top" class="go_top"></div>

<!---------------------->
<a name="bottom"></a>

<script type="text/javascript">
    $(function () {

        $('#btn_search').on('click', function () {
            var pro_id = $('#pro_id').val();
            if (pro_id - 0 == 0) {
                alert('សូមជ្រើសរើសរាជធានី-ខេត្ត !');
                $('#khmer_name').focus();
                return false;
            } else {
                $.ajax({
                    url: '<?= site_url('rri/print_index/search_index') ?>',
                    type: 'post',
                    datatype: 'html',
                    async: true,
                    beforeSend: function () {
                        $('.xmodal').show();
                    },
                    data: {pro_id: pro_id},
                    success: function (d) {
                        $('.xmodal').hide();
                        $('.dv_search_data').html(d);

                        // link to bottom ===============
                        $('.go_bottom').html('<div style="text-align: right;">' +
                                '<a href="#bottom" class="glyphicon glyphicon-chevron-down">ខាងក្រោម</a>' +
                                '</div>');

                        // link to top ==================
                        $('.go_top').html('<div style="text-align: right;">' +
                                '<a href="#top" class="glyphicon glyphicon-chevron-up">ខាងលើ</a>' +
                                '</div>');
                    },
                    error: function () {

                    }
                });
            }
        });

        // print ======================
        $('#btn_print').on("click", function () {
            var params = [
                'height=' + screen.height,
                'width=' + screen.width,
                'fullscreen=yes',
                'modal=yes'
            ];
            var divToPrint = document.getElementById('dv_search_data');
            var popupWin = window.open('', '_blank', params); // var popupWin = window.open('', '_blank', 'width=800,height=600'); // width=800,height=500
            popupWin.moveTo(0, 0);
            popupWin.document.open();
            popupWin.document.write('<html><head><title></title></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.print();
            popupWin.close();
        });

    });
</script>