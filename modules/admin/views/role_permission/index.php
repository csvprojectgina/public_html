<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= t('ការកំណត់សិទ្ធិអ្នកប្រើប្រាស់') ?></h3>
        </div>

        <div class="panel-body">  
            <ul>
                <?php
                if ($qr_role->num_rows() > 0) {
                    foreach ($qr_role->result() as $row) {
                        $str_chk = '';
                        $permission_id = $row->role_id - 0;
                        if ($permission_id > 0) {
                            $str_chk = 'checked';
                        }
                        ?>  
                
                        <li>
                            <input type="checkbox" value="<?= $row->id ?>" id="<?= $row->id ?>" class="ch_role" <?= $str_chk ?> />
                            <a href="javascript:void(0)" class="ch_role_a cl_role" data-id="<?= $row->id ?>"><?= $row->role_name ?></a>
                        </li>
                        
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</form>

<!------------------------------------------------->
<script type="text/javascript">
    $(function() {

        // get modules ================================
        $('.ch_role_a').click(function() {
            var cl_r = $(this);
            var ch_module_a = $(this).parent().find('.ch_module_name_a');
            if (ch_module_a.length == 0) {
                var id = $(this).data('id');
                var li = $(this);
                $.ajax({
                    url: '<?= site_url('admin/role_permission/get_module') ?>',
                    type: 'post',
                    async: false,
                    datatype: 'json',
                    data: {id: id},
                    success: function(data) {
                        var ul = '<ul>';
                        $.each(data, function(i, item) {
                            var permission_id = item.module_id - 0;
                            var str_chk = '';
                            if (permission_id > 0) {
                                str_chk = 'checked';
                            }

                            ul += '<li><input type="checkbox" class="ch_module_name" ' + str_chk + ' />&nbsp;' +
                                    '<a href="javascript:void(0)" class="ch_module_name_a cl_mode" data-id_r="' +
                                    id + '" data-id="' + item.id + '">' + item.note + '</a></li>';
                            // ul += '<li><div class="checkbox"><label class="ch_module_name_a" data-id="' + 
                            // item.id + '"><input type="checkbox" class="ch_module_name" />' + item.module_name + '</label></div></li>';
                        });
                        ul += '</ul>';
                        li.append(ul);
                    },
                    error: function() {

                    }
                });
            }
        });

        // get controllers =============================================
        $('body').delegate('.ch_module_name_a', 'click', function() {
            var ch_controller_a = $(this).parent().find('.ch_controller_a');

            if (ch_controller_a.length == 0) {
                var module_id = $(this).data('id');
                var role_id = $(this).data('id_r');
                var li = $(this);
                $.ajax({
                    url: '<?= site_url('admin/role_permission/get_controller') ?>',
                    type: 'post',
                    datatype: 'json',
                    async: false,
                    data: {role_id: role_id, module_id: module_id},
                    success: function(data) {
                        var ul = '<ul>';
                        $.each(data, function(i, item) {
                            var permission_id = item.controller_id - 0;
                            var str_chk = '';
                            if (permission_id > 0) {
                                str_chk = 'checked';
                            }
                            ul += '<li><input type="checkbox" class="ch_controller" ' + str_chk + '>&nbsp;' +
                                    '<a href="javascript:void(0)" class="ch_controller_a" data-id_r="' +
                                    role_id + '" data-id_mode="' + module_id + '" data-id="' + item.id +
                                    '">' + item.controller_name + '</a></li>';
                            // ul += '<li><div class="checkbox"><label class="ch_controller_a" data-id="' + 
                            // item.module_id + '"><input type="checkbox" class="ch_controller" />' + item.controller_name + '</label></div></li>';
                        });
                        ul += '</ul>';
                        li.append(ul);
                    },
                    error: function() {
                        alert('error!!');
                    }
                });
            }
        });

        // get actions =============================================
        $('body').delegate('.ch_controller_a', 'click', function() {
            var ch_action_a = $(this).parent().find('.ch_action_a');
            if (ch_action_a.length == 0) {
                var role_id = $(this).data('id_r');
                var module_id = $(this).data('id_mode');
                var controller_id = $(this).data('id');
                var li = $(this);
                $.ajax({
                    url: '<?= site_url('admin/role_permission/get_action') ?>',
                    type: 'post',
                    datatype: 'json',
                    async: false,
                    data: {role_id: role_id, controller_id: controller_id},
                    success: function(data) {
                        var ul = '<ul>';
                        $.each(data, function(i, item) {
                            var permission_id = item.action_id - 0;
                            var str_chk = '';
                            if (permission_id > 0) {
                                str_chk = 'checked';
                            }
                            ul += '<li><input type="checkbox" class="ch_action" ' + str_chk + '>&nbsp;' +
                                    '<a href="javascript:void(0)" class="ch_action_a" data-id_r="' + role_id +
                                    '" data-id_mode="' + module_id + '" data-id_c="' + controller_id +
                                    '" data-id="' + item.id + '">' + item.action_name + '</a></li>';
                            // ul += '<li><div class="checkbox"><label class="ch_action_a" data-id="' + 
                            // items.controller_id + '"><input type="checkbox" class="ch_controller" />' + items.action_name + '</label></div></li>';
                        });
                        ul += '</ul>';
                        li.append(ul);
                    },
                    error: function() {
                        alert('error!!');
                    }
                });
            }
        });

        // ========================================================================
        // insert mode. in roles ==============================
        $('body').delegate('.ch_module_name', 'change', function() {
            if (this.checked) {
                // add mode. in roles ========================
                var id_r = $(this).parent().find('.ch_module_name_a').data('id_r');
                var id_mode = $(this).parent().find('.ch_module_name_a').data('id');
                $.ajax({
                    url: '<?= site_url('admin/role_permission/insert_mode_in_r') ?>',
                    type: 'post',
                    datatype: 'html',
                    async: false,
                    data: {id_r: id_r, id_mode: id_mode},
                    success: function(d) {

                    },
                    error: function() {

                    }
                });
                // $(this).closest('li').find(':checkbox').prop("checked", true);

            } else {
                // del. mode. in roles ===========================
                var id_r = $(this).parent().find('.ch_module_name_a').data('id_r');
                var id_mode = $(this).parent().find('.ch_module_name_a').data('id');
                $.ajax({
                    url: '<?= site_url('admin/role_permission/del_mode_in_r') ?>',
                    type: 'post',
                    datatype: 'html',
                    async: false,
                    data: {id_r: id_r, id_mode: id_mode},
                    success: function(d) {

                    },
                    error: function() {

                    }
                });
                // $(this).closest('li').find(':checkbox').prop("checked", false);
            }
        });

        // insert controllers in roles ===================================
        $('body').delegate('.ch_controller', 'change', function() {
            if (this.checked) {
                // add con. in roles ============================
                var id_r = $(this).parent().find('.ch_controller_a').data('id_r');
                var id_con = $(this).parent().find('.ch_controller_a').data('id');
                $.ajax({
                    url: '<?= site_url('admin/role_permission/insert_con_in_r') ?>',
                    type: 'post',
                    datatype: 'html',
                    async: false,
                    data: {id_r: id_r, id_con: id_con},
                    success: function(d) {

                    },
                    error: function() {

                    }
                });
                // $(this).closest('li').find(':checkbox').prop("checked", true);

            } else {
                // del. con. in roles ===============================
                var id_r = $(this).parent().find('.ch_controller_a').data('id_r');
                var id_con = $(this).parent().find('.ch_controller_a').data('id');
                $.ajax({
                    url: '<?= site_url('admin/role_permission/del_con_in_r') ?>',
                    type: 'post',
                    datatype: 'html',
                    async: false,
                    data: {id_r: id_r, id_con: id_con},
                    success: function(d) {

                    },
                    error: function() {

                    }
                });
                // $(this).closest('li').find(':checkbox').prop("checked", false);
            }
        });

        // insert actions in roles =====================================
        $('body').delegate('.ch_action', 'change', function() {
            if (this.checked) {
                // add con. in roles ==========================
                var id_r = $(this).parent().find('.ch_action_a').data('id_r');
                var id_a = $(this).parent().find('.ch_action_a').data('id');
                $.ajax({
                    url: '<?= site_url('admin/role_permission/insert_act_in_r') ?>',
                    type: 'post',
                    datatype: 'html',
                    async: false,
                    data: {id_r: id_r, id_a: id_a},
                    success: function(d) {

                    },
                    error: function() {

                    }
                });
                // $(this).closest('li').find(':checkbox').prop("checked", true);

            } else {
                // del. action in roles =========================
                var id_r = $(this).parent().find('.ch_action_a').data('id_r');
                var id_a = $(this).parent().find('.ch_action_a').data('id');
                $.ajax({
                    url: '<?= site_url('admin/role_permission/del_act_in_r') ?>',
                    type: 'post',
                    datatype: 'html',
                    async: false,
                    data: {id_r: id_r, id_a: id_a},
                    success: function(d) {

                    },
                    error: function() {

                    }
                });
                // $(this).closest('li').find(':checkbox').prop("checked", false);
            }
        });

    });
</script>


