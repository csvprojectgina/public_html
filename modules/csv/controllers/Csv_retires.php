<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Csv_retires extends Admin_Controller {

    // index ===============
    public function index() {
        $this->load->view('header');
        $this->load->view('csv/retires/index');
        $this->load->view('footer');
    }
    // index not unit
    function not_retires()
      {
            $this->load->view('header');
            $this->load->view('csv/retires/notunit');
            $this->load->view('footer');
      }
      // index not unit
      function deletename()
        {
              $this->load->view('header');
              $this->load->view('csv/retires/transferjob');
              $this->load->view('footer');
        }
    // advanced search ========
    public function advanced_search() {
        $this->load->view('header');
        $this->load->view('csv/retires/advanced_search');
        $this->load->view('footer');
    }

    // form ===============
    public function form() {
        $this->load->view('header');
        $this->load->view('csv/retires/form');
        $this->load->view('footer');
    }

     // get_num_dip ==========
    public function get_num_dip() {
        $qr = query("SELECT DISTINCTROW
                                dis.disp_num
                        FROM
                                display AS dis
                        ORDER BY
                                dis.disp_num - 0 ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
}
    // edit ============
    public function edit($eid = '') {
        $id = (urldecode($eid));

        // csv ==========
        $query = query("SELECT * FROM civilservant AS c WHERE c.id = '{$id}' ");
        $row = $query->row();
        $data['row'] = $row;

        // work ==========
        $query_w = query("SELECT * FROM work AS w WHERE w.id = '{$id}' ");
        $row_w = $query_w->row();
        $data['row_w'] = $row_w;

        // salary ==========
        $query_s = query("SELECT * FROM salary AS s WHERE s.id = '{$id}' ");
        $row_s = $query_s->row();
        $data['row_s'] = $row_s;

        // degree ==========
        $query_d = query("SELECT * FROM degree AS d WHERE d.id = '{$id}' ");
        $row_d = $query_d->row();
        $data['row_d'] = $row_d;

        // training ==========
        $query_t = query("SELECT * FROM training AS t WHERE t.id = '{$id}' ");
        $row_t = $query_t->row();
        $data['row_t'] = $row_t;

        // language ==========
        $query_l = query("SELECT * FROM language AS l WHERE l.id = '{$id}' ");
        $row_l = $query_l->row();
        $data['row_l'] = $row_l;

        // absent ==========
        $query_a = query("SELECT * FROM absent AS a WHERE a.id = '{$id}' ");
        $row_a = $query_a->row();
        $data['row_a'] = $row_a;

        // workhistory ==========
        $query_wh = query("SELECT * FROM workhistory AS wh WHERE wh.id = '{$id}' ");
        $row_wh = $query_wh->row();
        $data['row_wh'] = $row_wh;

        // workbydegree ==========
        $query_wbd = query("SELECT * FROM workbydegree AS wbd WHERE wbd.id = '{$id}' ");
        $row_wbd = $query_wbd->row();
        $data['row_wbd'] = $row_wbd;



        // main_id =========
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('csv/retires/form', $data);
        $this->load->view('footer');
    }
 // gr csv_info. ================
    public function get_retires() {
        // var ===============
        $offset = $this->input->post('offset');
        $limit = $this->input->post('limit');
        $search = trim($this->input->post('search'));
        // $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));
        // by role =============
    //        $pr_code = $this->session->userdata('pr_code');
    //        $sWhere = "";
    //        if ($pr_code == "") {
    //            $sWhere .= "1=1 ";
    //        } else {
    //            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
    //        }

        $where = '';
        if ($search != '') {
            $where .= "AND ( cs.civil_servant_id LIKE '%{$search}%' ";
            $where .= "OR cs.firstname LIKE '%{$search}%' ";
            $where .= "OR cs.lastname LIKE '%{$search}%' ";
            $where .= "OR cs.gender LIKE '%{$search}%' ";
            $where .= "OR cs.english_full_name LIKE '%{$search}%' ";
            $where .= "OR cs.mobile_phone LIKE '%{$search}%' ";
            $where .= "OR wd.reason_deleting LIKE '%{$search}%' )";
        }

        // cnt. ==============
        $q = query("SELECT
                                        COUNT(cs.id) AS c
                                FROM
                                        civilservant AS cs
                                INNER JOIN `worknamedeleting` AS wd ON cs.id = wd.id
                                AND  wd.reason_deleting= 'និវត្ដន៍'
                                WHERE
                                        1=1 {$where} ");
        $total_record = $q->row()->c - 0;
        $total_page = ceil($total_record / $limit);

        // qr. ==============
        $qr = query("SELECT
                            cs.id,
                            cs.civil_servant_id,
                            cs.firstname,
                            cs.lastname,
                            cs.english_full_name,
                            cs.gender,
                            cs.dateofbirth,
                            cs.mobile_phone,
                            cs.unit_official_code,
                            wd.deleting_date,
                            wd.reason_deleting
                            FROM
                            civilservant AS cs
                            INNER JOIN worknamedeleting AS wd ON cs.id = wd.id
                            and  wd.reason_deleting= 'និវត្ដន៍'
                            WHERE
                                    1 = 1 {$where}
                                ORDER BY
                                        CASE
                                WHEN cs.unit_official_code IN ('', '0') THEN
                                        1
                                ELSE
                                        0
                                END,
                                 -cs.common_official_code DESC
                                LIMIT {$offset}, {$limit}  ");

        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        $arr = array('total_page' => $total_page, 'res' => $res,
            'total_record' => $total_record
        );
        echo json_encode($arr);
    }
    // gr csv_retires. ================
    // public function get_retires() {
        // var ===============
        // $offset = $this->input->post('offset');
        // $limit  = $this->input->post('limit');
        // $search = trim($this->input->post('search'));
        // $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));
        //by role
       // $pr_code = $this->session->userdata('pr_code');
       // $sWhere  = "";
       // if ($pr_code == "") {
       //     $sWhere .= "1=1 ";
       // } else {
       //     $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
       // }

        // $where = '';
        // if ($search != '') {
        //     $where .= "AND ( c.civil_servant_id LIKE '%{$search}%' ";
        //     $where .= "OR c.firstname LIKE '%{$search}%' ";
        //     $where .= "OR c.lastname LIKE '%{$search}%' ";
        //     $where .= "OR c.gender LIKE '%{$search}%' ";
        //     $where .= "OR dateofbirth LIKE '%{$search}%' ";
        //     $where .= "OR c.mobile_phone LIKE '%{$search}%' ";
        //     $where .= "OR wd.reason_deleting LIKE '%{$search}%' ) ";
        // }

        // cnt. ==============
        // $q = query("SELECT
        //                                 COUNT(cs.id) AS c
        //                         FROM
        //                                 civilservant AS cs
        //                         INNER JOIN `worknamedeleting` AS wd ON cs.id = wd.id
        //                         WHERE
        //                                 1=1 {$where}
        //                         AND  wd.reason_deleting= 'និវត្ដន៍' ");
        // $total_record = $q->row()->c - 0;
        // $total_page = ceil($total_record / $limit);

        // qr. ==============
    //     $qr = query("SELECT
    //                         c.id,
    //                         c.civil_servant_id,
    //                         c.firstname,
    //                         c.lastname,
    //                         c.english_full_name,
    //                         c.gender,
    //                         c.dateofbirth,
    //                         c.mobile_phone,
    //                         c.unit_official_code,
    //                         wd.deleting_date,
    //                         wd.reason_deleting
    //                         FROM
    //                         civilservant AS c
    //                         INNER JOIN worknamedeleting AS wd ON c.id = wd.id
    //                         -- INNER JOIN `work` AS w ON c.id = w.id
    //                         and  wd.reason_deleting= 'និវត្ដន៍'
    //                         WHERE
    //                                 1 = 1 {$where}
    //                             ORDER BY
    //                                     CASE
    //                             WHEN c.unit_official_code IN ('', '0') THEN
    //                                     1
    //                             ELSE
    //                                     0
    //                             END,
    //                              -c.common_official_code DESC
    //                             LIMIT {$offset},
    //                                     {$limit}
    //                         ");

    //     $res = $qr->result();
    //     header('Content-Type: application/json; charset=utf-8');
    //     $arr = array('total_page' => $total_page, 'res' => $res,
    //         'total_record' => $total_record
    //     );
    //     echo json_encode($arr);
    // }

    // gr csv_retires. ================
    public function get_notretires() {
        // var ===============
        $offset = $this->input->post('offset');
        $limit  = $this->input->post('limit');
        $search = trim($this->input->post('search'));
        $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));
        //by role
       $pr_code = $this->session->userdata('pr_code');
       $sWhere  = "";
       if ($pr_code == "") {
           $sWhere .= "1=1 ";
       } else {
           $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
       }

        $where = '';
        if ($search != '') {
            $where .= "AND ( c.civil_servant_id LIKE '%{$search}%' ";
            $where .= "OR c.firstname LIKE '%{$search}%' ";
            $where .= "OR c.lastname LIKE '%{$search}%' ";
            $where .= "OR c.gender LIKE '%{$search}%' ";
            $where .= "OR dateofbirth LIKE '%{$search}%' ";
            $where .= "OR c.mobile_phone LIKE '%{$search}%' ";
            $where .= "OR wd.reason_deleting LIKE '%{$search}%' ) ";
        }

        // cnt. ==============
        $q = query("SELECT
                                        COUNT(cs.id) AS c
                                FROM
                                        civilservant AS cs
                                INNER JOIN `worknamedeleting` AS wd ON cs.id = wd.id
                                AND  wd.reason_deleting= 'បញ្ចប់អណ្ណតិ'
                                WHERE
                                        1=1 {$where} ");
        $total_record = $q->row()->c - 0;
        $total_page = ceil($total_record / $limit);

        // qr. ==============
        $qr = query("SELECT
                            c.id,
                            c.civil_servant_id,
                            c.firstname,
                            c.lastname,
                            c.english_full_name,
                            c.gender,
                            c.dateofbirth,
                            c.mobile_phone,
                            c.unit_official_code,
                            wd.deleting_date,
                            wd.reason_deleting
                            FROM
                            civilservant AS c
                            INNER JOIN worknamedeleting AS wd ON c.id = wd.id
                            -- INNER JOIN `work` AS w ON c.id = w.id
                            and  wd.reason_deleting= 'បញ្ចប់អណ្ណតិ'
                            WHERE
                                    1 = 1 {$where}
                                ORDER BY
                                        CASE
                                WHEN c.id IN ('', '0') THEN
                                        1
                                ELSE
                                        0
                                END,
                                 -c.id DESC
                                LIMIT {$offset},
                                        {$limit}
                            ");

        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        $arr = array('total_page' => $total_page, 'res' => $res,
            'total_record' => $total_record
        );
        echo json_encode($arr);
    }

}


