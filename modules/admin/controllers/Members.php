<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Members extends Admin_Controller {

    public function encrypt() {
        $encryptedText = $this->input->post('encryptedText');
        echo '' . simple_encrypt($encryptedText);
        exit();
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('members/index');
        $this->load->view('footer');
    }

    public function form() {
        $this->load->view('header');
        $this->load->view('members/form');
        $this->load->view('footer');
    }

    public function edit($eid = '') {
        $id = simple_decrypt(urldecode($eid));
        $query = query("SELECT * FROM members WHERE dmid in (" . dmid_in() . ") AND id = '{$id}' ");
        $row = $query->row();

        $data['row'] = $row;
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('members/form', $data);
        $this->load->view('footer');
    }

    public function delete($eid = '') {
        if ($this->session->userdata("members") == "members") {
            echo '';
            exit();
        }
        $id = simple_decrypt(urldecode($eid)) - 0;
        if ($id > 0) {
            query("DELETE FROM members WHERE dmid in (" . dmid_in() . ") AND id = '{$id}' ");
        }
        redirect('admin/members');
    }

    public function grid() {

        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('user_name', 'full_name', 'e_mail', 'phone');
        $sIndexColumn = "id";

        /* DB table to use */
        $sTable = "members";

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

                $row[] = '<a href="javascript:void(0)" class="editor_edit" style="text-align: center;">កែ</a> ឬ <a href="javascript:void(0)" class="editor_remove">លុប</a>';
                $output['aaData'][] = $row;
            }
        }
        header('Content-Type: application/json; charset=utf-8', true, 200);
        echo json_encode($output);
        exit();
    }

    public function insert() {
        $id = $this->input->post('id') - 0;

        $this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|min_length[3]|max_length[50]');
        if ($id == 0 || $this->input->post('password') . '' != '') {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
        }

        $this->form_validation->set_rules('e_mail', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('members/form');
            $this->load->view('footer');
        } else {
            $data = array(
                'user_name' => $this->input->post('user_name'),
                'password' => $this->input->post('password'),
                'full_name' => $this->input->post('full_name'),
                'address' => $this->input->post('address'),
                'e_mail' => $this->input->post('e_mail'),
                'phone' => $this->input->post('phone'),
                'fax' => $this->input->post('fax'),
                'dmid' => $this->input->post('dmid')
            );
            if ($id == 0) {
                if ($this->session->userdata("members") == "members") {
                    echo '';
                    exit();
                } else {
                    insert('members', $data);
                }
            } else {
                unset($data['user_name']);
                if ($this->input->post('password') . '' == '') {
                    unset($data['password']);
                }
                update('members', $data, array('id' => $id));
            }

            if ($this->input->post('submit') != 'save') {
                redirect('admin/members', 'refresh');
            } else {
                redirect('admin/members/form', 'refresh');
            }
        }
    }

}
