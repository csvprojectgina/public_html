<?php
// var =====================
$tr = '';
$i = 1;
$ii = 0;

// to. =====================
$to_l = 0;
$to_m = 0;

// t1. =====================
$to_l_t1 = 0;
$to_m_t1 = 0;

// t2. =====================
$to_l_t2 = 0;
$to_m_t2 = 0;

// t3. =====================
$to_l_t3 = 0;
$to_m_t3 = 0;

// t4. =====================
$to_l_t4 = 0;
$to_m_t4 = 0;

// qr. ========================
$qr = query("SELECT
                        p.`no`,
                        p.id,
                        p.province_name,
                        p.khmer_name,
                        m.id,
                        m.pro_code,
                        m.routine_gravel,
                        m.periodic_gravel,
                        m.routine_dbst,
                        m.periodic_dbst
                FROM
                        province AS p
                LEFT JOIN y_maintenance_by_pro AS m ON p.id = m.pro_code                
                ORDER BY
                        p.id ");

if ($qr->num_rows() > 0) {
    foreach ($qr->result() as $row) {
        $ii = year_kh($i++);

        // pro. ===========================
        $qr_p = query("SELECT
                                    SUM(pv.length_pavement) AS to_l
                            FROM
                                    road_info AS r
                            INNER JOIN pavement AS pv ON r.road_id = pv.road_id
                            WHERE
                                    r.pro_id = '{$row->pro_code}'
                            AND pv.type_pavement = 'ក្រួសក្រហម' ")->row();

        // t1. ===========================                        
        $qr_t1 = query("SELECT
                                    SUM(pv.length_pavement) AS to_l_t1
                            FROM
                                    road_info AS r
                            INNER JOIN pavement AS pv ON r.road_id = pv.road_id
                            WHERE
                                    r.pro_id = '{$row->pro_code}'
                            AND r.type = '1'
                            AND pv.type_pavement = 'ក្រួសក្រហម' ")->row();

        // t2. ===========================                        
        $qr_t2 = query("SELECT
                                    SUM(pv.length_pavement) AS to_l_t2
                            FROM
                                    road_info AS r
                            INNER JOIN pavement AS pv ON r.road_id = pv.road_id
                            WHERE
                                    r.pro_id = '{$row->pro_code}'
                            AND r.type = '2'
                            AND pv.type_pavement = 'ក្រួសក្រហម' ")->row();

        // t3. ===========================                        
        $qr_t3 = query("SELECT
                                    SUM(pv.length_pavement) AS to_l_t3
                            FROM
                                    road_info AS r
                            INNER JOIN pavement AS pv ON r.road_id = pv.road_id
                            WHERE
                                    r.pro_id = '{$row->pro_code}'
                            AND r.type = '3'
                            AND pv.type_pavement = 'ក្រួសក្រហម' ")->row();

        // t4. ===========================                        
        $qr_t4 = query("SELECT
                                    SUM(pv.length_pavement) AS to_l_t4
                            FROM
                                    road_info AS r
                            INNER JOIN pavement AS pv ON r.road_id = pv.road_id
                            WHERE
                                    r.pro_id = '{$row->pro_code}'
                            AND r.type = '4'
                            AND pv.type_pavement = 'ក្រួសក្រហម' ")->row();

        $tr .= "<tr>" .
                "<td style='text-align: center;'>" . $ii . "</td>" .
                "<td style='text-align: left;font-family: khmer mef2;'>" . $row->khmer_name . "</td>" .
                // to. =============================
                "<td style='text-align: right;'>" . ($qr_p->to_l - 0 > 0 ? number_format($qr_p->to_l / 1000, 3, ".", ",") : '') . "</td>" .
                "<td style='text-align: right;'>" . ($qr_p->to_l / 1000 * $row->routine_gravel - 0 > 0 ? number_format($qr_p->to_l / 1000 * $row->routine_gravel, 0, ".", ",") : '') . "</td>" .
                // t1. =============================
                "<td style='text-align: right;'>" . ($qr_t1->to_l_t1 - 0 > 0 ? number_format($qr_t1->to_l_t1 / 1000, 3, ".", ",") : '') . "</td>" .
                "<td style='text-align: right;'>" . ($qr_t1->to_l_t1 / 1000 * $row->routine_gravel - 0 > 0 ? number_format($qr_t1->to_l_t1 / 1000 * $row->routine_gravel, 0, ".", ",") : '') . "</td>" .
                // t2. =============================
                "<td style='text-align: right;'>" . ($qr_t2->to_l_t2 - 0 > 0 ? number_format($qr_t2->to_l_t2 / 1000, 3, ".", ",") : '') . "</td>" .
                "<td style='text-align: right;'>" . ($qr_t2->to_l_t2 / 1000 * $row->routine_gravel - 0 > 0 ? number_format($qr_t2->to_l_t2 / 1000 * $row->routine_gravel, 0, ".", ",") : '') . "</td>" .
                // t3. =============================
                "<td style='text-align: right;'>" . ($qr_t3->to_l_t3 - 0 > 0 ? number_format($qr_t3->to_l_t3 / 1000, 3, ".", ",") : '') . "</td>" .
                "<td style='text-align: right;'>" . ($qr_t3->to_l_t3 / 1000 * $row->routine_gravel - 0 > 0 ? number_format($qr_t3->to_l_t3 / 1000 * $row->routine_gravel, 0, ".", ",") : '') . "</td>" .
                // t4. =============================
                "<td style='text-align: right;'>" . ($qr_t4->to_l_t4 - 0 > 0 ? number_format($qr_t4->to_l_t4 / 1000, 3, ".", ",") : '') . "</td>" .
                "<td style='text-align: right;'>" . ($qr_t4->to_l_t4 / 1000 * $row->routine_gravel - 0 > 0 ? number_format($qr_t4->to_l_t4 / 1000 * $row->routine_gravel, 0, ".", ",") : '') . "</td>" .
                "</tr>";

        // to. ===========================
        $to_l += ($qr_p->to_l - 0) / 1000;
        $to_m += $qr_p->to_l / 1000 * $row->routine_gravel;

        // t1. ===========================
        $to_l_t1 += ($qr_t1->to_l_t1 - 0) / 1000;
        $to_m_t1 += $qr_t1->to_l_t1 / 1000 * $row->routine_gravel;

        // t2. ===========================
        $to_l_t2 += ($qr_t2->to_l_t2 - 0) / 1000;
        $to_m_t2 += $qr_t2->to_l_t2 / 1000 * $row->routine_gravel;

        // t3. ===========================
        $to_l_t3 += ($qr_t3->to_l_t3 - 0) / 1000;
        $to_m_t3 += $qr_t3->to_l_t3 / 1000 * $row->routine_gravel;

        // t4. ===========================
        $to_l_t4 += ($qr_t4->to_l_t4 - 0) / 1000;
        $to_m_t4 += $qr_t4->to_l_t4 / 1000 * $row->routine_gravel;
    }
}
?>
<div style="text-align: right;margin-top: 15px;">
    <a href="javascript:void(0)" class="lbl_print_pavement" id="lbl_print_pavement"><img src="<?= base_url('assets/bs/css/images/print.gif') ?>" />​ បោះពុម្ព</a>
</div>

<table align="center" style="font-family: khmer mef2;font-size: 16px;">
    <tr>
        <td align="center">របាយការណ៍ប៉ាន់ស្មានថវិការថែទាំផ្លូវក្រួសក្រហមនៃ រាជធានី-ខេត្ត នីមួយៗ</td>
    </tr>
    <tr>
        <td align="center" style="font-family: khmer mef1;color: blue;">គិតត្រឹមថ្ងៃទី​ <?= day_kh(date('d')) ?> ខែ <?= month_kh_letter() ?> ឆ្នាំ <?= year_kh(date('Y')) ?></td>
    </tr>
</table>

<!---------------------------------->
<div class="dv_data" id="dv_data">
    <table align="center" class="data" border="1" background="blue" cellpadding="0" cellspacing="0" style="width: 100%;font-family: khmer mef1;border-collapse: collapse;border: 2px solid blue;text-align: center;vertical-align: middle;font-size: 12px;">
        <thead class="tt" style="border: 2px solid blue;font-family: khmer mef1;">
            <tr>
                <th rowspan="2">ល.រ</th>
                <th rowspan="2">រាជធានី-ខេត្ត</th>
                <th colspan="2">សរុប</th>
                <th colspan="2">ប្រភេទទី ១</th>
                <th colspan="2">ប្រភេទទី ២</th>
                <th colspan="2">ប្រភេទទី ៣</th>
                <th colspan="2">ប្រភេទទី ៤</th>            
            </tr>
            <tr>
                <th>គ.ម</th>
                <th>ថវិកា (ដុល្លារ)</th>
                <th>គ.ម</th>
                <th>ថវិកា (ដុល្លារ)</th>
                <th>គ.ម</th>
                <th>ថវិកា (ដុល្លារ)</th>
                <th>គ.ម</th>
                <th>ថវិកា (ដុល្លារ)</th>
                <th>គ.ម</th>
                <th>ថវិកា (ដុល្លារ)</th>  
            </tr>
        </thead>
        <tbody>   
            <?= $tr ?>
        </tbody>
        <tfoot> 
            <tr>
                <td colspan="2">សរុបរួម</td>
                <td style="background: #f5f5f5;"><?= number_format($to_l, 3, ".", ",") ?></td>
                <td><?= number_format($to_m, 0, ".", ",") ?></td>
                <td style="background: #f5f5f5;"><?= number_format($to_l_t1, 3, ".", ",") ?></td>
                <td><?= number_format($to_m_t1, 0, ".", ",") ?></td>
                <td style="background: #f5f5f5;"><?= number_format($to_l_t2, 3, ".", ",") ?></td>
                <td><?= number_format($to_m_t2, 0, ".", ",") ?></td>
                <td style="background: #f5f5f5;"><?= number_format($to_l_t3, 3, ".", ",") ?></td>
                <td><?= number_format($to_m_t3, 0, ".", ",") ?></td>
                <td style="background: #f5f5f5;"><?= number_format($to_l_t4, 3, ".", ",") ?></td>
                <td><?= number_format($to_m_t4, 0, ".", ",") ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<div style="text-align: right;margin-top: 15px;">
    <a href="javascript:void(0)" class="lbl_print_pavement" id="lbl_print_pavement"><img src="<?= base_url('assets/bs/css/images/print.gif') ?>" />​ បោះពុម្ព</a>
</div>

<style>
    table.data th{text-align: center;vertical-align: middle;background-color: #CCC;}

    table.data tr:nth-child(even) {background: #f5f5f5}
    table.data tbody td{text-align: right;vertical-align: middle;}    
    table.data tbody tr:hover td{background: #fffccc;}

    table.data tfoot{background-color: #CCC;font-weight: bold;}
</style>

<script type="text/javascript">
    $(function() {

        /* $.ajax({
         url: '<?= site_url('rri/print_pavement/rpt_pave') ?>',
         dataType: 'html',
         type: 'post',
         async: false,
         data: {},
         success: function(d) {
         $('#prt_pavement').html(d);
         },
         error: function() {
         
         }
         }); */

        $(".lbl_print_pavement").on("mouseover", function() {
            $(".lbl_print_pavement").css({
                "background": "#cccccc"
            });
        });

        $(".lbl_print_pavement").on("mouseout", function() {
            $(".lbl_print_pavement").css({
                "background": ""
            });
        });

        // print ============================================================
        $(".lbl_print_pavement").on("click", function() {
            var params = [
                'height=' + screen.height,
                'width=' + screen.width,
                'fullscreen=yes',
                'modal=yes'
            ];
            var divToPrint = document.getElementById('dv_data');
            var popupWin = window.open('', '_blank', params); // var popupWin = window.open('', '_blank', 'width=800,height=600'); // width=800,height=500
            popupWin.moveTo(0, 0);
            popupWin.document.open();
            popupWin.document.write('<html><head><title></title></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.print();
            popupWin.close();
        });

    });
</script>