<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/reports.gif') ?>" /> <?= t('បោះពុម្ពសៀវភៅ') ?></h3>
            <input type="hidden" value="<?= set_value('id', isset($row->id) ? $row->id : '') ?>" name="id" >
        </div>
        <div class="panel-body">     
            <!--option print-------------------->
            <div class = "form-group">
                <div class="col-sm-10">                     
                    <table>
                        <tr>
                            <td>
                                <!-- radios -------------------------->
                                <input type='radio' name='rd_gr' id='rd_pro' value="1" checked="true" />
                                <label for="rd_pro"><?= t('បោះពុម្ពតាមខេត្ត') ?></label><br/>

                                <div style="display: none;">
                                    <input type='radio' name='rd_gr' id='rd_dis' value="2" />  
                                    <label for="rd_dis"><?= t('បោះពុម្ពតាមស្រុក') ?></label><br />  

                                    <input type='radio' name='rd_gr' id='rd_excel' value="3" />  
                                    <label for="rd_excel"><?= t('បោះពុម្ព Excel តាមស្រុក') ?></label>  
                                </div>

                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- province --------------------------------------------->
            <div class = "form-group">
                <label for = "pro_code" class = "col-sm-2 control-label"><?= t('រាជធានី-ខេត្ត') ?></label>
                <div class="col-sm-10">
                    <select required data-toggle="tooltip" data-placement="left" title="រាជធានី-ខេត្ត (ឧ.​ រាជធានីភ្នំពេញ...)" class="form-control"  id="pro_code" placeholder="រាជធានី-ខេត្ត" name="pro_code">
                        <?php
                        // con. ===================================
                        $sWhere = "";
                        $pr_code = $this->session->userdata('pr_code');
                        if ($pr_code == "") {
                            $sWhere .= "WHERE 1=1 ";
                        } else {
                            $sWhere .= "WHERE pr.id IN (" . $pr_code . ") ";
                        }
                        // ========================================
                        echo getoption("SELECT
                                                    pr.khmer_name,
                                                    pr.id
                                            FROM
                                                    province AS pr
                                            {$sWhere}", "id", "khmer_name", set_value('pro_code', isset($row->pro_code) ? $row->pro_code : ''), true);
                        ?>
                    </select>
                </div>
            </div>

            <!-- district ---------------------------------------------->
            <div class = "form-group" style="display: none;">
                <label for = "dis_code" id="lbl_dis" class = "col-sm-2 control-label"><?= t('ស្រុក ឬខណ្ឌ') ?></label>
                <div class="col-sm-10">
                    <select data-toggle="tooltip" data-placement="left" title="ស្រុក ឬខណ្ឌ​ (ឧ. ខណ្ឌ ចំការមន)" class="form-control"  id="dis_code" placeholder="ស្រុក ឬខណ្ឌ" name="dis_code">
                        <?= getoption("SELECT * FROM district ORDER BY dis_khmer", "dis_code", "dis_khmer", set_value('dis_khmer', isset($row->dis_khmer) ? $row->dis_khmer : ''), true) ?>
                    </select>
                </div>
            </div>

        </div>     

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg" >
                <button data-toggle="tooltip" data-placement="left" title="ស្វែងរក" name="btn_search" id="btn_search" type="button" class="btn btn-default  glyphicon glyphicon-search" value=""> <?= t('ស្វែងរក') ?></button>
                <button data-toggle="tooltip" data-placement="left" title="បោះពុម្ពសៀវភៅ" name="btn_print_book" id="btn_print_book" type="button" class="btn btn-default glyphicon glyphicon-print" value=""> <?= t('បោះពុម្ព') ?></button>
            </div>
        </div>
    </div>    
</form>

<!-- search data ----------------------->
<div id="show_data"></div>

<script type="text/javascript">
    $(function() {

        $('#pro_code').on('change', function() {
            var pro_code = $(this).val();
            if (pro_code != '') {
                $.ajax({
                    url: "<?= site_url('rri/print_book/show_dis') ?>",
                    type: "post",
                    datatype: "html",
                    async: false,
                    data: {pro_code: pro_code},
                    success: function(d) {
                        $('#dis_code').html(d);
                    },
                    error: function() {

                    }
                });
            }
        });

        // search =====================================
        $('body').delegate('#btn_search', 'click', function() {
            var pro_code = $('#pro_code').val();
            var dis_code = $('#dis_code').val();
            var rd_print = $('input[type="radio"]:checked').val() - 0;

            if (pro_code != '') {
                $.ajax({
                    url: "<?= site_url('rri/print_book/search_data') ?>",
                    type: "post",
                    datatype: "html",
                    async: false,
                    data: {pro_code: pro_code, dis_code: dis_code, rd_print: rd_print},
                    success: function(d) {
                        $('#show_data').html(d);
                    },
                    error: function() {

                    }
                });
            } else {
                alert('សូមជ្រើសរើស រាជធានី-ខេត្ត ជាដំបូង !');
                return false;
            }
        });

        // print ===========================================
        $("#btn_print_book").on("click", function() {
            var params = [
                'height=' + screen.height,
                'width=' + screen.width,
                'fullscreen=yes',
                'modal=yes'
            ];
            var divToPrint = document.getElementById('show_data');
            var popupWin = window.open('', '_blank', params); // var popupWin = window.open('', '_blank', 'width=800,height=600'); // width=800,height=500
            popupWin.moveTo(0, 0);
            popupWin.document.open();
            popupWin.document.write('<html><head><title></title></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.print();
            popupWin.close();
        });

        // option print ======================================
        $('input[type="radio"]').on("change", function() {
            var my_rd = $(this).val();
            if (my_rd == 1) {
                $('#dis_code').hide();
                $('#lbl_dis').hide();
            } else {
                $('#dis_code').show();
                $('#lbl_dis').show();
            }
        });

    });

</script>