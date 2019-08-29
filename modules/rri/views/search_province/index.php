<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ <?= t('ស្វែងរកព័ត៌មានខ្សែផ្លូវ') ?><span id="my_pro"></span></h3>
        </div>

        <div class="panel-body">              

            <!-- dis. ----------------------->
            <div style="margin: -5px 0 40px 0;">
                <span style="float: left;margin: 5px 0 0 0;">
                    <select id="s_dis" style="height: 30px;"></select>
                    <label for="s_dis"><?= t('កំណត់ត្រាក្នុងមួយទំព័រ') ?></label>
                </span>                
                <span style="float: right;">                    
                    <label for = "pro_id"><?= t('រាជធានី-ខេត្ត') ?></label>
                    <select data-toggle="tooltip" data-placement="left" validate_act id="pro_id" style="width: 150px;height: 32px;border-radius: 4px;"></select>
                    <button id="btn_search" type="button" style="display: none;"> <?= t('ស្វែងរក') ?></button>
                    <button id="btn_link_map" type="button" style="height: 30px;"> <?= t('ភ្ជាប់ទៅផែនទី') ?></button>
                </span>
            </div>
            <div id="show_image" style="display: none;width: 10px;height: 10px;border: 1px solid red;">
                <img width="50" src="<?= base_url('assets/bs/css/images/loading.gif') ?>" />
            </div>
            <table style="text-align: center;vertical-align: middle;" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                <thead>
                    <tr>
                        <th><?= t('ល.រ') ?></th>
                        <th style="width: 10%;"><a href="javascript: void(0)"><?= t('ល.រ ឯកសារ') ?><i class="icon-arrow-up-3"></i></a></th>
                        <th><?= t('លេខ​ផ្លូវ') ?></th>
                        <th style="width: 35%;"><?= t('ឈ្មោះ​ផ្លូវ') ?></th>
                        <th><?= t('ប្រភេទ​ផ្លូវ') ?></th>
                        <th><?= t('ប្រវែង​ផ្លូវ') ?></th>
                        <th><?= t('ទទឹង​ផ្លូវ') ?></th>
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

        </div><!-- end body ----------------->          
    </div>
</form>

<style>
    .table-hover tbody tr:hover td {background: #EDEFF5;}
    th{text-align: center;}
</style>

<script type="text/javascript">
    $(function () {

        // opt. province =============
        $.ajax({
            url: '<?= site_url('rri/search_province/opt_pro') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {},
            success: function (data) {
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        opt += '<option value=' + item.id + '>' + item.khmer_name + '</option>';
                    });
                }
                $('#pro_id').html(opt);
            },
            error: function () {

            }
        });

        // search ====================
        $('#pro_id').on('change', function () {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // opt. diplay ================
        $.ajax({
            url: '<?= site_url('rri/search_province/opt_display') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {},
            success: function (data) {
                if (data.length > 0) {
                    var opt = '';
                    $.each(data, function (i, item) {
                        opt += '<option>' + item.disp_num + '</option>';
                    });
                }
                $('#s_dis').html(opt);
            },
            error: function () {

            }
        });

        // search ===================
        $("#btn_search").on("click", function () {
            var xtotal_display = $('#s_dis').val() - 0;
            var pro_id = $('#pro_id').val() - 0;
            if (pro_id > 0) {
                grid(1, xtotal_display);
            } else {
                alert('សូមបញ្ចូលតំលៃ!');
                $('#pro_id').focus();
            }
        });

        // page =======================
        $('body').delegate('.a-pagination', 'click', function () {
            var xtotal_display = $('#s_dis').val() - 0;
            var currentpage = $(this).data('currentpage');
            grid(currentpage, xtotal_display);
        });

        // display ===================
        $('body').delegate("#s_dis", "change", function (e) {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // link map by province ============
        $('#btn_link_map').on('click', function () {
            var pro_id = $('#pro_id').val();
            if (pro_id - 0 > 0) {
                window.location = '<?= site_url('rri/search_province/link_map_province') ?>/' + encodeURIComponent(pro_id);
            } else {
                alert('សូមជ្រើសរើស រាជធានី-ខេត្ត !');
            }
        });

        // edit =========================
        /* $("body").delegate(".editor", "click", function(e) {
         var id = $(this).data('id');
         var eid = (id);
         window.location = '<?= site_url('rri/roads/edit') ?>/' + encodeURIComponent(eid);
         }); */

    });// end ready ================

    // gr =========================
    function grid(current_page, total_display) {
        var limit = total_display - 0;
        var offset = (current_page - 1) * total_display;
        var pro_id = $('#pro_id').val();

        $.ajax({
            url: '<?= site_url('rri/search_province/search_by_pro') ?>',
            type: 'post',
            datatype: 'json',
            cache: true,
            async: true,
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {offset: offset, limit: limit, pro_id: pro_id},
            success: function (data) {
                $('.xmodal').hide();
                var total_page = data.total_page;
                var records = data.res;
                var total_record = data.total_record;
                var tr = '';

                if (records.length > 0) {
                    $.each(records, function (i, item) {
                        i++;
                        tr += '<tr>' +
                                '<td>' + i + '</td>' +
                                '<td>' + item.idtemp + '</td>' +
                                '<td style="text-align: left;">' + item.road_number + '</td>' +
                                '<td style="text-align: left;">' + item.road_name + '</td>' +
                                '<td>' + item.type + '</td>' +
                                '<td style="text-align: right;">' + (item.length - 0 > 0 ? item.length : '') + '</td>' +
                                '<td>' + (item.width - 0 > 0 ? item.width : '') + '</td>' +
                                '<td><a href="<?= site_url("rri/roads/edit") ?>/' + item.road_id + '" class="editor" target="_parent">ខ្សែផ្លូវ</a></td>' +
                                '</tr>';
                    });

                    $('#example tbody').html(tr);
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
                    $('#example tbody').html(tr);
                    $('#pagination-grid').html("");
                    $('#disp').html("");
                }
            },
            error: function () {

            }
        });

        // title ================
        if (pro_id - 0 > 0) {
            $.ajax({
                url: '<?= site_url('rri/search_province/title') ?>',
                type: 'post',
                datatype: 'html',
                async: false,
                data: {pro_id: pro_id},
                success: function (d) {
                    var str_pro = '';
                    if (d.id == '19') {
                        str_pro += ': រាជធានី​ ' + d.khmer_name;
                    } else {
                        str_pro += ': ខេត្ត ' + d.khmer_name;
                    }
                    $('#my_pro').html(str_pro);
                },
                error: function () {

                }
            });
        } else {
            $('#my_pro').html("");
        }
    }
</script>