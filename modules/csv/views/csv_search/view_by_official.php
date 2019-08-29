<style>




</style>

<?php

$unit = ($_POST['unit']);
$general_department = ($_POST['general_dep_name']);
$department = ($_POST['department']);
$work_office = ($_POST['work_office']);
$province_office = ($_POST['province_office']);
$land_official = ($_POST['land_official']);




$where = '';
$to=0;


if ($unit != '') {

    $where .= "AND ( w.unit = '{$unit}' ) ";
    $where2 = "AND ( id= '{$unit}' ) ";

    

}


if ($general_department != '') {

    $where .= "AND (  w.general_department = '{$general_department}' ) ";

    

}

if ($department != '') {

    $where .= "AND (  w.department = '{$department}' ) ";

   

}

if ($land_official != '') {

    $where .= "AND (  w.land_official = '{$land_official}' ) ";

   

}

if ($work_office != '') {

    $where .= "AND ( w.work_office = '{$work_office}' ) ";

     

}
if ($province_office != '') {

    $where .= "AND ( w.province_office = '{$province_office}' ) ";


}

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

//$html .= '<p style="font-family: khmermef2;text-align: center;font-size: 18px">' . $province_office . '</p>';



$body = '<table id="tbl-view" cellpadding="0" cellspacing="0" border="1" class="table  table-bordered table-hover" style="text-align: center;border-collapse: collapse; vertical-align: middle;">

           <thead>

            <tr>

              

                             

    <th style=" width: 40px; ">ល.រ</td>

               <th style=" width: 30px; ">អត្តលេខមន្ត្រី</td>

                <th style=" width: 40px; ">គោត្តនាម</td>

                <th style=" width: 40px; ">នាម</td>

                <th style=" width: 40px; ">ភេទ</td>

                <th style=" width: 40px; ">ថ្ងៃ​ខែឆ្នាំ កំណើត</td>

                <th style=" width: 100px; ">ទូរស័ព្ទ</td>

                <th style=" width: 30px; ">តួនាទី</td>


            </tr>

        </thead>

            <tbody>';





$queryunit = $this->db->query('SELECT * FROM unit WHERE id =' . $unit)->row();





$sql = '';

$sql.="SELECT

          cs.id,

          cs.civil_servant_id,

          cs.firstname,

          cs.lastname,

          cs.gender,

          cs.dateofbirth,

          cs.mobile_phone,

          w.unit,
          w.province_office,
          w.land_official,
        w.current_role_id,

          w.general_department,

          w.department,

          w.work_office,

          cr.current_role_in_khmer,

        cs.common_official_code,
        cs.reference_file

        FROM

        civilservant AS cs

        LEFT JOIN `work` AS w ON cs.id = w.id

        LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id

        WHERE 1 = 1

	  {$where}";

//    $sql.="ORDER BY
//
//            CASE
//
//    WHEN cs.unit_official_code IN ('', '0') THEN
//
//            1
//
//    ELSE
//
//            0
//
//    END,
//
// cs.common_official_code DESC,
//
//        CASE
//
//    WHEN w.current_role_id IN ('', '0') THEN
//
//            1
//
//    ELSE
//
//            0
//
//    END,
//
//     w.current_role_id DESC
//
//                ";

//$qr = query($sql);

$query_unit = $this->db->query('select * from unit where 1=1 '. $where2);

$query_g_dept = $this->db->query('select * from general_departments');
$tr = '';
$i = 1;




foreach ($query_unit->result() as $row1) {
  
 if    ($row1->id!=1) {   
 
// Provincial dept
     
      $qr  = $this->db->query("select * from  ( $sql ) as sw  Where  sw.unit ={$row1->id}  AND sw.province_office =' ' AND sw.land_official =''   order by sw.current_role_id,common_official_code "); 
    
     if ($qr->num_rows() > 0) {
     $tr .= '<tr>

                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $row1->unit . '</td>

                          </tr>';   
    

        foreach ($qr->result() as $row) {

  $has_profile = is_null($row->reference_file )?' ':empty($row->reference_file )?' ':'  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';   
        
         $tr .= "<tr>" .
                ' <td>' . $i. '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    សកម្មភាព <span class="caret"></span></button> <ul class="dropdown-menu"><li><a href="'. site_url('csv/csv_info/edit/'.$row->id).'" target="_blank">កែប្រែ</a></li><li><a href="'. site_url('csv/csv_info/view_profile_pdf/'.$row->id).'" target="_blank">ប្រវត្តិរូប</a></li></ul></div></td> ' . 
     
                "<td>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .

                "<td>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .

                "<td>" . ($row->firstname != '' ? $row->firstname : '') . $has_profile."</td>" .

                "<td>" . ($row->gender != '' ? $row->gender : '') . "</td>" .

                "<td>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .

                "<td>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .

                "<td>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .

              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .

                "</tr>";

        $i++;

    }

    $to = $i;

}
     
     
     
     
     //provincial office 
      $query_office = $this->db->query("select * from province_office where u_id = $row1->id  ");
      
   foreach ($query_office->result() as $office ){
        
   
       $qr  = $this->db->query("select * from  ( $sql ) as sw  Where  sw.unit ={$row1->id}  AND sw.province_office =$office->id AND sw.land_official =''  order by  sw.current_role_id,common_official_code "); 
   


if ($qr->num_rows() > 0) {

    
    $tr .= '<tr>

                             <td colspan="8" style="background-color:#eee;border: 1px solid #ddd;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $office->office. '</td>

                          </tr>';
    

   

        foreach ($qr->result() as $row) {

         $has_profile = is_null($row->reference_file )?' ':empty($row->reference_file )?' ':'  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';   
        
         $tr .= "<tr>" .
                ' <td>' . $i. '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    សកម្មភាព <span class="caret"></span></button> <ul class="dropdown-menu"><li><a href="'. site_url('csv/csv_info/edit/'.$row->id).'" target="_blank">កែប្រែ</a></li><li><a href="'. site_url('csv/csv_info/view_profile_pdf/'.$row->id).'" target="_blank">ប្រវត្តិរូប</a></li></ul></div></td> ' . 
     
                "<td>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .

                "<td>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .

                "<td>" . ($row->firstname != '' ? $row->firstname : '') . $has_profile."</td>" .

                "<td>" . ($row->gender != '' ? $row->gender : '') . "</td>" .

                "<td>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .

                "<td>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .

                "<td>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .

              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .

                "</tr>";

        $i++;

    }

    $to = $i;

}
   }
// district office
   
    
      $query_office = $this->db->query("select * from land_officials where unit = $row1->id  ");
      
   foreach ($query_office->result() as $office ){
        
   
       $qr  = $this->db->query("select * from  ( $sql ) as sw  Where  sw.unit ={$row1->id}  AND sw.province_office ='' AND sw.land_official ='$office->id'   order by sw.current_role_id,common_official_code "); 
   


if ($qr->num_rows() > 0) {

    
    $tr .= '<tr>

                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $office->land_official. '</td>

                          </tr>';
    

   

        foreach ($qr->result() as $row) {
           $has_profile = is_null($row->reference_file )?' ':empty($row->reference_file )?' ':'  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';   
        
         $tr .= "<tr>" .
                ' <td>' . $i. '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    សកម្មភាព <span class="caret"></span></button> <ul class="dropdown-menu"><li><a href="'. site_url('csv/csv_info/edit/'.$row->id).'" target="_blank">កែប្រែ</a></li><li><a href="'. site_url('csv/csv_info/view_profile_pdf/'.$row->id).'" target="_blank">ប្រវត្តិរូប</a></li></ul></div></td> ' . 
     
                "<td>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .

                "<td>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .

                "<td>" . ($row->firstname != '' ? $row->firstname : '') . $has_profile."</td>" .

                "<td>" . ($row->gender != '' ? $row->gender : '') . "</td>" .

                "<td>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .

                "<td>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .

                "<td>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .

              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .

                "</tr>";
        $i++;

    }

    $to = $i;

}
   }

   
   
 }    
 
 else{
     //leaders ministry 
     
   
     
    //leader ministry
    
    $query_leader = $this->db->query("select * from currentrole  ");
     
    if ($query_leader->num_rows() > 0) {
 $tr .= '<tr>

                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $row1->unit . '</td>

                          </tr>';
 
    foreach ($query_leader->result() as $rowl) {
 $qr  = $this->db->query("select * from  ( $sql ) as sw  Where  sw.unit ={$row1->id}  AND sw.general_department =' ' AND sw.department =''  AND sw.work_office = '' AND sw.current_role_id = {$rowl->id} order by sw.current_role_id,common_official_code "); 
    if ($qr->num_rows() > 0) 
        {
    $tr .= '<tr>

                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $rowl->current_role_in_khmer . '</td>

                          </tr>';
        foreach ($qr->result() as $row) {
           $has_profile = is_null($row->reference_file )?' ':empty($row->reference_file )?' ':'  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';   
        
         $tr .= "<tr>" .
                ' <td>' . $i. '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    សកម្មភាព <span class="caret"></span></button> <ul class="dropdown-menu"><li><a href="'. site_url('csv/csv_info/edit/'.$row->id).'" target="_blank">កែប្រែ</a></li><li><a href="'. site_url('csv/csv_info/view_profile_pdf/'.$row->id).'" target="_blank">ប្រវត្តិរូប</a></li></ul></div></td> ' . 
     
                "<td>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .

                "<td>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .

                "<td>" . ($row->firstname != '' ? $row->firstname : '') . $has_profile."</td>" .

                "<td>" . ($row->gender != '' ? $row->gender : '') . "</td>" .

                "<td>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .

                "<td>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .

                "<td>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .

              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .

                "</tr>";

        $i++;

    }

    $to = $i;

    }}}

//  dept  without general dept 

 $query_dept = $this->db->query("select * from tbl_departments where general_deps_id= '' "); 
  foreach ($query_dept->result() as $dpt ){

      $qr  = $this->db->query("select * from  ( $sql ) as sw   where  sw.unit ={$row1->id}  AND sw.general_department = ''  AND sw.department =$dpt->d_id   AND sw.work_office ='' order by sw.current_role_id,common_official_code "); 
         
         
         if ($qr->num_rows() > 0) {

    
         $tr .= '<tr>

                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $dpt->d_name .  '</td>

                          </tr>';
    

   

        foreach ($qr->result() as $row) {
            $has_profile = is_null($row->reference_file )?' ':empty($row->reference_file )?' ':'  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';   
        
         $tr .= "<tr>" .
                ' <td>' . $i. '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    សកម្មភាព <span class="caret"></span></button> <ul class="dropdown-menu"><li><a href="'. site_url('csv/csv_info/edit/'.$row->id).'" target="_blank">កែប្រែ</a></li><li><a href="'. site_url('csv/csv_info/view_profile_pdf/'.$row->id).'" target="_blank">ប្រវត្តិរូប</a></li></ul></div></td> ' . 
     
                "<td>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .

                "<td>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .

                "<td>" . ($row->firstname != '' ? $row->firstname : '') . $has_profile."</td>" .

                "<td>" . ($row->gender != '' ? $row->gender : '') . "</td>" .

                "<td>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .

                "<td>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .

                "<td>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .

              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .

                "</tr>";

        $i++;

    }

    $to = $i;

}
      
      $query_office = $this->db->query("select * from offices where departments_id = $dpt->d_id  ");
      
   foreach ($query_office->result() as $office ){
        
   
        $qr  = $this->db->query("select * from  ( $sql ) as sw  where  sw.unit ={$row1->id}  AND sw.general_department = '' AND sw.department =$dpt->d_id  AND sw.work_office = $office->id order by sw.current_role_id,common_official_code"); 



if ($qr->num_rows() > 0) {

    
    $tr .= '<tr>

                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $office->office. '</td>

                          </tr>';
    

   

        foreach ($qr->result() as $row) {
  $has_profile = is_null($row->reference_file )?' ':empty($row->reference_file )?' ':'  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';   
        
         $tr .= "<tr>" .
                ' <td>' . $i. '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    សកម្មភាព <span class="caret"></span></button> <ul class="dropdown-menu"><li><a href="'. site_url('csv/csv_info/edit/'.$row->id).'" target="_blank">កែប្រែ</a></li><li><a href="'. site_url('csv/csv_info/view_profile_pdf/'.$row->id).'" target="_blank">ប្រវត្តិរូប</a></li></ul></div></td> ' . 
     
                "<td>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .

                "<td>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .

                "<td>" . ($row->firstname != '' ? $row->firstname : '') . $has_profile."</td>" .

                "<td>" . ($row->gender != '' ? $row->gender : '') . "</td>" .

                "<td>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .

                "<td>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .

                "<td>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .

              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .

                "</tr>";

        $i++;

    }

    $to = $i;

}
   }     
  }
  
  
    foreach ($query_g_dept->result() as $g_dpt ){
   
        $qr  = $this->db->query("select * from  ( $sql ) as sw   where  sw.unit ={$row1->id}  AND sw.general_department = $g_dpt->general_dep_id  AND sw.department ='' order by sw.current_role_id,common_official_code "); 
         
         
         if ($qr->num_rows() > 0) {

    
         $tr .= '<tr>

                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $g_dpt->general_deps_name . '</td>

                          </tr>';
    

   

        foreach ($qr->result() as $row) {
  $has_profile = is_null($row->reference_file )?' ':empty($row->reference_file )?' ':'  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';   
        
         $tr .= "<tr>" .
                ' <td>' . $i. '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    សកម្មភាព <span class="caret"></span></button> <ul class="dropdown-menu"><li><a href="'. site_url('csv/csv_info/edit/'.$row->id).'" target="_blank">កែប្រែ</a></li><li><a href="'. site_url('csv/csv_info/view_profile_pdf/'.$row->id).'" target="_blank">ប្រវត្តិរូប</a></li></ul></div></td> ' . 
     
                "<td>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .

                "<td>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .

                "<td>" . ($row->firstname != '' ? $row->firstname : '') . $has_profile."</td>" .

                "<td>" . ($row->gender != '' ? $row->gender : '') . "</td>" .

                "<td>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .

                "<td>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .

                "<td>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .

              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .

                "</tr>";

        $i++;

    }

    $to = $i;

}
   $query_dept = $this->db->query("select * from tbl_departments where general_deps_id=  $g_dpt->general_dep_id "); 
  foreach ($query_dept->result() as $dpt ){

      $qr  = $this->db->query("select * from  ( $sql ) as sw   where  sw.unit ={$row1->id}  AND sw.general_department = $g_dpt->general_dep_id  AND sw.department =$dpt->d_id   AND sw.work_office ='' order by sw.current_role_id,common_official_code "); 
         
         
         if ($qr->num_rows() > 0) {

    
         $tr .= '<tr>

                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $dpt->d_name .  '</td>

                          </tr>';
    

   

        foreach ($qr->result() as $row) {

          $has_profile = is_null($row->reference_file )?' ':empty($row->reference_file )?' ':'  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';   
        
         $tr .= "<tr>" .
                ' <td>' . $i. '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    សកម្មភាព <span class="caret"></span></button> <ul class="dropdown-menu"><li><a href="'. site_url('csv/csv_info/edit/'.$row->id).'" target="_blank">កែប្រែ</a></li><li><a href="'. site_url('csv/csv_info/view_profile_pdf/'.$row->id).'" target="_blank">ប្រវត្តិរូប</a></li></ul></div></td> ' . 
     
                "<td>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .

                "<td>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .

                "<td>" . ($row->firstname != '' ? $row->firstname : '') . $has_profile."</td>" .

                "<td>" . ($row->gender != '' ? $row->gender : '') . "</td>" .

                "<td>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .

                "<td>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .

                "<td>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .

              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .

                "</tr>";

        $i++;

    }

    $to = $i;

}
      
      $query_office = $this->db->query("select * from offices where departments_id = $dpt->d_id  ");
      
   foreach ($query_office->result() as $office ){
        
   
        $qr  = $this->db->query("select * from  ( $sql ) as sw  where  sw.unit ={$row1->id}  AND sw.general_department = $g_dpt->general_dep_id AND sw.department =$dpt->d_id  AND sw.work_office = $office->id order by sw.current_role_id,common_official_code"); 



if ($qr->num_rows() > 0) {

    
    $tr .= '<tr>

                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $office->office. '</td>

                          </tr>';
    

   

        foreach ($qr->result() as $row) {
  $has_profile = is_null($row->reference_file )?' ':empty($row->reference_file )?' ':'  <span class="glyphicon glyphicon-list-alt has-profile" aria-hidden="true"></span> ';   
        
         $tr .= "<tr>" .
                ' <td>' . $i. '<div class="btn-group actionrow"><button  class="btn btn-xs dropdown-toggle btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    សកម្មភាព <span class="caret"></span></button> <ul class="dropdown-menu"><li><a href="'. site_url('csv/csv_info/edit/'.$row->id).'" target="_blank">កែប្រែ</a></li><li><a href="'. site_url('csv/csv_info/view_profile_pdf/'.$row->id).'" target="_blank">ប្រវត្តិរូប</a></li></ul></div></td> ' . 
     
                "<td>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .

                "<td>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .

                "<td>" . ($row->firstname != '' ? $row->firstname : '') . $has_profile."</td>" .

                "<td>" . ($row->gender != '' ? $row->gender : '') . "</td>" .

                "<td>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .

                "<td>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .

                "<td>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .

              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .

                "</tr>";

        $i++;

    }

    $to = $i;

}
         
     }
      }
 }
}    
}

$body .= $tr;
$body .= '

           

                <tr>

               <td colspan="8" style="text-align: left;padding: 10px 0 0 0;  height: 45px;">សរុបមន្ត្រី <b>' .( $to-1) . ' នាក់</b></td>

                </tr>

        
</tbody>
        </table>';



$html .= $body;












  

echo $html;
//vichiet
 //echo '<pre>';

//print_r(get_duplicates($get_id_csv));

// print_r($get_id_csv);

//echo '</pre>';