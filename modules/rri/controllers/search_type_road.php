<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search_type_road extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/search_type_road/index');
        $this->load->view('footer');
    }

    // get type ===============
    public function opt_type() {
        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
        }

        $qr = query("SELECT DISTINCTROW
                                rd.type
                        FROM
                                road_info AS rd
                        WHERE {$sWhere}        
                        ORDER BY
                                rd.type ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // get type ===============
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
    public function get_by_type() {
        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
        }

        $type = trim($this->input->post('type'));
        $where = '';
        if ($type != '') {
            $where .= "AND (rd.type = '{$type}') ";
        }

        $qr = query("SELECT     
                                rd.road_id,
                                rd.idtemp,
                                rd.road_name,
                                rd.length,
                                rd.width,
                                rd.first_point_x,
                                rd.first_point_y,
                                rd.last_point_x,
                                rd.last_point_y,
                                rd.type,
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
                                                rd.length,
                                                rd.width,
                                                rd.first_point_x,
                                                rd.first_point_y,
                                                rd.last_point_x,
                                                rd.last_point_y,
                                                rd.type,
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
                                                                rd.length,
                                                                rd.width,
                                                                rd.first_point_x,
                                                                rd.first_point_y,
                                                                rd.last_point_x,
                                                                rd.last_point_y,
                                                                rd.type,
                                                                ge.commune
                                                        FROM
                                                                (
                                                                        SELECT
                                                                                rd.road_id,
                                                                                rd.idtemp,
                                                                                rd.road_name,
                                                                                rd.length,
                                                                                rd.width,
                                                                                rd.first_point_x,
                                                                                rd.first_point_y,
                                                                                rd.last_point_x,
                                                                                rd.last_point_y,
                                                                                rd.type
                                                                        FROM
                                                                                road_info AS rd
                                                                        WHERE
                                                                                {$sWhere} {$where}
                                                                ) AS rd
                                                        INNER JOIN geography AS ge ON rd.road_id = ge.road_id
                                                ) AS rd
                                        INNER JOIN history AS hi ON rd.road_id = hi.road_id
                                ) AS rd
                        INNER JOIN pavement AS pv ON rd.road_id = pv.road_id
                        GROUP BY rd.idtemp
                        ORDER BY
                                rd.idtemp - 0 ASC ");                                                                               
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // gr type_road ===============
    public function grid_type_road() {
        // var ===============
        $offset = $this->input->post('offset');
        $limit = $this->input->post('limit');
        $type = trim($this->input->post('type'));
        $direction = $this->input->post('direction');

        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
        }

        $where = '';
        if ($type != '') {
            $where .= "AND (rd.type = '{$type}') ";
        }else{
            $where .= "AND 1=1 ";
        }
        $q = query("SELECT
                                COUNT(rd.road_id) AS c
                        FROM
                                road_info AS rd
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
                                rd.width
                        FROM
                                road_info AS rd
                        WHERE 
                                {$sWhere} {$where}
                        ORDER BY
                                rd.idtemp - 0 {$direction}
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
