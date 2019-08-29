<?php
$id = isset($main_id) ? $main_id : 0;
$file_no = isset($row->file_no) ? $row->file_no : '';

// get province =============================
$pro_id = isset($row->pro_id) ? $row->pro_id : '';
$qr_pro = query("SELECT
                                p.id,
                                p.khmer_name
                        FROM
                                province AS p
                        WHERE
                                p.id = '{$pro_id}' ");

$pro = '';
if ($qr_pro->num_rows() > 0) {
    if ($row->pro_id == '19') {
        $pro .= 'រាជធានី ' . ($qr_pro->row()->khmer_name ? $qr_pro->row()->khmer_name : '');
    } else {
        $pro .= 'ខេត្ត ' . ($qr_pro->row()->khmer_name ? $qr_pro->row()->khmer_name : '');
    }
}
?>

<form class="form-horizontal" role="form" action="<?= site_url('rri/import_track/import_tracks') ?>" method="post" enctype="multipart/form-data"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូល Track: ') . "លេខរៀង $file_no $pro" ?></h3>
            <input type="hidden" value="<?= $id ?>" name="id">
        </div>

        <div class="panel-body">
            <!-- success ------------------->
            <?php
            $validation_errors = validation_errors();
            if ($validation_errors != '') {
                echo '<div class="alert alert-success">' . $validation_errors . '</div>';
            }
            if (isset($failedlogin)) {
                echo '<div class="alert alert-success">' . $failedlogin . '</div>';
            }
            ?>
            <!-- unsuccess --------------->
            <?php
            $validation_errors1 = validation_errors();
            if ($validation_errors1 != '') {
                echo '<div class="alert alert-danger">' . $validation_errors1 . '</div>';
            }
            if (isset($failedlogin1)) {
                echo '<div class="alert alert-danger">' . $failedlogin1 . '</div>';
            }
            ?>
            <div class = "form-group">
                <label for = "pro_id" class = "col-sm-2 control-label"><?= t('រាជធានី-ខេត្ត') ?></label>
                <div class="col-sm-10">
                    <select data-toggle="tooltip" data-placement="left" title="រាជធានី-ខេត្ត (ឧ.​ រាជធានីភ្នំពេញ...)" required class="form-control"  id="pro_id" placeholder="ប្រភេទផ្លូវ" name="pro_id">
                        <?php
                        /*
                          // con. ===================================
                          $sWhere = "";
                          $pr_code = $this->session->userdata('pr_code');
                          if ($pr_code == "") {
                          $sWhere .= "WHERE 1=1 ";
                          } else {
                          $sWhere .= "WHERE pr.id IN (" . $pr_code . ") ";
                          }
                          ========================================
                          echo getoption("SELECT
                          pr.khmer_name,
                          pr.id
                          FROM
                          province AS pr
                          WHERE
                          pr.id = '{$pro_id}' ORDER BY pr.khmer_name", "id", "khmer_name", set_value('pro_code', isset($row->pro_code) ? $row->pro_code : ''), true);
                         */
                        ?>
                        <?php ?>
                        <?php
                        echo getoption("SELECT
                                                    pr.id,
                                                    pr.khmer_name
                                            FROM
                                                    province AS pr
                                            WHERE
                                                    pr.id = '{$pro_id}'
                                            ORDER BY
                                                    pr.khmer_name ", "id", "khmer_name", set_value('pro_id', isset($row->pro_id) ? $row->pro_id : ''), true);
                        ?>
                        <?php ?>
                    </select>                        
                </div>
            </div>
            <div class = "form-group">
                <label for = "dis_id" class = "col-sm-2 control-label"><?= t('ស្រុក-ខណ្ឌ') ?></label>
                <div class="col-sm-10">
                    <select disabled="disabled" data-toggle="tooltip" data-placement="left" title="រាជធានី-ខេត្ត (ឧ.​ រាជធានីភ្នំពេញ...)" class="form-control"  id="dis_id" placeholder="ប្រភេទផ្លូវ" name="dis_id">
                        <?php ?>
                        <?php
                        // get district ===========================
                        echo getoption1("SELECT
                                                    d.pro_code,
                                                    d.dis_code,
                                                    d.dis_khmer,
                                                    d.dis_name
                                            FROM
                                                    district AS d
                                            WHERE
                                                    d.pro_code = '{$row->pro_id}'
                                            ORDER BY 
                                                    d.dis_khmer ", "dis_code", "dis_khmer", "dis_name", set_value('dis_id', isset($row->dis_id) ? $row->dis_id : ''), true);
                        ?>
                        <?php ?>
                    </select>                        
                </div>
            </div>
            <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label"><?= t('ជ្រើសរើសឯកសារ') ?></label>
                <div class="col-sm-10">
                    <input required type="file" class="form-control" placeholder="ជ្រើសរើសទីតាំងបញ្ចូល" name="excel_file" id="excel_file" accept="application/vnd.ms-excel" />
                </div>
            </div>
        </div>

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg">
                <button name="submit" type="submit" id="btn_s" class="btn btn-default glyphicon glyphicon-save" value="save"> <?= t('បញ្ចូល') ?></button>
                <button data-toggle="tooltip" data-placement="top" title="ត្រលប់ក្រោយ" id="back" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left"> <?= t('&nbsp;') ?></button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function() {
        
        $('#btn_s').on('click',function(e){
            alert(0);
            // return false;
        });

        // back =============================
        $('#back').on('click', function() {
            // window.location = '<?= site_url('rri/roads/index') ?>';
            window.location = 'javascript:history.go(-1)';
        });

        // alert and show province ==================
        $('#pro_id').on('change', function() {
            pro_id = $(this).val();
            if (pro_id != '') {
                // province ========================
                $.ajax({
                    url: "<?= site_url('rri/imports/show_pro') ?>",
                    type: "post",
                    datatype: "json",
                    async: false,
                    data: {pro_id: pro_id},
                    success: function(data) {
                        var opt = '';
                        if (data.length > 0) {
                            $.each(data, function(i, item) {
                                opt += "<option value='" + item.dis_code + "'>" + item.dis_khmer + "</option>";
                            });
                        }
                        $('#dis_id').html(opt);

                    },
                    error: function() {

                    }
                });
            }
        });

        // check extens =====================
        function checkfile(sender) {
            var validExts = new Array(".xls");
            var fileExt = sender.value;
            fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
            if (validExts.indexOf(fileExt) < 0) {
                alert("ជ្រើសរើសបានតែ xls !");
                $('#excel_file').val('');
                return false;
            } else {
                return true;
            }
        }

        $('#excel_file').on('change', function() {
            checkfile(this);
        });

    });
</script>