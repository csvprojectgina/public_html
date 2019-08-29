<?php

include_once(APPPATH . "libraries/mpdf60/mpdf.php");
$mpdf = new mPDF();
$title = 'បញ្ជីឈ្មោះមន្ត្រីចូលនិវត្តន៍ ទីស្តីការក្រសួងរៀបចំដែនដី នគរូបនីយកម្ម និងសំណង់ ';
$mpdf->simpleTables = true;
$mpdf->useSubstitutions = false;
$mpdf->incrementFPR1 = 1;
ini_set('memory_limit', '1000240M');
set_time_limit(800000);

$k = 0;

$query_unit = $this->db->query('select * from unit');

$strsql = "SELECT * FROM v_retired ";

$year = $this->input->get('year');

if($year != 0){
    $withyear = " AND retiredate LIKE '{$year}%'";
    $title .= ' ក្នុងឆ្នាំ  '. $year;
}else{
    $withyear ='';
}


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
            <tr>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 40px; font-size:12px">ល.រ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 120px; font-size:12px">អត្តលេខ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 160px; font-size:12px ">នាម និងគោត្តនាម</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 40px; font-size:12px">ភេទ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 100px;font-size:12px ">ថ្ងៃ​ខែឆ្នាំ កំណើត</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 125px;font-size:12px ">មុខងារ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 60px;font-size:12px ">ក្របខ័ណ្ឌ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 90px;font-size:11px">ថ្ងៃខែឆ្នាំ ចូលបម្រើការងារ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 90px;font-size:11px">ថ្ងៃខែឆ្នាំ ចូលនិវត្តន៍</th> 
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 90px;font-size:11px">អតីតភាពការងារ</th>  
            </tr>
        </thead>
            <tbody>';

foreach ($query_unit->result() as $row) {

    $officer = $this->db->query("$strsql   WHERE
                     1 = 1 AND  retiredate <  DATE(NOW())  AND unit ={$row->id} {$withyear} ORDER BY CASE  WHEN common_official_code IN ('', '0')  THEN 1 ELSE 0 END,  common_official_code ASC");
    if ($officer->num_rows() > 0) {
        $body .= '<tr>
                             <td colspan="10" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $row->unit . '</td>
                          </tr>';
        foreach($officer->result() as $rows){
            
            if($rows->date_in =="0000-00-00"){
                $date_in = $rows->date_in;
            }else{
                $date_in = date('d-m-Y',strtotime($rows->date_in));
            }
            
             $body .= ' <tr><td>' . ++$k . '</td> <td>' . $rows->civil_servant_id . '</td><td style="text-align:left">' . $rows->lastname . ' ' . $rows->firstname . '</td> <td>' . $rows->gender . '</td><td>' . $rows->dateofbirth . '</td> <td>' . $rows->current_role_in_khmer . '</td><td>' . $rows->levelsalary . '</td><td>' .$date_in . '</td><td>' . date('d-m-Y',strtotime($rows->retiredate)) . '</td><td></td></tr>';
        }
        
    }
}
$body .= '</tbody>
            <tfoot>
                <tr>
                    <td colspan="10" style="text-align: left;padding: 10px 0 0 0;  height: 45px;">សរុបមន្ត្រី <b>' . $k . ' នាក់</b></td>
                </tr>
            </tfoot>
        </table>';


$html .= $body;

$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);

$mpdf->AddPage('P', 'A4', '', '', '', '2', '2', '15', '0', '0', '0');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit();

