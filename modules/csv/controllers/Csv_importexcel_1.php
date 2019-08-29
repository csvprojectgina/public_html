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

                    /* place of birth */
                    $lastname = $data->sheets[0]['cells'][1][2];
                    $firstname = $data->sheets[0]['cells'][2][2];
                    $english_full_name = $data->sheets[0]['cells'][3][2];
                    $gender = $data->sheets[0]['cells'][4][2];
                    $nationality = $data->sheets[0]['cells'][5][2];
                    $civil_servant_id = $data->sheets[0]['cells'][6][2]; //for check
                    $nationality_id = $data->sheets[0]['cells'][7][2]; //for check
                    $common_official_code = $data->sheets[0]['cells'][8][2];
                    $dateOfBirth = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][9][2])); // from libray date
                    //check empty date
                    if ($dateOfBirth >= date('Y-m-d')) {
                        $dateOfBirth = null;
                    } else if ($dateOfBirth <= date('Y-m-d')) {
                        $dateOfBirth;
                    }
                    //echo '<pre>'.print_r($dateOfBirth);exit;
                    $mobile_phone = "0" . $data->sheets[0]['cells'][10][2];
                    $work_phone = "0" . $data->sheets[0]['cells'][11][2];
                    $fax_number = "0" . $data->sheets[0]['cells'][12][2];

                    /* place of birth */
                    $house_no = $data->sheets[0]['cells'][16][2];
                    $group_no = $data->sheets[0]['cells'][16][3];
                    $street = $data->sheets[0]['cells'][16][4];
                    $village = $data->sheets[0]['cells'][16][5];
                    $commune = $data->sheets[0]['cells'][16][6];
                    $district = $data->sheets[0]['cells'][16][7];
                    $province = $data->sheets[0]['cells'][16][8];
                    $country = $data->sheets[0]['cells'][16][9];
                    /* end place of birth */
                    /* wife or husband */
                    $family_name = $data->sheets[0]['cells'][18][2];
                    $family_dateOfBirth = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][18][3]));
                    /* check gender wife or husben */
                    if ($gender == 'ស្រី' AND isset($family_name)) {
                        $hus_or_wife = 'ប្តី';
                    } else if ($gender == 'ប្រុស' AND isset($family_name)) {
                        $hus_or_wife = 'ប្រពន្ធ';
                    } else {
                        $hus_or_wife = "";
                    }

                    /* check empty date */
                    if ($family_dateOfBirth >= date('Y-m-d')) {
                        $family_dateOfBirth = null;
                    } else if ($family_dateOfBirth <= date('Y-m-d')) {
                        $family_dateOfBirth;
                    }
                    $family_placeOfBirth = $data->sheets[0]['cells'][18][4];
                    $family_job = $data->sheets[0]['cells'][18][5];

                    /* father */
                    $father_name = $data->sheets[0]['cells'][20][2];
                    $father_dateOfBirth = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][20][3])); // from libray date
                    //check empty date
                    if ($father_dateOfBirth >= date('Y-m-d')) {
                        $father_dateOfBirth = null;
                    } else if ($father_dateOfBirth <= date('Y-m-d')) {
                        $father_dateOfBirth;
                    }
                    $father_placeOfBirth = $data->sheets[0]['cells'][20][4];
                    $father_job = $data->sheets[0]['cells'][20][5];


                    /* mother */
                    $mother_name = $data->sheets[0]['cells'][22][2];
                    $mother_dateOfBirth = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][22][3])); // from libray date
                    //check empty date
                    if ($mother_dateOfBirth >= date('Y-m-d')) {
                        $mother_dateOfBirth = null;
                    } else if ($mother_dateOfBirth <= date('Y-m-d')) {
                        $mother_dateOfBirth;
                    }
                    $mother_placeOfBirth = $data->sheets[0]['cells'][22][4];
                    $mother_job = $data->sheets[0]['cells'][22][5];

                    /* current address */
                    $current_house_no = $data->sheets[0]['cells'][24][2];
                    $current_group_no = $data->sheets[0]['cells'][24][3];
                    $current_street = $data->sheets[0]['cells'][24][4];
                    $current_village = $data->sheets[0]['cells'][24][5];
                    $current_commune = $data->sheets[0]['cells'][24][6];
                    $current_district = $data->sheets[0]['cells'][24][7];
                    $current_province = $data->sheets[0]['cells'][24][8];
                    $current_country = $data->sheets[0]['cells'][24][9];


                    /* email and website */
                    $email = $data->sheets[0]['cells'][25][2];
                    $website = $data->sheets[0]['cells'][25][5];

                    /* check condition */
                    $query_nationality_id = query("SELECT nationality_id FROM civilservant WHERE nationality_id =" . $nationality_id);
                    foreach ($query_nationality_id->result() as $row) {
                        $nationalityID = $row->nationality_id;
                    }

                    if (!$nationalityID) {
                        if ($lastname !== null || $firstname !== null || $gender !== null ||
                                $nationality !== null || $nationality !== null || $nationality_id !== null ||
                                $civil_servant_id !== null || $english_full_name !== null || $mobile_phone !== null
                        ) {
                            $data_civilservant = array(
                                /* Personal Information======== */
                                'lastname' => $lastname,
                                'firstname' => $firstname,
                                // 'khmer_full_name' => $khmer_full_name,
                                'english_full_name' => $english_full_name,
                                'civil_servant_id' => $civil_servant_id,
                                'nationality_id' => $nationality_id,
                                'unit_code' => $u_id,
                                'common_official_code' => $common_official_code,
                                'unit_official_code' => $unit_official_code,
                                'frame_work_code' => $frame_work_code,
                                'gender' => $gender,
                                'dateofbirth' => $dateOfBirth,
                                'nationality' => $nationality,
                                'mobile_phone' => $mobile_phone,
                                'work_phone' => $work_phone,
                                'fax_number' => $fax_number,
                                'email' => $email,
                                'website' => $website,
                                /* place of birth=========== */
                                'house_no' => $house_no,
                                'group_no ' => $group_no,
                                'street' => $street,
                                'village' => $village,
                                'commune' => $commune,
                                'district' => $district,
                                'province' => $province,
                                /* current of birth=========== */
                                'current_house_no' => $current_house_no,
                                'current_group_no ' => $current_group_no,
                                'current_street' => $current_street,
                                'current_village' => $current_village,
                                'current_commune' => $current_commune,
                                'current_district' => $current_district,
                                'current_province' => $current_province,
                                /* family information=========== */
                                'family_name' => $family_name,
                                'family_dateofbirth ' => $family_dateOfBirth,
                                'hus_or_wife' => $hus_or_wife,
                                'family_job' => $family_job,
                                'date_enter_salary' => $date_enter_salary,
                                'note_family' => $note_family
                            );
                            insert('civilservant', $data_civilservant);
                            /*  end insert civilsevent */
                        }

                        /* slect last id from civilsevent */
                        $query = query("SELECT id FROM civilservant ORDER BY id DESC LIMIT 1");
                        foreach ($query->result() as $row) {
                            $id = $row->id;
                        }

                        /* insert father */
                        $data_father = array(
                            'id' => $id,
                            'father_name' => $father_name,
                            'father_dateOfBirth' => $father_dateOfBirth,
                            'father_placeOfBirth' => $father_placeOfBirth,
                            'father_job' => $father_job
                        );
                        insert('father', $data_father);

                        /* insert father */
                        $data_mother = array(
                            'id' => $id,
                            'mother_name' => $mother_name,
                            'mother_dateOfBirth' => $mother_dateOfBirth,
                            'mother_placeOfBirth' => $mother_placeOfBirth,
                            'mother_job' => $mother_job
                        );
                        insert('mother', $data_mother);

                        /* first witnesses address */
                        $first_witnesses_name = $data->sheets[0]['cells'][28][2];
                        $first_witnesses_gender = $data->sheets[0]['cells'][28][3];
                        $first_witnesses_dateOfBirth = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][28][4]));
                        //check empty date
                        if ($first_witnesses_dateOfBirth >= date('Y-m-d')) {
                            $first_witnesses_dateOfBirth = null;
                        } else if ($first_witnesses_dateOfBirth <= date('Y-m-d')) {
                            $first_witnesses_dateOfBirth;
                        }
                        $first_witnesses_house_no = $data->sheets[0]['cells'][28][5];
                        $first_witnesses_street = $data->sheets[0]['cells'][28][6];
                        $first_witnesses_village = $data->sheets[0]['cells'][28][7];
                        $first_witnesses_commune = $data->sheets[0]['cells'][28][8];
                        $first_witnesses_district = $data->sheets[0]['cells'][28][9];
                        $first_witnesses_province = $data->sheets[0]['cells'][28][10];
                        $first_witnesses_job = $data->sheets[0]['cells'][28][11];

                        /* second witnesses address */
                        $second_witnesses_name = $data->sheets[0]['cells'][31][2];
                        $second_witnesses_gender = $data->sheets[0]['cells'][31][3];
                        $second_witnesses_dateOfBirth = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][31][4]));
                        //check empty date
                        if ($second_witnesses_dateOfBirth >= date('Y-m-d')) {
                            $second_witnesses_dateOfBirth = null;
                        } else if ($second_witnesses_dateOfBirth <= date('Y-m-d')) {
                            $second_witnesses_dateOfBirth;
                        }
                        $second_witnesses_house_no = $data->sheets[0]['cells'][31][5];
                        $second_witnesses_street = $data->sheets[0]['cells'][31][6];
                        $second_witnesses_village = $data->sheets[0]['cells'][31][7];
                        $second_witnesses_commune = $data->sheets[0]['cells'][31][8];
                        $second_witnesses_district = $data->sheets[0]['cells'][31][9];
                        $second_witnesses_province = $data->sheets[0]['cells'][31][10];
                        $second_witnesses_job = $data->sheets[0]['cells'][31][11];
                        /* insert first_wit */
                        $data_wit1 = array(
                            'csv_id' => $id,
                            'wit_name' => $first_witnesses_name,
                            'gender' => $first_witnesses_gender,
                            'dob' => $first_witnesses_dateOfBirth,
                            'num_home' => $first_witnesses_house_no,
                            'streets' => $first_witnesses_street,
                            'village' => $first_witnesses_village,
                            'commun' => $first_witnesses_commune,
                            'district' => $first_witnesses_district,
                            'province ' => $first_witnesses_province,
                            'job' => $first_witnesses_job
                        );
                        insert('tbl_witnesses', $data_wit1);

                        /*  insert second_wit */
                        $data_wit2 = array(
                            'csv_id' => $id,
                            'wit_name' => $second_witnesses_name,
                            'gender' => $second_witnesses_gender,
                            'dob' => $second_witnesses_dateOfBirth,
                            'num_home' => $second_witnesses_house_no,
                            'streets' => $second_witnesses_street,
                            'village' => $second_witnesses_village,
                            'commun' => $second_witnesses_commune,
                            'district' => $second_witnesses_district,
                            'province' => $second_witnesses_province,
                            'job' => $second_witnesses_job
                        );
                        insert('tbl_witnesses', $data_wit2);

                        /*  insert work */
                        $current_role = $data->sheets[0]['cells'][14][2];
                        $work_location = $data->sheets[0]['cells'][14][3];
                        $date_in = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][14][4]));

                        //check empty date
                        if ($date_in >= date('Y-m-d')) {
                            $date_in = null;
                        } else if ($date_in <= date('Y-m-d')) {
                            $date_in;
                        }

                        $date_out = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][14][5]));
                        //check empty date
                        if ($date_out >= date('Y-m-d')) {
                            $date_out = null;
                        } else if ($date_out <= date('Y-m-d')) {
                            $date_out;
                        }
                        $type_of_framework = $data->sheets[0]['cells'][14][6];
                        $promote_date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][14][7]));
                        //check empty date
                        if ($promote_date >= date('Y-m-d')) {
                            $promote_date = null;
                        } else if ($promote_date <= date('Y-m-d')) {
                            $promote_date;
                        }
                        $real_promote_date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][14][8]));
                        //check empty date
                        if ($real_promote_date >= date('Y-m-d')) {
                            $real_promote_date = null;
                        } else if ($real_promote_date <= date('Y-m-d')) {
                            $real_promote_date;
                        }
                        $physical_status = $data->sheets[0]['cells'][14][9];
//                        $unit = $data->sheets[0]['cells'][13][10];
                        $work_office = $data->sheets[0]['cells'][14][11];
                        $second_role = $data->sheets[0]['cells'][14][12];
                        $equal_class = $data->sheets[0]['cells'][14][13];
                        $data_work = array(
                            'id' => $id,
                            'current_role' => $current_role,
                            'work_location' => $work_location,
                            'date_in' => $date_in,
                            'date_out' => $date_out,
                            'type_of_framework' => $type_of_framework,
                            'current_role_for_biology' => $current_role_for_biology,
                            'promote_date' => $promote_date,
                            'real_promote_date' => $real_promote_date,
                            'physical_status' => $physical_status,
                            'unit' => $unit,
                            'work_office' => $work_office,
                            'second_role' => $second_role,
                            'equal_class' => $equal_class
                        );
                        insert('work', $data_work);

                        /* insert degree */
                        for ($r = 34; $r <= $numRowsAll; $r++) {
                            $level = null;
                            $degree_level = trim($data->sheets[0]['cells'][$r][1]);
                            if ($degree_level == "មធ្យមសិក្សាទុតិយភូមិ") {
                                $level = 1;
                            }
                            if ($degree_level == "បរិញ្ញាបត្រ") {
                                $level = 2;
                            }
                            if ($degree_level == "បរិញ្ញាបត្ររង") {
                                $level = 1;
                            }
                            if ($degree_level == "បរិញ្ញាបត្រជាន់ខ្ពស់") {
                                $level = 2;
                            }
                            if ($degree_level == "បណ្ឌិត") {
                                $level = 2;
                            }
                            $school = $data->sheets[0]['cells'][$r][2];
                            $study_place = $data->sheets[0]['cells'][$r][3];
                            $skill = $data->sheets[0]['cells'][$r][4];
                            $study_date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][$r][5]));
                            //check empty date
                            if ($study_date >= date('Y-m-d')) {
                                $study_date = null;
                            } else if ($study_date <= date('Y-m-d')) {
                                $study_date;
                            }
                            $study_end_date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][$r][6]));
                            //check empty date
                            if ($study_end_date >= date('Y-m-d')) {
                                $study_end_date = null;
                            } else if ($study_end_date <= date('Y-m-d')) {
                                $study_end_date;
                            }
                            $study_country = $data->sheets[0]['cells'][$r][7];
                            if (str_replace(" ", "", $degree_level) != null || str_replace(" ", "", $school) != null || str_replace(" ", "", $study_place) != null || str_replace(" ", "", $skill) != null || str_replace(" ", "", $study_country) != null) {
                                $data_degree = array(
                                    'id' => $id,
                                    'degree_level' => $degree_level,
                                    'level' => $level,
                                    'skill' => $skill,
                                    'study_date' => $study_date,
                                    'end_date' => $study_end_date,
                                    'school' => $school,
                                    'study_place' => $study_place,
                                    'country' => $study_country
                                );
                                insert('degree', $data_degree);
                            }
                        }

                        /* insert training */
                        for ($r = 34; $r <= $numRowsAll; $r++) {
                            /* end training */
                            $level_train = $data->sheets[0]['cells'][$r][8];
                            $school_train = $data->sheets[0]['cells'][$r][9];
                            $place_train = $data->sheets[0]['cells'][$r][10];
                            $skill_train = $data->sheets[0]['cells'][$r][11];
                            $start_date_train = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][$r][12]));
                            //check empty date
                            if ($start_date_train >= date('Y-m-d')) {
                                $start_date_train = null;
                            } else if ($start_date_train <= date('Y-m-d')) {
                                $start_date_train;
                            }
                            $stop_date_train = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][$r][13]));
                            //check empty date
                            if ($stop_date_train >= date('Y-m-d')) {
                                $stop_date_train = null;
                            } else if ($stop_date_train <= date('Y-m-d')) {
                                $stop_date_train;
                            }
                            $type_train = $data->sheets[0]['cells'][$r][14];
                            $subject_course = $data->sheets[0]['cells'][$r][15];
                            if (str_replace(" ", "", $level_train) != null || str_replace(" ", "", $school_train) != null || str_replace(" ", "", $place_train) != null || str_replace(" ", "", $skill_train) != null || str_replace(" ", "", $subject_course) != null) {
                                $data_training = array(
                                    'id' => $id,
                                    'start_date_train' => $start_date_train,
                                    'stop_date_train' => $stop_date_train,
                                    'place_train' => $place_train,
                                    'level_train' => $level_train,
                                    'type_train' => $type_train,
                                    'subject_course' => $subject_course,
                                    'school_train' => $school_train,
                                    'skill_train' => $skill_train
                                );
                                insert('training', $data_training);
                            }
                        }

                        /* insert workHistory */
                        for ($r = 34; $r <= $numRowsAll; $r++) {
                            $history_date_start = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][$r][16]));
                            //check empty date
                            if ($history_date_start >= date('Y-m-d')) {
                                $history_date_start = null;
                            } else if ($history_date_start <= date('Y-m-d')) {
                                $history_date_start;
                            }
                            $history_date_stop = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][$r][17]));
                            //check empty date
                            if ($history_date_stop >= date('Y-m-d')) {
                                $history_date_stop = null;
                            } else if ($history_date_stop <= date('Y-m-d')) {
                                $history_date_stop;
                            }
                            $history_institution = $data->sheets[0]['cells'][$r][18];
                            $history_office = $data->sheets[0]['cells'][$r][19];
                            $history_department = $data->sheets[0]['cells'][$r][20];
                            $history_position = $data->sheets[0]['cells'][$r][21];
                            if (str_replace(" ", "", $history_institution) != null || str_replace(" ", "", $history_office) != null || str_replace(" ", "", $history_department) != null || str_replace(" ", "", $history_position) != null) {
                                $data_workhistory = array(
                                    'id' => $id,
                                    'start_date' => $history_date_start,
                                    'stop_date' => $history_date_stop,
                                    'institution' => $history_institution,
                                    'department' => $history_department,
                                    'office' => $history_office,
                                    'position' => $history_position
                                );
                                insert('workhistory', $data_workhistory);
                            }
                        }

                        /* insert language */
                        for ($r = 34; $r <= $numRowsAll; $r++) {
                            $language = $data->sheets[0]['cells'][$r][22];
                            $read = $data->sheets[0]['cells'][$r][23];
                            $conversation = $data->sheets[0]['cells'][$r][24];
                            $write = $data->sheets[0]['cells'][$r][25];
                            if (str_replace(" ", "", $language) != null || str_replace(" ", "", $read) != null || str_replace(" ", "", $conversation) != null || str_replace(" ", "", $write) != null) {
                                $data_language = array(
                                    'id' => $id,
                                    'language' => $language,
                                    'read' => $read,
                                    'conversation' => $conversation,
                                    'write' => $write
                                );
                                insert('language', $data_language);
                            }
                        }

                        /* insert medal */
                        for ($r = 34; $r <= $numRowsAll; $r++) {
                            /* medal */
                            $medal_type = $data->sheets[0]['cells'][$r][26];
                            $class = $data->sheets[0]['cells'][$r][27];
                            $get_date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][$r][28]));
                            //check empty date
                            if ($get_date >= date('Y-m-d')) {
                                $get_date = null;
                            } else if ($get_date <= date('Y-m-d')) {
                                $get_date;
                            }
                            if (str_replace(" ", "", $medal_type) != null || str_replace(" ", "", $class) != null) {
                                $data_medal = array(
                                    'id' => $id,
                                    'medal_type' => $medal_type,
                                    'class' => $class,
                                    'get_date' => $get_date
                                );
                                insert('medal', $data_medal);
                            }
                        }
                        /* insert to table children */
                        for ($r = 34; $r <= $numRowsAll; $r++) {
                            $childName = $data->sheets[0]['cells'][$r][29];
                            $child_gender = $data->sheets[0]['cells'][$r][30];
                            $child_dateOfBirth = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($data->sheets[0]['cells'][$r][31]));
                            //check empty date
                            if ($child_dateOfBirth >= date('Y-m-d')) {
                                $child_dateOfBirth = null;
                            } else if ($child_dateOfBirth <= date('Y-m-d')) {
                                $child_dateOfBirth;
                            }
                            $child_placeOfBirth = $data->sheets[0]['cells'][$r][32];
                            $child_job = $data->sheets[0]['cells'][$r][33];
                            if (str_replace(" ", "", $childName) != null || str_replace(" ", "", $child_gender) != null || str_replace(" ", "", $child_job) != null) {
                                $data_children = array(
                                    'id' => $id,
                                    'childname' => $childName,
                                    'gender_child' => $child_gender,
                                    'dateofbirth_child' => $child_dateOfBirth,
                                    'date_start_child' => $date_start_child,
                                    'date_stop_child' => $date_stop_child,
                                    'child_job' => $child_job,
                                    'child_placeOfBirth' => $child_placeOfBirth
                                );
                                insert('children', $data_children);
                            }
                        }
                        /* end insert */
                    }
                    /* end check condition */
                }
            }/* end loop file */

            if ($nationality_id == $nationalityID) {
                echo 'ទិន្នន័យបានបញ្ចូលរួចម្តងហើយ';
            } else {
                echo 'ទិន្នន័យបញ្ចូលពី Excel រួចរាល់!'; // for message alert
            }
        }
    }

    /* end function */
}
