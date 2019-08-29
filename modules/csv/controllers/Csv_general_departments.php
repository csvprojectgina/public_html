<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of csv_general_departments
 *
 * @author manin
 */
class csv_general_departments extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('csv/csv_general_departments/index');
        $this->load->view('footer');
    }
    /* get general department */
    public function get_general_deps() {
        // var ===============
        $offset = $this->input->post('offset');
        $limit = $this->input->post('limit');
        $search = trim($this->input->post('search'));
        $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));
        //by role
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
        }
        $where = '';
        if ($search != '') {
            $where .= "AND ( unit LIKE '%{$search}%' ";
            $where .= "OR id LIKE '%{$search}%' ";
        }

        // cnt. ==============
        $q = query("SELECT COUNT(cs.general_dep_id) AS c
                                FROM
                                        general_departments AS cs
                                WHERE status='1'");
        $total_record = $q->row()->c - 0;
        $total_page = ceil($total_record / $limit);
        // qr. ==============
        $qr = query("SELECT * FROM general_departments WHERE status =1 ORDER BY general_dep_id - 0 DESC LIMIT {$offset}, {$limit}  ");

        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        $arr = array('total_page' => $total_page, 'res' => $res,
            'total_record' => $total_record
        );
        echo json_encode($arr);
    }
    public function delete()
    {
      $id = $this->input->post('id');

      if ($id > 0) {
          $query = query("update general_departments set status='0'  WHERE general_dep_id  = '{$id}' ")->row();
      }
      redirect('csv/csv_general_departments/index');
    }
    // insert ===============
    public function insert_general_deps() {
        // general department Information===========
        $id = $this->input->post('general_dep_id');
        $general_deps = $this->input->post('general_deps');
        $status = '1';

        if ($id== 0) {
            $data = array(
                'general_deps_name' => $general_deps,
                'status' => $status
            );
            insert('general_departments', $data);
        } else {
            $data = array(
                // Personal Information========
                'general_deps_name' => $general_deps
            );
            update('general_departments', $data, array('general_dep_id' => $id));
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
    // edit general_departments============
    public function edit($eid = '') {
        $id = (urldecode($eid));
        // csv ==========
        $query = query("SELECT * FROM general_departments  WHERE general_dep_id = '{$id}' ");
        $row = $query->row();
        $data['row'] = $row;
        // main_id =========
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('csv/csv_general_departments/form', $data);
        $this->load->view('footer');
    }
}
