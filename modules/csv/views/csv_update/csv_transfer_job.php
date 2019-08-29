<link rel="stylesheet" href="<?php echo base_url('') ?>assets/jquery.typeahead.css">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />



<style>



    .remove-file, #add-field{

        cursor: pointer;
    }

    .remove-file i{
        color: red;

    }

    .with-nav-tabs{
       margin-top: 30px;

    } 

    .panel.with-nav-tabs .panel-heading{

        padding: 5px 5px 0px 5px;

    }

    .panel.with-nav-tabs .nav-tabs{

       border-bottom: none;

        margin-bottom: -2px;

    }

    /*** PANEL SUCCESS ***/

    .with-nav-tabs.panel-success .nav-tabs > li > a,

    .with-nav-tabs.panel-success .nav-tabs > li > a:hover,

    .with-nav-tabs.panel-success .nav-tabs > li > a:focus {

        color: #3c763d;

        font-size: 18px;

    }

    .with-nav-tabs.panel-success .nav-tabs > .open > a,

    .with-nav-tabs.panel-success .nav-tabs > .open > a:hover,

    .with-nav-tabs.panel-success .nav-tabs > .open > a:focus,

    .with-nav-tabs.panel-success .nav-tabs > li > a:hover,

    .with-nav-tabs.panel-success .nav-tabs > li > a:focus {

        color: #3c763d;

        background-color: #d6e9c6;

        border-color: transparent;

        font-size: 18px;

    }

    .with-nav-tabs.panel-success .nav-tabs > li.active > a,

    .with-nav-tabs.panel-success .nav-tabs > li.active > a:hover,

    .with-nav-tabs.panel-success .nav-tabs > li.active > a:focus {

        color: #3c763d;

        background-color: #fff;

        border-color: #d6e9c6;

        border-bottom-color: transparent;

        font-size: 18px;

    }

    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu {

        background-color: #dff0d8;

        border-color: #d6e9c6;

    }

    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a {

        color: #3c763d;   

    }

    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,

    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {

        background-color: #d6e9c6;

    }

    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a,

    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,

    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {

        color: #fff;

        background-color: #3c763d;

    }

</style>

<div class="panel panel-default">

    <div class="panel-heading">

        <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​--> <?= t('មន្ត្រីផ្ទេរការងារ និង ប្តូរក្រសួង') ?></h3>

    </div>

    <div class="panel-body">

        <fieldset>

            <legend><?= t('ស្វែងរកមន្ត្រី') ?></legend>

            <div class="form-group">

                <label class="col-lg-2 col-md-2 text-right"​ style="line-height: 32px;"> 

                    <?= t('ស្វែងរកឈ្មោះឬ អត្ថលេខមន្ត្រី') ?>

                </label>

                <div class="col-lg-4 col-md-4 "> 

                    <div class="typeahead__container ">

                        <div class="typeahead__field">

                            <div class="typeahead__query">

                                <input class="form-control js-typeahead" value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_id'] . ' ' . $csv_record['csv_name'] : '' ?>" name="officer_search" type="search"   autocomplete="off"/>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </fieldset>

        <?php if (isset($csv_record['csv_id'])) { ?>

            <fieldset>

                <legend><?= t('ព័ត៌មានលំអិតមន្ត្រី') ?></legend>

                <div class="form-group">

                    <div class="col-lg-4 col-md-4">

                        <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                            <?= t('អត្តលេខមន្ត្រី') ?>

                        </label>

                        <div class="col-lg-8 col-md-8">

                            <input class="form-control" value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_id'] : '' ?>" name="officer_id" id="officer_id" type="text"/>

                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4">

                        <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                            <?= t('ឈ្មោះ') ?>

                        </label>

                        <div class="col-lg-8 col-md-8">

                            <input class="form-control" name="officer_name" value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_name'] : '' ?>" id="officer_name"type="text"/>

                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4">

                        <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                            <?= t('ថ្ងៃ ខែ ឆ្នាំកំណើត') ?>

                        </label>

                        <div class="col-lg-8 col-md-8">

                            <input class="form-control disabled" readonly value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_dob'] : '' ?>" id="officer_dateofbirth" name="officer_dateofbirth" type="text"/>

                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-lg-4 col-md-4">

                        <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">
                            <?= t('តួនាទី') ?>

                        </label>

                        <div class="col-lg-8 col-md-8">

                            <input class="form-control" name="officer_position" value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_position'] : '' ?>" type="text"/>

                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4">

                        <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                            <?= t('អង្គភាព') ?>

                        </label>

                        <div class="col-lg-8 col-md-8">

                            <input class="form-control" name="officer_department" type="text" value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_department'] : '' ?>"/>

                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4">

                        <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                            <?= t('ថ្ងៃខែឆ្នាំចូលក្របខ័ណ្ឌ') ?>

                        </label>

                        <div class="col-lg-8 col-md-8">

                            <input class="form-control disabled" readonly value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_date_in'] : '' ?>" name="officer_dateof_join" type="text"/>

                        </div>

                    </div>

                </div>


                <div class="form-group">

                    <div class="col-lg-4 col-md-4">

                        <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                            <?= t('អគ្គនាយកដ្ឋាន') ?>

                        </label>

                        <div class="col-lg-8 col-md-8">

                            <input class="form-control" name="officer_department_general" value="<?php echo isset($csv_record['csv_id']) ? $row_w->general_deps_name : '' ?>" type="text"/>

                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4">

                        <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                            <?= t('នាយកដ្ឋាន') ?>

                        </label>

                        <div class="col-lg-8 col-md-8">

                            <input class="form-control" name="officer_department_general_sub" value="<?php echo isset($csv_record['csv_id']) ? $row_w->d_name : '' ?>" type="text"/>

                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4">

                        <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                            <?= t('ទូរសព្វ') ?>

                        </label>

                        <div class="col-lg-8 col-md-8">

                            <input class="form-control" name="officer_phone" value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_mobile_phone'] : '' ?>" type="text"/>

                        </div>

                    </div>

                </div>

            </fieldset>

            <div class="panel with-nav-tabs panel-success">

                <div class="panel-heading">

                    <ul class="nav nav-tabs">

                        <li class="active"><a data-toggle="tab" href="#transfer_in"><?= t('ប្តូរកន្លែងបម្រើការងាររបស់មន្ត្រី') ?></a></li>

                        <li><a data-toggle="tab" href="#transfer_out"><?= t('ការផ្ទេរក្របខ័ណ្ឌមន្ត្រីរាជការ') ?></a></li>

                    </ul>

                </div>

                <div class="panel-body">

                    <div class="tab-content">

                        <div id="transfer_in" class="tab-pane fade in active">

                            <form id="frm-transfer-job" method="post">

                                <input type="hidden" name="csv_id" id="csv_id" value="<?php echo $csv_record['rec_id'] ?>"/>

                                <input type="hidden" name="csv_work_id" id="csv_work_id" value="<?php echo $csv_record['work_id']; ?>"/>

                                <div class="form-horizontal">

                                    <div class="form-group">

                                        <label for="currentRole" class="col-sm-2 control-label"><?= t('តួនាទី') ?></label>

                                        <div class="col-sm-4">

                                            <select   oninvalid="this.setCustomValidity('សូមបញ្ចូលតួនាទី')" id="current_role_id" name="currentRole" class=" form-control" data-live-search="true" data-live-search-style="begins" title=" ">

                                                <option value=""></option>

                                                <?php

                                                foreach ($currentrole_rows as $keyrow) {

                                                    $is_selected = '';

                                                    if ($keyrow->id == @$row_w->current_role_id) {

                                                        $is_selected = "selected";

                                                    }

                                                    ?>

                                                    <option data-id="<?php echo @$keyrow->id; ?>"

                                                            data-name="<?php echo @$keyrow->current_role_in_khmer; ?>"

                                                            value="<?php echo $keyrow->id; ?>" <?php echo $is_selected ?>><?php echo @$keyrow->current_role_in_khmer; ?></option>

                                                        <?php } ?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <input type="hidden" name="unitname" id="unitname"

                                               value="<?= set_value('second_role', isset($row_w->unit) ? $row_w->unit : '') ?>">

                                        <label for="unit" class="col-sm-2 control-label"><?= t('អង្គភាព') ?></label>

                                        <div class="col-sm-4">

                                            <select    oninvalid="this.setCustomValidity('សូមបញ្ចូលអង្គភាព')" id="unit" name="unit" class="form-control" data-live-search="true" data-live-search-style="" title=""

                                                       value="<?= set_value('unit', isset($row_w->unit) ? $row_w->unit : '') ?>">

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label for="general_dep_id" class="col-sm-2 control-label"><?= t('អគ្គនាយកដ្ឋាន') ?></label>

                                        <div class="col-sm-4">

                                            <select id="general_dep_id" name="general_dep_name" class=" form-control" data-live-search="true" data-live-search-style=""

                                                    data-toggle="tooltip" data-placement="top"  title=""

                                                    value="<?= set_value('general_department', isset($row_w->general_department) ? $row_w->general_department : '') ?>">

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label for="d_id" class="col-sm-2 control-label"><?= t('នាយកដ្ឋាន') ?></label>

                                        <div class="col-sm-4">

                                            <select class=" form-control" type="text" id="d_id" name="d_name"

                                                    data-toggle="tooltip" data-placement="top" data-live-search="true" data-live-search-style=""

                                                    title=""

                                                    value="<?= set_value('department', isset($row_w->department) ? $row_w->department : '') ?>"/>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label for="work_office" class="col-sm-2 control-label"><?= t('ការិយាល័យ') ?></label>

                                        <div class="col-sm-4">

                                            <select id="work_office" name="work_office" class="form-control" data-live-search="true" data-live-search-style="" title=" "

                                                    value="<?= set_value('work_office', isset($row_w->work_office) ? $row_w->work_office : '') ?>">

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label for="province_office" class="col-sm-2 control-label"><?= t('ការិយាល័យចំណុះមន្ទីរ ដ.ន.ស.ស /រាជធានី​ / ខេត្ត') ?></label>

                                        <div class="col-sm-4">

                                            <select id="province_office" name="province_office" class="form-control" data-live-search="true" data-live-search-style="" title=" "

                                                    value="<?= set_value('province_office', isset($row_w->province_office) ? $row_w->province_office : '') ?>">

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label for="land_official" class="col-sm-2 control-label"><?= t('ការិយាល័យ ដ.ន.ស.ភ ក្រុង/ស្រុក/ខណ្ឌ័') ?></label>

                                        <div class="col-sm-4">

                                            <select name="land_official" id="land_official"class="form-control" data-live-search="true" data-live-search-style="" title="ការិយាល័យភូមិបាល"

                                                    value="<?= set_value('land_official', isset($row_w->land_official) ? $row_w->land_official : '') ?>"/>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label for="promote_date"

                                               class="col-sm-2 control-label"><?= t('ថ្ងៃខែឆ្នាំ ចេញព្រះរាជក្រឹត្យ') ?></label>

                                        <div class="col-sm-4">

                                            <input type="text" class="form-control" id="promote_date" name="promote_date"

                                                   placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top"

                                                   title="បំពេញថ្ងៃខែឆ្នាំតែងតាំង" 
                                                   value=""/>

                                        </div>

                                    </div>


                                    <div class="form-group">

                                        <label for="attachment"

                                               class="col-sm-2 control-label"><?= t('លេខព្រះរាជក្រឹត្យ លិខិតយោង') ?></label>

                                        <div class="col-sm-4">

                                            <input type="text" class="form-control" id="attachment" name="attachment"

                                                   placeholder="" data-toggle="tooltip" data-placement="top"

                                                   title="បំពេញលិខិតយោង" maxlength="255"

                                                   value="<?= set_value('attachment', isset($row_w->attachment) ? $row_w->attachment : '') ?>"/>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label for="note" class="col-sm-2 control-label"><?= t('សំគាល់') ?></label>

                                        <div class="col-sm-4">

                                            <textarea type="text" class="form-control" id="note" name="note" placeholder=""

                                                      data-toggle="tooltip" data-placement="top"

                                                      title="សំគាល់"><?= set_value('note', isset($row_w->note) ? $row_w->note : '') ?></textarea>

                                        </div>

                                    </div>

                                    <div class="form-group" id="transfer_job">

                                        <div class="form-group">

                                            <label class="col-lg-2 col-md-2 text-right"><?= t('ឯកសារយោង') ?></label>

                                            <div class="col-lg-4 col-md-4" >

                                                <div class="input-group">

                                                    <input id="fieldID2" type="text" name="reference_file[]" value="" class="form-control transfer-file" readonly>

                                                    <span class="input-group-btn">

                                                        <a href="<?php echo base_url() ?>/assets/filemanager/dialog.php?type=2&field_id=fieldID2&relative_url=1" class="btn btn-info iframe-btn" type="button">ស្វែងរក</a>

                                                    </span>

                                                </div>

                                            </div>

                                            <label class="col-lg-1 col-md-1" id="add-field"><i class="fa fa-plus-circle fa-2x "></i></label>

                                        </div>

                                        <div id="more-file">

                                            <input type="hidden" value="3" id="fild-count"/>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-2 col-md-2"></label>

                                        <div class="col-lg-4 col-md-4">

                                            <span class="btn btn-success" id="btnsave-transfer"><?= t('រក្សាទុក') ?></span>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                        
  <!-- start transfer_out -->
                        <div id="transfer_out" class="tab-pane fade">

                            <div class="row">

                                <form id="frm-transer-out" method="post">
                                    <input type="hidden" name="csv_id" value="<?php echo $csv_record['rec_id'] ?>"/>

                                    <input type="hidden" name="csv_work_id" value="<?php echo $csv_record['work_id']; ?>"/>

                                    <div class="col-lg-6 col-md-6 form-horizontal">

                                        <div class="form-group">

                                          <label class="col-lg-4 col-md-4 text-right"><?= t('លេខព្រះរាជក្រឹត្យ លិខិតយោង') ?></label>
                                            <div class="col-sm-8 col-md-8">

                                                <input type="text" value="" class="form-control" id="txtnu_of_reference" name="txtnu_of_reference"/>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-lg-2 col-md-2 text-right"><?= t('កំណត់ចំណាំ') ?></label>

                                            <div class="col-lg-10 col-md-10">

                                                <textarea class="form-control" rows="8" name="remark" id="remark"></textarea>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-lg-2 col-md-2 text-right"></label>

                                            <div class="col-lg-10 col-md-10">

                                                <span class="btn btn-danger" id="btn-submit-delete"><?php echo t('បច្ចុប្បន្នភាព'); ?></span>

                                            </div>

                                        </div>

                                    </div>


                                    <div class="col-lg-6 col-md-6 form-horizontal">
                                        <div class="form-group">


                                            <label class="col-lg-3 col-md-3 text-right"><?= t('ថ្ងៃ ខែ ឆ្នាំ') ?></label>

                                            <div class="col-sm-9 col-md-9">

                                                <div class="input-group">

                                                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>  
                                                    <input type="text" value="" class="form-control datepick" id="txtdate" name="dateinput"/>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-lg-3 col-md-3 text-right"><?= t('ឈ្មោះក្របខណ្ឌថ្មី') ?></label>

                                            <div class="col-sm-9 col-md-9">

                                                <input type="text" value="" class="form-control" id="txttransferto" name="txttransferto"/>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-lg-3 col-md-3 text-right"><?= t('ឯកសារយោង') ?></label>

                                            <div class="col-lg-8 col-md-8" >

                                                <div class="input-group">

                                                    <input id="outfieldID2" type="text" name="outreference_file[]" value="" class="form-control" readonly>

                                                    <span class="input-group-btn">

                                                        <a href="<?php echo base_url('') ?>/assets/filemanager/dialog.php?type=2&field_id=outfieldID2&relative_url=1" class="btn btn-info iframe-btn" type="button">ស្វែងរក</a>

                                                    </span>

                                                </div>

                                            </div>

                                            <label class="col-lg-1 col-md-1" id="add-field-out"><i class="fa fa-plus-circle fa-2x "></i></label>

                                        </div>

                                        <div id="more-file-out">

                                            <input type="hidden" value="3" id="fild-count-out"/>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

</div>


<script src="<?php echo base_url('') ?>assets/jquery.typeahead.js"></script>

<script src="<?php echo base_url('') ?>assets/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script type='text/javascript'>


    $(document).ready(function () {

        $.typeahead({

            input: ".js-typeahead",

            cache: true,

            minLength: 1,

            maxItem: 15,

            order: "asc",

            dynamic: true,

            delay: 500,

            hint: true,

            href: '<?php echo site_url('csv/csv_update/get_csv_detail?value={{id}}-{{name}}&id={{idtable}}&frm=transfer') ?>',

            cancelButton: true,

            display: ["id", "name"],

            backdrop: {

                "background-color": "#eee"

            },

            source: {

                ajax: {

                    url: "<?php echo site_url('csv/csv_update/get_csv') ?>",

                    path: "data.officer"

                }

            },

            debug: true

        });

    });

    $('.iframe-btn').fancybox({

        'width': 900,

        'height': 600,

        'type': 'iframe',

        'autoScale': true

    });

    $('#add-field').on('click', function () {

        var i = $('#fild-count').val();

        var inputform = '<div class="form-group">' +

                '<label class="col-lg-2 col-md-2 text-right"></label>' +

                '<div class="col-lg-4 col-md-4" >' +

                '<div class="input-group">' +

                '<input id="fieldID' + i + '" type="text" name="reference_file[]" value="" class="form-control transfer-file" readonly>' +

                '<span class="input-group-btn">' +

                '<a href="<?php echo base_url() ?>/assets/filemanager/dialog.php?type=2&field_id=fieldID' + i + '&relative_url=1" class="btn btn-info iframe-btn" type="button">ស្វែងរក</a>' +

                '</span>' +

                '</div>' +

                '</div>' +

                '<label class="col-lg-1 col-md-1 remove-file" ><i class="fa fa-minus-circle fa-2x red"></i></label>' +

                '</div>';

        $("#more-file").fadeIn('slow').append(inputform);

        $('.iframe-btn').fancybox({

            'width': 900,

            'height': 600,

            'type': 'iframe',

            'autoScale': true
        });

        $('#fild-count').val(parseInt(i) + 1);

    });

    $('#add-field-out').on('click', function () {

        var i = $('#fild-count-out').val();
        var inputform = '<div class="form-group">' +

                '<label class="col-lg-3 col-md-3 text-right"></label>' +

                '<div class="col-lg-8 col-md-8" >' +

                '<div class="input-group">' +

                '<input id="outfieldID' + i + '" type="text" name="outreference_file[]" value="" class="form-control transfer-file" readonly>' +

                '<span class="input-group-btn">' +

                '<a href="<?php echo base_url() ?>/assets/filemanager/dialog.php?type=2&field_id=outfieldID' + i + '&relative_url=1" class="btn btn-info iframe-btn" type="button">ស្វែងរក</a>' +

                '</span>' +

                '</div>' +

                '</div>' +

                '<label class="col-lg-1 col-md-1 remove-file" ><i class="fa fa-minus-circle fa-2x red"></i></label>' +

                '</div>';

        $("#more-file-out").fadeIn('slow').append(inputform);

        $('.iframe-btn').fancybox({

            'width': 900,

            'height': 600,

            'type': 'iframe',

            'autoScale': true

        });

        $('#fild-count-out').val(parseInt(i) + 1);

    });

    $('body').delegate(".remove-file", "click", function (e) {

        var fieldfile = $(this).parent();

        fieldfile.fadeOut('slow', function () {

            $(this).remove();

        });

    });

    function dateTimeall() {

        $('.datepick').each(function () {

            $(this).datepicker({

                format: "dd-mm-yyyy",

                startDate: "01-01-1950",

                todayBtn: true,

                language: "kh",

                keyboardNavigation: false,

                calendarWeeks: true,

                autoclose: true,

                todayHighlight: true,

                toggleActive: true

            })/*.on('change', function () {

             var getdate = $(this).val();

             var res = getdate.split("-");

             var d = res[0];

             var m = parseInt(res[1]);

             var y = res[2];

             var newdate = new Date(y, m, d);

             var addmonth = new Date(newdate.setMonth(newdate.getMonth() + 3));

             $('#attachment').val(formatDate(addmonth));

             })*/;

        });

    }

    /*  

     function formatDate(date) {

     var monthNames = [

     "01", "02", "03",

     "04", "05", "06", "07",

     "08", "09", "10",

     "11", "12"

     ];

     var day = date.getDate();

     var monthIndex = date.getMonth();
     var year = date.getFullYear();

     return day+'-'+monthNames[monthIndex]+'-'+ year;

     }

     */

    $('body').delegate(".datepick", "focus", function (e) {
        dateTimeall();
    });

    $("#btn-submit-delete").on('click', function (e) {

        e.preventDefault();

        var date = $('#txtnu_of_reference').val();

        if (date === '') {

            $('#txtnu_of_reference').parent().addClass('has-error');

            return false;
        } else {

            transfer_out();

        }

    });

    function transfer_out() {

        swal({

            title: 'តើពិតជាប្រាកដ រឺ អត់ ?',

            text: "តើលោក អ្នកពិតជាធ្វើការផ្ទេរក្រខណ្ឌមន្ត្រីនេះមេនទេ?",

            type: 'warning',

            showCancelButton: true,

            confirmButtonText: 'យល់ព្រម',

            cancelButtonText: 'ទេ',

            showLoaderOnConfirm: true,

            preConfirm: function () {
                return new Promise(function (resolve) {

                    $.ajax({

                        url: '<?php echo site_url('csv/csv_update/delete_csv_transfer_out') ?>',

                        type: "post",

                        dataType: "json",

                        data: $('#frm-transer-out').serialize(),

                        cache: false

                    }).done(function (data) {

                        if (data.status) {

                            swal({

                                title: 'ដោយជោគជ័យ ',
                                text: 'បច្ចុប្បន្នភាព ត្រូវបានរក្សាទុកដោយជោគជ័យ',

                                type: 'success',

                                allowOutsideClick: false

                            });

                            setTimeout(function () {

                                window.location.href = "<?php echo site_url('csv/csv_update/csv_transfer_job/') ?>/";

                            }, 3000);

                        }

                    }).fail(function () {

                        swal('វោហ៍...', 'មានអ្វីខុស សូមឆែកម្តងទៀត', 'error');

                    });

                });

            },

            allowOutsideClick: false

        });

    }

    $('body').delegate("#unit", "change", function () {

        f_land_official();

        f_pro_office();

    }
    );

    /*get offfice */

    function f_land_official() {

        var unit = $('#unit').val();

        $.ajax({

            url: '<?= site_url('csv/csv_info/opt_land_official') ?>',

            type: 'post',

            datatype: 'json',

            async: false,

            data: {unit: unit},

            success: function (data) {

                var value = $('#land_official').attr('value');

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option></option>';

                    $.each(data, function (i, item) {

                        if (item.id == value) {

                            opt += "<option selected='selected' value='" + value + "'>" + item.land_official + "</option>";

                        } else {

                            opt += '<option value="' + item.id + '">' + item.land_official + '</option>';

                        }

                    });

                }

                $('#land_official').html(opt);

            },

            error: function () {

            }

        });

    }

    /*get province offfice */

    function f_pro_office() {

        var unit = $('#unit').val();

        $.ajax({

            url: '<?= site_url('csv/csv_info/opt_pro_offices') ?>',

            type: 'post',

            datatype: 'json',

            async: false,

            data: {unit: unit},

            success: function (data) {

                var value = $('#province_office').attr('value');

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option></option>';

                    $.each(data, function (i, item) {

                        if (item.id == value) {

                            opt += "<option selected='selected' value='" + value + "'>" + item.office + "</option>";

                        } else {

                            opt += '<option value="' + item.id + '">' + item.office + '</option>';
                        }

                    });

                }

                $('#province_office').html(opt);

            },

            error: function () {

            }


        });

    }

    /*get unit*/

    $.ajax({

        url: "<?php echo site_url('csv/csv_info/opt_unit'); ?>",

        type: 'post',

        datatype: 'json',

        async: false,

        beforeSend: function () {

            $('.xmodal').show();

        },

        data: {},

        success: function (data) {

            var value = $('#unit').attr('value');

            if (data.length > 0) {

                var opt = '';

                opt += '<option></option>';

                $.each(data, function (i, item) {

                    if (item.id == value) {

                        opt += "<option selected='selected' value='" + value + "'>" + item.unit + "</option>";

                    } else if (item.id != value && item.id != '' && item.id != null) {

                        opt += '<option value="' + item.id + '">' + item.unit + '</option>';

                    }
                });

            }

            $('#unit').html(opt);

            f_land_official();

            f_pro_office();

            $('.xmodal').hide();

        },

        error: function () {

        }

    });

    /*get general department*/

    $.ajax({

        url: "<?php echo site_url('csv/csv_info/opt_gd'); ?>",

        type: 'post',

        datatype: 'json',

        async: false,

        beforeSend: function () {

            $('.xmodal').show();

        },

        data: {},

        success: function (data) {

            var value = $('#general_dep_id').attr('value');

            if (data.length > 0) {

                var opt = '';

                opt += '<option></option>';

                $.each(data, function (i, item) {

                    if (item.general_dep_id == value) {

                        opt += "<option selected='selected' value='" + value + "'>" + item.general_deps_name + "</option>";

                    } else if (item.general_dep_id != value && item.general_dep_id != '' && item.general_dep_id != null) {

                        opt += '<option value="' + item.general_dep_id + '">' + item.general_deps_name + '</option>';
                    }
                });

            }

            $('#general_dep_id').html(opt);

            f_department();

            $('.xmodal').hide();

        },

        error: function () {
        }

    });

    /*get deparment */

    function f_department() {

        var general_dep_id = $('#general_dep_id').val();

        //        alert(general_dep_id);

        $.ajax({

            url: '<?= site_url('csv/csv_info/opt_dp') ?>',

            type: 'post',

            datatype: 'json',

            async: false,

            data: {general_dep_id: general_dep_id},

            success: function (data) {

                var value = $('#d_id').attr('value');

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option></option>';

                    $.each(data, function (i, item) {

                        if (item.d_id == value) {

                            opt += "<option selected='selected' value='" + value + "'>" + item.d_name + "</option>";
                        } else {

                            opt += '<option value="' + item.d_id + '">' + item.d_name + '</option>';

                        }

                    });

                }

                $('#d_id').html(opt);



                f_office();



            },



            error: function () {



            }



        });



    }



    /*get offfice */



    function f_office() {



        var d_id = $('#d_id').val();



        $.ajax({



            url: '<?= site_url('csv/csv_info/opt_offices') ?>',



            type: 'post',



            datatype: 'json',



            async: false,



            data: {d_id: d_id},



            success: function (data) {



                var value = $('#work_office').attr('value');



                if (data.length > 0) {



                    var opt = '';



                    opt += '<option></option>';



                    $.each(data, function (i, item) {



                        if (item.id == value) {



                            opt += "<option selected='selected' value='" + value + "'>" + item.office + "</option>";



                        } else {



                            opt += '<option value="' + item.id + '">' + item.office + '</option>';



                        }



                    });



                }



                $('#work_office').html(opt);



        //               f_land_official();


            },



            error: function () {



            }



        });



    }



    /*get province offfice */



    function f_pro_office() {

        var unit = $('#unit').val();

        $.ajax({

            url: '<?= site_url('csv/csv_info/opt_pro_offices') ?>',

            type: 'post',

            datatype: 'json',

            async: false,

            data: {unit: unit},

            success: function (data) {

                var value = $('#province_office').attr('value');

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option></option>';

                    $.each(data, function (i, item) {

                        if (item.id == value) {

                            opt += "<option selected='selected' value='" + value + "'>" + item.office + "</option>";

                        } else {

                            opt += '<option value="' + item.id + '">' + item.office + '</option>';

                        }

                    });

                }

                $('#province_office').html(opt);

            },

            error: function () {

            }

        });

    }



    $('body').delegate("#general_dep_id", "change", function () {



        f_department();



    });



    $('#btnsave-transfer').on('click', function () {

        var csv_id = $('#csv_id').val();

        var current_role_id = $('#current_role_id').val();

        var unit = $('#unit').val();

        var    old_unit =    '<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_unit_id'] : '' ?>';

        var    old_work =    '<?php echo@$row_w->current_role_id?>';

        var    old_position =    '<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_position'] : '' ?>';

        var    old_general_dep =    '<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_general_deps_id'] : '' ?>';

        var    old_department =    '<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_department_id'] : '' ?>';

        var    old_office =    '<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_office_id'] : '' ?>';

        var    old_land_office =    '<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_land_office_id'] : '' ?>';

        var    old_date_in =    '<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_promote_date'] : '' ?>';

        var    old_province_office =    '<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_province_id'] : '' ?>';




 //alert(current_role_id);    

 
        if (unit  > 1){

        var general_dep_id = "";

        var d_id = "";

        var work_office = "";

        var province_office = $('#province_office').val();

        var land_official = $('#land_official').val();

         // alert("test1");

        }  else 

    {

        var province_office = "";

        var land_official = "";

        var general_dep_id = $('#general_dep_id').val();

        var d_id = $('#d_id').val();

        var work_office = $('#work_office').val();

        //alert("test2");

    }

        var promote_date = $('#promote_date').val();



        var attachment = $('#attachment').val();



        var note = $('#note').val();



        var send = $('#fieldID2').val();

        //alert(send);



        $.ajax({



            url: '<?= site_url('csv/csv_update/transfer_job') ?>',



            type: 'post',



            datatype: 'json',



            data: {old_unit: old_unit,old_work: old_work,old_position: old_position,old_general_dep:old_general_dep,old_department:old_department,old_office:old_office,old_land_office:old_land_office,old_date_in:old_date_in,old_province_office:old_province_office,unit: unit, csv_id: csv_id, current_role_id: current_role_id, general_dep_id: general_dep_id, d_id: d_id, work_office: work_office, province_office: province_office, land_official: land_official, promote_date: promote_date, attachment: attachment, send: send, note: note},



            beforeSend: function () {



                $('.xmodal').show();



            },



            success: function (data) {



                $('.xmodal').hide();



                if (data.status === 'success') {

                    swal({

                        title:"ដោយជោគជ័យ",

                        text: "បច្ចុប្បន្នភាព ត្រូវបានរក្សាទុកដោយជោគជ័យ",

                        type:"success",

                        showCancelButton: false,

                        showConfirmButton: false,

                        allowOutsideClick: false,

                        closeOnClickOutside: false

                    });

                                  setTimeout(function () {

                                window.location.href = "<?php echo site_url('csv/csv_update/csv_transfer_job/') ?>/";


                            }, 3000);
                   

                } else {

                    swal({

                        title:"បរាជ័យ",

                        text: "បច្ចុប្បន្នភាព ត្រូវបានរក្សាទុកបរាជ័យ",

                        type: 'info',

                        showCancelButton: false,

                        showConfirmButton: false,

                        allowOutsideClick: false,

                        closeOnClickOutside: false

                    });

                }

            }

        });

    });



    $('#unit').on('change', function () {



        var unit_id = $(this).val();



        if (unit_id === '1') {



            $('#province_office').parent().parent().hide();



            $('#land_official').parent().parent().hide();



            $('#general_dep_id').parent().parent().show();



            $('#d_id').parent().parent().show();



            $('#work_office').parent().parent().show();



        } else {



            $('#province_office').parent().parent().show();



            $('#land_official').parent().parent().show();



            $('#general_dep_id').parent().parent().hide();



            $('#d_id').parent().parent().hide();



            $('#work_office').parent().parent().hide();







        }



    });



</script>



