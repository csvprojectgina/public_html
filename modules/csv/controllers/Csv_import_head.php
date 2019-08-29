<?php

/*
 * This file for insert data to head office of ministry
 * 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Csv_import_head extends Admin_Controller {

    // index ===============
    public function index() {
        // get data from unit
        $query = query("SELECT * FROM unit  WHERE status='1' ");
        $row = $query->result();
        $data['unituery'] = $row;
        $this->load->view('header');
        $this->load->view('csv/csv_import_head/index', $data);
        $this->load->view('footer');
    }

    // form ===============
    public function form() {

        $query = query("SELECT * FROM unit  WHERE status='1' ");
        $row = $query->result();
        $data['unituery'] = $row;

        $this->load->view('header');
        $this->load->view('csv/csv_info/form', $data);
        $this->load->view('footer');
    }

    public function import_excel_head() {
        '<meta charset="UTF-8">';
        //  make pro folder & upload ===================

        $u_id = $this->input->post('u_name'); // get from javascript
        $query_unit = query("SELECT unit FROM unit WHERE id=" . $u_id);
        foreach ($query_unit->result() as $row) {
            $unit = $row->unit;
        }
        $u_english = $this->input->post('unit_english');
        !is_dir('assets/csv/excels/' . $u_english) ? mkdir('assets/csv/excels/' . $u_english) : '';
        $dir_unit = 'assets/csv/excels/' . $u_english;
        foreach ($_FILES["excel_file"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['excel_file']['tmp_name'][$key];
                $name = $_FILES['excel_file']['name'][$key];
                move_uploaded_file($tmp_name, "$dir_unit/$name");
            }
        }

        // ==========================
        $files = $_FILES['excel_file']['name'];

        /**/
        $main_id = 0;
        if ($files != '') {
            foreach ($files as $kk) {
                $pos = stripos($kk, '-');
                $file_no = substr($kk, 0, $pos);
                $ext = pathinfo($kk, PATHINFO_EXTENSION);
                if ($ext == 'xls') {
                    include_once(APPPATH . "libraries/PHPExcel/Shared/Date.php"); // for date format
                    include_once(APPPATH . "libraries/PHPExcel/reader.php");
                    $data = new Spreadsheet_Excel_Reader();
                    $data->setUTFEncoder('iconv');
                    $data->setOutputEncoding('UTF-8');
                    $data->read($dir_unit . '/' . $kk);
                    $numRowsAll = $data->sheets[0]['numRows'];
                    /* insert civil servant */
                    for ($r = 2; $r <= $numRowsAll; $r++) {
                        /* var civilservant */
                        $civil_servant_id = $data->sheets[0]['cells'][$r][1];
                        $full_name = $data->sheets[0]['cells'][$r][2];
                        // check khmer full name
                        $name = explode(" ", $full_name);
                        $lastname = $name[0];
                        $firstname = $name[1];
                        $gender = $data->sheets[0]['cells'][$r][3];
                        $dateOfBirth = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][$r][4]));
                        $currentrole = $data->sheets[0]['cells'][$r][5];
                        /* var salary */
                        $salary_level = $data->sheets[0]['cells'][$r][6];
                        $mobile_phone = $data->sheets[0]['cells'][$r][7];
                        $english_full_name = $data->sheets[0]['cells'][$r][8];
                        /* var work */
                        $date_in = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][$r][10]));
                        /* degree */
                        $skill = $data->sheets[0]['cells'][$r][11];
                        $degree_level = $data->sheets[0]['cells'][$r][12];
                        $type_of_degree = $data->sheets[0]['cells'][$r][13];
                        /* promote */

                        $year = $data->sheets[0]['cells'][$r][14];

                        // check currentrole
                        switch ($currentrole) {
                            case "ជំនួយការ":
                                $current_role_id = 20;
                                break;
                            case "ប្រធានការិយាល័យ":
                                $current_role_id = 9;
                                break;
                            case "អនុប្រធានការិយាល័យ":
                                $current_role_id = 10;
                                break;
                            case "កម្មសិក្សាការី":
                                $current_role_id = 17;
                                break;
                            case "មន្រ្តី":
                                $current_role_id = 15;
                                break;
                        }
                        // check gender
                        switch ($gender) {
                            case 'ប':
                                $gender = "ប្រុស";
                                break;
                            case 'ស':
                                $gender = "ស្រី";
                                break;
                        }
                        $data_civilservant = array(
                            'civil_servant_id' => $civil_servant_id,
                            'lastname' => $lastname,
                            'firstname' => $firstname,
                            'gender' => $gender,
                            'mobile_phone' => $mobile_phone,
                            'unit_code' => 1,
                            'dateofbirth' => $dateOfBirth,
                            'english_full_name' => $english_full_name
                        );

                        insert('civilservant', $data_civilservant);
                        //
                        $main_id = insert_id();
                        /* insert work */
                        $data_work = array(
                            'id' => $main_id,
                            'current_role_id' => $current_role_id,
                            'date_in' => $date_in,
                            'unit' => 1
                        );
                        insert('work', $data_work);
                        /* insert salary */
                        $data_salary = array(
                            'id' => $main_id,
                            'salary_level' => $salary_level
                        );
                        insert('salary', $data_salary);
                        /* insert degree */
                        $data_degree = array(
                            'id' => $main_id,
                            'skill' => $skill,
                            'degree_level' => $degree_level,
                            'type_of_degree' => $type_of_degree
                        );
                        insert('degree', $data_degree);
                        /* insert promote */
                        $data_promote = array(
                            'id' => $main_id,
                            'year' => $year
                        );
                        insert('promote', $data_promote);
                    }
                }
                /* end check condition */
            }
        }/* end loop file */
    }

    /* end function */
}
