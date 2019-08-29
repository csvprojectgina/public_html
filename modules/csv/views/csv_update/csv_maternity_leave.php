<link rel="stylesheet" href="<?php echo base_url('') ?>assets/jquery.typeahead.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
<style>
    .remove-file, #add-field{
        cursor: pointer;
    }
    .remove-file i{
        color: red;
    }
    input{
        font-family: khmermef1;
    }
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​--> <?= t('ទំរងការបោះបង់ ឬ លំហែមាតុភាព') ?></h3>
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
                                <input class="form-control js-typeahead" value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_id'] . ' ' . $csv_record['csv_name'] : '' ?>" name="officer_search" type="search" style="font-family: khmermef1;"   autocomplete="off"/>
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
        <div class="panel-heading">
            <ul class="nav nav-pills nav-fill">
                <li class="active nav-pills​​"><a data-toggle="tab" href="#home" style="font-size: 18px;">លំហែមាតុភាព</a></li>
                <li><a data-toggle="tab" href="#menu1" style="font-size: 18px;">ការលុបឈ្មោះចេញពីមន្ត្រី</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <fieldset >
                        <legend style="margin-left: 5px;"><?= t('លំហែមាតុភាព') ?></legend>
                        <div class="row">
                            <form id="frm-matemity" method="post" >
                                <input type="hidden" name="csv_id" id="csv_id" value="<?php echo $csv_record['rec_id'] ?>"/>
                                <input type="hidden" name="csv_work_id" id="csv_work_id" value="<?php echo $csv_record['work_id']; ?>"/>
                                <div class="col-lg-6 col-md-6 form-horizontal">
                                    <div class="form-group changeDate">
                                        <label class="col-lg-2 col-md-2 text-right"><?= t('ថ្ងៃ ខែ ឆ្នាំ ចាប់ផ្តើម') ?></label>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                                <input type="text" value="" class="form-control datepick1" id="firstDate"/>
                                            </div>
                                        </div>
                                        <label class="col-lg-2 col-md-2 text-right"><?= t('ថ្ងៃ ខែ ឆ្នាំ បញ្ចប់') ?></label>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                                <input type="text" value="" class="form-control datepick" id="secondDate"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-2 text-right"><?= t('Issue Date') ?></label>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                                <input type="text" value="" class="form-control datepick" id="issueDate"/>
                                            </div>
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
                                            <span class="btn btn-success" id="btn-submit-leave"><?php echo t('រក្សាទុក'); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 form-horizontal">
                                    <div class="form-group">
                                        <label class="col-lg-4 col-md-4 text-right"><?= t('លិខិតយោង') ?></label>
                                        <div class="col-sm-8 col-md-8">
                                            <input type="text" value="" class="form-control" id="txtnu_of_reference_1" name="txtnu_of_reference_1"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 col-md-4 text-right"><?= t('ឯកសារយោង') ?></label>
                                        <div class="col-lg-7 col-md-7" >
                                            <div class="input-group">
                                                <input id="fieldID2" type="text" name="reference_file[]" value="" class="form-control tag" readonly>
                                                <span class="input-group-btn">
                                                    <a href="<?php echo base_url() ?>/assets/filemanager/dialog.php?type=2&field_id=fieldID2&relative_url=1" class="btn btn-info iframe-btn" type="button">Select File</a>
                                                </span>
                                            </div>
                                        </div>
                                        <label class="col-lg-1 col-md-1" id="add-field"><i class="fa fa-plus-circle fa-2x "></i></label>
                                    </div>
                                    <div id="more-file">
                                        <input type="hidden" value="3" id="fild-count"/>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </fieldset>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <fieldset >
                        <div class="row" style="margin-top:20px; ">
                            <form  method="post" id="multi1">
                                <input type="hidden" name="csv_id" value="<?php echo $csv_record['rec_id'] ?>"/>
                                <input type="hidden" name="csv_work_id" value="<?php echo $csv_record['work_id']; ?>"/>
                                <div class="col-lg-6 col-md-6 form-horizontal">
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-2 text-right">ជ្រើសរើស</label>
                                        <div class="col-sm-8 col-md-8">
                                            <select name="cbo" class="form-control" id="selected">
                                                <option value="">--ជ្រើសរើស--</option>
                                                <option value="die">មរណភាព</option>
                                                <option value="dismissal">បោះបង់ចោលការងារ</option>
                                                <option value="go_out_of_work">សុំលាឈប់ពីការងារ</option>
                                                <option value="internship_not_success">កម្មសិក្សាមិនជោគជ័យ</option>
                                                <option value="not_all_retirement_conditions">មិនគ្រប់លក្ខខ័ណ្ឌចូលនិវត្ត</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-2 text-right"><?= t('ថ្ងៃ ខែ ឆ្នាំ') ?></label>
                                        <div class="col-sm-10 col-md-10">
                                            <div class="input-group">
                                                <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                                <input type="text" value="" class="form-control datepick" id="txtDate"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-2 text-right"><?= t('កំណត់ចំណាំ') ?></label>
                                        <div class="col-lg-10 col-md-10">
                                            <textarea class="form-control" rows="8" id="remark1" style="text-align: justify; font-size: 18px;"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-2 text-right"></label>
                                        <div class="col-lg-10 col-md-10">
                                            <span class="btn btn-success" id="btn-submit-deletion"  ><?php echo t('រក្សាទុក'); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 form-horizontal">

                                    <div class="form-group">
                                        <label class="col-lg-4 col-md-4 text-right"><?= t('លិខិតយោង') ?></label>
                                        <div class="col-sm-8 col-md-8">
                                            <input type="text" value="" class="form-control" id="txtnu_of_reference" name="txtnu_of_reference"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 col-md-4 text-right"><?= t('ឯកសារយោង') ?></label>
                                        <div class="col-lg-7 col-md-7" >
                                            <div class="input-group">
                                                <input id="outfieldID2" type="text" name="outreference_file[]" value="" class="form-control tag1" readonly>
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
                    </fieldset>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('') ?>assets/jquery.typeahead.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<script type="text/javascript">
      var die = 'ទទួលបានប្រាក់ឧបត្ថម្ភគោលនយោបាយស្មើនឹងបៀវត្សមូលដ្ធានគុណ ៦ ខែ \n និងប្រាក់បូជាសពចំនួន ២លានរៀល(មរណភាពដោយជំងឺ) \n ឬ ៤លានរៀល(មរណភាបពេលបំពេញការងារ)។';
        var dismissal = '-មន្ត្រីរាជការដែលពុំបានដាក់ពាក្យសុំបន្តភាពទំនេរគ្មានបៀវត្ស រឺចូលបម្រើការងារវិញនៅថ្ងៃចុងក្រោយភាពទំនេរគ្មានបៀវត្ស\n-មន្ត្រីដែលអវត្តមានមិនមកបំ។';
        var go_out_of_work = '*មន្ត្រីរាជការមានសិទ្ធសុំលាឈប់ពីការងាររដ្ធ ដោយទទួលបានប្រាក់ឧបត្ថម្ភដូចខាងក្រោម:\n' +
                '-បម្រើការងាររដ្ធចាប់ពី ១ ឆ្នាំ ដល់ ៣ ឆ្នាំ គឺយកបៀវត្សមូលដ្ធានគុណនឹង ៣ \n' +
                '-បម្រើការងាររដ្ធចាប់ពី ៤ ឆ្នាំ ដល់ ៩ ឆ្នាំ ទទួលបានប្រាក់ឧបត្ថម្ភសមាមាត្រនៃឆ្នាំ​ \n' +
                '-បម្រើការងារលើសពី ១០ ឆ្នាំ គឺយកបៀវត្សមូលដ្ធានគុណនឹង ១០។';
        var not_all_retirement_conditions = 'មន្ត្រីដល់អាយុចូលនិវត្តន៍ រឺ បាត់បង់សម្បទាវិជ្ជាជីវះ \nប៉ុន្តែអតតីតភាបការងារតិចជាង ២០ឆ្នាំ \nគឺទទួលបានប្រាក់ឧបត្ថម្ភម្ដង់គត់ដោយយកប្រាក់បៀវត្សមូលដ្ធានប្រចាំខែគុណនឹង ១០។';

    $('#selected').change(function () {
              var b = $(this).val();
      // alert(b);
        if (b === 'die')
        {
            // alert(die);
           myFunction(die);
        } 
        else if (b === 'dismissal')
        {
            myFunction(dismissal);
        } 
        else if (b === 'go_out_of_work')
        {
            myFunction(go_out_of_work);
        } 
        else if (b === 'internship_not_success') {

           myFunction(internship_not_success);
        }
        else if (b === 'not_all_retirement_conditions') {
           myFunction(not_all_retirement_conditions);
        }

    });
    function myFunction(val_str) {
        document.getElementById("remark1").value = val_str;
    }
        
    $('#btn-submit-deletion').on('click', function () {
        deletion();
    });

    function deletion() {

         var die = $("#selected").val();
        var csv_id = $('#csv_id').val();
        var csv_work_id = $('#csv_work_id').val();
        var txtDate = $('#txtDate').val();
        var remark = $('#remark1').val();
        var txtnu_of_reference = $('#txtnu_of_reference').val();
        var multiTags = $("#multi1");
        var tags = multiTags.find("input.tag1").map(function () {
            return $(this).val();
        }).get();


        /*
        // alert(tags);
        // return false;
        // var date = $('#txtdate').val();
        */
        if (txtDate === '' || die ==='') {
            $('#selected').parent().addClass('has-error');
            
            $('#txtDate').parent().addClass('has-error');
            return false;
        } else {

            swal({
                title: 'តើពិតជាប្រាកដ រឺ អត់ ?',
                text: "តើលោក អ្នកពិតជាធ្វើការលុបមន្ត្រីនេះមេនទេ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'យល់ព្រម',
                cancelButtonText: 'ទេ',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        $.ajax({
                            type: 'post',
                            url: '<?= site_url('csv/csv_update/save_del_meternity') ?>',
                            datatype: 'json',
                            data: {
                                csv_id: csv_id,
                                csv_work_id: csv_work_id,
                                txtDate: txtDate,
                                remark: remark,
                                tags: tags,
                                cbo: die,
                                txtnu_of_reference: txtnu_of_reference
                            },
                            beforeSend: function () {
                                $('.xmodal').show();
                            },
                            success: function (data) {
                                $('.xmodal').hide();
                            }
                            // cache: false
                        }).done(function (data) {
                            if (data.status) {
                                swal({
                                    title: 'ដោយជោគជ័យ ',
                                    text: 'បច្ចុប្បន្នភាព ត្រូវបានរក្សាទុកដោយជោគជ័យ',
                                    type: 'success',
                                    allowOutsideClick: false
                                });
                                setTimeout(function () {
                                    window.location.href = "<?php echo site_url('csv/csv_update/csv_maternity_leave/') ?>/";
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

    }


    $('#btn-submit-leave').on('click', function () {
        save_maternity_leave();
    });
    // save maternity leave ========================
    function save_maternity_leave() {
        var firstDate = $('#firstDate').val();
        var secondDate = $('#secondDate').val();
        var reMark = $('#reMark').val();
        var csv_id = $('#csv_id').val();
        var csv_work_id = $('#csv_work_id').val();
        var txtnu_of_reference = $('#txtnu_of_reference_1').val();
        var issueDate = $('#issueDate').val();
        var multiTags = $("#frm-matemity");
        var tags = multiTags.find("input.tag").map(function () {
            return $(this).val();
        }).get();
        // alert(tags.join(','));
        // return false;
        if (firstDate === '') {
            $('#firstDate').parent().addClass('has-error');
            return false;
        } else {
            $.ajax({
                type: 'post',
                url: '<?= site_url('csv/csv_update/save_maternity_leave') ?>',
                datatype: 'json',
                data: {
                    firstDate: firstDate,
                    secondDate: secondDate,
                    reMark: reMark,
                    tags: tags,
                    csv_id: csv_id,
                    csv_work_id: csv_work_id,
                    txtnu_of_reference: txtnu_of_reference,
                    issueDate: issueDate
                },
                beforeSend: function () {
                    $('.xmodal').show();
                },
                success: function (data) {
                    $('.xmodal').hide();
                    if (data.status === 'success') {
                        swal({
                            text: "លំហែមាតុភាព ត្រូវបានរក្សាទុកដោយជោគជ័យ",
                            type: 'success',
                            showCancelButton: false,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            closeOnClickOutside: false
                        });
                        setTimeout(function () {
                            window.location.href = "<?php echo site_url('csv/csv_update/csv_maternity_leave/') ?>/";
                        }, 6000);
                    }
                }
            });
        }
    }

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
            href: '<?php echo site_url('csv/csv_update/get_csv_detail?value={{id}}-{{name}}&id={{idtable}}&frm=matemity') ?>',
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
                '<label class="col-lg-4 col-md-4 text-right"></label>' +
                '<div class="col-lg-7 col-md-7" >' +
                '<div class="input-group">' +
                '<input id="fieldID' + i + '" type="text" name="reference_file[]" value="" class="form-control tag" readonly>' +
                '<span class="input-group-btn">' +
                '<a href="<?php echo base_url() ?>/assets/filemanager/dialog.php?type=2&field_id=fieldID' + i + '&relative_url=1" class="btn btn-info iframe-btn" type="button">Select File</a>' +
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

    //fancybox for ការលុបឈ្មោះចេញពីមន្ត្រី
    $('#add-field-out').on('click', function () {
        var i = $('#fild-count-out').val();
        var inputform = '<div class="form-group">' +
                '<label class="col-lg-4 col-md-4 text-right"></label>' +
                '<div class="col-lg-7 col-md-7" >' +
                '<div class="input-group">' +
                '<input id="outfieldID' + i + '" type="text" name="outreference_file[]" value="" class="form-control" readonly>' +
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


    //datetimepicker for ការលុបឈ្មោះចេញពីមន្ត្រី
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
            // }).on('change', function () {
            //     var getdate = $(this).val();
            //     var res = getdate.split("-");

            //     var d = res[0];
            //     var m = parseInt(res[1]);
            //     var y = res[2];

            //     var newdate = new Date(y, m, d);
            //     var addmonth = new Date(newdate.setMonth(newdate.getMonth() + 2));

            //     $('#secondDate').val(formatDate(addmonth));

            });
        });
    }

    //datetimepicker for លំហែមាតុភាព
    $('body').delegate(".datepick1", "focus", function (e) {
        dateTimeall1();
    });

    function dateTimeall1() {
        $('.datepick1').each(function () {
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
            // }).on('change', function () {
            //     var getdate = $(this).val();
            //     var res = getdate.split("-");

            //     var d = res[0];
            //     var m = parseInt(res[1]);
            //     var y = res[2];

            //     var newdate = new Date(y, m, d);
            //     var addmonth = new Date(newdate.setMonth(newdate.getMonth() + 2));

            //     $('#secondDate').val(formatDate(addmonth));

            });
        });
    }

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

        return day + '-' + monthNames[monthIndex] + '-' + year;
    }




</script>

