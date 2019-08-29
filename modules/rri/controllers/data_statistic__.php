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

    // gr. statistic ========================
    public function grid() {

        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('pro_code', 'total_line', 'total_length');
        $sIndexColumn = "no";

        /* DB table to use */
        $sTable = "statistic_data";

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
            $sWhere .= "WHERE statistic_data.pro_code IN (" . $pr_code . ") ";
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
		SELECT SQL_CALC_FOUND_ROWS no, " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
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
                $row['DT_RowId'] = '' . $aRow['no'];
                $row['DT_RowClass'] = 'no' . $aRow['no'];

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

// end class ===========================
