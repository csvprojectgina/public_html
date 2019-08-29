<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search_province extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/search_province/index');
        $this->load->view('footer');
    }

    // pro_map =====================
    public function link_map_province($pro_id = '') {
        $data['pro_id'] = $pro_id;
        $this->load->view('header');
        $this->load->view('rri/search_province/link_map_pro', $data);
        $this->load->view('footer');
    }

    // title ====================
    public function title() {
        $pro_id = $this->input->post('pro_id');
        $qr = query("SELECT
                                pr.id,
                                pr.khmer_name
                        FROM
                                province AS pr
                        WHERE
                                pr.id = '{$pro_id}' ")->row();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($qr);
    }

    // opt province ==============
    public function opt_pro() {
        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (pr.id IN({$pr_code})) ";
        }
        $qr = query("SELECT DISTINCT
                                pr.id,
                                pr.khmer_name
                        FROM
                                province AS pr
                        WHERE 
                                {$sWhere}
                        ORDER BY
                                pr.khmer_name ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // opt display ==============
    public function opt_display() {
        $qr = query("SELECT DISTINCTROW
                                dis.disp_num
                        FROM
                                display AS dis
                        ORDER BY
                                dis.disp_num ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    public function search_by_pro() {
        $pro_id = trim($this->input->post('pro_id'));
        $offset = $this->input->post('offset') - 0;
        $limit = $this->input->post('limit') - 0;

        $where = '';
        $where .= "rd.pro_id = '{$pro_id}' ";

        // count ==================
        $qr = query("SELECT
                                COUNT(rd.road_id) AS c
                        FROM
                                road_info AS rd 
                        WHERE
                                {$where} ");
        $total_record = $qr->row()->c - 0;
        $total_page = ceil($total_record / $limit);

        // query ===================
        $qr_ = query("SELECT
                                rd.road_id,
                                rd.idtemp,
                                rd.road_number,
                                rd.road_name,
                                rd.type,
                                rd.length,
                                rd.width
                        FROM
                                road_info AS rd
                        WHERE
                                {$where}
                        ORDER BY
                                rd.idtemp - 0 ASC
                        LIMIT {$offset},
                         {$limit} ");

        $res = $qr_->result();
        header('Content-Type: application/json; charset=utf-8');
        $arr = array('total_page' => $total_page, 'res' => $res,
            'total_record' => $total_record);
        echo json_encode($arr);
    }

}
