<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ <?= t('ស្វែងរកព័ត៌មានខ្សែផ្លូវ') ?><span id="my_pro"></span></h3>
        </div>
        <!--------------------------------------->
        <div class="panel-body">  
            <div class = "form-group">
                <label for = "pro_id" class = "col-sm-2 control-label"><?= t('រាជធានី-ខេត្ត') ?></label>
                <div class="col-sm-10">
                    <select data-toggle="tooltip" data-placement="left" title="រាជធានី-ខេត្ត (ឧ.​ រាជធានីភ្នំពេញ...)" validate_act class="form-control"  id="pro_id" placeholder="" name="pro_id">
                        <?php
                        // con. ================
                        $sWhere = "";
                        $pr_code = $this->session->userdata('pr_code');
                        if ($pr_code == "") {
                            $sWhere .= "WHERE 1=1 ";
                        } else {
                            $sWhere .= "WHERE pr.id IN (" . $pr_code . ") ";
                        }
                        echo getoption("SELECT
                                                    pr.khmer_name,
                                                    pr.id
                                            FROM
                                                    province AS pr
                                            {$sWhere} ", "id", "khmer_name", set_value('pro_id', isset($row->pro_id) ? $row->pro_id : ''), true);
                        ?>
                    </select>
                    <button id="btn_search" type="button" class="btn btn-default glyphicon glyphicon-search"> <?= t('ស្វែងរក') ?></button>
                    <!--<button id="btn_link_map" type="button" class="btn btn-default glyphicon"> <?= t('ភ្ជាប់ទៅផែនទី') ?></button>-->
                </div>
            </div>

            <!-- dis. ---------------->
            <div style="margin-bottom: 5px;">
                <select id="s_dis">
                    <option>15</option>
                    <option>50</option>
                    <option>100</option>
                    <option>500</option>
                    <option>1000</option>   
                </select><b><?= t('កំណត់ត្រាក្នុងមួយទំព័រ') ?></b>
            </div>
            <table style="text-align: center;vertical-align: middle;" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                <thead>
                    <tr>
                        <!--<th><?= t('ល.រ') ?></th>-->
                        <th><?= t('ល.រ ឯកសារ') ?></th>
                        <th><?= t('លេខ​ផ្លូវ') ?></th>
                        <th><?= t('ឈ្មោះ​ផ្លូវ') ?></th>
                        <th><?= t('ប្រភេទ​ផ្លូវ') ?></th>
                        <th><?= t('ប្រវែង​ផ្លូវ') ?></th>
                        <th><?= t('ទទឹង​ផ្លូវ') ?></th>
                        <th style="text-align: center; width:120px;"><a href="javascript:void(0)"> <?= t('') ?></a></th>            
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

        </div><!-- end body ------------>          
    </div>
</form>

<style>
    .table-hover tbody tr:hover td {background: #EDEFF5;}
    th{text-align: center;}
</style>

<script type="text/javascript">
    $(function() {

        // search =================
        $("#btn_search").on("click", function() {
            var xtotal_display = $('#s_dis').val() - 0;
            var pro_id = $('#pro_id').val() - 0;
            if (pro_id > 0) {
                grid(1, xtotal_display);
            } else {
                alert('សូមបញ្ចូលតំលៃ!');
                $('#pro_id').focus();
            }
        });

        // page =================
        $('body').delegate('.a-pagination', 'click', function() {
            var xtotal_display = $('#s_dis').val() - 0;
            var currentpage = $(this).data('currentpage');
            grid(currentpage, xtotal_display);
        });

        // display ===============
        $('body').delegate("#s_dis", "change", function(e) {
            var xtotal_display = $('#s_dis').val() - 0;
            var pro_id = $('#pro_id').val() - 0;
            if (pro_id > 0) {
                grid(1, xtotal_display);
            } else {
                alert('សូមបញ្ចូលតំលៃ!');
                $('#pro_id').focus();
            }
        });

        // link map by province =========
        $('#btn_link_map').on('click', function() {
            var pro_id = $('#pro_id').val();
            if (pro_id - 0 > 0) {
                window.location = '<?= site_url('rri/search_province/link_map_province') ?>/' + encodeURIComponent(pro_id);
            } else {
                alert('សូមជ្រើសរើស រាជធានី-ខេត្ត !');
            }
        });

        // edit =====================
        $("body").delegate(".editor", "click", function(e) {
            var id = $(this).data('id');
            var eid = (id);
            window.location = '<?= site_url('rri/import_track/edit') ?>/' + encodeURIComponent(eid);
        });

    });// end ready =============

    // gr =======================
    function grid(current_page, total_display) {
        var limit = total_display - 0;
        var offset = (current_page - 1) * total_display;
        var pro_id = $('#pro_id').val();

        $.ajax({
            url: '<?= site_url('rri/import_track/search_by_pro') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {offset: offset, limit: limit, pro_id: pro_id},
            success: function(data) {
                var total_page = data.total_page;
                var records = data.res;
                var total_record = data.total_record;
                var tr = '';
                var i = 0;

                if (records.length > 0) {
                    $.each(records, function(i, item) {
                        i++;
                        tr += '<tr>' +
                                // '<td>' + i + '</td>' +
                                '<td>' + item.idtemp + '</td>' +
                                '<td style="text-align: left;">' + item.road_number + '</td>' +
                                '<td style="text-align: left;">' + item.road_name + '</td>' +
                                '<td>' + item.type + '</td>' +
                                '<td>' + (item.length - 0 > 0 ? item.length : '') + '</td>' +
                                '<td>' + (item.width - 0 > 0 ? item.width : '') + '</td>' +
                                '<td><a href="javascript:void(0)" class="editor" data-id=' + item.road_id + '>បញ្ចូល Track</a></td>' +
                                '</tr>';
                    });
                    $('#example tbody').html(tr);
                    $('#disp').html('បង្ហាញទិន្នន័យ ' + (offset + 1) + '-' + (offset + total_display) + ' នៃទិន្នន័យ ' + total_record);

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
                    pagination += '<li><a class="a-pagination" href="javascript:void(0)"  data-currentpage="' + total_page + '">&raquo;</a></li>';

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
            error: function() {

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
                success: function(d) {
                    var str_pro = '';
                    if (d.id == '19') {
                        str_pro += ': រាជធានី​ ' + d.khmer_name;
                    } else {
                        str_pro += ': ខេត្ត ' + d.khmer_name;
                    }
                    $('#my_pro').html(str_pro);
                },
                error: function() {

                }
            });
        } else {
            $('#my_pro').html("");
        }
    }
</script>