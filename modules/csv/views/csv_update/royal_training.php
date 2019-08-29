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
        <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​--> <?= t('មន្ត្រីទទួលបានការបណ្តុះបណ្តាលសិក្សារនៅសាលាភូមិន្ទរដ្ឋបាល') ?></h3>
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
                                <input class="form-control js-typeahead" value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_id'] . ' ' . $csv_record['csv_name'] : '' ?>" name="officer_search" type="search"   autocomplete="off" style="width: 100%!important; font-family: khmermef1;"/>
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
                            <input class="form-control" name="officer_name" value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_name'] : '' ?>" id="officer_name"type="text" style="width: 100%!important; font-family: khmermef1;"/>
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

            <fieldset >
            <div class="panel panel-info">

                <div class="panel-heading">

                    <h4 class="panel-title">

                        <a style="color: #797979 !important; margin-left: -13px; margin-top: 3px;"

                        class="collapsed"><?= t('មន្ត្រីទទួលបានការបណ្តុះបណ្តាលសិក្សារនៅសាលាភូមិន្ទរដ្ឋបាល') ?></a>

                    </h4>

                </div>
                <br>
                
                <div class="row">
                    <form id="frm-royal_training" method="post">

                   

                    
                        <input type="hidden" name="csv_id" value="<?php echo $csv_record['rec_id'] ?>"/>
                        <input type="hidden" name="csv_work_id" value="<?php echo $csv_record['work_id']; ?>"/>
                        <div class="col-lg-6 col-md-6 form-horizontal">


                        <!-- edit -->
                        <div class="form-group">
                               
                            <label class="col-lg-2 col-md-2 text-right"><?= t('ប្រភេទកម្មសិក្សារ') ?></label>
                            <div class="col-sm-8 col-md-8">
                                <select name="type_train" class="form-control" id="type_train"  data-placement="top" title="ប្រភេទកម្មសិក្សារ" required="required">
                                    <option value="">--ជ្រើសរើស--</option>
                                    <option value="រយះពេលខ្លី">រយះពេលខ្លី</option>
                                    <option value="ថ្នាក់មធ្យម">ថ្នាក់មធ្យម</option>
                                    <option value="ថ្នាក់ឧត្តម">ថ្នាក់ឧត្តម</option>
                                               
                                </select>
                            </div>
                        </div>

                        
                    
                        
                       
                        <div class="form-group ">
                                <label class="col-lg-2 col-md-2 text-right"><?= t('វគ្គសិក្សារ') ?></label>
                                <div class="col-lg-8 col-md-8">
                                <input type = "text"  class="form-control" id="subject_course" name = "subject_course"  placeholder="វគ្គសិក្សារ" data-toggle="tooltip" data-placement="top" title="វគ្គសិក្សារ"  required="required">
                                    
                                </div>
                        </div>

                       
                       

                        <div class="form-group ">
                                <label class="col-lg-2 col-md-2 text-right"><?= t('ជំនាញ') ?></label>
                                <div class="col-lg-8 col-md-8">
                                <input type = "text"  class="form-control" id="skill_train" name = "skill_train"  placeholder="ជំនាញដែលត្រូវសិក្សារ" data-placement="top" title="ជំនាញដែលត្រូវសិក្សារ" required="required">
                                    
                                </div>
                        </div>
                        
                       
                            
                        <div class="form-group changeDate">
                                
                            <label class="col-lg-2 col-md-2 text-right"><?= t('ថ្ងៃ ខែ ឆ្នាំ​​ ចាប់ផ្តើម') ?></label>
                            <div class="col-sm-10 col-md-10">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>  
                                    <input type="text" value="" class="form-control datepick" id="txtDate" name="startDate"​​  data-placement="top" title="ថ្ងៃ ខែ ឆ្នាំ​​ ចាប់ផ្តើម" required="required"/>
                                </div>
                            </div>
                            
                               
                            <label class="col-lg-2 col-md-2 text-right"><?= t('ថ្ងៃ ខែ ឆ្នាំ​​ បញ្ចប់') ?></label>
                            <div class="col-sm-10 col-md-10">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>  
                                    <input type="text" value="" class="form-control datepick" id="secondDate" name="endDate"  data-placement="top" title="ថ្ងៃ ខែ ឆ្នាំ​​ បញ្ចប់" required="required"/>
                                </div>
                            </div>
                        </div>

                            <br/>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 text-right"></label>
                                <div class="col-lg-10 col-md-10">
                                    <button class="btn btn-success" id="btn-submit" type="submit" ><?php echo t('រក្សាទុក'); ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 form-horizontal">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 text-right"><?= t('ឯកសារយោង') ?></label>
                                <div class="col-lg-9 col-md-9" >
                                    <div class="input-group">
                                        <input id="fieldID2" type="text" name="reference_file[]" value="" class="form-control" readonly>
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



            </div>
            
            </fieldset>
            
        <?php } ?>
    </div>
</div>



<script src="<?php echo base_url('') ?>assets/jquery.typeahead.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $.typeahead({
            input: ".js-typeahead",
            cache: true,
            minLength: 1,
            maxItem: 15,
            order: "asc",
            highlight: true,
            dynamic: true,
            delay: 500,
            hint: true,
            href: '<?php echo site_url('csv/csv_update/get_csv_detail?value={{id}}-{{name}}&id={{idtable}}&frm=royal_training') ?>',
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
                '<label class="col-lg-2 col-md-2 text-right"></label>' +
                '<div class="col-lg-9 col-md-9" >' +
                '<div class="input-group">' +
                '<input id="fieldID' + i + '" type="text" name="reference_file[]" value="" class="form-control" readonly>' +
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
            });
        });
    }
    $('body').delegate(".datepick", "focus", function (e) {
        dateTimeall();
    });
    $("#frm-royal_training").on('submit', function (e) {
        e.preventDefault();
        var date = $('#txtdate').val();
        if (date === '') {
            $('#txtdate').parent().addClass('has-error');
            return false;
        } else {
            $.ajax({
                url: '<?php echo site_url('csv/csv_update/save_royal_training') ?>',
                type: "post",
                datatype: "json",

                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.xmodal').show();
                },
                success: function (data) {
                     $('.xmodal').hide();
                 if(data.status === 'success'){
                   
                       swal({
                        title:"ជោគជ័យ",   
                        text: "បច្ចុប្បន្នភាព ត្រូវបានរក្សាទុកដោយជោគជ័យ",
                        type: 'success',
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        closeOnClickOutside: false
                    });
                    setTimeout(function () {
                        window.location.href = "<?php echo site_url('csv/csv_update/csv_training_royal_school/') ?>/";
                    }, 3000);
                 }else if (data.status === 'token'){
                  
                       swal({
                        title:"ទិន្នន័យ ដូចគ្នា",   
                        text: "ទិន្នន័យ បានធ្វើបច្ចុប្បន្នភាពរួចរាល់ សូមជ្រើសរើសមន្ត្រីផ្សេងទៀត",
                        type: 'info',
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        closeOnClickOutside: false
                    });
                }
              }
            });

        }
    });


</script>