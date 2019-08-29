<?php
include_once(APPPATH . "libraries/mpdf60/mpdf.php");
$mpdf = new mPDF();
$pavement = isset($pavement) ? $pavement : '';

$header = '
<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
<td width="33%">ក្រសួងអភិវឌ្ឍន៍ជនបទ<span style="font-size:10pt;"></td>
<td></td>
<td width="33%" style="text-align: right;"><span style="font-weight: bold;"></span></td>
</tr></table>
';
$footer = '
    <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
    <td width="30%"><span style="font-size:10pt;"></td>
    </tr></table>
    <table  width="100%" style="border-bottom: 0px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
    <td width="33%" style="text-align: right;"><span style="font-weight: bold;">{PAGENO}/{nb}</span></td>
    </tr></table>
         ';
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
$qr = query("SELECT
                        r.road_id,
                        r.idtemp,
                        r.road_name,
                        r.type,
                        r.width,
                        r.type_pavement,
                        r.first_point_x_pavement,
                        r.first_point_y_pavement,
                        r.last_point_x_pavement,
                        r.last_point_y_pavement,
                        r.length_pavement,
                        r.year_construct,
                        r.apply_by,
                        r.source_budget,
                        g.commune
                FROM
                        (
                                SELECT
                                        r.road_id,
                                        r.idtemp,
                                        r.road_name,
                                        r.type,
                                        r.width,
                                        r.type_pavement,
                                        r.first_point_x_pavement,
                                        r.first_point_y_pavement,
                                        r.last_point_x_pavement,
                                        r.last_point_y_pavement,
                                        r.length_pavement,
                                        h.year_construct,
                                        h.apply_by,
                                        h.source_budget
                                FROM
                                        (
                                                SELECT
                                                        r.road_id,
                                                        r.idtemp,
                                                        r.road_name,
                                                        r.type,
                                                        r.width,
                                                        p.type_pavement,
                                                        p.first_point_x_pavement,
                                                        p.first_point_y_pavement,
                                                        p.last_point_x_pavement,
                                                        p.last_point_y_pavement,
                                                        p.length_pavement
                                                FROM
                                                        road_info AS r
                                                INNER JOIN pavement AS p ON r.road_id = p.road_id
                                                WHERE
                                                        p.type_pavement='{$pavement}'
                                        ) AS r
                                INNER JOIN history AS h ON r.road_id = h.road_id
                                        ) AS r
                                INNER JOIN geography AS g ON r.road_id = g.road_id
                                GROUP BY
                                    r.idtemp
                                ORDER BY
                                    r.idtemp - 0 ASC");
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
                "<td style='height: 40px; border: 1px solid blue;  text-align:right;'>" . $row->length_pavement . "</td>" .
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
$mpdf->AddPage('L','A4');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit();



