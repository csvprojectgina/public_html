<html>
    <head><title></title>
    </head>
    <body style='background-color: #F1F1F1;'>

    </body>
</html>

<div style="border:1px solid #cccccc;margin-left:auto;margin-right:auto;width:700px; height:auto;border-radius: 5px;background-color: #ffffff;">
    <form class="form-horizontal" role="form" action="<?= site_url('admin/login/gologin') ?>" method="post"  autocomplete="off">
        <input type="hidden" value="<?= set_value('id', isset($row->id) ? $row->id : '') ?>" name="id" />
        <div style="margin: 20 20 0 20;border-bottom: 1px solid #cccccc;text-align: center;padding-bottom: 20px;">
            <img width="" src="<?= base_url('assets/bs/css/images/logo.gif') ?>" /> 
        </div>

        <div style="margin: 40 20 0 20;padding: 0 0 20 0">
            <?php
            $validation_errors = validation_errors();
            if ($validation_errors != '') {
                echo '<div class="alert alert-danger">' . $validation_errors . '</div>';
            }
            if (isset($failedlogin)) {
                echo '<div class="alert alert-danger">' . $failedlogin . '</div>';
            }
            ?>
        </div>

        <div style="margin: 0 20 0 20;padding: 0 0 20 0;">
            <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label"><?= t('អ្នកប្រើប្រាស់') ?></label>
                <div class="col-sm-10">
                    <input type="text" validate_act class="form-control"  value="<?= set_value('user_name', isset($row->user_name) ? $row->user_name : '') ?>"  id="user_name" placeholder="ឈ្មោះអ្នកប្រើប្រាស់ ឬ អ៊ីមែល" name="user_name">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label"><?= t('លេខសំងាត់') ?></label>
                <div class="col-sm-10">
                    <input type="password" validate_act class="form-control" id="password" placeholder="លេខសំងាត់" name="password">
                </div>
            </div>
            <div style="text-align: right;margin: 50px 0 0 0;">
                <button name="submit" type="submit" class="btn btn-default" value="save"><?= t('យល់ព្រម') ?></button>                
                <button id="back" type="button" class="btn btn-default"><?= t('ចាកចេញ') ?></button>
            </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        $('#user_name:first').focus();

        function CloseThis() {
            var win = window.open('', '_self');
            window.close();
            win.close();
            return false;
        }

        $('#back').on('click', function() {
            CloseThis();
        });

        $('input').bind('keypress', function(e) {
            if (e.keyCode === 13) {
                $('form').submit();
            }
        });

    });
</script>