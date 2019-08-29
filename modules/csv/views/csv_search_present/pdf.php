<?php
include_once(APPPATH . "libraries/mpdf60/mpdf.php");
$mpdf = new mPDF();
$title='បញ្ជីមន្ត្រីរាជការតាម';
// ==========
$mpdf->simpleTables = true;
$mpdf->useSubstitutions = false;
$mpdf->incrementFPR1 = 1;
ini_set('memory_limit', '100024M');
set_time_limit(80000);

 $where = '';
        if ($search != '') {
            $where .= "AND (cs.gender LIKE '%{$search}%' ";
            $where .= "OR cs.lastname LIKE '%{$search}%' ";
            $where .= "OR cs.gender LIKE '%{$search}%' ";
            $where .= "OR w.current_role LIKE '%{$search}%' ";
            $where .= "OR w.unit LIKE '%{$search}%')";
             $title .= ' '.$search.'';
        }      

$header = '<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
                <td width="33%">ក្រសួងអភិវឌ្ឍន៍ជនបទ<span style="font-size:10pt;"></td>
                <td></td>
                <td width="33%" style="text-align: right;"><span style="font-weight: bold;"></span></td>
                </tr></table>';
$footer = '<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
            <td width="30%"><span style="font-size:10pt;"></td>
            </tr></table>
            <table  width="100%" style="border-bottom: 0px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>
            <td width="33%" style="text-align: right;"><span style="font-weight: bold;">{PAGENO}/{nb}</span></td>
            </tr></table>';
$html='';
$html .= '<p style="font-family: khmermef2;text-align: center;font-size: 18px">' . $title . '</p>';

$html .= '<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse;font-family: khmermef1; width: 100%; text-align: center;"> 
           <thead>
            <tr>
                <td style="border: 1px solid blue; font-family: khmermef2; width: 5%; height: 45px;">ល.រ</td>                
                <td style="border: 1px solid blue; font-family: khmermef2; width: 10%; height: 20px;">អត្តលេខមន្ត្រី</td>  
                <td style="border: 1px solid blue; font-family: khmermef2; width: 10%; height: 20px;">គោត្តនាម</td>  
                <td style="border: 1px solid blue; font-family: khmermef2; width: 10%; height: 20px;">នាម</td>
                <td style="border: 1px solid blue; font-family: khmermef2; width: 5%; height: 20px;">ភេទ</td>
                <td style="border: 1px solid blue; font-family: khmermef2; width: 10%; height: 20px;">ថ្ងៃ​ខែឆ្នាំ កំណើត</td>
                <td style="border: 1px solid blue; font-family: khmermef2; width: 10%; height: 20px;">ទូរស័ព្ទ</td>
                <td style="border: 1px solid blue; font-family: khmermef2; width: 10%; height: 20px;">តួនាទី</td>
                <td style="border: 1px solid blue; font-family: khmermef2; width: 10%; height: 20px;">អង្គភាព</td>
            </tr>
        </thead>
            <tbody>';
$sql = '';
$sql.="SELECT
                                    cs.id,
                                    cs.civil_servant_id,
                                    cs.firstname,
                                    cs.lastname,
                                    cs.gender,
                                    cs.unit_official_code,
                                    DATE_FORMAT(cs.dateofbirth, '%d-%b-%Y') AS dateofbirth,
                                    cs.mobile_phone,
                                    w.current_role,
                                    w.unit
                            FROM
                                    civilservant AS cs
                            INNER JOIN `work` AS w ON cs.id = w.id
                            WHERE
                                    1 = 1 AND cs.id NOT IN (
	SELECT
		wd.id
	FROM
		workframeworkout AS wf
	RIGHT JOIN worknamedeleting AS wd ON wd.id = wf.id
	WHERE
		wd.id NOT IN (
			SELECT
				wf.id
			FROM
				workframeworkout AS wf
		)
)
AND cs.id NOT IN (
	SELECT
		wt.id
	FROM
		worktransfer AS wt
) {$where} ";
$sql.=' GROUP BY
	cs.id';
$sql.=" ORDER BY
                    CASE
            WHEN cs.unit_official_code IN ('', '0') THEN
                    1
            ELSE
                    0
            END,
             -cs.unit_official_code DESC";
$qr = query($sql);
if ($qr->num_rows() > 0) {
    $i = 1;
    $tr = '';
        foreach ($qr->result() as $row) {
        $tr .= "<tr>" .
                "<td style='border: 1px solid blue; height: 30px;'>" . $i . "</td>" .
                "<td style='border: 1px solid blue;'>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .
                "<td style='border: 1px solid blue;'>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .  
                "<td style='border: 1px solid blue;'>" . ($row->firstname != '' ? $row->firstname : '') . "</td>" .  
                "<td style='border: 1px solid blue;'>" . ($row->gender != '' ? $row->gender : '') . "</td>" .  
                "<td style='border: 1px solid blue;'>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .  
                "<td style='border: 1px solid blue;'>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .  
                "<td style='border: 1px solid blue;'>" . ($row->current_role != '' ? $row->current_role : '') . "</td>" .  
                "<td style='border: 1px solid blue;'>" . ($row->unit != '' ? $row->unit : '') . "</td>" .                  
                "</tr>";        
        $i++;
    }
    $to = $i;
}
$html .= $tr;
$html .= '</tbody>
            <tfoot>
                <tr>
                    <td colspan="9" style="text-align: left;padding: 10px 0 0 0;  height: 45px;">សរុបមន្ត្រី <b>' .($to - 1). 'នាក់</b></td>                        
                </tr>
            </tfoot>
        </table>';
$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->AddPage('L', 'A4', '', '', '', '5', '5', '', '', '3');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit();



