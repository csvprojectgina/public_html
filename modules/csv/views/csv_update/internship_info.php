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

    <div class="panel-body">
       <fieldset >
       <legend><?= t('ព័ត៌មានផ្ទាល់ខ្លួន') ?></legend>
                <div class="row">
                    <form id="frm_internship" method="post">
                        <div class="col-lg-6 col-md-6 form-horizontal">

                            <div class="form-group">
                                <label for="last_name"  class="col-sm-3 control-label required"><?= t('គោត្តនាម') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control required" id="last_name" 
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញគោត្តនាម" maxlength="255"
                                        value=""/>
                                
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="first_name"   class="col-sm-3 control-label required"><?= t('នាម') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="first_name" 
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញនាម" maxlength="255"  value=""/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="english_full_name" class="col-sm-3 control-label"><?= t('អក្សរឡាតាំង') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control english_full_name"
                                        id="english_full_name"  placeholder=""
                                        data-toggle="tooltip" data-placement="top"
                                        title="បំពេញជាអក្សរឡាតាំង" maxlength="255"
                                        value=""/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender" class="col-sm-3 control-label"><?= t('ភេទ') ?></label>
                                <div class="col-sm-6">
                                    <select name="gender" class="form-control gender" id="gender">
                
                                        <option value="ស្រី">ស្រី</option>
                                        <option value="ប្រុស">ប្រុស</option>
                                        <!-- <option value="other">other</option> -->
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth" class="col-sm-3 control-label"><?= t('ថ្ងៃ ខែ ឆ្នាំកំណើត') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control datepick"
                                        id="txtdate" name="dateinput" placeholder="ខែ/ថ្ងៃ/ឆ្នាំ"
                                        data-toggle="tooltip" data-placement="top"
                                        title="បំពេញជាថ្ងៃខែឆ្នាំ" maxlength="255"
                                        value=""/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="place_of_birth"   class="col-sm-3 control-label required"><?= t('ទីកន្លែងកំណើត') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="place_of_birth" 
                                        placeholder="ខេត្ត ក្រុង" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញខេត្ត" maxlength="255"  value=""/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address"   class="col-sm-3 control-label required"><?= t('អាសយដ្ឋាន បច្ចុប្បន្ន') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="address"
                                        placeholder="ខេត្ត ក្រុង" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញខេត្ត" maxlength="255"  value=""/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone_number"   class="col-sm-3 control-label required"><?= t('លេខទូរស័ព្ទ') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="phone_number" 
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញលេខទូរស័ព្ទ" maxlength="255"  value=""/>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"   class="col-sm-3 control-label required"><?= t('អ៊ីមែល') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="email" 
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញអ៊ីមែលទ" maxlength="255"  value=""/>

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label "></label>
                                <div class="col-sm-60">
                                    <button class="btn btn-success" id="btn-submit" type="submit" ><?php echo t('រក្សាទុក'); ?></button>
                                </div>
                            </div>


                           

                        </div>
                        
                        <div class="col-lg-6 col-md-6 form-horizontal">
                            
                            <div class= "form-group">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6 ">
                                    <img    class="img thumbnail img-center" id="img" width="150px" height="170px" 
                                            src="http://127.0.0.1/public_html/assets/csv/blank-user.jpg" 
                                            onerror=" this.src='http://127.0.0.1/public_html/assets/csv/blank-user.jpg'  "  >

                                    <input  style="position: absolute; aline: center; top: 0px; width: 150px; height:170px; 
                                            cursor:pointer; background:transparent; border: none !important; 
                                            opacity: 0; " type="file" id ="photo" name="photo" accept="image/*" >

                                    <!-- <?php

                                    if (isset($row->photo)) {

                                        if ($row->photo == '' || is_null($row->photo) || $row->photo == '0') {

                                            ?>

                                      

                                            <img class="img  thumbnail img-center" id="img" width="150px"

                                                height="170px"

                                                src=""

                                                onerror="this.src='<?= base_url() . 'assets/csv/blank-user.jpg'; ?>'"/>

                                            <input style="position: absolute; top: 0px; width: 150px; height: 170px; cursor: pointer; background: transparent; border: none !important; opacity: 0;"

                                                type="file" id="photo" name="photo" accept="image/*"/>

                                        <?php } else { ?>

                                            <input type="hidden" value="<?= $row->photo ?>" name="txtphotoupate"/>

                                            <img class="img  thumbnail img-center" id="img" width="150px"

                                                height="170px"

                                                src="<?= base_url() . $row->photo ?>"

                                                onerror="this.src='<?= base_url() . 'assets/csv/blank-user.jpg'; ?>'"/>

                                            <input style="position: absolute; top: 0px; width: 150px; height: 170px; cursor: pointer; background: transparent; border: none !important; opacity: 0;"

                                                type="file" id="photo" name="photo" accept="image/*"/>

                                                <?php

                                            }

                                        }
                                         else {

                                            ?>

                                        <img class="img  thumbnail img-center" id="img" width="150px" height="170px"

                                            src="<?= base_url() . 'assets/csv/photos/' . $id . '.jpg' ?>"

                                            onerror="this.src='<?= base_url() . 'assets/csv/blank-user.jpg'; ?>'"/>

                                        <input style="position: absolute; top: 0px; width: 150px; height: 170px; cursor: pointer; background: transparent; border: none !important; opacity: 0;"

                                            type="file" id="photo" name="photo" accept="image/*"/>

                                    <?php }

                                    ?> -->

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="major"   class="col-sm-3 control-label required"><?= t('សិក្សាជំនាញ') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="major" 
                                        placeholder="ជំនាញ រដ្ឋបាល" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញ" maxlength="255"  value=""/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="school"   class="col-sm-3 control-label required"><?= t('ឈ្មោះសាលា') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="school" 
                                        placeholder="ឈ្មោះសកលវិទ្យាល័យ" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញឈ្មោះសាលា" maxlength="255"  value=""/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="work_name"   class="col-sm-3 control-label required"><?= t('កម្មសិក្សាលើផ្នែក') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="work_name" 
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញការងារ" maxlength="255"  value="" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="intern_id"   class="col-sm-3 control-label required"><?= t('អត្តលេខ') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="intern_id" 
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="" maxlength="255"  value=""/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label "><?= t('ប្រវត្តរូបសង្ខេប') ?></label>
                                <div class="col-sm-6" >
                                    <div class="input-group">
                                        <input id="fieldID2" type="text" name="intern_cv" value="" class="form-control" readonly>
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
            href: '<?php echo site_url('csv/csv_update/get_csv_detail?value={{id}}-{{name}}&id={{idtable}}&frm=internship_info') ?>',
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


    $("#frm-internship").on('submit', function (e) {
        e.preventDefault();
        
        var date = $('#txtdate').val();
        if (date === '' || ) {
            $('#txtdate').parent().addClass('has-error');
           
            return false;
        } else {
            $.ajax({
                url: '<?php echo site_url('csv/csv_update/save_internship_info') ?>',
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
                        text: "បញ្ចូល ត្រូវបានរក្សាទុកដោយជោគជ័យ",
                        type: 'success',
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        closeOnClickOutside: false
                    });
                    setTimeout(function () {
                        window.location.href = "<?php echo site_url('csv/csv_update/internship_info/') ?>/";
                    }, 3000);
                 }
              }
            });

        }
    });


</script>