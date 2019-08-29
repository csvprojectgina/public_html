<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Csv_search_advance extends Admin_Controller {



    public function index() {

        $this->load->view('header');

        $this->load->view('csv_search_advance/index');

        $this->load->view('footer');

    }



// auto com auto_lastname

//    public function auto_lastname(){

//        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));

//         $qr = query("SELECT DISTINCTROW

//                                c.lastname

//                                FROM

//                                civilservant AS c

//                                WHERE

//                                c.lastname LIKE '%{$q}%'

//                                ORDER BY

//                                        c.lastname ASC ");

//        $res = $qr->result();

//        header('Content-Type: application/json; charset=utf-8');

//        echo json_encode($res);

//    }

    // opt_current_role ======================

    public function opt_current_role() {

        $qr = query("SELECT DISTINCTROW

                                   cr.current_role_in_khmer, w.current_role_id, cr.id

                            FROM

                                    currentrole AS cr

                            INNER JOIN `work` AS w ON w.current_role_id = cr.id

                            ORDER BY

                                cr.id ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // opt_work_office ======================

    public function opt_work_office() {

        $qr = query("SELECT DISTINCTROW

                      	w.work_office,

                      	o.office

                        FROM

                                `work` AS w

                        INNER JOIN civilservant AS cs ON cs.id = w.id

                        INNER JOIN offices AS o ON o.id = w.work_office

                        ORDER BY

	                      w.work_office ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // opt_unit ======================

    public function opt_unit() {

        $qr = query("SELECT DISTINCTROW

                                    w.unit, u.unit AS unit_name,u.id

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



    // search ===============================

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

        $work_office = trim($this->input->post('work_office'));

        $work_location = trim($this->input->post('work_location'));

        $pure_salary = trim($this->input->post('pure_salary'));

        $language = trim($this->input->post('language'));

        $degree_level = trim($this->input->post('degree_level'));

        $skill = trim($this->input->post('skill'));

        $country = trim($this->input->post('country'));

        $study_place = trim($this->input->post('study_place'));

        $medal_type = trim($this->input->post('medal_type'));

        $cnt = '';

        $sql = '';



        $sql .= "SELECT

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

						LEFT JOIN `work` AS w ON cs.id = w.id

                        LEFT JOIN offices AS o ON o.id= w.work_office

                        LEFT JOIN unit AS u ON u.id = w.unit

                        LEFT   JOIN `currentrole` AS cr ON cr.id= w.current_role_id

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

	1 = 1 ";

        if ($lastname != '') {

            $sql .= "AND cs.lastname LIKE '%{$lastname}%'";

        }

        if ($firstname != '') {

            $sql .= "AND cs.firstname LIKE '%{$firstname}%'";

        }

        if ($gender != '') {

            $sql .= "AND cs.gender LIKE '%{$gender}%'";

        }

        if ($dateofbirth != '') {

            $sql .= "AND cs.dateofbirth LIKE '%{$dateofbirth}%'";

        }

        if ($date_in != '') {

            $sql .= "AND cs.date_in LIKE '%{$date_in}%'";

        }

        if ($date_out != '') {

            $sql .= "AND cs.date_out LIKE '%{$date_out}%'";

        }

        if ($current_role != '') {

            $sql .= "AND cs.current_role_id= '{$current_role}'";

        }

        if ($unit != '') {

            $sql .= "AND cs.unit = '{$unit}'";

        }

        if ($work_office != '') {

            $sql .= "AND  cs.work_office = '{$work_office}'";

        }

        if ($work_location != '') {

            $sql .= "AND cs.work_location = '{$work_location}'";

        }

        if ($pure_salary != '') {

            $sql .= "AND cs.pure_salary = '{$pure_salary}'";

        }

        if ($degree_level != '') {

            $sql .= "AND cs.degree_level = '{$degree_level}'";

        }

        if ($skill != '') {

            $sql .= "AND cs.skill = '{$skill}'";

        }

        if ($country != '') {

            $sql .= "AND cs.country = '{$country}'";

        }

        if ($study_place != '') {

            $sql .= "AND cs.study_place = '{$study_place}'";

        }

        if ($medal_type != '') {

            $sql .= "AND cs.id = '{$medal_type}'";

        }

        if ($language != '') {

            $sql .= "AND

                    l.language = '{$language}'";

        }

        $sql .= "GROUP BY cs.id ";

        $cnt .= 'SELECT

                        COUNT(id) as c

                        FROM

                        ( ' . $sql . ') AS cnt';



        $sql .= "ORDER BY
                         CASE

                                WHEN cs.unit_official_code IN ('', '0') THEN

                                        1

                                ELSE

                                        0

                                END,

                              cs.current_role_id

                    LIMIT  {$offset}, {$limit} ";


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



    // delete ===============

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



    // print adv report===========

    public function print_adv() {

        $lastname = trim($this->input->post('lastname'));

        $firstname = trim($this->input->post('firstname'));

        $gender = trim($this->input->post('gender'));

        $dateofbirth = trim($this->input->post('dateofbirth'));

        $date_in = trim($this->input->post('date_in'));

        $date_out = trim($this->input->post('date_out'));

        $current_role = trim($this->input->post('current_role'));

        $unit = trim($this->input->post('unit'));

        $work_office = trim($this->input->post('work_office'));

        $work_location = trim($this->input->post('work_location'));

        $pure_salary = trim($this->input->post('pure_salary'));

        $language = trim($this->input->post('language'));

        $degree_level = trim($this->input->post('degree_level'));

        $skill = trim($this->input->post('skill'));

        $country = trim($this->input->post('country'));

        $study_place = trim($this->input->post('study_place'));

        //================

        $data['lastname'] = $lastname;

        $data['firstname'] = $firstname;

        $data['gender'] = $gender;

        $data['dateofbirth'] = $dateofbirth;

        $data['date_in'] = $date_in;

        $data['date_out'] = $date_out;

        $data['current_role'] = $current_role;

        $data['unit'] = $unit;

        $data['work_office'] = $work_office;

        $data['work_location'] = $work_location;

        $data['pure_salary'] = $pure_salary;

        $data['language'] = $language;

        $data['degree_level'] = $degree_level;

        $data['skill'] = $skill;

        $data['country'] = $country;

        $data['study_place'] = $study_place;

        $this->load->view('csv/csv_search_advance/pdf', $data);

    }



}

