<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search_pavement extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/search_pavement/index');
        $this->load->view('footer');
    }

    // pdf ===============
    public function pdf_() {
        $pavement = $this->input->post('pavement');
        $data['pavement'] = $pavement;
        $this->load->view('rri/search_pavement/pdf_test', $data);
    }

    // get type ===============
    public function opt_pavement() {
        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
        }
        $qr = query("SELECT DISTINCTROW
                                pv.type_pavement
                        FROM
                                pavement AS pv
                        INNER JOIN road_info AS rd ON rd.road_id = pv.road_id
                        WHERE {$sWhere}
                        ORDER BY
                                pv.type_pavement ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // get display ===============
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

    // get by type ===============
    public function print_pavement() {
        $pavement = trim($this->input->post('pavement'));

        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
        }

        $where = '';
        if ($pavement != '') {
            $where .= "AND (pv.type_pavement = '{$pavement}') ";
        }

        $qr = query("SELECT     
                                rd.road_id,
                                rd.idtemp,
                                rd.road_name,
                                rd.type,
                                rd.length,
                                rd.width,
                                rd.first_point_x,
                                rd.first_point_y,
                                rd.last_point_x,
                                rd.last_point_y,
                                rd.type_pavement,
                                rd.commune,
                                hi.activity,
                                hi.apply_by,
                                hi.year_construct,
                                hi.source_budget
                        FROM
                                (
                                        SELECT
                                                rd.road_id,
                                                rd.idtemp,
                                                rd.road_name,
                                                rd.type,
                                                rd.length,
                                                rd.width,
                                                rd.first_point_x,
                                                rd.first_point_y,
                                                rd.last_point_x,
                                                rd.last_point_y,
                                                rd.type_pavement,
                                                ge.commune
                                        FROM
                                                (
                                                        SELECT
                                                                rd.road_id,
                                                                rd.idtemp,
                                                                rd.road_name,
                                                                rd.type,
                                                                rd.length,
                                                                rd.width,
                                                                rd.first_point_x,
                                                                rd.first_point_y,
                                                                rd.last_point_x,
                                                                rd.last_point_y,
                                                                pv.type_pavement
                                                        FROM
                                                                road_info AS rd
                                                        INNER JOIN pavement AS pv ON rd.road_id = pv.road_id
                                                        WHERE {$sWhere} {$where}
                                                ) AS rd
                                        INNER JOIN geography AS ge ON rd.road_id = ge.road_id
                                ) AS rd
                        INNER JOIN history AS hi ON rd.road_id = hi.road_id
                        GROUP BY rd.idtemp
                        ORDER BY
                                rd.idtemp - 0 ASC ");

        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // gr search_pavement ===================
    public function grid_pavement() {
        // var =================
        $offset = $this->input->post('offset');
        $limit = $this->input->post('limit');
        $pavement = trim($this->input->post('pavement'));

        // by role ==============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
        }

        $where = '';
        if ($pavement != '') {
            $where .= "AND ( pv.type_pavement = '{$pavement}' ) ";
        } else {
            $where .= "AND 1=1 ";
        }

        $q = query("SELECT
                                COUNT(rd.road_id) AS c
                        FROM
                                road_info AS rd
                        INNER JOIN pavement AS pv ON rd.road_id = pv.road_id
                        WHERE 
                                {$sWhere} {$where} ");

        // cnt. ==================
        $total_record = $q->row()->c - 0;
        $total_page = ceil($total_record / $limit);

        $qr = query("SELECT
                                rd.road_id,
                                rd.idtemp,
                                rd.road_number,
                                rd.road_name,
                                rd.type,
                                rd.length,
                                rd.width,
                                pv.type_pavement
                        FROM
                                road_info AS rd
                        INNER JOIN pavement AS pv ON rd.road_id = pv.road_id
                        WHERE
                                {$sWhere} {$where}                        
                        ORDER BY
                                rd.idtemp - 0 ASC
                        LIMIT {$offset},
                         {$limit} ");

        // qr. ===================
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        $arr = array('total_page' => $total_page, 'res' => $res,
            'total_record' => $total_record
        );
        echo json_encode($arr);
    }

}
