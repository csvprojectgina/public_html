<?php
$id = isset($id) ? $id : 0;
?>

<form class="form-horizontal" role="form" action="<?= site_url('rri/plan/insert') ?>" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php
            if ($id == 0) {
                ?>
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('') ?></h3>        
            <?php } else {
                ?>                
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/edit_road_detail.gif') ?>" /> <?= t('Edit Plan') . (isset($query_pro_id->khmer_name) ? t('​​ : ខេត្ត ') . $query_pro_id->khmer_name : '') ?></h3>
            <?php }
            ?>
            <input type="hidden" class="form-control" value="<?= set_value('road_id', $id) ?>"  id="road_id" name="road_id" /> 
            <input type="hidden" class="form-control" value="<?= set_value('id', isset($row_->id) ? $row_->id : '') ?>"  id="id" name="id" /> 
        </div>

        <div class="panel-body"> 
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label"><?= t('Resource Name:') ?></label>
                <div class="col-sm-10">
                    <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('title', isset($row->title) ? $row->title : '') ?>" id="title" placeholder="" name="title">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label"><?= t('Manpower, Plant and Equipment:') ?></label>
                <div class="col-sm-10">
                    <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('description', isset($row->description) ? $row->description : '') ?>" id="description" placeholder="" name="description">
                </div>
            </div>
            <div class="form-group">
                <label for="comment" class="col-sm-2 control-label"><?= t('Notes and Comments:') ?></label>
                <div class="col-sm-10">
                    <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('comment', isset($row->comment) ? $row->comment : '') ?>" id="comment" placeholder="" name="comment">
                </div>
            </div>
            <div class="form-group">
                <label for="resource_type_options" class="col-sm-2 control-label"><?= t('Resource Classes:') ?></label>
                <div class="col-sm-10">
                    <select class="form-control" id="supervision_quality" placeholder="" name="supervision_quality">
                        <?php ?>
                        <?= getoption("SELECT * FROM province ORDER BY province_name", "id", "province_name", set_value('pro_id', isset($row->pro_id) ? $row->pro_id : ''), true) ?>
                        <?php ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="resource_class_options" class="col-sm-2 control-label"><?= t('Resource Type:') ?></label>
                <div class="col-sm-10">
                    <select class="form-control" id="supervision_quality" placeholder="" name="supervision_quality">
                        <?php ?>
                        <?= getoption("SELECT * FROM province ORDER BY province_name", "id", "province_name", set_value('pro_id', isset($row->pro_id) ? $row->pro_id : ''), true) ?>
                        <?php ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="dly_op_cost_lab" class="col-sm-2 control-label"><?= t('Labour:') ?></label>
                <div class="col-sm-10">
                    <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('dly_op_cost_lab', isset($row->dly_op_cost_lab) ? $row->dly_op_cost_lab : '') ?>" id="dly_op_cost_lab" placeholder="" name="dly_op_cost_lab">
                    <input type="button" value="L" />
                </div>                
            </div>
            <div class="form-group">
                <label for="dly_op_cost_plan" class="col-sm-2 control-label"><?= t('Plant:') ?></label>
                <div class="col-sm-10">
                    <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('dly_op_cost_plan', isset($row->dly_op_cost_plan) ? $row->dly_op_cost_plan : '') ?>" id="dly_op_cost_plan" placeholder="" name="dly_op_cost_plan">
                    <input type="button" value="L" />
                </div>
            </div>
            <div class="form-group">
                <label for="dly_op_cost_mat" class="col-sm-2 control-label"><?= t('Materials:') ?></label>
                <div class="col-sm-10">
                    <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('dly_op_cost_mat', isset($row->dly_op_cost_mat) ? $row->dly_op_cost_mat : '') ?>" id="dly_op_cost_mat" placeholder="" name="dly_op_cost_mat">
                    <input type="button" value="L" />
                </div>
            </div>
            <div class="form-group">
                <label for="resource_oh" class="col-sm-2 control-label"><?= t('Overheads:') ?></label>
                <div class="col-sm-10">
                    <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('resource_oh', isset($row->resource_oh) ? $row->resource_oh : '') ?>" id="resource_oh" placeholder="" name="resource_oh">
                    <input type="button" value="L" />
                </div>
            </div>
            <div class="form-group">
                <label for="work_hrs_per_day" class="col-sm-2 control-label"><?= t('Working Day:') ?></label>
                <div class="col-sm-10">
                    <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('work_hrs_per_day', isset($row->work_hrs_per_day) ? $row->work_hrs_per_day : '') ?>" id="work_hrs_per_day" placeholder="" name="work_hrs_per_day">
                </div>
            </div>
            <div class="form-group">
                <label for="on_duty_daily_travel_time" class="col-sm-2 control-label"><?= t('Daily Travel Time:') ?></label>
                <div class="col-sm-10">
                    <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('on_duty_daily_travel_time', isset($row->on_duty_daily_travel_time) ? $row->on_duty_daily_travel_time : '') ?>" id="on_duty_daily_travel_time" placeholder="" name="on_duty_daily_travel_time">
                </div>
            </div>
            <div class="form-group">
                <label for="supervision_quality" class="col-sm-2 control-label"><?= t('Supervision Quality:') ?></label>
                <div class="col-sm-10">
                    <select class="form-control" id="supervision_quality" placeholder="" name="supervision_quality">
                        <?php ?>
                        <?= getoption("SELECT * FROM province ORDER BY province_name", "id", "province_name", set_value('pro_id', isset($row->pro_id) ? $row->pro_id : ''), true) ?>
                        <?php ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="pe_quatity" class="col-sm-2 control-label"><?= t('Plant and Equipment Quality:') ?></label>
                <div class="col-sm-10">
                    <select class="form-control" id="pe_quatity" placeholder="" name="pe_quatity">
                        <?php ?>
                        <?= getoption("SELECT * FROM province ORDER BY province_name", "id", "province_name", set_value('pro_id', isset($row->pro_id) ? $row->pro_id : ''), true) ?>
                        <?php ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="road_name" class="col-sm-2 control-label"><?= t('Resource Name:') ?></label>
                <div class="col-sm-10">
                    <select class="form-control" id="supervision_quality" placeholder="" name="supervision_quality">
                        <?php ?>
                        <?= getoption("SELECT * FROM province ORDER BY province_name", "id", "province_name", set_value('pro_id', isset($row->pro_id) ? $row->pro_id : ''), true) ?>
                        <?php ?>
                    </select>
                </div>
            </div>
        </div><!-- end body ----------------------------->

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg">
                <!--<button data-toggle="tooltip" data-placement="left" title="រក្សាទុក" name="submit" type="submit" class="btn btn-default glyphicon glyphicon-save" value="save"> <?= t('Save') ?></button>-->
                <button data-toggle="tooltip" data-placement="left" title="រក្សាទុក និងត្រលប់ក្រោយ" name="submit" type="submit" class="btn btn-default glyphicon glyphicon-circle-arrow-left" value="save_back">​ <?= t('Save') ?></button>
                <button data-toggle="tooltip" data-placement="left" title="ត្រលប់ក្រោយ" id="back" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left"> <?= t('Back') ?></button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function() {
        $("#tabs").tabs();

        $('#back').on('click', function() {
            window.location = "<?= site_url('rri/plan/index') ?>";
        });

    }); // end ready fun. ====================
</script>