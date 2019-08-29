<form class="form-horizontal" role="form" action="" method="post"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ <?= t('ស្វែងរកកម្រិតខ្ពស់') ?></h3>
        </div>
        <div class="panel-body">

            <!------------------------------>
            <table cellpadding="0" cellspacing="0" style="margin: -10px 0 0 0;">
                <tr>
                    <!---------------------------->
                    <td style="border: 1px solid #CCC;padding: 4px 4px 4px 4px;">
                        <table>
                            <tr>
                                <td colspan="2"><label for="province">រាជធានី-ខេត្ត</label></td>
                                <td>
                                    <select id="province" class="province" style="width: 100px;">
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="district">ក្រុង-ស្រុក-ខណ្ឌ</label></td>
                                <td>
                                    <select id="district" class="district" style="width: 100px;"></select>                               
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="commune">ឃុំ-សង្កាត់</label></td>
                                <td>
                                    <select id="commune" class="commune" style="width: 100px;">
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="village">ភូមិ</label></td>
                                <td>
                                    <select id="village" class="village" style="width: 100px;">
                                    </select>
                                </td>
                            </tr>

                        </table>
                    </td>
                    <!---------------------------->
                    <td style="border: 1px solid #CCC;padding: 4px 4px 4px 4px;">
                        <table>
                            <tr>
                                <td colspan="2"><label for="type">ប្រភេទ</label></td>
                                <td>
                                    <select id="type" class="type" style="width: 100px;">
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="length">ប្រវែង</label></td>
                                <td>
                                    <select id="com_length" class="com_length">
                                    </select>
                                </td>
                                <td>
                                    <input type="text" id="length" style="width: 100px;" />
                                </td>
                            </tr>
                            <tr>
                                <td><label for="width">ទទឹង</label></td>
                                <td>
                                    <select id="com_width" class="com_width">
                                    </select>
                                </td>
                                <td>
                                    <input type="text" id="width" style="width: 100px;" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="pave">កម្រាល</label></td>
                                <td>
                                    <select id="pave" class="pave" style="width: 100px;">
                                    </select>
                                </td> 
                            </tr>
                        </table>
                    </td>
                    <!---------------------------->
                    <td style="border: 1px solid #CCC;padding: 4px 4px 4px 4px;">
                        <table>
                            <tr>
                                <td colspan="2"><label for="art">សំណង់សិល្បការ</label></td>
                                <td>
                                    <select id="art" class="art" style="width: 100px;">
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="pub">សំណង់សាធារណៈ</label></td>
                                <td>
                                    <select id="pub" class="pub" style="width: 100px;">
                                    </select>
                                </td>
                            </tr>                           
                            <tr style="display: none;">
                                <td colspan="4" style="text-align: center;">
                                    <input type="button" id="btn_prt" class="btn_prt" value="<?= t('បោះពុម្ព') ?>" />
                                    <!--<a href="#"><?= t('បោះពុម្ព') ?></a>-->
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-------------------------->
                    <td style="border: 1px solid #CCC;padding: 4px 4px 4px 4px;">
                        <table>
                            <tr>
                                <td colspan="2"><label for="activity">សកម្មភាព</label></td>
                                <td>
                                    <select id="activity" class="activity" style="width: 100px;">
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="year_construct">ឆ្នាំ</label></td>
                                <td>
                                    <select id="year_construct" class="year_construct" style="width: 100px;">                                                                
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="apply_by">អនុវត្តដោយ</label></td>
                                <td>
                                    <select id="apply_by" class="apply_by" style="width: 100px;">
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="source_budget">ប្រភពថវិកា</label></td>
                                <td>
                                    <select id="source_budget" class="source_budget" style="width: 100px;">
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="border: 1px solid #CCC;padding: 4px 4px 4px 4px;">
                        <button data-toggle="tooltip" data-placement="top" title="ដំណើរការឡើងវិញ" type="button" id="refresh" class="btn btn-default glyphicon glyphicon-refresh"> </button>
                        <button data-toggle="tooltip" data-placement="top" title="បោះពុម្ព" type="button" id="btn_print" class="btn btn-default glyphicon glyphicon-print"> </button>
                    </td>
                </tr>
            </table><br />  

            <!-- prt --------------------->
            <div id="dv_prt" class="dv_prt" style="display: none;"> 
                <table cellpadding="0" cellspacing="0" id="tbl_data" class="tbl_data" align="center" border="1" style="width: 100%;border: 2px solid blue;vertical-align: middle;text-align: center;border-collapse: collapse;font-family: Khmer MEF1;font-size: 14px;">
                    <thead style="font-family: khmer mef1;font-weight: bold;">
                        <tr>
                            <td rowspan="3">ល.រ</td>
                            <td rowspan="3">លេខកូដ</td>
                            <td rowspan="3">ឃុំ/សង្កាត់</td>
                            <td rowspan="3">ឈ្មោះផ្លូវ</td>
                            <td rowspan="3">ប្រវែង (ម)</td>
                            <td rowspan="3">ទទឹង (ម)</td>
                            <td colspan="4">និយាមកា</td>
                            <!---------------->
                            <td rowspan="3">ប្រភេទសំណង់</td>
                            <td rowspan="3">ឈ្មោះសំណង់</td>

                            <td rowspan="3">ប្រភេទកម្រាល</td>
                            <td rowspan="3">ប្រភេទផ្លូវ</td>
                            <td rowspan="3">ប្រភពថវិកា</td>
                            <td rowspan="3">អនុវត្តន៍ដោយ</td>
                            <td rowspan="3">ឆ្នាំ​ជួសជុល</td>
                        </tr>
                        <tr>
                            <td colspan="2">ចំនុចដើមផ្លូវ</td>
                            <td colspan="2">ចំនុចចុងផ្លូវ</td>
                        </tr>
                        <tr>
                            <td>x</td>
                            <td>y</td>
                            <td>x</td>
                            <td>y</td>
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
            </div>

            <div style="margin-bottom: 5px;">
                <select id="s_dis">
                    <option>15</option>
                    <option>50</option>
                    <option>100</option>
                    <option>500</option>
                    <option>1000</option>
                </select>
                <label for="s_dis"><?= t('កំណត់ត្រាក្នុងមួយទំព័រ') ?></label>
            </div>

            <!-- table data ----------------------->
            <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-hover" style="text-align: center;vertical-align: middle;" id="my_gr">
                <thead>
                    <tr>
                        <th style="width: 7%;"><?= t('GIS ID') ?></th>
                        <th><?= t('លេខ​ផ្លូវ') ?></th>
                        <th><?= t('ឈ្មោះ​ផ្លូវ') ?></th>
                        <th style="width: 5%;"><?= t('ប្រភេទ​') ?></th>
                        <th style="width: 10%;"><?= t('ប្រវែង') ?></th>
                        <th style="width: 5%;"><?= t('ទទឹង') ?></th>
                        <th style="width: 10%;"><a href="<?= site_url('rri/roads/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូល​ថ្មី') ?></a></th>            
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

<style>
    th{text-align: center;vertical-align: middle;}
    .table-hover tbody tr:hover td {background: #EDEFF5;}
</style>

<script type="text/javascript">
    $(function() {

        // =====================
        $("body").delegate("", "mouseover", function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        // print ==============
        $('#btn_print').on('click', function() {
//            var type_building = $('#type_building').val();

//            if (type_building != '') {
            print_dt();
//            } else {
//                alert('សូមជ្រើសរើសប្រភេទផ្លូវដើម្បីបោះពុម្ព!');
//                return false;
//            }
            var params = [
                'height=' + screen.height,
                'width=' + screen.width,
                'fullscreen=yes',
                'modal=yes'
            ];
            var divToPrint = document.getElementById('dv_prt');
            var popupWin = window.open('', '_blank', params); // var popupWin = window.open('', '_blank', 'width=800,height=600'); // width=800,height=500
            popupWin.moveTo(0, 0);
            popupWin.document.open();
            popupWin.document.write('<html><head><title></title></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.print();
            popupWin.close();
        });

        // refresh page =============
        $('#refresh').on('click', function() {
            location.reload(true);
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // gen. ===================================
        // opt. type ==================
        $.ajax({
            url: '<?= site_url('rri/search_advanced/opt_type') ?>',
            type: 'post',
            datatype: 'json',
            async: true,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {},
            success: function(data) {
                $('.xmodal').hide();
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function(i, item) {
                        opt += '<option>' + item.type + '</option>';
                    });
                }
                $('#type').html(opt);
            },
            error: function() {

            }
        });

        // geo. =======================
        // province =============
        $.ajax({
            url: '<?= site_url('rri/search_advanced/opt_pro') ?>',
            type: 'post',
            datatype: 'json',
            // async: false,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {},
            success: function(data) {
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function(i, item) {
                        opt += '<option data-pro_code="' + item.id + '">' + item.khmer_name + '</option>';
                    });
                }
                $('#province').html(opt);
                $('.xmodal').hide();
            },
            error: function() {

            }
        });

        // constr. ==========================
        // opt. art ==============
        $.ajax({
            url: '<?= site_url('rri/search_advanced/opt_art') ?>',
            type: 'post',
            datatype: 'json',
            async: true,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {},
            success: function(data) {
                $('.xmodal').hide();
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function(i, item) {
                        opt += '<option>' + item.type_building_art + '</option>';
                    });
                }
                $('#art').html(opt);
            },
            error: function() {

            }
        });

        // opt. pub ===============
        $.ajax({
            url: '<?= site_url('rri/search_advanced/opt_pub') ?>',
            type: 'post',
            datatype: 'json',
            async: true,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {},
            success: function(data) {
                $('.xmodal').hide();
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function(i, item) {
                        opt += '<option>' + item.type_building + '</option>';
                    });
                }
                $('#pub').html(opt);
            },
            error: function() {

            }
        });

        // hi. ===============================
        // opt. activity ===============
        $.ajax({
            url: '<?= site_url('rri/search_advanced/opt_act') ?>',
            type: 'post',
            datatype: 'json',
            async: true,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {},
            success: function(data) {
                $('.xmodal').hide();
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function(i, item) {
                        opt += '<option>' + item.activity + '</option>';
                    });
                }
                $('#activity').html(opt);
            },
            error: function() {

            }
        });

        // opt. yr. ==================
        $.ajax({
            url: '<?= site_url('rri/search_advanced/opt_yr') ?>',
            type: 'post',
            datatype: 'json',
            async: true,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {},
            success: function(data) {
                $('.xmodal').hide();
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function(i, item) {
                        opt += '<option>' + item.year_construct + '</option>';
                    });
                }
                $('#year_construct').html(opt);
            },
            error: function() {

            }
        });

        // opt. app. ==================
        $.ajax({
            url: '<?= site_url('rri/search_advanced/opt_app') ?>',
            type: 'post',
            datatype: 'json',
            async: true,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {},
            success: function(data) {
                $('.xmodal').hide();
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function(i, item) {
                        opt += '<option>' + item.apply_by + '</option>';
                    });
                }
                $('#apply_by').html(opt);
            },
            error: function() {

            }
        });

        // opt. sb. ==================
        $.ajax({
            url: '<?= site_url('rri/search_advanced/opt_sb') ?>',
            type: 'post',
            datatype: 'json',
            async: true,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {},
            success: function(data) {
                $('.xmodal').hide();
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function(i, item) {
                        opt += '<option>' + item.source_budget + '</option>';
                    });
                }
                $('#source_budget').html(opt);
            },
            error: function() {

            }
        });

        // opt. pave ====================  
        $.ajax({
            url: '<?= site_url('rri/search_advanced/opt_pave') ?>',
            type: 'post',
            datatype: 'json',
            async: true,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {},
            success: function(data) {
                $('.xmodal').hide();
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function(i, item) {
                        opt += '<option>' + item.type_pavement + '</option>';
                    });
                }
                $('#pave').html(opt);
            },
            error: function() {

            }
        });

        // opt. compare ====================  
        $.ajax({
            url: '<?= site_url('rri/search_advanced/opt_compare') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {},
            success: function(data) {
                if (data.length > 0) {
                    var opt = '';
                    $.each(data, function(i, item) {
                        if (item.compare == '=') {
                            opt += '<option selected="selected">' + item.compare + '</option>';
                        } else {
                            opt += '<option>' + item.compare + '</option>';
                        }
                    });
                }
                $('#com_length').html(opt);
                $('#com_width').html(opt);
            },
            error: function() {

            }
        });

        // init. =========================
        var xtotal_display = $('#s_dis').val() - 0;
        grid(1, xtotal_display);

        // display =========================
        $('body').delegate("#s_dis", "change", function(e) {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // page =============================
        $('body').delegate('.a-pagination', 'click', function() {
            var xtotal_display = $('#s_dis').val() - 0;
            var currentpage = $(this).data('currentpage');
            grid(currentpage, xtotal_display);
        });

        // search ==========================
        $("#type").on("change", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        $("#length").on("keyup", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        $("#width").on("keyup", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        $("#com_length").on("change", function() {
            if ($("#length").val() - 0 > 0) {
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            }
        });

        $("#com_width").on("change", function() {
            if ($("#width").val() - 0 > 0) {
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            }
        });

        // geo. =============================
        // village =============
        $('body').delegate("#village", "change", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // get vil. =============
        $('body').delegate("#commune", "change", function() {
            var province = $('#province').find(':selected').data('pro_code');
            var district = $('#district').find(':selected').data('dis_code');
            var commune = $(this).find(':selected').data('com_code');

            $.ajax({
                url: '<?= site_url('rri/search_advanced/opt_village') ?>',
                type: 'post',
                datatype: 'json',
                // async: false,
                beforeSend: function() {
                    $('.xmodal').show();
                },
                data: {province: province, district: district, commune: commune},
                success: function(data) {
                    if (data.length > 0) {
                        var opt = '';
                        opt += '<option></option>';
                        $.each(data, function(i, item) {
                            opt += '<option data-v_khmer="' + item.v_khmer + '">' + item.v_khmer + '</option>';
                        });
                        $('#village').html(opt);
                    } else {
                        $('#village').html('');
                    }
                    var xtotal_display = $('#s_dis').val() - 0;
                    grid(1, xtotal_display);
                    $('.xmodal').hide();
                },
                error: function() {

                }
            });
        });

        // get commune =============
        $('body').delegate("#district", "change", function() {
            var province = $('#province').find(':selected').data('pro_code');
            var district = $(this).find(':selected').data('dis_code');

            $.ajax({
                url: '<?= site_url('rri/search_advanced/opt_commune') ?>',
                type: 'post',
                datatype: 'json',
                // async: false,
                beforeSend: function() {
                    $('.xmodal').show();
                },
                data: {province: province, district: district},
                success: function(data) {
                    if (data.length > 0) {
                        var opt = '';
                        opt += '<option></option>';
                        $.each(data, function(i, item) {
                            opt += '<option data-com_khmer="' + item.com_khmer + '"data-com_code="' + item.com_code + '">' + item.com_khmer + '</option>';
                        });
                        $('#commune').html(opt);
                    } else {
                        $('#commune').html('');
                        $('#village').html('');
                    }
                    var xtotal_display = $('#s_dis').val() - 0;
                    grid(1, xtotal_display);
                    $('.xmodal').hide();
                },
                error: function() {

                }
            });
        });

        // get dis. ================
        $('body').delegate("#province", "change", function() {
            var province = $(this).find(':selected').data('pro_code');

            $.ajax({
                url: '<?= site_url('rri/search_advanced/opt_dis') ?>',
                type: 'post',
                datatype: 'json',
                // async: false,
                beforeSend: function() {
                    $('.xmodal').show();
                },
                data: {province: province},
                success: function(data) {
                    if (data.length > 0) {
                        var opt = '';
                        opt += '<option></option>';
                        $.each(data, function(i, item) {
                            opt += '<option data-dis_code="' + item.dis_code + '">' + item.dis_khmer + '</option>';
                        });
                        $('#district').html(opt);
                    } else {
                        $('#district').html('');
                        $('#commune').html('');
                        $('#village').html('');
                    }
                    var xtotal_display = $('#s_dis').val() - 0;
                    grid(1, xtotal_display);
                    $('.xmodal').hide();
                },
                error: function() {

                }
            });
        });

        // constr. ===========
        $("#art").on("change", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        $("#pub").on("change", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // hi. ================
        $("#activity").on("change", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        $("#year_construct").on("change", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        $("#apply_by").on("change", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        $("#source_budget").on("change", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // pave. ================
        $("#pave").on("change", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // edit ========================
        /* $("body").delegate(".editor", "click", function (e) {
         var id = $(this).data('id');
         var eid = (id);
         window.location = '<?= site_url('rri/roads/edit') ?>/' + encodeURIComponent(eid);
         }); */

    }); // ready fun. ====================

    // print data ==================
    function print_dt() {
        var province = $('#province').val();
        var district = $('#district').val();
        var pub = $('#pub').val();
        var pave = $('#pave').val();

        $.ajax({
            url: '<?= site_url('rri/search_advanced/print_advanced') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {province: province, district: district, pub: pub, pave: pave},
            success: function(data) {
                var tr = "";
                var to_l = 0;
                if (data.length > 0) {
                    $.each(data, function(i, row) {
                        i++;
                        tr += "<tr>" +
                                "<td>" + i + "</td>" +
                                "<td>" + (row.idtemp - 0 > 0 ? row.idtemp : '') + "</td>" +
                                "<td style='text-align: left;'>" + row.road_name + "</td>" +
                                "<td>" + (row.type !== '' ? row.type : '') + "</td>" +
                                "<td style='text-align: right;'>" + (row.length - 0 > 0 ? row.length : '') + "</td>" +
                                "<td style='text-align: center;'>" + (row.width - 0 > 0 ? row.width : '') + "</td>" +
                                "<td>" + (row.first_point_x - 0 > 0 ? row.first_point_x : '') + "</td>" +
                                "<td>" + (row.first_point_y - 0 > 0 ? row.first_point_y : '') + "</td>" +
                                "<td>" + (row.last_point_x - 0 > 0 ? row.last_point_x : '') + "</td>" +
                                "<td>" + (row.last_point_y - 0 > 0 ? row.last_point_y : '') + "</td>" +
                                "<td style='text-align: left;'>" + (row.commune !== '' ? row.commune : '') + "</td>" +
                                "<td style='text-align: left;'>" + row.activity + "</td>" +
                                "<td style='text-align: left;'>" + row.apply_by + "</td>" +
                                "<td style='text-align: center;'>" + row.year_construct + "</td>" +
                                "<td style='text-align: left;'>" + row.source_budget + "</td>" +
                                "<td style='text-align: left;'>" + row.type_pavement + "</td>" +
                                "</tr>";
                        to_l += row.length - 0;
                    });
                    $('#tbl_data tbody').html(tr);
                    $('#tbl_data tfoot #to_l').html(to_l);
                }
                $('.xmodal').hide();
            },
            error: function() {

            }
        });// ajax ============        
    }

    // grid ==============================
    function grid(current_page, total_display) {
        // var =================
        var limit = total_display - 0;
        var offset = (current_page - 1) * total_display;

        // gen. ==============
        var type = $('#type').val();
        var length = $('#length').val() - 0;
        var width = $('#width').val() - 0;
        var com_length = $('#com_length').val();
        var com_width = $('#com_width').val();
        // gen. ==============
        var province = $('#province').find(':selected').data('pro_code');
        var district = $('#district').find(':selected').data('dis_code');
        var commune = $('#commune').find(':selected').data('com_khmer');
        var village = $('#village').find(':selected').data('v_khmer');

        // constructoin. =====
        var art = $('#art').val();
        var pub = $('#pub').val();
        // hi. ===============
        var activity = $('#activity').val();
        var year_construct = $('#year_construct').val();
        var apply_by = $('#apply_by').val();
        var source_budget = $('#source_budget').val();
        // pav. ==============
        var pave = $('#pave').val();

        $.ajax({
            url: '<?= site_url('rri/search_advanced/search') ?>',
            type: 'post',
            datatype: 'json',
            // async: false,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {offset: offset, limit: limit,
                type: type, length: length, width: width, com_length: com_length, com_width: com_width,
                province: province, district: district, commune: commune, village: village,
                art: art, pub: pub,
                activity: activity, year_construct: year_construct, apply_by: apply_by, source_budget: source_budget,
                pave: pave},
            success: function(data) {
                var total_page = data.total_page;
                var record = data.res;
                var total_record = data.total_record;
                var tr = "";
                var i = 0;

                if (record.length > 0) {
                    $.each(record, function(i, row) {
                        i++;
                        tr += "<tr>" +
                                "<td>" + row.idtemp + "</td>" +
                                "<td>" + row.road_number + "</td>" +
                                "<td style='text-align: left;'>" + row.road_name + "</td>" +
                                "<td>" + row.type + "</td>" +
                                "<td style='text-align: right;'>" + (row.length - 0 > 0 ? row.length : '') + "</td>" +
                                "<td>" + (row.width - 0 > 0 ? row.width : '') + "</td>" +
                                "<td><a href='<?= site_url('rri/roads/edit') ?>/" + row.road_id + "' class='editor' target='_parent'>ខ្សែផ្លូវ</a></td>" +
                                "</tr>";
                    });
                    $('#my_gr tbody').html(tr);
                    $('#disp').html('បង្ហាញទិន្នន័យ ' + (offset + 1) + '-' + ((offset + total_display) - 0 > total_record ? total_record : (offset + total_display)) + ' នៃទិន្នន័យ ' + total_record);

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
                            "<td colspan='8' style='text-align: left;'>អត់មានទិន្ន័យ!</td>" +
                            "</tr>";
                    $('#my_gr tbody').html(tr);
                    $('#pagination-grid').html("");
                    $('#disp').html("");
                }
                $('.xmodal').hide();
            },
            error: function() {

            }
        });// ajax =================
    }

</script>
