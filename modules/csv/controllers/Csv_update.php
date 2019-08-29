<?php


/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */

/**

 * Description of csv_update

 *

 * @author JC

 */


class csv_update extends Admin_Controller

{

    public function __construct()
    {
       parent::__construct();
        //        session_start();

        unset($_SESSION['path_file']);
        $_SESSION['path_file'] = 'reference-file';
    }


    public function csv_terminate()
    {

        $this->load->view('header');
        $this->load->view('csv_update/frm_terminate');
        $this->load->view('footer');

    }

    public function  internship_info()
    {
        $this->load->view('header');
        $this->load->view('csv_update/internship_info');
        $this->load->view('footer');
    }



    public function csv_promoted_former_work()
    {

        $this->load->view('header');
        $this->load->view('csv_update/csv_promoted_former_work');
        $this->load->view('footer');

    }

    public function csv_transfer_job()
    {

        $this->load->view('header');
        $this->load->view('csv_update/csv_transfer_job');
        $this->load->view('footer');

    }

    public function csv_maternity_leave()
    {

        $this->load->view('header');
        $this->load->view('csv_update/csv_maternity_leave');
        $this->load->view('footer');

    }


    public function csv_units_dignitaries()
    {
        $this->load->view('header');
        $this->load->view('csv_update/csv_units_dignitaries');
        $this->load->view('footer');
    }

    public function list_promoted_csv()
    {
        $this->load->view('header');
        $this->load->view('csv/csv_update/csv_promoted');
        $this->load->view('footer');

    }


    public function csv_promoted_certificated()

    {
        $this->load->view('header');
        $this->load->view('csv_update/csv_promotedBy_certificated');
        $this->load->view('footer');
    }

    public function csv_permission_holiday()
    {
        $this->load->view('header');
        $this->load->view('csv/csv_update/csv_permission_holiday');
        $this->load->view('footer');

    }

    function get_csv()
    {

        $sql = "SELECT
                	cs.id,
                	cs.civil_servant_id,
                	cs.firstname,
                	cs.lastname,
                	cs.gender
        FROM 

        civilservant AS cs

        LEFT JOIN `work` AS w ON cs.id = w.id

        WHERE

            1 = 1  ORDER BY CASE WHEN cs.common_official_code IN ('0','') THEN 0 ELSE 1 END DESC,cs.common_official_code IS NULL, cs.common_official_code ASC ";

        $query = $this->db->query($sql);

        $datajs = [];

        foreach ($query->result() as $row) {

            $datajs[] = ['id' => $row->civil_servant_id, 'name' => $row->lastname . ' ' . $row->firstname, 'idtable' => $row->id];

        }

        //$data['datajs'] = implode(',', $datajs);

        header('Content-Type: application/json');

        echo json_encode(array(

            "status" => true,

            "error" => null,

            "data" => array(

                "officer" => $datajs
            )

        ));

    }



    function get_csv_detail()
    {
        $getstr = $this->input->get('value');
        $arr = explode('-', $getstr);
        $id = $arr[0];
        $name = $arr[1];
        $idrow = $this->input->get('id');

        $sql = "SELECT
                	cs.id,
                	cs.civil_servant_id,
                	cs.firstname,
                	cs.lastname,
                	cs.gender,
                	DATE_FORMAT(cs.dateofbirth,'%d-%m-%Y') AS dateofbirth,
                	cs.mobile_phone,
                	cs.unit_official_code,
                              CASE WHEN cs.common_official_code IN ('0','',NULL) THEN 0 END as unit_official_code,
                	w.current_role,
                    w.current_role_id,
                	w.unit,
                	u.unit AS unit_name,
                    w.promote_date,

                	IF(o.office IS NULL ,'',o.office ) as office,

                    IF(pro_o.office IS NULL ,'',pro_o.office ) as province_office,
                	w.general_department,
                	w.department,
                	w.land_official,
                	w.work_office,
                	cr.current_role_in_khmer,
                	w.work_location,
                	w.date_in,
                	w.date_out,
                    w.id as work_id,
                    w.province_office,
                    IF( lofc.land_official IS NULL,'',lofc.land_official) as landofficail 

            FROM

                civilservant AS cs

            LEFT JOIN `work` AS w ON cs.id = w.id

            LEFT JOIN offices AS o ON o.id = w.work_office

            LEFT JOIN province_office AS pro_o ON pro_o.id = w.province_office

            LEFT JOIN unit AS u ON u.id = w.unit

            LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id

            LEFT JOIN land_officials as lofc ON lofc.id = w.land_official

            LEFT JOIN salary as sl ON cs.id = sl.id

            WHERE

                1 = 1 AND cs.id ={$idrow} OR  CONCAT(cs.lastname ,' ', cs.firstname) LIKE '%{$name}%'";

        $record = $this->db->query($sql)->row();

        if ($record) {

            if ($record->general_department != '' || $record->general_department != null || $record->general_department != 0) {

                $general_depar = $this->db->query("SELECT general_deps_name FROM general_departments WHERE general_dep_id = {$record->general_department}")->row();

            } else {

                $general_depar = null;

            }


            if ($record->department != '' || $record->department != null || $record->department != 0) {

                $department = $this->db->query("SELECT d_name FROM tbl_departments WHERE d_id ={$record->department}")->row();

            } else {

                $department = null;

            }

            $data['csv_record'] = array(

                'work_id' => $record->work_id,

                'rec_id' => $record->id,

                'csv_id' => $record->civil_servant_id,

                'csv_name' => $record->lastname . ' ' . $record->firstname,

                'csv_dob' => $record->dateofbirth,

                'csv_position' => $record->current_role_in_khmer,

                'csv_department' => $record->unit_name,

                'csv_date_in' => date('d-m-Y', strtotime($record->date_in)),

                'csv_mobile_phone' => $record->mobile_phone,

                'csv_promote_date' => date('d-m-Y', strtotime($record->promote_date)),    

                // 'csv_general_deps_name' => is_null($general_depar) ? '' : $general_depar->general_deps_name,


                // 'csv_department_name' => is_null($department) ? '' :asset($department->d_name)?'':$department->d_name,

                'csv_department_id' => $record->department,

                'csv_general_deps_id' => $record->general_department,

                'csv_office_id' => $record->work_office,

                'csv_land_office_id' => $record->land_official,
                'csv_province_id' => $record->province_office,

                'csv_unit_id' => $record->unit,

            );

            $query_w = query("SELECT w.*,gd.general_deps_name,o.office,dp.d_name,cr.current_role_in_khmer FROM work AS w

                                    LEFT JOIN general_departments as gd ON gd.general_dep_id= w.general_department

                                    LEFT JOIN offices as o ON o.id= w.work_office
                                    LEFT JOIN tbl_departments as dp on dp.d_id= w.department
                                    LEFT JOIN currentrole as cr on cr.id= w.current_role_id
                                    WHERE w.id = '{$record->id}' ");

            $row_w = $query_w->row();

            $data['row_w'] = $row_w;

            $this->load->view('header');

            if ($this->input->get('frm') == 'transfer') {

                // get current rule

                $this->db->select('*');

                $this->db->from('currentrole');

                $this->db->where('status', 1);

                $data['currentrole_rows'] = $this->db->get()->result();

                $this->load->view('csv_update/csv_transfer_job', $data);

            } elseif ($this->input->get('frm') == 'terminate') {

                $this->load->view('csv_update/frm_terminate', $data);

            } elseif ($this->input->get('frm') == 'matemity') {

                $this->load->view('csv_update/csv_maternity_leave', $data);

            } elseif ($this->input->get('frm') == 'dignitaries') {

                $qr = query("SELECT * FROM `tbl_medal`");

                $res = $qr->result();

                $data['row'] = $res;

                $this->load->view('csv_update/csv_units_dignitaries', $data);

            } elseif ($this->input->get('frm') == 'certificated') {

                $query_s = query("SELECT * FROM salary AS s WHERE s.id = '{$record->id}' ");

                $data['result'] = $query_s->row();

                $this->load->view('csv_update/csv_promotedBy_certificated', $data);

            }elseif ($this->input->get('frm') == 'former_work') {

                $query_s = query("SELECT * FROM salary AS s WHERE s.id = '{$record->id}' ");

                $data['result'] = $query_s->row();

                $this->load->view('csv_update/csv_promoted_former_work', $data);

            }elseif ($this->input->get('frm') == 'permission_holiday') {

                $this->load->view('csv_update/csv_permission_holiday', $data);

            }elseif ($this->input->get('frm') == 'internship') {

                $this->load->view('internship_info/index', $data);

            }

            $this->load->view('footer');

        } else {

            $this->load->view('header');

            $this->load->view('csv_update/empty_csv');

            $this->load->view('footer');

        }


    }

    public function get_promoted_csv()
    {
        // var ===============

        $offset = $this->input->post('offset');
        $limit = $this->input->post('limit');
        $search = trim($this->input->post('search'));
        $year = $this->input->post('year');

        // $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));
        // by role =============
        //        $pr_code = $this->session->userdata('pr_code');
        //        $sWhere = "";
        //        if ($pr_code == "") {
        //            $sWhere .= "1=1 ";
        //        } else {
        //            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";

        //        }


        $where = " ";

        if ($search != '') {

            $where .= "AND (civil_servant_id LIKE '%{$search}%' ";

            $where .= "OR firstname LIKE '%{$search}%' ";

            $where .= "OR lastname LIKE '%{$search}%' ";

            // $where .= "OR gender LIKE '%{$search}%' ";

            $where .= "OR english_full_name LIKE '%{$search}%' ) ";

            // $where .= "OR mobile_phone LIKE '%{$search}%' ";

            if ($year != 0) {

                $where .= " AND datepromoted LIKE  '{$year}%' ";

            } else {

                $where .= "  ";

            }

        } elseif ($year != 0) {

            $where .= " AND datepromoted LIKE  '{$year}%' ";

        } elseif ($year == 0) {

            $where = " ";
        }

        // cnt. ==============

        $q = query("SELECT COUNT(*) as c FROM v_getpromote_date 

                                WHERE    1=1  {$where} ");

        $total_record = $q->row()->c - 0;

        $total_page = ceil($total_record / $limit);
        // qr. ==============

        $qr = query("SELECT vg.*,(SELECT TYPE FROM list_salary e1 WHERE e1.id < e.id ORDER BY id DESC LIMIT 1 OFFSET 0) AS prev_value FROM v_getpromote_date vg JOIN list_salary e ON vg.`levelsalary` = e.`type` WHERE  1 = 1 {$where}

                                ORDER BY
                                        CASE
                                WHEN common_official_code IN ('', '0') THEN

                                        1    ELSE    0    END,

                                 common_official_code ASC

                                LIMIT {$offset}, {$limit}  ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        $arr = array('total_page' => $total_page, 'res' => $res, 'total_record' => $total_record);

        echo json_encode($arr);

    }



    public function action_excel()
    {
        $this->load->library('excel');

        $year = $this->input->get('year');

        $sql_str = "SELECT vg.*,(SELECT TYPE FROM list_salary e1 WHERE e1.id < e.id ORDER BY id DESC LIMIT 1 OFFSET 0) AS prev_value FROM v_getpromote_date vg JOIN list_salary e ON vg.`levelsalary` = e.`type` WHERE  1 = 1 AND datepromoted LIKE  '{$year}%'

                                ORDER BY
                                        CASE

                                WHEN common_official_code IN ('', '0') THEN

                                        1   ELSE    0    END,

                                 common_official_code ASC";
        $list_csv = $this->db->query($sql_str);

        $object = new PHPExcel();

        //$objReader = PHPExcel_IOFactory::createReader('Excel2007');

        //$objReader->setReadDataOnly(true);

        $object->setActiveSheetIndex(0);

        $table_columns = ['ល.រ', 'អត្តលេខមន្ត្រី', 'នាម និងគោត្តនាម', 'ភេទ', 'មុខតំណែង', 'ថ្ងៃ​ ខែ ឆ្នាំ កំណើត', 'ថ្ងៃ​ខែឆ្នាំ ដំឡើងថ្នាក់ ឋានន្តរស័ក្តិចុងក្រោយ', 'ក្របខណ្ឌបច្ចុប្បន្ន', 'ក្របខណ្ឌស្នើសុំ', 'លេខព្រះរាជក្រឹត្យ អនុក្រឹត នៃដំឡើងថ្នាក់​ ឋានន្តរស័ក្តិ ចុងក្រោយ'];

        $column = 0;

        //$table_columns = ['eee','ffgggg','ddfdfd','fsdfadf','gfghfgg','frrtrter','uuuiuyj','tyrtyrt','gdfdfgf'];

        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;
        }


        foreach (range('A', 'J') as $indexColumn) {

            $object->getActiveSheet()->getColumnDimension($indexColumn)->setAutoSize(true);
        }

        $object->getActiveSheet()->getStyle('A1:J1')->getFont()->setBold(true);

        $object->getActiveSheet()->getStyle('A1:J1')->applyFromArray(

            array('fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'CCCCCC'))

            ,));

        $excel_row = 2;

        $i = 0;

        foreach ($list_csv->result() as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, ++$i);

            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->civil_servant_id);

            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->lastname . ' ' . $row->firstname);

            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->gender);

            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->current_role_in_khmer);

            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, date('d-m-Y', strtotime($row->dateofbirth)));

            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, date('d-m-Y', strtotime($row->datepromoted)));

            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->levelsalary);

            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->prev_value);

            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->reference_promote);

            $excel_row++;

        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');

        header("Content-Type:  application/vnd.ms-excel; charset=utf-8");

        //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        $filename = strtotime(date('Y-m-d'));

        header("Content-Disposition: attachment; filename='CSV_List_Promote_{$filename}-{$year}.xlsx'");

        header('Cache-Control: max-age=0');

        $object_writer->save('php://output');

        exit();
    }


    public function save_internship_info()
    {
        $data = array(
            'last_name' => $this->input->post('last_name'),

            'first_name' => $this->input->post('first_name'),

            'intern_id' => $this->input->post('no_code'),

            'english_full_name' => $this->input->post('english_full_name'), 

            'gender' => $this->input->post('gender'),

            'date_of_birth' => date('Y-m-d', strtotime($this->input->post('date_of_birth'))),

            'place_of_birth' => $this->input->post('place_of_birth'),

            'address' => $this->input->post('address'),

            'phone' => $this->input->post('phone_number'),

            'email' => $this->input->post('email'),

            'major' => $this->input->post('major'),

            'school' => $this->input->post('school'),

            'work_as' => $this->input->post('work_as'),

            'photo' => $this->input->post('photo'),

            'intern_cv' => serialize($this->input->post('intern_cv')),
                
        );

        $this->db->insert('internship', $data);

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode(['status' => 'success']);


    }


    public function save_csv_teminate()
    {
        $check_csv = $this->db->query('SELECT * FROM tbl_csvupdate WHERE csv_id =' . $this->input->post('csv_id') . ' AND is_type ="terminated"');

        if ($check_csv->num_rows() > 0) {

            header('Content-Type: application/json; charset=utf-8');

            echo json_encode(['status' => 'token']);

            exit();

        }

        if ($this->input->post('dateinput') != '') {

            $data = ['csv_id' => $this->input->post('csv_id'),

                'work_id' => $this->input->post('csv_work_id'),

                'on_date' => date('Y-m-d', strtotime($this->input->post('dateinput'))),

                'remark' => $this->input->post('remark'),
                'attach_file' => serialize($this->input->post('reference_file')),

                'is_type' => 'terminated'];
            $this->db->insert('tbl_csvupdate', $data);

            header('Content-Type: application/json; charset=utf-8');

            echo json_encode(['status' => 'success']);

        } else {

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(['status' => 'error']);

        }

    }

    public function save_maternity_leave()
    {
        $data = array(
            'csv_id' => $this->input->post('csv_id'),

            'work_id' => $this->input->post('csv_work_id'),

            'on_date' => date('Y-m-d', strtotime($this->input->post('firstDate'))),

            'end_date' => date('Y-m-d', strtotime($this->input->post('secondDate'))),

            'issue_date' => date('Y-m-d', strtotime($this->input->post('issueDate'))),

            'remark' => $this->input->post('reMark'),

            'attach_file' => serialize($this->input->post('tags')),

            'referencse_no' => $this->input->post('txtnu_of_reference'),

            'is_type' => 'Maternity leave'

        );

        $this->db->insert('tbl_csvupdate', $data);

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode(['status' => 'success']);



    }

    public function promoted_former_work()
    {
        $csv_id = $this->input->post('csv_id');

        $csv_work_id = $this->input->post('csv_work_id');
        $salary_level = $this->input->post('salary_level');

        $index_multiply = $this->input->post('index_multiply');

        $index_salary = $this->input->post('index_salary');

        $pure_salary = $this->input->post('pure_salary');

        $txtdate = date('Y-m-d', strtotime($this->input->post('txtdate')));

        $tags = serialize($this->input->post('tags'));

        $txtNum = $this->input->post('txtNum');

        $remark = $this->input->post('remark');

        $data_salary = array(

            'salary_level' => $salary_level,

            'index_salary' => $index_salary,

            'index_multiply' => $index_multiply,

            'pure_salary' => $pure_salary
        );
        
        query(" INSERT INTO salary_history (  `id` , `salary_level`, `index_multiply`,`index_salary`,
        `pure_salary`,`title_yearly`,`less_than_child15`,`more_than_child15`,`family_assistant`,`additional_salary`,`assistant_evidence`,`adviser_evidence`,`additional_expire`,`remind_salary`,`total`,`exchange`,`total_in_dollar`)

            SELECT      `id` , `salary_level`, `index_multiply`,`index_salary`,
                    `pure_salary`,`title_yearly`,`less_than_child15`,`more_than_child15`,`family_assistant`,`additional_salary`,`assistant_evidence`,`adviser_evidence`,`additional_expire`,`remind_salary`,`total`,`exchange`,`total_in_dollar`
            FROM 
            salary AS s

            WHERE s.id = '{$csv_id}' ");

        update('salary', $data_salary, array('id' => $csv_id));

        $data = array(
            'csv_id' => $csv_id,
            'work_id' => $csv_work_id,
            'on_date' => $txtdate,
            'referencse_no' => $txtNum,
            'remark' => $remark,
            'attach_file' => $tags,
            'is_type' => 'Officers were promoted by former work'

        );

        $this->db->insert('tbl_csvupdate', $data);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['status' => 'success']);

    }

    public function update_promote_csv()
    {

        $get_checkVals = $this->input->post('checkedVals');

        foreach ($get_checkVals as $key => $value) {

            $sql = "SELECT vg.*,(SELECT TYPE FROM list_salary e1 WHERE e1.id < e.id ORDER BY id DESC LIMIT 1 OFFSET 0) AS prev_value FROM v_getpromote_date vg JOIN list_salary e ON vg.`levelsalary` = e.`type` WHERE  1 = 1 AND vg.id = {$value}";

            $record = $this->db->query($sql)->row();
            $prev_value = $record->prev_value;

            $l = "SELECT multiple, multiple_money FROM list_salary WHERE type = '{$prev_value}'";

            $re = $this->db->query($l)->row();

            $lm = $re->multiple;

            $lmm = $re->multiple_money;

            $resm = $lm * $lmm;

            $txtdate = date('Y-m-d', strtotime($this->input->post('txtdate')));

            $txtNum = $this->input->post('txtNum');

            $remark = $this->input->post('remark');

            $reference_file = serialize($this->input->post('tags'));

            $m = "UPDATE work SET `reference_promote` = '{$txtNum}', `date_late_promote` = '{$txtdate}', `reference_file` = '{$reference_file}', `remark` = '{$remark}' WHERE `work`.`id` = {$value}";

            $p = "UPDATE salary SET `index_multiply` = '{$lm}', `index_salary` = '{$lmm}', `pure_salary` = '{$resm}', `salary_level` = '{$prev_value}' WHERE `salary`.`id` = {$value}";

            $this->db->query($m);

            $this->db->query($p);

        }

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode(['status' => 'success']);
    }


    public function transfer_job()
    {

        $current_role = $this->input->post('current_role_id');

        $unit_code = $this->input->post('unit');

        $general_dep_name = $this->input->post('general_dep_id');

        $d_name = $this->input->post('d_id');

         $work_office = $this->input->post('work_office');

         $province_office = $this->input->post('province_office');

        $land_officail = $this->input->post('land_official');

        $promote_date = date('Y-m-d', strtotime($this->input->post('promote_date')));

        $note = $this->input->post('note');

        //$reference_file = serialize($this->input->post('transfer_file'));

        $reference_file_in = $this->input->post('send');

        $reference_promote = $this->input->post('attachment');
        $id = $this->input->post('csv_id');

         $query= $this->db->query("select unit from unit where id=". ($this->input->post('old_unit')));

         foreach ($query->result() as $res ){

             $old_unit=$res->unit_english; 

             //$old_unit=$res->unit; 

         }

        $old_work = $this->input->post('old_work');

         $old_position = $this->input->post('old_position');

         $old_general_dep = $this->input->post('old_general_dep');

         $old_department = $this->input->post('old_department');

         $old_office = $this->input->post('old_office');

         $old_land_office = $this->input->post('old_land_office');

         $old_province_office = $this->input->post('old_province_office');

         $old_date_in =date('Y-m-d', strtotime( $this->input->post('old_date_in')));
       
         $m = "INSERT INTO workhistory(id,start_date,stop_date,institution,department,office,position) VALUES ( $id,'$old_date_in','$promote_date','MLMUPC','$old_unit','$old_department','$old_position'); ";
         $this->db->query($m);  

        $data_work = array('promote_date' => $promote_date,

            'unit' => $unit_code,

            'work_office' => $work_office,

            'province_office' => $province_office,

            'note' => $note,

            'general_department' => $general_dep_name,

            'department' => $d_name,
            'land_official' => $land_officail,

            'current_role_id' => $current_role,

            'reference_promote' => $reference_promote,

            'reference_file_in' => $reference_file_in,

            'is_transfer' => 'transfered'
        );

        update('work', $data_work, array('id' => $id));
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode(['status' => 'success']);

    }



    public function save_del_meternity()
    {
        $id = $this->input->post('csv_id');

        //        print_r($id);

        if ($id > 0) {

            $data = ['csv_id' => $this->input->post('csv_id'),

                'work_id' => $this->input->post('csv_work_id'),

                'on_date' => date('Y-m-d', strtotime($this->input->post('txtDate'))),

                'remark' => $this->input->post('remark'),

                'attach_file' => serialize($this->input->post('tags')),

                'referencse_no' => $this->input->post('txtnu_of_reference'),

                'is_type' => $this->input->post('cbo')];

            $this->db->insert('tbl_csvupdate', $data);

        //                 = query("DELETE FROM `civilservant` WHERE `civilservant.id` = '{$id}' ");


            $query = query("SELECT   *    FROM      civilservant AS cs  WHERE    cs.id  = '{$id}' ")->row();

            /// rathana
            query( " INSERT INTO civilservant_deleted

                SELECT * FROM civilservant

                WHERE civilservant.id = '{$id}' ");

            /////

            query("INSERT INTO activity_log(user_name,full_name,idtemp,action) VALUES ('" . $this->session->userdata('user_name') . "', '" . $this->session->userdata('full_name') . "', '" . $query->lastname . " " . $query->firstname . "', 'Deleted') ");

            
            query("DELETE    FROM    civilservant   WHERE civilservant.id = '{$id}' ");


            header('Content-Type: application/json; charset=utf-8');

            echo json_encode(['status' => 'success']);

        } else {

            header('Content-Type: application/json; charset=utf-8');

            echo json_encode(['status' => 'error']);
        }

    }


    public function delete_csv_transfer_out()
    {

        $id = $this->input->post('csv_id');

        if ($id > 0) {

            $data = [

                'csv_id' => $this->input->post('csv_id'),

                'work_id' => $this->input->post('csv_work_id'),

                'referencse_no' => $this->input->post('txtnu_of_reference'),

                'transfer_job_out' => $this->input->post('txttransferto'),

                'on_date' => date('Y-m-d', strtotime($this->input->post('dateinput'))),

                'remark' => $this->input->post('remark'),

                'attach_file' => serialize($this->input->post('outreference_file')),

                'is_type' => 'transfer_out'];

            $this->db->insert('tbl_csvupdate', $data);

            $query = query("SELECT
                                     *
                                        FROM
                                                civilservant AS cs
                                        WHERE

                                                cs.id  = '{$id}' ")->row();

        /*  copy all data from civilservant to civilservant_delete */   

                query( " INSERT INTO civilservant_deleted

                SELECT * FROM civilservant

                WHERE civilservant.id = '{$id}' ");

        //                                        

            query("INSERT INTO activity_log(user_name,full_name,idtemp,action) VALUES ('" . $this->session->userdata('user_name') . "', '" . $this->session->userdata('full_name') . "', '" . $query->lastname . " " . $query->firstname . "', 'Deleted') ");

         
            query("  DELETE

                        FROM
                                civilservant
                        WHERE
                                civilservant.id = '{$id}' ");

            header('Content-Type: application/json; charset=utf-8');

            echo json_encode(['status' => 'success']);

        } else {

            header('Content-Type: application/json; charset=utf-8');

            echo json_encode(['status' => 'error']);

        }

    }


    public function save_dignitaries()

    {

        $data = array(

            'csv_id' => $this->input->post('csv_id'),

            'work_id' => $this->input->post('csv_work_id'),

            'on_date' => date('Y-m-d', strtotime($this->input->post('txtdate'))),

            'referencse_no' => $this->input->post('txtNum'),

            'remark' => $this->input->post('remark'),

            'attach_file' => serialize($this->input->post('tags')),

            'medal_type' => $this->input->post('selected1'),

            'medal' => $this->input->post('selected'),

            'is_type' => 'Officers were awarded'

        );

        //$this->db->insert('tbl_csvupdate', $data);



        // $medal_id = $this->input->post('medal_id');

            //$medal_type = $this->input->post('medal_type');

            

            $get_date = date('Y-m-d', strtotime($this->input->post('txtdate')));

            $medal_type = $this->input->post('selected1');

            $medal= $this->input->post('selected');

            $data_medal = array('id' => $this->input->post('csv_id'), 'medal_type' => $medal_type, 'class' => $medal, 'get_date' => $get_date);

            $this->db->insert('medal', $data_medal);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['status' => 'success']);

    }


    public function get_dignitaries()
    {

        $select = $this->input->post('select');

        $qr = query("SELECT * FROM `tbl_medal` where `tbl_medal`.`parent` = '{$select}'");

        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($res);
    }


    public function level_salary()
    {
        $qr = query("SELECT DISTINCT
                                        l.type,
                                        l.multiple,
                                        l.multiple_money
                        FROM
                                        list_salary AS l");
        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }

    public function index_miltiple_salary()
    {

        $salary_level = $this->input->post('salary_level');

        //         $salary_level = $form->getValue('salary_level');

        $qr = query("SELECT DISTINCT
                            l.type,

                            l.multiple,

                            l.multiple_money

                    FROM
                            list_salary AS l
                    WHERE l.type = '{$salary_level}'");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);
    }

    public function promoted_certificate()
    {

        $csv_id = $this->input->post('csv_id');

        $csv_work_id = $this->input->post('csv_work_id');
        $salary_level = $this->input->post('salary_level');

        $index_multiply = $this->input->post('index_multiply');

        $index_salary = $this->input->post('index_salary');

        $pure_salary = $this->input->post('pure_salary');

        $txtdate = date('Y-m-d', strtotime($this->input->post('txtdate')));

        $tags = serialize($this->input->post('tags'));

        $txtNum = $this->input->post('txtNum');

        $remark = $this->input->post('remark');

        $data_salary = array(

            'salary_level' => $salary_level,

            'index_salary' => $index_salary,

            'index_multiply' => $index_multiply,

            'pure_salary' => $pure_salary
        );

        update('salary', $data_salary, array('id' => $csv_id));

        $data = array(
            'csv_id' => $csv_id,
            'work_id' => $csv_work_id,
            'on_date' => $txtdate,
            'referencse_no' => $txtNum,
            'remark' => $remark,
            'attach_file' => $tags,
            'is_type' => 'Officers were promoted by certificate'

        );

        $this->db->insert('tbl_csvupdate', $data);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['status' => 'success']);

    }

    public function save_csv_permission_holiday()
    {
        $check_csv = $this->db->query('  SELECT * FROM tbl_csvupdate 
                        WHERE csv_id =' . $this->input->post('csv_id') . 
                        ' AND on_date =' . date('Y-m-d', strtotime($this->input->post('dateinput'))).
                        ' AND is_type ="permission holiday"'
        );

        if ($check_csv->num_rows() > 0) {

            header('Content-Type: application/json; charset=utf-8');

            echo json_encode(['status' => 'token']);

            exit();

        }

        if ($this->input->post('dateinput') != '') {

            $data = ['csv_id' => $this->input->post('csv_id'),

                'work_id' => $this->input->post('csv_work_id'),

                'on_date' => date('Y-m-d', strtotime($this->input->post('dateinput'))),
                'end_date' => date('Y-m-d', strtotime($this->input->post('dateinputend'))),
                'referencse_no' =>$this->input->post('reason'),
                'remark' => $this->input->post('remark'),

                'attach_file' => serialize($this->input->post('reference_file')),

                'is_type' => 'permission holiday'];
            $this->db->insert('tbl_csvupdate', $data);

            header('Content-Type: application/json; charset=utf-8');

            echo json_encode(['status' => 'success']);

        } else {

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(['status' => 'error']);

        }
    }


}



