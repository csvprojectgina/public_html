<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Import_track extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/import_track/index');
        $this->load->view('footer');
    }

    public function form() {
        $this->load->view('header');
        $this->load->view('rri/import_track/form');
        $this->load->view('footer');
    }

    public function upload_file() {
        $this->load->view('header');
        $this->load->view('rri/import_track/upload_file');
        $this->load->view('footer');
    }

    public function read_file() {
        echo '<meta charset="UTF-8">';
        // ==========================
        include_once(APPPATH . "libraries/Excel/reader.php");
        $data = new Spreadsheet_Excel_Reader();
        $data->setUTFEncoder('iconv');
        $data->setOutputEncoding('UTF-8');

        // =========================
        $r_id = $this->input->post('r_id');
        $pro_id = $this->input->post('pro_id');
        $q_pro = query("SELECT province_name FROM province WHERE province.id='{$pro_id}' ")->row();
        $q_f_no = query("SELECT
                                    rd.file_no
                            FROM
                                    road_info AS rd
                            WHERE
                                    rd.road_id = '{$r_id}' ")->row();

        // ========================
        define("UPLOAD_PAYH", "assets/rri/excels/");
        $path = '';
        $path .= UPLOAD_PAYH . $q_pro->province_name . '/';
        if (isset($_FILES['excel_file']['name'])) {
            /* $filename = $_FILES['excel_file']['name'];
              $type = $_FILES['excel_file']['type'];
              $size = $_FILES['excel_file']['size'];
              $_FILES['photo']['name'] : get filename
              $_FILES['photo']['type'] : get file type
              $_FILES['photo']['tmp_name']:gettempory name
              $_FILES['photo']['size']:get file size(b)
             */

            $tmp_name = $_FILES['excel_file']['tmp_name'];
            $path .= $q_f_no->file_no . '.xls';
            if (!file_exists($path)) {
                move_uploaded_file($tmp_name, $path);

                // read ==========================
                $data->read($path);
                $numRowsAll = $data->sheets[0]['numRows'];
                for ($r = 2; $r <= $numRowsAll; $r++) {
                    $x = $data->sheets[0]['cells'][$r][1];
                    $y = $data->sheets[0]['cells'][$r][2];
                    if (str_replace(" ", "", $x) != null || str_replace(" ", "", $y) != null) {
                        query("INSERT INTO trackpoint(`road_id`,`lat`,`long`) VALUES('{$r_id}','{$x}','{$y}') ");
                    }
                }// end loop ==========
                echo 'បញ្ចូល Tracks រួចរាល់!';
            } else {
                echo "File ធ្លាប់បញ្ចូលម្តងហើយ!";
            }
        }// end if ============
    }

    // pro_map ===============
    public function link_map_province($pro_id = '') {
        $data['pro_id'] = $pro_id;
        $this->load->view('header');
        $this->load->view('rri/search_province/link_map_pro', $data);
        $this->load->view('footer');
    }

    public function title() {
        $pro_id = $this->input->post('pro_id');
        $qr = query("SELECT
                                pr.id,
                                pr.khmer_name
                        FROM
                                province AS pr
                        WHERE
                                pr.id = '{$pro_id}' ")->row();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($qr);
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
        $this->load->view('rri/import_track/form', $data);
        $this->load->view('footer');
    }

    public function search_by_pro() {
        $pro_id = $this->input->post('pro_id');
        $offset = $this->input->post('offset') - 0;
        $limit = $this->input->post('limit') - 0;

        // count ===================
        $qr = query("SELECT
                                            COUNT(rd.road_id) AS c
                                    FROM
                                            road_info AS rd 
                                    WHERE
                                            rd.pro_id = '{$pro_id}' ");
        $total_record = $qr->row()->c - 0;
        $total_page = ceil($total_record / $limit);

        // query =================
        $qr_ = query("SELECT
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
                                rd.pro_id = '{$pro_id}'
                        ORDER BY
                                rd.idtemp - 0 ASC
                        LIMIT {$offset},
                         {$limit} ");

        $res = $qr_->result();
        header('Content-Type: application/json; charset=utf-8');
        $arr = array('total_page' => $total_page, 'res' => $res,
            'total_record' => $total_record, 'offset' => $offset);
        echo json_encode($arr);
    }

    public function import_tracks() {
        echo '<meta charset="UTF-8">';
        // ==========================
        include_once(APPPATH . "libraries/Excel/reader.php");
        $data = new Spreadsheet_Excel_Reader();
        $data->setUTFEncoder('iconv');
        $data->setOutputEncoding('UTF-8');

        // =========================
        $id = $this->input->post('id');
        $pro_id = $this->input->post('pro_id');
        $q_pro = query("SELECT province_name FROM province WHERE province.id='{$pro_id}' ")->row();
        $q_f_no = query("SELECT
                                    rd.file_no
                            FROM
                                    road_info AS rd
                            WHERE
                                    rd.road_id = '{$id}' ")->row();

        // ========================
        define("UPLOAD_PAYH", "assets/rri/excels/");
        $path = '';
        $path .= UPLOAD_PAYH . $q_pro->province_name . '/';
        if (isset($_FILES['excel_file']['name'])) {
            /* $filename = $_FILES['excel_file']['name'];
              $type = $_FILES['excel_file']['type'];
              $size = $_FILES['excel_file']['size'];
             */
            $tmp_name = $_FILES['excel_file']['tmp_name'];
            /*
              $_FILES['photo']['name'] : get filename
              $_FILES['photo']['type'] : get file type
              $_FILES['photo']['tmp_name']:gettempory name
              $_FILES['photo']['size']:get file size(b)
             */

            $path .= $q_f_no->file_no . '.xls';
            if (!file_exists($path)) {
                move_uploaded_file($tmp_name, $path);

                // read ==========================
                $data->read($path);
                $numRowsAll = $data->sheets[0]['numRows'];
                for ($r = 2; $r <= $numRowsAll; $r++) {
                    $x = $data->sheets[0]['cells'][$r][1];
                    $y = $data->sheets[0]['cells'][$r][2];
                    if (str_replace(" ", "", $x) != null || str_replace(" ", "", $y) != null) {
                        query("INSERT INTO trackpoint(`road_id`,`lat`,`long`) VALUES('{$id}','{$x}','{$y}') ");
                    }
                }// end loop ====================
                echo 'បញ្ចូល Tracks រួចរាល់!';
                redirect('rri/import_track/index');
            } else {
                echo "File already exist";
                redirect('rri/import_track/form');
            }
        }// end if ======================
    }

}
