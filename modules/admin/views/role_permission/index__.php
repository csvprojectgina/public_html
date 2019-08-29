<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= t('ការកំណត់សិទ្ធិអ្នកប្រើប្រាស់') ?></h3>
        </div>

        <div class="panel-body">  
            <ul>
                <?php foreach ($qr_role as $row) { ?>   
                    <li>
                        <input type="checkbox" value="<?= $row->id ?>" id="<?= $row->id ?>" class="ch_role">
                        <a href="javascript:void(0)" class="ch_role_a" data-id="<?= $row->id ?>"><?= $row->role_name ?></a>
                        <!--                        <div class="checkbox">
                                                    <label class="ch_role_a" data-id="<?= $row->id ?>">
                                                        <input type="checkbox" value="<?= $row->id ?>" id="<?= $row->id ?>" class="ch_role">
                        <?= $row->role_name ?>
                                                    </label>
                                                </div>    -->
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</form>

<!------------------------------------------------->
<script type="text/javascript">
//    function chk_roles() {
//        var chk = true;
//        $('.ch_role').each(function() {
//            var chkk = $this.checked;
//            if (!chkk) {
//                chk = false;
//            }
//        });
//    }

    $(function() {

        // modules =============================================
        $('.ch_role_a').click(function() {
            var ch_module_a = $(this).parent().find('.ch_module_name_a');
            if (ch_module_a.length == 0) {
                var id = $(this).data('id');
                var li = $(this);
                $.ajax({
                    url: '<?= site_url('admin/role_permission/get_module') ?>',
                    type: 'post',
                    async: false,
                    dataType: 'json',
                    data: {id: id},
                    success: function(d_ul_m) {
                        var ul = '<ul>';
                        $.each(d_ul_m, function(i, item) {
                            ul += '<li><input type="checkbox" class="ch_module_name" />' +
                                    '<a href="javascript:void(0)" class="ch_module_name_a" data-id="' + item.id + '">' + item.module_name + '</a></li>';
                            // ul += '<li><div class="checkbox"><label class="ch_module_name_a" data-id="' + item.id + '"><input type="checkbox" class="ch_module_name" />' + item.module_name + '</label></div></li>';
                        });
                        ul += '</ul>';
                        li.append(ul);
                    },
                    error: function() {

                    }
                });
            }
        });

        // controllers =============================================
        $('body').delegate('.ch_module_name_a', 'click', function() {
            var ch_controller_a = $(this).parent().find('.ch_controller_a');
            if (ch_controller_a.length == 0) {
                var module_id = $(this).data('id');
                var li = $(this);
                $.ajax({
                    url: '<?= site_url('admin/role_permission/get_controller') ?>',
                    type: 'post',
                    dataType: 'json',
                    async: false,
                    data: {module_id: module_id},
                    success: function(d_ul_c) {
                        var ul = '<ul>';
                        $.each(d_ul_c, function(ii, item) {
                            ul += '<li><input type="checkbox" class="ch_controller">' +
                                    '<a href="javascript:void(0)" class="ch_controller_a" data-id="' + item.module_id + '">' + item.controller_name + '</a></li>';
                            // ul += '<li><div class="checkbox"><label class="ch_controller_a" data-id="' + item.module_id + '"><input type="checkbox" class="ch_controller" />' + item.controller_name + '</label></div></li>';
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

        // actions =============================================
        $('body').delegate('.ch_controller_a', 'click', function() {
            var ch_action_a = $(this).parent().find('.ch_action_a');
            if (ch_action_a.length == 0) {
                var controller_id = $(this).data('id');
                var li = $(this);
                $.ajax({
                    url: '<?= site_url('admin/role_permission/get_action') ?>',
                    type: 'post',
                    dataType: 'json',
                    async: false,
                    data: {controller_id: controller_id},
                    success: function(d_ul_a) {
                        var ul = '<ul>';
                        $.each(d_ul_a, function(iii, items) {
                            ul += '<li><input type="checkbox" class="ch_action">' +
                                    '<a href="javascript:void(0)" class="ch_action_a" data-id="' + items.controller_id + '">' + items.action_name + '</a></li>';
                            // ul += '<li><div class="checkbox"><label class="ch_action_a" data-id="' + items.controller_id + '"><input type="checkbox" class="ch_controller" />' + items.action_name + '</label></div></li>';
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

        // role check ========================================================
        $('body').delegate('.ch_role', 'change', function() {
            if (this.checked) {
                $(this).closest('li').find(':checkbox').prop("checked", true);

                // add roles =============================
                var r_id = $(this).parent().find('.ch_role_a').data('id');
                //var mode_id = $(this).parent().find('.ch_module_name_a').data('id');
                
                $.ajax({
                    url: '<?= site_url('admin/role_permission/insert_role') ?>',
                    type: 'post',
                    dataType: 'html',
                    async: false,
                    data: {r_id: r_id},
                    success: function(d) {

                    },
                    error: function() {

                    }
                });

            } else {
                $(this).closest('li').find(':checkbox').prop("checked", false);
            }
        });

        // ====================================================================
        $('body').delegate('.ch_module_name', 'change', function() {
            if (this.checked) {

                // add mode. =================================
                // var id_mode = $(this).parent().parent().parent().parent().find('.ch_role_a').data('id');
                var id_mode = $(this).parent().parent().parent().prop("checked", true);

//                $.ajax({
//                    url: '<?= site_url('admin/role_permission/insert_mode') ?>',
//                    type: 'post',
//                    dataType: 'html',
//                    async: false,
//                    data: {id_mode: id_mode},
//                    success: function(d) {
//
//                    },
//                    error: function() {
//
//                    }
//                });

                // ========================================   
                $(this).closest('li').find(':checkbox').prop("checked", true);
            } else {
                $(this).closest('li').find(':checkbox').prop("checked", false);
            }
        });

        // ==============================================
        $('body').delegate('.ch_controller', 'change', function() {
            if (this.checked) {
                $(this).closest('li').find(':checkbox').prop("checked", true);
            } else {
                $(this).closest('li').find(':checkbox').prop("checked", false);
            }
        });

    });
</script>

