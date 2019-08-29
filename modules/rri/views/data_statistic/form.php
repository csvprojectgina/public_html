<?php
$id = isset($id) ? $id : 0;
?>
<form class="form-horizontal" role="form" action="<?= site_url('rri/data_statistic/insert') ?>" method="post"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php
            if ($id == 0) {
                ?>
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូលព័ត៌មានខ្សែផ្លូវតាមសិ្ថតិ') ?></h3>        
            <?php } else {
                ?>
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/edit_road_detail.gif') ?>" /> <?= t('កែព័ត៌មានខ្សែផ្លូវតាមសិ្ថតិ') ?></h3> 
            <?php }
            ?>
            <input type="hidden" value="<?= set_value('no', isset($row->no) ? $row->no : '') ?>" name="no" id="no" />
        </div>
        <div class="panel-body">        
            <?php
            $validation_errors = validation_errors();
            if ($validation_errors != '') {
                echo '<div class="alert alert-danger">' . $validation_errors . '</div>';
            }
            ?>
            <div class="form-group">
                <label for="pro_id" class="col-sm-2 control-label"><?= t('រាជធានី-ខេត្ត') ?></label>
                <div class="col-sm-10">
                    <select data-toggle="tooltip" data-placement="left" title="រាជធានី-ខេត្ត (ឧ.​ រាជធានីភ្នំពេញ...)" validate_act class="form-control"  id="pro_id" placeholder="" name="pro_id">
                        <?php ?><?= getoption("SELECT
                                                        pr.id,
                                                        pr.khmer_name
                                                FROM
                                                        province AS pr
                                                WHERE 
                                                        pr.id = '{$row->pro_code}'        
                                                ORDER BY
                                                        pr.khmer_name ", "id", "khmer_name", set_value('pro_code', isset($row->pro_code) ? $row->pro_code : ''), true) ?>
                        <?php ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="total_line" class="col-sm-2 control-label"><?= t('សរុបខ្សែ') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('total_line', isset($row->total_line) ? $row->total_line : '') ?>"  id="total_line" placeholder="" name="total_line">
                </div>
            </div>
            <div class="form-group">
                <label for="total_length" class="col-sm-2 control-label"><?= t('សរុបរួមប្រវែង (គ.ម)') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('total_length', isset($row->total_length) ? $row->total_length : '') ?>"  id="total_length" placeholder="" name="total_length">
                </div>
            </div>
            <div class="form-group">
                <label for="total_line_type1" class="col-sm-2 control-label"><?= t('ខ្សែប្រភេទទី ១') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('total_line_type1', isset($row->total_line_type1) ? $row->total_line_type1 : '') ?>"  id="total_line_type1" placeholder="" name="total_line_type1">
                </div>
            </div>
            <div class="form-group">
                <label for="total_length_type1" class="col-sm-2 control-label"><?= t('ប្រវែងប្រភេទទី ១ (គ.ម)') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('total_length_type1', isset($row->total_length_type1) ? $row->total_length_type1 : '') ?>"  id="total_length_type1" placeholder="" name="total_length_type1">
                </div>
            </div>
            <div class="form-group">
                <label for="total_line_type2" class="col-sm-2 control-label"><?= t('ខ្សែប្រភេទទី ២') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('total_line_type2', isset($row->total_line_type2) ? $row->total_line_type2 : '') ?>"  id="total_line_type2" placeholder="" name="total_line_type2">
                </div>
            </div>
            <div class="form-group">
                <label for="total_length_type2" class="col-sm-2 control-label"><?= t('ប្រវែងប្រភេទទី ២ (គ.ម)') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('total_length_type2', isset($row->total_length_type2) ? $row->total_length_type2 : '') ?>"  id="total_length_type2" placeholder="" name="total_length_type2">
                </div>
            </div>
            <div class="form-group">
                <label for="total_line_type3" class="col-sm-2 control-label"><?= t('ខ្សែប្រភេទទី ៣') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('total_line_type3', isset($row->total_line_type3) ? $row->total_line_type3 : '') ?>"  id="total_line_type3" placeholder="" name="total_line_type3">
                </div>
            </div>
            <div class="form-group">
                <label for="total_length_type3" class="col-sm-2 control-label"><?= t('ប្រវែងប្រភេទទី ៣ (គ.ម)') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('total_length_type3', isset($row->total_length_type3) ? $row->total_length_type3 : '') ?>"  id="total_length_type3" placeholder="" name="total_length_type3">
                </div>
            </div>
            <div class="form-group">
                <label for="total_line_type4" class="col-sm-2 control-label"><?= t('ខ្សែប្រភេទទី ៤') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('total_line_type4', isset($row->total_line_type4) ? $row->total_line_type4 : '') ?>"  id="total_line_type4" placeholder="" name="total_line_type4">
                </div>
            </div>
            <div class="form-group">
                <label for="total_length_type4" class="col-sm-2 control-label"><?= t('ប្រវែងប្រភេទទី ៤ (គ.ម)') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('total_length_type4', isset($row->total_length_type4) ? $row->total_length_type4 : '') ?>"  id="total_length_type4" placeholder="" name="total_length_type4">
                </div>
            </div>

        </div>

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg" >
                <button name="submit" type="submit" class="btn btn-default" value="save"><?= t('រក្សាទុក') ?></button>
                <button id="back" type="button" class="btn btn-default"><?= t('ថយក្រោយ') ?></button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function() {
        $('#back').on('click', function() {
            window.location = '<?= site_url('rri/data_statistic/index') ?>';
        });
    });
</script>