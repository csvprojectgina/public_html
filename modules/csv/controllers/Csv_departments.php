<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class csv_departments extends Admin_Controller {
    // index ===============
    public function index() {
        $this->load->view('header');
        $this->load->view('csv/departments/index');
        $this->load->view('footer');
    }
    // advanced search ========
    public function advanced_search() {
        $this->load->view('header'); 
        $this->load->view('csv/csv_info/advanced_search');
        $this->load->view('footer');
    }

    // form ===============
    public function form() {
        $this->load->view('header');
        $this->load->view('csv/departments/form');
        $this->load->view('footer');
    }

    // delete ===============
    public function delete() {
        $id = $this->input->post('id');
        if ($id > 0) {
            $query = query("update tbl_departments set status='0'  WHERE d_id  = '{$id}' ")->row();
        }
        redirect('csv/csv_departments/index');
    }

    // edit ============
    public function edit($eid = '') {
        $id = (urldecode($eid));
        // csv ==========
        $query = query("SELECT
	               d.*, un.*, general_deps_name
                            FROM
                                    tbl_departments AS d
                            LEFT JOIN unit AS un ON d.u_id = un.id
                            LEFT JOIN general_departments AS gd ON d.general_deps_id = gd.general_dep_id
                            WHERE
                                    d.d_id= '{$id}' ");
        $row = $query->row();
        $data['row'] = $row;

        // get data from unit
        $query = query("SELECT * FROM unit  WHERE status='1' ");
        $row = $query->result();
        $data['unitquery'] = $row;

        // get general departments
         $query = query("SELECT * FROM general_departments  WHERE status='1' ");
         $row = $query->result();
         $data['gdquery'] = $row;

        // main_id =========
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('csv/departments/form', $data);
        $this->load->view('footer');
    }

    function get_unit() {

        $sql = ("SELECT * FROM unit where status=1 ORDER BY id DESC");
        $data = $this->db->query($sql)->result();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function get_general_deps() {

        $sql = ("SELECT * FROM general_departments where status=1 ORDER BY general_dep_id  DESC");
        $data = $this->db->query($sql)->result();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // insert ===============
    public function insert_departments() {
        // department Information===========
        $id = $this->input->post('id');
        $uid = $this->input->post('uid');
        $d_name = $this->input->post('d_name');
        $general_dep_id = $this->input->post('general_dep_id');
        $status = '1';

        if ($id == 0) {
            $data = array(
                // Personal Information========
                'u_id' => $uid,
                'd_name' => $d_name,
                'status' => $status,
                'general_deps_id' => $general_dep_id
            );
            insert('tbl_departments', $data);
        } else {
            $data = array(
                'u_id' => $uid,
                'd_name' => $d_name,
                'status' => $status,
                'general_deps_id' => $general_dep_id
            );
            update('tbl_departments', $data, array('d_id' => $id));
        }// if =========
        $qr_a = query("SELECT
                                        a.absentid,
                                        a.id,
                                        a.numberofday,
                                        a.startdate,
                                        a.enddate,
                                        a.reason
                                        FROM
                                                tbl_departments AS a
                                        WHERE
                                                a.d_id = '$id'
                                        ORDER BY
                                                a.startdate DESC ");
        header('Content-Type: application/json; charset=utf-8');
        $re_d = $qr_d->result();
        $re_a = $qr_a->result();
        echo json_encode(array(
            'id' => $id,
            're_a' => $re_a
        ));
    }

    // gr csv_info. ================
    public function load() {
        // var ===============
        $offset = $this->input->post('offset');
        $limit = $this->input->post('limit');
        $search = trim($this->input->post('search'));
        $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));
        //by role
        $where = '';
        if ($search != '') {
            $where .= "AND ( d_name LIKE '%{$search}%' ";
            $where .= "OR d_id LIKE '%{$search}%' )";
        }
        // cnt. ==============
        $q = query("SELECT COUNT(cs.d_id) AS c
                                FROM
                                        tbl_departments AS cs
                                        LEFT JOIN unit AS un ON cs.u_id = un.id
                                WHERE cs.status='1'");
        $total_record = $q->row()->c - 0;
        $total_page = ceil($total_record / $limit);

        // qr. ==============
        $qr = query("SELECT
                            dp.*, un.*, general_deps_name
                                FROM
                                        tbl_departments AS dp
                                LEFT JOIN unit AS un ON dp.u_id = un.id
                                LEFT JOIN general_departments as gd ON dp.general_deps_id= gd.general_dep_id
                                WHERE   1 = 1 {$where}
                                AND
                                        dp. STATUS = '1'
                                ORDER BY
	d_id - 0 DESC LIMIT {$offset},  {$limit}  ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        $arr = array('total_page' => $total_page, 'res' => $res,
            'total_record' => $total_record
        );
        echo json_encode($arr);
    }

}
