<form class="form-horizontal" role="form" action="<?= site_url('csv/csv_search/print_adv') ?>"  method="post">

    <div class="panel panel-default">

        <div class="panel-heading">

            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​--> <?= t('ស្វែងរកតាមមុខតំណែង') ?></h3>

        </div>



        <div class="panel-body">

            <div class="table-responsive">

                <table  style="line-height: 3; font-size: 15.5px; border:2px solid #CCC; margin: auto; margin-bottom: 0px " cellpadding="0" cellspacing="0" >

                    <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%); background-repeat: repeat-x; font-size: 16px;font-family: khmer mef2; border:1px solid #CCC; text-align: center;​">

                        <td class="col-md-2" style="border:1px solid #CCC;" >មុខតំណែង</td>

                        <td class="col-md-2" style="border:1px solid #CCC;" >អង្គភាព</td>

                        <td class="col-md-2" style="border:1px solid #CCC;" >អគ្គនាយកដ្ឋាន</td>

                    </tr>

                    <tr>

                        <td  class="col-md-2">

                            <select style="text-align: center;" id="current_role" class="form-control current_role" name="current_role" style="width: 180px;"></select>

                        </td>

                         <!--<td><label for="unit">&nbsp អង្គភាព</label></td>-->

                        <td  class="col-md-2">

                            <select style="text-align: center;" id="unit" class="form-control unit" name="unit" style="width: 180px;"></select>

                        </td>

                         <!--<td><label for="firstname">&nbsp អគ្គ</label></td>-->

                        <td  class="col-md-2">

                            <select style="text-align: center;" id="general_dep_name" class="form-control general_dep_name" name="general_dep_name" style=""></select>

                        </td>

                    </tr>

                </table>



                <table  style="line-height: 3; font-size: 15.5px; border:2px solid #CCC; margin: auto; margin-bottom: 10px " cellpadding="0" cellspacing="0" >



                    <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%); background-repeat: repeat-x; font-size: 16px;font-family: khmer mef2; border:1px solid #CCC; text-align: center;​">





                        <td class="col-md-2" style="border:1px solid #CCC;" >នាយកដ្ឋាន</td>

                        <td class="col-md-2" style="border:1px solid #CCC;" >ការិយាល័យ</td>

                        <td class="col-md-2" style="border:1px solid #CCC;" >ការិយាល័យរាជធានី / ខេត្ត</td>

                        <td class="col-md-2" style="border:1px solid #CCC;" >ការិយាល័យភូមិបាល</td>

                    </tr>

                    <!--row1==============-->

                    <tr>

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





            <div style="margin-bottom: 5px;">

                <select id="s_dis">

                    <option>15</option>

                    <option>50</option>

                    <option>100</option>

                    <option>500</option>

                    <option>1000</option>

                </select>

                <label for="s_dis"><?= t('នាក់') ?></label>

            </div>



            <!-- table data -->

            <div class="table-responsive">

                <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-hover" style=" font-family: khmermef1; text-align: center; vertical-align: middle;" id="my_gr">

                    <thead>

                        <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">

                            <th style="text-align: center;"><?= t('ល.រ') ?></th>

                             <!-- <th style="text-align: center;"><?= t('id') ?></th> -->

                            <th style="text-align: center;"><?= t('គោត្តនាម') ?></th>

                            <th style="text-align: center;"><?= t('នាម') ?></th>

                            <th style="text-align: center;"><?= t('ភេទ') ?></th>

                            <th style="text-align: center;"><?= t('តួនាទី') ?></th>

                            <th style="text-align: center;"><?= t('លេខទូរស័ព្ទ') ?></th>



                        <!-- <th style="text-align: center;"><?= t('អង្គភាព') ?></th> 

                        

                        <th style="text-align: center;"><?= t('ការិយាល័យ') ?></th>-->



                            <th style="text-align: center;"><?= t('ការិយាល័យ') ?></th>

                            <th style="text-align: center;"><?= t('អង្គភាព') ?></th>

                            <th style="text-align: center;" colspan="2"><?= t('សកម្មភាព') ?></th>

                            <!-- <th style="text-align: center;"><a href="<?= site_url('csv/csv_info/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូល​ថ្មី') ?></a></th> -->

                        </tr>

                    </thead>

                    <tbody>

                    </tbody>

                    <tfoot>

                    </tfoot>

                </table>

            </div>



            <!-- footer -->

            <table cellpadding="0" cellspacing="0" style="width: 100%;vertical-align: middle;">

                <tr>

                    <td style="text-align: left;"><span id="disp"></span></td>

                    <td style="text-align: right;"><span><ul class="pagination" id="pagination-grid" style="margin-top: 5px;"></ul></span></td>

                </tr>

            </table>



        </div>

    </div>

</form>



<script>

    $(function () {

        //current_role

      current();

        // unit==========

        f_unit();

        f_gd();

        //departent

        f_dp();

        // land_official

        f_land_official();

        // work office=======

        f_work_office();

        // province_office

        f_pro_office();



        // refresh page ==========

        $('#refresh').on('click', function () {

         $('#my_gr tbody').hide();

            $('#disp').hide();

           $('#pagination-grid').hide();    

            current();

            f_unit();

            f_gd();

            f_dp();

            f_work_office();

            f_pro_office();

            f_land_official();

            f_work_location();

           

            // refresh =====

           // var xtotal_display = $('#s_dis').val() - 0;

           // grid(1, xtotal_display);

        });

        // init. =========================

       // var xtotal_display = $('#s_dis').val() - 0;

        //grid(1, xtotal_display);

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



            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });

        // departement ===========

        $("#department").on("change", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });



        // work_office ===========

        $("#work_office").on("change", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });

        // work_office ===========

        $("#province_office").on("change", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

        });

        // land _official===========

        $("#land_official").on("change", function () {

            var xtotal_display = $('#s_dis').val() - 0;

            grid(1, xtotal_display);

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

        var limit = total_display - 0;

        var offset = (current_page - 1) * total_display;

        //work==========

        var current_role = $('#current_role').val();

        var unit = $('#unit').val();

        var general_dep_name = $('#general_dep_name').val();

        var department = $('#department').val();

        var land_official = $('#land_official').val();

        var work_office = $('#work_office').val();

        var province_office = $('#province_office').val();

        $.ajax({

            url: '<?= site_url('csv/csv_search/search') ?>',

            type: 'post',

            datatype: 'json',

            // async: false,

            beforeSend: function () {

            //$('.xmodal').show();

                $('#x_img').html("<img width='26' src='" + c_img + "' /> <h4 style='display: inline;color: blue;'>កំពុងដំណើរការ...</h4>").show();

            },

            data: {offset: offset, limit: limit, current_role: current_role, unit: unit, general_dep_name: general_dep_name, department: department, land_official: land_official, work_office: work_office, province_office: province_office},

            success: function (data) {

                var total_page = data.total_page;

                var record = data.res;

                var total_record = data.total_record;

                var tr = "";

                var i = 0;

                var officestr = '';

                if (record.length > 0) {

                    $.each(record, function (i, row) {

                        i++;

                        if (row.office === '' || row.office === ']') {

                            if (row.province_office === '' || row.province_office === ']') {

                                if (row.landofficail === '') {

                                    officestr = row.office;

                                }else{

                                     officestr = row.landofficail;

                                 }

                            } else {

                                officestr = row.province_office;

                            }

                        } else {

                            officestr = row.office;

                        }

                        tr += "<tr data-id='" + row.id + "' data-href='<?= site_url('csv/csv_info/edit') ?>/" + row.id + "' class='editor' target='_parent'>" +

                                "<td>" + i + "</td>" +

                                // "<td>" + row.id + "</td>" +

                                "<td>" + row.lastname + "</td>" +

                                "<td>" + row.firstname + "</td>" +

                                "<td>" + row.gender + "</td>" +

                                "<td>" + row.current_role_in_khmer + "</td>" +

                                "<td>" + row.mobile_phone + "</td>" +

                                "<td style = 'text-align: left;'>" + officestr + "</td>" +

                                // "<td>" + row.province_office + "</td>" +

                                "<td>" + row.unit_name + "</td>" +

                                // "<td style='text-align: center;'><a href='javascript: void(0)' data-id=" + row.id +

                                // " class='delete'>លុប</a></td>" +

                                "<td><a href='<?= site_url('csv/csv_info/edit') ?>/" + row.id + "' class='editor' target='_parent'>លំអិត</a></td>" +

                                "</tr>";

                    });

                    

                    

                    $('#my_gr tbody').html(tr);

                    $('#disp').html('ពី ' + (offset + 1) + ' ទៅ ' + ((offset + total_display) - 0 > total_record ? total_record : (offset + total_display)) + ' នៃ ' + total_record);



                    var pagination = '<li><a class="a-pagination" href="javascript:void(0)" data-currentpage="1">&laquo;</a></li>';

                    for (var i = 1; i <= 4; i++) {

                        var p = 1;

                        if (current_page <= 5) {

                            p = i;

                        } else {

                            p = current_page - 5 + i;

                        }

                        if (p <= total_page) {

                            var active = current_page == p ? ' class= "active" ' : '';

                            pagination += '<li ' + active + '><a class="a-pagination" href="javascript:void(0)" data-currentpage="' + p + '">' + p + '</a></li>';

                        }

                    }



                    for (var i = 0; i <= 5; i++) {

                        var pr = 1;

                        if (current_page <= 5) {

                            pr = 5 + i;

                        } else {

                            pr = current_page + i;

                        }

                        if (pr <= total_page) {

                            var active = current_page == pr ? ' class= "active" ' : '';

                            pagination += '<li ' + active + '><a class="a-pagination" href="javascript:void(0)" data-currentpage="' + pr + '">' + pr + '</a></li>';

                        }

                    }

                    pagination += '<li><a class="a-pagination" href="javascript:void(0)" data-currentpage="' + total_page + '">&raquo;</a></li>';



                    $('#pagination-grid').html(pagination);



                } else {

                    tr += "<tr>" +

                            "<td colspan='10' style='text-align: center; color: RED'>អត់មានទិន្ន័យ!</td>" +

                            "</tr>";

                    $('#my_gr tbody').html(tr);

                    $('#pagination-grid').html("");

                    $('#disp').html("");

                }

//                $('.xmodal').hide();

                $('#x_img').hide()

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

                            opt += '<option value="' + item.id + '">' + item.current_role_in_khmer + '</option>';

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

