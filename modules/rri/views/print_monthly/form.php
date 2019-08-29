<?php
// query total ========================================
$q = query("SELECT
                        pr.id,
                        pr.khmer_name,
                        st.total_line,
                        st.total_length,
                        st.total_line_type1,
                        st.total_length_type1,
                        st.total_line_type2,
                        st.total_length_type2,
                        st.total_line_type3,
                        st.total_length_type3,
                        st.total_line_type4,
                        st.total_length_type4
                FROM
                        statistic_data AS st
                INNER JOIN province AS pr ON pr.id = st.pro_code 
                ORDER BY pr.id ");

// var ==============================================
$tr = '';
$i = 1;
$yy = 1000;
$to_l = 0;
// to. =============================================
$to_1 = 0;
$to_2 = 0;
$to_3 = 0;
$to_4 = 0;
$to_5 = 0;
// t1. ==============================================
$to_t1_1 = 0;
$to_t1_2 = 0;
$to_t1_3 = 0;
$to_t1_4 = 0;
$to_t1_5 = 0;
// t2. ===============================================
$to_t2_1 = 0;
$to_t2_2 = 0;
$to_t2_3 = 0;
$to_t2_4 = 0;
$to_t2_5 = 0;
// t3. ===============================================
$to_t3_1 = 0;
$to_t3_2 = 0;
$to_t3_3 = 0;
$to_t3_4 = 0;
$to_t3_5 = 0;
// t4. ===============================================
$to_t4_1 = 0;
$to_t4_2 = 0;
$to_t4_3 = 0;
$to_t4_4 = 0;
$to_t4_5 = 0;

// to. each line ======================================
$to = 0;
$to_t1 = 0;
$to_t2 = 0;
$to_t3 = 0;
$to_t4 = 0;

// to. column percent =================================        
$subto = 0;
$subto_t1 = 0;
$subto_t2 = 0;
$subto_t3 = 0;
$subto_t4 = 0;

// grand total percent ==================================
$g_to_perc = 0;
$g_to_perc_t1 = 0;
$g_to_perc_t2 = 0;
$g_to_perc_t3 = 0;
$g_to_perc_t4 = 0;

// ====================================================
$to_perc = 0;
if ($q->num_rows() > 0) {
    foreach ($q->result() as $row) {
        $ii = year_kh($i++);
        // to. =======================================
        $qr_to = query("SELECT
                                    COUNT(rd.road_id) AS true_to_l,
                                    SUM(rd.length)/1000 AS true_to_ln
                            FROM
                                    road_info AS rd
                            WHERE
                                    rd.pro_id = '{$row->id}' ")->row();

        // t1. ======================================================
        $qr_to_t1 = query("SELECT
                                    COUNT(rd.road_id) AS true_to_l_t1,
                                    SUM(rd.length)/1000 AS true_to_ln_t1
                            FROM
                                    road_info AS rd
                            WHERE
                                    rd.pro_id = '{$row->id}' AND TRIM(rd.type) = '1' ")->row();

        // t2. ======================================================
        $qr_to_t2 = query("SELECT
                                    COUNT(rd.road_id) AS true_to_l_t2,
                                    SUM(rd.length)/1000 AS true_to_ln_t2
                            FROM
                                    road_info AS rd
                            WHERE
                                    rd.pro_id = '{$row->id}' AND TRIM(rd.type) = '2' ")->row();

        // t3. ======================================================
        $qr_to_t3 = query("SELECT
                                    COUNT(rd.road_id) AS true_to_l_t3,
                                    SUM(rd.length)/1000 AS true_to_ln_t3
                            FROM
                                    road_info AS rd
                            WHERE
                                    rd.pro_id = '{$row->id}' AND TRIM(rd.type) = '3' ")->row();

        // t4. ======================================================
        $qr_to_t4 = query("SELECT
                                    COUNT(rd.road_id) AS true_to_l_t4,
                                    SUM(rd.length)/1000 AS true_to_ln_t4
                            FROM
                                    road_info AS rd
                            WHERE
                                    rd.pro_id = '{$row->id}' AND TRIM(rd.type) = '4' ")->row();

        // per. to. ==================================================
        if ($row->total_length - 0 > 0) {
            $to_perc = number_format(($qr_to->true_to_ln - 0) * 100 / ($row->total_length - 0), 2, ".", ",");
        } else {
            $to_perc = '';
        }

        // per. t1. ==================================================
        if ($row->total_length_type1 - 0 > 0) {
            $to_perc_t1 = number_format(($qr_to_t1->true_to_ln_t1 - 0) * 100 / ($row->total_length_type1 - 0), 2, ".", ",");
        } else {
            $to_perc_t1 = '';
        }

        // per. t2. ==================================================
        if ($row->total_length_type2 - 0 > 0) {
            $to_perc_t2 = number_format(($qr_to_t2->true_to_ln_t2 - 0) * 100 / ($row->total_length_type2 - 0), 2, ".", ",");
        } else {
            $to_perc_t2 = '';
        }

        // per. t3. ==================================================
        if ($row->total_length_type3 - 0 > 0) {
            $to_perc_t3 = number_format(($qr_to_t3->true_to_ln_t3 - 0) * 100 / ($row->total_length_type3 - 0), 2, ".", ",");
        } else {
            $to_perc_t3 = '';
        }

        // per. t4. ==================================================
        if ($row->total_length_type4 - 0 > 0) {
            $to_perc_t4 = number_format(($qr_to_t4->true_to_ln_t4 - 0) * 100 / ($row->total_length_type4 - 0), 2, ".", ",");
        } else {
            $to_perc_t4 = '';
        }

        $tr .= "<tr>" .
                // to. ===========================================
                "<td style='font-family: khmer mef1;text-align: center;'>{$ii}</td>" .
                "<td style='border-right: 2px solid blue;text-align: left;font-family: khmer mef2;'>{$row->khmer_name}</td>" .
                "<td>" . ($row->total_line - 0 > 0 ? number_format(($row->total_line - 0), 0, '.', ',') : '') . "</td>" .
                "<td>" . ($row->total_length - 0 > 0 ? number_format(($row->total_length - 0), 3, '.', ',') : '') . "</td>" .
                "<td>" . ($qr_to->true_to_l - 0 > 0 ? number_format(($qr_to->true_to_l - 0), 0, '.', ',') : '') . "</td>" .
                "<td>" . ($qr_to->true_to_ln - 0 > 0 ? number_format(($qr_to->true_to_ln - 0), 3, '.', ',') : '') . "</td>" .
                "<td style='background: #CCC;border-right: 2px solid blue;font-size: 10px;'>" . ($to_perc - 0 > 0 ? $to_perc : '') . "</td>" .
                // t1. ===========================================
                "<td>" . ($row->total_line_type1 - 0 > 0 ? number_format(($row->total_line_type1 - 0), 0, '.', ',') : '') . "</td>" .
                "<td>" . ($row->total_length_type1 - 0 > 0 ? number_format(($row->total_length_type1 - 0), 3, '.', ',') : '') . "</td>" .
                "<td>" . ($qr_to_t1->true_to_l_t1 - 0 > 0 ? number_format(($qr_to_t1->true_to_l_t1 - 0), 0, '.', ',') : '') . "</td>" .
                "<td>" . ($qr_to_t1->true_to_ln_t1 - 0 > 0 ? number_format(($qr_to_t1->true_to_ln_t1 - 0), 3, '.', ',') : '') . "</td>" .
                "<td style='background: #CCC;border-right: 2px solid blue;font-size: 10px;'>" . ($to_perc_t1 - 0 > 0 ? $to_perc_t1 : '') . "</td>" .
                // t2. ===========================================
                "<td>" . ($row->total_line_type2 - 0 > 0 ? number_format(($row->total_line_type2 - 0), 0, '.', ',') : '') . "</td>" .
                "<td>" . ($row->total_length_type2 - 0 > 0 ? number_format(($row->total_length_type2 - 0), 3, '.', ',') : '') . "</td>" .
                "<td>" . ($qr_to_t2->true_to_l_t2 - 0 > 0 ? number_format(($qr_to_t2->true_to_l_t2 - 0), 0, '.', ',') : '') . "</td>" .
                "<td>" . ($qr_to_t2->true_to_ln_t2 - 0 > 0 ? number_format(($qr_to_t2->true_to_ln_t2 - 0), 3, '.', ',') : '') . "</td>" .
                "<td style='background: #CCC;border-right: 2px solid blue;font-size: 10px;'>" . ($to_perc_t2 - 0 > 0 ? $to_perc_t2 : '') . "</td>" .
                // t3. ===========================================
                "<td>" . ($row->total_line_type3 - 0 > 0 ? number_format(($row->total_line_type3 - 0), 0, '.', ',') : '') . "</td>" .
                "<td>" . ($row->total_length_type3 - 0 > 0 ? number_format(($row->total_length_type3 - 0), 3, '.', ',') : '') . "</td>" .
                "<td>" . ($qr_to_t3->true_to_l_t3 - 0 > 0 ? number_format(($qr_to_t3->true_to_l_t3 - 0), 0, '.', ',') : '') . "</td>" .
                "<td>" . ($qr_to_t3->true_to_ln_t3 - 0 > 0 ? number_format(($qr_to_t3->true_to_ln_t3 - 0), 3, '.', ',') : '') . "</td>" .
                "<td style='background: #CCC;border-right: 2px solid blue;font-size: 10px;'>" . ($to_perc_t3 - 0 > 0 ? $to_perc_t3 : '') . "</td>" .
                // t4. ===========================================
                "<td>" . ($row->total_line_type4 - 0 > 0 ? number_format(($row->total_line_type4 - 0), 0, '.', ',') : '') . "</td>" .
                "<td>" . ($row->total_length_type4 - 0 > 0 ? number_format(($row->total_length_type4 - 0), 3, '.', ',') : '') . "</td>" .
                "<td>" . ($qr_to_t4->true_to_l_t4 - 0 > 0 ? number_format(($qr_to_t4->true_to_l_t4 - 0), 0, '.', ',') : '') . "</td>" .
                "<td>" . ($qr_to_t4->true_to_ln_t4 - 0 > 0 ? number_format(($qr_to_t4->true_to_ln_t4 - 0), 3, '.', ',') : '') . "</td>" .
                "<td style='background: #CCC;font-size: 10px;'>" . ($to_perc_t4 - 0 > 0 ? $to_perc_t4 : '') . "</td>" .
                "</tr>";

        // to. =========================================        
        $to_1 += $row->total_line - 0;
        $to_2 += $row->total_length - 0;
        $to_3 += $qr_to->true_to_l - 0;
        $to_4 += $qr_to->true_to_ln - 0;
        $to_5 += $to_perc - 0;

        // t1. =========================================
        $to_t1_1 += $row->total_line_type1 - 0;
        $to_t1_2 += $row->total_length_type1 - 0;
        $to_t1_3 += $qr_to_t1->true_to_l_t1 - 0;
        $to_t1_4 += $qr_to_t1->true_to_ln_t1 - 0;
        $to_t1_5 += $to_perc_t1 - 0;

        // t2. =========================================
        $to_t2_1 += $row->total_line_type2 - 0;
        $to_t2_2 += $row->total_length_type2 - 0;
        $to_t2_3 += $qr_to_t2->true_to_l_t2 - 0;
        $to_t2_4 += $qr_to_t2->true_to_ln_t2 - 0;
        $to_t2_5 += $to_perc_t2 - 0;

        // t3. =========================================
        $to_t3_1 += $row->total_line_type3 - 0;
        $to_t3_2 += $row->total_length_type3 - 0;
        $to_t3_3 += $qr_to_t3->true_to_l_t3 - 0;
        $to_t3_4 += $qr_to_t3->true_to_ln_t3 - 0;
        $to_t3_5 += $to_perc_t3 - 0;

        // t4. =========================================
        $to_t4_1 += $row->total_line_type4 - 0;
        $to_t4_2 += $row->total_length_type4 - 0;
        $to_t4_3 += $qr_to_t4->true_to_l_t4 - 0;
        $to_t4_4 += $qr_to_t4->true_to_ln_t4 - 0;
        $to_t4_5 += $to_perc_t4 - 0;

        // count column percent =========================================        
        $to += ($to_perc - 0 > 0 ? COUNT($to_perc) : '');
        $to_t1 += ($to_perc_t1 - 0 > 0 ? COUNT($to_perc_t1) : '');
        $to_t2 += ($to_perc_t2 - 0 > 0 ? COUNT($to_perc_t2) : '');
        $to_t3 += ($to_perc_t3 - 0 > 0 ? COUNT($to_perc_t3) : '');
        $to_t4 += ($to_perc_t4 - 0 > 0 ? COUNT($to_perc_t4) : '');

        // to. column percent =========================================        
        $subto += $to_perc;
        $subto_t1 += $to_perc_t1;
        $subto_t2 += $to_perc_t2;
        $subto_t3 += $to_perc_t3;
        $subto_t4 += $to_perc_t4;
    }// end loop =================================================
    // grand to. per. ============================================
    $g_to_perc = number_format($subto / ($to - 0 > 0 ? $to : 1), 2);
    $g_to_perc_t1 = number_format($subto_t1 / ($to_t1 - 0 > 0 ? $to_t1 : 1), 2);
    $g_to_perc_t2 = number_format($subto_t2 / ($to_t2 - 0 > 0 ? $to_t2 : 1), 2);
    $g_to_perc_t3 = number_format($subto_t3 / ($to_t3 - 0 > 0 ? $to_t3 : 1), 2);
    $g_to_perc_t4 = number_format($subto_t4 / ($to_t4 - 0 > 0 ? $to_t4 : 1), 2);
}// end if ========================================
?>

<table align="center" style="font-family: khmer mef2;font-size: 14px;">
    <tr>
        <td align="center">តារាង ទិន្នន័យផ្លូវជនបទ​ ដែលបានទទួលពីក្រុមការងារខេត្ត ទូទាំងព្រះរាជាណាចក្រកម្ពុជា</td>
    </tr>
    <tr>
        <td align="center" style="font-family: khmer mef1;color: blue;">គិតត្រឹមថ្ងៃទី​ <?= day_kh(date('d')) ?> ខែ <?= month_kh_letter() ?> ឆ្នាំ <?= year_kh(date('Y')) ?></td>
    </tr>
</table>

<!------------------------------------>
<table align="center" class="data" border="1" background="blue" cellpadding="0" cellspacing="0" style="width: 100%;font-size: 12px;border-collapse: collapse;border: 2px solid blue;vertical-align: middle;">
    <thead style="border: 2px solid blue;">
        <tr style="font-family: khmer mef2;text-align: center;">
            <td rowspan="3">ល.រ</td>
            <td rowspan="3" style="border-right: 2px solid blue;">រាជធានី-ខេត្ត</td>
            <td colspan="5" style="border-right: 2px solid blue;">សរុបរួម</td>
            <td colspan="5" style="border-right: 2px solid blue;">ផ្លូវប្រភេទទី ១</td>
            <td colspan="5" style="border-right: 2px solid blue;">ផ្លូវប្រភេទទី ២</td>
            <td colspan="5" style="border-right: 2px solid blue;">ផ្លូវប្រភេទទី ៣</td>
            <td colspan="5" style="border-right: 2px solid blue;">ផ្លូវប្រភេទទី ៤</td>
        </tr>
        <tr style="font-family: khmer mef1;text-align: center;">
            <td colspan="2">ស្ថិតិសរុប</td>
            <td colspan="3" style="border-right: 2px solid blue;">ស្រង់ទិន្នន័យបាន</td>
            <td colspan="2">ស្ថិតិសរុប</td>
            <td colspan="3" style="border-right: 2px solid blue;">ស្រង់ទិន្នន័យបាន</td>
            <td colspan="2">ស្ថិតិសរុប</td>
            <td colspan="3" style="border-right: 2px solid blue;">ស្រង់ទិន្នន័យបាន</td>
            <td colspan="2">ស្ថិតិសរុប</td>
            <td colspan="3"​ style="border-right: 2px solid blue;">ស្រង់ទិន្នន័យបាន</td>
            <td colspan="2">ស្ថិតិសរុប</td>
            <td colspan="3" style="border-right: 2px solid blue;">ស្រង់ទិន្នន័យបាន</td>
        </tr>
        <tr style="font-family: khmer mef1;text-align: center;">
            <!---------------------------->
            <td>ខ្សែ</td>
            <td>គ.ម</td>	
            <td>ខ្សែ</td>
            <td>គ.ម</td>			
            <td style="border-right: 2px solid blue;">%</td>
            <!---------------------------->
            <td>ខ្សែ</td>
            <td>គ.ម</td>	
            <td>ខ្សែ</td>
            <td>គ.ម</td>			
            <td style="border-right: 2px solid blue;">%</td>
            <!---------------------------->
            <td>ខ្សែ</td>
            <td>គ.ម</td>	
            <td>ខ្សែ</td>
            <td>គ.ម</td>			
            <td style="border-right: 2px solid blue;">%</td>
            <!---------------------------->
            <td>ខ្សែ</td>
            <td>គ.ម</td>	
            <td>ខ្សែ</td>
            <td>គ.ម</td>			
            <td style="border-right: 2px solid blue;">%</td>
            <!---------------------------->
            <td>ខ្សែ</td>
            <td>គ.ម</td>	
            <td>ខ្សែ</td>
            <td>គ.ម</td>			
            <td>%</td>
        </tr>
    </thead>
    <tbody>   
        <?= $tr ?>
    </tbody>
    <tfoot style="text-align: center;border: 2px solid blue;font-weight: bold;"> 
        <tr​>
            <td style="border-right: 2px solid blue;font-family: khmer mef1;" colspan="2">សរុបរួម</td>
            <!-- to. --------------------------------------------->
            <td><?= ($to_1 - 0 > 0 ? (number_format($to_1, 0, ".", ",")) : '') ?></td>
            <td><?= ($to_2 - 0 > 0 ? (number_format($to_2, 3, ".", ",")) : '') ?></td>
            <td><?= ($to_3 - 0 > 0 ? (number_format($to_3, 0, ".", ",")) : '') ?></td>
            <td><?= ($to_4 - 0 > 0 ? (number_format($to_4, 3, ".", ",")) : '') ?></td>
            <td style="border-right: 2px solid blue;font-size: 10px;"><?= ($g_to_perc - 0 > 0 ? $g_to_perc : '') ?></td>
            <!-- t1. --------------------------------------------->
            <td><?= ($to_t1_1 - 0 > 0 ? (number_format($to_t1_1, 0, ".", ",")) : '') ?></td>
            <td><?= ($to_t1_2 - 0 > 0 ? (number_format($to_t1_2, 3, ".", ",")) : '') ?></td>
            <td><?= ($to_t1_3 - 0 > 0 ? (number_format($to_t1_3, 0, ".", ",")) : '') ?></td>
            <td><?= ($to_t1_4 - 0 > 0 ? (number_format($to_t1_4, 3, ".", ",")) : '') ?></td>
            <td style="border-right: 2px solid blue;font-size: 10px;"><?= ($g_to_perc_t1 - 0 > 0 ? $g_to_perc_t1 : '') ?></td>
            <!-- t2. --------------------------------------------->
            <td><?= ($to_t2_1 - 0 > 0 ? (number_format($to_t2_1, 0, ".", ",")) : '') ?></td>
            <td><?= ($to_t2_2 - 0 > 0 ? (number_format($to_t2_2, 3, ".", ",")) : '') ?></td>
            <td><?= ($to_t2_3 - 0 > 0 ? (number_format($to_t2_3, 0, ".", ",")) : '') ?></td>
            <td><?= ($to_t2_4 - 0 > 0 ? (number_format($to_t2_4, 3, ".", ",")) : '') ?></td>
            <td style="border-right: 2px solid blue;font-size: 10px;"><?= ($g_to_perc_t2 - 0 > 0 ? $g_to_perc_t2 : '') ?></td>
            <!-- t3. --------------------------------------------->
            <td><?= ($to_t3_1 - 0 > 0 ? (number_format($to_t3_1, 0, ".", ",")) : '') ?></td>
            <td><?= ($to_t3_2 - 0 > 0 ? (number_format($to_t3_2, 3, ".", ",")) : '') ?></td>
            <td><?= ($to_t3_3 - 0 > 0 ? (number_format($to_t3_3, 0, ".", ",")) : '') ?></td>
            <td><?= ($to_t3_4 - 0 > 0 ? (number_format($to_t3_4, 3, ".", ",")) : '') ?></td>
            <td style="border-right: 2px solid blue;font-size: 10px;"><?= ($g_to_perc_t3 - 0 > 0 ? $g_to_perc_t3 : '') ?></td>
            <!-- t4. --------------------------------------------->
            <td><?= ($to_t4_1 - 0 > 0 ? (number_format($to_t4_1, 0, ".", ",")) : '') ?></td>
            <td><?= ($to_t4_2 - 0 > 0 ? (number_format($to_t4_2, 3, ".", ",")) : '') ?></td>
            <td><?= ($to_t4_3 - 0 > 0 ? (number_format($to_t4_3, 0, ".", ",")) : '') ?></td>
            <td><?= ($to_t4_4 - 0 > 0 ? (number_format($to_t4_4, 3, ".", ",")) : '') ?></td>
            <td style="font-size: 10px;"><?= ($g_to_perc_t4 - 0 > 0 ? $g_to_perc_t4 : '') ?></td>
        </tr>
    </tfoot>
</table>

<style type="text/css">
    table.data tbody tr:nth-child(even) {background-color: #f5f5f5;}
    table.data tbody td{text-align: right;vertical-align: middle;}
    // tr:nth-child(even) {background: #FFF;}    
    thead tr{background-color: #CCC;}  
    table.data tfoot{background-color: #CCC;vertical-align: middle;}
    table.data tbody tr:hover td{background-color: #fffccc;}
    table.data tfoot tr:hover td{background-color: #fffccc;}   
</style>
