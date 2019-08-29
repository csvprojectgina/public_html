<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles extends Admin_Controller {

    public function index() {
        if ($this->session->userdata("members") == "members") {
            echo '';
            exit();
        }
        $this->load->view('header');
        $this->load->view('roles/index');
        $this->load->view('footer');
    }

    public function form() {
        if ($this->session->userdata("members") == "members") {
            echo '';
            exit();
        }
        $this->load->view('header');
        $this->load->view('roles/form');
        $this->load->view('footer');
    }

    public function edit($eid = '') {
        if ($this->session->userdata("members") == "members") {
            echo '';
            exit();
        }
        $id = simple_decrypt(urldecode($eid));
        $query = query("SELECT * FROM z_roles WHERE id = '{$id}' ");
        $row = $query->row();

        $data['row'] = $row;
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('roles/form', $data);
        $this->load->view('footer');
    }

    public function delete($eid = '') {
        if ($this->session->userdata("members") == "members") {
            echo '';
            exit();
        }
        $id = simple_decrypt(urldecode($eid)) - 0;
        if ($id > 0) {
            query("DELETE FROM z_roles WHERE id = '{$id}' ");
        }
        redirect('admin/roles');
    }

    public function grid() {
        if ($this->session->userdata("members") == "members") {
            echo '';
            exit();
        }
        $rnd = rand(1, 100);
        /* DB table to use */
        $sTable = "z_roles" . $rnd;

        query("CREATE TEMPORARY TABLE IF NOT EXISTS {$sTable} AS 
                (SELECT
                    r.id,
                    r.role_name,
                    p.role_name AS parent
                    FROM
                    z_roles AS r
                    LEFT  JOIN z_roles AS p ON r.sub_of_role_id = p.id) ");



        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('role_name', 'parent');

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "id";

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
                if ($sWhere == "") {
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
                // $aColumns = array('role_name', 'sub_of_role_id', 'e_mail', 'phone');
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

                $row[] = '<a href="javascript:void(0)" class="editor_edit">កែ</a> ឬ <a href="javascript:void(0)" class="editor_remove">លុប</a>';
                $output['aaData'][] = $row;
            }
        }

        query("DROP TEMPORARY TABLE IF EXISTS {$sTable};");
        header('Content-Type: application/json; charset=utf-8', true, 200);
        echo json_encode($output);

        exit();
    }

    public function insert() {
        if ($this->session->userdata("members") == "members") {
            echo '';
            exit();
        }
        $id = $this->input->post('id') - 0;

        $this->form_validation->set_rules('role_name', 'Role Name', 'trim|required|min_length[5]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('roles/form');
            $this->load->view('footer');
        } else {

            $data = array(
                'role_name' => $this->input->post('role_name', TRUE),
                'sub_of_role_id' => $this->input->post('sub_of_role_id')
            );
            if ($id == 0) {
                insert('z_roles', $data);
            } else {
                update('z_roles', $data, array('id' => $id));
            }

            if ($this->input->post('submit') != 'save') {
                redirect('admin/roles', 'refresh');
            } else {
                redirect('admin/roles/form', 'refresh');
            }
        }
    }

}
