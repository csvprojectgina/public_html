<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Plan extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/plan/index');
        $this->load->view('footer');
    }

    public function test() {
        $this->load->view('header');
        $this->load->view('rri/plan/test/index');
        $this->load->view('footer');
    }

    public function form() {
        $this->load->view('header');
        $this->load->view('rri/plan/form');
        $this->load->view('footer');
    }

    public function report_bill() {
        $this->load->view('header');
        $this->load->view('rri/plan/report_bill');
        $this->load->view('footer');
    }

    public function report_general() {
        $this->load->view('header');
        $this->load->view('rri/plan/report_general');
        $this->load->view('footer');
    }

    public function edit($eid = '') {
        $id = simple_decrypt(urldecode($eid));
        $query = query("SELECT * FROM road_info AS r WHERE r.road_id = '{$id}' ");
        $query_ = query("SELECT * FROM y_section AS r WHERE r.road_id = '{$id}' ");

        // row info. =================================
        $row = $query->row();
        $row_ = $query_->row();
        $data['row'] = $row;
        $data['row_'] = $row_;
        $data['id'] = $id;

        $this->load->view('header');
        $this->load->view('rri/plan/form', $data);
        $this->load->view('footer');
    }

    public function insert() {
        $road_id = $this->input->post('road_id') - 0;
        $id = $this->input->post('id') - 0;

        // location ================================
        $region = $this->input->post('region');
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $start_km = $this->input->post('start_km') - 0;
        $end_km = $this->input->post('end_km') - 0;
        $road_class = $this->input->post('road_class');
        $surface_type = $this->input->post('surface_type');
        $district = $this->input->post('district');
        $year_last_surface = $this->input->post('year_last_surface');

        // iq4 ================================
        $to_b_area = $this->input->post('to_b_area');
        $to_t_clen = $this->input->post('to_t_clen');
        $rs_no = $this->input->post('rs_no');
        $gr_len = $this->input->post('gr_len');
        $sec_w = $this->input->post('sec_w');
        $spl = $this->input->post('spl');
        $topo_zone = $this->input->post('topo_zone');
        $rain_zone = $this->input->post('rain_zone');

        // iq3 ================================
        $lane_width = $this->input->post('lane_width');
        $number_of_lanes = $this->input->post('number_of_lanes');
        $shoulder_length_l = $this->input->post('shoulder_length_l');
        $shoulder_length_r = $this->input->post('shoulder_length_r');
        $shoulder_width_l = $this->input->post('shoulder_width_l');
        $shoulder_width_r = $this->input->post('shoulder_width_r');
        $shoulder_type_l = $this->input->post('shoulder_type_l');
        $shoulder_type_r = $this->input->post('shoulder_type_r');
        $side_drain_type_l = $this->input->post('side_drain_type_l');
        $side_drain_type_r = $this->input->post('side_drain_type_r');
        $side_drain_length_l = $this->input->post('side_drain_length_l');
        $side_drain_length_r = $this->input->post('side_drain_length_r');
        $reserve_width_r = $this->input->post('reserve_width_r');
        $reserve_width_l = $this->input->post('reserve_width_l');
        $guard_rail_type_l = $this->input->post('guard_rail_type_l');
        $guard_rail_type_r = $this->input->post('guard_rail_type_r');
        $guard_rail_extent_l = $this->input->post('guard_rail_extent_l');
        $guard_rail_extent_r = $this->input->post('guard_rail_extent_r');

        // additional data ================================        
        $start_gps_n = $this->input->post('start_gps_n');
        $end_gps_n = $this->input->post('end_gps_n');
        $start_gps_e = $this->input->post('start_gps_e');
        $end_gps_e = $this->input->post('end_gps_e');
        $use_gps = $this->input->post('use_gps');

        if ($road_id == 0) {
            exit();
        } else {
            if ($id == 0) {
                $data_section = array(
                    // location ===================
                    'road_id' => $road_id,
                    'region' => $region,
                    'start' => $start,
                    'end' => $end,
                    'start_km' => $start_km,
                    'end_km' => $end_km,
                    'road_class' => $road_class,
                    'surface_type' => $surface_type,
                    'district' => $district,
                    'year_last_surface' => $year_last_surface,
                    // IQ4 ========================
                    'to_b_area' => $to_b_area,
                    'to_t_clen' => $to_t_clen,
                    'rs_no' => $rs_no,
                    'gr_len' => $gr_len,
                    'sec_w' => $sec_w,
                    'spl' => $spl,
                    'topo_zone' => $topo_zone,
                    'rain_zone' => $rain_zone,
                    // IQ3 ========================
                    'lane_width' => $lane_width,
                    'number_of_lanes' => $number_of_lanes,
                    'shoulder_length_l' => $shoulder_length_l,
                    'shoulder_length_r' => $shoulder_length_r,
                    'shoulder_width_l' => $shoulder_width_l,
                    'shoulder_width_r' => $shoulder_width_r,
                    'shoulder_type_l' => $shoulder_type_l,
                    'shoulder_type_r' => $shoulder_type_r,
                    'side_drain_type_l' => $side_drain_type_l,
                    'side_drain_type_r' => $side_drain_type_r,
                    'side_drain_length_l' => $side_drain_length_l,
                    'side_drain_length_r' => $side_drain_length_r,
                    'reserve_width_r' => $reserve_width_r,
                    'reserve_width_l' => $reserve_width_l,
                    'guard_rail_type_l' => $guard_rail_type_l,
                    'guard_rail_type_r' => $guard_rail_type_r,
                    'guard_rail_extent_l' => $guard_rail_extent_l,
                    'guard_rail_extent_r' => $guard_rail_extent_r,
                    // additional data ======================
                    'start_gps_n' => $start_gps_n,
                    'end_gps_n' => $end_gps_n,
                    'start_gps_e' => $start_gps_e,
                    'end_gps_e' => $end_gps_e,
                    'use_gps' => $use_gps
                );
                insert('y_section', $data_section);
            } else {
                $data_section = array(
                    // location ===================
                    'road_id' => $road_id,
                    'region' => $region,
                    'start' => $start,
                    'end' => $end,
                    'start_km' => $start_km,
                    'end_km' => $end_km,
                    'road_class' => $road_class,
                    'surface_type' => $surface_type,
                    'district' => $district,
                    'year_last_surface' => $year_last_surface,
                    // IQ4 ========================
                    'to_b_area' => $to_b_area,
                    'to_t_clen' => $to_t_clen,
                    'rs_no' => $rs_no,
                    'gr_len' => $gr_len,
                    'sec_w' => $sec_w,
                    'spl' => $spl,
                    'topo_zone' => $topo_zone,
                    'rain_zone' => $rain_zone,
                    // IQ3 ========================
                    'lane_width' => $lane_width,
                    'number_of_lanes' => $number_of_lanes,
                    'shoulder_length_l' => $shoulder_length_l,
                    'shoulder_length_r' => $shoulder_length_r,
                    'shoulder_width_l' => $shoulder_width_l,
                    'shoulder_width_r' => $shoulder_width_r,
                    'shoulder_type_l' => $shoulder_type_l,
                    'shoulder_type_r' => $shoulder_type_r,
                    'side_drain_type_l' => $side_drain_type_l,
                    'side_drain_type_r' => $side_drain_type_r,
                    'side_drain_length_l' => $side_drain_length_l,
                    'side_drain_length_r' => $side_drain_length_r,
                    'reserve_width_r' => $reserve_width_r,
                    'reserve_width_l' => $reserve_width_l,
                    'guard_rail_type_l' => $guard_rail_type_l,
                    'guard_rail_type_r' => $guard_rail_type_r,
                    'guard_rail_extent_l' => $guard_rail_extent_l,
                    'guard_rail_extent_r' => $guard_rail_extent_r,
                    // additional data ======================
                    'start_gps_n' => $start_gps_n,
                    'end_gps_n' => $end_gps_n,
                    'start_gps_e' => $start_gps_e,
                    'end_gps_e' => $end_gps_e,
                    'use_gps' => $use_gps
                );
                update('y_section', $data_section, array('id' => $id));
            }
        }
        if ($this->input->post('submit') != 'save') {
            redirect('rri/plan/index', 'refresh');
        } else {
            redirect('rri/plan/form', 'refresh');
        }
    }

    // plan =====================================
    public function grid() {

        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('idtemp', 'road_number', 'road_name', 'type', 'length', 'width');
        $sIndexColumn = "road_id";

        /* DB table to use */
        $sTable = "road_info";

        /*
         * Paging
         */
        $sLimit = "";
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " .
                    intval($_GET['iDisplayLength']);
        }

        /*
         * Ordering
         */
        $sOrder = "";
        if (isset($_GET['iSortCol_0'])) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
                    $sOrder .= "`" . $aColumns[intval($_GET['iSortCol_' . $i])] . "` " .
                            ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                }
            }
            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */

        $pr_code = $this->session->userdata('pr_code');
        $sWhere = "";
        if ($pr_code == "") {
            $sWhere .= "WHERE 1=1 ";
        } else {
            $sWhere .= "WHERE road_info.pro_id IN (" . $pr_code . ") ";
        }

        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $sWhere .= "AND (";
            for ($i = 0; $i < count($aColumns); $i++) {
                if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
                    $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch']) . "%' OR ";
                }
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhsere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch_' . $i]) . "%' ";
            }
        }

        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "
		SELECT SQL_CALC_FOUND_ROWS road_id, " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";

        $rResult = query($sQuery);

        /* Data set length after filtering */
        $sQuery = "
		SELECT FOUND_ROWS() as n
	";
        $rResultFilterTotal = query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->n;

        /* Total data set length */
        $sQuery = "
		SELECT COUNT(" . $sIndexColumn . ") as n
		FROM   $sTable
	";
        $rResultTotal = query($sQuery);
        $aResultTotal = $rResultTotal->row();
        $iTotal = $aResultTotal->n;

        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        if ($rResult->num_rows() > 0) {
            foreach ($rResult->result_array() as $aRow) {
                // $aColumns = array('user_name', 'full_name', 'e_mail', 'phone');
                $row = array();

                // Add the row ID and class to the object
                $row['DT_RowId'] = '' . $aRow['road_id'];
                $row['DT_RowClass'] = 'road_id' . $aRow['road_id'];

                for ($i = 0; $i < count($aColumns); $i++) {
                    if ($aColumns[$i] == "version") {
                        /* Special output formatting for 'version' column */
                        $row[] = ($aRow[$aColumns[$i]] == "0") ? '-' : $aRow[$aColumns[$i]];
                    } else if ($aColumns[$i] != ' ') {
                        /* General output */
                        $row[] = $aRow[$aColumns[$i]];
                    }
                }
                $row[] = '<a href="javascript:void(0)" class="editor_edit">កែព័ត៌មាន</a>';
                $output['aaData'][] = $row;
            }
        }
        header('Content-Type: application/json; charset=utf-8', true, 200);
        echo json_encode($output);
        exit();
    }

}
