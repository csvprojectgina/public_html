<?php

include_once(APPPATH . "libraries/mpdf60/mpdf.php");
$mpdf = new mPDF();
$title = 'ស្ថិតិមន្រ្តីរាជការ ក្របខណ្ឌថ្មីតាមឆ្នាំ';
$mpdf->simpleTables = true;
$mpdf->useSubstitutions = false;
$mpdf->incrementFPR1 = 1;
ini_set('memory_limit', '100024M');
set_time_limit(80000);

$strsql = "SELECT   cs.id,
                    cs.civil_servant_id,
                    cs.firstname,
                    cs.lastname,
                    cs.gender,                         
                    u.unit AS unit_name,
                    cr.current_role_in_khmer,
                    w.date_in
                                                        
            FROM
                    civilservant AS cs
                    LEFT JOIN `work` AS w ON cs.id = w.id
                    LEFT JOIN unit AS u ON u.id = w.unit
                    LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id
            WHERE w.`date_in`!='null'";

$header = '<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
                <td width="33%">ក្រសួងរៀបចំដែនដី នគរូបនីយកម្ម និងសំណង់<span style="font-size:10pt;"></td>
                <td></td>
                <td width="33%" style="text-align: right;"><span style="font-weight: bold;"></span></td>
                </tr></table>';
$footer = '<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
            <td width="30%"><span style="font-size:10pt;"></td>
            </tr></table>
            <table  width="100%" style="border-bottom: 0px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
            <td width="33%" style="text-align: right;"><span style="font-weight: bold;">{PAGENO}/{nb}</span></td>
            </tr></table>';
$html = '';
$html .= '<p style="font-family: khmermef2;text-align: center;font-size: 18px">' . $title . '</p>';
$body = '<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse;font-family: khmermef1; width: 100%; text-align: center;">
           <thead>
            <tr style="background-color: lightgrey;">
                <th style="border: 1px solid blue; font-family: KhmerOS; font-size:14px">ល.រ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; font-size:14px">ឈ្មោះ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; font-size:14px ">ភេទ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; font-size:14px">មុខតំណែង</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; font-size:14px ">អង្គភាព</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; font-size:14px ">កាលបរិច្ឆេទចូលក្របខ័ណ្ឌ</th>
              
               
            </tr>
        </thead>
            <tbody>';


$i = 0;
$month = array("01" => "មករា", "02" => "កុម្ភះ",
    "03" => "មិនា", "04" => "មេសា",
    "05" => "ឧសភា", "06" => "មិថុនា",
    "07" => "កក្កដា", "08" => "សីហា",
    "09" => "កញ្ញា", "10" => "តុលា",
    "11" => "វិច្ឆិកា", "12" => "ធ្នូ");

foreach ($month as $k => $value) {
    $getleader = $this->db->query(" {$strsql} AND w.date_in LIKE '{$by_year}-{$k}%'");
    if ($getleader->num_rows() > 0) {

        foreach ($getleader->result() as $row) {
            $body .= '<tr>
                        <td style="height: 20px;">' . ++$i . '</td>
                        <td style="height: 20px;">' . $row->lastname . ' ' . $row->firstname . '</td>
                        <td style="height: 20px;">' . $row->gender . '</td>
                        <td style="height: 20px;">' . $row->current_role_in_khmer . '</td>
                        <td style="height: 20px;">' . $row->unit_name . '</td>
                        <td style="height: 20px;">' . date('d-M-Y', strtotime($row->date_in)) . '</td>
                        
                        </tr>';

        }
        $body .= '<tr>
                    <td colspan="6" style="text-align: left; height: 30px;">សរុប ខែ' . $value . ' ' . 'ចំនួន ' . $getleader->num_rows() . 'នាក់' .
                    '</td>
                  </tr>';
    }
}

$body .= '</tbody>
            <tfoot>
                <tr>
                    <td colspan="6" style="text-align: left;padding: 10px 0 0 0;  height: 45px;">សរុបមន្ត្រី <b>' . $i . ' នាក់</b></td>
                </tr>
            </tfoot>
        </table>';

$html .= $body;


$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->AddPage('P', 'A4', '', '', '', '5', '5', '10', '0', '3', '0');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit();

?>