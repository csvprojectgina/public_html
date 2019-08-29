<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Csv_importexcel extends Admin_Controller {

    // index ===============
    public function index() {
        // get data from unit
        $query = query("SELECT * FROM unit  WHERE status='1' ");
        $row = $query->result();
        $data['unituery'] = $row;

        $this->load->view('header');
        // $this->load->view('csv/csv_importexcel/index', $data);

        $this->load->view('csv/csv_importexcel/importexcel_frm', $data);
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

    public function import_excel() {
        $unit = $this->input->post('u_name');
        if ($this->input->post('submit')) {
            $path = 'assets/excelfile/';
            // $this->load->library('excel');
            // new PHPExcel();
            require_once APPPATH . "/libraries/phpexcel/PHPExcel.php";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $config['file_name'] = 'unit-id-' . $this->input->post('u_name') . '-' . time();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if (empty($error)) {
                if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
            }
            $inputFileName = $path . $import_xls_file;
            $inserdata = [];
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
                $flag = true;
                $i = 0;
                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                if ($unit == 1) {
                    foreach ($allDataInSheet as $value) {

                        if ($flag) {
                            $flag = false;
                            continue;
                        }
                        $dobformat = new DateTime(date('Y-m-d', strtotime($value['E'])));
                        if($value['J'] == ''){
                            $dateofjoin = '';
                        }else{
                            $datenew = date('Y-m-d', strtotime($value['J']));
                            $dateofjoin = $datenew;
                        }
                        
                        $inserdata[$i]['csv_id'] = ($value['A'] == 1) ? '' : $value['A'];
                        $inserdata[$i]['csv_first_name'] = $value['B'];
                        $inserdata[$i]['csv_last_name'] = $value['C'];
                        $inserdata[$i]['csv_gender'] = ($value['D'] == 'ប') ? 'ប្រុស' : 'ស្រី';
                        //$inserdata[$i]['csv_dob'] = date('Y-m-d', strtotime($value['E']));
                        $inserdata[$i]['csv_dob'] =$dobformat->format('Y-m-d');
                        $inserdata[$i]['csv_position'] = $value['F'];
                        $inserdata[$i]['csv_salarylevel'] = $value['G'];
                        $inserdata[$i]['csv_phone'] = ($value['H'] == 1) ? '' : $value['H'];
                        $inserdata[$i]['csv_skills'] = $value['K'];
                        $inserdata[$i]['csv_educatinlevel'] = $value['L'];
                        //$inserdata[$i]['csv_dateofjoin'] = ($value['J'] == '') ? '' : date('Y-m-d', strtotime($value['J']));
                        $inserdata[$i]['csv_dateofjoin'] = $dateofjoin;
                        $inserdata[$i]['csv_name_en'] = $value['I'];
                        $inserdata[$i]['csv_general_dep'] = $value['M'];
                        $inserdata[$i]['csv_department'] = ($value['N'] == 1) ? '' : $value['N'];
                        $inserdata[$i]['csv_office'] = $value['O'];
                        $inserdata[$i]['csv_headofprovince'] = '';
                        $inserdata[$i]['csv_officeofprovince'] = '';
                        $i++;
                    }

                    $data['list_array'] = $inserdata;
                    $data['get_unit_id'] = $this->input->post('u_name');
                    $this->load->view('header');
                    $this->load->view('csv_importexcel/csv_list_excel_ministry', $data);
                    $this->load->view('footer');
                } else {

                    foreach ($allDataInSheet as $value) {

                        if ($flag) {
                            $flag = false;
                            continue;
                        }
                        $dobformat = new DateTime(date('Y-m-d', strtotime($value['E'])));
                        if($value['K'] == ''){
                            $dateofjoin = '';
                        }else{
                            $datenew = date('Y-m-d', strtotime($value['K']));
                            $dateofjoin = $datenew->format('Y-m-d');
                        }
                        
                        $inserdata[$i]['csv_id'] = ($value['A'] == 1) ? '' : $value['A'];
                        $inserdata[$i]['csv_first_name'] = $value['B'];
                        $inserdata[$i]['csv_last_name'] = $value['C'];
                        $inserdata[$i]['csv_gender'] = ($value['D'] == 'ប') ? 'ប្រុស' : 'ស្រី';
                       // $inserdata[$i]['csv_dob'] = date('Y-m-d', strtotime($value['E']));
                        $inserdata[$i]['csv_dob'] = $dobformat->format('Y-m-d');
                        $inserdata[$i]['csv_position'] = $value['F'];
                        $inserdata[$i]['csv_salarylevel'] = $value['G'];
                        $inserdata[$i]['csv_phone'] = ($value['H'] == 1) ? '' : $value['H'];
                        $inserdata[$i]['csv_skills'] = $value['I'];
                        $inserdata[$i]['csv_educatinlevel'] = $value['J'];
                        $inserdata[$i]['csv_dateofjoin'] = $dateofjoin;
                        $inserdata[$i]['csv_name_en'] = $value['L'];
                        $inserdata[$i]['csv_headofprovince'] = $value['N'];
                        $inserdata[$i]['csv_officeofprovince'] = ($value['O'] == 1) ? '' : $value['O'];
                        $inserdata[$i]['csv_general_dep'] = '';
                        $inserdata[$i]['csv_department'] = '';
                        $inserdata[$i]['csv_office'] = '';
                        $i++;
                    }
                    $data['list_array'] = $inserdata;
                    $data['get_unit_id'] = $this->input->post('u_name');
                    $this->load->view('header');
                    $this->load->view('csv_importexcel/csv_list_excel_province', $data);
                    $this->load->view('footer');
                }
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
        }

        /* end function */
    }

    function save_to_db() {
       
        $maxid = $this->db->query('SELECT MAX(common_official_code) AS `maxid` FROM `civilservant`')->row()->maxid;
        $i = $maxid+0;
        $unit_code = $this->input->post('unit_id');
        $csv_list = $this->input->post('csv_list');
        //echo $unit_code.'<pre>';
        
       //print_r($csv_list);
       // die($unit_code);
        foreach ($csv_list as $row) {
             
            
            $lastname = $row['csv_first_name'];
            $firstname = $row['csv_last_name'];
            $english_full_name = $row['csv_name_en'];
            $civil_servant_id = $row['csv_id'];

            $common_official_code = ++$i;
            $gender = $row['csv_gender'];
            $dateofbirth = date('Y-m-d', strtotime($row['csv_dob']));
            $mobile_phone = $row['csv_phone'];
            $work_phone = $row['csv_phone'];
            $degree = $row['csv_educatinlevel'];
            $skills = $row['csv_skills'];
            $nationality = 'ខ្មែរ';

            $data = array(
                // Personal Information========
                'lastname' => $lastname, 'firstname' => $firstname,
                // 'khmer_full_name' => $khmer_full_name,
                'english_full_name' => $english_full_name, 'civil_servant_id' => $civil_servant_id, 'unit_code' => $unit_code, 'common_official_code' => $common_official_code, 'gender' => $gender, 'dateofbirth' => $dateofbirth, 'nationality' => $nationality, 'mobile_phone' => $mobile_phone, 'work_phone' => $work_phone, 'skills' => $skills, 'degree' => $degree,
            );
            $this->db->insert('civilservant', $data);
            // main id =========
            $id = insert_id();


            $province_office = isset($row['csv_headofprovince'])?$row['csv_headofprovince']:'';
            
            $general_dep_name = isset($row['csv_general_dep'])?$row['csv_general_dep']:'';
            $d_name = isset($row['csv_department'])?$row['csv_department']:'';
            $land_official = isset($row['csv_officeofprovince'])?$row['csv_officeofprovince']:'';
            $currentRole = isset($row['csv_position'])?$row['csv_position']:'';
            $work_office = isset($row['csv_office'])?$row['csv_office']:'';
            $date_in = isset($row['csv_dateofjoin'])?date('Y-m-d', strtotime($row['csv_dateofjoin'])):'';
            $data_work = array('id' => $id, 'date_in' => $date_in, 'unit' => $unit_code, 'general_department' => $general_dep_name, 'department' => $d_name, 'land_official' => $land_official, 'current_role_id' => $currentRole, 'province_office' => $province_office, 'work_office' => $work_office);
            $this->db->insert('work', $data_work);

            // insert salary =========
            if ($row['csv_salarylevel'] != '') {
                $get_salary = $this->db->query("SELECT * FROM list_salary WHERE STATUS <>0 AND type = '{$row['csv_salarylevel']}'")->row();
                $salary_level = $row['csv_salarylevel'];
                $index_multiply = $get_salary->multiple;
                $index_salary = $get_salary->multiple_money;
                $pure_salary = (float) $index_multiply * (float) $index_salary;
            } else {
                $salary_level = null;
                $index_multiply = 0;
                $index_salary = 0;
                $pure_salary = 0;
            }

            $data_salary = array('id' => $id, 'salary_level' => $salary_level, 'index_multiply' => $index_multiply, 'index_salary' => $index_salary, 'pure_salary' => $pure_salary);
            $this->db->insert('salary', $data_salary);

             $mother_data = array('id' => $id);
              insert('mother', $mother_data);

              $father_data = array('id' => $id);
              insert('father', $father_data);

              $data_degree = array('id' => $id);
              insert('degree', $data_degree);

              $data_train = array('id' => $id);
              insert('training', $data_train);

              $data_language = array('id' => $id);
              insert('language', $data_language);

              $data_medal = array('id' => $id);
              insert('medal', $data_medal);

              $data_absent = array('id' => $id);
              insert('absent', $data_absent); 
              
            
        }


       // header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['status' => 'success']);
    }

}
