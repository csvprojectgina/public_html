<style>

    table#tbl-view thead tr th{

        text-align: center;

        background-color: #424e58;

        color: #fff;



    }

    .actionrow{

        float: right;

        display: none;

        position: absolute;

        top: 0;

        right: 0;

        line-height: 35px;

        background-color: #ddd;

        width: 100%;

    }

    .actionrow .btn{

        height: 35px;

    }

    table#tbl-view tr td{

        position: relative;

    }

    .has-profile{

        color:#0c9af7;

        float: right;

    }



</style>

<form class="form-horizontal" role="form" action="<?= site_url('csv/csv_search/print_adv') ?>"  method="post">

    <div class="panel panel-default">

        <div class="panel-heading">

            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​--> <?= t('ស្វែងរកតាមអង្គភាព') ?></h3>

        </div>



        <div class="panel-body">

            <div class="table-responsive">

                <table  style="line-height: 3; font-size: 15.5px; border:2px solid #CCC; margin: auto; margin-bottom: 10px " cellpadding="0" cellspacing="0" class="table" >

                    <tr  style="  background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%); background-repeat: repeat-x; font-size: 16px;font-family: khmer mef2; border:1px solid #CCC; text-align: center;​">

                        <td class="col-md-2" style="border:1px solid #CCC;" >អង្គភាព</td>

                        <td class="col-md-2" style="border:1px solid #CCC;" >អគ្គនាយកដ្ឋាន</td>

                        <td class="col-md-2" style="border:1px solid #CCC;" >នាយកដ្ឋាន</td>

                        <td class="col-md-2" style="border:1px solid #CCC;" >ការិយាល័យ</td>

                        <td class="col-md-2" style="border:1px solid #CCC;" >ការិយាល័យរាជធានី / ខេត្ត</td>

                        <td class="col-md-2" style="border:1px solid #CCC;" >ការិយាល័យភូមិបាល</td>

                    </tr>

                    <!--row1==============-->

                    <tr>

                        <!--<td><label for="unit">&nbsp អង្គភាព</label></td>-->

                        <td  class="col-md-2">

                            <select id="unit" class="form-control unit" name="unit" style="width: 180px;"></select>

                        </td>

                        <!--<td><label for="firstname">&nbsp អគ្គ</label></td>-->

                        <td  class="col-md-2">

                            <select id="general_dep_name" class="form-control general_dep_name" name="general_dep_name" style=""></select>

                        <!--<td><label for="work_office">&nbsp​នាយកដ្ខាន</label></td>-->

                        <td  class="col-md-2">

                            <select id="department" class="form-control department" name="department" style=""></select>

                        </td>

                        <!--<td><label for="work_office">&nbsp ការិយាល័យ</label></td>-->

                        <td  class="col-md-2">

                            <select id="work_office" class="form-control work_office" name="work_office" style=""></select>

                        </td>

                        <!--<td><label for="work_office">&nbsp ការិយាល័យ</label></td>-->

                        <td  class="col-md-2">

                            <select id="province_office" class="form-control province_office" name="province_office" style=""></select>

                        </td>

                        <!--<td><label for="skill">&nbsp land official</label></td>-->

                        <td  class="col-md-2">

                            <select id="land_official" class="form-control land_official" name="land_official" style=""></select>

                        </td>



                    </tr>



                    <tr style="border:1px solid #CCC; text-align: right;" >

                        <td colspan="12" style="height: 40px;">

                            <div id="x_img" style="display: inline; margin: 10px 600px 5px 10px"></div>

                            <button data-toggle="tooltip" data-placement="right" title="" type="button" id="refresh" class="btn btn-default"  data-original-title="ស្វែងរកសារថ្មី">ស្វែងរកសារថ្មី</button>

                            <button data-toggle="tooltip" data-placement="right" title="" type="submit" id="btn_print" class="btn btn-default" data-original-title="រៀបចំបញ្ជីមន្ត្រីរាជការជា​ PDF">រៀបចំបញ្ជីមន្ត្រីរាជការជា​PDF</button>

                        </td>

                    </tr>

                </table>

            </div>



            <div id="blog-container" class="table-responsive">

                <?php

                $body = '<table id="tbl-view" cellpadding="0" cellspacing="0" border="1" class="table  table-bordered table-hover" style="text-align: center; vertical-align: middle;">

           <thead>

            <tr>

                 <th style=" width: 40px; ">ល.រ</td>

               <th style=" width: 40px; ">អត្តលេខមន្ត្រី</td>

                <th style=" width: 40px; ">គោត្តនាម</td>

                <th style=" width: 40px; ">នាម</td>

                <th style=" width: 40px; ">ភេទ</td>

                <th style=" width: 40px; ">ថ្ងៃ​ខែឆ្នាំ កំណើត</td>

                <th style=" width: 40px; ">ទូរស័ព្ទ</td>

                <th style=" width: 40px; ">តួនាទី</td> 

            </tr>

        </thead>

            <tbody>';

                $body .= '</tbody>

            <tfoot>

                <tr>

                    <td colspan="8" style="text-align: left;padding: 10px 0 0 0;  height: 45px;">សរុបមន្ត្រី <b>' . 0 . ' នាក់</b></td>

                </tr>

            </tfoot>

        </table>';

               echo $body;

                ?>

            </div>



        </div>

    </div>

</form>



<script>

    $(function () {

        // unit==========

        f_unit();

         //f_gd();

        //departent

        //f_dp();

        // land_official

        //f_land_official();

        // work office=======

        // f_work_office();

        // province_office

        //f_pro_office();



        // refresh page ==========

        $('#refresh').on('click', function () {

            $('#lastname').val('');

            $('#firstname').val('');

            $('#gender').val('');

            $('#dateofbirth').val('');

            $('#date_in').val('');

            $('#date_out').val('');

            $('#my_gr tbody').hide();

            $('#disp').hide();

            $('#pagination-grid').hide();

            f_unit();

            //f_gd();

            // f_dp();

            // f_work_office();

            // f_pro_office();

            // f_land_official();

            // f_work_location();

            // refresh =====

            // var xtotal_display = $('#s_dis').val() - 0;

            // grid(1, xtotal_display);

        });

        // init. =========================

        //var xtotal_display = $('#s_dis').val() - 0;

        // grid(1, xtotal_display);

        // display =========================

        $('body').delegate("#s_dis", "change", function (e) {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });



        // page =============================

        $('body').delegate('.a-pagination', 'click', function () {

            var xtotal_display = $('#s_dis').val() - 0;

            var currentpage = $(this).data('currentpage');

            grid(currentpage, xtotal_display);

        });

        // lastname ===========

        $("#lastname").on("keyup", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });

        // firstname ===========

        $("#firstname").on("keyup", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });

        // gender ===========

        $("#gender").on("keyup", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });

        // dateofbirth ===========

        $("#dateofbirth").on("keyup", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });

        // date_in ===========

        $("#date_in").on("keyup", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });

        // date_out ===========

        $("#date_out").on("keyup", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });

        // current role ===========

        $("#current_role").on("change", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });

        // unit ===========

        $("#unit").on("change", function () {

            var xtotal_display = $('#s_dis').val() - 0;





            grid(1, xtotal_display);

        });

        // general departent ===========

        $("#general_dep_name").on("change", function () {

            var unit = $('#unit').val();

            var general_dep_name = $(this).val();



            get_sub_office(unit, general_dep_name, '', '', '', '');

        });

        // departement ===========

        $("#department").on("change", function () {

            var unit = $('#unit').val();

            var general_dep_name = $('#general_dep_name').val();



            var department = $(this).val();

            get_sub_office(unit, general_dep_name, department, '', '', '');

        });



        // work_office ===========

        $("#work_office").on("change", function () {

            var unit = $('#unit').val();

            var general_dep_name = $('#general_dep_name').val();

            var work_office = $(this).val();

            var department = $('#department').val();

            get_sub_office(unit, general_dep_name, department, work_office, '', '');

        });

        // work_office ===========

        $("#province_office").on("change", function () {

            var unit = $('#unit').val();

            var province_office = $(this).val();

            $("#land_official").val('');

            if (province_office === '') {

                var xtotal_display = $('#s_dis').val() - 0;

                grid(1, xtotal_display);

            } else {

                get_sub_office(unit, '', '', '', province_office, '');

            }

        });

        // land _official===========

        $("#land_official").on("change", function () {

            var unit = $('#unit').val();

            var land_official = $(this).val();

            $("#province_office").val('');

            get_sub_office(unit, '', '', '', '', land_official);

        });

        // work_location ===========

        $("#work_location").on("change", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });

        // data-toggle tooltip============

        $("body").delegate("", "mouseover", function () {

            $('[data-toggle="tooltip"]').tooltip();

        });

        // submit ==================

        $('#btn_print').on('click', function (e) {

            

            

        });

        // delete ==========

        $('body').delegate(".delete", "click", function (e) {

            var id = $(this).data('id') - 0;

            var tr = $(this).parent().parent();

            if (id > 0) {

                if (confirm('តើអ្នកពិតជាលុប?')) {

                    $.ajax({

                        url: '<?= site_url('csv/csv_info/delete') ?>',

                        type: 'POST',

                        dataType: 'html',

                        data: {id: id},

                        success: function (d) {

                            // alert(d);

                            tr.remove();

                        },

                        error: function () {



                        }



                    });

                }

            }

            return false;

        });

        // edit by row ===========

        $("body").delegate("#my_gr tbody tr", "click", function () {

            var id = $(this).data('id');

            if (id - 0 > 0) {

                window.location = "<?= site_url('csv/csv_info/edit') ?>/" + id;

            } else {

                alert("អត់មានទិន្នន័យ!");

                return false;

            }

        });



        // row hover ===========

        $("body").delegate("#my_gr tbody tr", "mouseover", function () {

            $(this).css('cursor', 'hand');

        });



    });

    // grid ==============================

    function grid(current_page, total_display) {



        var c_img = "<?= base_url() . 'assets/bs/css/images/mrd.gif'; ?>";

        // var =================

        //var limit = total_display - 0;

        //var offset = (current_page - 1) * total_display;

        //work==========

        var current_role = $('#current_role').val();

        var unit = $('#unit').val();

        var general_dep_name = $('#general_dep_name').val();

        var department = $('#department').val();

        var land_official = $('#land_official').val();

        var work_office = $('#work_office').val();

        var province_office = $('#province_office').val();

        if (unit === '1') {

            $('#province_office option').remove();

            $('#land_official option').remove();

            province_office ='';
            land_official='';
            f_dp();

            f_work_office();

            f_gd();

        } else {

            $('#general_dep_name option').remove();

            $('#department option').remove();

            $('#work_office option').remove();
            
             var general_dep_name = '';

             var department = '';
             
             var work_office = '';
        }

        $.ajax({

            url: '<?= site_url('csv/csv_search/view_by_group') ?>',

            type: 'POST',
            timeout: 50000,
            datatype: 'json',

           async: false,

            beforeSend: function () {

        $('.xmodal').show();

                //$('#x_img').html("<img width='26' src='" + c_img + "' /> <h4 style='display: inline;color: blue;'>កំពុងដំណើរការ...</h4>").show();

                $('table#tbl-view tbody').remove();

                $('table#tbl-view tfoot').remove();

            },

            data: {current_role: current_role, unit: unit, general_dep_name: general_dep_name, department: department, land_official: land_official, work_office: work_office, province_office: province_office},

            success: function (data) {

                $('#blog-container').html(data);

                $('#x_img').hide();

                     $('#tbl-view tr').hover(function(){

                     $(this).find('.actionrow').show();

                  },function(){

                       $(this).find('.actionrow').hide();

                  });

            },

            error: function () {



            }

        });// ajax =================



    }

    // current role============

    function current() {

        $.ajax({

            url: '<?= site_url('csv/csv_search_advance/opt_current_role') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option></option>';

                    $.each(data, function (i, item) {

                        if (item.current_role == '') {

                            opt += '<option value="" selected disabled >ជ្រើសរើសតួនាទី</option>'

                        } else {

//                        opt += '<option>' + item.current_role + '</option>';

                            opt += '<option value="' + item.current_role + '">' + item.current_role + '</option>';

                        }

                    });

                }

                $('#current_role').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }



    function get_sub_office(unit, g_departement = '', department = '', office = '', unit_province = '', office_province = '') {

        var c_img = "<?= base_url() . 'assets/bs/css/images/mrd.gif'; ?>";

        $.ajax({

            
             url: '<?= site_url('csv/csv_search/view_by_group') ?>',
            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                //$('#x_img').html("<img width='26' src='" + c_img + "' /> <h4 style='display: inline;color: blue;'>កំពុងដំណើរការ...</h4>").show();

                $('table#tbl-view tbody').remove();

                $('table#tbl-view tfoot').remove();

            },

            data: {unit: unit, general_dep_name: g_departement, department: department, work_office: office, province_office: unit_province, land_official: office_province},



            success: function (data) {

                $('#blog-container').html(data);

                $('#x_img').hide();

                $('#tbl-view tr').hover(function(){

                     $(this).find('.actionrow').show();

                  },function(){

                       $(this).find('.actionrow').hide();

                  });

            },

            error: function () {



            }



        });

    }



    // get type of framework

    function reason() {

        $.ajax({

            url: '<?= site_url('csv/csv_search_advance/get_reason') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option value="" selected disabled >ជ្រើសរើសអង្គភាព</option>';



                    $.each(data, function (i, item) {

                        if (item.current_role == '') {

                            opt += '<option value="" selected disabled >ជ្រើសរើសតួនាទី</option>'

                        } else {

                            //                        opt += '<option>' + item.current_role + '</option>';

                            opt += '<option value="' + item.wknd_id + '">' + item.reason_deleting + '</option>';

                        }

                    });

                }

                $('#reason').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }



    // unit============

    function f_unit() {

        $.ajax({

            url: '<?= site_url('csv/csv_search_advance/opt_unit') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option value="" selected disabled >ជ្រើសរើសអង្គភាព</option>';

                    $.each(data, function (i, item) {

//                         if(item.unit == ''){

//                            opt += '<option value="" selected disabled >ជ្រើសរើសអង្គភាព</option>';

//                        }else{

                        opt += '<option value=' + item.unit + ' >' + item.unit_name + '</option>';

//                    }

                    });

                }

                $('#unit').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }

    /*delegate general department===============*/

    $('body').delegate("#general_dep_name", "change", function () {

        f_dp();

    });

    /*delegate department===============*/

    $('body').delegate("#department", "change", function () {

        f_work_office();

    });

    $('body').delegate("#unit", "change", function () {

        f_pro_office();

        f_land_official();

    });

    // Genneral Dpartemnet============

    function f_gd() {

        $.ajax({

            url: '<?= site_url('csv/csv_search/opt_gd') ?>',

            type: 'post',

            datatype: 'json',

            async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option></option>';

                    $.each(data, function (i, item) {

                        if (item.general_dep_id == '') {

                            opt += '<option value="" selected disabled >ជ្រើសរើសអគ្គនាយកដ្ឋាន</option>';

                        } else {

                            opt += '<option value=' + item.general_dep_id + ' >' + item.general_deps_name + '</option>';

                        }

                    });

                }

                $('#general_dep_name').html(opt);

                f_dp();

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }

    //work_office======================

    // department============

    function f_dp() {

        var general_dep_name = $('#general_dep_name').val();

        // alert(general_dep_name);

        $.ajax({

            url: '<?= site_url('csv/csv_search/opt_dp') ?>',

            type: 'post',

            datatype: 'json',

            async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {general_dep_name: general_dep_name},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option></option>';

                    $.each(data, function (i, item) {

                        if (item.dp_id == '') {

                            opt += '<option value="" selected disabled >ជ្រើសរើសអង្គភាព</option>';

                        } else {

                            opt += '<option value=' + item.d_id + ' >' + item.d_name + '</option>';

                        }

                    });

                }

                $('#department').html(opt);

                f_work_office();

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }

    // work offices

    function f_work_office() {

        var department = $('#department').val();

        // alert(department);

        $.ajax({

            url: '<?= site_url('csv/csv_search/opt_work_office') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {department: department},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option></option>';

                    $.each(data, function (i, item) {

                        if (item.work_office == '') {

                            opt += '<option value="" selected disabled >ជ្រើសរើសការិយាល័យ</option>'

                        } else {

                            opt += '<option value=' + item.id + '>' + item.office + '</option>';

                        }

                    });

                }

                $('#work_office').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }

    // work province offices

    function f_pro_office() {

        var unit = $('#unit').val();

        // alert(department);

        $.ajax({

            url: '<?= site_url('csv/csv_info/opt_pro_offices') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {unit: unit},

            success: function (data) {

                var value = $('#province_office').attr('value');

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option></option>';

                    $.each(data, function (i, item) {

                        if (item.id == '') {

                            opt += '<option value="" selected disabled >ជ្រើសរើសការិយាល័យខេត្ត</option>'

                        } else {

                            opt += '<option value=' + item.id + '>' + item.office + '</option>';

                        }

                    });

                }

                $('#province_office').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }

    // land official============

    function f_land_official() {

        var unit = $('#unit').val();

        $.ajax({

            url: '<?= site_url('csv/csv_search/opt_land_official') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {unit: unit},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option value="" selected disabled ></option>';

                    $.each(data, function (i, item) {

                        if (item.unit == '') {

                            opt += '<option value="" selected disabled >ជ្រើសរើសអង្គភាព</option>';

                        } else {

                            opt += '<option value=' + item.id + ' >' + item.land_official + '</option>';

                        }

                    });

                }

                $('#land_official').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }

    //work_location======================

    function f_work_location() {

        $.ajax({

            url: '<?= site_url('csv/csv_search_advance/opt_work_location') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option></option>';

                    $.each(data, function (i, item) {

                        if (item.work_location == '') {

                            opt += '<option value="" selected >ជ្រើសរើសទីតាំងបម្រើការងារ</option>'

                        } else {

                            opt += '<option>' + item.work_location + '</option>';

                        }

                    });

                }

                $('#work_location').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }



    //pure salary======================

    function f_pure_salary() {

        $.ajax({

            url: '<?= site_url('csv/csv_search_advance/opt_pure_salary') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option value="" selected disabled>ជ្រើសរើស</option>';

                    $.each(data, function (i, item) {

                        opt += '<option>' + item.pure_salary + '</option>';

                    });

                }

                $('#pure_salary').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }

    // language==============================

    function f_language() {

        $.ajax({

            url: '<?= site_url('csv/csv_search_advance/opt_language') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option value="" selected disabled>ជ្រើសរើស</option>';

                    $.each(data, function (i, item) {

                        opt += '<option>' + item.language + '</option>';

                    });

                }

                $('#language').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }

    //degree_level===============

    function f_degree_level() {

        $.ajax({

            url: '<?= site_url('csv/csv_search_advance/opt_degree_level') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option value="" selected disabled>ជ្រើសរើស</option>';

                    $.each(data, function (i, item) {

                        opt += '<option>' + item.degree_level + '</option>';

                    });

                }

                $('#degree_level').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }

    //skill==================

    function f_skill() {

        $.ajax({

            url: '<?= site_url('csv/csv_search_advance/opt_skill') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option value="" selected disabled>ជ្រើសរើស</option>';

                    $.each(data, function (i, item) {

                        opt += '<option>' + item.skill + '</option>';

                    });

                }

                $('#skill').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }

    //country=============

    function f_country() {

        $.ajax({

            url: '<?= site_url('csv/csv_search_advance/opt_country') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option value="" selected disabled>ជ្រើសរើស</option>';

                    $.each(data, function (i, item) {

                        opt += '<option>' + item.country + '</option>';

                    });

                }

                $('#country').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }

    //study_place==================

    function f_study_place() {

        $.ajax({

            url: '<?= site_url('csv/csv_search_advance/opt_study_place') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

                $('.xmodal').show();

            },

            data: {},

            success: function (data) {

                if (data.length > 0) {

                    var opt = '';

                    opt += '<option value="" selected disabled>ជ្រើសរើស</option>';

                    $.each(data, function (i, item) {

                        opt += '<option>' + item.study_place + '</option>';

                    });

                }

                $('#study_place').html(opt);

                $('.xmodal').hide();

            },

            error: function () {



            }

        });

    }





</script>

