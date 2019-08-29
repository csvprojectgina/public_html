<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ <?= t('ស្វែងរកតាមសំណង់សិល្បការ') ?></h3>
        </div>

        <div class="panel-body">  

            <div style="margin: -10px 0 40px 0;vertical-align: middle;">
                <span style="float: left;margin: 5px 0 0 0;">
                    <select id="s_dis" style="height: 30px;"></select>
                    <label for="s_dis"><?= t('កំណត់ត្រាក្នុងមួយទំព័រ') ?></label>
                </span>                
                <span style="float: right;">                    
                    <label for="type_building"><?= t('ស្វែងរក') ?></label>
                    <select id="type_building" class="type_building" validate_act style="width: 200px;height: 30px;"></select> 
                    <button type="button" id="btn_prt" class="btn_prt" style="height: 30px;">បោះពុម្ព</button>
                </span>
            </div>

            <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-hover" id="my_gr">
                <thead>
                    <tr>
                        <th style="text-align: center;width: 35%;"><?= t('ប្រភេទសំណង់') ?></th>
                        <!--<th style="text-align: center;width: 30%;"><?= t('ឈ្មោះសំណង់') ?></th>-->
                        <th style="text-align: center;"><?= t('ល.រ') ?></th>
                        <th style="text-align: center;width: 10%;"><?= t('លេខផ្លូវ') ?></th>
                        <th style="text-align: center;"><?= t('ឈ្មោះផ្លូវ') ?></th>
                        <th style="text-align: center;width: 10%;"><a href="<?= site_url('rri/roads/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូលថ្មី') ?></a></th>            
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

<!-- div print -------------------->
<div class="dv_prt" id="dv_prt" style="display: none;">
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

<style>
    .table-hover tbody tr:hover td {background: #EDEFF5;}
</style>

<script type="text/javascript">
    $(function() {

        $('body').delegate('#btn_prt', 'click', function() {
            var type_building = $('#type_building').val();
            if (type_building != '') {
                print_dt();
            } else {
                alert('សូមជ្រើសរើសប្រភេទផ្លូវដើម្បីបោះពុម្ព!');
                return false;
            }
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

        $('body').delegate('#gis_id', 'click', function() {
            // var sort = $(this).data('direction') == 'asc' ? $(this).data('direction') : 'desc';
            alert(0);
        });

        // init. =================
        var xtotal_display = $('#s_dis').val() - 0;
        grid(1, xtotal_display);

        // art building ====================
        $('#type_building').on('change', function() {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // page =======================
        $('body').delegate('.a-pagination', 'click', function() {
            var xtotal_display = $('#s_dis').val() - 0;
            var currentpage = $(this).data('currentpage');
            grid(currentpage, xtotal_display);
        });

        // display =====================
        $('body').delegate("#s_dis", "change", function(e) {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

    });// ready f. ===============

    // get num. display ============
    $.ajax({
        url: '<?= site_url('rri/search_type_construction/get_num_dip') ?>',
        type: 'post',
        datatype: 'json',
        async: false,
        beforeSend: function() {
            $('.xmodal').show();
        },
        data: {},
        success: function(data) {
            $('.xmodal').hide();
            if (data.length > 0) {
                var opt = '';
                $.each(data, function(i, item) {
                    opt += '<option>' + item.disp_num + '</option>';
                });
            }
            $('#s_dis').html(opt);
        },
        error: function() {

        }
    });

    // get art_building ===============
    $.ajax({
        url: '<?= site_url('rri/search_art_construction/opt_building') ?>',
        type: 'post',
        datatype: 'json',
        async: false,
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
            $('#type_building').html(opt);
        },
        error: function() {

        }
    });

    // format num. ===============
    function formatDollar(num) {
        var p = num.toFixed(0).split(".");
        return p[0].split("").reverse().reduce(function(acc, num, i) {
            return  num + (i && !(i % 3) ? "," : "") + acc;
        }, "") + "." + p[1];
    }

    // print data ==================
    function print_dt() {
        var type_building = $('#type_building').val();
        $.ajax({
            url: '<?= site_url('rri/search_art_construction/print_building') ?>',
            type: 'post',
            datatype: 'json',
            // async: false,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {type_building: type_building},
            success: function(data) {               
                var tr = "";
                var to_l = 0;
                if (data.length > 0) {
                    $.each(data, function(i, row) {
                        i++;
                        tr += "<tr>" +
                                "<td>" + i + "</td>" +
                                "<td>" + (row.idtemp - 0 > 0 ? row.idtemp : '') + "</td>" +
                                "<td style='text-align: left;'>" + (row.commune !== '' ? row.commune : '') + "</td>" +
                                "<td style='text-align: left;'>" + row.road_name + "</td>" +
                                "<td style='text-align: right;'>" + (row.length - 0 > 0 ? row.length : '') + "</td>" +
                                "<td style='text-align: center;'>" + (row.width - 0 > 0 ? row.width : '') + "</td>" +
                                "<td>" + (row.first_point_x - 0 > 0 ? row.first_point_x : '') + "</td>" +
                                "<td>" + (row.first_point_y - 0 > 0 ? row.first_point_y : '') + "</td>" +
                                "<td>" + (row.last_point_x - 0 > 0 ? row.last_point_x : '') + "</td>" +
                                "<td>" + (row.last_point_y - 0 > 0 ? row.last_point_y : '') + "</td>" +
                                "<td style='text-align: left;'>" + (row.type_building_art !== '' ? row.type_building_art : '') + "</td>" +
                                "<td style='text-align: left;'>" + row.type_pavement + "</td>" +
                                "<td>" + (row.type !== '' ? row.type : '') + "</td>" +
                                "<td style='text-align: left;'>" + row.source_budget + "</td>" +
                                "<td style='text-align: left;'>" + row.apply_by + "</td>" +
                                "<td style='text-align: center;'>" + row.year_construct + "</td>" +
                                "</tr>";
                        to_l += row.length - 0;
                    });
                    $('#tbl_data tbody').html(tr);
                    $('#tbl_data tfoot #to_l').html(to_l);
                    $('.xmodal').hide();
                }
            },
            error: function() {

            }
        });// ajax ============        
    }

    // grid ==========================
    function grid(current_page, total_display) {
        // var ================
        var limit = total_display - 0;
        var offset = (current_page - 1) * total_display;
        var type_building = $('#type_building').val();

        $.ajax({
            url: '<?= site_url('rri/search_art_construction/grid_type_construction') ?>',
            type: 'post',
            datatype: 'json',
            async: true,
            beforeSend: function() {
                $('.xmodal').show();
            },
            data: {offset: offset, limit: limit,
                    type_building: type_building},
            success: function(data) {
                $('.xmodal').hide();
                var total_page = data.total_page;
                var record = data.res;
                var total_record = data.total_record;
                var tr = "";
                var i = 0;
                
                if (record.length > 0) {
                    $.each(record, function(i, row) {
                        i++;
                        tr += "<tr>" +
                                "<td style='text-align: left;'>" + row.type_building_art + "</td>" +
                                // "<td style='text-align: left;'>" + row.name_building + "</td>" +
                                "<td style='text-align: center;'>" + row.idtemp + "</td>" +
                                "<td style='text-align: left;'>" + row.road_number + "</td>" +
                                "<td style='text-align: left;'>" + row.road_name + "</td>" +
                                "<td style='text-align: center;'><a href='<?= site_url('rri/roads/edit') ?>/" + row.road_id + "' class='editor' target='_parent'>ខ្សែផ្លូវ</a></td>" +
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
            },
            error: function() {

            }
        });// ajax =================
    }
</script>