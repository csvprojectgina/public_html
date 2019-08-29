<link rel="stylesheet" href="<?php echo base_url('') ?>assets/jquery.typeahead.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
<style>
    .remove-file, #add-field{
        cursor: pointer;
    }
    .remove-file i{
        color: red;
    }
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​--> <?= t('ទំរង់មន្ត្រី ឡើងថ្នាក់ និង ឋានន្តរស័ក្តិតាមវិញានបនប័ត្រ') ?></h3>
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

    </div>
    <form class="form-horizontal"  role="form"  id="frm-certificated">
                <input type="hidden" id="csv_id" value="<?php echo $csv_record['rec_id'] ?>"/>
                <input type="hidden" id="csv_work_id" value="<?php echo $csv_record['work_id']; ?>"/>
        <div class="panel-group" id="accordion" style=" margin-bottom: 30px">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a href="#collapseone" style="color: #797979 !important; margin-left: -13px; margin-top: 3px;" ><?= t('បច្ចុប្បន្នភាព មន្ត្រីឡើងថ្នាក់ និង ឋានន្តរស័ក្តិតាមវិញានបនប័ត្រ') ?></a>
                    </h3>
                </div>
                <div class="panel-collapse ">
                    <div class="panel-body" >
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 form-horizontal">
                                    <div class="form-group">
                                        <label for="salary_level" class="col-lg-4 col-md-4 text-right"><?= t('ក្របខណ្ឌឋានន្តរសកិ្ត/ថ្នាក់') ?></label>
                                        <div class="col-sm-8 col-md-8">
                                            <select class="form-control salary_leve" type="text" id="salary_level" name="salary_level" data-toggle="tooltip" data-placement="top" title="ជ្រើសរើសភេទ" value="<?= $result->salary_level ?>" />
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="index_multiply" class="col-lg-4 col-md-4 text-right"><?= t('សន្ទទស្សន៍​បៀរត្ស') ?></label>
                                        <div class="col-sm-8 col-md-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" readonly id="index_multiply" name="index_multiply" placeholder="" data-toggle="tooltip" data-placement="top"
                                                       title="បំពេញដោយស្វ័យប្រវត្តិមេគុណសន្ទទស្សន៍" number closekey maxlength="255" value="<?= $result->index_multiply ?>"/>
                                                <span class="input-group-addon">*</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="index_salary" class="col-lg-4 col-md-4 control-label"><?= t('ប្រាក់សន្ទស្សន៍') ?></label>
                                        <div class="col-sm-8 col-md-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" readonly id="index_salary" name="index_salary"
                                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                                       title="បំពេញដោយស្វ័យប្រវត្តិប្រាក់សន្ទស្សន៍ (៛)" maxlength="255" number
                                                       closekey
                                                    />
                                                <span class="input-group-addon">៛</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pure_salary" class="col-lg-4 col-md-4 control-label"><?= t('បៀវត្សមូលដ្ឋាន') ?></label>
                                        <div class="col-sm-8 col-md-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" readonly id="pure_salary" name="pure_salary"
                                                       placeholder=" " data-toggle="tooltip" data-placement="top"
                                                       title="គណនាស្វ័យប្រវត្តិ (បៀវត្សសុទ្ធសាធ = មេគុណសន្ទទស្សន៍ X ប្រាក់សន្ទស្សន៍)(៛)"
                                                       closekey maxlength="255" number
                                                      />
                                                <span class="input-group-addon">៛</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 col-md-4 text-right" >ថ្ងៃ​ខែឆ្នាំ ទទួលគ្រឿងឥស្សរិយយស </label>
                                        <div class="col-sm-8 col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                                <input type="text" value="" class="form-control datepick" id="txtdate" name="dateFrom">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 col-md-4 text-right">ឯកសារយោង</label>
                                        <div class="col-lg-7 col-md-7">
                                            <div class="input-group">
                                                <input id="fieldID2" name="reference_file[]" value="" class="form-control tag" readonly="" type="text">
                                                <span class="input-group-btn">
                                                    <a href="<?php echo base_url('')?>assets/filemanager/dialog.php?type=2&amp;field_id=fieldID2&amp;relative_url=1&folder=promote_file_reference" class="btn btn-info iframe-btn" type="button">ស្វែងរក</a>
                                                </span>
                                            </div>
                                        </div>
                                        <label class="col-lg-1 col-md-1" id="add-field"><i class="fa fa-plus-circle fa-2x "></i></label>
                                    </div>
                                    <div id="more-file">
                                        <input value="3" id="fild-count" type="hidden">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 col-md-4 text-right"></label>
                                        <div class="col-lg-8 col-md-8">
                                            <span class="btn btn-success" id="btn-submit"><?php echo t('រក្សាទុក'); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 form-horizontal">

                                    <div class="form-group">
                                        <label class="col-lg-3 col-md-3 text-right" >លេខព្រះរាជក្រឹត្យ អនុក្រឹត</label>
                                        <div class="col-lg-9 col-md-9">
                                            <input type="text" class="form-control" id="txtNum" name="txtnum">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 col-md-3 text-right" ><?php echo t('កំណត់ចំណាំ') ?></label>
                                        <div class="col-lg-9 col-md-9">
                                            <textarea class="form-control" rows="8" name="remark" id="remark"></textarea>
                                        </div>
                                    </div>



                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <?php } ?>
</div>
<script src="<?php echo base_url('') ?>assets/jquery.typeahead.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<script type="text/javascript">

    $('#btn-submit').on('click', function () {
        save_promote_certificate()
    });
    // save maternity leave ========================
    function save_promote_certificate() {
        var csv_id = $('#csv_id').val();
        var csv_work_id = $('#csv_work_id').val();
        var salary_level = $('#salary_level').val();
        var index_multiply = $('#index_multiply').val();
        var index_salary = $('#index_salary').val();
        var pure_salary = $('#pure_salary').val();
        var txtdate = $('#txtdate').val();
        var multiTags = $("#frm-certificated");
        var tags = multiTags.find("input.tag").map(function () {
            return $(this).val();
        }).get()
        var txtNum = $('#txtNum').val();
        var remark = $('#remark').val();
        // alert(salary_level);
        if (txtdate === '') {
            $('#txtdate').parent().addClass('has-error');
            return false;
        } else {
            $.ajax({
                type: 'post',
                url: '<?= site_url('csv/csv_update/promoted_certificate') ?>',
                datatype: 'json',
                data: {
                    csv_id: csv_id,
                    csv_work_id: csv_work_id,
                    salary_level: salary_level,
                    index_multiply: index_multiply,
                    index_salary: index_salary,
                    pure_salary: pure_salary,
                    txtdate: txtdate,
                    tags: tags,
                    txtNum: txtNum,
                    remark: remark
                },
                beforeSend: function () {
                    $('.xmodal').show();
                },
                success: function (data) {
                    $('.xmodal').hide();
                    if (data.status === 'success') {
                        swal({
                            text: "មន្ត្រី ត្រូវឡើងថ្នាក់ និង ឋានន្តរស័ក្តិតាមវិញានបនប័ត្រ ត្រូវបានរក្សាទុកដោយជោគជ័យ",
                            type: 'success',
                            showCancelButton: false,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            closeOnClickOutside: false
                        });
                        setTimeout(function () {
                            window.location.href = "<?php echo site_url('csv/csv_update/csv_promoted_certificated') ?>/";
                        }, 2500);
                    }
                }
            });
        }
    }
    //List salary level=================
    $('#salary_level').on('change', function () {
        var salary_level = $('#salary_level').val();
        $.ajax({
            url: "<?= site_url('csv/csv_update/index_miltiple_salary') ?>",
            type: "post",
            datatype: "json",
            // async: false,
            beforeSend: function () {
               // $('.xmodal').show();
            },
            data: {salary_level: salary_level},
            success: function (data) {
                if (data.length > 0) {
                    $.each(data, function (i, item) {
                        if (salary_level == item.type) {
                            $('#index_multiply').val(item.multiple);
                            $('#index_salary').val(item.multiple_money);
                            var t = 0;
                            t += Number($('#index_multiply').val()) * Number($('#index_salary').val());
                            $('#pure_salary').val(t);
                        } else {
                            $('#index_multiply').val(0);
                            $('#index_salary').val(0);
                            var t = 0;
                            t += Number($('#index_multiply').val()) * Number($('#index_salary').val());
                            $('#pure_salary').val(t);
                        }
                    });
                } else {
                    $('#index_multiply').val(0);
                    $('#index_salary').val(0);
                    var t = 0;
                    t += Number($('#index_multiply').val()) * Number($('#index_salary').val());
                    $('#pure_salary').val(t);
                }

            },
            error: function () {
            }
        });
    });


    function list_salary() {
        //level salary==========
        $.ajax({
            url: "<?= site_url('csv/csv_update/level_salary') ?>",
            type: "post",
            datatype: "json",
            // async: false,
            beforeSend: function () {
                // $('.xmodal').show();
            },
            data: {},
            success: function (data) {
                var value = $('#salary_level').attr('value');
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.type == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + value + "</option>";
                        } else if (item.type != value && item.type != '' && item.type != null) {
                            opt += "<option  value='" + item.type + "'>" + item.type + "</option>";
                        }
                    });
                }
                $('#salary_level').html(opt);
            },
            error: function () {
            }
        });
    }
    $('body').delegate(".datepick", "focus", function (e) {
        dateTimeall();
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
            });
        });
    }
    $(document).ready(function () {
        list_salary();
        $.typeahead({
            input: ".js-typeahead",
            cache: true,
            minLength: 1,
            maxItem: 15,
            order: "asc",
            dynamic: true,
            delay: 500,
            hint: true,
            href: '<?php echo site_url('csv/csv_update/get_csv_detail?value={{id}}-{{name}}&id={{idtable}}&frm=certificated ') ?>',
            cancelButton: true,
            display: ["id", "name"],
            backdrop: {
                "background-color": "#fff"
            },
            source: {
                ajax: {
                    url: "<?php echo site_url('csv/csv_update/get_csv') ?>",
                    path: "data.officer"
                }
            },

            debug: false
        });
    });
    $('#add-field').on('click', function () {
        var i = $('#fild-count').val();
        var inputform = '<div class="form-group">' +
            '<label class="col-lg-4 col-md-4 text-right"></label>' +
            '<div class="col-lg-7 col-md-7" >' +
            '<div class="input-group">' +
            '<input id="fieldID' + i + '" type="text" name="reference_file[]" value="" class="form-control tag" readonly>' +
            '<span class="input-group-btn">' +
            '<a href="<?php echo base_url() ?>/assets/filemanager/dialog.php?type=2&field_id=fieldID' + i + '&relative_url=1&folder=promote_file_reference" class="btn btn-info iframe-btn" type="button">ស្វែងរក</a>' +
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
    $('.iframe-btn').fancybox({
        'width': 900,
        'height': 600,
        'type': 'iframe',
        'autoScale': true
    });
    $('body').delegate(".remove-file", "click", function (e) {
        var fieldfile = $(this).parent();
        fieldfile.fadeOut('slow', function () {
            $(this).remove();
        });
    });
</script>