
<?php

$k = 0;
$strsql = "SELECT  cs.id,
                	cs.civil_servant_id,
                	cs.firstname,
                	cs.lastname,
                	cs.gender,
                	DATE_FORMAT(cs.dateofbirth,'%d-%m-%Y') AS dateofbirth,
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
                     IF( lofc.land_official IS NULL,'',lofc.land_official) AS landofficail,
                                cs.reference_file
                                
FROM
	civilservant AS cs
LEFT JOIN `work` AS w ON cs.id = w.id
LEFT JOIN offices AS o ON o.id = w.work_office
LEFT JOIN province_office AS pro_o ON pro_o.id = w.province_office
LEFT JOIN unit AS u ON u.id = w.unit
LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id
LEFT JOIN land_officials AS lofc ON lofc.id = w.land_official
LEFT JOIN salary AS ls ON ls.id=cs.id  WHERE 1=1  ";
$html = '';
$body = '<table id="tbl-view" cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-hover" style="text-align: center; vertical-align: middle;">
           <thead>
            <tr>
                 <th style=" width: 40px; ">ល.រ</th>
                <th style="width: 60px; ">អត្តលេខ</th>
                <th style=" width: 140px; ">នាម និងគោត្តនាម</th>
                <th style="width: 40px; ">ភេទ</th>
                <th style=" width: 100px; ">ថ្ងៃ​ខែឆ្នាំ កំណើត</th>
                <th style=" width: 125px;">តួនាទី</th>
                <th style=" width: 60px ">កាំប្រាក់</th>
                <th style=" width: 90px">ទូរស័ព្ទ</th>
                
            </tr>
        </thead>
       <tbody>';

if (isset($unit_row)) {
    if ($unit_row->id != 1) {

        if ($qselect->num_rows() > 0) {
            $str = '';
            if (!is_null(@$unit_row_province)) {
                $str = $unit_row_province->office;
            } elseif (!is_null(@$unit_row_province_office)) {
                $str = $unit_row_province_office->land_official;
            } elseif (!is_null(@$unit_row_g_depart)) {
                $str = $unit_row_g_depart->general_deps_name;
            }

            $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px;font-weight: bold">' . $unit_row->unit_name . '  </tr>';

            if ($str != '') {
                $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px; font-weight: bold; padding-left: 20px">  ' . $str . ' </tr>';
            }

            foreach ($qselect->result() as $row) {
                $has_profile = is_null($row->reference_file) ? ' ' : empty($row->reference_file) ? ' ' : '  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';
                $body .= ' <tr><td>' . ++$k . '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    សកម្មភាព <span class="caret"></span>
                                                                        </button> <ul class="dropdown-menu">
                                                                        <li><a href="' . site_url('csv/csv_info/edit/' . $row->id) . '" target="_blank">កែប្រែ</a></li>
                                                                        <li><a href="' . site_url('csv/csv_info/view_profile_pdf/' . $row->id) . '" target="_blank">ប្រវត្តិរូប</a></li>
                                                                        </ul></div></td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . $has_profile . ' </td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
            }
        }
    } else {

        if(isset($unit_row_g_depart)){
        $general_dep = 'SELECT * FROM general_departments WHERE STATUS =1 ORDER BY ordering ASC  ';
        if (isset($unit_row_g_depart)) {
            $department = "SELECT * FROM tbl_departments WHERE STATUS = 1 AND  general_deps_id = '{$unit_row_g_depart->general_dep_id}'";
        }
        $office = 'SELECT * FROM `offices` WHERE STATUS =1';

        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px;font-weight: bold">' . @$unit_row->unit_name . '  </tr>';
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px;font-weight: bold">' . @$unit_row_g_depart->general_deps_name . '  </tr>';
        $where_by_departmet = '  AND w.current_role_id IN (5,6) ';

        if (!is_null(@$row_department)) {
            $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px;font-weight: bold">' . $row_department->d_name . '  </tr>';
            $where_by_departmet = " AND w.department ='{$row_department->d_id}'  AND w.current_role_id IN (7,8)";
            if (isset($unit_row_g_depart)) {
                $department = "SELECT * FROM tbl_departments WHERE STATUS = 1 AND  general_deps_id = '{$unit_row_g_depart->general_dep_id}' AND d_id ='{$row_department->d_id}'";
            }
        }
        if (!is_null(@$get_row_office)) {
            $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px;font-weight: bold">' . $get_row_office->office . '  </tr>';
            $where_by_departmet = " AND w.department ='{$row_department->d_id}'  AND w.current_role_id IN (9,10,15,16,17) AND  w.work_office={$get_row_office->id}";
        }
        if (isset($unit_row_g_depart)) {
            $get_csv_my_gerneral_department = $this->db->query("{$strsql} AND w.general_department ='{$unit_row_g_depart->general_dep_id}'  {$where_by_departmet} ORDER BY w.current_role_id ASC");
       
        foreach ($get_csv_my_gerneral_department->result() as $row) {
            $has_profile = is_null($row->reference_file) ? ' ' : empty($row->reference_file) ? ' ' : '  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';
            $body .= ' <tr><td>' . ++$k . '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    សកម្មភាព44 <span class="caret"></span>
                                                                        </button> <ul class="dropdown-menu">
                                                                        <li><a href="' . site_url('csv/csv_info/edit/' . $row->id) . '" target="_blank">កែប្រែ</a></li>
                                                                        <li><a href="' . site_url('csv/csv_info/view_profile_pdf/' . $row->id) . '" target="_blank">ប្រវត្តិរូប</a></li>
                                                                        </ul></div></td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . $has_profile . ' </td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
         }
        if (is_null(@$get_row_office)) {
            $q_general_dep = $this->db->query($department);
            foreach ($q_general_dep->result() as $row) {
                $deparment_id = $row->d_id;
                $q_get_csv_general_dep = $this->db->query("{$strsql}  AND w.general_department ='{$unit_row_g_depart->general_dep_id}'  AND w.department ='{$row->d_id}'  AND w.current_role_id IN (7,8)  ORDER BY w.current_role_id ASC");
                if ($q_get_csv_general_dep->num_rows() > 0) {
                    if (is_null(@$row_department)) {
                        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px; font-weight: bold; padding-left: 20px">' . $row->d_name . ' </tr>';
                        foreach ($q_get_csv_general_dep->result() as $row) {
                            $has_profile = is_null($row->reference_file) ? ' ' : empty($row->reference_file) ? ' ' : '  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';
                            $body .= ' <tr><td>' . ++$k . '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    សកម្មភាព22 <span class="caret"></span>
                                                                        </button> <ul class="dropdown-menu">
                                                                        <li><a href="' . site_url('csv/csv_info/edit/' . $row->id) . '" target="_blank">កែប្រែ</a></li>
                                                                        <li><a href="' . site_url('csv/csv_info/view_profile_pdf/' . $row->id) . '" target="_blank">ប្រវត្តិរូប</a></li>
                                                                        </ul></div></td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . $has_profile . ' </td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                        }
                    }
                }
                $q_get_office_by_department = $this->db->query("{$office} AND departments_id ='{$deparment_id}'  AND general_deps_id= '{$unit_row_g_depart->general_dep_id}'");
                foreach ($q_get_office_by_department->result() as $row_office) {
                    $q_get_csv_by_department = $this->db->query("{$strsql}  AND w.general_department ='{$unit_row_g_depart->general_dep_id}'  AND w.department ='{$deparment_id}'  AND w.current_role_id IN (9,10,15,16,17) AND  w.work_office='{$row_office->id}'  ORDER BY w.current_role_id ASC");
                    if ($q_get_csv_by_department->num_rows() > 0) {
                        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px; font-weight: bold; padding-left: 40px">  ' . $row_office->office . '  </tr>';
                        foreach ($q_get_csv_by_department->result() as $row) {
                            $has_profile = is_null($row->reference_file) ? ' ' : empty($row->reference_file) ? ' ' : '  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';
                            $body .= ' <tr><td>' . ++$k . '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    សកម្មភាព33 <span class="caret"></span>
                                                                        </button> <ul class="dropdown-menu">
                                                                        <li><a href="' . site_url('csv/csv_info/edit/' . $row->id) . '" target="_blank">កែប្រែ</a></li>
                                                                        <li><a href="' . site_url('csv/csv_info/view_profile_pdf/' . $row->id) . '" target="_blank">ប្រវត្តិរូប</a></li>
                                                                        </ul></div></td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . $has_profile . ' </td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
                        }
                    }
                }
            }
        }
        }else{
            $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px;font-weight: bold">' . $row_department->d_name . '  </tr>';
        $where_by_departmet = " AND w.department ='{$row_department->d_id}'  AND w.current_role_id IN (7,8)";
        $get_csv_department = $this->db->query("{$strsql}  {$where_by_departmet} ORDER BY w.current_role_id ASC");
        foreach ($get_csv_department->result() as $row) {
            $has_profile = is_null($row->reference_file) ? ' ' : empty($row->reference_file) ? ' ' : '  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';
            $body .= ' <tr><td>' . ++$k . '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    សកម្មភាព <span class="caret"></span>
                                                                        </button> <ul class="dropdown-menu">
                                                                        <li><a href="' . site_url('csv/csv_info/edit/' . $row->id) . '" target="_blank">កែប្រែ</a></li>
                                                                        <li><a href="' . site_url('csv/csv_info/view_profile_pdf/' . $row->id) . '" target="_blank">ប្រវត្តិរូប</a></li>
                                                                        </ul></div></td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . $has_profile . ' </td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        } 
            
        }
    }
} else {

    if (isset($row_department)) {
        $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px;font-weight: bold">' . $row_department->d_name . '  </tr>';
        $where_by_departmet = " AND w.department ='{$row_department->d_id}'  AND w.current_role_id IN (7,8)";
        $get_csv_department = $this->db->query("{$strsql}  {$where_by_departmet} ORDER BY w.current_role_id ASC");
        foreach ($get_csv_department->result() as $row) {
            $has_profile = is_null($row->reference_file) ? ' ' : empty($row->reference_file) ? ' ' : '  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';
            $body .= ' <tr><td>' . ++$k . '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    សកម្មភាព <span class="caret"></span>
                                                                        </button> <ul class="dropdown-menu">
                                                                        <li><a href="' . site_url('csv/csv_info/edit/' . $row->id) . '" target="_blank">កែប្រែ</a></li>
                                                                        <li><a href="' . site_url('csv/csv_info/view_profile_pdf/' . $row->id) . '" target="_blank">ប្រវត្តិរូប</a></li>
                                                                        </ul></div></td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . $has_profile . ' </td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
    }else{
         $body .= '<tr> <td colspan="8" style="background-color:#eee;text-align:left; height:40px;font-weight: bold">' . $get_row_office->office . ' 5555 </tr>';
          $where_by_departmet = "  AND w.current_role_id IN (9,10,15,16,17) AND  w.work_office={$get_row_office->id}";
           $get_csv_department = $this->db->query("{$strsql}  {$where_by_departmet} ORDER BY w.current_role_id ASC");
        foreach ($get_csv_department->result() as $row) {
            $has_profile = is_null($row->reference_file) ? ' ' : empty($row->reference_file) ? ' ' : '  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';
            $body .= ' <tr><td>' . ++$k . '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    សកម្មភាព <span class="caret"></span>
                                                                        </button> <ul class="dropdown-menu">
                                                                        <li><a href="' . site_url('csv/csv_info/edit/' . $row->id) . '" target="_blank">កែប្រែ</a></li>
                                                                        <li><a href="' . site_url('csv/csv_info/view_profile_pdf/' . $row->id) . '" target="_blank">ប្រវត្តិរូប</a></li>
                                                                        </ul></div></td> <td>' . $row->civil_servant_id . '</td><td style="text-align:left">' . $row->lastname . ' ' . $row->firstname . $has_profile . ' </td> <td>' . $row->gender . '</td><td>' . $row->dateofbirth . '</td> <td>' . $row->current_role_in_khmer . '</td><td>' . $row->levelsalary . '</td><td>' . $row->mobile_phone . '</td></tr>';
        }
    }
}


$body .= '</tbody>
            <tfoot>
                <tr>
                    <td colspan="8" style="text-align: left;padding: 10px 0 0 0;  height: 45px;">សរុបមន្ត្រី <b>' . $k . ' នាក់</b></td>
                </tr>
            </tfoot>
        </table>';

$html .= $body;

echo $html;
