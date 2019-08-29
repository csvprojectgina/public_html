<style>
       input{ font-family: khmermef1;}
</style>




<form class="form-horizontal" role="form" action="<?= site_url('csv/csv_search_advance/print_adv') ?>"  method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​--> <?= t('ស្វែងរកកម្រិតខ្ពស់') ?></h3>
        </div>

        <div class="panel-body">
            <table  style="font-family: khmermef1;line-height: 3; font-size: 15.5px; border:2px solid #CCC; margin: auto; margin-bottom: 10px " cellpadding="0" cellspacing="0" >
                <tr  style="  background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%); background-repeat: repeat-x; font-size: 16px;font-family: khmer mef2; border:1px solid #CCC; text-align: center;​">
                    <td style="border:1px solid #CCC;" colspan="2">ព័ត៌មានទូទៅ</td>
                    <td style="border:1px solid #CCC;" colspan="2">ការងារ</td>
                    <td style="border:1px solid #CCC;" colspan="2">បៀវត្ស និង ភាសា</td>
                    <td style="border:1px solid #CCC;" colspan="2">កម្រិតវប្បធម៌</td>
                </tr>
                <!--row1==============-->
                <tr>
                    <td><label for="lastname">&nbsp គោត្តនាម</label></td>
                    <td><input style="width: 150px;" type="text" class="form-control lastname" id="lastname" name="lastname" placeholder="ស្វែងរកគោត្តនាម" data-toggle="tooltip" data-placement="top" title="ស្វែងរកគោត្តនាម"  /></td>
                    <td><label for="current_role">&nbsp តួនាទី</label></td>
                    <td>
                        <select id="current_role" name="current_role"  class="form-control"  style="width: 180px;" data-toggle="tooltip" data-placement="top" title="ជ្រើសរើសតួនាទី">
                        </select>
                    </td>
                    <td><label for="pure_salary">&nbsp បៀវត្សសុទ្ធសាធ</label></td>
                    <td>
                        <select id="pure_salary" class="form-control pure_salary" name="pure_salary" style="width: 150px;" data-toggle="tooltip" data-placement="top" title="ជ្រើសរើសបៀវត្សសុទ្ធសាធ">
                        </select>
                    </td>
                    <td><label for="degree_level">&nbsp សញ្ញាប័ត្រ</label></td>
                    <td>
                        <select id="degree_level" class="form-control degree_level" name="degree_level" style="width: 150px;">
                        </select>
                    </td>
                </tr>
                <!--row2==============-->
                <tr>
                    <td><label for="firstname">&nbsp នាម</label></td>
                    <td><input style="width: 150px;" type="text" class="form-control firstname" id="firstname" name="firstname" placeholder="ស្វែងរកនាម" data-toggle="tooltip" data-placement="top" title="ស្វែងរកនាម"  /></td>
                    <td><label for="unit">&nbsp អង្គភាព</label></td>
                    <td>
                        <select id="unit" class="form-control unit" name="unit" style="width: 180px;"></select>
                    </td>
                    <td><label for="date_in">&nbsp ថ្ងៃខែឆ្នាំចូលក្របខ័ណ្ឌ</label></td>
                    <td><input style="width: 150px;" type="text" class="form-control date_in" id="date_in" name="date_in"  placeholder="ស្វែងរកថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top" title="ស្វែងរកថ្ងៃ-ខែ-ឆ្នាំ" /></td>
                    <td><label for="skill">&nbsp ជំនាញ</label></td>
                    <td>
                        <select id="skill" class="form-control skill" name="skill" style="width: 150px;"></select>
                    </td>
                </tr>
                <!--row3==============-->
                <tr>
                    <td><label for="gender">&nbsp ភេទ</label></td>
                    <td>
                        <input id="gender" name="gender" class="form-control gender" style="width: 150px;" placeholder="ស្វែងរកភេទ" data-toggle="tooltip" data-placement="top" title="ស្វែងរកភេទ" >
                    </td>
                    <td><label for="work_office">&nbsp ការិយាល័យ</label></td>
                    <td>
                        <select id="work_office" class="form-control work_office" name="work_office" style="width: 180px;"></select>
                    </td>
                    <td><label for="date_out">&nbsp ថ្ងៃខែឆ្នាំចូលនិវត្តន៍</label></td>
                    <td><input style="width: 150px;" type="text" class="form-control date_out" id="date_out" name="date_out"  date placeholder="ស្វែងរកថ្ងៃ-ខែ-ឆ្នាំ" date data-toggle="tooltip" data-placement="top" title="ស្វែងរកថ្ងៃ-ខែ-ឆ្នាំ"  /></td>
                    <td><label for="country">&nbsp ប្រទេស</label></td>
                    <td>
                        <select id="country" class="form-control country" name="country" style="width: 150px;"></select>
                    </td>
                </tr>
                <!--row4==============-->
                <tr>
                    <td><label for="dateofbirth">&nbsp ថ្ងៃ​ខែឆ្នាំកំណើត</label></td>
                    <td><input style="width: 150px;" type="text" class="form-control dateofbirth" id="dateofbirth" name="dateofbirth" date placeholder="ស្វែងរកថ្ងៃ-ខែ-ឆ្នាំ" date data-toggle="tooltip" data-placement="top" title="ស្វែងរកថ្ងៃ-ខែ-ឆ្នាំ" /></td>
                    <td><label for="work_location">&nbsp ទីតាំងបម្រើការងារ</label></td>
                    <td>
                        <select id="work_location" class="form-control work_location" name="work_location" style="width: 180px;"  disabled>
                        </select>
                    </td>
                    <td><label for="language">&nbsp ភាសាបរទេស</label></td>
                    <td>
                        <select id="language" class="form-control language" name="language" style="width: 150px;">
                        </select>
                    </td>
                    <td><label for="study_place">&nbsp ទីកន្លែងសិក្សា</label></td>
                    <td>
                        <select id="study_place" class="form-control study_place" name="study_place" style="width: 150px;">
                        </select>
                    </td>
                </tr>

                <!-- <tr>
                    <td><label for="reason">&nbsp មិនបម្រើការងារ</label></td>
                    <td>
                        <select id="reason" class="form-control language" name="reason" style="width: 150px;">
                        </select>
                    </td>
                    <td><label for="work_location">&nbsp ឥស្សរយស​ </label></td>
                    <td>
                        <select id="medal" class="form-control medal" name="medal" style="width: 180px;">
                        </select>
                    </td>
                    <td><label for="study_place">&nbsp ទីកន្លែងសិក្សា</label></td>
                    <td>
                        <select id="study_place" class="form-control study_place" name="study_place" style="width: 150px;">
                        </select>
                    </td>

                    <td></td>
                    <td></td>
                </tr> -->

                <tr style="border:1px solid #CCC; text-align: right;" ><td colspan="8" style="height: 40px;">
                        <div id="x_img" style="display: inline; margin: 10px 600px 5px 10px"></div>
                        <button data-toggle="tooltip" data-placement="right" title="" type="button" id="refresh" class="btn btn-default"  data-original-title="ស្វែងរកសារថ្មី">ស្វែងរកសារថ្មី</button>
                        <button data-toggle="tooltip" data-placement="right" title="" type="submit" id="btn_print" class="btn btn-default" data-original-title="រៀបចំបញ្ជីមន្ត្រីរាជការជា​ PDF">រៀបចំបញ្ជីមន្ត្រីរាជការជា​PDF</button>
                    </td></tr>
            </table>
            <!-- prt -->
            <!--            <div id="list_civil_prt" class="list_civil_prt" style="display: none;">
                            <table cellpadding="0" cellspacing="0" id="tbl_data" class="tbl_data" align="center" border="1" style="width: 100%;border: 2px solid blue;vertical-align: middle;text-align: center;border-collapse: collapse;font-family: Khmer MEF1;font-size: 14px;">
                                <thead style="font-family: khmer mef1;font-weight: bold;">
                                    <tr>
                                        <td>ល.រ</td>
                                        <td>អត្តលេខមន្ត្រី</td>
                                        <td>គោត្តនាម</td>
                                        <td>នាម</td>
                                        <td>ភេទ</td>
                                        <td>ថ្ងៃ​ខែឆ្នាំ កំណើត</td>
                                        <td>ទូរស័ព្ទ</td>
                                        <td>តួនាទី</td>
                                        <td>អង្គភាព</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot style="border-top: 2px solid blue;">
                                    <tr>
                                        <td colspan="4" style="font-family: khmer mef2;font-size: 14px;">សរុបរួម</td>
                                        <td id="to_l" style="font-weight: bold;text-align: right;"></td>
                                        <td colspan="12"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>-->

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
            <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-hover" style="font-family: khmermef1;text-align: center; vertical-align: middle;" id="my_gr">
                <thead>
                    <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
                        <th style="text-align: center;"><?= t('ល.រ') ?></th>
                        <th style="text-align: center;"><?= t('គោត្តនាម') ?></th>
                        <th style="text-align: center;"><?= t('នាម') ?></th>
                        <th style="text-align: center;"><?= t('ភេទ') ?></th>
                        <th style="text-align: center;"><?= t('លេខទូរស័ព្ទ') ?></th>
                        <th style="text-align: center;"><?= t('តួនាទី') ?></th>
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
        // current========
        current();
        // unit==========
        f_unit();
        // work office=======
        f_work_office();
        // work location=======
        f_work_location();
        // pure salary=========
        f_pure_salary();
        // language=========
        f_language();
        // degree_level=======
        f_degree_level();
        //f_skill===========
        f_skill();
        //f_country========
        f_country();
        //f_type_of_frameword========
        reason();
        //f_medal========
        medal();
        //f_study_place
        f_study_place();
        // refresh page ==========
        $('#refresh').on('click', function () {
            // $('#current_role').val('');
            $('#lastname').val('');
            $('#firstname').val('');
            $('#gender').val('');
            $('#dateofbirth').val('');
            $('#date_in').val('');
            $('#date_out').val('');
            current();
            f_unit();
            f_work_office();
            f_work_location();
            f_pure_salary();
            f_language();
            f_degree_level();
            f_skill();
            f_country();
            reason();
            f_study_place();
            // refresh =====

            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });
        // init. =========================
        var xtotal_display = $('#s_dis').val() - 0;
        grid(1, xtotal_display);
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
        // work_office ===========
        $("#work_office").on("change", function () {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });
        // work_location ===========
        $("#work_location").on("change", function () {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });
        // pure_salary===========
        $("#pure_salary").on("change", function () {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });
        // language===========
        $("#language").on("change", function () {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // reason======================
        $("#reason").on("change", function () {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // medal======================
        $("#medal").on("change", function () {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });
        // degree_level===========
        $("#degree_level").on("change", function () {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });
        // skill===========
        $("#skill").on("change", function () {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });
        //country===========
        $("#country").on("change", function () {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });
        //study_place===========
        $("#study_place").on("change", function () {
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
        var lastname = $('#lastname').val();
        var firstname = $('#firstname').val();
        var gender = $('#gender').val();
        var dateofbirth = $('#dateofbirth').val();
        var date_in = $('#date_in').val();
        var date_out = $('#date_out').val();
        var current_role = $('#current_role').val();
        var unit = $('#unit').val();
        var work_office = $('#work_office').val();
        var work_location = $('#work_location').val();
        var pure_salary = $('#pure_salary').val();
        var language = $('#language').val();
        var reason = $('#reason').val();
        var medal = $('#medal').val();
        var degree_level = $('#degree_level').val();
        var skill = $('#skill').val();
        var country = $('#country').val();
        var study_place = $('#study_place').val();
        $.ajax({
            url: '<?= site_url('csv/csv_search_advance/search') ?>',
            type: 'post',
            datatype: 'json',
            // async: false,
            beforeSend: function () {
//                $('.xmodal').show();
                $('#x_img').html("<img width='26' src='" + c_img + "' /> <h4 style='display: inline;color: blue;'>កំពុងដំណើរការ...</h4>").show();
            },
            data: {offset: offset, limit: limit, current_role: current_role, unit: unit, work_office: work_office, work_location: work_location,
                lastname: lastname, firstname: firstname, gender: gender, dateofbirth: dateofbirth, pure_salary: pure_salary, date_in: date_in, date_out: date_out, language: language,
                degree_level: degree_level, skill: skill, country: country, study_place: study_place, reason: reason},
            success: function (data) {
                var total_page = data.total_page;
                var record = data.res;
                var total_record = data.total_record;
                var tr = "";
                var i = 0;
                if (record.length > 0) {
                    $.each(record, function (i, row) {
                        i++;
                        tr += "<tr data-id='" + row.id + "'data-href='<?= site_url('csv/csv_info/edit') ?>/" + row.id + "'class='editor' target='_parent'>" +
                                "<td>" + i + "</td>" +
                                "<td>" + row.lastname + "</td>" +
                                "<td>" + row.firstname + "</td>" +
                                "<td>" + row.gender + "</td>" +
                                "<td>" + row.mobile_phone + "</td>" +
                                "<td>" + row.current_role_in_khmer + "</td>" +
                                "<td>" + row.office + "</td>" +
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
                    opt += '<option value="" selected disabled >ជ្រើសរើសតួនាទី</option>'
                    $.each(data, function (i, item) {
                        if (item.id == '') {
                            opt += '<option value="" selected disabled >ជ្រើសរើសតួនាទី</option>'
                        } else {
//                        opt += '<option>' + item.current_role + '</option>';
                            opt += '<option value="' + item.id + '">' + item.current_role_in_khmer+ '</option>';
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



    // get medal
    function medal() {
        $.ajax({
            url: '<?= site_url('csv/csv_search_advance/get_medal') ?>',
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
                    opt += '<option value="" selected disabled >ជ្រើសរើសមេដាយ</option>';

                    $.each(data, function (i, item) {
                        if (item.current_role == '') {
                            opt += '<option value="" selected disabled >ជ្រើសរើសមេដាយ</option>'
                        } else {
                            //opt += '<option>' + item.current_role + '</option>';
                            opt += '<option value="' + item.id + '">' + item.medal_type + '</option>';
                        }
                    });
                }
                $('#medal').html(opt);
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
    //work_office======================
    function f_work_office() {
        $.ajax({
            url: '<?= site_url('csv/csv_search_advance/opt_work_office') ?>',
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
                        if (item.work_office == '') {
                            opt += '<option value="" selected disabled >ជ្រើសរើសការិយាល័យ</option>'
                        } else {
                            opt += '<option value=' + item.work_office + '>' + item.office + '</option>';
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
