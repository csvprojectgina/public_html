<?php
// =======================================================
$total_t1 = 0;
$total_t2 = 0;
$total_t3 = 0;
$total_t4 = 0;

// =======================================================
$total_l_t1 = 0;
$total_l_t2 = 0;
$total_l_t3 = 0;
$total_l_t4 = 0;
// total t1================================================
$qr_total_t1 = query("SELECT
                                COUNT(rd.road_id) AS total_t1
                        FROM
                                road_info AS rd
                        WHERE
                                TRIM(rd.type) = '1' ");
if ($qr_total_t1->num_rows() > 0) {
    foreach ($qr_total_t1->result() as $row1) {
        $total_t1 += $row1->total_t1;
    }
}

// total t2===============================================
$qr_total_t2 = query("SELECT
                                COUNT(rd.road_id) AS total_t2
                        FROM
                                road_info AS rd
                        WHERE
                                TRIM(rd.type) = '2' ");
if ($qr_total_t2->num_rows() > 0) {
    foreach ($qr_total_t2->result() as $row2) {
        $total_t2 += $row2->total_t2;
    }
}

// total t3===================================================
$qr_total_t3 = query("SELECT
                                COUNT(rd.road_id) AS total_t3
                        FROM
                                road_info AS rd
                        WHERE
                                TRIM(rd.type) = '3' ");
if ($qr_total_t3->num_rows() > 0) {
    foreach ($qr_total_t3->result() as $row3) {
        $total_t3 += $row3->total_t3;
    }
}

// total t4 ===================================================
$qr_total_t4 = query("SELECT
                                COUNT(rd.road_id) AS total_t4
                        FROM
                                road_info AS rd
                        WHERE
                                TRIM(rd.type) = '4' ");
if ($qr_total_t4->num_rows() > 0) {
    foreach ($qr_total_t4->result() as $row4) {
        $total_t4 += $row4->total_t4;
    }
}

// total lenght t1 ===================================================
$qr_total_l_t1 = query("SELECT
                                    SUM(rd.road_id) AS total_l_t1
                            FROM
                                    road_info AS rd
                            WHERE
                                    TRIM(rd.type) = '1' ");
if ($qr_total_l_t1->num_rows() > 0) {
    foreach ($qr_total_l_t1->result() as $row11) {
        $total_l_t1 += $row11->total_l_t1;
    }
}

// total lenght t2 ==========================
$qr_total_l_t2 = query("SELECT
                                    SUM(rd.road_id) AS total_l_t2
                            FROM
                                    road_info AS rd
                            WHERE
                                    TRIM(rd.type) = '2' ");
if ($qr_total_l_t2->num_rows() > 0) {
    foreach ($qr_total_l_t2->result() as $row22) {
        $total_l_t2 += $row22->total_l_t2;
    }
}

// total lenght t3 ========================
$qr_total_l_t3 = query("SELECT
                                    SUM(rd.road_id) AS total_l_t3
                            FROM
                                    road_info AS rd
                            WHERE
                                    TRIM(rd.type) = '3' ");
if ($qr_total_l_t3->num_rows() > 0) {
    foreach ($qr_total_l_t3->result() as $row33) {
        $total_l_t3 += $row33->total_l_t3;
    }
}

// total lenght t4 =======================
$qr_total_l_t4 = query("SELECT
                                    SUM(rd.road_id) AS total_l_t4
                            FROM
                                    road_info AS rd
                            WHERE
                                    TRIM(rd.type) = '4' ");
if ($qr_total_l_t4->num_rows() > 0) {
    foreach ($qr_total_l_t4->result() as $row44) {
        $total_l_t4 += $row44->total_l_t4;
    }
}

// =====================================
$g_to1 = $total_t1 + $total_t2 + $total_t3 + $total_t4;
$g_to2 = $total_l_t1 + $total_l_t2 + $total_l_t3 + $total_l_t4;
$g_to3 = ($total_l_t1 + $total_l_t2 + $total_l_t3 + $total_l_t4);
?>

<table align="center">
    <tr>
        <td style="text-align: center;">
            <img width="70" height="70" src="<?= base_url('assets/bs/css/images/logo_rpt.gif') ?>" />
        </td>
    </tr>                    
    <tr>
        <td style="font-family: khmer mef2;text-align: center;">
            របាយការណ៍សង្ខេបព័ត៌មានខ្សែផ្លូវតាមប្រភេទ
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <span style="font-family: khmer mef1;">គិតត្រឹមថ្ងៃទី​ <?= day_kh(date('d')) ?> ខែ <?= month_kh_letter() ?> ឆ្នាំ <?= year_kh(date('Y')) ?></span>
        </td>
    </tr>
</table>

<!-- tbl. -------------------------------------------------->
<table align="center" class="data" border="1" bordercolor="blue" style="font-family: khmer mef1;font-size: 16px;text-align: right;vertical-align: middle;border-collapse: collapse;border: 2px solid blue;">
    <thead style="font-family: khmer mef2;text-align: center;border-bottom: 2px solid blue;">
        <tr>
            <td>ល.រ</td>
            <td>ប្រភេទផ្លូវ</td>
            <td>សរុបចំនួនខ្សែ</td>
            <td>សរុបប្រវែង (ម)</td>
            <td>សរុបប្រវែង (គ.ម)</td>
        </tr>
    </thead>
    <tbody>
        <!-- 1 ----------------------------------->
        <tr>
            <td style="text-align: center;">១</td>
            <td style="text-align: center;">ប្រភេទទី​ ១</td>
            <td><?= ($total_t1 - 0 > 0 ? number_format($total_t1, 0, ".", ",") : '') ?></td>
            <td><?= ($total_l_t1 - 0 > 0 ? number_format($total_l_t1, 3, ".", ",") : '') ?></td>
            <td><?= (($total_l_t1 - 0) > 0 ? number_format($total_l_t1 / 1000, 3, ".", ",") : '') ?></td>
        </tr>
        <!-- 2 ----------------------------------->
        <tr>
            <td style="text-align: center;">២</td>
            <td style="text-align: center;">ប្រភេទទី​ ២</td>
            <td><?= ($total_t2 - 0 > 0 ? number_format($total_t2, 0, ".", ",") : '') ?></td>
            <td><?= ($total_l_t2 - 0 > 0 ? number_format($total_l_t2, 3, ".", ",") : '') ?></td>
            <td><?= (($total_l_t2 - 0) > 0 ? number_format($total_l_t2 / 1000, 3, ".", ",") : '') ?></td>
        </tr>
        <!-- 3 ----------------------------------->
        <tr>
            <td style="text-align: center;">៣</td>
            <td style="text-align: center;">ប្រភេទទី​ ៣</td>
            <td><?= ($total_t3 - 0 > 0 ? number_format($total_t3, 0, ".", ",") : '') ?></td>
            <td><?= ($total_l_t3 - 0 > 0 ? number_format($total_l_t3, 3, ".", ",") : '') ?></td>
            <td><?= (($total_l_t3 - 0) > 0 ? number_format($total_l_t3 / 1000, 3, ".", ",") : '') ?></td>
        </tr>
        <!-- 4 ----------------------------------->
        <tr>
            <td style="text-align: center;">៤</td>
            <td style="text-align: center;">ប្រភេទទី​ ៤</td>
            <td><?= ($total_t4 - 0 > 0 ? number_format($total_t4, 0, ".", ",") : '') ?></td>
            <td><?= ($total_l_t4 - 0 > 0 ? number_format($total_l_t4, 3, ".", ",") : '') ?></td>
            <td><?= (($total_l_t4 - 0) > 0 ? number_format($total_l_t4 / 1000, 3, ".", ",") : '') ?></td>
        </tr>         
    </tbody>
    <tfoot style="font-weight: bold;text-align: center;border-top: 2px solid blue;">
        <tr>
            <td colspan="2">សរុបរួម</td>
            <td><?= ($g_to1 - 0 > 0 ? number_format($g_to1, 0, ".", ",") : '') ?></td>
            <td><?= ($g_to2 - 0 > 0 ? number_format($g_to2, 3, ".", ",") : '') ?></td>
            <td><?= ($g_to3 - 0 > 0 ? number_format($g_to3 / 1000, 3, ".", ",") : '') ?></td>
        </tr>
    </tfoot>
</table>

<!-- css -----------------------------------------------> 
<style type="text/css">
    table.data tbody tr:nth-child(even) {background-color: #f5f5f5;}
    // table.data tbody td{text-align: center;}
    // tr:nth-child(even) {background: #FFF;}    
    thead tr{background-color: #EAEAEA;}  
    table.data tfoot{background-color: #ffffff;}
    table.data tbody tr:hover {background-color: #fffccc;}
    table.data tfoot tr:hover {background-color: #fffccc;}   
</style>