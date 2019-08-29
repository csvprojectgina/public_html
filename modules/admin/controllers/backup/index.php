<!--<form class="form-horizontal" role="form" action="<?= site_url('rri/backup') ?>" method="post"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= t('ការចម្លងរក្សាទុក Form') ?></h3>
            <input type="hidden" value="<?= set_value('id', isset($row->id) ? $row->id : '') ?>" name="id" >
        </div>
        
        <div class="panel-body">        

            <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label"><?= t('') ?></label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control"  value="<?= set_value('user_name', isset($row->user_name) ? $row->user_name : '') ?>"  id="user_name" placeholder="..." name="user_name">
                </div>
            </div>
            
        </div>
        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg" >
                <button name="submit" type="submit" class="btn btn-default" value="save"><?= t('យល់ព្រម') ?></button>
                <button name="submit" type="submit" class="btn btn-default" value="save_back"><?= t('រក្សាទុកថយក្រោយ') ?></button>
                <button id="back" type="button" class="btn btn-default"><?= t('បិទ') ?></button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function() {
                function CloseThis() {
                        var win = window.open('', '_self');
                        window.close();
                        win.close();
                        return false;
                }
        $('#back').on('click', function() {
            CloseThis();
        });
    });
</script>-->

<?php
//if ($db_resource = mysql_connect($db_server, $db_username, $db_password, $db_newlink)) {
//    if (mysql_select_db($db_name, $db_resource)) {
//        $backupFile = $db_name . "_" . date("Y-m-d-H-i-s") . ".gz";
//        $command = "mysqldump --opt -h " . $db_server . " -u " . $db_username . " -p " . $db_password . " " . $db_name . " | gzip > " . $db_save_dir . "/" . $backupFile;
//        system($command);
//    }
//}
//
//mysql_close($db_resource);
?>