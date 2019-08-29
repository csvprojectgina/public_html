<?php

/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.



 *  */



/**

 * Search data from general department , department , offices and land_official

 *

 * @author chiev

 */

class csv_search extends Admin_Controller {



    public function index() {

        $this->load->view('header');

        $this->load->view('csv_search/index');

        $this->load->view('footer');

    }



    public function unit_and_current_rule() {

        $this->load->view('header');

       $this->load->view('csv_search/unit_and_current_rule');

        $this->load->view('footer');

    }



    public function opt_current_role() {

        $qr = query("SELECT DISTINCTROW

                                    w.current_role

                            FROM

                                    `work` AS w

                            INNER JOIN civilservant AS cs ON cs.id = w.id

                            ORDER BY

                                w.current_role ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // opt_unit ======================

    public function opt_unit() {

        $qr = query("SELECT DISTINCTROW

                                    w.unit, u.unit AS unit_name

                            FROM

                                    `work` AS w

                            INNER JOIN civilservant AS cs ON cs.id = w.id

                            INNER JOIN unit AS u ON u.id = w.unit

                            ORDER BY

                                w.unit ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // opt general department======================

    public function opt_gd() {

        $this->db->select('*');

        $this->db->from('general_departments');

        $this->db->where('status', 1);

        $query = $this->db->get();

        $res = $query->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    //get department

    public function opt_dp() {

        $id = $this->input->post('general_dep_name');

        $this->db->select('*');

        $this->db->from('tbl_departments');

        $this->db->where('general_deps_id', $id);

        $this->db->where('status', 1);

        $query = $this->db->get();

        $res = $query->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // opt_work_office ======================

    public function opt_work_office() {

        $dp_id = $this->input->post('department');

        $this->db->select('*');

        $this->db->from('offices');

        $this->db->where('departments_id', $dp_id);

        $this->db->where('status', 1);

        $this->db->where('type', 1);

        $query = $this->db->get();

        $res = $query->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    public function opt_land_official() {

        $unit = $this->input->post('unit');

        $this->db->select('*');

        $this->db->from('land_officials');

        $this->db->where('unit', $unit);

        $this->db->where('status', 1);

        $query = $this->db->get();

        $res = $query->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // get type of framework

    public function get_reason() {

        $qr = query("SELECT DISTINCT reason_deleting FROM worknamedeleting ");



        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // get type of framework

    public function get_medal() {

        $qr = query("SELECT DISTINCT medal_type,id FROM medal ");



        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // opt_work_location ======================

    public function opt_work_location() {

        $qr = query("SELECT DISTINCTROW

                                    w.work_location

                            FROM

                                    `work` AS w

                            INNER JOIN civilservant AS cs ON cs.id = w.id

                            ORDER BY

                                w.work_location ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // opt_pure_salary ======================

    public function opt_pure_salary() {

        $qr = query("SELECT DISTINCTROW

                                        s.pure_salary

                                FROM

                                        salary AS s

                                INNER JOIN civilservant AS cs ON cs.id = s.id

                                ORDER BY

                                        s.pure_salary DESC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // opt_language ======================

    public function opt_language() {

        $qr = query("SELECT DISTINCTROW

                                        l.`language`

                                FROM

                                        `language` AS l

                                INNER JOIN civilservant AS cs ON cs.id = l.id

                                ORDER BY

                                        l.`language` ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    //opt_degree_level=============

    public function opt_degree_level() {

        $qr = query("SELECT DISTINCTROW

                                        d.degree_level

                                FROM

                                        degree AS d

                                INNER JOIN civilservant AS cs ON cs.id = d.id

                                ORDER BY

                                        d.degree_level ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    //opt_skill=============

    public function opt_skill() {

        $qr = query("SELECT DISTINCTROW

                                            d.skill

                                    FROM

                                            degree AS d

                                    INNER JOIN civilservant AS cs ON cs.id = d.id

                                    ORDER BY

                                            d.skill ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    //opt_country============

    public function opt_country() {

        $qr = query("SELECT DISTINCTROW

                                            d.country

                                    FROM

                                            degree AS d

                                    INNER JOIN civilservant AS cs ON cs.id = d.id

                                    ORDER BY

                                            d.country ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    //opt_study_place==============

    public function opt_study_place() {

        $qr = query("SELECT DISTINCTROW

                                            d.study_place

                                    FROM

                                            degree AS d

                                    INNER JOIN civilservant AS cs ON cs.id = d.id

                                    ORDER BY

                                            d.study_place ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    public function search() {

        // var ===================

        $offset = $this->input->post('offset') - 0;

        $limit = $this->input->post('limit') - 0;



        // work. ============

        $lastname = trim($this->input->post('lastname'));

        $firstname = trim($this->input->post('firstname'));

        $gender = trim($this->input->post('gender'));

        $dateofbirth = trim($this->input->post('dateofbirth'));

        $date_in = trim($this->input->post('date_in'));

        $date_out = trim($this->input->post('date_out'));

        $current_role = trim($this->input->post('current_role'));

        $unit = trim($this->input->post('unit'));

        $general_department = trim($this->input->post('general_dep_name'));

        $department = trim($this->input->post('department'));

        $land_official = trim($this->input->post('land_official'));

        $work_office = trim($this->input->post('work_office'));

        $province_office = trim($this->input->post('province_office'));

        $cnt = '';

        $sql = '';



        $sql .= "SELECT

                	cs.id,

                	cs.civil_servant_id,

                	cs.firstname,

                	cs.lastname,

                	cs.gender,

                	DATE_FORMAT(cs.dateofbirth,'%d-%m-%Y') AS dateofbirth,

                	cs.mobile_phone,

                	cs.unit_official_code,

                              CASE WHEN cs.common_official_code IN ('0','',NULL) THEN 0 END,

                	w.current_role,

                	w.unit,

                	u.unit AS unit_name,

                	IF(o.office IS NULL ,'',o.office ) as office,

                    IF(pro_o.office IS NULL ,'',pro_o.office ) as province_office,

                	w.general_department,

                	w.department,

                	w.land_official,

                	w.work_office,

                	cr.current_role_in_khmer,

                	w.work_location,

                	w.date_in,

                	w.date_out,

                            

                              IF( lofc.land_official IS NULL,'',lofc.land_official) as landofficail

                                

FROM

	civilservant AS cs

LEFT JOIN `work` AS w ON cs.id = w.id

LEFT JOIN offices AS o ON o.id = w.work_office

LEFT JOIN province_office AS pro_o ON pro_o.id = w.province_office

LEFT JOIN unit AS u ON u.id = w.unit

LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id

LEFT JOIN land_officials as lofc ON lofc.id = w.land_official

WHERE

	1 = 1 ";

        if ($current_role != '') {

            $sql .= "AND

                    w.current_role_id = '{$current_role}'";

        }



        if ($unit != '') {

            $sql .= "AND

                    w.unit = '{$unit}'";

        }

        if ($general_department != '') {

            $sql .= "AND

                    w.general_department = '{$general_department}'";

        }

        if ($department != '') {

            $sql .= "AND

                    w.department = '{$department}'";

        }

        if ($land_official != '') {

            $sql .= "AND

                    w.land_official = '{$land_official}'";

        }

        if ($work_office != '') {

            $sql .= "AND

                    w.work_office = '{$work_office}'";

        }

        if ($province_office != '') {

            $sql .= "AND

                    w.province_office = '{$province_office}'";

        }

        $sql .= "GROUP BY

	               cs.id ";

        $cnt .= 'SELECT

                        COUNT(id) as c

                        FROM

                        ( ' . $sql . ') AS cnt';





        if ($unit != 1) {



            $sql .= "ORDER BY

                CASE

        WHEN cs.unit_official_code IN ('', '0') THEN

                1

        ELSE

                0

        END,

        --  -cs.common_official_code DESC,

            CASE

        WHEN w.current_role_id IN ('', '0') THEN

                1

        ELSE

                0

        END,

         -cr.command_province_current_role_code DESC

                    LIMIT  {$offset}, {$limit} ";

        } else if (empty($unit)) {





            $sql .= "ORDER BY w.current_role_id DESC

                    LIMIT  {$offset}, {$limit} ";

        } else {



            $sql .= " ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC

                    LIMIT  {$offset}, {$limit} ";

        }



        // cnt. ==================

        $qr = query($cnt);

        $total_record = $qr->row()->c - 0;

        $total_page = ceil($total_record / $limit);

        // qr. ===================

        $q = query($sql);

        $res = $q->result();

        header('Content-Type: application/json; charset=utf-8');

        $arr = array('total_page' => $total_page, 'res' => $res,

            'total_record' => $total_record,

            'offset' => $offset,

        );

        echo json_encode($arr);

    }



    public function view_by_group() {

       $data['unit_view'] = $this->input->post('unit');

       // $view = $this->load->view('csv_search/view_by_departement', '', TRUE);

        $view = $this->load->view('csv_search/view_by_official', $data, TRUE);

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($view);

    }



    /* delete =============== */



    public function delete() {

        $id = $this->input->post('id');



        if ($id > 0) {

            $query = query("SELECT

                                                *

                                        FROM

                                                civilservant AS cs

                                        WHERE

                                                cs.id  = '{$id}' ")->row();



            query("INSERT INTO activity_log(user_name,full_name,idtemp,action) VALUES ('" . $this->session->userdata('user_name') . "', '" . $this->session->userdata('full_name') . "', '" . $query->lastname . " " . $query->firstname . "', 'Deleted') ");

            query("DELETE

                        FROM

                                civilservant

                        WHERE

                                civilservant.id = '{$id}' ");

        }

        redirect('csv/csv_info/index');

    }



    /* print adv report=========== */


    public function print_adv() {

        $lastname = trim($this->input->post('lastname'));

        $firstname = trim($this->input->post('firstname'));

        $gender = trim($this->input->post('gender'));

        $dateofbirth = trim($this->input->post('dateofbirth'));

        $date_in = trim($this->input->post('date_in'));

        $date_out = trim($this->input->post('date_out'));

        $current_role = trim($this->input->post('current_role'));

        $unit = trim($this->input->post('unit'));

        $general_department = trim($this->input->post('general_dep_name'));

        $department = trim($this->input->post('department'));

        $land_official = trim($this->input->post('land_official'));

        $work_office = trim($this->input->post('work_office'));
        
         $province_office = trim($this->input->post('province_office'));

        $work_location = trim($this->input->post('work_location'));

        $pure_salary = trim($this->input->post('pure_salary'));

        $language = trim($this->input->post('language'));

        $degree_level = trim($this->input->post('degree_level'));

        $skill = trim($this->input->post('skill'));

        $country = trim($this->input->post('country'));

        $study_place = trim($this->input->post('study_place'));

        /* ================ */

        $data['lastname'] = $lastname;

        $data['firstname'] = $firstname;

        $data['gender'] = $gender;

        $data['dateofbirth'] = $dateofbirth;

        $data['date_in'] = $date_in;

        $data['date_out'] = $date_out;

        $data['current_role'] = $current_role;

        $data['unit'] = $unit;

        $data['general_department'] = $general_department;

        $data['department'] = $department;

        $data['land_official'] = $land_official;

        $data['work_office'] = $work_office;

        $data['work_location'] = $work_location;

        $data['pure_salary'] = $pure_salary;

        $data['language'] = $language;

        $data['degree_level'] = $degree_level;

        $data['skill'] = $skill;

        $data['country'] = $country;

        $data['study_place'] = $study_place;

        $data['province_office'] = $province_office;


        $this->load->view('csv/csv_search/pdf', $data);

    }

   public function print_pdf() {
  $this->load->view('csv/csv_search/pdf_1');

    }  

    function get_sub_office(){

        $current_role = trim($this->input->post('current_role'));

        $unit = trim($this->input->post('unit'));

        $general_department = trim($this->input->post('general_dep_name'));

        $department = trim($this->input->post('department'));

        $land_official = trim($this->input->post('land_official'));

        $work_office = trim($this->input->post('work_office'));

        $province_office = trim($this->input->post('province_office'));

        $sql = '';



        $sql .= "SELECT  cs.id,

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

        

        if ($current_role != '') {

            $sql .= "AND

                    w.current_role_id = '{$current_role}'";

        }



        if ($unit != '') {

            $sql .= "AND

                    w.unit = '{$unit}'";

        }

        if ($general_department != '') {

            $sql .= "AND

                    w.general_department = '{$general_department}'";

                    

         $data['unit_row_g_depart'] = $this->db->query('SELECT * FROM general_departments WHERE general_dep_id ='.$general_department)->row();     

        }

        if ($department != '') {

            $sql .= "AND

                    w.department = '{$department}'";

           $data['row_department']= $this->db->query('SELECT * FROM tbl_departments WHERE STATUS =1 AND d_id ='.$department)->row();        

        }

        if ($land_official != '') {

            $sql .= "AND

                    w.land_official = '{$land_official}'";

           $data['unit_row_province_office'] = $this->db->query('SELECT * FROM land_officials WHERE id ='.$land_official)->row();           

        }

        if ($work_office != '') {

            $sql .= "AND

                    w.work_office = '{$work_office}'";

            $data['get_row_office'] = $this->db->query('SELECT * FROM `offices` WHERE STATUS =1 AND id = '.$work_office)->row();        

        }

        if ($province_office != '') {

            $sql .= "AND

                       w.province_office = '{$province_office}'";

           $data['unit_row_province'] = $this->db->query('SELECT * FROM province_office WHERE id ='.$province_office)->row();         

        }

        $sql .= " ORDER BY w.current_role_id ASC  ";

        

        $data['qselect'] = $this->db->query($sql);

        if($unit != ''){

        $data['unit_row'] = $this->db->query('SELECT DISTINCTROW u.id, u.unit AS unit_name FROM unit AS u WHERE u.id = '.$unit)->row();

        }

       

        $view = $this->load->view('csv_search/view_by_official',$data, TRUE);

      

        header('Content-Type: application/json; charset=utf-8');

     

        echo json_encode($view);

        

    }



}

