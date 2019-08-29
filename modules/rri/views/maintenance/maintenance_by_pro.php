<form class="form-horizontal" role="form" action="<?= site_url('') ?>" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('Maintenance') ?></h3>        
        </div>

        <div class="panel-body"> 
            <!-------------------------------->
            <table id="dt" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" style="text-align: center;vertical-align: middle;">
                <thead>
                    <tr>
                        <th><?= t('No') ?></th>
                        <th style="width: 170px;"><?= t('City-Province') ?></th>
                        <th><?= t('Routine (Grave​l$)') ?></th>
                        <th><?= t('Periodic (Gravel$)') ?></th>
                        <th><?= t('Routine (DBST$)') ?></th>
                        <th><?= t('Periodic (DBST$)') ?></th>   
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $qr_pro = query("SELECT
                                                p.id,
                                                p.province_name,
                                                p.khmer_name,
                                                m.id AS id_,
                                                m.routine_gravel,
                                                m.periodic_gravel,
                                                m.routine_dbst,
                                                m.periodic_dbst
                                        FROM
                                                province AS p
                                        LEFT JOIN y_maintenance_by_pro AS m ON p.id = m.pro_code
                                        ORDER BY
                                                p.province_name ASC ");
                    if ($qr_pro->num_rows() > 0) {
                        $tr = '';
                        $i = 1;
                        foreach ($qr_pro->result() as $row) {
                            $tr .= "<tr style=''>" .
                                    "<td class='no' style='text-align: center;vertical-align: middle;'>" . $i . "</td>" .
                                    "<td style='text-align: left;vertical-align: middle;' class='pro_code' data-id_='" . $row->id_ . "' data-id='" . $row->id . "'>" . $row->province_name . "</td>" .
                                    "<td><input decimal class='form-control routine_gravel' type='text' name='routine_gravel[]' id='routine_gravel' value='" . ($row->routine_gravel - 0 > 0 ? $row->routine_gravel : '') . "' data-toggle='tooltip' data-placement='left' title=''​ placeholder='Routine (Grave​l$)' maxlength='255' /></td>" .
                                    "<td><input decimal class='form-control periodic_gravel' type='text' name='periodic_gravel[]' id='periodic_gravel' value='" . ($row->periodic_gravel - 0 > 0 ? $row->periodic_gravel : '') . "' data-toggle='tooltip' data-placement='left' title=''​ placeholder='Periodic (Gravel$)' maxlength='255' /></td>" .
                                    "<td><input decimal class='form-control routine_dbst' type='text' name='routine_dbst[]' id='routine_dbst' value='" . ($row->routine_dbst - 0 > 0 ? $row->routine_dbst : '') . "' data-toggle='tooltip' data-placement='left' title=''​ placeholder='Routine (DBST$)' maxlength='255' /></td>" .
                                    "<td><input decimal class='form-control periodic_dbst' type='text' name='periodic_dbst[]' id='periodic_dbst' value='" . ($row->periodic_dbst - 0 > 0 ? $row->periodic_dbst : '') . "' data-toggle='tooltip' data-placement='left' title=''​ placeholder='Periodic (DBST$)' maxlength='255' /></td>" .
                                    "</tr>";
                            $i++;
                        }
                        echo $tr;
                    }
                    ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div><!-- end body ------------------->

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg">
                <button data-toggle="tooltip" data-placement="left" title="Print Gravel" id="btn_prt_gravel" name="btn_prt_gravel" type="button" class="btn btn-default"> <?= t('Print Gravel') ?></button>
                <button data-toggle="tooltip" data-placement="left" title="Save" id="btn_save" name="btn_save" type="button" class="btn btn-default"> <?= t('Save') ?></button>
            </div>
        </div>
    </div>
</form>

<div class="dv_prt" id="dv_prt" style="display: none;">
</div>

<style type="text/css">
    th{text-align: center;vertical-align: middle;}
    table.table-hover tbody tr:hover td {background: #EDEFF5;}
</style>

<script type="text/javascript">
    $(function() {
        // save =========================
        $('#btn_save').on('click', function() {
            var datas = [];
            $(".pro_code").each(function(i) {
                var id = $(this).data('id_');
                var pro_code = $(this).data('id');
                var routine_gravel = $(this).parent().find(".routine_gravel").val();
                var periodic_gravel = $(this).parent().find(".periodic_gravel").val();
                var routine_dbst = $(this).parent().find(".routine_dbst").val();
                var periodic_dbst = $(this).parent().find(".periodic_dbst").val();

                datas.push({
                    id: id,
                    pro_code: pro_code,
                    routine_gravel: routine_gravel,
                    periodic_gravel: periodic_gravel,
                    routine_dbst: routine_dbst,
                    periodic_dbst: periodic_dbst
                });
            });
            $.ajax({
                url: '<?= site_url("rri/maintenance/save_data") ?>',
                type: 'post',
                datatype: 'json',
                async: 'false',
                data: {datas: datas},
                success: function(d) {
                    alert(d);

                    // re-qr. ===========================
                    $.ajax({
                        url: '<?= site_url("rri/maintenance/get_data") ?>',
                        type: 'post',
                        datatype: 'json',
                        async: 'false',
                        data: {},
                        success: function(data) {
                            var tr = '';
                            var n_ = 1;
                            if (data.length > 0) {
                                $.each(data, function(i, item) {
                                    n_++;
                                    tr += "<tr>" +
                                            "<td class='no' style='text-align: center;'>" + n_ + "</td>" +
                                            "<td style='text-align: left;' class='pro_code' data-id_='" + item.id_ + "' data-id='" + item.id + "'>" + item.province_name + "</td>" +
                                            "<td><input decimal class='form-control routine_gravel' type='text' name='routine_gravel[]' id='routine_gravel' value='" + (item.routine_gravel - 0 > 0 ? item.routine_gravel : '') + "' data-toggle='tooltip' data-placement='left' title=''​ placeholder='Routine (Grave​l$)' maxlength='255' /></td>" +
                                            "<td><input decimal class='form-control periodic_gravel' type='text' name='periodic_gravel[]' id='periodic_gravel' value='" + (item.periodic_gravel - 0 > 0 ? item.periodic_gravel : '') + "' data-toggle='tooltip' data-placement='left' title=''​ placeholder='Periodic (Gravel$)' maxlength='255' /></td>" +
                                            "<td><input decimal class='form-control routine_dbst' type='text' name='routine_dbst[]' id='routine_dbst' value='" + (item.routine_dbst - 0 > 0 ? item.routine_dbst : '') + "' data-toggle='tooltip' data-placement='left' title=''​ placeholder='Routine (DBST$)' maxlength='255' /></td>" +
                                            "<td><input decimal class='form-control periodic_dbst' type='text' name='periodic_dbst[]' id='periodic_dbst' value='" + (item.periodic_dbst - 0 > 0 ? item.periodic_dbst : '') + "' data-toggle='tooltip' data-placement='left' title=''​ placeholder='Periodic (DBST$)' maxlength='255' /></td>" +
                                            "</tr>";
                                });
                                $('#dt tbody').html(tr);
                            }
                        },
                        error: function() {
                        }
                    });
                    // ============================
                },
                error: function() {

                }
            });
        });

        // print ==========================
        $('#btn_prt_gravel').on('click', function() {
            fn_gravel();
        });

    }); // end ready fun. ==================

    // fn gragel ==========================
    function fn_gravel() {
        $.ajax({
            url: '<?= site_url("rri/maintenance/prt_gravel") ?>',
            type: 'post',
            datatype: 'json',
            async: 'false',
            data: {},
            success: function(data) {
                $('.dv_prt').html(data);

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
                popupWin.document.write('<html><head><title></title></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
                popupWin.print();
                popupWin.close();
            },
            error: function() {

            }
        });
    }

    // list pro. =========================
    /* function lst() {
     var lst_pro = null;
     $.ajax({
     url: '<?= site_url("rri/maintenance/get_opt") ?>',
     type: 'post',
     datatype: 'json',
     async: 'false',
     data: {},
     success: function(data) {
     var opt = '';
     if (data.length > 0) {
     $.each(data, function(i, item) {
     opt += "<option value='" + item.id + "'>" + item.province_name + "</option>";
     });
     }
     lst_pro = $('.pro_code').html(opt);
     },
     error: function() {
     
     }
     });
     return lst_pro;
     } */

    // new row =========================
    /* function new_row() {
     var i = $('.no').length + 1;
     var new_row = "<tr>" +
     "<td class='no' style='text-align: center;'>" + i + "</td>" +
     "<td><select class='form-control opt'></select></td>" +
     "<td><input class='form-control routine_gravel' type='text' name='routine_gravel[]' id='routine_gravel' value='' data-toggle='tooltip' data-placement='left' title=''​ placeholder='' maxlength='255' /></td>" +
     "<td><input class='form-control periodic_gravel' type='text' name='periodic_gravel[]' id='periodic_gravel' value='' data-toggle='tooltip' data-placement='left' title=''​ placeholder='' maxlength='255' /></td>" +
     "<td><input class='form-control routine_dbst' type='text' name='routine_dbst[]' id='routine_dbst' value='' data-toggle='tooltip' data-placement='left' title=''​ placeholder='' maxlength='255' /></td>" +
     "<td><input class='form-control periodic_dbst' type='text' name='periodic_dbst[]' id='periodic_dbst' value='' data-toggle='tooltip' data-placement='left' title=''​ placeholder='' maxlength='255' /></td>" +
     "<td></td>" +
     "</tr>";
     $("#tbl_data tbody").append(new_row);
     } */

</script>
