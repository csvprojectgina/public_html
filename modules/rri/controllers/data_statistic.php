<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_statistic extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/data_statistic/index');
        $this->load->view('footer');
    }

    public function form() {
        $this->load->view('header');
        $this->load->view('rri/data_statistic/form');
        $this->load->view('footer');
    }

    public function grid() {
        // ==========================
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "WHERE 1=1 ";
        } else {
            $sWhere .= "WHERE st.pro_code IN (" . $pr_code . ") ";
        }

        $total = query("SELECT
                                    COUNT(st.pro_code) AS to_
                            FROM
                                    statistic_data AS st
                            LEFT JOIN province AS p ON p.id = st.pro_code ")->row()->to_;

        $total_show = query("SELECT
                                        COUNT(st.pro_code) AS to_show
                                FROM
                                        statistic_data AS st
                                LEFT JOIN province AS p ON p.id = st.pro_code
                                {$sWhere} ")->row()->to_show;

        $qr_pr = query("SELECT
                                    p.khmer_name,
                                    st.`no` AS id,
                                    st.pro_code,
                                    FORMAT(st.total_line, 0) AS to_line,
                                    FORMAT(st.total_length, 3) AS to_l
                            FROM
                                    statistic_data AS st                                    
                            LEFT JOIN province AS p ON p.id = st.pro_code
                            {$sWhere}
                            ORDER BY
                                    st.pro_code ");
        $re = $qr_pr->result();

        $arr = array(
            'total' => $total,
            'total_show' => $total_show,
            're' => $re
        );

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($arr);
    }

    public function edit($eid = '') {
        $id = (urldecode($eid));
        $query = query("SELECT * FROM statistic_data AS st WHERE st.`no` = '{$id}' ");
        $row = $query->row();
        $data['row'] = $row;
        $data['id'] = $id;

        $this->load->view('header');
        $this->load->view('rri/data_statistic/form', $data);
        $this->load->view('footer');
    }

    public function insert() {
        $no = $this->input->post('no');
        $total_line = $this->input->post('total_line');
        $total_length = $this->input->post('total_length');
        $total_line_type1 = $this->input->post('total_line_type1');
        $total_length_type1 = $this->input->post('total_length_type1');
        $total_line_type2 = $this->input->post('total_line_type2');
        $total_length_type2 = $this->input->post('total_length_type2');
        $total_line_type3 = $this->input->post('total_line_type3');
        $total_length_type3 = $this->input->post('total_length_type3');
        $total_line_type4 = $this->input->post('total_line_type4');
        $total_length_type4 = $this->input->post('total_length_type4');
        if ($no - 0 == 0) {
            $data_statistic = array(
                'total_line' => $total_line,
                'total_length' => $total_length,
                'total_line_type1' => $total_line_type1,
                'total_length_type1' => $total_length_type1,
                'total_line_type2' => $total_line_type2,
                'total_length_type2' => $total_length_type2,
                'total_line_type3' => $total_line_type3,
                'total_length_type3' => $total_length_type3,
                'total_line_type4' => $total_line_type4,
                'total_length_type4' => $total_length_type4
            );
            insert('statistic_data', $data_statistic);
        } else {
            $data_statistic = array(
                'total_line' => $total_line,
                'total_length' => $total_length,
                'total_line_type1' => $total_line_type1,
                'total_length_type1' => $total_length_type1,
                'total_line_type2' => $total_line_type2,
                'total_length_type2' => $total_length_type2,
                'total_line_type3' => $total_line_type3,
                'total_length_type3' => $total_length_type3,
                'total_line_type4' => $total_line_type4,
                'total_length_type4' => $total_length_type4
            );
            update('statistic_data', $data_statistic, array('no' => $no));
        }
        redirect('rri/data_statistic/index', 'refresh');
    }

}

// end class ===========================
