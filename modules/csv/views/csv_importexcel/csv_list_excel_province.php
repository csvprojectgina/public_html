<?php
// get data from unit
$query = query("SELECT * FROM unit  WHERE status='1' ");
$row = $query->result();
$unituery = $row;
$arr_unit = [];
foreach ($unituery as $row) {
    $arr_unit[$row->id] = $row->unit;
}



// get general department
$this->db->select('*');
$this->db->from('general_departments');
$this->db->where('status', 1);
$gd_rows = $this->db->get()->result();
$arr_gd_office = [];
foreach ($gd_rows as $row) {
    $arr_gd_office[$row->general_dep_id] = $row->general_deps_name;
}

// get department
$this->db->select('*');
$this->db->from('tbl_departments');
$this->db->where('status', 1);
$dp_rows = $this->db->get()->result();
$arr_dp_office = [];
foreach ($dp_rows as $row) {
    $arr_dp_office[$row->d_id] = $row->d_name;
}

// get offices
$this->db->select('*');
$this->db->from('offices');
$this->db->where('status', 1);
$office_rows = $this->db->get()->result();
$arr_offices = [];
foreach ($office_rows as $row) {
    $arr_offices[$row->id] = $row->office;
}

// get land official
$this->db->select('*');
$this->db->from('land_officials');
$this->db->where('status', 1);
$land_official_rows = $this->db->get()->result();
$arr_land_official = [];
foreach ($land_official_rows as $row) {
    $arr_land_official[$row->id] = $row->land_official;
}
// get current rule
$this->db->select('*');
$this->db->from('currentrole');
$this->db->where('status', 1);
$currentrole_rows = $this->db->get()->result();
$arr_currentrole = [];
foreach ($currentrole_rows as $row) {
    $arr_currentrole[$row->id] = $row->current_role_in_khmer;
}

//get education level
$this->db->select('*');
$this->db->from('educationlevel');
$education_rows = $this->db->get()->result();
$arr_educationlevel = [];
foreach ($education_rows as $row) {
    $arr_educationlevel[$row->id] = $row->khmer_level;
}
?>

<style>
    .table-responsive {
        height:600px;
        overflow:auto; 
    }
    th,td {
        white-space: nowrap;
    }
</style>
<form id="up_form" class="form-horizontal" role="form" action="<?= site_url('csv/csv_importexcel/import_excel') ?>"
      method="post" enctype="multipart/form-data" accept-charset="utf-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img
                    src="<?= base_url('assets/bs/css/images/new.gif') ?>"/> <?= t('បញ្ចូលពី Excel') ?></h3>
        <!--<input type="hidden" value="<?= set_value('id', isset($row->id) ? $row->id : '') ?>" name="id" >-->
        <!-- <input type="hidden" value="<?= set_value('road_id', $id) ?>"  id="road_id"  name="road_id" /> -->
        </div>

        <div class="panel-body">
            <div id="alert_msg"></div>
            <div class="form-group">
                <label for="unit" class="col-sm-2 control-label"><?= t('អង្គភាព') ?></label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" id="unit" name="unit" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញអង្គភាព" maxlength="255" value="<?= set_value('unit', isset($row_w->unit) ? $row_w->unit : '') ?>" /> -->
                    <?php #echo "<pre>";print_r($unituery->id.'='. $row->unit_code); ?>
                    <select class="form-control" name="u_name" id="u_name" required>
                        <option value=""></option>
                        <?php foreach ($unituery as $keyrow) { $selected = ($keyrow->id == $get_unit_id)?'selected':''; ?>
                            <!-- <option>ទីស្ដីការក្រសួង</option> -->
                            
                            <option data-id="<?php echo @$keyrow->id; ?>"
                                    data-name="<?php echo @$keyrow->unit_english; ?>"
                                    value="<?php echo $keyrow->id; ?>" <?php echo @$selected?>><?php echo @$keyrow->unit; ?></option>

                        <?php } ?>
                        <input type="hidden" id="unit_english" name="unit_english" value="">
                    </select>

                </div>

            </div>

            <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label"><?= t('ជ្រើសរើសឯកសារ') ?></label>
                <div class="col-sm-10">
                    <input required type="file" class="form-control" placeholder="ជ្រើសរើសទីតាំងបញ្ចូល"
                           name="uploadFile" id="excel_file" onchange="checkfile(this);" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                </div>
            </div>
        </div>

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg">
                <button name="submit" type="submit" class="btn btn-default" value="save"><?= t('បញ្ចូល') ?></button>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript" language="javascript">
    function checkfile(sender) {
        var validExts = new Array(".xlsx", ".xls");
        var fileExt = sender.value;
        fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
        if (validExts.indexOf(fileExt) < 0) {
            alert("Invalid file selected, valid files are of " +
                    validExts.toString() + " types.");
            return false;
        } else
            return true;
    }
</script>
<p><h2><?php echo $arr_unit[$get_unit_id] ?></h2></p>
<div class="table-responsive">
    <table class="table-bordered table-condensed table-striped table">
        <thead>
            <tr>
                <th>
                    <?= t('ល.រ') ?>
                </th>
                <th>
                    <?= t('អត្តលេខ') ?>
                </th>
                <th>
                    <?= t('នាម និងគោត្តនាម') ?>
                </th>
                <th>
                    <?= t('ឈ្មោះឡាតាំង') ?>
                </th>
                <th>
                    <?= t('ភេទ') ?>
                </th>
                <th>
                    <?= t('ថ្ងៃ​ខែឆ្នាំ កំណើត') ?>
                </th>
                <th>
                    <?= t('តួនាទី') ?>
                </th>
                <th>
                    <?= t('កាំប្រាក់') ?>
                </th>
                <th>
                    <?= t('ទូរស័ព្ទ') ?>
                </th>
                <th>
                    <?= t('ជំនាញ') ?>
                </th>
                <th>
                    <?= t('កំម្រិតជំនាញ') ?>
                </th>
                <th>
                    <?= t('ថ្ងៃ​ខែឆ្នាំ ចូល') ?>
                </th>

                <th>
                    <?= t('ការិយាល័យរាជធានី / ខេត្ត') ?>
                </th>
                <th>
                    <?= t('ការិយាល័យភូមិបាល') ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;

            foreach ($list_array as $row) {
                ?>
                <tr>
                    <td><?php echo ++$i ?></td>
                    <td><?php echo $row['csv_id']; ?></td>
                    <td><?php echo $row['csv_first_name'] . ' ' . $row['csv_last_name']; ?></td>
                    <td><?php echo $row['csv_name_en']; ?></td>
                    <td><?php echo $row['csv_gender']; ?></td>
                    <td><?php echo $row['csv_dob']; ?></td>
                    <td><?php echo isset($arr_currentrole[$row['csv_position']]) ? $arr_currentrole[$row['csv_position']] : ''; ?></td>
                    <td><?php echo $row['csv_salarylevel']; ?></td>
                    <td><?php echo $row['csv_phone']; ?></td>
                    <td><?php echo $row['csv_skills']; ?></td>
                    <td><?php echo isset($arr_educationlevel[$row['csv_educatinlevel']]) ? $arr_educationlevel[$row['csv_educatinlevel']] : ''; ?></td>
                    <td><?php echo $row['csv_dateofjoin']; ?></td>
                    <td><?php echo isset($arr_offices[$row['csv_headofprovince']]) ? $arr_offices[$row['csv_headofprovince']] : ''; ?></td>
                    <td><?php echo isset($arr_land_official[$row['csv_officeofprovince']]) ? $arr_land_official[$row['csv_officeofprovince']] : ''; ?></td>
                </tr>

            <?php } ?>
        </tbody>


    </table>
</div>

<div class="row" style="margin-top: 20px; font-size: 20px">
    <div class="text-danger col-sm-4">

        <p><?= t('សរុបមន្ត្រី ') ?>​ <?php echo $i . ' នាក់' ?></p> 
    </div>
    <div class="col-sm-5">
        <button class="btn btn-danger" id="save_db"><?php echo t('រក្សាទុកទៅកាន់ប្រព័ន្ធ') ?></button>
    </div>
</div>
<script type="text/javascript">

    var list_csv = <?php echo json_encode($list_array); ?>;


    $('#save_db').on('click', function () {

        save_to_db();

    });

    function save_to_db() {
        swal({
            title: 'តើពិតជាប្រាកដ រឺ អត់ ?',
            text: "តើលោក អ្នកពិតជាបញ្ចូលព័ត៌មានរបស់មន្ត្រីមែនទេ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'យល់ព្រម',
            cancelButtonText: 'ទេ',
            showLoaderOnConfirm: true,
            preConfirm: function () {
                return new Promise(function (resolve) {
                    $.ajax({
                        url: '<?php echo site_url('csv/csv_importexcel/save_to_db') ?>',
                        type: "post",
                        dataType: "json",
                        data: {unit_id:'<?php echo $get_unit_id ?>',csv_list: list_csv},
                        cache: false
                    }).done(function (data) {
                        if (data.status) {
                            swal({
                                title: 'ដោយជោគជ័យ ',
                                text: 'ការបញ្ចូលទិន្នន័យ ដោយជោគជ័យ',
                                type: 'success',
                                allowOutsideClick: false
                            });
                            setTimeout(function () {
                                window.location.href = "<?php echo site_url('csv/home/index') ?>";
                            }, 3000);
                        }
                    }).fail(function () {
                        swal('វោហ៍...', 'មានអ្វីខុស សូមឆែកម្តងទៀត', 'error');
                    });
                });
            },
            allowOutsideClick: false
        });
    }

</script>