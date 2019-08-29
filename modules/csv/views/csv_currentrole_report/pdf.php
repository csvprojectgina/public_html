<?php
include_once(APPPATH . "libraries/mpdf60/mpdf.php");
$mpdf = new mPDF();
$title='ស្ថិតិមុខតំណែងមន្រ្តីរាជការបម្រើការងារក្នុងទីស្តីការក្រសួង';
// ==========
$mpdf->simpleTables = true;
$mpdf->useSubstitutions = false;
$mpdf->incrementFPR1 = 1;
ini_set('memory_limit', '100024M');
set_time_limit(80000);

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
               <th style="text-align: center;" rowspan="2">លរ</th>
               <th style="text-align: center;" rowspan="2">អង្គភាព</th>
               <th style="text-align: center;"colspan="2">រដ្ឋលេខាធិការ</th>
               <th style="text-align: center;"colspan="2"colspan="2">អនុរដ្ឋលេខាធិការ</th>
               <th style="text-align: center;"colspan="2" colspan="2">ទីប្រឹក្សា</th>
               <th style="text-align: center;"colspan="2" colspan="2">អគ្គនាយក</th>
               <th style="text-align: center;"colspan="2" colspan="2">អគ្គនាយករង</th>
               <th style="text-align: center;"colspan="2" colspan="2">ប្រធាននាយកដ្ឋាន</th>
               <th style="text-align: center;"colspan="2" colspan="2">អនុប្រធាននាយកដ្ឋាន</th>
               <th style="text-align: center;"colspan="2" colspan="2">ប្រធានការិយាល័យ</th>
               <th style="text-align: center;"colspan="2" colspan="2">អនុប្រធានការិយាល័យ</th>
               <th style="text-align: center;"colspan="2" colspan="2">ប្រធានមន្ទីរ</th>
               <th style="text-align: center;"colspan="2" colspan="2">អនុប្រធានមន្ទីរ</th>
               <th style="text-align: center;"colspan="2" colspan="2">អគ្គាធិការ</th>
               <th style="text-align: center;"colspan="2" colspan="2">អគ្គាធិការរង</th>
               <th style="text-align: center;"colspan="2" colspan="2">មន្ត្រី</th>
               <th style="text-align: center;"colspan="2" colspan="2">មន្ត្រីកិច្ចសន្យា</th>
               <th style="text-align: center;"colspan="2" colspan="2">មន្ត្រីកម្មសិក្សា</th>
               <th style="text-align: center;"colspan="2" colspan="2" class="bg-primary text-white">សរុបរួម</th>
               <!-- <th style="text-align: center;"colspan="2">រដ្ឋលេខាធិការ</th>
               <th style="text-align: center;"colspan="2"colspan="2">អនុរដ្ឋលេខាធិការ</th>
               <th style="text-align: center;"colspan="2" colspan="2">ទីប្រឹក្សា</th>
               <th style="text-align: center;"colspan="2" colspan="2">មន្ត្រីកិច្ចសន្យា</th> -->
            </tr>
            <tr style="vertical-align: middle;">
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th>សរុប</th>
                <th>ស្រី</th>
                <th class="bg-primary text-white">សរុប</th>
                <th class="bg-primary text-white">ស្រី</th>
            </tr>
        </thead>
            <tbody>';
            $tr .= "<tr>" .
                    "<td style='border: 1px solid blue; height: 30px;'>" . $i . "</td>" .
                    "<td style='border: 1px solid blue;'>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .
                    "<td style='border: 1px solid blue;'>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .
                    "<td style='border: 1px solid blue;'>" . ($row->firstname != '' ? $row->firstname : '') . "</td>" .
                    "<td style='border: 1px solid blue;'>" . ($row->gender != '' ? $row->gender : '') . "</td>" .
                    "<td style='border: 1px solid blue;'>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .
                    "<td style='border: 1px solid blue;'>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .
                    "<td style='border: 1px solid blue;'>" . ($row->current_role != '' ? $row->current_role_in_khmer : '') . "</td>" .
                    "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .
                    "</tr>";
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
