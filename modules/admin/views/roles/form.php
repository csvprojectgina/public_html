<?php
$id = isset($id) ? $id : 0;
?>
<form class="form-horizontal" role="form" action="<?= site_url('admin/roles/insert') ?>" method="post"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php
            if ($id == 0) {
                ?>
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូលព័ត៌មានតួនាទី') ?></h3>        
            <?php } else {
                ?>
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/edit_road_detail.gif') ?>" /> <?= t('កែព័ត៌មានតួនាទី') ?></h3> 
            <?php }
            ?>
            <input id="id" type="hidden" value="<?= set_value('id', isset($row->id) ? $row->id : '') ?>" name="id" >
        </div>
        <div class="panel-body">        
            <?php
            $validation_errors = validation_errors();
            if ($validation_errors != '') {
                echo '<div class="alert alert-danger">' . $validation_errors . '</div>';
            }
            ?>

            <div class="form-group">
                <label for="role_name" class="col-sm-2 control-label"><?= t('តួនាទី') ?></label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control"  value="<?= set_value('role_name', isset($row->role_name) ? $row->role_name : '') ?>"  id="role_name" placeholder="តួនាទី" name="role_name">
                </div>
            </div>
            <div class="form-group">
                <label for="sub_of_role_id" class="col-sm-2 control-label"><?= t('តួនាទីរងនៃ') ?></label>
                <div class="col-sm-10">
                    <select class="form-control"  id="sub_of_role_id" placeholder="តួនាទីរងនៃ" name="sub_of_role_id">
                        <?= getoption("SELECT id, role_name FROM z_roles", "id", "role_name", set_value('sub_of_role_id', isset($row->sub_of_role_id) ? $row->sub_of_role_id : ''), true) ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg" >
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
            window.location = '<?= site_url('admin/roles') ?>';
        });

        $('#sub_of_role_id').on('change', function() {
            var id = $('#id').val() - 0;
            var t = $(this).val() - 0;
            if (id > 0 && id === t) {
                $(this).val('');
            }
        });
    });
</script>