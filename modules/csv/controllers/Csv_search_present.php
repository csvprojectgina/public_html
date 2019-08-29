<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Csv_search_present extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('csv_search_present/index');
        $this->load->view('footer');
    }

    // search ===============================
    public function search() {
        // var ===================
        $offset = $this->input->post('offset') - 0;
        $limit = $this->input->post('limit') - 0;
        $search = trim($this->input->post('search'));

        $where = '';
        if ($search != '') {
            $where .= " AND ( cs.firstname LIKE '%{$search}%' ";
            $where .= "OR cs.lastname LIKE '%{$search}%' ";
            $where .= "OR cs.gender LIKE '%{$search}%' ";
            $where .= "OR w.current_role LIKE '%{$search}%' ";
            $where .= "OR w.unit LIKE '%{$search}%') ";
        }

        $cnt = '';

        $sql = '';

//        $sql.="SELECT
//	cs.id,
//	cs.civil_servant_id,
//	cs.firstname,
//	cs.lastname,
//	cs.gender,
//	cs.dateofbirth,
//	cs.mobile_phone,
//	cs.unit_official_code,
//	cs.current_role,
//	cs.unit,
//	cs.work_office,
//	cs.work_location,
//	cs.date_in,
//	cs.date_out,
//	cs.salary_level,
//	cs.pure_salary,
//	cs.country,
//	cs.skill,
//	cs.study_place,
//	cs.degree_level,
//	l.`language`
//FROM
//	(
//		SELECT
//			cs.id,
//			cs.civil_servant_id,
//			cs.firstname,
//			cs.lastname,
//			cs.gender,
//			cs.dateofbirth,
//			cs.mobile_phone,
//			cs.unit_official_code,
//			cs.current_role,
//			cs.unit,
//			cs.work_office,
//			cs.work_location,
//			cs.date_in,
//			cs.date_out,
//			cs.salary_level,
//			cs.pure_salary,
//			d.country,
//			d.skill,
//			d.study_place,
//			d.degree_level
//		FROM
//			(
//				SELECT
//					cs.id,
//					cs.civil_servant_id,
//					cs.firstname,
//					cs.lastname,
//					cs.gender,
//					cs.dateofbirth,
//					cs.mobile_phone,
//					cs.unit_official_code,
//					cs.current_role,
//					cs.unit,
//					cs.work_office,
//					cs.work_location,
//					cs.date_in,
//					cs.date_out,
//					s.salary_level,
//					s.pure_salary
//				FROM
//					(
//						SELECT
//							cs.id,
//							cs.civil_servant_id,
//							cs.firstname,
//							cs.lastname,
//							cs.gender,
//							cs.dateofbirth,
//							cs.mobile_phone,
//							cs.unit_official_code,
//							w.current_role,
//							w.unit,
//							w.work_office,
//							w.work_location,
//							w.date_in,
//							w.date_out
//						FROM
//							civilservant AS cs
//						INNER JOIN `work` AS w ON cs.id = w.id
//						WHERE
//							1 = 1
//					) AS cs
//				INNER JOIN salary AS s ON cs.id = s.id
//				WHERE
//					1 = 1
//			) AS cs
//		LEFT JOIN degree AS d ON cs.id = d.id
//		WHERE
//			1 = 1
//	) AS cs
//LEFT JOIN `language` AS l ON cs.id = l.id
//WHERE
//	cs.id NOT IN (
//		SELECT
//			wd.id
//		FROM
//			workframeworkout AS wf
//		RIGHT JOIN worknamedeleting AS wd ON wd.id = wf.id
//		WHERE
//			wd.id NOT IN (
//				SELECT
//					wf.id
//				FROM
//					workframeworkout AS wf
//			)
//	)
//AND cs.id NOT IN (
//	SELECT
//		wt.id
//	FROM
//		worktransfer AS wt
//)
//                {$where} ";
        $sql .= "SELECT
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
                                    -- ls.type
                            FROM
                                    civilservant AS cs
                            LEFT JOIN `work` AS w ON cs.id = w.id
                            -- LEFT JOIN `list_salary` AS ls ON ls.id = cs.id
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
) {$where}";
        $sql .= " GROUP BY
	cs.id ";
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
                                 -cs.unit_official_code DESC
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

    // print adv report===========
    public function print_csv_present() {
        $search = trim($this->input->post('search'));
        //================
        $data['search'] = $search;
        $this->load->view('csv/csv_search_present/pdf', $data);
    }

}
