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


<div class="panel panel-default panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?= t('ព័ត៌មាននិស្សិតចុះកម្មសិក្សា') ?></h3>
    </div>
    <div class="panel-body">
            <fieldset >
                <legend><?= t('ព័ត៌មានផ្ទាល់ខ្លួន') ?></legend>
                <div class="row">
                    <form id="frm_internship" method="post"  method="POST" enctype="multipart/form-data">
                        <div class="col-lg-6 col-md-6 form-horizontal">

                            <div class="form-group">
                                <label for="lastname"  class="col-sm-3 control-label " ><?= t('គោត្តនាម ') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control " id="lastname"  
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញគោត្តនាម" maxlength="255" 
                                        value="<?= set_value('lastname', isset($row->last_name) ? $row->last_name : '') ?>" required="required"/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="first_name"   class="col-sm-3 control-label required"><?= t('នាម') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="first_name" required
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញនាម" maxlength="255"  
                                        value="<?= set_value('first_name', isset($row->first_name) ? $row->first_name : '') ?>"  />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="english_full_name" class="col-sm-3 control-label"><?= t('អក្សរឡាតាំង') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control english_full_name"
                                        id="english_full_name"  placeholder=""
                                        data-toggle="tooltip" data-placement="top"
                                        title="បំពេញជាអក្សរឡាតាំង" maxlength="255"
                                        value="<?= set_value('english_full_name', isset($row->english_full_name) ? $row->english_full_name : '') ?>"/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender" class="col-sm-3 control-label"><?= t('ភេទ') ?></label>
                                <div class="col-sm-6">
                                    <select name="gender" class="form-control gender" id="gender" >

                                        <option value="ស្រី">ស្រី</option>
                                        <option value="ប្រុស">ប្រុស</option>
                                        <!-- <option value="other">other</option> -->

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth" class="col-sm-3 control-label"><?= t('ថ្ងៃ ខែ ឆ្នាំកំណើត') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control datepick" required

                                        id="date_of_birth"  name="dateinput" 

                                        value="<?= set_value('date_of_birth', isset($row->date_of_birth) ? $row->date_of_birth : '') ?>"/>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="place_of_birth"   class="col-sm-3 control-label required"><?= t('ទីកន្លែងកំណើត') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="place_of_birth" 
                                        placeholder="ខេត្ត ក្រុង" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញខេត្ត" maxlength="255" 
                                         value="<?= set_value('place_of_birth', isset($row->place_of_birth) ? $row->place_of_birth : '') ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address"   class="col-sm-3 control-label required"><?= t('អាសយដ្ឋាន បច្ចុប្បន្ន') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="address"
                                        placeholder="ខេត្ត ក្រុង" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញខេត្ត" maxlength="255"  
                                        value="<?= set_value('address', isset($row->address) ? $row->address : '') ?>" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone_number"   class="col-sm-3 control-label required"><?= t('លេខទូរស័ព្ទ') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="phone_number" 
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញលេខទូរស័ព្ទ" maxlength="255"  
                                        value="<?= set_value('phone', isset($row->phone) ? $row->phone : '') ?>"/>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"   class="col-sm-3 control-label required"><?= t('អ៊ីមែល') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="email" 
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញអ៊ីមែលទ" maxlength="255"  
                                        value="<?= set_value('email', isset($row->email) ? $row->email : '') ?>"/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label "></label>
                                <div class="col-sm-60">
                                    <button class="btn btn-success" id="btn_submit" type="submit" ><?php echo t('រក្សាទុក'); ?></button>
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
                                        title="បំពេញ" maxlength="255"  
                                        value="<?= set_value('major', isset($row->major) ? $row->major : '') ?>" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="school"   class="col-sm-3 control-label required"><?= t('ឈ្មោះសាលា') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="school" 
                                        placeholder="ឈ្មោះសកលវិទ្យាល័យ" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញឈ្មោះសាលា" maxlength="255"  
                                        value="<?= set_value('school', isset($row->school) ? $row->school : '') ?>"/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="work_name"   class="col-sm-3 control-label required"><?= t('កម្មសិក្សាលើផ្នែក') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="work_name" required
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="បំពេញការងារ" maxlength="255"  
                                        value="<?= set_value('work_on', isset($row->work_on) ? $row->work_on : '') ?>" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="intern_id"   class="col-sm-3 control-label required"><?= t('អត្តលេខ') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="intern_id" 
                                        placeholder="" data-toggle="tooltip" data-placement="top"
                                        title="" maxlength="255"  
                                        value="<?= set_value('intern_id', isset($row->intern_id) ? $row->intern_id : '') ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="start_date" class="col-sm-3 control-label"><?= t('ថ្ងៃ ខែ ឆ្នាំចូល') ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control datepick" required

                                        id="start_date"  name="dateinput2" 

                                        value="<?= set_value('start_date', isset($row->start_date) ? $row->start_date : '') ?>"/>
                                    
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

    $(document).ready(function(){

        $("#btn_submit").on('click', function (e) {
            e.preventDefault();
            
            var lastname= $("#lastname").val();
            var first_name = $('#first_name').val();
            var english_full_name = $('#english_full_name').val();
            var gender = $('#gender').val();

            var date_of_birth = $('#date_of_birth').val();
            var start_date = $('#start_date').val();

            var place_of_birth = $('#place_of_birth').val();
            var address = $("#address").val();
            var phone = $('#phone_number').val();
            var email = $("#email").val();
            var major = $("#major").val();
            var school = $("#school").val();
            var work_as = $("#work_name").val();
            var photo = $("#photo").val();
            var intern_id = $("#intern_id").val();
            var intern_cv = $("#fieldID2").val();

            // alert (intern_id +" "+ last_name);

            if (lastname =='' || first_name =='' ||  work_as ==''  ) 
            {   
                $('#lastname').parent().addClass('has-error');
                $('#first_name').parent().addClass('has-error');
                $('#work_name').parent().addClass('has-error');
               
                return false;
            } else if(date_of_birth == '' || start_date =='')
            {
                $('#txtdate').parent().addClass('has-error');
                $('#start_date').parent().addClass('has-error');
                return false;
            }
            
            else 
            {
                $.ajax(
                {
                    type: "post",
                    url: '<?php echo site_url('csv/internship_info/save_internship_info') ?>',
                    datatype: "json",

                    data: {
                        
                        lastname: lastname,
                        first_name: first_name,
                        gender: gender,

                        date_of_birth: date_of_birth,
                        start_date: start_date,
                        
                        place_of_birth: place_of_birth,
                        address: address,
                        phone: phone,
                        email: email,
                        major: major,
                        school: school,
                        work_as: work_as,
                        photo: photo,
                        intern_cv: intern_cv,
                        intern_id: intern_id,
                        english_full_name: english_full_name,

                    },
                
                    // data:new FormData(this),

                    enctype: 'multipart/form-data',

                
                    // error: function() {
                    //     alert('Something is wrong');
                    // },

                    error: function(xhr, ajaxOptions, thrownError){
                        alert('Something is wrong');
                        alert(xhr.status);
                        swal({
                                title:"បរាជ័យ",   
                                text: "បញ្ចូលព័ត៌មាន មិនបានជោគជ័យ",
                                type: 'danger',
                                showCancelButton: false,
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                closeOnClickOutside: false
                            });
                    },

                    beforeSend: function () {
                        $('.xmodal').show();
                    },

                    success: function (data) 
                    {
                        $('.xmodal').hide();
                        if(data.status === 'success')
                        {
                            swal({
                                title:"ជោគជ័យ",   
                                text: "បញ្ចូលព័ត៌មាន ត្រូវបានរក្សាទុកដោយជោគជ័យ",
                                type: 'success',
                                showCancelButton: false,
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                closeOnClickOutside: false
                            });
                            setTimeout(function () {
                                window.location.href = "<?php echo site_url('csv/internship_info/index/') ?>/";
                            }, 3000);
                        
                        }
                    }

                });

            }
        });
    });


    

    // function dateTimeall() {
    //     $('.datepick').each(function () {
    //         $(this).datepicker({
    //             format: "dd-mm-yyyy",
    //             startDate: "01-01-1950",
    //             todayBtn: true,
    //             language: "kh",
    //             keyboardNavigation: false,
    //             calendarWeeks: true,
    //             autoclose: true,
    //             todayHighlight: true,
    //             toggleActive: true
    //         }).on('change', function () {
    //             var getdate = $(this).val();
    //             var res = getdate.split("-");

    //             var d = res[0];
    //             var m = parseInt(res[1]);
    //             var y = res[2];

    //             var newdate = new Date(y, m, d);
    //             var addmonth = new Date(newdate.setMonth(newdate.getMonth() + 2));

    //             $('#date_of_birth').val(formatDate(addmonth));

    //         });
    //     });
    // }


    // $('body').delegate(".datepick", "focus", function (e) {
    //     dateTimeall();
    // });

    



</script>