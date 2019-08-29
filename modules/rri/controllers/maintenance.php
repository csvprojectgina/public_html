<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Maintenance extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/maintenance/index');
        $this->load->view('footer');
    }

    public function form() {
        $this->load->view('header');
        $this->load->view('rri/maintenance/form');
        $this->load->view('footer');
    }

    public function report_result() {
        $this->load->view('header');
        $this->load->view('rri/maintenance/report_result');
        $this->load->view('footer');
    }

    public function maintenance_by_pro() {
        $this->load->view('header');
        $this->load->view('rri/maintenance/maintenance_by_pro');
        $this->load->view('footer');
    }

    public function get_opt() {
        $qr = query("SELECT
                                p.`no`,
                                p.id,
                                p.province_name,
                                p.khmer_name
                        FROM
                                province AS p
                        ORDER BY
                                p.province_name ");
        $data = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }
    
    public function get_data() {
        $qr_pro = query("SELECT
                                    p.id,
                                    p.province_name,
                                    p.khmer_name,
                                    m.id AS id_,
                                    m.routine_gravel,
                                    m.periodic_gravel,
                                    m.routine_dbst,
                                    m.periodic_dbst
                            FROM
                                    province AS p
                            LEFT JOIN y_maintenance_by_pro AS m ON p.id = m.pro_code
                            ORDER BY
                                    p.province_name ASC ");
        $data = $qr_pro->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function save_data() {
        $data_arr = $this->input->post('datas');
        $qr_ = query("SELECT
                                COUNT(m.pro_code) AS c
                        FROM
                                y_maintenance_by_pro AS m ");

        if ($qr_->row()->c - 0 == 0) {
            foreach ($data_arr as $row) {
                $data = array(
                    'pro_code' => $row['pro_code'],
                    'routine_gravel' => $row['routine_gravel'],
                    'periodic_gravel' => $row['periodic_gravel'],
                    'routine_dbst' => $row['routine_dbst'],
                    'periodic_dbst' => $row['periodic_dbst']
                );
                insert('y_maintenance_by_pro', $data);
            }
        } else {
            foreach ($data_arr as $row) {
                $data = array(
                    'pro_code' => $row['pro_code'],
                    'routine_gravel' => $row['routine_gravel'],
                    'periodic_gravel' => $row['periodic_gravel'],
                    'routine_dbst' => $row['routine_dbst'],
                    'periodic_dbst' => $row['periodic_dbst']
                );
                if ($row['id'] - 0 > 0) {
                    update('y_maintenance_by_pro', $data, array('id' => $row['id']));
                } else {
                    insert('y_maintenance_by_pro', $data);
                }
            }
        }
        echo 'រក្សាទុករួចរាល់ !';        
    }

    public function prt_gravel() {
        $this->load->view('rri/maintenance/report_result');
    }

    public function edit($eid = '') {
        $id = simple_decrypt(urldecode($eid));
        $query = query("SELECT * FROM road_info AS r WHERE r.road_id = '{$id}' ");
        $query_ = query("SELECT * FROM y_section AS r WHERE r.road_id = '{$id}' ");
        $row = $query->row();
        $row_ = $query_->row();
        $data['row'] = $row;
        $data['row_'] = $row_;
        $data['id'] = $id;

        $this->load->view('header');
        $this->load->view('rri/maintenance/form', $data);
        $this->load->view('footer');
    }

    /* public function insert() {
      $road_id = $this->input->post('road_id') - 0;
      $id = $this->input->post('id') - 0;
      // section ================================
      $start = $this->input->post('start');
      $end = $this->input->post('end');
      $from = $this->input->post('from') - 0;
      $to = $this->input->post('to') - 0;
      $road_class = $this->input->post('road_class');
      $surface_type = $this->input->post('surface_type');
      $district = $this->input->post('district');
      $year_last_surface = $this->input->post('year_last_surface');

      if ($road_id == 0) {
      exit();
      } else {
      if ($id == 0) {
      $data_section = array(
      'road_id' => $road_id,
      'start' => $start,
      'end' => $end,
      'from' => $from,
      'to' => $to,
      'road_class' => $road_class,
      'surface_type' => $surface_type,
      'district' => $district,
      'year_last_surface' => $year_last_surface
      );
      insert('y_section', $data_section);
      } else {
      $data_section = array(
      'road_id' => $road_id,
      'start' => $start,
      'end' => $end,
      'from' => $from,
      'to' => $to,
      'road_class' => $road_class,
      'surface_type' => $surface_type,
      'district' => $district,
      'year_last_surface' => $year_last_surface
      );
      update('y_section', $data_section, array('id' => $id));
      }
      }
      if ($this->input->post('submit') != 'save') {
      redirect('rri/plan/index', 'refresh');
      } else {
      redirect('rri/plan/form', 'refresh');
      }
      } */

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
