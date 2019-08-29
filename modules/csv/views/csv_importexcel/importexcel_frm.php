
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
                        <?php foreach ($unituery as $keyrow) { ?>
                            <!-- <option>ទីស្ដីការក្រសួង</option> -->

                            <option data-id="<?php echo @$keyrow->id; ?>"
                                    data-name="<?php echo @$keyrow->unit_english; ?>"
                                    value="<?php echo $keyrow->id; ?>"><?php echo @$keyrow->unit; ?></option>

                        <?php }; ?>
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
    }
    else return true;
}
</script>