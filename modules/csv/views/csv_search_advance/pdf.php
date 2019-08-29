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
if ($lastname != '') {
    $where .= "AND ( cs.lastname LIKE '%{$lastname}%' ) ";
    $title .= ' គោតនាម';
}
if ($firstname != '') {
    $where .= "AND ( cs.firstname LIKE '%{$firstname}%' ) ";
    $title .= ' នាម';
}
if ($gender != '') {
    $where .= "AND ( cs.gender LIKE '%{$gender}%' ) ";
    $title .= ' ភេទ';
}
if ($dateofbirth != '') {
    $where .= "AND ( cs.dateofbirth LIKE '%{$dateofbirth}%' ) ";
    $title .= ' ថ្ងៃខែឆ្នាំកំណើត';
}
if ($date_in != '') {
    $where .= "AND ( cs.date_in LIKE '%{$date_in}%' ) ";
    $title .= ' ថ្ងៃខែឆ្នាំចូលក្របខ័ណ្ឌរដ្ឋ';
}
if ($date_out != '') {
    $where .= "AND ( cs.date_out LIKE '%{$date_out}%' ) ";
    $title .= ' ថ្ងៃខែឆ្នាំចូលនិវត្តន៍';
}
if ($current_role != '') {
    $where .= "AND (cs.current_role_id = '{$current_role}')";
    $title .= ' តួនាទី';
}
if ($unit != '') {
    $where .= "AND ( cs.unit = '{$unit}' ) ";
    $title .= ' អង្គភាព';
}
if ($work_office != '') {
    $where .= "AND ( cs.work_office = '{$work_office}' ) ";
     $title .= ' ការិយាល័យ';
}
if ($work_location != '') {
    $where .= "AND ( cs.work_location = '{$work_location}' ) ";
    $title .= ' ទីតាំងបម្រើការងារ';
}
if ($pure_salary != '') {
    $where .= "AND ( cs.pure_salary = '{$pure_salary}' ) ";
    $title .= ' បៀវត្សសុទ្ធសាធ';
}
if ($language != '') {
    $where .= "AND ( l.language = '{$language}' ) ";
     $title .= ' ភាសាបរទេស';
}
if ($degree_level != '') {
    $where .= "AND ( cs.degree_level = '{$degree_level}' ) ";
    $title .= ' សញ្ញាប័ត្រ';
}
if ($skill != '') {
    $where .= "AND ( cs.skill = '{$skill}' ) ";
    $title .= ' ជំនាញ';
}
if ($country != '') {
    $where .= "AND ( cs.country = '{$country}' ) ";
     $title .= ' ប្រទេស';
}
if ($study_place != '') {
    $where .= "AND ( cs.study_place = '{$study_place}' ) ";
    $title .= '  ទីកន្លែងសិក្សា';
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
        	cs.dateofbirth,
        	cs.mobile_phone,
            cs.unit_official_code,
        	cs.current_role_id,
        	cs.unit,
            IF(cs.unit_name IS NULL ,'',cs.unit_name ) as unit_name,
        	cs.work_office,
            IF(cs.office IS NULL ,'',cs.office ) as office,
            cs.current_role_in_khmer,
        	cs.work_location,
        	cs.date_in,
        	cs.date_out,
        	cs.salary_level,
        	cs.pure_salary,
        	cs.country,
        	cs.skill,
        	cs.study_place,
        	cs.degree_level,
        	l.`language`
FROM
	(
		SELECT
			cs.id,
			cs.civil_servant_id,
			cs.firstname,
			cs.lastname,
			cs.gender,
			cs.dateofbirth,
			cs.mobile_phone,
            cs.unit_official_code,
			cs.current_role_id,
			cs.unit,
            cs.unit_name,
			cs.work_office,
            cs.office,
            cs.current_role_in_khmer,
			cs.work_location,
			cs.date_in,
			cs.date_out,
			cs.salary_level,
			cs.pure_salary,
			d.country,
			d.skill,
			d.study_place,
			d.degree_level
		FROM
			(
				SELECT
					cs.id,
					cs.civil_servant_id,
					cs.firstname,
					cs.lastname,
					cs.gender,
					cs.dateofbirth,
					cs.mobile_phone,
                    cs.unit_official_code,
					cs.current_role_id,
					cs.unit,
                    cs.unit_name,
					cs.work_office,
                    cs.office,
                    cs.current_role_in_khmer,
					cs.work_location,
					cs.date_in,
                    cs.date_out,                
					s.salary_level,
					s.pure_salary
				FROM
					(
						SELECT
							cs.id,
							cs.civil_servant_id,
							cs.firstname,
							cs.lastname,
							cs.gender,
							cs.dateofbirth,
							cs.mobile_phone,
                            cs.unit_official_code,
							w.current_role_id,
							w.unit,
                            u.unit as unit_name,
							w.work_office,
                            o.office,
                            cr.current_role_in_khmer,
							w.work_location,
							w.date_in,
							w.date_out
						FROM
							civilservant AS cs
						  INNER JOIN `work` AS w ON cs.id = w.id
                          LEFT JOIN offices AS o ON o.id= w.work_office
                          LEFT JOIN unit AS u ON u.id = w.unit
                          LEFT JOIN `currentrole` AS cr ON cr.id= w.current_role_id
						WHERE
							1 = 1
					) AS cs
				LEFT JOIN salary AS s ON cs.id = s.id
				WHERE
					1 = 1
			) AS cs
		LEFT JOIN degree AS d ON cs.id = d.id
		WHERE
			1 = 1
	) AS cs
LEFT JOIN `language` AS l ON cs.id = l.id
WHERE
	1 = 1 
	  {$where} ";
$sql.=' GROUP BY
	cs.id
            ORDER BY
	cs.id - 0 ASC';
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
                "<td style='border: 1px solid blue;'>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .
                "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .
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
