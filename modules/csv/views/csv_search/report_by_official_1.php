<?php

include_once(APPPATH . "libraries/mpdf60/mpdf.php");
$mpdf = new mPDF();
$title = 'បញ្ជីឈ្មោះមន្រ្តីបម្រើការងារក្នុងទីស្តីការក្រសួងរៀបចំដែនដី នគរូបនីយកម្ម និងសំណង់ ';
$mpdf->simpleTables = true;
$mpdf->useSubstitutions = false;
$mpdf->incrementFPR1 = 1;
ini_set('memory_limit', '1000240M');
set_time_limit(800000);


$strsql = "SELECT  cs.id,
                	cs.civil_servant_id,
                	cs.firstname,
                	cs.lastname,
                	cs.gender,
                	cs.dateofbirth,
                	cs.mobile_phone,
                	cs.common_official_code,
                	w.current_role,
                	w.unit,
                	u.unit AS unit_name,
                	IF(o.office IS NULL ,'',o.office ) AS office,
                    IF(pro_o.office IS NULL ,'',pro_o.office ) AS province_office,
                	w.general_department,
                	w.department,
                	w.land_official,
                	w.work_office,
                	cr.current_role_in_khmer,
                	w.work_location,
                	w.date_in,
                	w.date_out,
                                w.current_role_id,
                            IF (ls.salary_level IS NULL,'',ls.salary_level) AS levelsalary, 
                     IF( lofc.land_official IS NULL,'',lofc.land_official) AS landofficail
                                
FROM
	civilservant AS cs
LEFT JOIN `work` AS w ON cs.id = w.id
LEFT JOIN offices AS o ON o.id = w.work_office
LEFT JOIN province_office AS pro_o ON pro_o.id = w.province_office
LEFT JOIN unit AS u ON u.id = w.unit
LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id
LEFT JOIN land_officials AS lofc ON lofc.id = w.land_official
LEFT JOIN salary AS ls ON ls.id=cs.id  WHERE 1=1  ";

$where = "  ";
$where_depar = ' ';
$where_office_b = '  ';
$where_office_b2 = '';
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
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 50px; font-size:11px">ល.រ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 120px; font-size:11px">អត្តលេខ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 160px; font-size:11px ">នាម និងគោត្តនាម</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 40px; font-size:11px">ភេទ</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 100px;font-size:11px ">ថ្ងៃ​ខែឆ្នាំ កំណើត</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 125px;font-size:11px ">តួនាទី</th>
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 60px;font-size:11px ">កាំប្រាក់</th>
                
                <th style="border: 1px solid blue; font-family: KhmerOS; width: 90px;font-size:11px">ទូរស័ព្ទ</th>               
            </tr>
        </thead>
            <tbody>';

$unit = $this->input->get('unit');
$queryunit = $this->db->query('SELECT * FROM unit WHERE id =' . $unit)->row();


switch ($unit) {
    case 1:

        $k = 1;
        $j = 2;
        $getleader = $this->db->query(" {$strsql}
  AND w.unit = {$queryunit->id}  AND w.current_role_id =1");
        if ($getleader->num_rows() == 1) {
            $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">1. ថ្នាក់ដឹកនំាក្រសួង​</td>    </tr>';
            $body .= ' <tr><td>1</td> <td>' . $getleader->row()->civil_servant_id . '</td><td style="text-align:left">' . $getleader->row()->lastname . ' ' . $getleader->row()->firstname . '</td> <td>' . $getleader->row()->gender . '</td><td>' . $getleader->row()->dateofbirth . '</td> <td>' . $getleader->row()->current_role_in_khmer . '</td><td>' . $getleader->row()->levelsalary . '</td><td>' . $getleader->row()->mobile_phone . '</td></tr>';
        } else {


            $body .= '<tr> <td colspan="7" style="background-color:#eee;text-align:left; height:40px">1.' . $queryunit->current_role_in_khmer . ' </td>    </tr>';
        }
        $query_get_currentrole = $this->db->query("SELECT * FROM currentrole WHERE id  IN (2,3,4)");
        $getoffice = 'អគ្កនាយករដ្ឋបាល';
        $where .= ' AND w.general_department =7 AND w.current_role_id IN (5,6)';

        $title_dep_office = '1.1.នាយកដ្ឋាន រដ្ឋបាល និង កិច្ចការទួទៅ';

        $where_depar .= ' AND w.general_department =7 AND w.department =69 AND w.current_role_id IN (8,7,15,17) ';

        $title_office_b1 = '5. ជំនួយ​រដ្ឋលេខាធិការ';
        $where_office_b1 .= ' AND   w.current_role_id=20 ';

        $title_office_b = '2.1. ការិយាល័យ របៀប';
        $where_office_b .= ' AND w.general_department =7 AND w.department =69 AND  w.work_office =24  ';

        $title_office_b2 = '2.2 ការិយាល័យ កិច្ចការទូទៅ';
        $where_office_b2 = ' AND w.general_department =7 AND w.department =69 AND  w.work_office =25';

        $title_office_b3 = '2.3 ការិយាល័យ ពិធីការ និង ពត៌មាន';
        $where_office_b3 = ' AND w.general_department =7 AND w.department =69 AND  w.work_office =27';

        $title_office_b4 = '2.4​ ការិយាល័យ តម្កល់ឯកសារ';
        $where_office_b4 = 'AND w.general_department =7 AND w.department =69 AND  w.work_office =26';

        $title_office_b5 = '3. នាយកដ្ឋាន បុគ្គលិក';
        $where_office_b5 = 'AND w.general_department =7 AND w.department =68 AND w.current_role_id IN (8,7) ';

        $title_office_b6 = '3.1. ការិយាល័យ បុគ្គលិក';
        $where_office_b6 = ' AND w.general_department =7 AND w.department =68 AND w.current_role_id IN (9,10,15,17) AND w.work_office IN (19,240)';


        $title_office_b7 = '3.2. ការិយាល័យ ក្របខណ្ឌ និង បៀវត្ស';
        $where_office_b7 = ' AND w.general_department =7 AND w.department =68  AND w.work_office IN (23)';


        $title_office_b8 = '3.3. ការិយាល័យគោលនយោបាយ និងបណ្តុះបណ្តាល';
        $where_office_b8 = ' AND w.general_department =7 AND w.department =68  AND w.work_office IN (20)';


        $title_office_b9 = '4. នាយកដ្ឋាន ផែនការសេដ្ឋកិច្ច និង ហិរញ្ញកិច្ច';
        $where_office_b9 = ' AND w.general_department =7 AND w.department =70 AND w.current_role_id IN (7,8)';

        $title_office_b10 = '4.1. ការិយាល័យគ្រប់គ្រង និងផ្គត់ផ្គង់';
        $where_office_b10 = ' AND w.general_department =7 AND w.department =70 AND w.work_office=28 ';


        $title_office_b11 = '4.2. ការិយាល័យ គណនេយ្យ';
        $where_office_b11 = ' AND w.general_department =7 AND w.department =70 AND w.work_office=30 ';


        $title_office_b12 = '4.3. ការិយាល័យ ហិរញ្ញកិច្ច';
        $where_office_b12 = ' AND w.general_department =7 AND w.department =70 AND w.work_office=29 ';

        $title_office_b13 = '4.4. ការិយាល័យ ផែនការសេដ្ឋកិច្ច';
        $where_office_b13 = ' AND w.general_department =7 AND w.department =70 AND w.work_office=31 ';

        $title_office_b14 = '5. នាយកដ្ឋាន អភិវឌ្ឍន៍សេដ្ឋកិច្ច កិច្ចការវិនិយោគ និង ទំនាក់ទំនងអន្តជាតិ';
        $where_office_b14 = ' AND w.general_department =7 AND w.department =71 AND w.current_role_id IN (7,8,17,15) ';

        $title_office_b15 = '5.1. ការិយាល័យ អភិវឌ្ឍន៍សេដ្ឋកិច្ច';
        $where_office_b15 = ' AND w.general_department =7 AND w.department =71 AND w.work_office=32 ';
        $title_office_b16 = '5.2. ការិយាល័យ កិច្ចការវិនិយោគ';
        $where_office_b16 = ' AND w.general_department =7 AND w.department =71 AND w.work_office=36 ';

        $title_office_b17 = '5.3.  ការិយាល័យ អាស៊ាន និងទំនាក់ទំនងអន្តរជាតិ';
        $where_office_b17 = ' AND w.general_department =7 AND w.department =71 AND w.work_office=33 ';

        $title_office_b18 = '6 . នាយកដ្ឋាន​ និតិកម្ម';
        $where_office_b18 = ' AND w.general_department =7 AND w.department =72 AND w.current_role_id IN (7,8)  ';

        $title_office_b19 = '6.1 . ការិយាល័យ និតិកម្ម';
        $where_office_b19 = ' AND w.general_department =7 AND w.department =72 AND w.work_office=34 ';

        $title_office_b20 = '6.2 . ការិយាល័យ កិច្ចការគតិយុត្តិ';
        $where_office_b20 = ' AND w.general_department =7 AND w.department =72 AND w.work_office=35 ';

        $title_office_b21 = 'នាយកដ្ឋានបុគ្គលិក';
        $where_office_b21 = ' AND w.general_department =7 AND w.department =68 AND w.current_role_id =16 ';

        $title_office_b22 = 'នាយកដ្ឋានរដ្ឋបាល';
        $where_office_b22 = ' AND w.general_department =7 AND w.department =69 AND w.current_role_id =16 ';

        $title_office_b23 = 'នាយកដ្ឋាន ផែនការសេដ្ឋកិច្ច និង ហិរញ្ញកិច្ច';
        $where_office_b23 = ' AND w.general_department =7 AND w.department =70 AND w.current_role_id =16';

        $title_office_b24 = 'នាយកដ្ឋាន អភិវឌ្ឍន៍សេដ្ឋកិច្ច កិច្ចការវិនិយោគ និង ទំនាក់ទំនងអន្ដរជាតិ';
        $where_office_b24 = ' AND w.general_department =7 AND w.department =71 AND w.current_role_id =16';


        $title_office_b25 = 'នាយកដ្ឋាននីតិកម្ម';
        $where_office_b25 = ' AND w.general_department =7 AND w.department =72 AND w.current_role_id =16';


        $title_office_b26 = '1.អគ្គនាយក~​អគ្គនាយករង នៃ​អគ្គនាយកដ្ឋាន​សំណង់ ';
        $where_office_b26 = ' AND w.general_department =3 AND  w.current_role_id IN (5,6,17)';


        $title_office_b27 = '2.នាយកដ្ឋាន​ស្រាវជ្រាវ​បច្ចេកទេសសំណង់';

        $title_office_b28 = '2.1. ថ្នាក់​ដឹកនាំ​នាយកដ្ឋាន  ';
        $where_office_b28 = ' AND w.general_department =3 AND w.department =97 AND w.current_role_id IN (7,8)';

        $title_office_b29 = '2.2 ការិយាល័យ បទដ្ឋាន និងបទប្បញ្ញត្តិ​វិស្វកម្ម ';
        $where_office_b29 = ' AND w.general_department =3 AND w.department =97 AND w.current_role_id IN (9,10,15,16,17) AND  w.work_office=56';

        $title_office_b30 = '2.3 ការិយាល័យ កិច្ចការទូទៅព័ត៌មាន និងឯកសារ ';
        $where_office_b30 = ' AND w.general_department =3 AND w.department =97 AND w.current_role_id IN (9,10,15,16,17) AND  w.work_office=58';

        $title_office_b31 = ' 2.4. ការិយាល័យ បទដ្ឋាន និងបទប្បញ្ញត្តិ​ស្ថាបត្យកម្ម ';
        $where_office_b31 = ' AND w.general_department =3 AND w.department =97 AND w.current_role_id IN (9,10,15,16,17) AND  w.work_office=57';

        $title_office_b33 = '3-នាយកដ្ឋានសិក្សាគម្រោងប្លង់';
        $title_office_b32 = '3.1- ថ្នាក់​ដឹកនាំ​នាយកដ្ឋាន  ';
        $where_office_b32 = ' AND w.general_department =3 AND w.department =96 AND w.current_role_id IN (7,8) ';

        $title_office_b34 = '3.2.-ការិយាល័យស្ថាបត្យកម្ម  ';
        $where_office_b34 = ' AND w.general_department =3 AND w.department =96 AND w.current_role_id IN (9,10,15,16,17) AND  w.work_office=53 ';

        $title_office_b35 = '3.3.-ការិយាល័យវិស្វកម្ម និងកិច្ចការតំលៃ ';
        $where_office_b35 = ' AND w.general_department =3 AND w.department =96 AND w.current_role_id IN (9,10,15,16,17) AND  w.work_office=55 ';

        $title_office_b36 = '3.4-ការិយាល័យបែបបទអាជីវកម្ម ';
        $where_office_b36 = ' AND w.general_department =3 AND w.department =96 AND w.current_role_id IN (9,10,15,16,17) AND  w.work_office=54 ';

        $title_office_b37 = 'នាយកដ្ឋាន​សំណង់ ';

        $title_office_b38 = ' I.ថ្នាក់​ដឹកនាំ​នាយកដ្ឋាន  ';
        $where_office_b38 = ' AND w.general_department =3 AND w.department =93 AND w.current_role_id IN (7,8)  ';

        $title_office_b39 = ' 1~ការិយាល័យ បទដ្ឋាន និងបទប្បញ្ញត្តិ​ការងារការដ្ឋាន  ';
        $where_office_b39 = ' AND w.general_department =3 AND w.department =93 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=50  ';


        $title_office_b40 = '  2~ការិយាល័យបច្ចេកទេស និងត្រួតពិនិត្យ  ';
        $where_office_b40 = ' AND w.general_department =3 AND w.department =93 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=51 ';

        $title_office_b41 = '  3~ការិយាល័យជួសជុល និងថែទាំ  ';
        $where_office_b41 = ' AND w.general_department =3 AND w.department =93 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=52 ';

        $title_office_b42 = '  6.1. នាយកដ្ឋានសំណង់';
        $where_office_b42 = ' AND w.general_department =3 AND w.department =93 AND w.current_role_id IN (16)  ';

        $title_office_b43 = '  6.2.នាយកដ្ឋានសិក្សាគម្រោងប្លង់';
        $where_office_b43 = ' AND w.general_department =3 AND w.department =96 AND w.current_role_id IN (16)  ';

        $title_office_b44 = '  6.3.នាយកដ្ឋានស្រាវជ្រាវបច្ចេកទេសសំណង់';
        $where_office_b44 = ' AND w.general_department =3 AND w.department =97 AND w.current_role_id IN (16)  ';

        $title_office_b45 = '  ក.ថ្នាក់ដឹកនាំអគ្គនាយកដ្ខាន​រៀបចំដែនដី និងនគរូបនីយកម្ម ';
        $where_office_b45 = ' AND w.general_department =2  AND w.current_role_id IN (5,6)  ';

        $title_office_b46 = '  ខ. ថ្នាក់ដឹកនាំនាយកដ្ឋានស្រាវជ្រាវ និងបទប្បញ្ញាត្តិ  ';
        $where_office_b46 = ' AND w.general_department =2 AND w.department =86 AND w.current_role_id IN (7,8)  ';

        $title_office_b47 = '  ការិយាល័យ​ទំនាក់ទំនង និងកិច្ចការទូទៅ   ';
        $where_office_b47 = ' AND w.general_department =2 AND w.department =86 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=39 ';

        $title_office_b48 = '  ការិយាល័យបទប្បញ្ញត្តិរៀបចំដែនដី ';
        $where_office_b48 = ' AND w.general_department =2 AND w.department =86 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=37';


        $title_office_b49 = ' ការិយាល័យបទប្បញ្ញត្តិនគរូបនីយកម្ម ';
        $where_office_b49 = ' AND w.general_department =2 AND w.department =86 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=38';

        $title_office_b50 = ' គ. ថ្នាក់ដឹកនាំនាយកដ្ឋាននគរូបនីយកម្ម ';
        $where_office_b50 = ' AND w.general_department =2 AND w.department =87 AND w.current_role_id IN (7,8,17) ';

        $title_office_b51 = ' ការិយាល័យ​នគរូនីយកម្ម ';
        $where_office_b51 = ' AND w.general_department =2 AND w.department =87 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=47 ';

        $title_office_b52 = ' ការិយាល័យបច្ចេកទេស';
        $where_office_b52 = ' AND w.general_department =2 AND w.department =87 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=49 ';

        $title_office_b53 = 'ការិយាល័យហេដ្ឋារចនាសម្ព័ន្ធ';
        $where_office_b53 = ' AND w.general_department =2 AND w.department =87 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=48 ';

        $title_office_b54 = 'ឃ. ថ្នាក់ដឹកនាំនាយកដ្ឋានរៀបចំដែនដី';
        $where_office_b54 = ' AND w.general_department =2 AND w.department =92 AND w.current_role_id IN (7,8) ';

        $title_office_b55 = 'ការិយាល័យរៀបចំឯកសារ ';
        $where_office_b55 = ' AND w.general_department =2 AND w.department =92 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=44  ';

        $title_office_b56 = 'ការិយាល័យគម្រោង ';
        $where_office_b56 = ' AND w.general_department =2 AND w.department =92 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=46  ';

        $title_office_b57 = 'ការិយាល័យអភិវឌ្ឍន៍ដែនដី ';
        $where_office_b57 = ' AND w.general_department =2 AND w.department =92 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=45 ';

        $title_office_b58 = '5.1 នាយកដ្ឋានស្រាវជ្រាវ និងបទប្បញ្ញតិ្ត ';
        $where_office_b58 = ' AND w.general_department =2 AND w.department =86 AND w.current_role_id IN (16) ';

        $title_office_b59 = '5.2 នាយកដ្ឋានរៀបចំដែនដី ';
        $where_office_b59 = ' AND w.general_department =2 AND w.department =92 AND w.current_role_id IN (16) ';

        $title_office_b60 = 'ក.ថ្នាក់ដឹកនំាអគ្គនាយកដ្ឋានសុរិយោដី និងភូមិសាស្រ្ត ';
        $where_office_b60 = ' AND w.general_department =8 AND  w.current_role_id IN (5,6) ';

        $title_office_b61 = 'ខ.1. ថ្នាក់ដឹកនាំនាយកដ្ឋានគ្រប់គ្រងដីធ្លី ';
        $where_office_b61 = ' AND w.general_department =8 AND w.department =99 AND w.current_role_id IN (8,7)  ';

        $title_office_b62 = 'គ.1.ការិយាល័យសហប្រតិបត្តិការ';
        $where_office_b62 = ' AND w.general_department =8 AND w.department=99 AND w.work_office=64 AND w.current_role_id IN (9,10,15,16,17)  ';

        $title_office_b63 = 'ឃ.1.ការិយាល័យនីតិកម្ម';
        $where_office_b63 = ' AND w.general_department =8 AND w.department=99 AND w.work_office=65 AND w.current_role_id IN (9,10,15,16,17)  ';

        $title_office_b64 = 'ង.1.ការិយាល័យផែនការ និងកិច្ចការទូទៅ';
        $where_office_b64 = ' AND w.general_department =8 AND w.department=99 AND w.work_office=66 AND w.current_role_id IN (9,10,15,16,17)  ';

        $title_office_b65 = 'ច.1.ការិយាល័យវាយតម្លៃដីធ្លី';
        $where_office_b65 = ' AND w.general_department =8 AND w.department=99 AND w.work_office=67 AND w.current_role_id IN (9,10,15,16,17)  ';

        $title_office_b66 = 'ខ.3. ថ្នាក់ដឹកនាំនាយកដ្ឋានបច្ចេកទេស';
        $where_office_b66 = ' AND w.general_department =8 AND w.department=101 AND w.current_role_id IN (7,8)  ';

        $title_office_b67 = 'គ.3 . ការិយាល័យព័ត៌មានវិទ្យា​ រូបថត និងប្លង់';
        $where_office_b67 = ' AND w.general_department =8 AND w.department=101 AND w.work_office=72 AND w.current_role_id IN (9,10,15,16,17)  ';

        $title_office_b68 = 'ឃ.3. ការិយាល័យវាស់វែងសុរិយោដី';
        $where_office_b68 = ' AND w.general_department =8 AND w.department=101 AND w.work_office=74 AND w.current_role_id IN (9,10,15,16,17)  ';

        $title_office_b69 = 'ង.3. ការិយាល័យសិក្សា';
        $where_office_b69 = ' AND w.general_department =8 AND w.department=101 AND w.work_office=73 AND w.current_role_id IN (9,10,15,16,17)  ';

        $title_office_b70 = 'ខ.4.ថ្នាក់ដឹកនាំនាយកដ្ឋានអភិរក្សសុរិយោដី';
        $where_office_b70 = ' AND w.general_department =8 AND w.department=98 AND w.current_role_id IN (7,8)  ';

        $title_office_b71 = 'គ.4.ការិយាល័យចុះបញ្ជីដីធ្លី';
        $where_office_b71 = ' AND w.general_department =8 AND w.department=98 AND w.work_office=59 AND w.current_role_id IN (9,10,15,16,17)  ';

        $title_office_b72 = 'ឃ.4.ការិយាល័យអភិរក្សទ្រព្យសម្បត្តិរដ្ឋ';
        $where_office_b72 = ' AND w.general_department =8 AND w.department=98 AND w.work_office=60 AND w.current_role_id IN (9,10,15,16,17)  ';

        $title_office_b73 = 'ង.4.ការិយាល័យឯកសារ និងព័ត៌មានដីធ្លី';
        $where_office_b73 = ' AND w.general_department =8 AND w.department=98 AND w.work_office=63 AND w.current_role_id IN (9,10,15,16,17)  ';

        $title_office_b74 = 'ខ.5.ថ្នាក់ដឹកនាំនាយកដ្ឋានភូមិសាស្រ្ត';
        $where_office_b74 = ' AND w.general_department =8 AND w.department=100 AND w.current_role_id IN (7,8) ';

        $title_office_b75 = 'គ.5.ការិយាល័យកិច្ចការព្រំដែន';
        $where_office_b75 = ' AND w.general_department =8 AND w.department=100  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=68';

        $title_office_b76 = 'ឃ.5.ការិយាល័យវាស់វែងភូមិសាស្រ្ត';
        $where_office_b76 = ' AND w.general_department =8 AND w.department=100  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=69';

        $title_office_b77 = 'ង.5.ការិយាល័យប្រព័ន្ធព័ត៌មានភូមិសាស្រ្ត';
        $where_office_b77 = ' AND w.general_department =8 AND w.department=100  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=70';

        $title_office_b78 = 'ច.5.ការិយាល័យសហប្រតិបត្តិការ​ និងកិច្ចការទូទៅ';
        $where_office_b78 = ' AND w.general_department =8 AND w.department=100  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=71';


        $title_office_b79 = 'ខ.6. ថ្នាក់ដឹកនំា​នាយកដ្ឋានបច្ចេកវិទ្យាព័ត៌មានសុរិយោដី';
        $where_office_b79 = ' AND w.general_department =8 AND w.department=103  AND w.current_role_id IN (7,8) ';

        $title_office_b80 = 'គ.6.ការិយាល័យដំឡើងប្រព័ន្ធបច្ចេកវិទ្យាព័ត៌មាន';
        $where_office_b80 = ' AND w.general_department =8 AND w.department=103  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=79 ';

        $title_office_b81 = 'ឃ.6.ការិយាល័យបណ្តុះបណ្តាល និងគ្រប់គ្រងហានិភ័យ';
        $where_office_b81 = ' AND w.general_department =8 AND w.department=103  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=75 ';

        $title_office_b82 = 'ង.6.ការិយាល័យអភិវឌ្ឍន៍ប្រព័ន្ធចុះបញ្ជីដីធ្លី';
        $where_office_b82 = ' AND w.general_department =8 AND w.department=103  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=78 ';

        $title_office_b83 = 'ច.6.ការិយាល័យសហប្រតិបត្តិការ និងកិច្ចការទូទៅ';
        $where_office_b83 = ' AND w.general_department =8 AND w.department=103  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=76';

        $title_office_b84 = 'ឆ.7. ថ្នាក់ដឹកនំា​នាយកដ្ឋានកិច្ចការវិវាទ​ដីធ្លី';
        $where_office_b84 = ' AND w.general_department =8 AND w.department=104 AND w.current_role_id IN (7,8)';

        $title_office_b85 = 'ឆ.7.1.ការិយាល័យកិច្ចការទូទៅ';
        $where_office_b85 = ' AND w.general_department =8 AND w.department=104 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=80';

        $title_office_b86 = 'ឆ.7.2.ការិយាល័យគណៈកម្មការសុរិយោដី';
        $where_office_b86 = ' AND w.general_department =8 AND w.department=104 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=81';


        $title_office_b87 = 'ឆ.7.3.ការិយាល័យកិច្ចការវិវាទទូទៅ';
        $where_office_b87 = ' AND w.general_department =8 AND w.department=104 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=82';

        $title_office_b88 = 'ឆ.7.4.ការិយាល័យកិច្ចសហប្រតិបត្តិការ';
        $where_office_b88 = ' AND w.general_department =8 AND w.department=104 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=83';

        $title_office_b89 = '7.1 នាយកដ្ឋានអភិរក្សសុរិយោដី';
        $where_office_b89 = ' AND w.general_department =8 AND w.department=98 AND w.current_role_id IN (16)';


        $title_office_b90 = '7.2 នាយកដ្ឋានបច្ចេកទេស';
        $where_office_b90 = ' AND w.general_department =8 AND w.department=101 AND w.current_role_id IN (16)';

        $title_office_b91 = 'ក.ថ្នាក់ដឹកនំាអគ្គនាយកដ្ខាន​លំនៅឋាន';
        $where_office_b91 = ' AND w.general_department =9  AND w.current_role_id IN (5,6)';

        $title_office_b92 = 'ខ.ថ្នាក់ដឹកនំា​នាយកដ្ឋានបទប្បញ្ញត្តិ ផែនការ និងទំនាក់ទំនងសហប្រតិបត្តិការការងារលំនៅឋាន';
        $where_office_b92 = ' AND w.general_department =9 AND w.department=105 AND w.current_role_id IN (7,8,15)';

        $title_office_b93 = '១.ការិយាល័យ​បទប្បញ្ញត្តិ';
        $where_office_b93 = ' AND w.general_department =9 AND w.department=105  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=87';

        $title_office_b94 = '២.ការិយាល័យ​ទំនាក់ទំនងសាធារណៈ និងកិច្ចការទូទៅ';
        $where_office_b94 = ' AND w.general_department =9 AND w.department=105  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=84';

        $title_office_b95 = '៣.ការិយាល័យ​ផែនការ';
        $where_office_b95 = ' AND w.general_department =9 AND w.department=105  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=86';

        $title_office_b96 = '៤.ការិយាល័យ​សហប្រតិបត្តិការអន្តរជាតិ';
        $where_office_b96 = ' AND w.general_department =9 AND w.department=105  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=85';


        $title_office_b97 = 'គ.ថ្នាក់ដឹកនំា​នាយកដ្ឋានមូលនិធិ និងឥណទានលំនៅឋាន';
        $where_office_b97 = ' AND w.general_department =9 AND w.department=107 AND w.current_role_id IN (7,8)';

        $title_office_b98 = '១.ការិយាល័យ​ផែនការថវិកា';
        $where_office_b98 = ' AND w.general_department =9 AND w.department=107  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=94';

        $title_office_b99 = '២.ការិយាល័យ​មូលនិធិ និងឥណទានលំនៅឋាន';
        $where_office_b99 = ' AND w.general_department =9 AND w.department=107  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=92';

        $title_office_b100 = '៣.ការិយាល័យ​កំណត់លក្ខណៈវិនិច្ឆ័យ និងគ្រប់គ្រងលំនៅឋាន';
        $where_office_b100 = ' AND w.general_department =9 AND w.department=107  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=93';

        $title_office_b101 = '៤.ការិយាល័យ​ស្រាវជ្រាវទីផ្សារសេវាកម្មហិរញ្ញវត្ថុ';
        $where_office_b101 = ' AND w.general_department =9 AND w.department=107  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=91';

        $title_office_b102 = 'ឃ.ថ្នាក់ដឹកនំា​នាយកដ្ឋានបច្ចេកទេស និងអភិវឌ្ឍលំនៅឋាន';
        $where_office_b102 = ' AND w.general_department =9 AND w.department=106  AND w.current_role_id IN (7,8) ';

        $title_office_b103 = '១.ការិយាល័យគ្រប់គ្រងឯកសារ និងផែនការ';
        $where_office_b103 = ' AND w.general_department =9 AND w.department=106 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=90';

        $title_office_b104 = '២.ការិយាល័យសិក្សាគម្រោងអភិវឌ្ឍលំនៅឋាន';
        $where_office_b104 = ' AND w.general_department =9 AND w.department=106  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=231';

        $title_office_b105 = '៣.ការិយាល័យកែលម្អហេដ្ឋារចនាសម្ព័ន្ធ និងលំនៅឋាន';
        $where_office_b105 = ' AND w.general_department =9 AND w.department=106  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=89';

        $title_office_b106 = '៤.ការិយាល័យសិក្សាស្រាវជ្រាវ និងបណ្តុះបណ្ដាល';
        $where_office_b106 = ' AND w.general_department =9 AND w.department=106  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=88';

        $title_office_b107 = 'ង.នាយកដ្ឋានសម្បទានដីសង្គមកិច្ច';
        $where_office_b107 = ' AND w.general_department =9 AND w.department=108  AND w.current_role_id IN (7,8,15) ';

        $title_office_b108 = '១.ការិយាល័យគំាទ្របច្ចេកទេសសម្បទានដីសង្គមកិច្ច';
        $where_office_b108 = ' AND w.general_department =9 AND w.department=108 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=95';

        $title_office_b109 = '២.ការិយាល័យមុខសញ្ញាអ្នកទទួលដីសម្បទានសង្គមកិច្ច';
        $where_office_b109 = ' AND w.general_department =9 AND w.department=108  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=96';

        $title_office_b110 = '៣.ការិយាល័យផែនការ និងគំាទ្រការអភិវឌ្ឍកម្មវិធី​សម្បទានដីសង្គមកិច្ច';
        $where_office_b110 = ' AND w.general_department =9 AND w.department=108  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=97';

        $title_office_b111 = '៤.ការិយាល័យកិច្ចការទូទៅ  និងត្រួតពិនិត្យ​កិច្ចការសម្បទាន​ដីសង្គមកិច្ច';
        $where_office_b111 = ' AND w.general_department =9 AND w.department=108  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=98';

        $title_office_b112 = 'ក. ថ្នាក់ដឹកនំាអគ្គាធិការដ្ឋាន';
        $where_office_b112 = ' AND w.general_department =10   AND w.current_role_id IN (5,6)';

        $title_office_b113 = 'ខ. ថ្នាក់ដឹកនាំនាយកដ្ឋានត្រួតពិនិត្យ និងទទួលពាក្យបណ្តឹង';
        $where_office_b113 = ' AND w.general_department =10  AND w.department=89  AND w.current_role_id IN (7,8,15)';

        $title_office_b114 = 'ខ.១. ការិយាល័យ​កិច្ចការទូទៅ';
        $where_office_b114 = ' AND w.general_department =10  AND w.department=89  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=111';

        $title_office_b115 = 'ខ.២. ការិយាល័យពិនិត្យបណ្តឹង';
        $where_office_b115 = ' AND w.general_department =10  AND w.department=89  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=112';

        $title_office_b116 = 'ខ.៣.​ ការិយាល័យអធិការកិច្ច';
        $where_office_b116 = ' AND w.general_department =10  AND w.department=89  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=113';

        $title_office_b117 = 'គ. ថ្នាក់ដឹកនាំនាយកដ្ឋានអធិការកិច្ចភូមិបាល';
        $where_office_b117 = ' AND w.general_department =10  AND w.department=91  AND w.current_role_id IN (7,8)';

        $title_office_b118 = 'គ.១. ការិយាល័យត្រួតពិនិត្យអនុវត្តច្បាប់';
        $where_office_b118 = ' AND w.general_department =10  AND w.department=91  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=115';
        $title_office_b119 = 'គ.២. ការិយាល័យ​ត្រួតពិនិ្យឯកសារ';
        $where_office_b119 = ' AND w.general_department =10  AND w.department=91  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=114';
        $title_office_b120 = 'គ.៣. ការិយាល័យ​ត្រួតពិនិ្យបច្ចេកទេស';
        $where_office_b120 = ' AND w.general_department =10  AND w.department=91  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=116';

        $title_office_b121 = 'ក.ថ្នាក់ដឹកនំានាយកដ្ឋាន​សវនកម្មផ្ទៃក្នុង';
        $where_office_b121 = ' AND  w.department=112   AND w.current_role_id IN (8,7)';

        $title_office_b122 = 'ខ. ការិយាល័យសវនកម្មទី១';
        $where_office_b122 = ' AND w.department=112  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=100';
        $title_office_b123 = 'គ.ការិយាល័យ​សវនកម្មទី២';
        $where_office_b123 = '  AND w.department=112  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=101';
        $title_office_b124 = 'ឃ.ការិយាល័យសវនកម្មទី៣';
        $where_office_b124 = '   AND w.department=112  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=102';
        $title_office_b125 = 'ង.ការិយាល័យសវនកម្មទី៤';
        $where_office_b125 = '   AND w.department=112  AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=103';

        $title_office_b126 = ' ១.ថ្នាកដឹកនាំនាយកដ្ឋាន មជ្ឈមណ្ឌល​បណ្កុះបណ្តាល​ និងវិជ្ជាជីវៈ';
        $where_office_b126 = ' AND  w.department=111   AND w.current_role_id IN (8,7)';

        $title_office_b127 = '២.ការិយាល័យបណ្តុះបណ្តាល​វិជ្ជជីវៈ';
        $where_office_b127 = '   AND w.department=111 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=104';

        $title_office_b128 = '៣. ការិយាល័យ​ផ្សព្វផ្សាយអប់រំ​ ';
        $where_office_b128 = '   AND w.department=111 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=105';

        $title_office_b129 = ' ៤.ការិយាល័យ សាលា​បណ្តុះបណ្តាលវិជ្ជាជីវះ';
        $where_office_b129 = '   AND w.department=111 AND w.current_role_id IN (9,10,15,16,17) AND w.work_office=106';

        $title_office_b130 = ' មន្ទីរពិសោធន៍';
        $where_office_b130 = ' AND  w.department=113   AND w.current_role_id IN (7,8,9,10,15,16,17)';

        foreach ($query_get_currentrole->result() as $rowcurrent) {


            $officerunit = $this->db->query(" $strsql AND
 w.unit = {$queryunit->id}  AND w.current_role_id ={$rowcurrent->id} ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");

            if ($officerunit->num_rows() > 0) {
                if ($rowcurrent->id == 20) {
                    $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $j++ . ' .ជំនួយ​រដ្ឋលេខាធិការ</td>    </tr>';
                } else {
                    $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $j++ . ' .' . $rowcurrent->current_role_in_khmer . '</td>    </tr>';
                }
                foreach ($officerunit->result() as $row) {


                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b1}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b1 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}    {$where} 
                    ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">1. ' . $getoffice . '</td>    </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}    {$where_depar} 
                    ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_dep_office . '</td>    </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b2}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b2 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b3}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b3 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b4}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b4 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b5}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b5 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b6}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b6 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b7}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b7 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b8}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b8 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b9}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b9 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b10}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b10 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b11}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b11 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b12}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b12 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b13}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b13 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b14}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b14 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b15}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b15 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b16}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b16 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b17}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b17 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b18}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b18 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b19}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b19 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b20}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b20 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b21}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b21 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b22}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b22 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b23}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b23 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b24}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b24 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b25}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b25 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b26}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b26 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b27 . '  </tr>';

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b28}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b28 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b29}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b29 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b30}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b30 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b31}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b31 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b33 . '  </tr>';
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b32}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b32 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b34}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b34 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b35}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b35 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b36}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b36 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b37 . '  </tr>';
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b38}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b38 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b39}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b39 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b40}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b40 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b41}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b41 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b42}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b42 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b43}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b43 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b44}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b44 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b45}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b45 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b46}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b46 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b47}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b47 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b48}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b48 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b49}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b49 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b50}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b50 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b51}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b51 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b52}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b52 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b53}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b53 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b54}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b54 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b55}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b55 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b57}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b57 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b56}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b56 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b58}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b58 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b59}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b59 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b60}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b60 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b61}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b61 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b62}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b62 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b63}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b63 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b64}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b64 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b65}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b65 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b66}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b66 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b67}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b67 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b68}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b68 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b69}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b69 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b70}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b70 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b71}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b71 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b72}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b72 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b73}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b73 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b74}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b74 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b75}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b75 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b76}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b76 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b77}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b77 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b78}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b78 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b79}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b79 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b80}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b80 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b81}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b81 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b82}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b82 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b83}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b83 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b84}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b84 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b85}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b85 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b86}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b86 . '  </tr>';

        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b87}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b87 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b88}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b88 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b89}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b89 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b90}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b90 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b91}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b91 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b92}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b92 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b93}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b93 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b94}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b94 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b95}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b95 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b96}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b96 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b97}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b97 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b98}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b98 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b99}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b99 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b100}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b100 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b101}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b101 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b102}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b102 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b103}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b103 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        $officerunit = $this->db->query(" {$strsql}   {$where_office_b104}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b104 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b105}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b105 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b106}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b106 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b107}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b107 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b108}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b108 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b109}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b109 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b110}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b110 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b111}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b111 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b112}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b112 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b113}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b113 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b114}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b114 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b115}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b115 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b116}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b116 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b117}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b117 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b118}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b118 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b119}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b119 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b120}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b120 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b121}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b121 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b122}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b122 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b123}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b123 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b124}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b124 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
        $officerunit = $this->db->query(" {$strsql}   {$where_office_b125}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b125 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b126}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b126 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b127}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b127 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b128}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b128 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b129}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b129 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }

        $officerunit = $this->db->query(" {$strsql}   {$where_office_b130}
                ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC");
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title_office_b130 . '  </tr>';
        foreach ($officerunit->result() as $row) {
            $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }


        break;

    case 5:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តកំពង់ឆ្នាំង |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";
        $arr[] = "ខ.១.ការិយាល័យរដ្ឋបាល |  {$strsql} AND w.unit = {$unit} AND  w.province_office=122 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ខ.២.ការិយាល័យសុរិយោដីនិងភូមិសាស្ត្រ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=125 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ខ.៣.ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្មនិងសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=123 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ខ.៤.ការិយាល័យលំនៅឋាន |  {$strsql} AND w.unit = {$unit} AND  w.province_office=127 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "គ.១.ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្មសំណង់និងភូមិបាលស្រុកបរិបូណ៌ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =26 AND w.current_role_id IN (18,19,21) ";
        $arr[] = "គ.២.ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្មសំណង់និងភូមិបាលស្រុកជលគិរី |  {$strsql} AND w.unit = {$unit} AND    w.land_official =27 AND w.current_role_id IN (18,19,21) ";
        $arr[] = "គ.៣.ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្មសំណង់និងភូមិបាលក្រុងកំពង់ឆ្នាំង |  {$strsql} AND w.unit = {$unit} AND    w.land_official =15 AND w.current_role_id IN (18,19,21) ";
        $arr[] = "គ.៤.ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្មសំណង់និងភូមិបាលស្រុកកំពង់លែង |  {$strsql} AND w.unit = {$unit} AND    w.land_official =24 AND w.current_role_id IN (18,19,21) ";
        $arr[] = "គ.៥.ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្មសំណង់និងភូមិបាលស្រុកកំពង់ត្រឡាច |  {$strsql} AND w.unit = {$unit} AND    w.land_official =21 AND w.current_role_id IN (18,19,21) ";
        $arr[] = "គ.៦.ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្មសំណង់និងភូមិបាលស្រុករលាប្អៀរ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =16 AND w.current_role_id IN (18,19,21) ";
        $arr[] = "គ.៧.ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្មសំណង់និងភូមិបាលស្រុកសាមគ្គីមានជ័យ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =17 AND w.current_role_id IN (18,19,21) ";
        $arr[] = "គ.៨.ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្មសំណង់និងភូមិបាលស្រុកទឹកផុស |  {$strsql} AND w.unit = {$unit} AND    w.land_official =18 AND w.current_role_id IN (18,19,21) ";
        $arr[] = "កម្មសិក្សាការី |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (15,17) AND w.province_office NOT IN(122,125,123,127,191 ) ";
        foreach ($arr as $row) {

            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;
    case 17:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តព្រះវិហារ |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";
        $arr[] = "ការិយាល័យរដ្ឋបាល |  {$strsql} AND w.unit = {$unit} AND  w.province_office=147 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=149 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និងសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=148 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាលក្រុងព្រះវិហារ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =48 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាលស្រុកត្បែងមានជ័យ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =54 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាលស្រុករវៀង |  {$strsql} AND w.unit = {$unit} AND    w.land_official =52 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាលស្រុកជ័យសែន |  {$strsql} AND w.unit = {$unit} AND    w.land_official =55 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាលស្រុកសង្គមថ្មី |  {$strsql} AND w.unit = {$unit} AND    w.land_official =53 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាលស្រុកជាំក្សាន្ត |  {$strsql} AND w.unit = {$unit} AND    w.land_official =50 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាលស្រុកគូលែន |  {$strsql} AND w.unit = {$unit} AND    w.land_official =51 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាលស្រុកឆែប |  {$strsql} AND w.unit = {$unit} AND    w.land_official =49 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (17) ";
        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 8:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តកំពត |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";
        $arr[] = "ការិយាល័យរដ្ឋបាល |  {$strsql} AND w.unit = {$unit} AND  w.province_office=212 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=214 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និងសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=213 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=216 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = " ការិយាល័យសំណង់  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=215 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងកំពត |  {$strsql} AND w.unit = {$unit} AND    w.land_official =177 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអង្គរជ័យ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =185 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកដងទង់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =180 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកឈូក |  {$strsql} AND w.unit = {$unit} AND    w.land_official =181 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកទឹកឈូ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =179 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបន្ទាយមាស |  {$strsql} AND w.unit = {$unit} AND    w.land_official =182 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកំពង់ត្រាច |  {$strsql} AND w.unit = {$unit} AND    w.land_official =178 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកជុំគីរី  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =183 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (17) ";
        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;


    case 4:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តកំពង់ចាម |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";
        $arr[] = "ការិយាល័យរដ្ឋបាល |  {$strsql} AND w.unit = {$unit} AND  w.province_office=235 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=194 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និងសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=192 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=195 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = " ការិយាល័យសំណង់  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=193 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = " ការិយាល័យអភិរក្សសុរិយោដី  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=236 AND w.current_role_id IN (9,10,15,16) ";


        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងកំពង់ចាម |  {$strsql} AND w.unit = {$unit} AND    w.land_official =144 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកំពង់សៀម  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =145 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកព្រៃឈរ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =146 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកងមាស |  {$strsql} AND w.unit = {$unit} AND    w.land_official =151 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកជើងព្រៃ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =147 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបាធាយ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =148 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកចំការលើ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =149 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្ទឹងត្រង់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =150 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកោះសូទិន  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =153 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្រីសន្ធរ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =152 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (17) ";
        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;
    case 20:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តរតនគីរី |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";
        $arr[] = "ការិយាល័យរដ្ឋបាល |  {$strsql} AND w.unit = {$unit} AND  w.province_office=160 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=162 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និងសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=161 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=163 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងបានលុង |  {$strsql} AND w.unit = {$unit} AND    w.land_official =67 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអូរយ៉ាដាវ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =68 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកួនមុំ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =69 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអណ្តូងមាស |  {$strsql} AND w.unit = {$unit} AND    w.land_official =70 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកលំផាត់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =71 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកថតាវែង |  {$strsql} AND w.unit = {$unit} AND    w.land_official =72 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបរកែវ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =73 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកវើនសៃ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =74 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអូរជុំ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =75 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 25:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តត្បូងឃ្មុំ |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";
        $arr[] = "ការិយាល័យរដ្ឋបាល |  {$strsql} AND w.unit = {$unit} AND  w.province_office=181 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=184 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និងសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=182 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=185 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=183 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងសួង |  {$strsql} AND w.unit = {$unit} AND    w.land_official =114 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកពញាក្រែក  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =115 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអូររាំងឪ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =116 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដីនគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកតំបែរ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =117 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកមេមត់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =118 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកក្រូចឆ្មា |  {$strsql} AND w.unit = {$unit} AND    w.land_official =119 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកត្បូងឃ្មុំ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =120 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 15:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តប៉ៃលិន |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";
        $arr[] = "ការិយាល័យរដ្ឋបាល |  {$strsql} AND w.unit = {$unit} AND  w.province_office=133 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=135 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និងសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=184 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=138 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=137 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងប៉ៃលិន |  {$strsql} AND w.unit = {$unit} AND    w.land_official =41 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសាលាក្រៅ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =42 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 13:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តមណ្ឌលគីរី |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល និង កិច្ចការទូទៅ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=164 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=166 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=138 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=165 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងសែនមនោរម្យ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =76 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកពេជ្រាដា  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =77 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកែវសីមា  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =78 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកោះញែក  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =79 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអូរាំង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =80 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 12:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តក្រចេះ |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=151 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=152 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=154 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=155 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=153 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងក្រចេះ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =56 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកឆ្លូង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =57 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសំបូរ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =58 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកព្រែកប្រសព្វ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =59 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្នួល  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =60 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកចិត្របុរី |  {$strsql} AND w.unit = {$unit} AND    w.land_official =61 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 10:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តកែប |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=207 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=209 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=210 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=211 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=208 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងកែប |  {$strsql} AND w.unit = {$unit} AND    w.land_official =175 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកដំណាកចង្អើរ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =176 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;
    case 14:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តឧត្តរមានជ័យ |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=139 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=140 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=141 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=143 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=238 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងសំរោង |  {$strsql} AND w.unit = {$unit} AND    w.land_official =43 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកចុងកាល់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =44 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកត្រពាំងប្រាសាទ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =45 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបន្ទាយអំពិល  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =46 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអន្លងវែង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =47 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;
    case 21:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តសៀមរាប |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=168 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=169 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=171 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=237 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=170 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងសៀមរាប |  {$strsql} AND w.unit = {$unit} AND    w.land_official =81 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកប្រសាទបាគង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =82 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសូត្រនិគម  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =83 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកពួក  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =84 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកក្រឡាញ់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =85 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបន្ទាយស្រី  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =86 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្រីស្នំ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =87 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកវ៉ារិន  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =88 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកជីក្រែង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =89 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្វាយលើ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =90 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអង្គរជុំ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =91 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអង្គរធំ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =92 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;
    case 18:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តព្រៃវែង |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=172 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=173 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=175 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=176 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=174 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងព្រៃវែង |  {$strsql} AND w.unit = {$unit} AND    w.land_official =93 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកពាមរក៏  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =94 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកព្រះស្តេច  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =95 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកពោធិរៀង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =96 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបាភ្នំ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =97 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកពាមជរ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =98 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកពារាំង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =99 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកញ្ចៀច  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =100 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកំចាយមារ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =101 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកំពងត្របែក  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =102 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្វាយអន្ទរ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =103 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកមេសាង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =104 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស៊ីធរកណ្តាល  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =105 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 22:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តស្ទឹងត្រែង |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=156 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=157 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=158 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=159 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=174 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងស្ទឹងត្រែង |  {$strsql} AND w.unit = {$unit} AND    w.land_official =62 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសៀមបូក  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =63 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសេសាន  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =64 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសៀមប៉ាង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =65 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកថាឡាបរិវ៉ាត់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =66 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 11:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តកោះកុង |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=223 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=224 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=225 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=226 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងខេមរភូមិន្ន |  {$strsql} AND w.unit = {$unit} AND    w.land_official =190 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្រែអំបិល  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =191 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកមណ្ឌលសី  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =192 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកោះកុង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =193 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបូទុមសាគរ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =194 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកថ្មបាំង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =195 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកគិរីសាគរ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =196 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 19:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តពោធិសាត់ |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=129 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=130 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=131 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=132 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យអភិរក្សសុរិយោដី |  {$strsql} AND w.unit = {$unit} AND  w.province_office=239 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងពោធិសាត់ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =35 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកណ្ដៀង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =36 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបាកាន  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =37 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកភ្នំក្រវាញ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =38 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកក្រគរ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =39 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកវាលវែង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =40 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 2:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តបន្ទាយមានជ័យ |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=142 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=144 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=145 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=146 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងសេរីសោភណ្ឌ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =121 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកមង្គលបុរី  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =122 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកព្រះនេត្រព្រះ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =123 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអូរជ្រៅ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =124 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងប៉ោយប៉ែត |  {$strsql} AND w.unit = {$unit} AND    w.land_official =125 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកថ្មពួក  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =126 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកម៉ាឡៃ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =127 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្វាយចេក  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =128 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកភ្នំស្រុក  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =129 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 3:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តបាត់ដំបង |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=186 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=187 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=189 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=190 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=234 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងបាត់ដំបង |  {$strsql} AND w.unit = {$unit} AND    w.land_official =130 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបរវេល  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =131 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកថ្មគោល  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =132 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសង្កែ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =133 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុករតនៈមណ្ឌល |  {$strsql} AND w.unit = {$unit} AND    w.land_official =134 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកមោងឬស្សី  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =135 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុករុក្ខគិរី  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =136 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបាណន់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =137 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសំឡូត  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =138 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសំពៅលូន  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =139 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកភ្នំព្រឺក |  {$strsql} AND w.unit = {$unit} AND    w.land_official =140 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកឯកភ្នំ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =141 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកគាស់ក្រឡ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =142 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកំរៀង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =143 AND w.current_role_id IN (18,16,19,21) ";

        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY w.current_role_id ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 6:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តកំពង់ស្ពឹ |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=227 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=228 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=229 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=230 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងច្បារមន |  {$strsql} AND w.unit = {$unit} AND    w.land_official =197 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសំរោងទង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =198 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកភ្នំស្រួច  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =199 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកគងពិសី  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =200 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបរសេដ្ឋ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =201 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកថ្គង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =202 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកឧត្តុង្គ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =204 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកឳរ៉ាល់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =205 AND w.current_role_id IN (18,16,19,21) ";


        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 16:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តព្រះសីហនុ |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=217 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=218 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យបច្ចេកទេសសុរិយោដី និងភូមិសាស្រ្ត |  {$strsql} AND w.unit = {$unit} AND  w.province_office=222 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=221 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=219 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យអភិរក្សសូរិយោដី |  {$strsql} AND w.unit = {$unit} AND  w.province_office=220 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងព្រះសីហនុ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =186 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកព្រៃនប់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =187 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្ទឹងហាវ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =188 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកំពង់សីលា  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =189 AND w.current_role_id IN (18,16,19,21) ";


        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 7:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តកំពង់ធំ |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=118 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=119 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និង ភូមិសាស្ត្រ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=120 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=121 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងស្ទឹងសែន |  {$strsql} AND w.unit = {$unit} AND    w.land_official =7 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបារយណ៍  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =8 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្លោង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =9 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសណ្ដាន់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =10 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសន្ធុក  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =11 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកំពង់ស្វាយ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =12 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសំបូរ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =13 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកប្រាសាទបល្ល័ង្គ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =14 AND w.current_role_id IN (18,16,19,21) ";


        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 9:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តកណ្តាល |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=196 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=197 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និង ភូមិសាស្ត្រ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=200 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យអភិរក្សសុរិយោដី |  {$strsql} AND w.unit = {$unit} AND  w.province_office=198 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=199 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=201 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងតាខ្មៅ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =154 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកណ្តាលស្ទឹង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =155 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្អាង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =156 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកោះធំ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =157 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអង្គស្នួល  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =158 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកខ្សាច់កណ្ដាល  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =159 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកលើកដែក  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =160 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកៀនស្វាយ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =161 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកល្វាឯម  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =162 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកពញាឮ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =163 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកមុខកំពួល  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =164 AND w.current_role_id IN (18,16,19,21) ";


        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 23:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តស្វាយរៀង |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=177 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=178 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និង ភូមិសាស្ត្រ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=179 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=240 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=180 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងស្វាយរៀង |  {$strsql} AND w.unit = {$unit} AND    w.land_official =106 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបាវិត  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =107 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្វាយទាប  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =108 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុករំដួល  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =109 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកចន្ទ្រា  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =110 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកស្វាយជ្រំ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =111 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុករមាសហែក  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =112 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកំពង់រោទ៍  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =113 AND w.current_role_id IN (18,16,19,21) ";


        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 24:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស ខេត្តតាកែវ |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=202 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=203 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និង ភូមិសាស្ត្រ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=205 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=206 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ក្រុងដូនកែវ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =165 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកទ្រាំង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =166 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបរីជលសារ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =167 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកគិរីវង្ស  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =168 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកកោះអណ្តែត  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =169 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកបាទី  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =170 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកសំរោង  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =171 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកត្រាំកក់  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =172 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកព្រៃកប្បាស  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =173 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ស្រុកអង្គបុរី  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =174 AND w.current_role_id IN (18,16,19,21) ";


        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;

    case 31:
        $k = 0;
        $arr = [];
        $arr[] = "មន្ទីរ ដនសស រាជធានីភ្នំពេញ |  {$strsql} AND w.unit = {$unit} AND w.current_role_id IN (11,12) ";

        $arr[] = "ការិយាល័យរដ្ឋបាល  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=99 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យអធិការកិច្ច  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=108 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសេដ្ឍកិច្ជ និង ហិរញ្ញកិច្ច |  {$strsql} AND w.unit = {$unit} AND  w.province_office=110 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី និង នគររុបនីយកម្ម |  {$strsql} AND w.unit = {$unit} AND  w.province_office=110 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី និង ភូមិសាស្ត្រ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=128 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យលំនៅឋាន​ |  {$strsql} AND w.unit = {$unit} AND  w.province_office=124 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសុរិយោដី |  {$strsql} AND w.unit = {$unit} AND  w.province_office=126 AND w.current_role_id IN (9,10,15,16) ";
        $arr[] = "ការិយាល័យសំណង់  |  {$strsql} AND w.unit = {$unit} AND  w.province_office=109 AND w.current_role_id IN (9,10,15,16) ";

        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ខណ្ឌចំការមន |  {$strsql} AND w.unit = {$unit} AND    w.land_official =19 AND w.current_role_id IN (18,19,16,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ខណ្ឌមានជ័យ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =20 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ខណ្ឌពោធិសែនជ័យ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =22 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ខណ្ឌរស្សីកែវ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =23 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ខណ្ឌ ៧ មករា  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =25 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ខណ្ឌដូនពេញ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =28 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ខណ្ឌច្បារអំពៅ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =29 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ខណ្ឌដង្កោ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =30 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល ខណ្ឌព្រែកព្នៅ  |  {$strsql} AND w.unit = {$unit} AND    w.land_official =31 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល  ខណ្ឌជ្រោយចង្វារ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =32 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល  ខណ្ឌទួលគោក |  {$strsql} AND w.unit = {$unit} AND    w.land_official =33 AND w.current_role_id IN (18,16,19,21) ";
        $arr[] = "ការិយាល័យរៀបចំដែនដី នគរូបនីយកម្ម សំណង់ និងភូមិបាល  ខណ្ឌសែនសុខ |  {$strsql} AND w.unit = {$unit} AND    w.land_official =34 AND w.current_role_id IN (18,16,19,21) ";


        $arr[] = "កម្មសិក្សាការី  |  {$strsql} AND w.unit = {$unit}   AND w.current_role_id IN (17) ";

        foreach ($arr as $row) {
            $arrsub = explode('|', $row);
            $title = $arrsub[0];
            $sql = $this->db->query($arrsub[1] . "  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ");
            if ($sql->num_rows() > 0) {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px">' . $title . '  </tr>';
                foreach ($sql->result() as $row) {
                    $body .= ' <tr><td>' . ++$k . '</td><td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . '</td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                }
            }
        }

        break;
    default :
        die('working');
}


$body .= '</tbody>
            <tfoot>
                <tr>
                    <td colspan="8" style="text-align: left;padding: 10px 0 0 0;  height: 45px;">សរុបមន្ត្រី <b>' . $k . ' នាក់</b></td>
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
?>
