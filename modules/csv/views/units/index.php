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





</style>
<hr><hr>


<div class="tab-content ">
    <div class="tab-pane active" id="1">
        <form class="form-horizontal" action="" role="form" method="post">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                        <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ --><?= t('ពត័មានអង្គភាពទូទៅ') ?></h3>
<!-- <button style="float: right; margin: -25px 0 0 0;" data-toggle="tooltip" data-placement="right" title="" type="submit" id="btn_print" class="btn btn-default" class="btn btn-default glyphicon glyphicon-file" id="btn_retires" type="submit"><?= t('រៀបចំបញ្ជីមន្ត្រីរាជការជា​PDF') ?></button> -->
                        </div>
<!--                        <div class="col-lg-6 col-sm-6 text-right">
                            <button class="btn btn-secondary btn-md"  data-toggle="modal" data-target="#addModal"><span class="glyphicon glyphicon-plus"> </span> បង្កើតអង្គភាព</button>
                        </div>-->
                    </div>

                </div>

                <div class="panel-body">
                    <div style="margin: -10px 0 40px 0;vertical-align: middle;">
                        <span style="float: left;margin: 5px 0 0 0;">
                            <select id="s_dis" style="height: 30px;"></select>
                            <label for="s_dis"><?= t('កំណត់ត្រាក្នុងមួយទំព័រ') ?></label>
                        </span>
                        <span style="float: right;">
                            <label for="search"><?= t('ស្វែងរកព័ត៌មានមន្ត្រី') ?></label>
                            <input type="text" id="search" style="height: 30px;border-radius: 4px;line-height: 4px;" />
                        </span>
                    </div>
                    <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-hover" id="my_gr">
                        <thead>
                            <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
                                <th style="text-align: left;width:70%;" ><?= t('អង្គភាព') ?></th>
                                <th style="text-align: center;"><?= t('សកម្មភាព') ?></th>
                                <!-- <th style="text-align: center;"><?= t('អង្គភាព') ?></th>  -->
        <!--                        <th style="text-align: center;"><?= t('លេខមន្ត្រីអង្គភាព') ?></th>                    -->
                               <!--  <th style="text-align: center;width: 10%;"><a href="<?= site_url('csv/csv_info/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូលថ្មី') ?></a></th>             -->

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
    <div class="tab-pane" id="2">
        <div class="panel-body  text-right">
            <div class="col-xs-4 col-xs-offset-5">
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">Filter by</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li class="text-left"><a href="#contains">Contains</a></li>
                            <li class="text-left"><a href="#its_equal">It's equal</a></li>
                            <li class="text-left"><a href="#greather_than">Greather than ></a></li>
                            <li class="text-left"><a href="#less_than">Less than < </a></li>
                            <li class="divider"></li>
                            <li class="text-left"><a href="#all">Anything</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search term...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </div>

            <div class="btn-group btn-group-lg col-xs-4 col-xs-offset-8">
                <form action="<?= site_url('csv/Csv_report/retires_pdf') ?>" method="post" role="form" style="height: 1px">
                    <input type="hidden" name="id_pdf" id="id_pdf" class="id_pdf" value="<?= @$id ?>" />
                    <button style="float: right; margin: -32px 0 0 0;" data-toggle="tooltip" data-placement="right" title=""  class="btn btn-default glyphicon glyphicon-file" id="btn_retires" type="submit"><?= t('រៀបចំបញ្ជីមន្ត្រីរាជការជា​PDF') ?></button>
                </form>
            </div>
        </div>
        <form class="form-horizontal" action="" role="form" method="post">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ --><?= t('ស្វែងរកតាមព័ត៌មានមន្ត្រី') ?></h3>
                        <!-- <button style="float: right; margin: -25px 0 0 0;" data-toggle="tooltip" data-placement="right" title="" type="submit" id="btn_print" class="btn btn-default" class="btn btn-default glyphicon glyphicon-file" id="btn_retires" type="submit"><?= t('រៀបចំបញ្ជីមន្ត្រីរាជការជា​PDF') ?></button> -->

                </div>

                <div class="panel-body">
                    <div style="margin: -10px 0 40px 0;vertical-align: middle;">
                        <span style="float: left;margin: 5px 0 0 0;">
                            <select id="s_dis1" style="height: 30px;"></select>
                            <label for="s_dis"><?= t('កំណត់ត្រាក្នុងមួយទំព័រ') ?></label>
                        </span>
                        <span style="float: right;">
                            <label for="search"><?= t('ស្វែងរកព័ត៌មានមន្ត្រី') ?></label>
                            <input type="text" id="search" style="height: 30px;border-radius: 4px;line-height: 4px;" />
                        </span>
                    </div>
                    <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-hover" id="my_gr">
                        <thead>
                            <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
                                <th style="text-align: center;"><?= t('អត្តលេខមន្ត្រី') ?></th>
                                <th style="text-align: center;"><?= t('គោត្តនាម') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    <table cellpadding="0" cellspacing="0" style="width: 100%;vertical-align: middle;">
                        <tr>
                            <td style="text-align: left;"><span id="disp1"></span></td>
                            <td style="text-align: right;"><span><ul class="pagination" id="pagination-grid" style="margin-top: 5px;"></ul></span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-plus"> </span> បញ្ជូលអង្គភាពថ្មី</h4>
                </div>
                <div class="modal-body">
                    <div class="bs-example">
                        <form  class="form-horizontal f_save" role="form" method="post" id="f_save" >
                            <div class="form-group">
                                <label for="inputEmail">បញ្ជូលអង្គភាព</label>
                                <input type="text" class="form-control" name="unit" id="inputEmail" placeholder="បញ្ជូលអង្គភាព" value="">
                            </div>

                            <!-- <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"> </span> បិត</button>
                              <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-save"> </span> រក្សាទុក</button>
                            </div> -->
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                </div>
                                <div class="col-md-6 text-right  col-sm-6" style="padding:0px;">
                                    <div class="btn-group  btn-group-lg">
                                        <button class="btn btn-default glyphicon glyphicon-save" id="btnsave" type="submit">រក្សាទុក</button>
                                        <button type="button" class="btn btn-default glyphicon glyphicon-arrow-left" data-dismiss="modal" id="back"> </button>
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
                url: "<?= site_url('csv/csv_units/insert_unit') ?>",
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
            var tr = $(this).parent().parent();
            if (id > 0) {
                if (confirm('តើអ្នកពិតជាលុយ?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_units/delete') ?>',
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
                window.location = "<?= site_url('csv/csv_units/edit') ?>/" + id;
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
            url: '<?= site_url('csv/csv_units/load') ?>',
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
                var total_record = data.total_record;
                var tr = "";
                if (record.length > 0) {
                    $.each(record, function (i, row) {
                        // i++;
                        tr += "<tr data-id='" + row.id + "'class='editor' target='_parent' >" +
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
