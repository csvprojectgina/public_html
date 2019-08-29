<?php
// tmp table ======================================
query("CREATE TEMPORARY TABLE IF NOT EXISTS `tmp_pave` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `pro_name` varchar(255) DEFAULT NULL,
            `line` int(11) DEFAULT NULL,
            `length` double DEFAULT NULL,
            `p1` double DEFAULT NULL,
            `p2` double DEFAULT NULL,
            `p3` double DEFAULT NULL,
            `p4` double DEFAULT NULL,
            `p5` double DEFAULT NULL,
            `p6` double DEFAULT NULL,
            `p7` double DEFAULT NULL,
            `p8` double DEFAULT NULL,
            `p9` double DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$q = query("SELECT
                        pv.pro_name,
                        pv.t_pv,
                        SUM(pv.length_pavement) AS to_l
                FROM
                        (
                                SELECT
                                        pr.khmer_name AS pro_name,
                                        pav.type_pavement AS t_pv,
                                        pav.length_pavement
                                FROM
                                        pavement AS pav
                                INNER JOIN province AS pr ON pav.pro_id = pr.id
                        ) AS pv
                GROUP BY
                        pv.pro_name,
                        pv.t_pv ");

// =======================================================
$q_line = query("SELECT
                            pv.pro_name,
                            COUNT(pv.road_id) AS to_line
                    FROM
                            (
                                    SELECT
                                            rd.road_id,
                                            pr.khmer_name AS pro_name
                                    FROM
                                            road_info AS rd
                                    INNER JOIN province AS pr ON rd.pro_id = pr.id
                            ) AS pv
                    GROUP BY
                            pv.pro_name ");

if ($q->num_rows() && $q_line->num_rows() > 0) {
    $arr_item = array();
    foreach ($q->result() as $row) {
        $arr_item[$row->pro_name][$row->t_pv] = $row->to_l;
    }

    // total line ================================
    $arr = array();
    foreach ($q_line->result() as $row1) {
        $arr[$row1->pro_name] = $row1->to_line;
    }

    // ===========================================
    $q_item = query("SELECT
                                pr.khmer_name
                        FROM
                                province AS pr
                        ORDER BY
                                pr.id ");

    // delete data in tbl report ==================
    query("DELETE FROM `tmp_pave` WHERE `id` > 0");

    foreach ($q_item->result() as $r) {
        $data = array(
            'pro_name' => $r->khmer_name,
            'line' => isset($arr[$r->khmer_name]) ? $arr[$r->khmer_name] : 0,
            'p1' => isset($arr_item[$r->khmer_name]['កៅស៊ូ ១ ជាន់']) ? $arr_item[$r->khmer_name]['កៅស៊ូ ១ ជាន់'] : 0,
            'p2' => isset($arr_item[$r->khmer_name]['កៅស៊ូ ២ ជាន់']) ? $arr_item[$r->khmer_name]['កៅស៊ូ ២ ជាន់'] : 0,
            'p3' => isset($arr_item[$r->khmer_name]['បេតុង']) ? $arr_item[$r->khmer_name]['បេតុង'] : 0,
            'p4' => isset($arr_item[$r->khmer_name]['ក្រួសក្រហម']) ? $arr_item[$r->khmer_name]['ក្រួសក្រហម'] : 0,
            'p5' => isset($arr_item[$r->khmer_name]['ល្បាយក្រួសអាចម៍ផ្កាយ']) ? $arr_item[$r->khmer_name]['ល្បាយក្រួសអាចម៍ផ្កាយ'] : 0,
            'p6' => isset($arr_item[$r->khmer_name]['ល្បាយកំទេចថ្មភ្នំ']) ? $arr_item[$r->khmer_name]['ល្បាយកំទេចថ្មភ្នំ'] : 0,
            'p7' => isset($arr_item[$r->khmer_name]['ដីស']) ? $arr_item[$r->khmer_name]['ដីស'] : 0,
            'p8' => isset($arr_item[$r->khmer_name]['ខ្សាច់ភ្នំ']) ? $arr_item[$r->khmer_name]['ខ្សាច់ភ្នំ'] : 0,
            'p9' => isset($arr_item[$r->khmer_name]['ផ្សេងៗ']) ? $arr_item[$r->khmer_name]['ផ្សេងៗ'] : 0
        );
        insert('tmp_pave', $data);
    }

    // query data in tbl report ========================
    $q_result = query("SELECT
                                tmp_pave.id,
                                tmp_pave.pro_name,
                                tmp_pave.line,
                                tmp_pave.length,
                                tmp_pave.p1,
                                tmp_pave.p2,
                                tmp_pave.p3,
                                tmp_pave.p4,
                                tmp_pave.p5,
                                tmp_pave.p6,
                                tmp_pave.p7,
                                tmp_pave.p8,
                                tmp_pave.p9
                        FROM
                                tmp_pave ");
    // =============================================
    $tr = "";
    $i = 1;
    $ii = 0;
    $to_length = 0;
    $to_r = 0;
    // ============================================
    $to_p1 = 0;
    $to_p2 = 0;
    $to_p3 = 0;
    $to_p4 = 0;
    $to_p5 = 0;
    $to_p6 = 0;
    $to_p7 = 0;
    $to_p8 = 0;
    $to_p9 = 0;
    // ===========================================
    $to_line = 0;
    $str_pv = '';
    $xx = 1000;

    // ===========================================
    foreach ($q_result->result() as $rs) {
        $ii = year_kh($i++);

        // total line ============================
        $to_line += $rs->line - 0;

        // total row =============================
        $to_r = ($rs->p1 - 0) + ($rs->p2 - 0) + ($rs->p3 - 0) + ($rs->p4 - 0) + ($rs->p5 - 0) + ($rs->p6 - 0) + ($rs->p7 - 0) + ($rs->p8 - 0) + ($rs->p9 - 0);

        // total foot ============================
        $to_length += (($rs->p1 - 0) + ($rs->p2 - 0) + ($rs->p3 - 0) + ($rs->p4 - 0) + ($rs->p5 - 0) + ($rs->p6 - 0) + ($rs->p7 - 0) + ($rs->p8 - 0) + ($rs->p9 - 0));
        $to_p1 += $rs->p1 - 0;
        $to_p2 += $rs->p2 - 0;
        $to_p3 += $rs->p3 - 0;
        $to_p4 += $rs->p4 - 0;
        $to_p5 += $rs->p5 - 0;
        $to_p6 += $rs->p6 - 0;
        $to_p7 += $rs->p7 - 0;
        $to_p8 += $rs->p8 - 0;
        $to_p9 += $rs->p9 - 0;
        $tr .= "<tr>"
                . "<td style='text-align: center;'>{$ii}</td>"
                . "<td style='text-align: left;font-family: khmer mef2;'>{$rs->pro_name}</td>"
                . "<td>" . ($rs->line - 0 > 0 ? (number_format($rs->line, 0, ".", ",")) : '') . "</td>"
                . "<td style='text-align: right;'>" . ($to_r - 0 > 0 ? (number_format($to_r / $xx, 3, ".", ",")) : '') . "</td>"
                . "<td style='text-align: right;'>" . ($rs->p1 - 0 > 0 ? (number_format($rs->p1 / $xx, 3, ".", ",")) : '') . "</td>"
                . "<td style='text-align: right;'>" . ($rs->p2 - 0 > 0 ? (number_format($rs->p2 / $xx, 3, ".", ",")) : '') . "</td>"
                . "<td style='text-align: right;'>" . ($rs->p3 - 0 > 0 ? (number_format($rs->p3 / $xx, 3, ".", ",")) : '') . "</td>"
                . "<td style='text-align: right;'>" . ($rs->p4 - 0 > 0 ? (number_format($rs->p4 / $xx, 3, ".", ",")) : '') . "</td>"
                . "<td style='text-align: right;'>" . ($rs->p5 - 0 > 0 ? (number_format($rs->p5 / $xx, 3, ".", ",")) : '') . "</td>"
                . "<td style='text-align: right;'>" . ($rs->p6 - 0 > 0 ? (number_format($rs->p6 / $xx, 3, ".", ",")) : '') . "</td>"
                . "<td style='text-align: right;'>" . ($rs->p7 - 0 > 0 ? (number_format($rs->p7 / $xx, 3, ".", ",")) : '') . "</td>"
                . "<td style='text-align: right;'>" . ($rs->p8 - 0 > 0 ? (number_format($rs->p8 / $xx, 3, ".", ",")) : '') . "</td>"
                . "<td style='text-align: right;'>" . ($rs->p9 - 0 > 0 ? (number_format($rs->p9 / $xx, 3, ".", ",")) : '') . "</td>"
                . "</tr>";
    }
    ?>

    <!-- css -----------------------------------------------> 
    <style type="text/css">
        table.data tbody tr:nth-child(even) {background-color: #f5f5f5;}
        // table.data tbody td{text-align: center;}
        // tr:nth-child(even) {background: #FFF;}    
        // thead tr{background-color: #EAEAEA;}  
        table.data tfoot{background-color: #f5f5f5;}
        table.data tbody tr:hover {background-color: #fffccc;}
        table.data tfoot tr:hover {background-color: #fffccc;}   
    </style>

    <!-- tbl --------------------------------> 
    <table align="center" style="text-align: center;"> 
        <tr style="font-family: khmer mef2;font-size: 14px;"> 
            <td> 
                តារាងប្រវែងតាមប្រភេទកម្រាលផ្លូវជនបទ 
            </td> 
        </tr> 
        <tr style="font-family: khmer mef1;font-size: 14px;color: blue;"> 
            <td> 
                គិតត្រឹមថ្ងៃទី​   <?= day_kh(date("d")) ?> ខែ <?= month_kh_letter() ?> ឆ្នាំ <?= year_kh(date("Y")) ?>
            </td> 
        </tr> 
    </table>       

    <!-- tbl ------------------------------->     
    <table cellpadding="0" cellspacing="0" class="data" align="center" border="1" backgound="blue" style="font-size: 12px;width: 100%;border: 2px solid blue;border-collapse: collapse;font-family: khmer mef1;text-align: right;vertical-align: middle;">
        <thead style="text-align: center;background-color: #CCC;border: 2px solid blue;">
            <tr style="font-family: khmer mef2;">
                <td rowspan="3">ល.រ</td>
                <td rowspan="3" style="width: 85px;">រាជធានី​-​ខេត្ត</td>
                <td colspan="11"​>ប្រភេទ​កម្រាល</td>
            </tr>
            <tr style="font-family: khmer mef2;">
                <td colspan="2">សរុប</td>
                <td>កៅស៊ូ ១ ជាន់</td>
                <td>កៅស៊ូ ២ ជាន់</td>
                <td>បេតុង</td>
                <td>ក្រួស​ក្រហម</td>
                <td>ល្បាយ​ក្រួស​អាចម៍ផ្កាយ</td>
                <td>ល្បាយ​កំទេច​ថ្មភ្នំ</td>
                <td>ដីស</td>
                <td>ខ្សាច់​ភ្នំ</td>
                <td>ផ្សេងៗ</td>									
            </tr>
            <tr>
                <td>ខ្សែ</td>
                <td>ប្រវែង (គ.ម)</td>
                <td>ប្រវែង (គ.ម)</td>
                <td>ប្រវែង (គ.ម)</td>
                <td>ប្រវែង (គ.ម)</td>
                <td>ប្រវែង (គ.ម)</td>
                <td>ប្រវែង (គ.ម)</td>
                <td>ប្រវែង (គ.ម)</td>
                <td>ប្រវែង (គ.ម)</td>
                <td>ប្រវែង (គ.ម)</td>									
                <td>ប្រវែង (គ.ម)</td>
            </tr>
        </thead>
        <tbody>
            <?= $tr ?>
        </tbody>
        <tfoot style="font-weight: bold;text-align: center;background-color: #CCC;border: 2px solid blue;">
            <tr>
                <td colspan="2">សរុបរួម (គ.ម)</td>  
                <td><?= (number_format($to_line, 0, ".", ",")) ?></td>
                <td><?= ($to_length - 0 > 0 ? (number_format($to_length / $xx, 3, ".", ",")) : '') ?></td>
                <td><?= ($to_p1 - 0 > 0 ? (number_format($to_p1 / $xx, 3, ".", ",")) : '') ?></td>
                <td><?= ($to_p2 - 0 > 0 ? (number_format($to_p2 / $xx, 3, ".", ",")) : '') ?></td>
                <td><?= ($to_p3 - 0 > 0 ? (number_format($to_p3 / $xx, 3, ".", ",")) : '') ?></td>
                <td><?= ($to_p4 - 0 > 0 ? (number_format($to_p4 / $xx, 3, ".", ",")) : '') ?></td>
                <td><?= ($to_p5 - 0 > 0 ? (number_format($to_p5 / $xx, 3, ".", ",")) : '') ?></td>
                <td><?= ($to_p6 - 0 > 0 ? (number_format($to_p6 / $xx, 3, ".", ",")) : '') ?></td>
                <td><?= ($to_p7 - 0 > 0 ? (number_format($to_p7 / $xx, 3, ".", ",")) : '') ?></td>
                <td><?= ($to_p8 - 0 > 0 ? (number_format($to_p8 / $xx, 3, ".", ",")) : '') ?></td>
                <td><?= ($to_p9 - 0 > 0 ? (number_format($to_p9 / $xx, 3, ".", ",")) : '') ?></td>
            </tr>
        </tfoot>
    </table> 
    <?php
    // del. tbl tmp ==================
    query("DROP TEMPORARY TABLE IF EXISTS `tmp_pavement`;");
    
} // end if ==========================
        
