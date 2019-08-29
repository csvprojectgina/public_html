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
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/edit_road_detail.gif') ?>" /> <?= t('កែព័ត៌មានលំអិតខ្សែផ្លូវ') . ': ' . $pro ?></h3>
            <?php } ?>
            <input type="hidden" class="form-control" value="<?= set_value('road_id', $id) ?>"  id="road_id" placeholder="លេខរៀង" name="road_id" /> 
            <input type="hidden" class="form-control" value="<?= set_value('file_no', isset($row->file_no) ? $row->file_no : '') ?>" id="file_no" name="file_no" />  
        </div>

        <div class="panel-body"> 
            <!--message ---------------------------->
            <?php
            $validation_errors = validation_errors();
            if ($validation_errors != '') {
                echo '<div class="alert alert-danger">' . $validation_errors . '</div>';
            }
            if (isset($failedlogin)) {
                echo '<div class="alert alert-danger">' . $failedlogin . '</div>';
            }
            ?>

            <!--label --------------------------------->
            <?php
            if ($id - 0 > 0) {
                $tr = '';
                $tr .= '<table border="1" cellspacing="0" cellpadding="5" style="font-size:14px;width: auto;text-align: left;vertical-align: middle;border: 2px solid #DDD;margin: -10px 0 5px 0;">
                            <tbody>';
                $tr .= "<tr>" .
                        "<td>ល.រ: <b>" . (isset($row->idtemp) ? $row->idtemp : '') . "</b></td>" .
                        "<td>លេខផ្លូវ: <b>" . (isset($row->road_number) ? $row->road_number : '') . "</b></td>" .
                        "<td>ឈ្មោះផ្លូវ: <b>" . (isset($row->road_name) ? $row->road_name : '') . "</b></td>" .
                        "<td>ប្រភេទផ្លូវ: <b>" . (isset($row->type) ? $row->type : '') . "</b></td>" .
                        "<td data-toggle='tooltip' data-placement='top' title='ម៉ែត្រ'>ប្រវែងផ្លូវ: <b>" . (isset($row->length) ? $row->length : '') . "</b></td>" .
                        "<td data-toggle='tooltip' data-placement='top' title='ម៉ែត្រ'>ទទឹងផ្លូវ: <b>" . (isset($row->width) ? $row->width : '') . "</b></td>" .
                        "<td data-toggle='tooltip' data-placement='top' title='និយាមកាចាប់ផ្តើម'>និ. ផ្តើម: <b>" . (isset($row->first_point_x) ? $row->first_point_x : '') . ", " . (isset($row->first_point_y) ? $row->first_point_y : '') . "</b></td>" .
                        "<td data-toggle='tooltip' data-placement='top' title='និយាមកាបញ្ចប់'>និ. បញ្ចប់: <b>" . (isset($row->last_point_x) ? $row->last_point_x : '') . ", " . (isset($row->last_point_y) ? $row->last_point_y : '') . "</b></td>" .
                        "</tr>";
                $tr .= '</tbody></table>';
                echo $tr;
            }
            ?>

            <!--tabs general info.--------------------------->
            <div id="tabs">
                <ul>
                    <li><a href = "#tabs-1"><?= t('ព័ត៌មានទូទៅ') ?></a></li>
                    <li><a href = "#tabs-2"><?= t('ទីតាំងភូមិសាស្ត្') ?>រ</a></li>
                    <li><a href = "#tabs-3"><?= t('សំណង់សិល្បការ') ?></a></li>
                    <li><a href = "#tabs-4"><?= t('សំណង់សាធារណៈ') ?></a></li>
                    <li><a href = "#tabs-5"><?= t('ប្រវត្តិផ្លូវ') ?></a></li>
                    <li><a href = "#tabs-6"><?= t('កម្រាល') ?></a></li>
                </ul>
                <!-- road_info ------------------------------>
                <div id = "tabs-1">
                    <?php if ($id - 0 > 0) { ?>
                        <div class = "form-group">
                            <label for = "pro_id" class = "col-sm-2 control-label"><?= t('រាជធានី-ខេត្ត') ?></label>
                            <div class="col-sm-10">
                                <select data-toggle="tooltip" data-placement="top" title="រាជធានី-ខេត្ត (រាជធានីភ្នំពេញ...)" validate_act class="form-control"  id="pro_id" placeholder="" name="pro_id">
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
                    <?php } else {
                        ?>
                        <div class = "form-group">
                            <label for = "pro_id" class = "col-sm-2 control-label"><?= t('រាជធានី-ខេត្ត') ?></label>
                            <div class="col-sm-10">
                                <select data-toggle="tooltip" data-placement="top" title="រាជធានី-ខេត្ត (រាជធានីភ្នំពេញ...)" validate_act class="form-control"  id="pro_id" placeholder="" name="pro_id">
                                    <?php
                                    // con. ===================
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
                        <label for = "dis_id" class = "col-sm-2 control-label"><?= t('ក្រុង-ស្រុក-ខណ្ឌ') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="top" title="ស្រុក-ខណ្ឌ (ចំការមន...)" validate_act class="form-control"  id="dis_id" placeholder="" name="dis_id">
                                <?php ?>
                                <?php
                                // get district ====================
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
                            <input type="text" validate_act class="form-control" value="<?= set_value('road_number', isset($row->road_number) ? $row->road_number : '') ?>" id="road_number" placeholder="លេខផ្លូវ" name="road_number" />
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
                            <select data-toggle="tooltip" data-placement="top" title="ប្រភេទផ្លូវ (១, ២, ៣ ឬ ៤)" validate_act class="form-control"  id="type" placeholder="ប្រភេទផ្លូវ" name="type">
                                <?= getoption("SELECT id, type_road FROM type_road", "id", "type_road", set_value('type', isset($row->type) ? $row->type : ''), true) ?>
                            </select>                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="length" class="col-sm-2 control-label"><?= t('ប្រវែងផ្លូវ') ?></label>
                        <div class="col-sm-10">
                            <input data-max="1000000" data-toggle="tooltip" data-placement="top" title="ប្រវែងផ្លូវ (ម៉ែត្រ)" decimal type="text" validate_act class="form-control requiress"  value="<?= set_value('length', isset($row->length) ? $row->length : '') ?>" id="length" placeholder="ប្រវែងផ្លូវ" name="length" maxlength="11" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="width" class="col-sm-2 control-label"><?= t('ទទឹងផ្លូវ') ?></label>
                        <div class="col-sm-10">
                            <input data-max="50" data-toggle="tooltip" data-placement="top" title="ទទឹងផ្លូវ (ម៉ែត្រ)" decimal type="text" class="form-control"  value="<?= set_value('width', isset($row->width) ? $row->width : '') ?>" id="width" placeholder="ទទឹងផ្លូវ" name="width" maxlength="11" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="first_point_x" class="col-sm-2 control-label"><?= t('និយាមកាចាប់ផ្តើម') ?></label>
                        <div class="row">
                            <div class="col-sm-1" style="width: 0.5%;margin: 7px -10px 0 0;">X</div>
                            <div class="col-sm-4">
                                <input data-toggle="tooltip" data-placement="top" title="X ចាប់ផ្តើម (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)" number type="text" class="form-control" value="<?= set_value('first_point_x', isset($row->first_point_x) ? $row->first_point_x : '') ?>" id="first_point_x" placeholder="X ចាប់ផ្តើម" name="first_point_x" maxlength="6" />
                            </div>
                            <div class="col-sm-1" style="width: 0.5%;margin: 7px -10px 0 0;">Y</div>
                            <div class="col-sm-4">
                                <input data-toggle="tooltip" data-placement="top" title="Y ចាប់ផ្តើម (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)" number type="text" class="form-control" value="<?= set_value('first_point_y', isset($row->first_point_y) ? $row->first_point_y : '') ?>" id="first_point_y" placeholder="Y ចាប់ផ្តើម" name="first_point_y" maxlength="7" />
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="first_point_x" class="col-sm-2 control-label"><?= t('និយាមកាបញ្ចប់') ?></label>
                        <div class="row">
                            <div class="col-sm-1" style="width: 0.5%;margin: 7px -10px 0 0;">X</div>
                            <div class="col-sm-4">
                                <input data-toggle="tooltip" data-placement="top" title="X បញ្ចប់ (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)" number type="text" class="form-control" value="<?= set_value('last_point_x', isset($row->last_point_x) ? $row->last_point_x : '') ?>" id="last_point_x" placeholder="X បញ្ចប់" name="last_point_x" maxlength="6" />              
                            </div>
                            <div class="col-sm-1" style="width: 0.5%;margin: 7px -10px 0 0;">Y</div>
                            <div class="col-sm-4">
                                <input data-toggle="tooltip" data-placement="top" title="Y បញ្ចប់ (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)" number type="text" class="form-control" value="<?= set_value('last_point_y', isset($row->last_point_y) ? $row->last_point_y : '') ?>" id="last_point_y" placeholder="Y បញ្ចប់" name="last_point_y" maxlength="7" >
                            </div>
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
                            <textarea class="form-control" name="note" id="note" rows="3" placeholder="សម្គាល់"><?= set_value('note', isset($row->note) ? $row->note : '') ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- geography -------------------------------->
                <div id="tabs-2" style="overflow-x: scroll;">
                    <table cellpadding="0" cellspacing="0" border="1"​ class="table table-striped table-bordered" id="tbl_geography">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('#') ?></th>
                                <th style="text-align: center;width: 30%;"><?= t('ក្រុង-ស្រុក-ខណ្ឌ') ?></th>
                                <th style="text-align: center;width: 30%;"><?= t('ឃុំ-សង្កាត់') ?></th>
                                <th style="text-align: center;width: 30%;"><?= t('ភូមិ-ក្រុម') ?></th>
                                <th style="text-align: center;width: 8%;"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="បន្ថែមព័ត៌មានទីតាំងភូមិសាស្ត្រ" id ="lbl_addrow_geography"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /><?= t('បន្ថែម​') ?></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($id - 0 == 0) {
                                ?>
                                <tr>
                                    <td class="g_no" style="text-align: center;" class="auto_id">1</td>
                                    <td><input class="form-control district" type="text" name="district[]" id="district" placeholder="ស្រុក" maxlength="255" /></td>
                                    <td><input class="form-control comm" type="text" name="commune[]" id="commune" placeholder="ឃុំ" maxlength="255" /></td>
                                    <td><input class="form-control vi" type="text" name="village[]" id="village" placeholder="ភូមិ" maxlength="255" /></td>
                                    <td style="text-align: center;"><a href="javascript:void(0)" id="lbl_remove">លុប</a><input class="form-control geo_id" type="hidden" name="geo_id[]" id="geo_id" placeholder="លេខរៀង" maxlength="11" /></td>
                                </tr>
                                <?php
                            } else {
                                $qr_geo = query("SELECT
                                                            *
                                                    FROM
                                                            geography AS g
                                                    WHERE
                                                            g.road_id = '{$id}'
                                                    ORDER BY
                                                            g.district ");
                                if ($qr_geo->num_rows() > 0) {
                                    $i = 1;
                                    foreach ($qr_geo->result() as $row) {
                                        echo "<tr>" .
                                        "<td class='g_no' style='text-align: center; width: 30px;' class='auto_id'>" . $i . "</td>" .
                                        "<td><input type='text' class='form-control district' name='district[]' id='district' placeholder='ស្រុក' value='{$row->district}' /></td>" .
                                        "<td><input type='text' class='form-control comm' name='commune[]' id='commune' placeholder='ឃុំ' value='{$row->commune}' /></td>" .
                                        "<td><input type='text' class='form-control vi' name='village[]' id='village' placeholder='ភូមិ' value='{$row->village}' /></td>" .
                                        "<td style='text-align: center; width: 110px;'><a href='javascript:void(0)' id='lbl_remove'>លុប</a><input class='form-control geo_id' type='hidden' name='geo_id[]' id='geo_id' maxlength='11' value='$row->geo_id' /></td>" .
                                        "</tr>";
                                        $i++;
                                    }
                                } else {
                                    echo '<tr>
                                                <td class="g_no" style="text-align: center;" class="auto_id">1</td>
                                                <td><input class="form-control district" type="text" name="district[]" id="district" placeholder="ស្រុក" maxlength="255" /></td>
                                                <td><input class="form-control comm" type="text" name="commune[]" id="commune" placeholder="ឃុំ" maxlength="255" /></td>
                                                <td><input class="form-control vi" type="text" name="village[]" id="village" placeholder="ភូមិ" maxlength="255" /></td>
                                                <td style="text-align: center;"><a href="javascript:void(0)" id="lbl_remove">លុប</a><input class="form-control geo_id" type="hidden" name="geo_id[]" id="geo_id" placeholder="លេខរៀង" maxlength="11" /></td>
                                            </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- art_building ----------------------------->
                <div id="tabs-3" style="overflow-x: scroll;">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tbl_art_building" style="width: 100%;vertical-align: middle;">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('#') ?></th>
                                <th style="text-align: center;width: 15%;"><?= t('ប្រភេទ') ?></th>
                                <th style="text-align: center;width: 8%;"><?= t('មុខ') ?></th>

                                <th style="text-align: center;width: 12%;"><?= t('ប្រវែង-ទំ​ហំ') ?></th>
                                <!---------------------->
                                <th style="text-align: center;width: 10%;"><?= t('ប្រវែង (ម)') ?></th>
                                <th style="text-align: center;width: 10%;"><?= t('ទទឹង (ម)') ?></th>
                                <th style="text-align: center;width: 10%;"><?= t('កំពស់ (ម)') ?></th>
                                <!---------------------->
                                <th style="text-align: center;"><?= t('ស្ថាន​​ភាព') ?></th>
                                <th style="text-align: center;" colspan="2"><?= t('និ​​យាម​​កា (X, Y)') ?></th>
                                <th style="text-align: center;width: 8%;"><a href="javascript:void(0)" id="lbl_add_art_building" data-toggle="tooltip" data-placement="top" title="បន្ថែមព័ត៌មានសំណង់សិល្បការ"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /><?= t('បន្ថែម​​') ?></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($id - 0 == 0) {
                                ?>
                                <tr>
                                    <td class="a_no" style="text-align: center;">1</td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="ប្រភេទ (លូមូលមុខមួយ...)"​ class="form-control type_building_art" type="text" name="type_building_art[]" id="type_building_art" placeholder="ប្រភេទ" maxlength="255" /></td>
                                    <!---------------------------->
                                    <td>
                                        <select data-toggle="tooltip" data-placement="top" title="មុខ"​ class="form-control art_char" type="text" name="art_char[]" id="art_char" class="art_char">
                                        </select>
                                    </td>
                                    <!---------------------------->    
                                    <td><input data-toggle="tooltip" data-placement="top" title="ប្រវែង-ទំហំ (L × W [× H])"​ class="form-control dimension" type="text" name="dimension_building_art[]" id="dimension_building_art" placeholder="ប្រវែង-ទំហំ" maxlength="255" /></td>
                                    <!---------------------------->
                                    <td><input data-toggle="tooltip" data-placement="top" title="ប្រវែងសំណង់ (ម)"​ decimal class="form-control" type="text" name="l_art[]" id="l_art" placeholder="ប្រវែង" maxlength="11" /></td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="ទទឹងសំណង់ (ម)"​ decimal class="form-control" type="text" name="w_art[]" id="w_art" placeholder="ទទឹង" maxlength="11" /></td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="កំពស់សំណង់ (ម)"​ decimal class="form-control" type="text" name="h_art[]" id="h_art" placeholder="កំពស់" maxlength="11" /></td>
                                    <!---------------------------->
                                    <td><input data-toggle="tooltip" data-placement="top" title="ស្ថានភាព (ល្អ = 1, មធ្យម = 2, ខូច = 3)"​ class="form-control" number type="text" name="quality_building_art[]" id="quality_building_art" placeholder="ស្ថានភាព" maxlength="255" /></td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="អាប់ស៊ីស X (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)"​ class="form-control" number type="text" name="position_x_building_art[]" id="position_x_building_art" placeholder="X" maxlength="6" /></td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="អរដោនេរ Y  (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)"​ class="form-control" number type="text" name="position_y_building_art[]" id="position_y_building_art" placeholder="Y" maxlength="7" /></td>
                                    <td style="text-align: center;"><a href="javascript:void(0)" id="lbl_remove_art">លុប</a><input class="form-control art_id" type="hidden" name="art_id[]" id="art_id" placeholder="លេខរៀង" maxlength="255" /></td>
                                </tr>
                                <?php
                            } else {
                                $qr_art = query("SELECT
                                                            *
                                                    FROM
                                                            art_building AS a
                                                    WHERE
                                                            a.road_id = '{$id}'
                                                    ORDER BY
                                                            a.type_building_art ");
                                if ($qr_art->num_rows() > 0) {
                                    $i = 1;
                                    foreach ($qr_art->result() as $row) {
                                        echo "<tr>" .
                                        "<td class='a_no' style='text-align: center;'>" . $i . "</td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='ប្រភេទ (លូមូលមុខមួយ...)'​ class='form-control type_building_art' type='text' name='type_building_art[]' id='type_building' value='{$row->type_building_art}' placeholder='ប្រភេទ' maxlength='255' /></td>" .
                                        "<td><select data-toggle='tooltip' data-placement='top' title='មុខ'​ class='form-control art_char' type='text' name='art_char[]' id='art_char' class='art_char'>
                                        </select></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='ប្រវែង-ទំហំ (L × W [× H])'​ class='form-control dimension' type='text' name='dimension_building_art[]' id='dimension_building_art' value='{$row->dimension_building_art}' placeholder='ប្រវែង-ទំហំ' maxlength='255' /></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='ប្រវែងសំណង់ (ម)'​ decimal class='form-control' type='text' name='l_art[]' id='l_art' value='{$row->l_art}' placeholder='ប្រវែង'  maxlength='11' /></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='ទទឹងសំណង់ (ម)'​ decimal class='form-control' type='text' name='w_art[]' id='w_art' value='{$row->w_art}' placeholder='ទទឹង' maxlength='11' /></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='កំពស់សំណង់ (ម)'​ decimal class='form-control' type='text' name='h_art[]' id='h_art' value='{$row->h_art}' placeholder='កំពស់' maxlength='11' /></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='ស្ថានភាព (ល្អ = 1, មធ្យម = 2, ខូច = 3)'​ class='form-control' number type='text' name='quality_building_art[]' id='quality_building_art' value='{$row->quality_building_art}' placeholder='ស្ថានភាព' maxlength='255' /></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='អាប់ស៊ីស X (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)'​ class='form-control' decimal type='text' name='position_x_building_art[]' id='position_x_building_art' value='{$row->position_x_building_art}' placeholder='X' maxlength='6' /></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='អរដោនេរ Y  (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)'​ class='form-control' decimal type='text' name='position_y_building_art[]' id='position_y_building_art' value='{$row->position_y_building_art}' placeholder='Y' maxlength='7' /></td>" .
                                        "<td style='text-align: center;'><a href='javascript:void(0)' id='lbl_remove_art'>លុប</a><input class='form-control art_id' type='hidden' name='art_id[]' id='art_id' value='{$row->art_id}' placeholder='លេខរៀង' maxlength='255' /></td>" .
                                        "</tr>";
                                        $i++;
                                    }
                                } else {
                                    echo '<tr>
                                            <td class="a_no" style="text-align: center;">1</td>
                                            <td><input data-toggle="tooltip" data-placement="top" title="ប្រភេទ (លូមូលមុខមួយ...)"​ class="form-control type_building_art" type="text" name="type_building_art[]" id="type_building_art" placeholder="ប្រភេទ" maxlength="255" /></td>
                                            
                                            <td>
                                                <select data-toggle="tooltip" data-placement="top" title="មុខ" class="form-control art_char" type="text" name="art_char[]" id="art_char" class="art_char">
                                                </select>
                                            </td>

                                            <td><input data-toggle="tooltip" data-placement="top" title="ប្រវែង-ទំហំ (L × W [× H])"​ class="form-control dimension" type="text" name="dimension_building_art[]" id="dimension_building_art" placeholder="ប្រវែង-ទំហំ" maxlength="255" /></td>
                                            <td><input data-toggle="tooltip" data-placement="top" title="ប្រវែងសំណង់ (ម)"​ decimal class="form-control" type="text" name="l_art[]" id="l_art" placeholder="ប្រវែង" maxlength="11" /></td>
                                            <td><input data-toggle="tooltip" data-placement="top" title="ទទឹងសំណង់ (ម)"​ decimal class="form-control" type="text" name="w_art[]" id="w_art" placeholder="ទទឹង" maxlength="11" /></td>
                                            <td><input data-toggle="tooltip" data-placement="top" title="កំពស់សំណង់ (ម)"​ decimal class="form-control" type="text" name="h_art[]" id="h_art" placeholder="កំពស់" maxlength="11" /></td>
                                            <td><input data-toggle="tooltip" data-placement="top" title="ស្ថានភាព (ល្អ = 1, មធ្យម = 2, ខូច = 3)"​ number class="form-control" type="text" name="quality_building_art[]" id="quality_building_art" placeholder="ស្ថានភាព" maxlength="255" /></td>
                                            <td><input data-toggle="tooltip" data-placement="top" title="អាប់ស៊ីស X (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)"​ class="form-control" number type="text" name="position_x_building_art[]" id="position_x_building_art" placeholder="X" maxlength="6" /></td>
                                            <td><input data-toggle="tooltip" data-placement="top" title="អរដោនេរ Y  (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)"​ class="form-control" number type="text" name="position_y_building_art[]" id="position_y_building_art" placeholder="Y" maxlength="7" /></td>
                                            <td style="text-align: center;"><a href="javascript:void(0)" id="lbl_remove_art">លុប</a><input class="form-control art_id" type="hidden" name="art_id[]" id="art_id" placeholder="លេខរៀង" maxlength="255" /></td>
                                        </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- pub_building ---------------------------------->
                <div id="tabs-4" style="overflow-x: scroll;">
                    <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="tbl_pub_building">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('#') ?></th>
                                <th style="text-align: center;"><?= t('ប្រភេទសំណង់') ?></th>
                                <th style="text-align: center;"><?= t('ឈ្មោះសំណង់') ?></th>
                                <th style="text-align: center;" colspan="2"><?= t('និយាមកា (X, Y)') ?></th>
                                <th style="text-align: center;"><?= t('ទិស') ?></th>
                                <th style="text-align: center;width: 80px;"><a href="javascript:void(0)" id="lbl_add_pub_building" data-toggle="tooltip" data-placement="top" title="បន្ថែមព័ត៌មានសំណង់សាធារណៈ"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /><?= t('បន្ថែម') ?></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($id - 0 == 0) {
                                ?>
                                <tr>
                                    <td class="pu_no" style="text-align: center;">1</td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="ប្រភេទសំណង់​ (វត្ត មន្ទីរពេទ្យ...)"​ class="form-control type_building" type="text" name="type_building[]" id="type_building" placeholder="ប្រភេទសំណង់" maxlength="255" /></td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="ឈ្មោះសំណង់​ (ឧ. សាលាបឋមសិក្សា(ក)...)"​ class="form-control" type="text" name="name_building[]" id="name_building" placeholder="ឈ្មោះសំណង់" maxlength="255" /></td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="អាប់ស៊ីស X (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)"​ class="form-control" number type="text" name="position_x[]" id="position_x" placeholder="X" maxlength="6" /></td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="អរដោនេរ Y  (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)"​ class="form-control" number type="text" name="position_y[]" id="position_y" placeholder="Y" maxlength="7" /></td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="ទិស (លិច កើត​ ជើង ត្បូង)"​ class="form-control direction" type="text" name="direction[]" id="direction" placeholder="ទិស" maxlength="255" /></td>
                                    <td style="text-align: center;"><a href="javascript:void(0)" id="lbl_remove_pub">លុប</a><input class="form-control pub_id" type="hidden" name="pub_id[]" id="pub_id" placeholder="លេខរៀង" maxlength="255" /></td>
                                </tr>
                                <?php
                            } else {
                                $qr_pub = query("SELECT
                                                            *
                                                    FROM
                                                            public_building AS p
                                                    WHERE
                                                            p.road_id = '{$id}'
                                                    ORDER BY
                                                            p.type_building ");
                                if ($qr_pub->num_rows() > 0) {
                                    $i = 1;
                                    foreach ($qr_pub->result() as $row) {
                                        echo "<tr>" .
                                        "<td class='pu_no' style='text-align: center;'>" . $i . "</td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='ប្រភេទសំណង់​ (វត្ត មន្ទីរពេទ្យ...)'​ class='form-control type_building' type='text' name='type_building[]' id='type_building' value='{$row->type_building}' placeholder='ប្រភេទសំណង់់​​' maxlength='255' /></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='ឈ្មោះសំណង់​ (ឧ. សាលាបឋមសិក្សា(ក)...)'​ class='form-control' type='text' name='name_building[]' id='name_building' value='{$row->name_building}' placeholder='ឈ្មោះសំណង់' maxlength='255' /></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='អាប់ស៊ីស X (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)'​ class='form-control' type='text' name='position_x[]' id='position_x' value='{$row->position_x}' placeholder='X' maxlength='6' /></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='អរដោនេរ Y  (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)'​ class='form-control' type='text' name='position_y[]' id='position_y' value='{$row->position_y}' placeholder='Y' maxlength='7' /></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='ទិស (លិច កើត​ ជើង ត្បូង)'​ class='form-control direction' type='text' name='direction[]' id='direction' value='{$row->direction}' placeholder='ទិស' maxlength='255' /></td>" .
                                        "<td style='text-align: center;'><a href='javascript:void(0)' id='lbl_remove_pub'>លុប</a><input class='form-control pub_id' type='hidden' name='pub_id[]' id='pub_id' value='{$row->pub_id}' placeholder='លេខរៀង' maxlength='255' /></td>" .
                                        "</tr>";
                                        $i++;
                                    }
                                } else {
                                    echo '<tr>
                                                <td class="pu_no" style="text-align: center;">1</td>
                                                <td><input data-toggle="tooltip" data-placement="top" title="ប្រភេទសំណង់​ (វត្ត មន្ទីរពេទ្យ...)"​ class="form-control type_building" type="text" name="type_building[]" id="type_building" placeholder="ប្រភេទសំណង់" maxlength="255" /></td>
                                                <td><input data-toggle="tooltip" data-placement="top" title="ឈ្មោះសំណង់​ (ឧ. សាលាបឋមសិក្សា(ក)...)"​ class="form-control" type="text" name="name_building[]" id="name_building" placeholder="ឈ្មោះសំណង់" maxlength="255" /></td>
                                                <td><input data-toggle="tooltip" data-placement="top" title="អាប់ស៊ីស X (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)"​ class="form-control" number type="text" name="position_x[]" id="position_x" placeholder="X" maxlength="6" /></td>
                                                <td><input data-toggle="tooltip" data-placement="top" title="អរដោនេរ Y  (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)"​ class="form-control" number type="text" name="position_y[]" id="position_y" placeholder="Y" maxlength="7" /></td>
                                                <td><input data-toggle="tooltip" data-placement="top" title="ទិស (លិច កើត​ ជើង ត្បូង)"​ class="form-control direction" type="text" name="direction[]" id="direction" placeholder="ទិស" maxlength="255" /></td>
                                                <td style="text-align: center;"><a href="javascript:void(0)" id="lbl_remove_pub">លុប</a><input class="form-control pub_id" type="hidden" name="pub_id[]" id="pub_id" placeholder="លេខរៀង" maxlength="255" /></td>
                                            </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- history --------------------------------->
                <div id="tabs-5" style="overflow-x: scroll;">
                    <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="tbl_history">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('#') ?></th>
                                <th style="text-align: center;"><?= t('សកម្ម​ភាព') ?></th>
                                <th style="text-align: center;"><?= t('ឆ្នាំ') ?></th>
                                <th style="text-align: center;"><?= t('អនុ​វត្តដោយ') ?></th>
                                <th style="text-align: center;"><?= t('ប្រ​ភព​ថវិកា') ?></th>
                                <th style="text-align: center;width: 80px;"><a href="javascript:void(0)" id="lbl_add_history" data-toggle="tooltip" data-placement="top" title="បន្ថែមព័ត៌មានប្រវត្តិផ្លូវ"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /><?= t('បន្ថែម​') ?></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($id - 0 == 0) {
                                ?>
                                <tr>
                                    <td class="h_no" style="text-align: center;">1</td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="សកម្មភាព (កំពុងជួសជុល...)"​ type="text" class="form-control activity" id="activity" placeholder="សកម្មភាព" name="activity[]"></td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="ឆ្នាំ"​ type="text" class="form-control" number id="year_construct" placeholder="ឆ្នាំ" name="year_construct[]"></td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="អនុវត្តដោយ"​ type="text" class="form-control apply_by" id="apply_by" placeholder="អនុវត្តដោយ" name="apply_by[]"></td>
                                    <td><input data-toggle="tooltip" data-placement="top" title="ប្រភពថវិកា"​ type="text" class="form-control source_budget" id="source_budget" placeholder="ប្រភពថវិកា" name="source_budget[]"></td>
                                    <td style="text-align: center;"><a href="javascript:void(0)" id="lbl_history_remove">លុប</a><input type="hidden" class="form-control" id="his_id" placeholder="ប្រភពថវិកា" name="his_id[]"></td>
                                </tr>
                                <?php
                            } else {
                                $qr_his = query("SELECT
                                                            *
                                                    FROM
                                                            history AS h
                                                    WHERE
                                                            h.road_id = '{$id}'
                                                    ORDER BY
                                                            h.activity ");
                                if ($qr_his->num_rows() > 0) {
                                    $i = 1;
                                    foreach ($qr_his->result() as $row) {
                                        echo "<tr>" .
                                        "<td class='h_no' style='text-align: center;'>" . $i . "</td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='សកម្មភាព (កំពុងជួសជុល...)'​ type='text' class='form-control activity'  value='$row->activity'  id='activity' placeholder='សកម្មភាព' name='activity[]'></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='ឆ្នាំ'​ number type='text' class='form-control' value='$row->year_construct' id='year_construct' placeholder='ឆ្នាំ' name='year_construct[]'></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='អនុវត្តដោយ'​ type='text' class='form-control apply_by'  value='$row->apply_by'  id='apply_by' placeholder='អនុវត្តដោយ' name='apply_by[]'></td>" .
                                        "<td><input data-toggle='tooltip' data-placement='top' title='ប្រភពថវិកា'​ type='text' class='form-control source_budget'  value='$row->source_budget'  id='source_budget' placeholder='ប្រភពថវិកា' name='source_budget[]'></td></td>" .
                                        "<td style='text-align: center; width: 110px;'><a href='javascript:void(0)' id='lbl_history_remove'>លុប</a><input class='form-control his_id' type='hidden' name='his_id[]' id='his_id' maxlength='11' placeholder='លេខរៀង' value='$row->his_id' /></td>" .
                                        "</tr>";
                                        $i++;
                                    }
                                } else {
                                    echo '<tr>
                                                <td class="h_no" style="text-align: center;">1</td>
                                                <td><input data-toggle="tooltip" data-placement="top" title="សកម្មភាព (កំពុងជួសជុល...)"​ type="text" class="form-control activity" id="activity" placeholder="សកម្មភាព" name="activity[]"></td>
                                                <td><input data-toggle="tooltip" data-placement="top" title="ឆ្នាំ"​ type="text" class="form-control" number id="year_construct" placeholder="ឆ្នាំ" name="year_construct[]"></td>
                                                <td><input data-toggle="tooltip" data-placement="top" title="អនុវត្តដោយ"​ type="text" class="form-control apply_by" id="apply_by" placeholder="អនុវត្តដោយ" name="apply_by[]"></td>
                                                <td><input data-toggle="tooltip" data-placement="top" title="ប្រភពថវិកា"​ type="text" class="form-control source_budget" id="source_budget" placeholder="ប្រភពថវិកា" name="source_budget[]"></td>
                                                <td style="text-align: center;"><a href="javascript:void(0)" id="lbl_history_remove">លុប</a><input type="hidden" class="form-control" id="his_id" placeholder="ប្រភពថវិកា" name="his_id[]"></td>
                                            </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- pavement ---------------------------->
                <div id="tabs-6" style="overflow-x: scroll;">
                    <div id="dv_pavement">
                        <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="tbl_pavement">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><?= t('#') ?></th>
                                    <th style="text-align: center;"><?= t('ប្រភេទកម្រាល') ?></th>
                                    <th style="text-align: center;" colspan="2"><?= t('និយាមកាចាប់ផ្តើម (X1, Y1)') ?></th>
                                    <th style="text-align: center;" colspan="2"><?= t('និយាមកាបញ្ចប់ (X2, Y2)') ?></th>
                                    <th style="text-align: center;"><?= t('ប្រវែង') ?></th>
                                    <th style="text-align: center;width: 80px;"><a href="javascript:void(0)" id="lbl_add_pavement" data-toggle="tooltip" data-placement="top" title="បន្ថែមព័ត៌មានប្រភេទកម្រាល"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /><?= t('បន្ថែម') ?></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($id - 0 == 0) {
                                    ?>
                                    <tr>
                                        <td class="p_no" style="text-align: center;">1</td>
                                        <td><input data-toggle="tooltip" data-placement="top" title="ប្រភេទកម្រាល (ក្រួសក្រហម...)"​ class="form-control pave" type="text" name="type_pavement[]" id="type_pavement" placeholder="ប្រភេទកម្រាល" maxlength="255" /></td>
                                        <td><input data-toggle="tooltip" data-placement="top" title="X ចាប់ផ្តើម (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)"​ class="form-control" number type="text" name="first_point_x_pavement[]" id="first_point_x_pavement" placeholder="X ចាប់ផ្តើម" maxlength="6" /></td>
                                        <td><input data-toggle="tooltip" data-placement="top" title="Y ចាប់ផ្តើម (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)"​ class="form-control" number type="text" name="first_point_y_pavement[]" id="first_point_y_pavement" placeholder="Y ចាប់ផ្តើម" maxlength="7" /></td>
                                        <td><input data-toggle="tooltip" data-placement="top" title="X បញ្ចប់ (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)"​ class="form-control" number type="text" name="last_point_x_pavement[]" id="last_point_x_pavement" placeholder="X បញ្ចប់" maxlength="6" /></td>
                                        <td><input data-toggle="tooltip" data-placement="top" title="Y បញ្ចប់ (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)"​ class="form-control" number type="text" name="last_point_y_pavement[]" id="last_point_y_pavement" placeholder="Y បញ្ចប់" maxlength="7" /></td>
                                        <td><input data-toggle="tooltip" data-placement="top" title="ប្រវែងកម្រាល (ម៉ែត្រ)"​ class="form-control" decimal type="text" name="length_pavement[]" id="length_pavement" placeholder="ប្រវែងកម្រាល" maxlength="11" /></td>
                                        <td style="text-align: center;"><a href="javascript:void(0)" id="lbl_pavement_remove">លុប</a><input class="form-control pave_id" type="hidden" name="pave_id[]" id="pave_id" placeholder="លេខរៀង" maxlength="11" /></td>
                                    </tr>
                                    <?php
                                } else {
                                    $qr_pave = query("SELECT
                                                                    *
                                                            FROM
                                                                    pavement AS p
                                                            WHERE
                                                                    p.road_id = '{$id}'
                                                            ORDER BY
                                                                    p.type_pavement ");
                                    if ($qr_pave->num_rows() > 0) {
                                        $i = 1;
                                        foreach ($qr_pave->result() as $row) {
                                            if (isset($row->pave_id)) {
                                                // echo $row->title;
                                                echo "<tr>" .
                                                "<td class='p_no' style='text-align: center;'>" . $i . "</td>" .
                                                "<td><input data-toggle='tooltip' data-placement='top' title='ប្រភេទកម្រាល (ក្រួសក្រហម...)'​ class='form-control pave' type='text' name='type_pavement[]' id='type_pavement' maxlength='255' placeholder='ប្រភេទកម្រាល' value='{$row->type_pavement}' /></td>" .
                                                "<td><input data-toggle='tooltip' data-placement='top' title='X ចាប់ផ្តើម (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)'​ class='form-control' number type='text' name='first_point_x_pavement[]' id='first_point_x_pavement' maxlength='6' placeholder='X ចាប់ផ្តើម' value='$row->first_point_x_pavement' /></td>" .
                                                "<td><input data-toggle='tooltip' data-placement='top' title='Y ចាប់ផ្តើម (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)'​ class='form-control' number type='text' name='first_point_y_pavement[]' id='first_point_y_pavement' maxlength='7' placeholder='Y ចាប់ផ្តើម' value='$row->first_point_y_pavement' /></td>" .
                                                "<td><input data-toggle='tooltip' data-placement='top' title='X បញ្ចប់ (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)'​ class='form-control' number type='text' name='last_point_x_pavement[]' id='last_point_x_pavement' maxlength='6' placeholder='X បញ្ចប់' value='$row->last_point_x_pavement' /></td>" .
                                                "<td><input data-toggle='tooltip' data-placement='top' title='Y បញ្ចប់ (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)'​ class='form-control' number type='text' name='last_point_y_pavement[]' id='last_point_y_pavement' maxlength='7' placeholder='Y បញ្ចប់' value='$row->last_point_y_pavement' /></td>" .
                                                "<td><input data-toggle='tooltip' data-placement='top' title='ប្រវែងកម្រាល (ម៉ែត្រ)'​ class='form-control' decimal type='text' name='length_pavement[]' id='length_pavement' maxlength='11' placeholder='ប្រវែងកម្រាល' value='$row->length_pavement' /></td>" .
                                                "<td style='text-align: center; width: 110px;'><a href='javascript:void(0)' id='lbl_pavement_remove'>លុប</a><input class='form-control pave_id' type='hidden' name='pave_id[]' id='pave_id' maxlength='11' placeholder='ប្រវែងកម្រាល' value='$row->pave_id' /></td>" .
                                                "</tr>";
                                            } else {
                                                echo "ttt";
                                            }
                                            $i++;
                                        }
                                    } else {
                                        echo '<tr>
                                                    <td class="p_no" style="text-align: center;">1</td>
                                                    <td><input data-toggle="tooltip" data-placement="top" title="ប្រភេទកម្រាល (ក្រួសក្រហម...)"​ class="form-control pave" type="text" name="type_pavement[]" id="type_pavement" placeholder="ប្រភេទកម្រាល" maxlength="255" /></td>
                                                    <td><input data-toggle="tooltip" data-placement="top" title="X ចាប់ផ្តើម (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)"​ class="form-control" number type="text" name="first_point_x_pavement[]" id="first_point_x_pavement" placeholder="X ចាប់ផ្តើម" maxlength="6" /></td>
                                                    <td><input data-toggle="tooltip" data-placement="top" title="អរដោនេរ (y)"​ class="form-control" number type="text" name="first_point_y_pavement[]" id="first_point_y_pavement" placeholder="Y ចាប់ផ្តើម" maxlength="7" /></td>
                                                    <td><input data-toggle="tooltip" data-placement="top" title="X បញ្ចប់ (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)"​ class="form-control" number type="text" name="last_point_x_pavement[]" id="last_point_x_pavement" placeholder="X បញ្ចប់" maxlength="6" /></td>
                                                    <td><input data-toggle="tooltip" data-placement="top" title="អរដោនេរ (y)"​ class="form-control" number type="text" name="last_point_y_pavement[]" id="last_point_y_pavement" placeholder="Y បញ្ចប់" maxlength="7" /></td>
                                                    <td><input data-toggle="tooltip" data-placement="top" title="ប្រវែងកម្រាល (ម៉ែត្រ)"​ class="form-control" decimal type="text" name="length_pavement[]" id="length_pavement" placeholder="ប្រវែងកម្រាល" maxlength="11" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" id="lbl_pavement_remove">លុប</a><input class="form-control pave_id" type="hidden" name="pave_id[]" id="pave_id" placeholder="លេខរៀង" maxlength="11" /></td>
                                                </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer" style="text-align: right;">          
            <div class="btn-group btn-group-lg">
                <?php if ($id - 0 > 0) { ?>
                    <button data-toggle="tooltip" data-placement="top" title="" name="submit" type="submit" class="btn btn-default glyphicon glyphicon-save" value="save"> <?= t('រក្សាទុក') ?></button>
                    <!--<button data-toggle="tooltip" data-placement="top" title="រក្សាទុក និងត្រលប់ក្រោយ" name="submit" type="submit" class="btn btn-default glyphicon glyphicon-circle-arrow-left" value="save_back">​ <?= t('រក្សាទុក') ?></button>-->

                    <button data-toggle="tooltip" data-placement="top" title="" id="btn_print_one_road" name="btn_print_one_road" type="button" class="btn btn-default glyphicon glyphicon-print"> <?= t('បោះពុម្ព') ?></button>   
                    <button data-toggle="tooltip" data-placement="top" title="ភ្ជាប់ទៅ Google maps" name="btn_map" id="btn_map" type="button" class="btn btn-default glyphicon glyphicon-paperclip"> <?= t('ផែនទី') ?></button>
                    <button data-toggle="tooltip" data-placement="top" title="នាំចេញទៅកាន់ Excel" name="btn_exp" id="btn_exp" type="button" class="btn btn-default glyphicon glyphicon-export"> <?= t('Excel') ?></button>
                    <button data-toggle="tooltip" data-placement="top" title="" id="back" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left"> <?= t('ថយក្រោយ') ?></button>                   
                <?php } else {
                    ?>
                    <button data-toggle="tooltip" data-placement="top" title="" name="submit" type="submit" class="btn btn-default glyphicon glyphicon-save" value="save"> <?= t('រក្សាទុក') ?></button>
                    <!--<button data-toggle="tooltip" data-placement="top" title="រក្សាទុក និងត្រលប់ក្រោយ" name="submit" type="submit" class="btn btn-default glyphicon glyphicon-circle-arrow-left" value="save_back">​ <?= t('រក្សាទុក') ?></button>-->
                    <button data-toggle="tooltip" data-placement="top" title="" id="back" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left"> <?= t('ថយក្រោយ') ?></button>
                <?php }
                ?>
            </div>
        </div>

    </div>

</form>

<!-- print one road ---------------------->
<div style="display: none;" class="prt_one_road" id="prt_one_road"></div>

<div id="load_img"></div>

<style>
    .pave{width: 200px;}
</style>

<script type="text/javascript">
    $(function () {

        // art. char. =====================
        $.ajax({
            url: '<?= site_url('rri/roads/opt_art_char') ?>',
            type: 'post',
            datatype: 'json',
            // async: false,
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {},
            success: function (data) {
                $('.xmodal').hide();
                if (data.length > 0) {
                    var opt = '';
                    // opt += '<option></option>';
                    $.each(data, function (i, item) {
                        opt += '<option>' + item.tye_ + '</option>';
                    });
                }
                $('.art_char').html(opt);
            },
            error: function () {

            }
        });

//        $('body').delegate('#lbl_add_art_building', 'click', function () {
//            $.ajax({
//                url: '<?= site_url('rri/roads/opt_art_char') ?>',
//                type: 'post',
//                datatype: 'json',
//                // async: false,
//                beforeSend: function () {
//                    $('.xmodal').show();
//                },
//                data: {},
//                success: function (data) {
//                    $('.xmodal').hide();
//                    if (data.length > 0) {
//                        var opt = '';
//                        opt += '<option></option>';
//                        $.each(data, function (i, item) {
//                            opt += '<option>' + item.tye_ + '</option>';
//                        });
//                    }
//                    $('.art_char').html(opt);
//                },
//                error: function () {
//
//                }
//            });
//        });

//        $('body').delegate('.art_char', 'focus', function (e) {
//            $(this).each(function (i) {
//                $.ajax({
//                    url: '<?= site_url('rri/roads/opt_art_char') ?>',
//                    type: 'post',
//                    datatype: 'json',
//                    // async: false,
////                    beforeSend: function () {
////                        $('.xmodal').show();
////                    },
//                    data: {},
//                    success: function (data) {                       
//                        // $('.xmodal').hide();
//                        if (data.length > 0) {
//                            var opt = '';
//                            opt += '<option></option>';
//                            $.each(data, function (i, item) {
//                                opt += '<option>' + item.tye_ + '</option>';
//                            });
//                        }
//                        // console.log(opt);
//                        // return false;
//                        $(this).html(opt);
//                    },
//                    error: function () {
//
//                    }
//                }); // ajax =============
//            });
//        });

        // max length =====================
        $('#length').on('change', function (e) {
            if ($(this).val() - 0 >= $(this).data('max')) {
                alert('បញ្ចូលតមលៃ ' + $(this).val() + ' មិនត្រឹមត្រូវ!');
                $(this).val('');
                $(this).focus();
            }
        });

        // max width =====================
        $('#width').on('change', function (e) {
            if ($(this).val() - 0 >= $(this).data('max')) {
                alert('បញ្ចូលតមលៃ ' + $(this).val() + ' មិនត្រឹមត្រូវ!');
                $(this).val('');
                $(this).focus();
            }
        });

        // tooltip =======================
        $("body").delegate("", "mouseover", function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        // autocom source =================
        $("body").delegate(".source_budget", "focus", function () {
            $(this).autocomplete({
                minLength: 0,
                autoFocus: true,
                delay: 0,
                source: function (request, response) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/autocom_source_budget') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {
                            q: request.term
                        },
                        success: function (data) {
                            response($.map(data.slice(0, 15), function (i, item) {
                                return {
                                    label: i.source_budget, value: item.source_budget
                                };
                            }));
                        },
                        error: function () {

                        }
                    });
                }
            });
        });

        // autocom appy_by =================
        $("body").delegate(".apply_by", "focus", function () {
            $(this).autocomplete({
                minLength: 0,
                autoFocus: true,
                delay: 0,
                source: function (request, response) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/autocom_apply_by') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {
                            q: request.term
                        },
                        success: function (data) {
                            response($.map(data.slice(0, 15), function (i, item) {
                                return {
                                    label: i.appy_by, value: item.appy_by
                                };
                            }));
                        },
                        error: function () {

                        }
                    });
                }
            });
        });

        // autocom activity =================
        $("body").delegate(".activity", "focus", function () {
            $(this).autocomplete({
                minLength: 0,
                autoFocus: true,
                delay: 0,
                source: function (request, response) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/autocom_act') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {
                            q: request.term
                        },
                        success: function (data) {
                            response($.map(data.slice(0, 15), function (i, item) {
                                return {
                                    label: i.activity, value: item.activity
                                };
                            }));
                        },
                        error: function () {

                        }
                    });
                }
            });
        });

        // autocom direction =================
        $("body").delegate(".direction", "focus", function () {
            $(this).autocomplete({
                minLength: 0,
                autoFocus: true,
                delay: 0,
                source: function (request, response) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/autocom_direction') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {
                            q: request.term
                        },
                        success: function (data) {
                            response($.map(data.slice(0, 15), function (i, item) {
                                return {
                                    label: i.direction, value: item.direction
                                };
                            }));
                        },
                        error: function () {

                        }
                    });
                }
            });
        });

        // autocom dis. ======================
        $("body").delegate(".district", "focus", function (e) {
            $(this).autocomplete({
                minLength: 0,
                autoFocus: true,
                delay: 0,
                source: function (request, response) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/autocom_dis') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {
                            q: request.term
                        },
                        success: function (data) {
                            response($.map(data.slice(0, 15), function (i, item) {
                                return {
                                    label: i.dis_khmer,
                                    value: item.dis_khmer
                                };
                            }));
                        },
                        error: function () {

                        }
                    });
                }
            });
        });

        // autocom com. ======================
        $("body").delegate(".comm", "focus", function (e) {
            var tr = $(this).parent().parent().find('.district').val();
            $(this).autocomplete({
                minLength: 0,
                autoFocus: true,
                delay: 0,
                source: function (request, response) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/autocom_com') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {
                            q: request.term,
                            tr: tr
                        },
                        success: function (data) {
                            response($.map(data.slice(0, 20), function (i, item) {
                                return {
                                    label: i.com_khmer,
                                    value: item.com_khmer
                                };
                            }));
                        },
                        error: function () {

                        }
                    });
                }
            });
        });

        // autocom vi. ======================
        $("body").delegate(".vi", "focus", function (e) {
            $(this).autocomplete({
                minLength: 0,
                autoFocus: true,
                delay: 0,
                source: function (request, response) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/autocom_v') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {
                            q: request.term
                        },
                        success: function (data) {
                            response($.map(data.slice(0, 25), function (i, item) {
                                return {
                                    label: i.v_khmer,
                                    value: item.v_khmer
                                };
                            }));
                        },
                        error: function () {

                        }
                    });
                }
            });
        });

        // autocom type_pavement ======================
        $("body").delegate(".pave", "focus", function (e) {
            $(this).autocomplete({
                minLength: 0,
                autoFocus: true,
                delay: 0,
                source: function (request, response) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/autocom_pave') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {
                            q: request.term
                        },
                        success: function (data) {
                            response($.map(data.slice(0, 15), function (i, item) {
                                return {
                                    label: i.type_pavement,
                                    value: item.type_pavement
                                };
                            }));
                        },
                        error: function () {

                        }
                    });
                }
            });
        });

        // autocom type_building ======================
        $("body").delegate(".type_building", "focus", function (e) {
            $(this).autocomplete({
                minLength: 0,
                autoFocus: true,
                delay: 0,
                source: function (request, response) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/autocom_type_building') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {
                            q: request.term
                        },
                        success: function (data) {
                            response($.map(data.slice(0, 20), function (i, item) {
                                return {
                                    label: i.type_building,
                                    value: item.type_building
                                };
                            }));
                        },
                        error: function () {

                        }
                    });
                }
            });
        });

        // autocom type_building_art ======================
        $("body").delegate(".type_building_art", "focus", function (e) {
            $(this).autocomplete({
                minLength: 0,
                autoFocus: true,
                delay: 0,
                source: function (request, response) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/autocom_type_building_art') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {
                            q: request.term
                        },
                        success: function (data) {
                            response($.map(data.slice(0, 15), function (i, item) {
                                return {
                                    label: i.type_building_art,
                                    value: item.type_building_art
                                };
                            }));
                        },
                        error: function () {

                        }
                    });
                }
            });
        });

        // focus =====================
        // $('#pro_id:first').focus();

        $('form').bind("submit", function (e) {
            var pro_id = $('#pro_id').val();
            var dis_id = $('#dis_id').val();
            var road_number = $('#road_number').val();
            var type = $('#type').val();
            var length = $('#length').val();
            if (pro_id == '' || dis_id == '' || road_number == '' || type == '' || length == '') {
                $("#tabs").tabs({active: 0});
            }
        });

        // add geography =====================
        $("#lbl_addrow_geography").on("click", function (e) {
            new_row_geography();
        });

        // add art_building ===================
        $("body").delegate("#lbl_add_art_building", "click", function (e) {
            new_art_building();
        });

        // add pub_building ===================
        $("body").delegate("#lbl_add_pub_building", "click", function (e) {
            new_pub_building();
        });

        // add history ========================
        $("body").delegate("#lbl_add_history", "click", function (e) {
            new_history();
        });

        // add pavement ========================
        $("body").delegate("#lbl_add_pavement", "click", function (e) {
            new_pavement();
        });

        // remove row geography =================
        $("body").delegate("#lbl_remove", "click", function (e) {
            var tr = $(this).parent().parent();
            var geo_id = tr.find('.geo_id').val();
            if (geo_id - 0 > 0) {
                var conf = confirm('<?= t('តើអ្នកពិតជាលុបឬ?') ?>');
                if (conf) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/del_geography') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {geo_id: geo_id},
                        success: function () {
                        },
                        error: function () {
                        }
                    });
                    $(this).parent().parent().remove();
                    $('.g_no').each(function (i) {
                        $(this).html(i + 1);

                    });
                }
            } else {
                $(this).parent().parent().remove();
                $('.g_no').each(function (i) {
                    $(this).html(i + 1);

                });
            }
        });

        // remove art_building =========================
        $("body").delegate("#lbl_remove_art", "click", function (e) {
            var tr = $(this).parent().parent();
            var art_id = tr.find('.art_id').val();
            if (art_id - 0 > 0) {
                var conf = confirm('<?= t('តើអ្នកពិតជាលុបឬ?') ?>');
                if (conf) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/del_art_building') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {art_id: art_id},
                        success: function () {

                        },
                        error: function () {

                        }
                    });
                    $(this).parent().parent().remove();
                    $('.a_no').each(function (i) {
                        $(this).html(i + 1);

                    });
                }
            } else {
                $(this).parent().parent().remove();
                $('.a_no').each(function (i) {
                    $(this).html(i + 1);

                });
            }
        });

        // remove pub_building =========================
        $("body").delegate("#lbl_remove_pub", "click", function (e) {
            var tr = $(this).parent().parent();
            var pub_id = tr.find('.pub_id').val();
            if (pub_id - 0 > 0) {
                var conf = confirm('<?= t('តើអ្នកពិតជាលុបឬ?') ?>');
                if (conf) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/del_pub_building') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {pub_id: pub_id},
                        success: function () {

                        },
                        error: function () {

                        }
                    });
                    $(this).parent().parent().remove();
                    $('.pu_no').each(function (i) {
                        $(this).html(i + 1);

                    });
                }
            } else {
                $(this).parent().parent().remove();
                $('.pu_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
        });

        // remove history ==========================
        $("body").delegate("#lbl_history_remove", "click", function (e) {
            var tr = $(this).parent().parent();
            var his_id = tr.find('.his_id').val();
            if (his_id - 0 > 0) {
                var conf = confirm('<?= t('តើអ្នកពិតជាលុបឬ?') ?>');
                if (conf) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/del_history') ?>",
                        type: "post",
                        datatype: "json",
                        data: {his_id: his_id},
                        success: function () {

                        },
                        error: function () {

                        }
                    });
                    $(this).parent().parent().remove();
                    $('.h_no').each(function (i) {
                        $(this).html(i + 1);
                    });
                }
            } else {
                $(this).parent().parent().remove();
                $('.h_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
        });

        // remove pavement ==========================
        $("body").delegate("#lbl_pavement_remove", "click", function (e) {
            var tr = $(this).parent().parent();
            var pave_id = tr.find('.pave_id').val();
            if (pave_id - 0 > 0) {
                var conf = confirm('<?= t('តើអ្នកពិតជាលុបឬ?') ?>');
                if (conf) {
                    $.ajax({
                        url: "<?= site_url('rri/roads/del_pavement') ?>",
                        type: "post",
                        datatype: "json",
                        async: false,
                        data: {pave_id: pave_id},
                        success: function (data) {

                        },
                        error: function () {

                        }
                    });
                    $(this).parent().parent().remove();
                    $('.p_no').each(function (i) {
                        $(this).html(i + 1);
                    });
                }
            } else {
                $(this).parent().parent().remove();
                $('.p_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
        });

        // diag art_building =============================================
        $("body").delegate("#link_art_building", "click", function (e) {
            var tr = $(this).parent().parent();
            var geo_id = tr.find('.geo_id').val();
            $('.geo_idx').val(geo_id);
            $.ajax({
                url: "<?= site_url('rri/roads/edit_art_building') ?>",
                type: "post",
                async: false,
                data: {geo_id: geo_id},
                success: function (xx) {
                    $(".art_building").html(xx);
                    // $(".dv_sub_art form").html(x);
                },
                error: function () {

                }
            });
            $("#dv_art_building").dialog({
                modal: true,
                width: 1000,
                height: 600,
                title: "សំណង់សិល្បការ",
                buttons: {
                    "រក្សាទុក": function () {
                        $('.art_building').submit();
                        alert('ជោគជ័យ !');
                        $(this).dialog("close");
                    },
                    "បិទ": function () {
                        $(this).dialog("close");
                    }
                }
            });
        });

        /* diag building =================================================*/
        $("body").delegate("#link_building", "click", function (e) {
            var tr = $(this).parent().parent();
            var geo_id = tr.find('.geo_id').val();
            $('.geo_idx').val(geo_id);
            $.ajax({
                url: "<?= site_url('rri/roads/edit_pub_building') ?>",
                type: "post",
                async: false,
                data: {geo_id: geo_id},
                success: function (uu) {
                    $(".pub_building").html(uu);
                    // $(".dv_sub_art form").html(x);
                },
                error: function () {

                }
            });
            $("#dv_pub_building").dialog({
                modal: true,
                width: 1000,
                height: 600,
                title: "សំណង់សាធារណៈ",
                buttons: {
                    "រក្សាទុក": function () {
                        $('.pub_building').submit();
                        alert('ជោគជ័យ !');
                        $(this).dialog("close");
                    },
                    "បិទ": function () {
                        $(this).dialog("close");
                    }
                }
            });
        });

        $("#tabs").tabs();

        $('#back').on('click', function () {
            window.location = 'javascript:history.go(-1)';
            // window.location = 'javascript:history.back(-1)';

        });

        $('#btn_map').on('click', function () {
            var road_id = $('#road_id').val() - 0;
            if (road_id > 0) {
                window.location = '<?= site_url('rri/link_map/index') ?>/' + encodeURIComponent(road_id);
            } else {
                return false;
            }
        });

        // print one road ====================================
        $("#btn_print_one_road").on("click", function () {
            print_one_road();
            var params = [
                'height=' + screen.height,
                'width=' + screen.width,
                'fullscreen=yes',
                'modal=yes'
            ];
            var divToPrint = document.getElementById('prt_one_road');
            var popupWin = window.open('', '_blank', params); // var popupWin = window.open('', '_blank', 'width=800,height=600'); // width=800,height=500
            popupWin.moveTo(0, 0);
            popupWin.document.open();
            popupWin.document.write('<html><head><title></title></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.print();
            popupWin.close();
        });

        // export ================================
        $('#btn_exp').on('click', function () {
            var road_id = $('#road_id').val() - 0;
            if (road_id > 0) {
                window.location = '<?= site_url('rri/export/index') ?>/' + encodeURIComponent(road_id);
            } else {
                return false;
            }
        });

        // show province ===================================
        $('#pro_id').on('change', function () {
            var pro_id = $(this).val();
            if (pro_id != '') {
                // province =======================
                $.ajax({
                    url: "<?= site_url('rri/roads/show_pro') ?>",
                    type: "post",
                    datatype: "json",
                    async: false,
                    data: {pro_id: pro_id},
                    success: function (data) {
                        var opt = '';
                        if (data.length > 0) {
                            $.each(data, function (i, item) {
                                opt += "<option value='" + item.dis_code + "' data-dis_name='" + item.dis_name.replace("'", "`") + "'>" + item.dis_khmer + "</option>";
                            });
                        }
                        $('#dis_id').html(opt);
                    },
                    error: function () {

                    }
                });

                $('#file_name').val(my_file_name());
                $('#file_no').val(my_file_no());

            }// end if ====================
        });

        // dis ==============================
        $('#dis_id').on('change', function () {
            $('#file_name').val(my_file_name());
        });

        // type ==============================
        $('#type').on('change', function () {
            $('#file_name').val(my_file_name());
        });

        // length =============================
        $('#length').on('keyup', function () {
            $('#file_name').val(my_file_name());
        });

    });
    // end ready fun. ============================

    // my_file_name ==============================
    function my_file_name() {
        var road_id = $('#road_id').val();
        var pro_id = $('#pro_id').val();
        var dis_id = $('#dis_id').val();
        var length = $('#length').val();
        var type = $('#type').val();
        var f_n = '';
        var dis_name = $('#dis_id').find(':selected').data("dis_name");

        $.ajax({
            url: "<?= site_url('rri/roads/get_file_no') ?>",
            type: "post",
            datatype: "html",
            async: false,
            data: {road_id: road_id, pro_id: pro_id},
            success: function (f_no) {
                f_n += f_no + '-T' + type +
                        '-' + pro_id + '-' + dis_id + '-' +
                        dis_name + '-' + length + 'm.xlsx';
            },
            error: function () {

            }
        });
        return f_n;
    }

    // file_no ====================================
    function my_file_no() {
        var road_id = $('#road_id').val();
        var pro_id = $('#pro_id').val();
        var f_n = '';
        $.ajax({
            url: "<?= site_url('rri/roads/get_file_no') ?>",
            type: "post",
            datatype: "html",
            async: false,
            data: {road_id: road_id, pro_id: pro_id},
            success: function (f_no) {
                f_n += f_no;
            },
            error: function () {

            }
        });
        return f_n;
    }

    // print one road =============================
    function print_one_road() {
        var road_id = $('#road_id').val();
        var pro_id = $('#pro_id').val();
        if (road_id - 0 > 0) {
            $.ajax({
                url: "<?= site_url('rri/print_one_road/index') ?>",
                type: "post",
                datatype: "html",
                async: false,
                data: {road_id: road_id, pro_id: pro_id},
                success: function (d) {
                    $('#prt_one_road').html(d);
                },
                error: function () {

                }
            });
        }
        return false;
    }

// function new_row_geography =======================
    function new_row_geography() {
        var i = $(".g_no").length + 1;
        var new_row = "<tr>" +
                "<td class='g_no' style='text-align: center; width: 30px;' class='auto_id'>" + i + "</td>" +
                "<td><input class='form-control district' type='text' name='district[]' id='district' placeholder='ស្រុក' maxlength='255' /></td>" +
                "<td><input class='form-control comm' type='text' name='commune[]' id='commune' placeholder='ឃុំ' maxlength='255' /></td>" +
                "<td><input class='form-control vi' type='text' name='village[]' id='village' placeholder='ភូមិ' maxlength='255' /></td>" +
                "<td style='text-align: center; width: 110px;'><a href='javascript:void(0)' id='lbl_remove'>លុប</a><input class='form-control geo_id' type='hidden' name='geo_id[]' id='geo_id' placeholder='លេខរៀង' maxlength='11' /></td>" +
                "</tr>";
        $("#tbl_geography tbody").append(new_row);
    }

    // function new_art_building =======================
    function new_art_building() {
        var i = $('.a_no').length + 1;
        var new_row = "<tr>" +
                "<td class='a_no' style='text-align: center;'>" + i + "</td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='ប្រភេទ (លូមូលមុខមួយ...)'​ class='form-control type_building_art' type='text' name='type_building_art[]' id='type_building' placeholder='ប្រភេទ' maxlength='255' /></td>" +
                "<td><select data-toggle='tooltip' data-placement='top' title='មុខ' class='form-control art_char' type='text' name='art_char[]' id='art_char' class='art_char'></select></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='ប្រវែង-ទំហំ (L × W [× H])'​ class='form-control dimension' type='text' name='dimension_building_art[]' id='dimension_building_art' placeholder='ប្រវែង-ទំហំ' maxlength='255' /></td>" +
                // =========================
                "<td><input data-toggle='tooltip' data-placement='top' title='ប្រវែងសំណង់ (ម)'​ decimal class='form-control' type='text' name='l_art[]' id='l_art' placeholder='ប្រវែង'  maxlength='11' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='ទទឹងសំណង់ (ម)'​ decimal class='form-control' type='text' name='w_art[]' id='w_art' placeholder='ទទឹង' maxlength='11' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='កំពស់សំណង់ (ម)'​ decimal class='form-control' type='text' name='h_art[]' id='h_art' placeholder='កំពស់' maxlength='11' /></td>" +
                // =========================    
                "<td><input data-toggle='tooltip' data-placement='top' title='ស្ថានភាព (ល្អ = 1, មធ្យម = 2, ខូច = 3)'​ number class='form-control' type='text' name='quality_building_art[]' id='quality_building_art' placeholder='ស្ថានភាព' maxlength='255' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='អាប់ស៊ីស X (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)'​ class='form-control' number type='text' name='position_x_building_art[]' id='position_x_building_art' placeholder='X' maxlength='6' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='អរដោនេរ Y  (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)'​ class='form-control' number type='text' name='position_y_building_art[]' id='position_y_building_art' placeholder='Y' maxlength='7' /></td>" +
                "<td style='text-align: center;'><a href='javascript:void(0)' id='lbl_remove_art'>លុប</a><input class='form-control art_id' type='hidden' name='art_id[]' id='art_id' placeholder='លេខរៀង' maxlength='255' /></td>" +
                "</tr>";
        $("#tbl_art_building tbody").append(new_row);
    }

// function new_building =========================
    function new_pub_building() {
        var i = $('.pu_no').length + 1;
        var new_row =
                "<tr>" +
                "<td class='pu_no' style='text-align: center;'>" + i + "</td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='ប្រភេទសំណង់ (វត្ត មន្ទីរពេទ្យ...)'​ class='form-control type_building' type='text' name='type_building[]' id='type_building'  placeholder='ប្រភេទសំណង់' maxlength='255' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='ឈ្មោះសំណង់​​ (ឧ. សាលាបឋមសិក្សា(ក)...)'​ class='form-control' type='text' name='name_building[]' id='name_building'  placeholder='ឈ្មោះសំណង់' maxlength='255' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='អាប់ស៊ីស X (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)'​ class='form-control' number type='text' name='position_x[]' id='position_x'  placeholder='X' maxlength='6' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='អរដោនេរ Y  (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)'​ class='form-control' number type='text' name='position_y[]' id='position_y'  placeholder='Y' maxlength='7' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='ទិស (លិច កើត ជើង​ ត្បូង)'​ class='form-control direction' type='text' name='direction[]' id='direction'  placeholder='ទិស' maxlength='255' /></td>" +
                "<td style='text-align: center;'><a href='javascript:void(0)' id='lbl_remove_pub'>លុប</a><input class='form-control pub_id' type='hidden' name='pub_id[]' id='pub_id' placeholder='លេខរៀង' maxlength='255' /></td>" +
                "</tr>";
        $("#tbl_pub_building tbody").append(new_row);
    }

// function new_history ===========================
    function new_history() {
        var i = $('.h_no').length + 1;
        var new_row =
                "<tr>" +
                "<td class='h_no' style='text-align: center;'>" + i + "</td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='សកម្មភាព (កំពុងជួសជុល...)'​ type='text' class='form-control activity' id='activity' placeholder='សកម្មភាព' name='activity[]'></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='ឆ្នាំ'​ type='text' class='form-control' number id='year_construct' placeholder='ឆ្នាំ' name='year_construct[]'></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='អនុវត្តដោយ'​ type='text' class='form-control apply_by' id='apply_by' placeholder='អនុវត្តដោយ' name='apply_by[]'></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='ប្រភពថវិកា'​ type='text' class='form-control source_budget' id='source_budget' placeholder='ប្រភពថវិកា' name='source_budget[]'></td>" +
                "<td style='text-align: center;'><a href='javascript:void(0)' id='lbl_history_remove'>លុប</a><input type='hidden' class='form-control' id='his_id' placeholder='ប្រភពថវិកា' name='his_id[]'></td>" +
                "</tr>";
        $("#tbl_history tbody").append(new_row);
    }

// function new_pavement ==========================
    function new_pavement() {
        var i = $('.p_no').length + 1;
        var new_row =
                "<tr>" +
                "<td class='p_no' style='text-align: center;'>" + i + "</td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='ប្រភេទកម្រាល (ក្រួសក្រហម...)'​ class='form-control pave' type='text' name='type_pavement[]' id='type_pavement' maxlength='255' placeholder='ប្រភេទកម្រាល' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='X ចាប់ផ្តើម (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)'​ class='form-control' type='text' number name='first_point_x_pavement[]' id='first_point_x_pavement' maxlength='6' placeholder='X ចាប់ផ្តើម' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='Y ចាប់ផ្តើម (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)'​ class='form-control' type='text' number name='first_point_y_pavement[]' id='first_point_y_pavement' maxlength='7' placeholder='Y ចាប់ផ្តើម' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='X បញ្ចប់ (បញ្ចូលលេខគត់ប្រាំមួយខ្ទង់)'​ class='form-control' type='text' number name='last_point_x_pavement[]' id='last_point_x_pavement' maxlength='6' placeholder='X បញ្ចប់' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='Y បញ្ចប់ (បញ្ចូលលេខគត់ប្រាំពីរខ្ទង់)'​ class='form-control' type='text' number name='last_point_y_pavement[]' id='last_point_y_pavement' maxlength='7' placeholder='Y បញ្ចប់' /></td>" +
                "<td><input data-toggle='tooltip' data-placement='top' title='ប្រវែងកម្រាល (ម៉ែត្រ)'​ class='form-control' decimal type='text' name='length_pavement[]' id='length_pavement' maxlength='11' placeholder='ប្រវែងកម្រាល' /></td>" +
                "<td  style='text-align: center;'><a href='javascript:void(0)' id='lbl_pavement_remove'>លុប</a><input class='form-control pave_id' type='hidden' name='pave_id[]' id='pave_id' maxlength='11' placeholder='លេខរៀង' /></td>" +
                "</tr>";
        $("#tbl_pavement tbody").append(new_row);
    }

</script>