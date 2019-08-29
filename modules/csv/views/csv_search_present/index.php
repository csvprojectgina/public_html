<form class="form-horizontal" role="form" action="<?= site_url('csv/csv_search_present/print_csv_present') ?>"  method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​--> <?= t('ស្វែងរកតាមបច្ចុប្បន្នភាព') ?></h3>
            <button style="float: right; margin: -25px 0 0 0;" data-toggle="tooltip" data-placement="right" title="" type="submit" id="btn_print" class="btn btn-default" data-original-title="រៀបចំបញ្ជីមន្ត្រីរាជការជា​ PDF">រៀបចំបញ្ជីមន្ត្រីរាជការជា​PDF</button>
        </div>

        <div class="panel-body">

            <div style="margin-bottom: 5px;">
                <select id="s_dis">
                    <option>15</option>
                    <option>50</option>
                    <option>100</option>
                    <option>500</option>
                    <option>1000</option>
                </select>
                <label for="s_dis"><?= t('នាក់') ?></label>
                <span style="float: right; font-family: khmermef1;">
                    <label for="search"><?= t('ស្វែងរក') ?></label>
                    <input type="text" id="search" name="search" style="height: 30px;border-radius: 4px;line-height: 4px;margin: 10px 10px 20px; font-family: khmermef1;" />
                </span>

            </div>
            <div id="x_img" style="display: inline; margin: 10px 600px 5px 10px"></div>

            <!-- table data -->
            <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-hover" style="text-align: center; vertical-align: middle; font-family: khmermef1;" id="my_gr">
                <thead>
                    <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
                        <th style="text-align: center;"><?= t('ល.រ') ?></th>
                        <th style="text-align: center;"><?= t('ឈ្មោះ') ?></th>
                        <!-- <th style="text-align: center;"><?= t('នាម') ?></th> -->
                        <th style="text-align: center;"><?= t('ភេទ') ?></th>
                        <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំកំណើត') ?></th>
                        <th style="text-align: center;"><?= t('លេខទូរស័ព្ទ') ?></th>
                        <th style="text-align: center;"><?= t('តំណែង') ?></th>
                        <!-- <th style="text-align: center;"><?= t('ក្របខណ្ឌ') ?></th> -->
                        <!-- <th style="text-align: center;"><?= t('ថ្ងៃចូលធ្វើការ') ?></th> -->
                        <th style="text-align: center;"><?= t('អង្គភាព') ?></th>
                        <!--<th style="text-align: center;"><a href="<?= site_url('csv/csv_info/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូល​ថ្មី') ?></a></th>-->
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
        // submit ==================
        $('#btn_print').on('click', function (e) {
            var search = $('#search').val();
            //alert(search);
        });
        // init. =========================
        var xtotal_display = $('#s_dis').val() - 0;
        grid(1, xtotal_display);
        // display =========================
        $('body').delegate("#s_dis", "change", function (e) {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });
        // search =========
        $('#search').on('keyup', function () {
            if ($(this).val() != '' || $(this).val() != null) {
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            }
        });
        // page =============================
        $('body').delegate('.a-pagination', 'click', function () {
            var xtotal_display = $('#s_dis').val() - 0;
            var currentpage = $(this).data('currentpage');
            grid(currentpage, xtotal_display);
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
            $(this).css('text', 'click');
        });
    });

    // grid ==============================
    function grid(current_page, total_display) {
        var c_img = "<?= base_url() . 'assets/bs/css/images/mrd.gif'; ?>";
        // var =================
        var limit = total_display - 0;
        var offset = (current_page - 1) * total_display;
        var search = $('#search').val();
        $.ajax({
            url: '<?= site_url('csv/csv_search_present/search') ?>',
            type: 'post',
            datatype: 'json',
            // async: false,
            beforeSend: function () {
//                $('.xmodal').show();
                $('#x_img').html("<img width='26' src='" + c_img + "' /> <h4 style='display: inline;color: blue;'>កំពុងដំណើរការ...</h4>").show();
            },
            data: {offset: offset, limit: limit, search: search},
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
                                "<td>" + row.lastname + ' ' + row.firstname + "</td>" +
                                // "<td>" + row.firstname + "</td>" +
                                "<td>" + row.gender + "</td>" +
                                "<td>" + row.dateofbirth + "</td>" +
                                "<td>" + row.mobile_phone + "</td>" +
                                "<td>" + row.current_role + "</td>" +
                                // "<td>" + row.type + "</td>" +
                                // "<td>" + row.type + "</td>" +
                                "<td>" + row.unit + "</td>" +
//                                "<td style='text-align: center;'><a href='javascript: void(0)' data-id=" + row.id +
//                                " class='delete'>លុប</a></td>" +
//                                "<td><a href='<?= site_url('csv/csv_info/edit') ?>/" + row.id + "' class='editor' target='_parent'>លំអិត</a></td>" +
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
</script>
