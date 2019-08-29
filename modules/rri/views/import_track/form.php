<?php
$id = isset($main_id) ? $main_id : 0;

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

<form class="form-horizontal" role="form" action="<?= site_url('rri/roads/insert') ?>" method="post" id="myform">
    <div class="panel panel-default">
        <div class="panel-heading">
            <!-- title -------------------------------->
            <?php if ($id - 0 == 0) { ?>
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូលព័ត៌មានលំអិតខ្សែផ្លូវ') ?></h3>        
            <?php } else { ?>
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូល Track') . ': ' . $pro ?></h3>
            <?php } ?>
            <input type="hidden" class="form-control" value="<?= set_value('road_id', $id) ?>"  id="road_id" placeholder="លេខរៀង" name="road_id" /> 
            <input type="hidden" class="form-control" value="<?= set_value('file_no', isset($row->file_no) ? $row->file_no : '') ?>" id="file_no" name="file_no" />  
        </div>

        <div class="panel-body"> 
            <!-- btn. insert tracks ----------->
            <button type="button" class="btn btn-default imp_track" id="imp_track" style="margin: -10px 0 20px 0;">បញ្ចូល</button>

            <!--label ------------------------->
            <?php
            if ($id - 0 > 0) {
                $tr = '';
                $tr .= '<table border="1" cellspacing="0" cellpadding="5" style="font-size:14px;width: auto;text-align: left;vertical-align: middle;border: 2px solid #DDD;margin: -10px 0 5px 0;">
                            <tbody>';
                $tr .= "<tr>" .
                        "<td>ល.រ: <b>" . $row->idtemp . "</b></td>" .
                        "<td>លេខផ្លូវ: <b>" . $row->road_number . "</b></td>" .
                        "<td>ឈ្មោះផ្លូវ: <b>" . $row->road_name . "</b></td>" .
                        "<td>ប្រភេទផ្លូវ: <b>" . $row->type . "</b></td>" .
                        "<td data-toggle='tooltip' data-placement='top' title='ម៉ែត្រ'>ប្រវែងផ្លូវ: <b>" . $row->length . "</b></td>" .
                        "<td data-toggle='tooltip' data-placement='top' title='ម៉ែត្រ'>ទទឹងផ្លូវ: <b>" . $row->width . "</b></td>" .
                        "<td data-toggle='tooltip' data-placement='top' title='និយាមកាចាប់ផ្តើម'>និ. ផ្តើម: <b>" . $row->first_point_x . ", " . $row->first_point_y . "</b></td>" .
                        "<td data-toggle='tooltip' data-placement='top' title='និយាមកាបញ្ចប់'>និ. បញ្ចប់: <b>" . $row->last_point_x . ", " . $row->last_point_y . "</b></td>" .
                        "</tr>";
                $tr .= '</tbody></table>';
                echo $tr;
            }
            ?>

            <!--tabs general info.-------------------------------->            
            <div id="tabs">
                <ul>
                    <li><a href = "#tabs-1"><?= t('ព័ត៌មានទូទៅ') ?></a></li>
                </ul>
                <!-- road_info -------------------------->
                <div id = "tabs-1">
                    <?php if ($id - 0 > 0) { ?>
                        <div class = "form-group">
                            <label for = "pro_id" class = "col-sm-2 control-label"><?= t('រាជធានី-ខេត្ត') ?></label>
                            <div class="col-sm-10">
                                <select disabled="disabled" data-toggle="tooltip" data-placement="top" title="រាជធានី-ខេត្ត (រាជធានីភ្នំពេញ...)" class="form-control"  id="pro_id" placeholder="" name="pro_id">
                                    <?php ?>
                                    <?php echo getoption("SELECT
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
                    <?php } else {
                        ?>
                        <div class = "form-group">
                            <label for = "pro_id" class = "col-sm-2 control-label"><?= t('រាជធានី-ខេត្ត') ?></label>
                            <div class="col-sm-10">
                                <select disabled="disabled" data-toggle="tooltip" data-placement="top" title="រាជធានី-ខេត្ត (រាជធានីភ្នំពេញ...)" class="form-control"  id="pro_id" placeholder="" name="pro_id">
                                    <?php
                                    // con. =============================
                                    $sWhere = "";
                                    $pr_code = $this->session->userdata('pr_code');
                                    if ($pr_code == "") {
                                        $sWhere .= "WHERE 1=1 ";
                                    } else {
                                        $sWhere .= "WHERE pr.id IN (" . $pr_code . ") ";
                                    }
                                    echo getoption("SELECT
                                                                pr.id,
                                                                pr.khmer_name

                                                        FROM
                                                                province AS pr
                                                        {$sWhere}
                                                        ORDER BY pr.khmer_name ", "id", "khmer_name", set_value('pro_code', isset($row->pro_code) ? $row->pro_code : ''), true);
                                    ?>
                                </select>                        
                            </div>
                        </div>
                    <?php }
                    ?>       

                    <!---------------------------------->
                    <div class = "form-group">
                        <label for = "dis_id" class = "col-sm-2 control-label"><?= t('ស្រុក-ខណ្ឌ') ?></label>
                        <div class="col-sm-10">
                            <select disabled="disabled" data-toggle="tooltip" data-placement="top" title="ស្រុក-ខណ្ឌ (ចំការមន...)" class="form-control"  id="dis_id" placeholder="" name="dis_id">
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
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('លេខផ្លូវ') ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  value="<?= set_value('road_number', isset($row->road_number) ? $row->road_number : '') ?>" id="road_number" placeholder="លេខផ្លូវ" name="road_number" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="road_name" class="col-sm-2 control-label"><?= t('ឈ្មោះផ្លូវ') ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?= set_value('road_name', isset($row->road_name) ? $row->road_name : '') ?>" id="road_name" placeholder="ឈ្មោះផ្លូវ" name="road_name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label"><?= t('ប្រភេទផ្លូវ') ?></label>
                        <div class="col-sm-10">
                            <select disabled="disabled" data-toggle="tooltip" data-placement="top" title="ប្រភេទផ្លូវ (១, ២, ៣ ឬ ៤)" class="form-control"  id="type" placeholder="ប្រភេទផ្លូវ" name="type">
                                <?= getoption("SELECT id, type_road FROM type_road", "id", "type_road", set_value('type', isset($row->type) ? $row->type : ''), true) ?>
                            </select>                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="length" class="col-sm-2 control-label"><?= t('ប្រវែងផ្លូវ') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="top" title="ប្រវែងផ្លូវ (ម៉ែត្រ)" decimal type="text" class="form-control requiress" value="<?= set_value('length', isset($row->length) ? $row->length : '') ?>" id="length" placeholder="ប្រវែងផ្លូវ" name="length" maxlength="11" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="width" class="col-sm-2 control-label"><?= t('ទទឹងផ្លូវ') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="top" title="ទទឹងផ្លូវ (ម៉ែត្រ)" type="text" class="form-control" value="<?= set_value('width', isset($row->width) ? $row->width : '') ?>" id="width" placeholder="ទទឹងផ្លូវ" name="width" maxlength="11" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="first_point_x" class="col-sm-2 control-label"><?= t('និយាមកាចាប់ផ្តើម') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="top" title="X ចាប់ផ្តើម (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)" type="text" class="form-control" value="<?= set_value('first_point_x', isset($row->first_point_x) ? $row->first_point_x : '') ?>"  id="first_point_x" placeholder="X ចាប់ផ្តើម" name="first_point_x" maxlength="6" />
                            <input data-toggle="tooltip" data-placement="top" title="Y ចាប់ផ្តើម (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)" type="text" class="form-control" value="<?= set_value('first_point_y', isset($row->first_point_y) ? $row->first_point_y : '') ?>"  id="first_point_y" placeholder="Y ចាប់ផ្តើម" name="first_point_y" maxlength="7" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_point_x" class="col-sm-2 control-label"><?= t('និយាមកាបញ្ចប់') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="top" title="X បញ្ចប់ (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)" type="text" class="form-control" value="<?= set_value('last_point_x', isset($row->last_point_x) ? $row->last_point_x : '') ?>" id="last_point_x" placeholder="X បញ្ចប់" name="last_point_x" maxlength="6" />
                            <input data-toggle="tooltip" data-placement="top" title="Y បញ្ចប់ (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)" type="text" class="form-control" value="<?= set_value('last_point_y', isset($row->last_point_y) ? $row->last_point_y : '') ?>" id="last_point_y" placeholder="Y បញ្ចប់" name="last_point_y" maxlength="7" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file_name" class="col-sm-2 control-label"><?= t('ឈ្មោះឯកសារ') ?></label>
                        <div class="col-sm-10">
                            <input readonly="true" data-toggle="tooltip" data-placement="top" title="ឈ្មោះឯកសារ (ស្វ័យប្រវត្តិ)" type="text" class="form-control" value="<?= set_value('file_name', isset($row->file_name) ? $row->file_name : '') ?>" id="file_name" placeholder="ឈ្មោះឯកសារ" name="file_name" />
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="note" class="col-sm-2 control-label"><?= t('សម្គាល់') ?></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="note" id="note" rows="2" placeholder="សម្គាល់"><?= set_value('note', isset($row->note) ? $row->note : '') ?></textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="panel-footer" style="text-align: right;">          
            <div class="btn-group btn-group-lg">
                <?php if ($id - 0 > 0) { ?>
                    <button data-toggle="tooltip" data-placement="top" title="ភ្ជាប់ទៅ Google maps" name="btn_map" id="btn_map" type="button" class="btn btn-default glyphicon glyphicon-paperclip"> <?= t('ផែនទី') ?></button>
                    <button data-toggle="tooltip" data-placement="top" title="ត្រលប់ក្រោយ" id="back" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left"> <?= t('&nbsp;') ?></button>                   
                <?php } ?>
            </div>
        </div>

    </div>

</form>

<!-- dialog -------------------->
<form id="uploadForm" class="form-horizontal" action="<?= site_url('rri/import_track/read_file') ?>" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="exampleModalLabel">បញ្ចូល Tracks តាម Excel...</h3>
                    <input type="hidden" name="r_id" id="r_id" class="r_id" value="<?= set_value('road_id', isset($id) ? $id : '') ?>" />
                    <input type="hidden" name="pro_id" id="pro_id" class="pro_id" value="<?= set_value('pro_id', isset($pro_id) ? $pro_id : '') ?>" />                    
                </div>
                <div class="modal-body">
                    <form>
                        <div id="alert_msg"></div>
                        <div class="form-group">
                            <label for="excel_file" class="control-label">ជ្រើសរើស Excel file</label>
                            <input required type="file" class="form-control excel_file" placeholder="ជ្រើសរើសទីតាំងបញ្ចូល" name="excel_file" id="excel_file" accept="application/vnd.ms-excel" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="imp_ok">នាំចូល</button>      
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function() {

        // diag. =========================
        $('#imp_track').on('click', function() {
            $("#alert_msg").hide();
            $('#excel_file').val('');
            $('#exampleModal').modal({
            });
        });

        // import tracks ===================
        $("#uploadForm").on('submit', (function(e) {
            // e.preventDefault();
            $.ajax({
                url: "<?= site_url('rri/import_track/read_file') ?>",
                type: "post",
                datatype: "html",
                data: new FormData(this),
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $("#alert_msg").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>" + data + "</strong></div>");
                    $('#excel_file').val('');
                    $("#alert_msg").show();
                },
                error: function() {
                    alert('File មិនអាចបញ្ចុលបាន!');
                }
            });
            return false;
        }));

        $('#back').on('click', function() {
            // window.location = '<?= site_url('rri/roads/index') ?>';
            window.location = 'javascript:history.go(-1)';
        });

        // over =========================
        $("body").delegate("", "mouseover", function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $("#tabs").tabs();

        $('#btn_map').on('click', function() {
            var road_id = $('#r_id').val() - 0;
            if (road_id > 0) {
                window.location = '<?= site_url('rri/link_map/index') ?>/' + encodeURIComponent(road_id);
            } else {
                return false;
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
                return true;
            }
        }

        $('#excel_file').on('change', function() {
            checkfile(this);
        });


    });// end ready fun. ===================
</script>