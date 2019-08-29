<?php
$id = isset($id) ? $id : 0;
?>
<form class="form-horizontal" role="form" action="<?= site_url('admin/users/insert') ?>" method="post"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php
            if ($id == 0) {
                ?>
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូលព័ត៌មានលំអិតអ្នកប្រើប្រាស់') ?></h3>        
            <?php } else {
                ?>
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/edit_road_detail.gif') ?>" /> <?= t('កែព័ត៌មានលំអិតអ្នកប្រើប្រាស់').": ".(isset($row->full_name) ? $row->full_name : '') ?></h3> 
            <?php }
            ?>
            <input type="hidden" value="<?= set_value('id', isset($row->id) ? $row->id : '') ?>" name="id" >
        </div>
        <div class="panel-body">        
            <?php
            $validation_errors = validation_errors();
            if ($validation_errors != '') {
                echo '<div class="alert alert-danger">' . $validation_errors . '</div>';
            }
            ?>

            <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label"><?= t('ឈ្មោះអ្នកប្រើប្រាស់') ?></label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control"  value="<?= set_value('user_name', isset($row->user_name) ? $row->user_name : '') ?>"  id="user_name" placeholder="ឈ្មោះអ្នកប្រើប្រាស់" name="user_name">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label"><?= t('លេខសំងាត់') ?></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="លេខសំងាត់" name="password">
                </div>
            </div>
            <div class="form-group">
                <label for="passconf" class="col-sm-2 control-label"><?= t('បញ្ជាក់លេខសំងាត់') ?></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="passconf" placeholder="បញ្ជាក់លេខសំងាត់" name="passconf">
                </div>
            </div>
            <div class="form-group">
                <label for="full_name" class="col-sm-2 control-label"><?= t('គោត្តនាម និងនាម') ?></label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control"  value="<?= set_value('full_name', isset($row->full_name) ? $row->full_name : '') ?>"  id="full_name" placeholder="គោត្តនាម និងនាមអ្នកប្រើប្រាស់" name="full_name">
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-2 control-label"><?= t('អាស័យដ្ឋាន') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('address', isset($row->address) ? $row->address : '') ?>"  id="address" placeholder="អាស័យដ្ឋាន" name="address">
                </div>
            </div>
            <div class="form-group">
                <label for="e_mail" class="col-sm-2 control-label"><?= t('អ៊ីមែល') ?></label>
                <div class="col-sm-10">
                    <input required type="email" class="form-control"  value="<?= set_value('e_mail', isset($row->e_mail) ? $row->e_mail : '') ?>"  id="e_mail" placeholder="អ៊ីមែល" name="e_mail">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label"><?= t('លេខទូរស័ព្ទ') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('លេខទូរស័ព្ទ', isset($row->phone) ? $row->phone : '') ?>"  id="phone" placeholder="លេខទូរស័ព្ទ" name="phone">
                </div>
            </div>
            <div class="form-group">
                <label for="fax" class="col-sm-2 control-label"><?= t('លេខទូរសារ') ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?= set_value('fax', isset($row->fax) ? $row->fax : '') ?>" id="fax" placeholder="លេខទូរសារ" name="fax">
                </div>
            </div>
            <div class="form-group">
                <label for="dmid" class="col-sm-2 control-label"><?= t('តួនាទី') ?></label>
                <div class="col-sm-10">
                    <select required class="form-control"  id="dmid" name="dmid">
                        <?= getoption("SELECT id, role_name FROM z_roles ORDER BY role_name;", "id", "role_name", set_value('dmid', isset($row->dmid) ? $row->dmid : ''), true) ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="pr_code" class="col-sm-2 control-label"><?= t('អង្គភាព (ទទួលបន្ទុក)') ?></label>
                <div class="col-sm-10">
                    <?php
                    $qr = query("SELECT
                                    pr.id,
                                    pr.khmer_name
                            FROM
                                    province AS pr
                            ORDER BY
                                    pr.khmer_name ");
                    $opt = array('' => '');
                    if ($qr->num_rows() > 0) {
                        foreach ($qr->result() as $row) {
                            $opt[$row->id] = $row->khmer_name;
                        }
                    }
                    $qr_ = query("SELECT
                                    u.pr_code
                            FROM
                                    users AS u
                            WHERE
                                    u.id = '{$id}' ");
                    if ($qr_->num_rows() > 0) {
                        $row = $qr_->row()->pr_code;
                        $arr_opt = explode(",", $row);
                    }
                    ?> 
                    <?php  echo form_dropdown("pr_code[]", (isset($opt) ? $opt : ''), (isset($arr_opt) ? $arr_opt : ''), 'size = "26" class="form-control" id="pr_code" multiple="multiple"'); ?>
                </div>
            </div>
            <!-- one select ------------------------------------>
            <!--            <div class="form-group">
                            <label for="pr_code" class="col-sm-2 control-label"><?= t('រាជធានី-ខេត្ត') ?></label>
                            <div class="col-sm-10">
                                <select class="form-control"  id="pr_code" name="pr_code[]" multiple="multiple" size="28">
            <?php /* ?>
              <?= getoption("SELECT pr.id,pr.province_name,pr.khmer_name FROM province AS pr ORDER BY pr.province_name", "id", "province_name", set_value('pr_code', isset($row->pr_code) ? $row->pr_code : ''), true) ?>
              <?php */ ?>
                                </select>
                            </div>
                        </div>-->
            <!-------------------------------------------------->
            <div class="form-group">
                <label for="note" class="col-sm-2 control-label"><?= t('សម្គាល់') ?></label>
                <div class="col-sm-10">
                    <textarea data-toggle="tooltip" data-placement="left" title="សម្គាល់" class="form-control" name="note" id="note" rows="2" placeholder="សម្គាល់"><?= set_value('note', isset($row->note) ? $row->note : '') ?></textarea>
                </div>
            </div>
        </div>

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg">
                <button name="submit" type="submit" class="btn btn-default" value="save"><?= t('រក្សាទុក') ?></button>
                <button name="submit" type="submit" class="btn btn-default" value="save_back"><?= t('រក្សាទុកថយក្រោយ') ?></button>
                <button id="back" type="button" class="btn btn-default"><?= t('ថយក្រោយ') ?></button>
            </div>
        </div>

    </div>
</form>

<script type="text/javascript">
    $(function() {
        $('#back').on('click', function() {
            window.location = '<?= site_url('admin/users') ?>';
        });
    });
</script>