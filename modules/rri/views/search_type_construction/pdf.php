<?php

include_once(APPPATH . "libraries/mpdf60/mpdf.php");
$mpdf = new mPDF();
$type_building = isset($type_building) ? $type_building : '';

$header = '<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
                        <td width="33%">ក្រសួងអភិវឌ្ឍន៍ជនបទ<span style="font-size:10pt;"></td>
                        <td></td>
                        <td width="33%" style="text-align: right;"><span style="font-weight: bold;"></span></td>
                        </tr></table>
                        ';
$footer = '<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
                        <td width="30%"><span style="font-size:10pt;"></td>
                        </tr></table>
                        <table  width="100%" style="border-bottom: 0px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
                        <td width="33%" style="text-align: right;"><span style="font-weight: bold;">{PAGENO}/{nb}</span></td>
                        </tr></table>';
$html = '';
$html .= '<p style="font-family: khmermef2;text-align: center;font-size: 18px">បញ្ជីប្រភេទកម្រាល</p>';
$html .= '<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse;font-family: khmermef1; width: 100%; text-align: center;"> 
           <thead>
            <tr>
                <td style="border: 1px solid blue; font-family: khmermef2" rowspan="3" >ល.រ</td>
                <td style="border: 1px solid blue; font-family: khmermef2" rowspan="3">ប្រភេទកម្រាល</td>
                <td style="border: 1px solid blue; font-family: khmermef2" rowspan="3">លេខកូដ</td>
                <td style="border: 1px solid blue; font-family: khmermef2" rowspan="3">ឃុំ/សង្កាត់</td>
                <td style="border: 1px solid blue; font-family: khmermef2" rowspan="3">ឈ្មោះផ្លូវ</td>
                <td style="border: 1px solid blue; font-family: khmermef2" rowspan="3">ប្រវែង (ម)</td>
                <td style="border: 1px solid blue; font-family: khmermef2" rowspan="3">ទទឹង (ម)</td>
                <td style="border: 1px solid blue; font-family: khmermef2; height:40px;" colspan="4">និយាមកា</td>
                <td style="border: 1px solid blue; font-family: khmermef2" rowspan="3">ប្រភេទផ្លូវ</td>
                <td style="border: 1px solid blue; font-family: khmermef2" rowspan="3">ប្រភពថវិកា</td>
                <td style="border: 1px solid blue; font-family: khmermef2" rowspan="3">អនុវត្តន៍ដោយ</td>
                <td style="border: 1px solid blue; font-family: khmermef2" rowspan="3">ឆ្នាំ​ជួសជុល</td>
                </tr>
            <tr>
                <td style="border: 1px solid blue; height:40px; font-family: khmermef2" colspan="2">ចំនុចដើមផ្លូវ</td>
                <td style="border: 1px solid blue; height:40px; font-family: khmermef2" colspan="2">ចំនុចចុងផ្លូវ</td>
            </tr>
            <tr>
                <td style="border: 1px solid blue; font-family: khmermef2" >x</td>
                <td style="border: 1px solid blue; font-family: khmermef2">y</td>
                <td style="border: 1px solid blue; font-family: khmermef2">x</td>
                <td style="border: 1px solid blue; font-family: khmermef2">y</td>
            </tr>
        </thead>
            <tbody>';

// by role ===========
$pr_code = $this->session->userdata('pr_code');
$sWhere = "";
if ($pr_code == "") {
    $sWhere .= "1=1 ";
} else {
    $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
}

$where = '';
if ($type_building != '') {
    $where .= "AND (pu.type_building = '{$type_building}') ";
}

$qr = query("SELECT
                                rd.road_id,
                                rd.idtemp,
                                rd.road_name,
                                rd.type,
                                rd.length,
                                rd.width,
                                rd.first_point_x,
                                rd.first_point_y,
                                rd.last_point_x,
                                rd.last_point_y,
                                rd.type_building,
                                rd.name_building,
                                rd.commune,
                                rd.activity,
                                rd.apply_by,
                                rd.year_construct,
                                rd.source_budget,
                                pv.type_pavement
                        FROM
                                (
                                        SELECT
                                                rd.road_id,
                                                rd.idtemp,
                                                rd.road_name,
                                                rd.type,
                                                rd.length,
                                                rd.width,
                                                rd.first_point_x,
                                                rd.first_point_y,
                                                rd.last_point_x,
                                                rd.last_point_y,
                                                rd.type_building,
                                                rd.name_building,
                                                rd.commune,
                                                hi.activity,
                                                hi.apply_by,
                                                hi.year_construct,
                                                hi.source_budget
                                        FROM
                                                (
                                                        SELECT
                                                                rd.road_id,
                                                                rd.idtemp,
                                                                rd.road_name,
                                                                rd.type,
                                                                rd.length,
                                                                rd.width,
                                                                rd.first_point_x,
                                                                rd.first_point_y,
                                                                rd.last_point_x,
                                                                rd.last_point_y,
                                                                rd.type_building,
                                                                rd.name_building,
                                                                ge.commune
                                                        FROM
                                                                (
                                                                        SELECT
                                                                                rd.road_id,
                                                                                rd.idtemp,
                                                                                rd.road_name,
                                                                                rd.type,
                                                                                rd.length,
                                                                                rd.width,
                                                                                rd.first_point_x,
                                                                                rd.first_point_y,
                                                                                rd.last_point_x,
                                                                                rd.last_point_y,
                                                                                pu.type_building,
                                                                                pu.name_building
                                                                        FROM
                                                                                road_info AS rd
                                                                        INNER JOIN public_building AS pu ON rd.road_id = pu.road_id
                                                                        WHERE
                                                                                {$sWhere} {$where}
                                                                ) AS rd
                                                        INNER JOIN geography AS ge ON rd.road_id = ge.road_id
                                                ) AS rd
                                        INNER JOIN history AS hi ON rd.road_id = hi.road_id
                                ) AS rd
                        INNER JOIN pavement AS pv ON rd.road_id = pv.road_id
                        GROUP BY
                                rd.idtemp
                        ORDER BY
                                rd.idtemp - 0 ASC ");
if ($qr->num_rows() > 0) {
    $i = 1;
    $to = 0;
    foreach ($qr->result() as $row) {
        $html .= "<tr>" .
                "<td style='height: 40px; border: 1px solid blue;'>" . $i . "</td>" .
                "<td style='height: 40px; border: 1px solid blue;'>" . $row->type_pavement . "</td>" .
                "<td style='height: 40px; border: 1px solid blue;'>" . $row->idtemp . "</td>" .
                "<td style='height: 40px; border: 1px solid blue; text-align:left;'>" . $row->commune . "</td>" .
                "<td style='height: 40px; border: 1px solid blue; text-align:left;'>" . $row->road_name . "</td>" .
                "<td style='height: 40px; border: 1px solid blue; text-align:right;'>" . $row->length_pavement . "</td>" .
                "<td style='height: 40px; border: 1px solid blue;'>" . $row->width . "</td>" .
                "<td style='height: 40px; border: 1px solid blue;'>" . $row->first_point_x_pavement . "</td>" .
                "<td style='height: 40px; border: 1px solid blue;'>" . $row->first_point_y_pavement . "</td>" .
                "<td style='height: 40px; border: 1px solid blue;'>" . $row->last_point_x_pavement . "</td>" .
                "<td style='height: 40px; border: 1px solid blue;'>" . $row->last_point_y_pavement . "</td>" .
                "<td style='height: 40px; border: 1px solid blue;'>" . $row->type . "</td>" .
                "<td style='height: 40px; border: 1px solid blue; text-align:left;'>" . $row->source_budget . "</td>" .
                "<td style='height: 40px; border: 1px solid blue; text-align:left;'>" . $row->apply_by . "</td>" .
                "<td style='height: 40px; border: 1px solid blue;'>" . $row->year_construct . "</td>" .
                "</tr>";
        $to += $row->length_pavement - 0;
        $i++;
    }
}
$html .= '</tbody>
            <tfoot>
                <tr>
                    <td style="height: 40px;border: 1px solid blue;" colspan="5">សរុប</td>
                    <td style="height: 40px;border: 1px solid blue;text-align:right;">' . $to . '</td>
                    <td style="border: 1px solid blue;" colspan="9"></td>                        
                </tr>
            </tfoot>
        </table>';
$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->AddPage('L', 'A4');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit();

