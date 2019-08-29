<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Imports extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('imports/index');
        $this->load->view('footer');
    }

    // show province ===================   
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

    public function import_excel() {
        echo '<meta charset="UTF-8">';
        // make pro folder & upload ===================
        $pro_id = $this->input->post('pro_id');
        $q_pro = query("SELECT * FROM province WHERE province.id='{$pro_id}' ")->row();
        !is_dir('assets/rri/excels/' . $q_pro->province_name) ? mkdir('assets/rri/excels/' . $q_pro->province_name) : '';
        $dir_pro = 'assets/rri/excels/' . $q_pro->province_name;
        foreach ($_FILES["excel_file"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['excel_file']['tmp_name'][$key];
                $name = $_FILES['excel_file']['name'][$key];
                move_uploaded_file($tmp_name, "$dir_pro/$name");
            }
        }

        // ======================================
        $files = $_FILES['excel_file']['name'];
        $main_id = 0;
        if ($files != '') {
            foreach ($files as $kk) {
                $pos = stripos($kk, '-');
                $file_no = substr($kk, 0, $pos);
                $ext = pathinfo($kk, PATHINFO_EXTENSION);
                if ($ext == 'xls') {
                    include_once(APPPATH . "libraries/excel/reader.php");
                    $data = new Spreadsheet_Excel_Reader();
                    $data->setUTFEncoder('iconv');
                    $data->setOutputEncoding('UTF-8');
                    $data->read($dir_pro . '/' . $kk);
                    $numRowsAll = $data->sheets[0]['numRows'];
                    // $numColsAll = $data->sheets[0]['numCols']; 

                    $idtemp = $this->input->post('pro_id') . $file_no;
                    if ($idtemp != '') {
                        $q_total_idtemp = query("SELECT
                                                        COUNT(r.road_id) AS c
                                                FROM
                                                        road_info AS r
                                                WHERE
                                                        r.idtemp = '{$idtemp}' ")->row();
                    }

                    if ($q_total_idtemp->c < 1) {
                        /* road_info ===================================== */
                        $road_number = $data->sheets[0]['cells'][1][2];
                        $road_name = $data->sheets[0]['cells'][2][2];
                        $type = $data->sheets[0]['cells'][3][2];
                        $length = $data->sheets[0]['cells'][4][3];
                        $width = $data->sheets[0]['cells'][5][3];
                        $first_point_x = $data->sheets[0]['cells'][6][3];
                        $first_point_y = $data->sheets[0]['cells'][6][4];
                        $last_point_x = $data->sheets[0]['cells'][7][3];
                        $last_point_y = $data->sheets[0]['cells'][7][4];
                        $pro_id = $this->input->post('pro_id');
                        $dis_id = $this->input->post('dis_id');

                        if ($road_number !== null || $road_name !== null || $type !== null ||
                                $length !== null || $width !== null || $first_point_x !== null ||
                                $first_point_y !== null || $last_point_x !== null || $last_point_y !== null) {
                            $data_road_info = array(
                                'idtemp' => $idtemp,
                                'road_number' => $road_number,
                                'road_name' => $road_name,
                                'type' => $type,
                                'length' => $length,
                                'width' => $width,
                                'first_point_x' => $first_point_x,
                                'first_point_y' => $first_point_y,
                                'last_point_x' => $last_point_x,
                                'last_point_y' => $last_point_y,
                                'file_name' => $kk,
                                'pro_id' => $pro_id,
                                'dis_id' => $dis_id,
                                'file_no' => $file_no
                            );
                            insert('road_info', $data_road_info);
                        }

                        /* catch last road_id ====================================== */
                        $main_id = insert_id();

                        /* geo ==================================================== */
                        $i_geo = 0;
                        for ($r = 12; $r <= $numRowsAll; $r++) {
                            $dis = $data->sheets[0]['cells'][$r][1];
                            $com = $data->sheets[0]['cells'][$r][2];
                            $vil = $data->sheets[0]['cells'][$r][3];
                            if (str_replace(" ", "", $dis) != null || str_replace(" ", "", $com) != null || str_replace(" ", "", $vil) != null) {
                                $data_geo = array(
                                    'road_id' => $main_id,
                                    'idtemp1' => $idtemp,
                                    'district' => $dis,
                                    'commune' => $com,
                                    'village' => $vil,
                                    'pro_id' => $pro_id,
                                    'dis_id' => $dis_id,
                                    'file_no' => $file_no,
                                    'line_id' => $i_geo + 1
                                );
                                insert('geography', $data_geo);
                                $i_geo++;
                            }
                        }

                        /* art ==================================================== */
                        $i_art = 0;
                        for ($r = 12; $r <= $numRowsAll; $r++) {
                            $art_type = $data->sheets[0]['cells'][$r][4];
                            $dimension = $data->sheets[0]['cells'][$r][5];
                            $quality = $data->sheets[0]['cells'][$r][6];
                            $start_x = $data->sheets[0]['cells'][$r][7];
                            $start_y = $data->sheets[0]['cells'][$r][8];

                            if (str_replace(" ", "", $art_type) != null || str_replace(" ", "", $dimension) != null ||
                                    str_replace(" ", "", $quality) != null || str_replace(" ", "", $start_x) != null ||
                                    str_replace(" ", "", $start_y) != null) {
                                $data_art = array(
                                    'road_id' => $main_id,
                                    'idtemp2' => $idtemp,
                                    'type_building_art' => $art_type,
                                    'dimension_building_art' => $dimension,
                                    'quality_building_art' => $quality,
                                    'position_x_building_art' => $start_x,
                                    'position_y_building_art' => $start_y,
                                    'pro_id' => $pro_id,
                                    'dis_id' => $dis_id,
                                    'file_no' => $file_no,
                                    'line_id' => $i_art + 1
                                );
                                insert('art_building', $data_art);
                                $i_art++;
                            }
                        }

                        /* pub ================================================== */
                        $i_pub = 0;
                        for ($r = 12; $r <= $numRowsAll; $r++) {
                            $type_building = $data->sheets[0]['cells'][$r][9];
                            $name_building = $data->sheets[0]['cells'][$r][10];
                            $position_x = $data->sheets[0]['cells'][$r][11];
                            $position_y = $data->sheets[0]['cells'][$r][12];
                            $direction = $data->sheets[0]['cells'][$r][13];

                            if (str_replace(" ", "", $type_building) != null || str_replace(" ", "", $name_building) != null ||
                                    str_replace(" ", "", $position_x) != null || str_replace(" ", "", $position_y) != null ||
                                    str_replace(" ", "", $direction) != null) {
                                $data_pub = array(
                                    'road_id' => $main_id,
                                    'idtemp3' => $idtemp,
                                    'type_building' => $type_building,
                                    'name_building' => $name_building,
                                    'position_x' => $position_x,
                                    'position_y' => $position_y,
                                    'direction' => $direction,
                                    'pro_id' => $pro_id,
                                    'dis_id' => $dis_id,
                                    'file_no' => $file_no,
                                    'line_id' => $i_pub + 1
                                );
                                insert('public_building', $data_pub);
                                $i_pub++;
                            }
                        }

                        /* his ================================================== */
                        $i_his = 0;
                        for ($r = 12; $r <= $numRowsAll; $r++) {
                            $activity = $data->sheets[0]['cells'][$r][14];
                            $year_construct = $data->sheets[0]['cells'][$r][15];
                            $apply_by = $data->sheets[0]['cells'][$r][16];
                            $source_budget = $data->sheets[0]['cells'][$r][17];

                            if (str_replace(" ", "", $activity) != null || str_replace(" ", "", $source_budget) != null ||
                                    str_replace(" ", "", $apply_by) != null || str_replace(" ", "", $source_budget) != null) {
                                $data_his = array(
                                    'road_id' => $main_id,
                                    'idtemp4' => $idtemp,
                                    'activity' => $activity,
                                    'year_construct' => $year_construct,
                                    'apply_by' => $apply_by,
                                    'source_budget' => $source_budget,
                                    'pro_id' => $pro_id,
                                    'dis_id' => $dis_id,
                                    'file_no' => $file_no,
                                    'line_id' => $i_his + 1
                                );
                                insert('history', $data_his);
                                $i_his++;
                            }
                        }

                        /* pavement ======================================== */
                        $i_pave = 0;
                        for ($r = 12; $r <= $numRowsAll; $r++) {
                            $type_pavement = $data->sheets[0]['cells'][$r][18];
                            $first_point_x_pavement = $data->sheets[0]['cells'][$r][19];
                            $first_point_y_pavement = $data->sheets[0]['cells'][$r][20];
                            $last_point_x_pavement = $data->sheets[0]['cells'][$r][21];
                            $last_point_y_pavement = $data->sheets[0]['cells'][$r][22];
                            $length_pavement = $data->sheets[0]['cells'][$r][23];

                            if (str_replace(" ", "", $type_pavement) != null || str_replace(" ", "", $first_point_x_pavement) != null ||
                                    str_replace(" ", "", $first_point_y_pavement) != null || str_replace(" ", "", $last_point_x_pavement) != null ||
                                    str_replace(" ", "", $last_point_y_pavement) != null || str_replace(" ", "", $length_pavement) != null) {
                                $data_pavement = array(
                                    'road_id' => $main_id,
                                    'idtemp5' => $idtemp,
                                    'type_pavement' => $type_pavement,
                                    'first_point_x_pavement' => $first_point_x_pavement,
                                    'first_point_y_pavement' => $first_point_y_pavement,
                                    'last_point_x_pavement' => $last_point_x_pavement,
                                    'last_point_y_pavement' => $last_point_y_pavement,
                                    'length_pavement' => $length_pavement,
                                    'pro_id' => $pro_id,
                                    'dis_id' => $dis_id,
                                    'file_no' => $file_no,
                                    'line_id' => $i_pave + 1
                                );
                                insert('pavement', $data_pavement);
                                $i_pave++;
                            }
                        }
                    }// end if count ================
                }// end if check ext ================
            }// end loop files =====================
            echo 'ទិន្នន័យបញ្ចូលពី Excel រួចរាល់!';
        }// end if > 0 =====================
    }

// end function =====================
}
