<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ <?= t('ស្វែងរកផែនទីតាមខេត្ត') ?><span id="my_pro"></span></h3>
        </div>
        <!--------------------------------------->
        <div class="panel-body">  
            <div class = "form-group">
                <label for = "pro_id" class = "col-sm-2 control-label"><?= t('រាជធានី-ខេត្ត') ?></label>
                <div class="col-sm-10">
                    <select data-toggle="tooltip" data-placement="left" title="រាជធានី-ខេត្ត (ឧ.​ រាជធានីភ្នំពេញ...)" validate_act class="form-control"  id="pro_id" placeholder="" name="pro_id">
                        <?php
                        echo getoption("SELECT
                                                    pr.khmer_name,
                                                    pr.id
                                            FROM
                                                    province AS pr
                                            {$sWhere} ", "id", "khmer_name", set_value('pro_id', isset($row->pro_id) ? $row->pro_id : ''), true);
                        ?>
                    </select>
                    <button id="btn_link_map" type="button" class="btn btn-default glyphicon"> <?= t('ភ្ជាប់ទៅផែនទី') ?></button>
                </div>
            </div>
        </div><!-- end body ------------------------>          
    </div>
</form>

<script type="text/javascript">
    $(function() {

        // link map by province ====================
        $('#btn_link_map').on('click', function() {
            var pro_id = $('#pro_id').val();
            if (pro_id - 0 > 0) {
                window.location = '<?= site_url('rri/link_map_province/form') ?>/' + pro_id;
            } else {
                alert('សូមជ្រើសរើស រាជធានី-ខេត្ត !');
            }
        });

    });// end ready ======================
</script>