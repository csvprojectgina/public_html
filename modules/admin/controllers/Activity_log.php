<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Activity_log extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('activity_log/index');
        $this->load->view('footer');
    }

    public function delete($eid = '') {
        $id = simple_decrypt(urldecode($eid)) - 0;
        if ($id > 0) {
           query("DELETE FROM activity_log WHERE id = '{$id}' "); 
        }
        redirect('admin/activity_log/index');
    }
    
    public function grid() {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('user_name', 'full_name','idtemp','action','create_date');
        $sIndexColumn = "id";

        /* DB table to use */
        $sTable = "activity_log";

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
        $sWhere = "";
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $sWhere = "WHERE (";
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
		SELECT SQL_CALC_FOUND_ROWS id, " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
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
                $row['DT_RowId'] = '' . $aRow['id'];
                $row['DT_RowClass'] = 'id' . $aRow['id'];

                for ($i = 0; $i < count($aColumns); $i++) {
                    if ($aColumns[$i] == "version") {
                        /* Special output formatting for 'version' column */
                        $row[] = ($aRow[$aColumns[$i]] == "0") ? '-' : $aRow[$aColumns[$i]];
                    } else if ($aColumns[$i] != ' ') {
                        /* General output */
                        $row[] = $aRow[$aColumns[$i]];
                    }
                }

                $row[] = '<a href="javascript:void(0)" class="editor_remove">លុបព័ត៌មាន</a>';
                $output['aaData'][] = $row;
            }
        }
        
        header('Content-Type: application/json; charset=utf-8', true, 200);
        echo json_encode($output);
        exit();
    }
    // opt_user_name ======================
    public function opt_user_name() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
         $qr = query("SELECT DISTINCTROW
                                        a.user_name
                                FROM
                                        activity_log AS a
                                WHERE
                                a.user_name LIKE '%{$q}%'
                                ORDER BY
                                        a.user_name ASC ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }

}
