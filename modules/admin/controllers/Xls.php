<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Xls extends Admin_Controller {

    public function index() {
        $this->load->view('headerif');
        $this->load->view('login/index');
        $this->load->view('footerif');
    }

    public function read_file() {
        //$data = new Spreadsheet_Excel_Reader("test.xls",true,"UTF-16");
        //$data->read('assets/xls/rri/001.xls');
        /* $rowStart = 8;
          $colStart = 2;
          $colLessStart = 8;
          $rowLessStart = 1; */
        //$data->read($_FILES['userfile']['tmp_name']);
//        echo "<pre>";
//        //print_r($data->sheets[0]['cells'][10][1]);
//        echo "</pre>";
        //echo $data->sheets[0]['cells'][$rowStart][$colStart];
        // echo '<br>';
        //echo $data->sheets[0]['cells'][$rowStart][$colStart+1];

        echo '<meta charset="UTF-8">';
        //$this->load->helper('directory');
        //$map = directory_map('./assets/xls/rri');
        include_once(APPPATH . "libraries/Excel/reader.php");
        $data = new Spreadsheet_Excel_Reader();
        $data->setUTFEncoder('iconv');
        $data->setOutputEncoding('UTF-8');
        $data->read("assets/xls/rri/001.xls");
        /* $numColsAll = $data->sheets[0]['numCols']; */
        $numRowsAll = $data->sheets[0]['numRows'];

        /* road_info------------------------------------------------------ */
        //$idtemp = $data->sheets[0]['cells'][$r][];
        $road_number = $data->sheets[0]['cells'][1][2];
        $road_name = $data->sheets[0]['cells'][2][2];
        $type = $data->sheets[0]['cells'][3][2];
        $length = $data->sheets[0]['cells'][4][3];
        $width = $data->sheets[0]['cells'][5][3];
        $first_point_x = $data->sheets[0]['cells'][6][3];
        $first_point_y = $data->sheets[0]['cells'][6][4];
        $last_point_x = $data->sheets[0]['cells'][7][3];
        $last_point_y = $data->sheets[0]['cells'][7][4];
        //$file_name = $data->sheets[0]['cells'][$r][];
        //$pro_id = $data->sheets[0]['cells'][$r][];
        if ($road_number !== null || $road_name !== null || $type !== null || $length !== null || $width !== null || $first_point_x !== null || $first_point_y !== null || $last_point_x !== null || $last_point_y !== null) {
            $data_road_info = array(
                'road_number' => $road_number,
                'road_name' => $road_name,
                'type' => $type,
                'length' => $length,
                'width' => $width,
                'first_point_x' => $first_point_x,
                'first_point_y' => $first_point_y,
                'last_point_x' => $last_point_x,
                'last_point_y' => $last_point_y
            );
            insert('road_info', $data_road_info);
        }

        /* sub------------------------------------------------------ */
        for ($r = 12; $r <= $numRowsAll; $r++) {
            /* geography------------------------------------------------------ */
            $dis = $data->sheets[0]['cells'][$r][1];
            $com = $data->sheets[0]['cells'][$r][2];
            $vil = $data->sheets[0]['cells'][$r][3];
            if ($dis !== null || $com !== null || $vil !== null) {
                /* echo "$dis || $com || $vil <br>"; */
                $data_geo = array(
                    'district' => $dis,
                    'commune' => $com,
                    'village' => $vil
                );
                insert('geography', $data_geo);
            }

            /* art_building--------------------------------------------------- */
            $art_type = $data->sheets[0]['cells'][$r][4];
            $dimension = $data->sheets[0]['cells'][$r][5];
            $quality = $data->sheets[0]['cells'][$r][6];
            $start_x = $data->sheets[0]['cells'][$r][7];
            $start_y = $data->sheets[0]['cells'][$r][8];
            if ($art_type !== null || $dimension !== null || $quality !== null || $start_x !== null || $start_y !== null) {
                $data_art = array(
                    'type_building_art' => $art_type,
                    'dimension_building_art' => $dimension,
                    'quality_building_art' => $quality,
                    'position_x_building_art' => $start_x,
                    'position_y_building_art' => $start_y
                );
                insert('art_building', $data_art);
            }

            /* public_building--------------------------------------------------- */
            $type_building = $data->sheets[0]['cells'][$r][9];
            $name_building = $data->sheets[0]['cells'][$r][10];
            $position_x = $data->sheets[0]['cells'][$r][11];
            $position_y = $data->sheets[0]['cells'][$r][12];
            $direction = $data->sheets[0]['cells'][$r][13];
            if ($type_building !== null || $name_building !== null || $position_x !== null || $position_y !== null || $direction !== null) {
                $data_pub = array(
                    'type_building' => $type_building,
                    'name_building' => $name_building,
                    'position_x' => $position_x,
                    'position_y' => $position_y,
                    'direction' => $direction
                );
                insert('public_building', $data_pub);
            }

            /* history--------------------------------------------------- */
            $activity = $data->sheets[0]['cells'][$r][14];
            $year_construct = $data->sheets[0]['cells'][$r][15];
            $apply_by = $data->sheets[0]['cells'][$r][16];
            $source_budget = $data->sheets[0]['cells'][$r][17];
            if ($activity !== null || $source_budget !== null || $apply_by !== null || $source_budget !== null) {
                $data_his = array(
                    'activity' => $activity,
                    'year_construct' => $year_construct,
                    'apply_by' => $apply_by,
                    'source_budget' => $source_budget
                );
                insert('history', $data_his);
            }

            /* pavement--------------------------------------------------- */
            $type_pavement = $data->sheets[0]['cells'][$r][18];
            $first_point_x_pavement = $data->sheets[0]['cells'][$r][19];
            $first_point_y_pavement = $data->sheets[0]['cells'][$r][20];
            $last_point_x_pavement = $data->sheets[0]['cells'][$r][21];
            $last_point_y_pavement = $data->sheets[0]['cells'][$r][22];
            $length_pavement = $data->sheets[0]['cells'][$r][23];
            if ($type_pavement !== null || $first_point_x_pavement !== null || $first_point_y_pavement !== null || $last_point_x_pavement !== null || $last_point_y_pavement !== null || $length_pavement !== null) {
                $data_pavement = array(
                    'type_pavement' => $type_pavement,
                    'first_point_x_pavement' => $first_point_x_pavement,
                    'first_point_y_pavement' => $first_point_y_pavement,
                    'last_point_x_pavement' => $last_point_x_pavement,
                    'last_point_y_pavement' => $last_point_y_pavement,
                    'length_pavement' => $length_pavement
                );
                insert('pavement', $data_pavement);
            }
        }
    }

}
