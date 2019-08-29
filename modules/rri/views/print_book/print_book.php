<?php
$pro_code = isset($pro_code) ? $pro_code : '';
$dis_code = isset($dis_code) ? $dis_code : '';
$rd_print = isset($rd_print) ? $rd_print : '';

// pro. =========================================================
$qr_pr = query("SELECT
                        pr.khmer_name
                FROM
                        province AS pr
                WHERE
                        pr.id = '{$pro_code}' ");
if ($qr_pr->num_rows() > 0) {
    foreach ($qr_pr->result() as $row_pro) {
        $my_pro = '';
        if (TRIM($row_pro->khmer_name) == 'ភ្នំពេញ') {
            $my_pro .= 'រាជធានី ' . $row_pro->khmer_name;
        } else {
            $my_pro .= 'ខេត្ត ' . $row_pro->khmer_name;
        }
    }
}

// =========================================================
if ($rd_print - 0 == 1) {
    ?>

    <!-- cover ----------------------------------------------------------------->
    <table cellpadding="0" cellspacing="0" align="center" style="width: 100%;height: 100%;vertical-align: middle;text-align: center;color: #10517F;font-family: khmer mef2;font-size: 30px;margin: 0 0 0 0;">
        <tr>
            <td>ព្រះរាជាណាចក្រកម្ពុជា</td>
        </tr>
        <tr>
            <td>ជាតិ សាសនា ព្រះមហាក្សត្រ</td>
        </tr>
        <tr>
            <td><img width="120" height="15" src="<?= base_url('assets/bs/css/images/tacteing.gif') ?>" /></td>
        </tr>
        <!---------------------------------------------------->
        <tr style="text-align: left;">
            <td><img  style="margin: 0 0 0 70px;" width="120" height="125" src="<?= base_url('assets/bs/css/images/logo_rpt.gif') ?>"></td>
        </tr>
        <tr style="text-align: left;">
            <td>ក្រសួងអភិវឌ្ឍន៍ជនបទ</td>
        </tr>
        <!---------------------------------------------------->
        <tr style="text-align: center;font-size: 50px;">
            <td>បញ្ជីសារពើភ័ណ្ឌផ្លូវជនបទ</td>
        </tr>
        <tr>
            <td>រៀបចំដោយ</td>
        </tr>
        <tr>
            <td>ក្រុមការងារក្រសួងអភិវឌ្ឍន៍ជនបទ ដើម្បីរៀបចំបញ្ជីសារពើភ័ណ្ឌ</td>
        </tr>
        <tr>
            <td>និងមូលដ្ឋានទិន្នន័យផ្លូវជនបទ នៃព្រះរាជាណាចក្រកម្ពុជា</td>
        </tr>
        <tr>
            <td>ខែ <?= month_kh_letter() ?> ឆ្នាំ <?= year_kh(date('Y')) ?></td>
        </tr>
    </table><p class="break"></p>      
    <!-- end cover ----------------------------------------------------------->

    <?php
    // main list. ==========================================================
    $gr_to_ln = 0;
    $to_ln = 0;
    $tr = '';
    $i = 0;
    $qr = query("SELECT
                            pr.id,
                            pr.khmer_name,
                            dis.dis_code,
                            dis.dis_khmer,
                            note_id
                    FROM
                            province AS pr
                    INNER JOIN district AS dis ON pr.id = dis.pro_code
                    WHERE
                            pr.id = '{$pro_code}' ");
    if ($qr->num_rows() > 0) {
        // ==================================================================
        foreach ($qr->result() as $row) {
            // dis. =======================================================
            if ($row->note_id - 0 == '1') {
                $my_dis = 'ក្រុង ' . $row->dis_khmer;
            } else if ($pro_code == '19') {
                $my_dis = 'ខណ្ឌ ' . $row->dis_khmer;
            } else {
                $my_dis = 'ស្រុក ' . $row->dis_khmer;
            }

            $qr_mn_list = query("SELECT
                                            SUBSTR(rd.idtemp, 3, 4) AS num,
                                            gr.commune,
                                            rd.road_name,
                                            rd.length,
                                            rd.width,
                                            rd.first_point_x,
                                            rd.first_point_y,
                                            rd.last_point_x,
                                            rd.last_point_y,
                                            pv.type_pavement,
                                            rd.type,
                                            hi.source_budget,
                                            hi.apply_by,
                                            hi.year_construct
                                    FROM
                                            road_info AS rd
                                    LEFT JOIN history AS hi ON rd.road_id = hi.road_id
                                    LEFT JOIN pavement AS pv ON rd.road_id = pv.road_id
                                    LEFT JOIN geography AS gr ON rd.road_id = gr.road_id
                                    WHERE
                                            rd.pro_id = '{$pro_code}'
                                    AND rd.dis_id = '{$row->dis_code}'
                                    GROUP BY
                                            rd.road_id
                                    ORDER BY
                                            rd.road_id - 0 ASC ");

            // =================================
            if ($qr_mn_list->num_rows > 0) {
                $tr .= '<tr>' .
                        ' <td colspan="16" style="font-size: 17px;font-family: khmer mef2;border: 2px solid blue;">' . $my_dis . '</td>' .
                        '</tr>';
                foreach ($qr_mn_list->result() as $row_mn_list) {
                    $i++;
                    $to_ln += $row_mn_list->length;
                    $tr .= '<tr>' .
                            '<td>' . $i . '</td>' .
                            '<td>' . $row_mn_list->num . '</td>' .
                            '<td style="text-align: left;">' . $row_mn_list->commune . '</td>' .
                            '<td style="text-align: left;">' . $row_mn_list->road_name . '</td>' .
                            '<td style="text-align: right;">' . ($row_mn_list->length - 0 > 0 ? (number_format($row_mn_list->length, 0, '.', ',')) : '') . '</td>' .
                            '<td>' . $row_mn_list->width . '</td>' .
                            '<td>' . $row_mn_list->first_point_x . '</td>' .
                            '<td>' . $row_mn_list->first_point_y . '</td>' .
                            '<td>' . $row_mn_list->last_point_x . '</td>' .
                            '<td>' . $row_mn_list->last_point_y . '</td>' .
                            '<td style="text-align: left;">' . $row_mn_list->type_pavement . '</td>' .
                            '<td>' . $row_mn_list->type . '</td>' .
                            '<td style="text-align: left;">' . $row_mn_list->source_budget . '</td>' .
                            '<td style="text-align: left;">' . $row_mn_list->apply_by . '</td>' .
                            '<td>' . $row_mn_list->year_construct . '</td>' .
                            '<td></td>' .
                            '</tr>';
                }
                $gr_to_ln += $to_ln;
                $tr .= '<tr style="font-weight: bold;">' .
                        '<td colspan="4">សរុប</td>' .
                        '<td style="text-align: right;">' . ($to_ln > 0 ? number_format($to_ln, 0, '.', ',') : '') . '</td>' .
                        '<td colspan="11"></td>' .
                        '</tr>';
            }// ============================================================
        }
    }
    ?>

    <!-- logo main list ------------------------------------------------------->
    <table cellpadding="0" cellspacing="0" align="center" style="width: 100%;color: #10517F;font-family: khmer mef2;font-size: 18px;text-align: center;">
        <tr>
            <td>ព្រះរាជាណាចក្រកម្ពុជា</td>
        </tr>
        <tr>
            <td>ជាតិ​ សាសនា ព្រះមហក្សត្រ</td>
        </tr>
        <tr>
            <td><img width="90" height="10" src="<?= base_url('assets/bs/css/images/tacteing.gif') ?>" /></td>
        </tr>
        <tr style="text-align: left">
            <td><img style="margin: 0 0 0 50px;" width="50" height="55" src="<?= base_url('assets/bs/css/images/logo_rpt.gif') ?>" /></td>
        </tr>
        <tr style="text-align: left">
            <td>ក្រសួងអភិវឌ្ឍន៍ជនបទ</td>
        </tr>
        <tr>
            <td>បញ្ជីសារពើភ័ណ្ឌផ្លូវជនបទ ឆ្នាំ <?= year_kh(date('Y')) ?></td>
        </tr>
        <tr>
            <td><?= $my_pro ?></td>
        </tr>
    </table>
    <!-- end logo tbl. ---------------------------------------------------------->

    <table cellpadding="0" cellspacing="0"  align="center" border="1" style="width: 100%;border: 2px solid blue;vertical-align: middle;text-align: center;border-collapse: collapse;font-family: Khmer MEF1;">
        <thead style="font-family: khmer mef1;font-weight: bold;">
            <tr>
                <td rowspan="3">ល.រ</td>
                <td rowspan="3">លេខកូដ</td>
                <td rowspan="3">ឃុំ/សង្កាត់</td>
                <td rowspan="3">ឈ្មោះផ្លូវ</td>
                <td rowspan="3">ប្រវែង (ម)</td>
                <td rowspan="3">ទទឹង (ម)</td>
                <td colspan="4">និយាមកា</td>
                <td rowspan="3">ប្រភេទកម្រាល</td>
                <td rowspan="3">ប្រភេទផ្លូវ</td>
                <td rowspan="3">ប្រភពថវិកា</td>
                <td rowspan="3">អនុវត្តន៍ដោយ</td>
                <td rowspan="3">ឆ្នាំ​ជួសជុល</td>
                <td rowspan="3">ទំព័រ</td>
            </tr>
            <tr>
                <td colspan="2">ចំនុចដើមផ្លូវ</td>
                <td colspan="2">ចំនុចចុងផ្លូវ</td>
            </tr>
            <tr>
                <td>x</td>
                <td>y</td>
                <td>x</td>
                <td>y</td>
            </tr>
        </thead>
        <tbody>
            <?= $tr ?>
        </tbody>
        <tfoot style="border-top: 2px solid blue;">
            <tr>
                <td colspan="4" style="font-family: khmer mef2;">សរុបរួម</td>
                <td style="font-weight: bold;text-align: right;"><?= ($gr_to_ln > 0 ? number_format($gr_to_ln, 0, '.', ',') : '') ?></td>
                <td colspan="11"></td>
            </tr>            
        </tfoot>
    </table>
    <!-- fooot... ----------------------------------------------------> 
    <table align="center" style="font-family: khmer mef1;margin: 10px 0 0 20px;">
        <tr>
            <td><?= '*&nbsp;សំគាល់​៖&nbsp;តារាងបញ្ឈប់ត្រឹមលេខរៀងទី &nbsp;' . year_kh($i) . '&nbsp;' ?>គិតត្រឹមថ្ងៃទី​ <?= day_kh(date('d')) ?> ខែ <?= month_kh_letter() ?> ឆ្នាំ <?= year_kh(date('Y')) ?></td>
        </tr>  
    </table>
    <table align="center" style="width: 100%;font-family: khmer mef1;text-align: center;margin: 20px 0 0 0;">
        <tr>
            <td><?= 'ថ្ងៃទី​​​​​​​​​​​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . 'ខែ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . 'ឆ្នាំ​&nbsp;' . year_kh(date('Y')) ?></td>
            <td><?= 'ថ្ងៃទី​​​​​​​​​​​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . 'ខែ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . 'ឆ្នាំ​&nbsp;' . year_kh(date('Y')) ?></td>
            <td><?= 'ថ្ងៃទី​​​​​​​​​​​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . 'ខែ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . 'ឆ្នាំ​&nbsp;' . year_kh(date('Y')) ?></td>                
        </tr>
        <tr>
            <td>បានឃើញ និងឯកភាព</td>
            <td>បានពិនិត្យត្រឹមត្រូវ</td>
            <td style="font-weight: bold;">ប្រធានក្រុមការងារ<?= $my_pro ?></td>                
        </tr>
        <tr style="font-weight: bold;">
            <td>ប្រធានក្រុមការងារទទួលបន្ទុក<?= $my_pro ?></td>
            <td>ប្រធានមន្ទីរអភិវឌ្ឍន៍ជនបទ<?= $my_pro ?></td>
            <td></td>                
        </tr>
    </table><p class="break"></p>        
    <!-- end main list ---------------------------------------------------->

    <!-- by dis. ---------------------------------------------------------->   
    <?php
    // sub lst. ==========================================================
    $qr_ = query("SELECT
                            pr.id,
                            pr.khmer_name,
                            dis.dis_code,
                            dis.dis_khmer,
                            dis.note_id
                    FROM
                            province AS pr
                    INNER JOIN district AS dis ON pr.id = dis.pro_code
                    WHERE
                            pr.id = '{$pro_code}' ");
    // content ======================================================
    $tr__ = '';
    $i__ = 0;
    if ($qr_->num_rows() > 0) {
        foreach ($qr_->result() as $row_) {
            // dis. =======================================================
            if ($row_->note_id - 0 == '1') {
                $my_dis = 'ក្រុង ' . $row_->dis_khmer;
            } else if ($pro_code == '19') {
                $my_dis = 'ខណ្ឌ ' . $row_->dis_khmer;
            } else {
                $my_dis = 'ស្រុក ' . $row_->dis_khmer;
            }

            $qr_mn_list_ = query("SELECT
                                        rd.road_id,
                                        SUBSTR(rd.idtemp, 3, 4) AS num,
                                        rd.road_number,
                                        rd.road_name,
                                        rd.type,
                                        rd.length,
                                        rd.width,
                                        rd.first_point_x,
                                        rd.first_point_y,
                                        rd.last_point_x,
                                        rd.last_point_y,
                                        rd.file_name,
                                        rd.note,
                                        rd.pro_id,
                                        rd.dis_id,
                                        rd.dmid,
                                        rd.create_date,
                                        rd.is_status,
                                        rd.is_delete,
                                        rd.line_id,
                                        hi.his_id,
                                        hi.road_id,
                                        hi.idtemp4,
                                        hi.activity,
                                        hi.year_construct,
                                        hi.apply_by,
                                        hi.source_budget,
                                        hi.pro_id,
                                        hi.dis_id,
                                        hi.dmid,
                                        hi.create_date,
                                        hi.is_status,
                                        hi.is_delete,
                                        hi.line_id,
                                        pv.pave_id,
                                        pv.road_id,
                                        pv.idtemp5,
                                        pv.type_pavement,
                                        pv.first_point_x_pavement,
                                        pv.first_point_y_pavement,
                                        pv.last_point_x_pavement,
                                        pv.last_point_y_pavement,
                                        pv.length_pavement,
                                        pv.pro_id,
                                        pv.dis_id,
                                        pv.dmid,
                                        pv.create_date,
                                        pv.is_status,
                                        pv.is_delete,
                                        pv.line_id,
                                        gr.geo_id,
                                        gr.road_id,
                                        gr.idtemp1,
                                        gr.district,
                                        gr.commune,
                                        gr.village,
                                        gr.pro_id,
                                        gr.dis_id,
                                        gr.dmid,
                                        gr.create_date,
                                        gr.is_status,
                                        gr.is_delete,
                                        gr.line_id
                                FROM
                                        road_info AS rd
                                LEFT JOIN history AS hi ON rd.road_id = hi.road_id
                                LEFT JOIN pavement AS pv ON rd.road_id = pv.road_id
                                LEFT JOIN geography AS gr ON rd.road_id = gr.road_id
                                WHERE
                                        rd.pro_id = '{$pro_code}'
                                AND rd.dis_id = '{$row_->dis_code}'
                                GROUP BY
                                        rd.road_id
                                ORDER BY
                                        rd.road_id - 0 ASC ");

            // =====================================
            $tr_ = '';
            $total_ln_ = 0;
            $i_ = 0;
            if ($qr_mn_list_->num_rows > 0) {
                foreach ($qr_mn_list_->result() as $row_mn_list_) {
                    $total_ln_ += $row_mn_list_->length;
                    $i_++;
                    $tr_ .= '<tr>' .
                            '<td>' . $i_ . '</td>' .
                            '<td>' . $row_mn_list_->num . '</td>' .
                            '<td style="text-align: left;">' . $row_mn_list_->commune . '</td>' .
                            '<td style="text-align: left;">' . $row_mn_list_->road_name . '</td>' .
                            '<td style="text-align: right;">' . ($row_mn_list_->length - 0 > 0 ? (number_format($row_mn_list_->length, 0, '.', ',')) : '') . '</td>' .
                            '<td>' . $row_mn_list_->width . '</td>' .
                            '<td>' . $row_mn_list_->first_point_x . '</td>' .
                            '<td>' . $row_mn_list_->first_point_y . '</td>' .
                            '<td>' . $row_mn_list_->last_point_x . '</td>' .
                            '<td>' . $row_mn_list_->last_point_y . '</td>' .
                            '<td style="text-align: left;">' . $row_mn_list_->type_pavement . '</td>' .
                            '<td>' . $row_mn_list_->type . '</td>' .
                            '<td style="text-align: left;">' . $row_mn_list_->source_budget . '</td>' .
                            '<td style="text-align: left;">' . $row_mn_list_->apply_by . '</td>' .
                            '<td>' . $row_mn_list_->year_construct . '</td>' .
                            '<td></td>' .
                            '</tr>';
                }
            }
            ?> 

            <!-- logo --------------------------------------->
            <table cellpadding="0" cellspacing="0" align="center" style="width: 100%;height: 100%;color: #10517F;font-family: khmer mef2;font-size: 80px;text-align: center;">
                <tr>
                    <td>
                        <?= $my_dis ?>
                    </td>
                </tr>
            </table><p class="break"></p>
            <!---------------------------------------------->
            <table cellpadding="0" cellspacing="0" align="center" style="width: 100%;color: #10517F;font-family: khmer mef2;font-size: 16px;text-align: center;">
                <tr>
                    <td>ព្រះរាជាណាចក្រកម្ពុជា</td>
                </tr>
                <tr>
                    <td>ជាតិ​ សាសនា ព្រះមហក្សត្រ</td>
                </tr>
                <tr>
                    <td><img width="90" height="10" src="<?= base_url('assets/bs/css/images/tacteing.gif') ?>" /></td>
                </tr>
                <tr style="text-align: left">
                    <td><img style="margin: 0 0 0 50px;" width="50" height="55" src="<?= base_url('assets/bs/css/images/logo_rpt.gif') ?>" /></td>
                </tr>
                <tr style="text-align: left">
                    <td>ក្រសួងអភិវឌ្ឍន៍ជនបទ</td>
                </tr>
                <tr>
                    <td>បញ្ជីសារពើភ័ណ្ឌផ្លូវជនបទ ឆ្នាំ <?= year_kh(date('Y')) ?></td>
                </tr>
                <tr>
                    <td><?= $my_dis . ' ' . $my_pro ?></td>
                </tr>
            </table>
            <table cellpadding="0" cellspacing="0"  align="center" border="1" style="width: 100%;border: 2px solid blue;vertical-align: middle;text-align: center;border-collapse: collapse;font-family: Khmer mef1;">
                <thead style="font-family: khmer mef1;font-weight: bold;border-bottom: 2px solid blue;">
                    <tr>
                        <td rowspan="3">ល.រ</td>
                        <td rowspan="3">លេខកូដ</td>
                        <td rowspan="3">ឃុំ/សង្កាត់</td>
                        <td rowspan="3">ឈ្មោះផ្លូវ</td>
                        <td rowspan="3">ប្រវែង (ម)</td>
                        <td rowspan="3">ទទឹង (ម)</td>
                        <td colspan="4">និយាមកា</td>
                        <td rowspan="3">ប្រភេទកម្រាល</td>
                        <td rowspan="3">ប្រភេទផ្លូវ</td>
                        <td rowspan="3">ប្រភពថវិកា</td>
                        <td rowspan="3">អនុវត្តន៍ដោយ</td>
                        <td rowspan="3">ឆ្នាំ​ជួសជុល</td>
                        <td rowspan="3">ទំព័រ</td>
                    </tr>
                    <tr>
                        <td colspan="2">ចំនុចដើមផ្លូវ</td>
                        <td colspan="2">ចំនុចចុងផ្លូវ</td>
                    </tr>
                    <tr>
                        <td>x</td>
                        <td>y</td>
                        <td>x</td>
                        <td>y</td>
                    </tr>
                </thead>
                <tbody>
                    <?= $tr_ ?>
                </tbody>
                <tfoot style="border-top: 2px solid blue;">
                    <tr>
                        <td colspan="4" style="font-family: khmer mef2;">សរុប</td>
                        <td style="font-weight: bold;text-align: right;"><?= ($total_ln_ > 0 ? number_format($total_ln_, 0, '.', ',') : '') ?></td>
                        <td colspan="11"></td>
                    </tr>            
                </tfoot>
            </table>
            <!-- fooot... --------------------------------------> 
            <table align="center" style="font-family: khmer mef1;margin: 10px 0 0 20px;">
                <tr>
                    <td><?= '*&nbsp;សំគាល់​៖&nbsp;តារាងបញ្ឈប់ត្រឹមលេខរៀងទី &nbsp;' . year_kh($i_) . '&nbsp;' ?>គិតត្រឹមថ្ងៃទី​ <?= day_kh(date('d')) ?> ខែ <?= month_kh_letter() ?> ឆ្នាំ <?= year_kh(date('Y')) ?></td>
                </tr>  
            </table><p class="break"></p>

            <!-- print excel ----------------------------------->
            <?php
            $query_xls = query("SELECT
                                            r.road_id,
                                            r.idtemp,
                                            r.road_number,
                                            r.road_name,
                                            r.type,
                                            r.length,
                                            r.width,
                                            r.first_point_x,
                                            r.first_point_y,
                                            r.last_point_x,
                                            r.last_point_y,
                                            r.file_name,
                                            r.note,
                                            r.pro_id,
                                            r.dis_id,
                                            r.dmid,
                                            r.create_date,
                                            r.is_status,
                                            r.is_delete,
                                            r.line_id
                                    FROM
                                            road_info AS r
                                    WHERE
                                            r.pro_id = '{$pro_code}'
                                    AND r.dis_id = '{$row_->dis_code}' ");

            // road_id for joint ==========================================
            $id = 0;
            if ($query_xls->num_rows > 0) {
                foreach ($query_xls->result() as $row) {
                    $id = $row->road_id;
                    ?>
                    <!------------------------------------------------------------>
                    <table cellpadding="0" cellspacing="0" align="center" style="width: 100%;font-family: khmer mef1;text-align: center;">
                        <tr>
                            <td style="width: 40%;">
                                <!-- general info ---------------------->
                                <table align="left" border="1" style="border-collapse: collapse;border: 2px solid blue;">
                                    <tr style="text-align: center;">
                                        <td>លេខផ្លូវ</td>
                                        <td  colspan="3"><?= $row->road_number ?>​</td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td>ឈ្មោះផ្លូវ</td>
                                        <td  colspan="3"><?= $row->road_name ?></td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td>ប្រភេទ</td>
                                        <td colspan="3"><?= $row->type ?></td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td rowspan="2">ទំហំ</td>
                                        <td>ប្រវែង</td>
                                        <td colspan="2"><?= $row->length ?></td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td>ទទឹង</td>
                                        <td colspan="2"><?= $row->width ?>​</td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td rowspan="2">និយាមកា</td>
                                        <td>ចាប់ផ្តើម</td>
                                        <td><?= $row->first_point_x ?></td>
                                        <td><?= $row->first_point_y ?></td>  
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td>បញ្ចប់</td>
                                        <td><?= $row->last_point_x ?></td>
                                        <td><?= $row->last_point_y ?></td>
                                    </tr>
                                </table>
                            </td>
                            <!--------------------------->
                            <td>
                                <div style="width: 200px;height: auto;border: 2px solid blue;font-family: khmer mef2;font-size: 16px;">តារាងផ្លូវជនបទ</div>
                            </td>
                            <!--------------------------->
                            <td align="center" style="width: 30%;">
                                <table style="text-align: center;">
                                    <tr>
                                        <td​><img style="" width="70" height="75" src="<?= base_url('assets/bs/css/images/logo_rpt.gif') ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td>ក្រសួងអភិវឌ្ឍន៍ជនបទ</td>
                                    </tr>
                                    <tr>
                                        <td>មន្ទីរអភិវឌ្ឍន៍ជនបទ<?= $my_pro ?></td>
                                    </tr>
                                </table> 
                            </td>
                        </tr>                        
                    </table><br />

                    <?php
                    // geo =================================================
                    $query_geo = query("SELECT * FROM geography AS G WHERE G.road_id='{$id}' ");
                    if ($query_geo->num_rows() > 0) {
                        $array_geo = array();
                        foreach ($query_geo->result() as $row) {
                            $array_geo[$row->line_id] = $row;
                        }
                    }

                    // art ================================================
                    $query_art = query("SELECT * FROM art_building AS A WHERE A.road_id='{$id}' ");
                    if ($query_art->num_rows() > 0) {
                        $array_art = array();
                        foreach ($query_art->result() as $row) {
                            $array_art[$row->line_id] = $row;
                        }
                    }

                    // pub ================================================
                    $query_pub = query("SELECT * FROM public_building AS Pub WHERE Pub.road_id='{$id}' ");
                    if ($query_pub->num_rows() > 0) {
                        $array_pub = array();
                        foreach ($query_pub->result() as $row) {
                            $array_pub[$row->line_id] = $row;
                        }
                    }

                    // his ==============================================
                    $query_his = query("SELECT * FROM history AS His WHERE His.road_id='{$id}' ");
                    if ($query_his->num_rows() > 0) {
                        $array_his = array();
                        foreach ($query_his->result() as $row) {
                            $array_his[$row->line_id] = $row;
                        }
                    }

                    // pave ============================================
                    $query_pave = query("SELECT * FROM pavement AS Pave WHERE Pave.road_id='{$id}' ");
                    if ($query_pave->num_rows() > 0) {
                        $array_pave = array();
                        foreach ($query_pave->result() as $row) {
                            $array_pave[$row->line_id] = $row;
                        }
                    }

                    $all_data = query("SELECT
                                            g.line_id
                                            FROM
                                            geography AS g
                                            WHERE g.road_id='{$id}'
                                            UNION 

                                            SELECT
                                            g.line_id
                                            FROM
                                            art_building AS g
                                            WHERE g.road_id='{$id}'
                                            UNION 

                                            SELECT
                                            g.line_id
                                            FROM
                                            public_building AS g
                                            WHERE g.road_id='{$id}'
                                            UNION 

                                            SELECT
                                            g.line_id
                                            FROM
                                            history AS g
                                            WHERE g.road_id='{$id}'
                                            UNION 

                                            SELECT
                                            g.line_id
                                            FROM
                                            pavement AS g 
                                            WHERE g.road_id='{$id}'");
                    $tr = '';
                    if ($all_data->num_rows() > 0) {
                        foreach ($all_data->result() as $row) {
                            $tr .= "<tr>";
                            // Geography ==================================
                            if (isset($array_geo[$row->line_id])) {
                                $r = $array_geo[$row->line_id];
                                $tr .= "<td>" . $r->district . "</td>" .
                                        "<td>" . $r->commune . "</td>" .
                                        "<td style='border-right: 2px solid blue;'>" . $r->village . "</td>";
                            } else {
                                $tr .= "<td></td>" .
                                        "<td></td>" .
                                        "<td style='border-right: 2px solid blue;'></td>";
                            }

                            // Art ========================================
                            if (isset($array_art[$row->line_id])) {
                                $r = $array_art[$row->line_id];
                                $tr .= "<td>" . $r->type_building_art . "</td>" .
                                        "<td>" . $r->dimension_building_art . "</td>" .
                                        "<td>" . $r->quality_building_art . "</td>" .
                                        "<td>" . $r->position_x_building_art . "</td>" .
                                        "<td style='border-right: 2px solid blue;'>" . $r->position_y_building_art . "</td>";
                            } else {
                                $tr .= "<td></td>" .
                                        "<td></td>" .
                                        "<td></td>" .
                                        "<td></td>" .
                                        "<td style='border-right: 2px solid blue;'></td>";
                            }

                            // Pub =======================================
                            if (isset($array_pub[$row->line_id])) {
                                $r = $array_pub[$row->line_id];
                                $tr .= "<td>" . $r->type_building . "</td>" .
                                        "<td>" . $r->name_building . "</td>" .
                                        "<td>" . $r->position_x . "</td>" .
                                        "<td>" . $r->position_y . "</td>" .
                                        "<td style='border-right: 2px solid blue;'>" . $r->direction . "</td>";
                            } else {
                                $tr .= "<td></td>" .
                                        "<td></td>" .
                                        "<td></td>" .
                                        "<td></td>" .
                                        "<td style='border-right: 2px solid blue;'></td>";
                            }

                            // his ==========================================
                            if (isset($array_his[$row->line_id])) {
                                $r = $array_his[$row->line_id];
                                $tr .= "<td>" . $r->activity . "</td>" .
                                        "<td>" . $r->year_construct . "</td>" .
                                        "<td>" . $r->apply_by . "</td>" .
                                        "<td style='border-right: 2px solid blue;'>" . $r->source_budget . "</td>";
                            } else {
                                $tr .= "<td></td>" .
                                        "<td></td>" .
                                        "<td></td>" .
                                        "<td style='border-right: 2px solid blue;'></td>";
                            }

                            //​ pave =======================================
                            if (isset($array_pave[$row->line_id])) {
                                $r = $array_pave[$row->line_id];
                                $tr .= "<td>" . $r->type_pavement . "</td>" .
                                        "<td>" . $r->first_point_x_pavement . "</td>" .
                                        "<td>" . $r->last_point_x_pavement . "</td>" .
                                        "<td>" . $r->last_point_x_pavement . "</td>" .
                                        "<td>" . $r->last_point_y_pavement . "</td>" .
                                        "<td>" . $r->length_pavement . "</td>";
                            } else {
                                $tr .= "<td></td>" .
                                        "<td></td>" .
                                        "<td></td>" .
                                        "<td></td>" .
                                        "<td></td>" .
                                        "<td></td>";
                            }
                            $tr .= "</tr>";
                        }
                    }
                    ?>
                    <table cellpadding="0" cellspacing="0" border="1" style="width: 100%;font-family: khmer mef1;border-collapse: collapse;border: 2px solid blue;text-align: left;">
                        <thead style="text-align: center;border-bottom: 2px solid blue;">
                            <tr style="font-family: khmer mef2;">
                                <td colspan="3" style="border-right: 2px solid blue;">ទីតាំងភូមិសាស្រ្ត</td>
                                <td colspan="5" style="border-right: 2px solid blue;">សំណង់សិល្បការ</td>
                                <td colspan="5" style="border-right: 2px solid blue;">សំណង់សាធារណៈ</td>
                                <td colspan="4" style="border-right: 2px solid blue;">ប្រវត្តិផ្លូវ</td>
                                <td colspan="6">កម្រាល</td>
                            </tr>
                            <tr>
                                <!-- geo ------------------------->
                                <td>ស្រុក</td>
                                <td>ឃុំ</td>
                                <td style="border-right: 2px solid blue;">ភូមិ</td>

                                <!-- art --------------------->
                                <td>ប្រភេទ</td>
                                <td>ប្រវែង/ទំហំ</td>
                                <td>ស្ថានភាព</td>
                                <td colspan="2" style="border-right: 2px solid blue;">និយាមកា</td>

                                <!-- pub ------------------------>
                                <td>ប្រភេទសំណង់</td>
                                <td>ឈ្មោះសំណង់</td>
                                <td colspan="2">និយាមកា</td>
                                <td style="border-right: 2px solid blue;">ទិស</td>

                                <!-- his ---------------------------->
                                <td>សកម្មភាព</td>
                                <td>ឆ្នាំ</td>
                                <td>អនុវត្តដោយ</td>
                                <td style="border-right: 2px solid blue;">ប្រភពថវិកា</td>

                                <!-- pave -------------------------->
                                <td>ប្រភេទ</td>
                                <td colspan="2">និយាមកាចាប់ផ្តើម</td>
                                <td colspan="2">និយាមកាបញ្ចប់</td>
                                <td>ប្រវែង</td>
                            </tr>        
                        </thead>
                        <tbody>
                            <?= $tr ?>    
                        </tbody>    
                    </table>
                    <p class="break"></p>
                    <!-- end print ---------------------------> 
                    <?php
                }
            }
            ?>
            <!-- end by dis. ------------------------------------------------------------------>

            <!--------------------------------------------->
            <?php
            $i__++;
            $tr__ .= '<tr>' .
                    '<td>' . $i__ . '</td>' .
                    '<td style="text-align: left;">' . $row_->dis_khmer . '</td>' .
                    '<td></td>' .
                    '</tr>';
            ?>

            <?php
        }// end loop ===================================================
    }// end if (>0) ====================================================
    ?>
    <!-- content --------------------------------------------------------------------->
    <table cellpadding="0" cellspacing="0" align="center" border="1​​​​​​​"​ style="width: 100%;text-align: center;border-collapse: collapse;border: 2px solid blue;font-family: Khmer mef1;color: blue;">
        <caption style="font-family: khmer mef2;font-size: 20px;">មាតិកា</caption>
        <thead>
            <tr style="border: 2px solid blue;font-weight: bold;">
                <td width="5%">ល.រ</td>
                <td width="90%">ចំណងជើង</td>
                <td width="5%">ទំព័រ</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>I</td>
                <td style="text-align: left">បញ្ជីសារពើភ័ណ្ឌផ្លូវជនបទ <?= $my_pro ?> ឆ្នាំ <?= year_kh(date('Y')) ?></td>
                <td>1</td>
            </tr>
            <tr>
                <td>II</td>
                <td style="text-align: left">បញ្ជីសារពើភ័ណ្ឌផ្លូវជនបទតាម ស្រុក/ក្រុង</td>
                <td></td>
            </tr>
            <?= $tr__ ?>
        </tbody>
        <tfoot>                    
        </tfoot>
    </table> 
    <?php
}// end if (>0) ====================================================
?>       
<!-- end content -------------------------------------------------------->

<!-- break page ----------------------------------------------------------->
<style type="text/css">
    @media print{.break {page-break-before: always;}}
    
/*    @page {
        @bottom-left{
            content: counter(page) " of " counter(pages);
        }
    }*/
</style>
