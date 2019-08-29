<style media="screen">
    /*body { padding-top:20px; }*/
    .panel-body .btn:not(.btn-block) {margin-bottom:10px; }
    .btn-default{padding: 5px;}
</style>
<?php
$id = isset($id) ? $id : 0;
?>
<form class="form-horizontal f_save" role="form" method="post" id="f_save" >
    <div class="panel panel-default ">
        <div class="panel-heading">
            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/new.gif') ?>" />--> <?= t('បញ្ចូលអង្គភាពថ្មី') ?></h3>
            <input type="hidden" name="id" id="id" class="id" value="<?= $id ?>" />
        </div>
        <div class="panel-body ">
            <!-- personal info. -->
            <div class="col-sm-12">
                <div class="modal-body">
                    <div class="bs-example">
                        <div class="form-group">
                            <label for="unit" class="col-sm-2 control-label"><?= t('អង្គភាព') ?></label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="unit" name="unit" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញអង្គភាព" maxlength="255" value="<?= set_value('unit', isset($row_w->unit) ? $row_w->unit : '') ?>" />
                                <select class="form-control" name="uid" id="uid">
                                    <?php
                                    foreach ($unitquery as $keyrow) {
                                        $is_selected = '';
                                        if ($keyrow->id == $row->u_id) {
                                            $is_selected = "selected";
                                        }
                                        ?>

                                        <option data-id="<?php echo @$keyrow->id; ?>"
                                                data-name="<?php echo @$keyrow->unit; ?>"
                                                value="<?php echo $keyrow->id; ?>" <?php echo $is_selected ?>><?php echo @$keyrow->unit; ?></option>
                                            <?php }; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label"><?= t('បញ្ជូលអគ្គនាយកដ្ឌាន') ?></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="general_dep_id" id="general_dep_id">
                                  <option value=""></option>
                                    <?php
                                    foreach ($gdquery as $keyrow) {
                                        $is_selected = '';
                                        if ($keyrow->general_dep_id == $row->general_deps_id) {
                                            $is_selected = "selected";
                                        }
                                        ?>

                                        <option data-id="<?php echo @$keyrow->general_dep_id; ?>"
                                                data-name="<?php echo @$keyrow->general_deps_name; ?>"
                                                  value="<?php echo $keyrow->general_dep_id; ?>" <?php echo $is_selected ?>><?php echo @$keyrow->general_deps_name; ?></option>
                                            <?php }; ?>
                                </select>
                                <input type="hidden" name="general_dep_id" value="<?php echo @$row->general_deps_id; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label"><?= t('បញ្ជូលនាយកដ្ឌាន') ?></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="departments_id" id="departments_id">
                                    <?php
                                    foreach ($dpquery as $keyrow) {
                                        $is_selected = '';
                                        if ($keyrow->d_id == $row->departments_id) {
                                            $is_selected = "selected";
                                        }
                                        ?>
                                        <option data-id="<?php echo @$keyrow->d_id; ?>"
                                                data-name="<?php echo @$keyrow->d_name; ?>"
                                                  value="<?php echo $keyrow->d_id; ?>" <?php echo $is_selected ?>><?php echo @$keyrow->d_name; ?></option>
                                            <?php }; ?>
                                </select>
                                <input type="hidden" name="d_id" value="<?php echo @$row->d_id; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"  class="col-sm-2 control-label" >បញ្ជូលការិយាល័យ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="office" id="office" placeholder="បញ្ជូលការិយាល័យ">
                                <input type="hidden" name="office" value="<?php echo @$row->id; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                            </div>
                            <div class="col-md-3 text-right  col-sm-3" style="padding:0px;">
                                <div class="btn-group  btn-group-lg">
                                    <button class="btn btn-default" id="btnsave" type="submit"><span class="glyphicon glyphicon-save"></span>រក្សាទុក</button>
                                    <button type="button" class="btn btn-default " id="back"><span class="glyphicon glyphicon-arrow-left"></span>ថយក្រោយ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- tabs ------------------->
    </div><!-- f. body ------------------>

</div>
</form>
<!-- js -->
<script type="text/javascript">
    $(function () {
        $('#back').on('click', function () {
            window.location = 'javascript:history.go(-1)';
            // window.location = 'javascript:history.back(-1)';
        });
        // save unit===============
        $("#f_save").on('submit', function (e) {
          alert('yes');
            e.preventDefault();
//            return false;
            $.ajax({
                url: "<?= site_url('csv/csv_offices/insert_offices') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').html('<div style="position: relative;top: 50%;left: 51%;font-family:khmer mef1;font-size:16px;color:red;">កំពុងតែបញ្ចូល......</div>');
                    $('.xmodal').show();
//                    $('.ximage').show();
                    window.location = 'javascript:history.go(-1)';
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var id = data.id - 0;
                    var records_d = data.re_d;
                    var records_t = data.re_t;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });
    }); // ready f. =============

</script>
<style>
    .ui-tabs-vertical { width: 79.2em; }
    .ui-autocomplete {
        position: absolute;
        z-index: 1060;
    }
    .btncolor1{
        background-color: hsl(0, 0%, 80%) !important;
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#e5e5e5", endColorstr="#cccccc");
        background-image: -khtml-gradient(linear, left top, left bottom, from(#e5e5e5), to(#cccccc));
        background-image: -moz-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: -ms-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #e5e5e5), color-stop(100%, #cccccc));
        background-image: -webkit-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: -o-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: linear-gradient(#e5e5e5, #cccccc);
        border-color: #cccccc #cccccc hsl(0, 0%, 77.5%);
        color: #333 !important;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.16);
        -webkit-font-smoothing: antialiased;
    }
    .btncolor{
        background-color: hsl(0, 0%, 78%) !important;
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#f9f9f9", endColorstr="#c6c6c6");
        background-image: -khtml-gradient(linear, left top, left bottom, from(#f9f9f9), to(#c6c6c6));
        background-image: -moz-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: -ms-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f9f9f9), color-stop(100%, #c6c6c6));
        background-image: -webkit-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: -o-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: linear-gradient(#f9f9f9, #c6c6c6);
        border-color: #c6c6c6 #c6c6c6 hsl(0, 0%, 73%);
        color: #333 !important;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.33);
        -webkit-font-smoothing: antialiased;
    }
    #photo:hover{background: blue; position: absolute;}
</style>
