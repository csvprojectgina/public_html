<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search_type_construction extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/search_type_construction/index');
        $this->load->view('footer');
    }

    public function pdf() {       
        $type_building = $this->input->post('type_building');
        $data['type_building'] = $type_building;
        $this->load->view('rri/search_type_construction/pdf', $data);
    }

    // get type ===============
    public function opt_building() {
        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
        }
        $qr = query("SELECT DISTINCTROW
                                pu.type_building
                        FROM
                                public_building AS pu
                        INNER JOIN road_info AS rd ON rd.road_id = pu.road_id
                        WHERE
                                {$sWhere}
                        ORDER BY
                                pu.type_building ASC ");
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

    // print ========================
    public function print_building() {
        $type_building = trim($this->input->post('type_building'));

        // by role ===========
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
        }

        $where = '';
        if ($type_building != '') {
            $where .= "AND (pu.type_building = '{$type_building}') ";
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
                                rd.type_building,
                                rd.name_building,
                                rd.commune,
                                rd.activity,
                                rd.apply_by,
                                rd.year_construct,
                                rd.source_budget,
                                pv.type_pavement
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
                                                rd.type_building,
                                                rd.name_building,
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
                                                                rd.type_building,
                                                                rd.name_building,
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
                                                                                pu.type_building,
                                                                                pu.name_building
                                                                        FROM
                                                                                road_info AS rd
                                                                        INNER JOIN public_building AS pu ON rd.road_id = pu.road_id
                                                                        WHERE
                                                                                {$sWhere} {$where}
                                                                ) AS rd
                                                        INNER JOIN geography AS ge ON rd.road_id = ge.road_id
                                                ) AS rd
                                        INNER JOIN history AS hi ON rd.road_id = hi.road_id
                                ) AS rd
                        INNER JOIN pavement AS pv ON rd.road_id = pv.road_id
                        GROUP BY
                                rd.idtemp
                        ORDER BY
                                rd.idtemp - 0 ASC ");

        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // gr type_construction =================
    public function grid_type_construction() {
        // var ===============
        $offset = $this->input->post('offset');
        $limit = $this->input->post('limit');
        $type_building = trim($this->input->post('type_building'));

        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
        }

        $where = '';
        if ($type_building != '') {
            $where .= "AND (pu.type_building = '{$type_building}') ";
        } else {
            $where .= "AND 1=1 ";
        }
        $q = query("SELECT
                                COUNT(rd.road_id) AS c
                        FROM
                                public_building AS pu
                        INNER JOIN road_info AS rd ON rd.road_id = pu.road_id
                                                WHERE 
                                {$sWhere} {$where} ");

        // cnt. ==================
        $total_record = $q->row()->c - 0;
        $total_page = ceil($total_record / $limit);

        $qr = query("SELECT
                                pu.type_building,
                                pu.name_building,
                                rd.road_id,
                                rd.idtemp,
                                rd.road_number,
                                rd.road_name
                        FROM
                                public_building AS pu
                        INNER JOIN road_info AS rd ON rd.road_id = pu.road_id
                        WHERE
                                {$sWhere} {$where}
                        ORDER BY
                                pu.type_building ASC
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
