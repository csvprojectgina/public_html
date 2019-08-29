

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Csv_reasons extends Admin_Controller {

    // index ===============
    public function index() {
        $this->load->view('header');
        $this->load->view('csv/reasons/index');
        $this->load->view('footer');
    }

    // delete ===============
    public function delete() {
        $id = $this->input->post('rea_id');

        if ($id > 0) {
        $query = query("update tbl_reasons set status='0'  WHERE rea_id  = '{$id}' ")->row();

        }
        redirect('csv/reasons/index');
    }

    // edit ============
    public function edit($eid = '') {
        $id = (urldecode($eid));

        // csv ==========
        $query = query("SELECT * FROM tbl_reasons AS c WHERE c.rea_id = '{$id}' ");
        $row = $query->row();
        $data['row'] = $row;

        // main_id =========
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('csv/reasons/form', $data);
        $this->load->view('footer');
    }

    // insert ===============
    public function save() {
        $ids = $this->input->post('id');

        if ($ids == 0) {
            // Personal Information===========
            $reason_name = $this->input->post('reason_name');
            $status = '1';
            $data = array(
                'reason_name' => $reason_name,
                'status' => $status
            );
            insert('tbl_reasons', $data);


        } else {
            //main id for update=========
            $id = $this->input->post('id');
            // Personal Information===========
            $reason_name = $this->input->post('reason_name');
            $status = '1';
            $data = array(
                // Personal Information========
                'reason_name' => $reason_name
            );
            update('tbl_reasons', $data, array('rea_id' => $ids));
        }// if =========
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array(
            'rea_id' => $ids,
        ));
    }

    // gr csv_retires. ================
    public function load() {
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
                                        COUNT(rea_id) AS c
                                FROM
                                        tbl_reasons
                                WHERE  status= '1'");
        $total_record = $q->row()->c - 0;
        $total_page = ceil($total_record / $limit);

        // qr. ==============
        $qr = query("SELECT * FROM tbl_reasons  WHERE status=1 ORDER BY rea_id - 0 DESC LIMIT {$offset}, {$limit}  ");

        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        $arr = array('total_page' => $total_page, 'res' => $res,
            'total_record' => $total_record
        );
        echo json_encode($arr);
    }

}
