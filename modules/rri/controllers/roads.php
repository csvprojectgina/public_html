<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roads extends Admin_Controller {

    public function encrypt() {
        $encryptedText = $this->input->post('encryptedText');
        echo '' . simple_encrypt($encryptedText);
        exit();
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/roads/index');
        $this->load->view('footer');
    }

    public function form() {
        $this->load->view('header');
        $this->load->view('rri/roads/form');
        $this->load->view('footer');
    }

    public function transaction() {
        $this->load->view('header');
        $this->load->view('rri/roads/transaction');
        $this->load->view('footer');
    } 
    
    // opt. art_char ==================
    public function opt_art_char() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
        $qr = query("SELECT DISTINCT
                                a.id,
                                a.tye_
                        FROM
                                art_char AS a
                        WHERE
                                a.tye_ LIKE '%{$q}%'
                        ORDER BY
                                a.id ASC ");
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }
    
    // autocom. activity =================
    public function autocom_act() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
        $qr = query("SELECT DISTINCTROW
                                a.activity
                        FROM
                                history_activity AS a
                        WHERE
                                a.activity LIKE '%{$q}%'
                        ORDER BY
                                a.activity ASC ");
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }
    
    // autocom. apply_by ==================
    public function autocom_apply_by() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
        $qr = query("SELECT DISTINCT
                                a.appy_by
                        FROM
                                history_practice AS a
                        WHERE
                                a.appy_by LIKE '%{$q}%'
                        ORDER BY
                                a.appy_by ASC ");
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }
    
    // autocom. source_budget ==================
    public function autocom_source_budget() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
        $qr = query("SELECT DISTINCTROW
                                m.source_budget
                        FROM
                                history_money AS m
                        WHERE
                                m.source_budget LIKE '%{$q}%'
                        ORDER BY
                                m.source_budget ASC ");
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }
    
    // autocom. dis. =========================
    public function autocom_dis() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
        $qr = query("SELECT DISTINCTROW
                                d.dis_khmer
                        FROM
                                district AS d
                        WHERE
                                d.dis_khmer LIKE '%{$q}%'
                        ORDER BY
                                d.dis_khmer ASC ");
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }

    // autocom. com. =========================
    public function autocom_com() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
        $tr = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('tr'))));
        $qr = query("SELECT
                                c.com_khmer,
                                c.com_code,
                                c.dis_code,
                                c.pro_code,
                                d.dis_khmer
                        FROM
                                district AS d
                        INNER JOIN commune AS c ON d.dis_code = c.dis_code
                        AND d.pro_code = c.pro_code
                        WHERE
                                c.com_khmer LIKE '%{$q}%'
                        AND d.dis_khmer LIKE '%{$tr}%' ");
        /* $qr = query("SELECT DISTINCTROW
          c.com_khmer
          FROM
          commune AS c
          WHERE
          c.com_khmer LIKE '%{$q}%'
          ORDER BY
          c.com_khmer "); */
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }

    // autocom. vi. ===========================
    public function autocom_v() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
        $qr = query("SELECT DISTINCTROW
                                    v.v_khmer
                            FROM
                                    village AS v
                            WHERE
                                    v.v_khmer LIKE '%{$q}%'
                            ORDER BY
                                    v.v_khmer ");
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }

    // autocom. pave. =========================
    public function autocom_pave() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
        $qr = query("SELECT DISTINCT
                                pv.type_pavement
                        FROM
                                pavement AS pv
                        WHERE
                                pv.type_pavement LIKE '%{$q}%'
                        ORDER BY
                                pv.type_pavement ASC ");
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }

    // autocom. type_building ==================
    public function autocom_type_building() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
        $qr = query("SELECT DISTINCTROW
                                p.type_building
                        FROM
                                public_building_s AS p
                        WHERE
                                1=1 AND p.type_building LIKE '%{$q}%'
                        ORDER BY
                                p.type_building ASC ");
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }

    // autocom. type_building_art ================
    public function autocom_type_building_art() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
        $qr = query("SELECT DISTINCTROW
                                a.type_building_art
                        FROM
                                art_building_s AS a
                        WHERE
                                a.type_building_art LIKE '%{$q}%'
                        ORDER BY
                                a.type_building_art ASC ");
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }

    // autocom. direction ========================
    public function autocom_direction() {
        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));
        $qr = query("SELECT DISTINCTROW
                                d.id,
                                d.direction
                        FROM
                                public_building_d AS d
                        WHERE
                                d.direction LIKE '%{$q}%'
                        ORDER BY
                                d.direction ASC ");
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }

    // file number auto increment ==================
    public function get_file_no() {
        $road_id = $this->input->post('road_id');
        $pro_id = $this->input->post('pro_id');
        $init_no = '';
        if ($road_id - 0 > 0) {
            $query_file_no = query("SELECT
                                                SUBSTR(rd.idtemp, 3, LENGTH(rd.idtemp)) AS f_no_incre
                                        FROM
                                                road_info AS rd
                                        WHERE
                                                rd.road_id = '{$road_id}' ");
            $row = $query_file_no->row();
            if ($query_file_no->num_rows > 0) {
                $init_no .= sprintf("%003s", $row->f_no_incre);
                echo $init_no;
            }
        } else {
            $query_file_no = query("SELECT
                                                SUBSTR(rd.idtemp, 3, LENGTH(rd.idtemp)) + 1 AS f_no_incre
                                        FROM
                                                road_info AS rd
                                        WHERE
                                                rd.pro_id = '{$pro_id}'
                                        ORDER BY
                                                rd.idtemp - 0 DESC
                                        LIMIT 0,
                                         1 ");
            $row = $query_file_no->row();
            if ($query_file_no->num_rows > 0) {
                $init_no .= sprintf("%003s", $row->f_no_incre);
                echo $init_no;
            } else {
                $init_no .= '001';
                echo $init_no;
            }
        }
    }

    // province =================================
    public function show_file_nums() {
        // max idtemp =====================
        $query_max_id = query("SELECT(MAX((substr(`road_info`.`idtemp`,3,length(`road_info`.`idtemp`)) - 0)) + 1) AS `file_no` FROM `road_info` WHERE (LEFT(`road_info`.`idtemp`,2) = '{$this->input->post('pro_id')}')")->row();

        // link pro_id with file_no ========
        $file_num = '';
        if ($query_max_id->file_no != '') {
            $file_num .= sprintf("%003s", $query_max_id->file_no);
        } else {
            $file_num .= "001";
        }
        return $file_num;
    }

    // alert & show province ===================
    public function show_pro() {
        $pro_id = $this->input->post('pro_id');
        $qr_pro = query("SELECT
                                    d.pro_code,
                                    d.dis_code,
                                    d.dis_khmer,
                                    d.dis_name
                            FROM
                                    district AS d
                            WHERE
                                    d.pro_code = '{$pro_id}'
                            ORDER BY
                                    d.dis_khmer ASC ");
        $re = $qr_pro->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }

    public function edit($eid = '') {
        $id = (urldecode($eid));
        $query = query("SELECT * FROM road_info AS r WHERE r.road_id = '{$id}' ");

        // row finfo. =================
        $row = $query->row();
        $data['row'] = $row;

        // main_id ====================
        $data['main_id'] = $id;
        $this->load->view('header');
        $this->load->view('rri/roads/form', $data);
        $this->load->view('footer');
    }

    public function delete($eid = '') {
        $id = (urldecode($eid)) - 0;
        if ($id > 0) {
            // activity log ===================
            $query = query("SELECT
                                        *
                                FROM
                                        road_info AS rd
                                WHERE
                                        rd.road_id = '{$id}' ")->row();

            query("INSERT INTO activity_log(user_name,full_name,idtemp,action) VALUES ('" . $this->session->userdata('user_name') . "', '" . $this->session->userdata('full_name') . "', '" . $query->idtemp . "', 'Deleted') ");

            query("DELETE FROM road_info WHERE road_info.road_id = '{$id}' ");
            query("DELETE FROM geography WHERE geography.road_id = '{$id}' ");
            query("DELETE FROM art_building WHERE art_building.road_id = '{$id}' ");
            query("DELETE FROM public_building WHERE public_building.road_id = '{$id}' ");
            query("DELETE FROM history WHERE history.road_id = '{$id}' ");
            query("DELETE FROM pavement WHERE pavement.road_id = '{$id}' ");
            query("DELETE FROM trackpoint WHERE trackpoint.road_id = '{$id}' ");
        }
        redirect('rri/roads/index');
    }

    // road_info =====================================
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
                $row[] = '<a href="javascript:void(0)" class="editor_edit">ខ្សែផ្លូវ</a> | <a href="javascript:void(0)" class="editor_remove">លុប</a>';
                $output['aaData'][] = $row;
            }
        }
        header('Content-Type: application/json; charset=utf-8', true, 200);
        echo json_encode($output);
        exit();
    }

    public function del_history() {
        $his_id = $this->input->post('his_id');
        query("DELETE FROM history WHERE history.his_id = '{$his_id}' ");
    }

    public function del_geography() {
        $geo_id = $this->input->post('geo_id');
        query("DELETE FROM geography WHERE geography.geo_id = '{$geo_id}' ");
    }

    public function del_art_building() {
        $art_id = $this->input->post('art_id');
        query("DELETE FROM art_building WHERE art_building.art_id = '{$art_id}' ");
    }

    public function del_pub_building() {
        $pub_id = $this->input->post('pub_id');
        query("DELETE FROM public_building WHERE public_building.pub_id = '{$pub_id}' ");
    }

    public function del_pavement() {
        $pave_id = $this->input->post('pave_id');
        query("DELETE FROM pavement WHERE pavement.pave_id = '{$pave_id}' ");
    }

    public function insert() {
        // idtemp auto ====================        
        $pro_id = $this->input->post('pro_id');
        $dis_id = $this->input->post('dis_id');
        $idtemp = '';
        $idtemp .= $this->input->post('pro_id') . $this->input->post('file_no');

        $main_id = 0;
        $id = $this->input->post('road_id');
        $this->form_validation->set_rules('road_number', '"លេខផ្លូវ"', 'trim|required|min_length[2]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $data['failedlogin'] = t('ឈ្មោះអ្នកប្រើប្រាស់ ឬ លេខសំងាត់មិនត្រឹមត្រូវ​ !');
            $this->load->view('header');
            $this->load->view('roads/form');
            $this->load->view('footer');
        } else {
            if ($id - 0 == 0) {
                // road_info ======================
                $data = array(
                    'idtemp' => $idtemp,
                    'road_number' => $this->input->post('road_number'),
                    'road_name' => $this->input->post('road_name'),
                    'type' => $this->input->post('type'),
                    'length' => $this->input->post('length'),
                    'width' => $this->input->post('width'),
                    'first_point_x' => $this->input->post('first_point_x'),
                    'first_point_y' => $this->input->post('first_point_y'),
                    'last_point_x' => $this->input->post('last_point_x'),
                    'last_point_y' => $this->input->post('last_point_y'),
                    'file_name' => $this->input->post('file_name'),
                    'note' => $this->input->post('note', TRUE),
                    'pro_id' => $pro_id,
                    'dis_id' => $dis_id,
                    'file_no' => $this->input->post('file_no'),
                    'dmid' => get_dmid()
                );
                $data['dmid'] = $this->session->userdata('dmid');
                insert('road_info', $data);
                $main_id = insert_id();

                // geography ===============================
                $district = $this->input->post('district');
                $commune = $this->input->post('commune');
                $village = $this->input->post('village');
                $file_no = $this->input->post('file_no');
                for ($i = 0; $i < count($district); $i++) {
                    // echo $district[$i] . '<br>';
                    if ($district[$i] != '' || $commune[$i] != '' || $village[$i] != '') {
                        $data_geography = array(
                            'road_id' => $main_id,
                            'idtemp1' => $idtemp,
                            'district' => $district[$i],
                            'commune' => $commune[$i],
                            'village' => $village[$i],
                            'pro_id' => $pro_id,
                            'dis_id' => $dis_id,
                            'file_no' => $file_no,
                            'line_id' => $i + 1,
                            'dmid' => get_dmid()
                        );
                        $data_geography['dmid'] = $this->session->userdata('dmid');
                        insert('geography', $data_geography);
                    }
                }

                // art_building ===========================
                $type_building_art = $this->input->post('type_building_art');
                $dimension_building_art = $this->input->post('dimension_building_art');
                $l_art = $this->input->post('l_art');
                $w_art = $this->input->post('w_art');
                $h_art = $this->input->post('h_art');
                $quality_building_art = $this->input->post('quality_building_art');
                $position_x_building_art = $this->input->post('position_x_building_art');
                $position_y_building_art = $this->input->post('position_y_building_art');
                $art_char = $this->input->post('art_char');                

                for ($i = 0; $i < count($type_building_art); $i++) {
                    if ($type_building_art[$i] != '' || $dimension_building_art[$i] != '' || $quality_building_art[$i] != '' || $position_x_building_art[$i] != '' || $position_y_building_art[$i] != '') {
                        $data_art_building = array(
                            'road_id' => $main_id,
                            'idtemp2' => $idtemp,
                            'type_building_art' => $type_building_art[$i],
                            'art_char' => $art_char[$i],
                            'dimension_building_art' => $dimension_building_art[$i],
                            'l_art' => $l_art[$i],
                            'w_art' => $w_art[$i],
                            'h_art' => $h_art[$i],
                            'quality_building_art' => $quality_building_art[$i],
                            'position_x_building_art' => $position_x_building_art[$i],
                            'position_y_building_art' => $position_y_building_art[$i],
                            'pro_id' => $pro_id,
                            'dis_id' => $dis_id,
                            'file_no' => $file_no,
                            'line_id' => $i + 1,
                            'dmid' => get_dmid()
                        );
                        $data_art_building['dmid'] = $this->session->userdata('dmid');
                        insert('art_building', $data_art_building);
                    }
                }

                // public_building =====================================
                $type_building = $this->input->post('type_building');
                $name_building = $this->input->post('name_building');
                $position_x = $this->input->post('position_x');
                $position_y = $this->input->post('position_y');
                $direction = $this->input->post('direction');
                for ($i = 0; $i < count($type_building); $i++) {
                    if ($type_building[$i] != '' || $name_building[$i] != '' || $position_x[$i] != '' || $direction[$i] != '') {
                        $data_pub_building = array(
                            'road_id' => $main_id,
                            'idtemp3' => $idtemp,
                            'type_building' => $type_building[$i],
                            'name_building' => $name_building[$i],
                            'position_x' => $position_x[$i],
                            'position_y' => $position_y[$i],
                            'direction' => $direction[$i],
                            'pro_id' => $pro_id,
                            'dis_id' => $dis_id,
                            'file_no' => $file_no,
                            'line_id' => $i + 1,
                            'dmid' => get_dmid()
                        );
                        $data_pub_building['dmid'] = $this->session->userdata('dmid');
                        insert('public_building', $data_pub_building);
                    }
                }

                // history ================================  
                $activity = $this->input->post('activity');
                $year_construct = $this->input->post('year_construct');
                $apply_by = $this->input->post('apply_by');
                $source_budget = $this->input->post('source_budget');
                for ($i = 0; $i < count($activity); $i++) {
                    if ($activity[$i] != '' || $year_construct[$i] != '' || $apply_by[$i] != '' || $source_budget[$i] != '') {
                        $data_history = array(
                            'road_id' => $main_id,
                            'idtemp4' => $idtemp,
                            'activity' => $activity[$i],
                            'year_construct' => $year_construct[$i],
                            'apply_by' => $apply_by[$i],
                            'source_budget' => $source_budget[$i],
                            'pro_id' => $pro_id,
                            'dis_id' => $dis_id,
                            'file_no' => $file_no,
                            'line_id' => $i + 1,
                            'dmid' => get_dmid()
                        );
                        $data_history['dmid'] = $this->session->userdata('dmid');
                        insert('history', $data_history);
                    }
                }

                // pavement =============================
                $type_pavement = $this->input->post('type_pavement');
                $first_point_x_pavement = $this->input->post('first_point_x_pavement');
                $first_point_y_pavement = $this->input->post('first_point_y_pavement');
                $last_point_x_pavement = $this->input->post('last_point_x_pavement');
                $last_point_y_pavement = $this->input->post('last_point_y_pavement');
                $length_pavement = $this->input->post('length_pavement');
                for ($i = 0; $i < count($type_pavement); $i++) {
                    if ($type_pavement[$i] != '' || $first_point_x_pavement[$i] != '' || $first_point_y_pavement[$i] != '' || $last_point_x_pavement[$i] != '' || $last_point_y_pavement[$i] != '' || $length_pavement[$i] != '') {
                        $data_pavement = array(
                            'road_id' => $main_id,
                            'idtemp5' => $idtemp,
                            'type_pavement' => $type_pavement[$i],
                            'first_point_x_pavement' => $first_point_x_pavement[$i],
                            'first_point_y_pavement' => $first_point_y_pavement[$i],
                            'last_point_x_pavement' => $last_point_x_pavement[$i],
                            'last_point_y_pavement' => $last_point_y_pavement[$i],
                            'length_pavement' => $length_pavement[$i],
                            'pro_id' => $pro_id,
                            'dis_id' => $dis_id,
                            'file_no' => $file_no,
                            'line_id' => $i + 1,
                            'dmid' => get_dmid()
                        );
                        $data_pavement['dmid'] = $this->session->userdata('dmid');
                        insert('pavement', $data_pavement);
                    }
                }

                // activity log  ===================
                $query = query("SELECT
                                        *
                                FROM
                                        road_info AS rd
                                WHERE
                                        rd.road_id = '{$main_id}' ")->row();
                
                query("INSERT INTO activity_log(user_name,full_name,idtemp,action) VALUES ('" . $this->session->userdata('user_name') . "', '" . $this->session->userdata('full_name') . "', '" . $query->idtemp . "', 'Inserted') ");
            } else {
                // $idtemp for edit ========================
                $file_no = $this->input->post('file_no');
                $idtem_edit = $pro_id . $file_no;

                // road_info ==============================
                $data = array(
                    'idtemp' => $idtem_edit,
                    'road_number' => $this->input->post('road_number'),
                    'road_name' => $this->input->post('road_name'),
                    'type' => $this->input->post('type'),
                    'length' => $this->input->post('length'),
                    'width' => $this->input->post('width'),
                    'first_point_x' => $this->input->post('first_point_x'),
                    'first_point_y' => $this->input->post('first_point_y'),
                    'last_point_x' => $this->input->post('last_point_x'),
                    'last_point_y' => $this->input->post('last_point_y'),
                    'file_name' => $this->input->post('file_name'),
                    'note' => $this->input->post('note'),
                    'pro_id' => $pro_id,
                    'dis_id' => $dis_id,
                    'file_no' => $this->input->post('file_no')
                );
                update('road_info', $data, array('road_id' => $id));

                // geography ===========================
                $geo_id = $this->input->post('geo_id');
                $district = $this->input->post('district');
                $commune = $this->input->post('commune');
                $village = $this->input->post('village');
                for ($i = 0; $i < count($district); $i++) {
                    if ($district[$i] != '' || $commune[$i] != '' || $village[$i] != '') {
                        if ($geo_id[$i] - 0 > 0) {
                            $data_geography = array(
                                'idtemp1' => $idtem_edit,
                                'district' => $district[$i],
                                'commune' => $commune[$i],
                                'village' => $village[$i],
                                'pro_id' => $pro_id,
                                'dis_id' => $dis_id,
                                'file_no' => $file_no,
                                'line_id' => $i + 1
                            );
                            update('geography', $data_geography, array('geo_id' => $geo_id[$i]));
                        } else {
                            $data_geography = array(
                                'road_id' => $id,
                                'idtemp1' => $idtem_edit,
                                'district' => $district[$i],
                                'commune' => $commune[$i],
                                'village' => $village[$i],
                                'pro_id' => $pro_id,
                                'dis_id' => $dis_id,
                                'file_no' => $file_no,
                                'line_id' => $i + 1,
                                'dmid' => get_dmid()
                            );
                            $data_geography['dmid'] = $this->session->userdata('dmid');
                            insert('geography', $data_geography);
                        }
                    }
                }

                // art_building ===========================
                $art_id = $this->input->post('art_id');
                $type_building_art = $this->input->post('type_building_art');
                $dimension_building_art = $this->input->post('dimension_building_art');
                $l_art = $this->input->post('l_art');
                $w_art = $this->input->post('w_art');
                $h_art = $this->input->post('h_art');
                $quality_building_art = $this->input->post('quality_building_art');
                $position_x_building_art = $this->input->post('position_x_building_art');
                $position_y_building_art = $this->input->post('position_y_building_art');
                $art_char = $this->input->post('art_char');
                
                for ($i = 0; $i < count($type_building_art); $i++) {
                    if ($type_building_art[$i] != '' || $dimension_building_art[$i] != '' || $quality_building_art[$i] != '' || $position_x_building_art[$i] != '' || $position_y_building_art[$i] != '') {
                        if ($art_id[$i] - 0 > 0) {
                            $data_art_building = array(
                                'idtemp2' => $idtem_edit,
                                'type_building_art' => $type_building_art[$i],
                                'art_char' => $art_char[$i],
                                'dimension_building_art' => $dimension_building_art[$i],
                                'l_art' => $l_art[$i],
                                'w_art' => $w_art[$i],
                                'h_art' => $h_art[$i],
                                'quality_building_art' => $quality_building_art[$i],
                                'position_x_building_art' => $position_x_building_art[$i],
                                'position_y_building_art' => $position_y_building_art[$i],
                                'pro_id' => $pro_id,
                                'dis_id' => $dis_id,
                                'file_no' => $file_no,
                                'line_id' => $i + 1,
                                'dmid' => get_dmid()
                            );
                            update('art_building', $data_art_building, array('art_id' => $art_id[$i]));
                        } else {
                            $data_art_building = array(
                                'road_id' => $id,
                                'idtemp2' => $idtem_edit,
                                'type_building_art' => $type_building_art[$i],
                                'art_char' => $art_char[$i],
                                'dimension_building_art' => $dimension_building_art[$i],
                                'l_art' => $l_art[$i],
                                'w_art' => $w_art[$i],
                                'h_art' => $h_art[$i],
                                'quality_building_art' => $quality_building_art[$i],
                                'position_x_building_art' => $position_x_building_art[$i],
                                'position_y_building_art' => $position_y_building_art[$i],
                                'pro_id' => $pro_id,
                                'dis_id' => $dis_id,
                                'file_no' => $file_no,
                                'line_id' => $i + 1,
                                'dmid' => get_dmid()
                            );
                            $data_art_building['dmid'] = $this->session->userdata('dmid');
                            insert('art_building', $data_art_building);
                        }
                    }
                }

                // pub_building ========================
                $pub_id = $this->input->post('pub_id');
                $type_building = $this->input->post('type_building');
                $name_building = $this->input->post('name_building');
                $position_x = $this->input->post('position_x');
                $position_y = $this->input->post('position_y');
                $direction = $this->input->post('direction');
                for ($i = 0; $i < count($type_building); $i++) {
                    if ($type_building[$i] != '' || $name_building[$i] != '' || $position_x[$i] != '' || $position_y[$i] != '' || $direction[$i] != '') {
                        if ($pub_id[$i] - 0 > 0) {
                            $data_pub_building = array(
                                'idtemp3' => $idtem_edit,
                                'type_building' => $type_building[$i],
                                'name_building' => $name_building[$i],
                                'position_x' => $position_x[$i],
                                'position_y' => $position_y[$i],
                                'direction' => $direction[$i],
                                'pro_id' => $pro_id,
                                'dis_id' => $dis_id,
                                'file_no' => $file_no,
                                'line_id' => $i + 1,
                                'dmid' => get_dmid()
                            );
                            update('public_building', $data_pub_building, array('pub_id' => $pub_id[$i]));
                        } else {
                            $data_pub_building = array(
                                'road_id' => $id,
                                'idtemp3' => $idtem_edit,
                                'type_building' => $type_building[$i],
                                'name_building' => $name_building[$i],
                                'position_x' => $position_x[$i],
                                'position_y' => $position_y[$i],
                                'direction' => $direction[$i],
                                'pro_id' => $pro_id,
                                'dis_id' => $dis_id,
                                'file_no' => $file_no,
                                'line_id' => $i + 1,
                                'dmid' => get_dmid()
                            );
                            $data_art_building['dmid'] = $this->session->userdata('dmid');
                            insert('public_building', $data_pub_building);
                        }
                    }
                }

                // history ===========================
                $his_id = $this->input->post('his_id');
                $activity = $this->input->post('activity');
                $year_construct = $this->input->post('year_construct');
                $apply_by = $this->input->post('apply_by');
                $source_budget = $this->input->post('source_budget');
                for ($i = 0; $i < count($activity); $i++) {
                    if ($activity[$i] != '' || $year_construct[$i] != '' || $apply_by[$i] != '' || $source_budget[$i] != '') {
                        if ($his_id[$i] - 0 > 0) {
                            $data_history = array(
                                'idtemp4' => $idtem_edit,
                                'activity' => $activity[$i],
                                'year_construct' => $year_construct[$i],
                                'apply_by' => $apply_by[$i],
                                'source_budget' => $source_budget[$i],
                                'pro_id' => $pro_id,
                                'dis_id' => $dis_id,
                                'file_no' => $file_no,
                                'line_id' => $i + 1
                            );
                            update('history', $data_history, array('his_id' => $his_id[$i]));
                        } else {
                            $data_history = array(
                                'road_id' => $id,
                                'idtemp4' => $idtem_edit,
                                'activity' => $activity[$i],
                                'year_construct' => $year_construct[$i],
                                'apply_by' => $apply_by[$i],
                                'source_budget' => $source_budget[$i],
                                'pro_id' => $pro_id,
                                'dis_id' => $dis_id,
                                'file_no' => $file_no,
                                'line_id' => $i + 1,
                                'dmid' => get_dmid()
                            );
                            $data_history['dmid'] = $this->session->userdata('dmid');
                            insert('history', $data_history);
                        }
                    }
                }

                // pavement ============================
                $pave_id = $this->input->post('pave_id');
                $type_pavement = $this->input->post('type_pavement');
                $first_point_x_pavement = $this->input->post('first_point_x_pavement');
                $first_point_y_pavement = $this->input->post('first_point_y_pavement');
                $last_point_x_pavement = $this->input->post('last_point_x_pavement');
                $last_point_y_pavement = $this->input->post('last_point_y_pavement');
                $length_pavement = $this->input->post('length_pavement');
                for ($i = 0; $i < count($type_pavement); $i++) {
                    if ($type_pavement[$i] != '' || $first_point_x_pavement[$i] != '' || $first_point_y_pavement[$i] != '' || $last_point_x_pavement[$i] != '' || $last_point_y_pavement[$i] != '' || $length_pavement[$i] != '') {
                        if ($pave_id[$i] - 0 > 0) {
                            $data_pavement = array(
                                'idtemp5' => $idtem_edit,
                                'type_pavement' => $type_pavement[$i],
                                'first_point_x_pavement' => $first_point_x_pavement[$i],
                                'first_point_y_pavement' => $first_point_y_pavement[$i],
                                'last_point_x_pavement' => $last_point_x_pavement[$i],
                                'last_point_y_pavement' => $last_point_y_pavement[$i],
                                'length_pavement' => $length_pavement[$i],
                                'pro_id' => $pro_id,
                                'dis_id' => $dis_id,
                                'file_no' => $file_no,
                                'line_id' => $i + 1
                            );
                            update('pavement', $data_pavement, array('pave_id' => $pave_id[$i]));
                        } else {
                            $data_pavement = array(
                                'road_id' => $id,
                                'idtemp5' => $idtem_edit,
                                'type_pavement' => $type_pavement[$i],
                                'first_point_x_pavement' => $first_point_x_pavement[$i],
                                'first_point_y_pavement' => $first_point_y_pavement[$i],
                                'last_point_x_pavement' => $last_point_x_pavement[$i],
                                'last_point_y_pavement' => $last_point_y_pavement[$i],
                                'length_pavement' => $length_pavement[$i],
                                'pro_id' => $pro_id,
                                'dis_id' => $dis_id,
                                'file_no' => $file_no,
                                'line_id' => $i + 1,
                                'dmid' => get_dmid()
                            );
                            $data_pavement['dmid'] = $this->session->userdata('dmid');
                            insert('pavement', $data_pavement);
                        }
                    }
                }

                // activity log  ===================
                query("INSERT INTO activity_log(user_name,full_name,idtemp,action) VALUES ('" . $this->session->userdata('user_name') . "', '" . $this->session->userdata('full_name') . "', '" . $idtem_edit . "', 'Updated') ");
            }
            
            if ($this->input->post('submit') != 'save') {
                redirect('rri/roads/index', 'refresh');
            } else {
                redirect('rri/roads/form', 'refresh');
            }
        }
    }

}
