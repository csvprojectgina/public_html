<style media="screen">
    body {
        padding : 10px ;

    }

    #exTab1 .tab-content {
        color : white;
        background-color: #428bca;
        padding : 5px 15px;
    }
    /* remove border radius for the tab */

    #exTab1 .nav-pills > li > a {
        border-radius: 0;
    }
    /* change border radius for the tab , apply corners on top*/

    #exTab3 .nav-pills > li > a {
        border-radius: 4px 4px 0 0 ;
    }
    #exTab3 .tab-content {
        color : white;
        background-color: #428bca;
        padding : 5px 15px;
    }
    .tab-content {border: 1px solid #ddd;border-top-color: transparent;}
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9{margin-bottom:0px;}
    .panel-heading{padding:0px;}
    .panel-title{padding: 10px;}
    .btn-select {
        position: relative;
        padding: 0;
        min-width: 236px;
        width: 100%;
        border-radius: 0;
        margin-bottom: 20px;
    }

    .btn-select .btn-select-value {
        padding: 6px 12px;
        display: block;
        position: absolute;
        left: 0;
        right: 34px;
        text-align: left;
        text-overflow: ellipsis;
        overflow: hidden;
        border-top: none !important;
        border-bottom: none !important;
        border-left: none !important;
    }

    .btn-select .btn-select-arrow {
        float: right;
        line-height: 20px;
        padding: 6px 20px;
        top: 0;
    }

    .btn-select ul {
        display: none;
        background-color: white;
        color: black;
        clear: both;
        list-style: none;
        padding: 0;
        margin: 0;
        border-top: none !important;
        position: absolute;
        left: -1px;
        right: -1px;
        top: 33px;
        z-index: 999;
    }

    .btn-select ul li {
        padding: 3px 6px;
        text-align: left;
    }

    .btn-select ul li:hover {
        background-color: #f4f4f4;
    }

    .btn-select ul li.selected {
        color: white;
    }

    /* Default Start */
    .btn-select.btn-default:hover, .btn-select.btn-default:active, .btn-select.btn-default.active {
        border-color: #ccc;
    }

    .btn-select.btn-default ul li.selected {
        background-color: #ccc;
    }

    .btn-select.btn-default ul, .btn-select.btn-default .btn-select-value {
        background-color: white;
        border: #ccc 1px solid;
    }

    .btn-select.btn-default:hover, .btn-select.btn-default.active {
        background-color: #e6e6e6;
    }
    /* Default End */

    /* Primary Start */
    .btn-select.btn-primary:hover, .btn-select.btn-primary:active, .btn-select.btn-primary.active {
        border-color: #286090;
    }

    .btn-select.btn-primary ul li.selected {
        background-color: #2e6da4;
        color: white;
    }

    .btn-select.btn-primary ul {
        border: #2e6da4 1px solid;
    }

    .btn-select.btn-primary .btn-select-value {
        background-color: #428bca;
        border: #2e6da4 1px solid;
    }

    .btn-select.btn-primary:hover, .btn-select.btn-primary.active {
        background-color: #286090;
    }
    /* Primary End */

    /* Success Start */
    .btn-select.btn-success:hover, .btn-select.btn-success:active, .btn-select.btn-success.active {
        border-color: #4cae4c;
    }

    .btn-select.btn-success ul li.selected {
        background-color: #4cae4c;
        color: white;
    }

    .btn-select.btn-success ul {
        border: #4cae4c 1px solid;
    }

    .btn-select.btn-success .btn-select-value {
        background-color: #5cb85c;
        border: #4cae4c 1px solid;
    }

    .btn-select.btn-success:hover, .btn-select.btn-success.active {
        background-color: #449d44;
    }
    /* Success End */

    /* info Start */
    .btn-select.btn-info:hover, .btn-select.btn-info:active, .btn-select.btn-info.active {
        border-color: #46b8da;
    }

    .btn-select.btn-info ul li.selected {
        background-color: #46b8da;
        color: white;
    }

    .btn-select.btn-info ul {
        border: #46b8da 1px solid;
    }

    .btn-select.btn-info .btn-select-value {
        background-color: #5bc0de;
        border: #46b8da 1px solid;
    }

    .btn-select.btn-info:hover, .btn-select.btn-info.active {
        background-color: #269abc;
    }
    /* info End */

    /* warning Start */
    .btn-select.btn-warning:hover, .btn-select.btn-warning:active, .btn-select.btn-warning.active {
        border-color: #eea236;
    }

    .btn-select.btn-warning ul li.selected {
        background-color: #eea236;
        color: white;
    }

    .btn-select.btn-warning ul {
        border: #eea236 1px solid;
    }

    .btn-select.btn-warning .btn-select-value {
        background-color: #f0ad4e;
        border: #eea236 1px solid;
    }

    .btn-select.btn-warning:hover, .btn-select.btn-warning.active {
        background-color: #d58512;
    }
    /* warning End */

    /* danger Start */
    .btn-select.btn-danger:hover, .btn-select.btn-danger:active, .btn-select.btn-danger.active {
        border-color: #d43f3a;
    }

    .btn-select.btn-danger ul li.selected {
        background-color: #d43f3a;
        color: white;
    }

    .btn-select.btn-danger ul {
        border: #d43f3a 1px solid;
    }

    .btn-select.btn-danger .btn-select-value {
        background-color: #d9534f;
        border: #d43f3a 1px solid;
    }

    .btn-select.btn-danger:hover, .btn-select.btn-danger.active {
        background-color: #c9302c;
    }
    /* danger End */

    .btn-select.btn-select-light .btn-select-value {
        background-color: white;
        color: black;
    }

</style>
<hr><hr>
<div class="tab-content ">
    <div class="tab-pane active" id="1">
        <form class="form-horizontal" action="" role="form" method="post">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                        <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ --><?= t('ព័ត៌មានការិយាល័យ') ?></h3>
<!-- <button style="float: right; margin: -25px 0 0 0;" data-toggle="tooltip" data-placement="right" title="" type="submit" id="btn_print" class="btn btn-default" class="btn btn-default glyphicon glyphicon-file" id="btn_retires" type="submit"><?= t('រៀបចំបញ្ជីមន្ត្រីរាជការជា​PDF') ?></button> -->
                        </div>
                        <div class="col-lg-6 col-sm-6 text-right">
                            <button class="btn btn-secondary btn-md"  data-toggle="modal" id="ajaxsgetdt" data-target="#addDepartment"><span class="glyphicon glyphicon-plus"> </span> បង្កើតកាវិយាល័យ</button>
                        </div>
                    </div>

                </div>

                <div class="panel-body">
                    <div style="margin: -10px 0 40px 0;vertical-align: middle;">
                        <span style="float: left;margin: 5px 0 0 0;">
                            <select id="s_dis" style="height: 30px;"></select>
                            <label for="s_dis"><?= t('កំណត់ត្រាក្នុងមួយទំព័រ') ?></label>
                        </span>
                        <span style="float: right;">
                            <label for="search"><?= t('ស្វែងការិយាល័យ') ?></label>
                            <input type="text" id="search" style="height: 30px;border-radius: 4px;line-height: 4px;" />
                        </span>
                    </div>
                    <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-hover" id="my_gr">
                        <thead>
                            <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
                                <th style="text-align: left;" ><?= t('ព័ត៌មានការិយាល័យ') ?></th>
                                <th style="text-align: left;" ><?= t('ព័ត៌មាននាយកដ្ឋាន') ?></th>
                                <th style="text-align: left;" ><?= t('ព័ត៌មានអគនាយកដ្ឋាន') ?></th>
                                <th style="text-align: center;"><?= t('អង្គភាព') ?></th>
                                <th style="text-align: center;"><?= t('សកម្មភាព') ?></th>
        <!--                   <th style="text-align: center;"><?= t('លេខមន្ត្រីអង្គភាព') ?></th>                    -->
                               <!--<th style="text-align: center;width: 10%;"><a href="<?= site_url('csv/csv_info/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូលថ្មី') ?></a></th>             -->

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
    </div>
    <div class="modal fade" id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-plus"> </span> បញ្ជូលនាយកដ្ឋានថ្មី</h4>
                </div>
                <div class="modal-body">
                    <div class="bs-example">
                        <form  class="form-horizontal f_save" role="form" method="post" id="f_save" >
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <label for="inputEmail">បញ្ជូលអង្គភាព</label>
                                        <a class="btn btn-default btn-select">
                                            <input type="hidden" class="btn-select-input" id="" name="uid" value="" />
                                            <span class="btn-select-value">ជ្រើសរើសអង្គភាព...</span>
                                            <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                                            <ul id="displayoption">
                                                <li class="selected">ជ្រើសរើសអង្គភាព...</li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <label for="inputEmail">បញ្ជូលអគនាយកដ្ឌាន</label>
                                        <a class="btn btn-default btn-select" >
                                            <input type="hidden" class="btn-select-input" id="" name="general_dep_id" value="" />
                                            <span class="btn-select-value">ជ្រើសរើសអគនាយកដ្ឌាន...</span>
                                            <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                                            <ul id="displayoption_general_deps">
                                                <li class="selected">ជ្រើសរើសអគនាយកដ្ឋាន...</li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <label for="inputEmail">បញ្ជូលនាយកដ្ឌាន</label>
                                        <a class="btn btn-default btn-select" >
                                            <input type="hidden" class="btn-select-input" id="" name="departments_id" value="" />
                                            <span class="btn-select-value">ជ្រើសរើសនាយកដ្ឌាន...</span>
                                            <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                                            <ul id="displayoption_departments">
                                                <li class="selected">ជ្រើសរើសនាយកដ្ឋាន...</li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">បញ្ជូលការរិយាល័យ</label>
                                <input type="text" class="form-control" name="office" id="office" placeholder="បញ្ជូលការរិយាល័យ" value="">
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">

                                </div>
                                <div class="col-md-6 text-right  col-sm-6" style="padding:0px;">
                                    <div class="btn-group  btn-group-lg">
                                        <button class="btn btn-default" id="btnsave" type="submit"><span class="glyphicon glyphicon-save"></span>រក្សាទុក</button>
                                        <button type="button" class="btn btn-default  " data-dismiss="modal" id="back"><span class="glyphicon glyphicon-arrow-left"></span>ថយក្រោយ </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- js. -->
<script type="text/javascript">
    $(function () {
        // get num. display
        $.ajax({
            url: '<?= site_url('csv/csv_info/get_num_dip') ?>',
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
                    $.each(data, function (i, item) {
                        opt += '<option>' + item.disp_num + '</option>';
                    });
                }
                $('#s_dis').html(opt);
                $('.xmodal').hide();
            },
            error: function () {

            }
        });

        // init. ===========
        var xtotal_display = $('#s_dis').val() - 0;
        grid(1, xtotal_display);

        // search =========
        $('#search').on('keyup', function () {
            if ($(this).val() != '' || $(this).val() != null) {
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            }
        });

        // page ===========
        $('body').delegate('.a-pagination', 'click', function () {
            var xtotal_display = $('#s_dis').val() - 0;
            var currentpage = $(this).data('currentpage');
            grid(currentpage, xtotal_display);
        });

        // display ==========
        $('body').delegate("#s_dis", "change", function (e) {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

        // save unit===============
        $("#f_save").on('submit', function (e) {
            e.preventDefault();
//            return false;
            $.ajax({
                url: "<?= site_url('csv/csv_offices/insert_offices') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').html('<div style="position: relative;top: 50%;left: 51%;font-family:khmer mef1;font-size:16px;color:red;">កំពុងតែបញ្ចូល......</div>');
                    $('.xmodal').show();
//                    $('.ximage').show();
                    location.reload();
                    //window.location = 'javascript:history.go(-1)';
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var id = data.id - 0;
                    var records_d = data.re_d;
                    var records_t = data.re_t;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });

        // delete ==========
        $('body').delegate(".delete", "click", function (e) {
            var id = $(this).data('id') - 0;
            // alert(id);
            var tr = $(this).parent().parent();
            if (id > 0) {
                if (confirm('តើអ្នកពិតជាលុប')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_offices/delete') ?>',
                        type: 'POST',
                        dataType: 'html',
                        data: {id: id},
                        success: function (d) {
                            //alert(d);
                            tr.remove();
                            location.reload();
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
                window.location = "<?= site_url('csv/csv_offices/edit') ?>/" + id;
            } else {
                alert("អត់មានទិន្នន័យ!");
                return false;
            }
        });

        // row hover ===========
        $("body").delegate("#my_gr tbody tr", "mouseover", function () {
            $(this).css('cursor', 'hand');
        });

    });// ready fun. ==========

    // grid ==========================
    function grid(current_page, total_display) {
        // var =============
        var limit = total_display - 0;
        var offset = (current_page - 1) * total_display;
        var search = $('#search').val();

        $.ajax({
            url: '<?= site_url('csv/csv_offices/load') ?>',
            type: 'post',
            datatype: 'json',
            // async: false,
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {offset: offset, limit: limit, search: search},
            success: function (data) {
                var total_page = data.total_page;
                var record = data.res;
                var unit = data.qu;
                var total_record = data.total_record;
                var tr = "";
                //var unam          =if($unit.id == record.u_id){ print(unit.unit);};
                if (record.length > 0) {
                    $.each(record, function (i, row) {
                        // i++;
                        tr += "<tr data-id='" + row.id + "'class='editor' target='_parent' >" +
                                "<td style='text-align: left;'>" + row.office + "</td>" +
                                "<td style='text-align: left;'>" + row.d_name+ "</td>" +
                                "<td style='text-align: left;'>" + row.general_deps_name + "</td>" +
                                "<td style='text-align: left;'>" + row.unit + "</td>" +
                                "<td style='text-align: center;'><a href='javascript: void(0)' data-id=" + row.id +
                                " class='delete'>លុប</a></td>" +
                                "</tr>";
                    });
                    $('#my_gr tbody').html(tr);
                    $('#disp').html('បង្ហាញទិន្នន័យ ' + (offset + 1) + '-' + ((offset + total_display) - 0 > total_record ? total_record : (offset + total_display)) + ' នៃទិន្នន័យ ' + total_record);

                    var pagination = '<li><a class="a-pagination" href="javascript: void(0)" data-currentpage="1">&laquo;</a></li>';
                    for (var i = 1; i <= 4; i++) {
                        var p = 1;
                        if (current_page <= 5) {
                            p = i;
                        } else {
                            p = current_page - 5 + i;
                        }
                        if (p <= total_page) {
                            var active = current_page == p ? ' class= "active" ' : '';
                            pagination += '<li ' + active + '><a class="a-pagination" href="javascript: void(0)" data-currentpage="' + p + '">' + p + '</a></li>';
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
                            pagination += '<li ' + active + '><a class="a-pagination" href="javascript: void(0)" data-currentpage="' + pr + '">' + pr + '</a></li>';
                        }
                    }
                    pagination += '<li><a class="a-pagination" href="javascript: void(0)" data-currentpage="' + total_page + '">&raquo;</a></li>';

                    $('#pagination-grid').html(pagination);

                } else {
                    tr += "<tr>" +
                            "<td colspan='9' style='text-align: left;'>អត់មានទិន្ន័យ!</td>" +
                            "</tr>";
                    $('#my_gr tbody').html(tr);
                    $('#pagination-grid').html("");
                    $('#disp').html("");
                }
                $('.xmodal').hide();
            },
            error: function () {

            }
        });
        // ajax =============
    }

    function centerModal() {
        $(this).css('display', 'block');
        var $dialog = $(this).find(".modal-dialog");
        var offset = ($(window).height() - $dialog.height()) / 2;
        // Center modal vertically in window
        $dialog.css("margin-top", offset);
    }

    $('.modal').on('show.bs.modal', centerModal);
    $(window).on("resize", function () {
        $('.modal:visible').each(centerModal);
    });
</script>
<!-- select option -->
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-select").each(function (e) {
            var value = $(this).find("ul li.selected").html();
            if (value != undefined) {
                $(this).find(".btn-select-input").val(value);
                $(this).find(".btn-select-value").html(value);
            }
        });
    });

    $(document).on('click', '.btn-select', function (e) {
        e.preventDefault();
        var ul = $(this).find("ul");
        if ($(this).hasClass("active")) {
            if (ul.find("li").is(e.target)) {
                var target = $(e.target);
                target.addClass("selected").siblings().removeClass("selected");
                var value = target.html();
                var uid = target.attr('data-id');
                $(this).find(".btn-select-input").val(uid);
                $(this).find(".btn-select-value").html(value);
            }
            ul.hide();
            $(this).removeClass("active");
        } else {
            $('.btn-select').not(this).each(function () {
                $(this).removeClass("active").find("ul").hide();
            });
            ul.slideDown(300);
            $(this).addClass("active");
        }
    });
    $(document).on('click', function (e) {
        var target = $(e.target).closest(".btn-select");
        if (!target.length) {
            $(".btn-select").removeClass("active").find("ul").hide();
        }
    });

    $('#ajaxsgetdt').click(function () {
        $("#displayoption").empty();
        var i = '1';
        var parameters = $('#f_save').serialize();
        $.ajax({
            url: '<?= site_url('csv/csv_departments/get_unit') ?>',
            type: 'POST',
            data: parameters,
            dataType: 'json',
            success: function (data) {
                jQuery.each(data, function (index, item) {
                    //now you can access properties using dot notation
                    //alert(index.unit);
                    console.log(item.unit);
                    $('#displayoption').append('<li data-id=' + item.id + ' id ="unitid">' + item.unit + '</li>');
                });
            },
            error: function () {
                alert('There was an error');
            }
        });
//        option general deps
        $("#displayoption_general_deps").empty();
        // var i = '1';
        // var parameters = $('#f_save').serialize();
        $.ajax({
            url: '<?= site_url('csv/csv_departments/get_general_deps') ?>',
            type: 'POST',
            data: parameters,
            dataType: 'json',
            success: function (data) {
                jQuery.each(data, function (index, item) {
                    //now you can access properties using dot notation
                    //alert(index.unit);
                    console.log(item.unit);
                    $('#displayoption_general_deps').append('<li data-id=' + item.general_dep_id + ' id ="general_dep_id">' + item.general_deps_name + '</li>');
                });
            },
            error: function () {
                alert('There was an error');
            }
        });
        //        departments
                $("#displayoption_departments").empty();
                // var i = '1';
                // var parameters = $('#f_save').serialize();
                $.ajax({
                    url: '<?= site_url('csv/csv_offices/get_departments') ?>',
                    type: 'POST',
                    data: parameters,
                    dataType: 'json',
                    success: function (data) {
                        jQuery.each(data, function (index, item) {
                            //now you can access properties using dot notation
                            //alert(index.unit);
                            console.log(item.unit);
                            $('#displayoption_departments').append('<li data-id=' + item.d_id + ' id ="d_id">' + item.d_name + '</li>');
                        });
                    },
                    error: function () {
                        alert('There was an error');
                    }
                });
    });
</script>
