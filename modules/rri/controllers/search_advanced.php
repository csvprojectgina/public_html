<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search_advanced extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('search_advanced/index');
        $this->load->view('footer');
    }

    // opt. type =======================
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
                        WHERE
                                {$sWhere}                        
                        ORDER BY
                                rd.type ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    public function opt_pro() {
        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }

        $qr = query("SELECT DISTINCTROW
                                pr.id,
                                pr.khmer_name
                        FROM
                                road_info AS rd
                        INNER JOIN province AS pr ON rd.pro_id = pr.id
                        WHERE
                                {$sWhere}
                        ORDER BY
                                pr.khmer_name ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    public function opt_dis() {
        $province = $this->input->post('province');

        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }

        $where = '';
        $where .= "AND di.pro_code = '{$province}' ";

        $qr = query("SELECT
                                di.pro_code,
                                di.dis_code,
                                di.dis_khmer
                        FROM
                                district AS di
                        WHERE
                                {$sWhere} {$where}
                        ORDER BY
                                di.dis_khmer ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    public function opt_commune() {
        $province = $this->input->post('province');
        $district = $this->input->post('district');

        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }

        $where = '';
        $where .= "AND c.pro_code = '{$province}' AND c.dis_code = '{$district}' ";

        $qr = query("SELECT
                                c.pro_code,
                                c.dis_code,
                                c.com_code,
                                c.com_khmer
                        FROM
                                commune AS c
                        WHERE
                                {$sWhere} {$where}                        
                        ORDER BY
                                c.com_khmer ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    public function opt_village() {
        $province = $this->input->post('province');
        $district = $this->input->post('district');
        $commune = $this->input->post('commune');

        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }

        $where = '';
        $where .= "AND vi.pro_code = '{$province}' AND vi.dis_code = '{$district}' AND vi.com_code = '{$commune}' ";

        $qr = query("SELECT
                                vi.id,
                                vi.pro_code,
                                vi.dis_code,
                                vi.com_code,
                                vi.v_code,
                                vi.v_khmer,
                                vi.v_name
                        FROM
                                village AS vi
                        WHERE
                                {$sWhere} {$where}
                        ORDER BY
                                vi.v_khmer ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // opt. art ======================
    public function opt_art() {
        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }
        $qr = query("SELECT DISTINCTROW
                                `at`.type_building_art
                        FROM
                                art_building AS `at`
                        INNER JOIN road_info AS rd ON rd.road_id = `at`.road_id
                        WHERE {$sWhere}        
                        ORDER BY
                                `at`.type_building_art ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // opt. pub. ======================
    public function opt_pub() {
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }
        $qr = query("SELECT DISTINCTROW
                                pu.type_building
                        FROM
                                public_building AS pu
                        INNER JOIN road_info AS rd ON rd.road_id = pu.road_id
                        WHERE {$sWhere}        
                        ORDER BY
                                pu.type_building ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // opt. activity ==============
    public function opt_act() {
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }
        $qr = query("SELECT DISTINCTROW
                                hi.activity
                        FROM
                                history AS hi
                        INNER JOIN road_info AS rd ON rd.road_id = hi.road_id
                        WHERE {$sWhere}        
                        ORDER BY
                                hi.activity ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // opt. yr. ==================
    public function opt_yr() {
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }
        $qr = query("SELECT DISTINCTROW
                                hi.year_construct
                        FROM
                                history AS hi
                        INNER JOIN road_info AS rd ON rd.road_id = hi.road_id
                        WHERE {$sWhere}
                        ORDER BY
                                hi.year_construct ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // opt. app. ==================
    public function opt_app() {
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }
        $qr = query("SELECT DISTINCTROW
                                hi.apply_by
                        FROM
                                history AS hi
                        INNER JOIN road_info AS rd ON rd.road_id = hi.road_id
                        WHERE {$sWhere}
                        ORDER BY
                                hi.apply_by ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // opt. src. buget ==================
    public function opt_sb() {
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }
        $qr = query("SELECT DISTINCTROW
                                hi.source_budget
                        FROM
                                history AS hi
                        INNER JOIN road_info AS rd ON rd.road_id = hi.road_id
                        WHERE {$sWhere}        
                        ORDER BY
                                hi.source_budget ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // opt. pave ======================
    public function opt_pave() {
        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }
        $qr = query("SELECT DISTINCTROW
                                p.type_pavement
                        FROM
                                pavement AS p
                        INNER JOIN road_info AS rd ON rd.road_id = p.road_id
                        WHERE {$sWhere}
                        ORDER BY
                                p.type_pavement ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // compare ======================
    public function opt_compare() {
        $qr = query("SELECT DISTINCTROW
                                cp.id,
                                cp.compare
                        FROM
                                compare AS cp
                        ORDER BY
                                cp.compare ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // print ======================
    public function print_advanced() {
        $province = trim($this->input->post('province'));
        $district = trim($this->input->post('district'));
        $pub = trim($this->input->post('pub'));
        $pave = trim($this->input->post('pave'));

        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";
        }

        $where1 = '';
        if ($province != '') {
            $where1 .= "AND (rd.pro_id = '{$province}') ";
        }

        $where2 = '';
        if ($district != '') {
            $where2 .= "AND (rd.dis_id = '{$district}') ";
        }

        $where3 = '';
        if ($pub != '') {
            $where3 .= "AND (pu.type_building = '$pub') ";
        }

        $where4 = '';
        if ($pave != '') {
            $where4 .= "AND (pv.type_pavement = '{$pave}') ";
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
                                                                                pu.type_building
                                                                        FROM
                                                                                road_info AS rd
                                                                        INNER JOIN public_building AS pu ON rd.road_id = pu.road_id
                                                                        WHERE
                                                                                {$sWhere} {$where1} {$where2} {$where3}                                                                       
                                                                ) AS rd
                                                        INNER JOIN geography AS ge ON rd.road_id = ge.road_id
                                                ) AS rd
                                        INNER JOIN history AS hi ON rd.road_id = hi.road_id
                                ) AS rd
                        INNER JOIN pavement AS pv ON rd.road_id = pv.road_id
                        WHERE 1=1 {$where4}
                        GROUP BY
                                rd.idtemp
                        ORDER BY
                                rd.idtemp - 0 ASC ");

        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

    // search ===============================
    public function search() {
        // var ===================
        $offset = $this->input->post('offset') - 0;
        $limit = $this->input->post('limit') - 0;

        // gen. ==============
        $type = trim($this->input->post('type'));
        $length = trim($this->input->post('length')) - 0;
        $width = trim($this->input->post('width')) - 0;
        $com_length = trim($this->input->post('com_length'));
        $com_width = trim($this->input->post('com_width'));
        // geo. ============       
        $province = trim($this->input->post('province'));
        $district = trim($this->input->post('district'));
        $commune = trim($this->input->post('commune'));
        $village = trim($this->input->post('village'));


        // constr. ============       
        $art = trim($this->input->post('art'));
        $pub = trim($this->input->post('pub'));
        // hi. ===============
        $activity = trim($this->input->post('activity'));
        $year_construct = trim($this->input->post('year_construct'));
        $apply_by = trim($this->input->post('apply_by'));
        $source_budget = trim($this->input->post('source_budget'));
        // pave. =============
        $pave = trim($this->input->post('pave'));

        // by role ===============
        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "1=1 ";
        } else {
            $sWhere .= "1=1 AND (rd.pro_id IN ({$pr_code})) ";
        }

        $where = '';
        // gen. ==================
        if ($type != '') {
            $where .= " AND ( rd.type = '{$type}' ) ";
        }
        if ($length > 0) {
            $where .= " AND ( rd.length - 0 {$com_length} '{$length}' ) ";
        }
        if ($width > 0) {
            $where .= " AND ( rd.width - 0 {$com_width} '{$width}' ) ";
        }

        // geo. =================
        $where_ge = '';
        if ($province != '') {
            $where .= " AND ( rd.pro_id = '{$province}' ) ";
        }
        if ($district != '') {
            $where .= " AND ( rd.dis_id = '{$district}' ) ";
        }
        if ($commune != '') {
            $where_ge .= "AND ( ge.commune = '{$commune}' ) ";
        }
        if ($village != '') {
            $where_ge .= "AND ( ge.village = '{$village}' ) ";
        }


        // hi. =================
        $where_h = '';
        if ($activity != '') {
            $where_h .= " AND ( hi.activity = '{$activity}' ) ";
        }
        if ($year_construct != '') {
            $where_h .= " AND ( hi.year_construct = '{$year_construct}' ) ";
        }
        if ($apply_by != '') {
            $where_h .= " AND ( hi.apply_by = '{$apply_by}' ) ";
        }
        if ($source_budget != '') {
            $where_h .= " AND ( hi.source_budget = '{$source_budget}' ) ";
        }

        $cnt = '';
        $sql = '';
        // con. ===================
        if ($pave != '') {
            $sql .= "SELECT
                                rd.road_id,
                                rd.idtemp,
                                rd.road_number,
                                rd.road_name,
                                rd.type,
                                rd.length,
                                rd.width
                        FROM
                                ( ";
        }
        if ($activity != '' || $year_construct != '' || $apply_by != '' || $source_budget != '') {
            $sql .= "SELECT
                                rd.road_id,
                                rd.idtemp,
                                rd.road_number,
                                rd.road_name,
                                rd.type,
                                rd.length,
                                rd.width
                        FROM
                                ( ";
        }
        if ($pub != '') {
            $sql .= "SELECT
                                rd.road_id,
                                rd.idtemp,
                                rd.road_number,
                                rd.road_name,
                                rd.type,
                                rd.length,
                                rd.width
                        FROM
                                ( ";
        }
        if ($art != '') {
            $sql .= "SELECT
                                rd.road_id,
                                rd.idtemp,
                                rd.road_number,
                                rd.road_name,
                                rd.type,
                                rd.length,
                                rd.width
                        FROM
                                ( ";
        }
        if ($village != '') {
            $sql .= "SELECT
                                rd.road_id,
                                rd.idtemp,
                                rd.road_number,
                                rd.road_name,
                                rd.type,
                                rd.length,
                                rd.width
                        FROM
                                ( ";
        }
        if ($commune != '') {
            $sql .= "SELECT
                                rd.road_id,
                                rd.idtemp,
                                rd.road_number,
                                rd.road_name,
                                rd.type,
                                rd.length,
                                rd.width
                        FROM
                                ( ";
        }

        // general info. ==============
        $sql .= "SELECT
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
                        {$sWhere} {$where} ";

        if ($commune != '') {
            $sql .= ") AS rd
                        INNER JOIN geography AS ge ON rd.road_id = ge.road_id
                        WHERE
                                1=1 {$where_ge} ";
        }
        if ($village != '') {
            $sql .= ") AS rd
                        INNER JOIN geography AS ge ON rd.road_id = ge.road_id
                        WHERE
                                1=1 {$where_ge} ";
        }
        if ($art != '') {
            $sql .= ") AS rd
                        INNER JOIN art_building AS ar ON rd.road_id = ar.road_id
                        WHERE
                                ar.type_building_art = '{$art}' ";
        }
        if ($pub != '') {
            $sql .= ") AS rd
                        INNER JOIN public_building AS pu ON rd.road_id = pu.road_id
                        WHERE
                                pu.type_building = '{$pub}' ";
        }
        if ($activity != '' || $year_construct != '' || $apply_by != '' || $source_budget != '') {
            $sql .= ") AS rd
                        INNER JOIN history AS hi ON rd.road_id = hi.road_id
                        WHERE
                                1=1 {$where_h} ";
        }
        if ($pave != '') {
            $sql .= ") AS rd
                        INNER JOIN pavement AS pv ON rd.road_id = pv.road_id
                        WHERE
                                pv.type_pavement = '{$pave}' ";
        }

        $cnt .= "SELECT
                            COUNT(road_id) AS c
                    FROM
                            ( " . $sql . ") AS cnt ";

        $sql .= "ORDER BY rd.idtemp - 0 ASC LIMIT {$offset}, {$limit} ";

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

}
