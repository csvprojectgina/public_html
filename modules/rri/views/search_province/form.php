<?php
$pro_id = isset($pro_id) ? $pro_id : '';
?>
<meta charset="UTF-8">

<?php
$query = query("SELECT
                                rd.idtemp,
                                rd.first_point_x,
                                rd.first_point_y,
                                rd.last_point_x,
                                rd.last_point_y,
                                rd.length,
                                rd.width,
                                rd.type,
                                rd.file_name
                        FROM
                                road_info AS rd
                        WHERE
                                rd.pro_id = '{$pro_id}'

                        ORDER BY
                                rd.idtemp - 0 ASC ");
$i = 1;
$total_length = 0;
$total_line = 0;
// total length t=======================================
$total_l_t1 = 0;
$total_l_t2 = 0;
$total_l_t3 = 0;
$total_l_t4 = 0;

// total t =======================================
$total_t1 = 0;
$total_t2 = 0;
$total_t3 = 0;
$total_t4 = 0;
$tr = "";
if ($query->num_rows > 0) {
    foreach ($query->result() as $row) {
        $tr .= "<tr​ class='tr_data' style='text-align: center;'>" .
                "<td>" . $i . "</td>" .
                "<td>" . $row->idtemp . "</td>" .
                "<td>" . $row->first_point_x . "</td>" .
                "<td>" . $row->first_point_y . "</td>" .
                "<td>" . $row->last_point_x . "</td>" .
                "<td>" . $row->last_point_y . "</td>" .
                "<td style='text-align: right;'>" . ($row->length - 0 > 0 ? (number_format($row->length, 0, '.', ',')) : '') . "</td>" .
                "<td style='text-align: right;'>" . $row->width . "</td>" .
                "<td>" . $row->type . "</td>" .
                "<td style='text-align: left;'>" . $row->file_name . "</td>" .
                "</tr>";
        $i++;
        $total_length += $row->length;
        $total_line += count($i);
    }

    // length t1==================================================
    $qr_total_l_t1 = query("SELECT
                                        SUM(rd.length) AS total_t1
                                FROM
                                        road_info AS rd
                                WHERE
                                        rd.pro_id = '{$pro_id}'
                                AND TRIM(rd.type) = '1' ");
    if ($qr_total_l_t1->num_rows > 0) {
        foreach ($qr_total_l_t1->result() as $row1) {
            $total_l_t1 += $row1->total_t1;
        }
    }

    // total t1==================================================
    $qr_total_t1 = query("SELECT
                                    COUNT(rd.road_id) AS to_t1
                            FROM
                                    road_info AS rd
                            WHERE
                                    rd.pro_id = '{$pro_id}'
                            AND TRIM(rd.type) = '1' ");
    if ($qr_total_t1->num_rows > 0) {
        foreach ($qr_total_t1->result() as $row11) {
            $total_t1 += $row11->to_t1;
        }
    }

    // length t2==================================================
    $qr_total_l_t2 = query("SELECT
                                        SUM(rd.length) AS total_t2
                                FROM
                                        road_info AS rd
                                WHERE
                                        rd.pro_id = '{$pro_id}'
                                AND TRIM(rd.type) = '2' ");
    if ($qr_total_l_t2->num_rows > 0) {
        foreach ($qr_total_l_t2->result() as $row2) {
            $total_l_t2 += $row2->total_t2;
        }
    }

    // total t2==================================================
    $qr_total_t2 = query("SELECT
                                    COUNT(rd.road_id) AS to_t2
                            FROM
                                    road_info AS rd
                            WHERE
                                    rd.pro_id = '{$pro_id}'
                            AND TRIM(rd.type) = '2' ");
    if ($qr_total_t2->num_rows > 0) {
        foreach ($qr_total_t2->result() as $row22) {
            $total_t2 += $row22->to_t2;
        }
    }

    // length t3==================================================
    $qr_total_l_t3 = query("SELECT
                                        SUM(rd.length) AS total_t3
                                FROM
                                        road_info AS rd
                                WHERE
                                        rd.pro_id = '{$pro_id}'
                                AND TRIM(rd.type) = '3' ");
    if ($qr_total_l_t3->num_rows > 0) {
        foreach ($qr_total_l_t3->result() as $row3) {
            $total_l_t3 += $row3->total_t3;
        }
    }

    // total t3==================================================
    $qr_total_t3 = query("SELECT
                                    COUNT(rd.road_id) AS to_t3
                            FROM
                                    road_info AS rd
                            WHERE
                                    rd.pro_id = '{$pro_id}'
                            AND TRIM(rd.type) = '3' ");
    if ($qr_total_t3->num_rows > 0) {
        foreach ($qr_total_t3->result() as $row33) {
            $total_t3 += $row33->to_t3;
        }
    }

    // length t4==================================================
    $qr_total_l_t4 = query("SELECT
                                        SUM(rd.length) AS total_t4
                                FROM
                                        road_info AS rd
                                WHERE
                                        rd.pro_id = '{$pro_id}'
                                AND TRIM(rd.type) = '4' ");
    if ($qr_total_l_t4->num_rows > 0) {
        foreach ($qr_total_l_t4->result() as $row4) {
            $total_l_t4 += $row4->total_t4;
        }
    }

    // total t4==================================================
    $qr_total_t4 = query("SELECT
                                    COUNT(rd.road_id) AS to_t4
                            FROM
                                    road_info AS rd
                            WHERE
                                    rd.pro_id = '{$pro_id}'
                            AND TRIM(rd.type) = '4' ");
    if ($qr_total_t4->num_rows > 0) {
        foreach ($qr_total_t4->result() as $row44) {
            $total_t4 += $row44->to_t4;
        }
    }
    ?>

    <?php
    // =======================================================
    $q_pro_khmer = query("SELECT
                                        pr.id,
                                        pr.khmer_name
                                FROM
                                        province AS pr
                                WHERE
                                        pr.id = '{$pro_id}' ")->row();
    $str_pro_khmer = "";
    if (isset($q_pro_khmer->id)) {
        if ($q_pro_khmer->id == '19') {
            $str_pro_khmer .= 'រាជធានី ' . $q_pro_khmer->khmer_name;
        } else {
            $str_pro_khmer .= 'ខេត្ត ' . $q_pro_khmer->khmer_name;
        }
    }
    ?>
    <table align="center">
        <tr>
            <td>
                <img width="80" height="80" src="<?= base_url('assets/bs/css/images/logo_rpt.gif') ?>" />   
            </td>
        </tr>
        <tr>
            <td>
                <span style="font-family: khmer mef2;">តារាងព័ត៌មានខ្សែផ្លូវតាមសន្ទទស្សន៍សម្រាប់<?= $str_pro_khmer ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <span style="font-family: khmer mef1;">គិតត្រឹមថ្ងៃទី​ <?= day_kh(date('d')) ?> ខែ <?= month_kh_letter() ?> ឆ្នាំ <?= year_kh(date('Y')) ?></span>
            </td>
        </tr>
    </table>

    <!------------------------------------------->
    <table width="100%" class="data" cellpadding="0" cellspacing="0" align="center" border="2px" bordercolor="blue" style="font-family: khmer mef1;border-collapse: collapse;border: 2px solid blue;">
        <thead>
            <tr>
                <th rowspan="2">លរ</th>
                <th rowspan="2">លរ. ឯកសារ</th>
                <th colspan="2">និយាមកាចាប់ផ្តើម</th>
                <th colspan="2">និយាមកាបញ្ចប់</th>                 
                <th rowspan="2">ប្រវែងផ្លូវ (ម)</th>
                <th rowspan="2">ទទឹង (ម)</th>
                <th rowspan="2">ប្រភេទ</th>
                <th rowspan="2">ឈ្មោះឯកសារ</th>
            </tr>
            <tr style="vertical-align: middle;">
                <th>x</th>
                <th>y</th>
                <th>x</th>
                <th>y</th>
            </tr>
        </thead>
        <tbody>
            <?= $tr ?>
        </tbody>
        <tfoot>
            <tr style="border-top: 2px solid blue;">
                <td rowspan="10" colspan="1" style="text-align: center;font-weight: bold;">សរុបរួម</td>
                <!-- total line ------------------------------------------------>
                <td colspan="2">ចំនួនខ្សែ</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><?= ($total_line - 0 > 0 ? (number_format($total_line, 0, '.', ',')) : '') ?></td>
                <td rowspan="5" colspan="3"></td>
                <td rowspan="10" colspan="2"></td>
            </tr>
            <!-- total t1 ------------------------------------------------>
            <tr>
                <td colspan="2">ចំនួនខ្សែប្រភេទទី ១</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><?= ($total_t1 - 0 > 0 ? (number_format($total_t1, 0, '.', ',')) : '') ?></td>
            </tr>
            <!-- total t2 ------------------------------------------------>
            <tr>
                <td colspan="2">ចំនួនខ្សែប្រភេទទី ២</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><?= ($total_t2 - 0 > 0 ? (number_format($total_t2, 0, '.', ',')) : '') ?></td>
            </tr>
            <!-- total t3 ------------------------------------------------>
            <tr>
                <td colspan="2">ចំនួនខ្សែប្រភេទទី ៣</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><?= ($total_t3 - 0 > 0 ? (number_format($total_t3, 0, '.', ',')) : '') ?></td>
            </tr>
            <!-- total t4 ------------------------------------------------>
            <tr>
                <td colspan="2">ចំនួនខ្សែប្រភេទទី ៤</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><?= ($total_t4 - 0 > 0 ? (number_format($total_t4, 0, '.', ',')) : '') ?></td>
            </tr>
            <!-- total length ------------------------------------------------>
            <tr>
                <td colspan="2">ប្រវែងខ្សែ (ម)</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><?= ($total_length - 0 > 0 ? (number_format($total_length, 0, '.', ',')) : '') ?></td>
                <td colspan="2">ប្រវែងខ្សែ (គ.ម)</td>
                <td colspan="1" style="text-align: center;font-weight: bold;"><?= ($total_length - 0 > 0 ? (number_format($total_length / 1000, 3, '.', ',')) : '') ?></td>
            </tr>
            <!-- total length t1 ---------------------------------------------->
            <tr>
                <td colspan="2">ប្រវែងប្រភេទទី ១ (ម)</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><?= ($total_l_t1 - 0 > 0 ? (number_format($total_l_t1, 0, '.', ',')) : '') ?></td>
                <td colspan="2">ប្រវែងប្រភេទទី ១ (គ.ម)</td>
                <td colspan="1" style="text-align: center;font-weight: bold;"><?= ($total_l_t1 - 0 > 0 ? (number_format($total_l_t1 / 1000, 3, '.', ',')) : '') ?></td>
            </tr>
            <!-- total length t2 ---------------------------------------------->
            <tr>
                <td colspan="2">ប្រវែងប្រភេទទី ២ (ម)</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><?= ($total_l_t2 - 0 > 0 ? (number_format($total_l_t2, 0, '.', ',')) : '') ?></td>
                <td colspan="2">ប្រវែងប្រភេទទី ២ (គ.ម)</td>
                <td colspan="1" style="text-align: center;font-weight: bold;"><?= ($total_l_t2 - 0 > 0 ? (number_format($total_l_t2 / 1000, 3, '.', ',')) : '') ?></td>
            </tr>
            <!-- total length t3 ---------------------------------------------->
            <tr>
                <td colspan="2">ប្រវែងប្រភេទទី ៣ (ម)</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><?= ($total_l_t3 - 0 > 0 ? (number_format($total_l_t3, 0, '.', ',')) : '') ?></td>
                <td colspan="2">ប្រវែងប្រភេទទី ៣ (គ.ម)</td>
                <td colspan="1" style="text-align: center;font-weight: bold;"><?= ($total_l_t3 - 0 > 0 ? (number_format($total_l_t3 / 1000, 3, '.', ',')) : '') ?></td>
            </tr> 
            <!-- total length t4 ---------------------------------------------->
            <tr​​>
                <td colspan="2">ប្រវែងប្រភេទទី ៤ (ម)</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><?= ($total_l_t4 - 0 > 0 ? (number_format($total_l_t4, 0, '.', ',')) : '') ?></td>
                <td colspan="2">ប្រវែងប្រភេទទី ៤ (គ.ម)</td>
                <td colspan="1" style="text-align: center;font-weight: bold;"><?= ($total_l_t4 - 0 > 0 ? (number_format($total_l_t4 / 1000, 3, '.', ',')) : '') ?></td>
            </tr>          
        </tfoot>
    </table> 
<?php } else {
    ?>
    <div class="alert alert-danger" style="font-family: khmer-mef1;font-size: 16px;">
        អត់មានទិន្នន័យ !
    </div>
<?php }
?>

<style type="text/css">
    table.data tbody tr:nth-child(odd) {background-color: #f5f5f5;}
    tbody td{text-align: center;vertical-align: middle;}
    // tr:nth-child(even) {background: #FFF;}    
    th{text-align: center;vertical-align: middle;background-color: #ccc;}  
    thead tr{border: 2px solid blue;}  
    table.data tfoot{background-color: #f5f5f5;vertical-align: middle;}
    table.data tbody tr:hover {background-color: #fffccc;}
    table.data tfoot tr:hover {background-color: #fffccc;}
</style>
