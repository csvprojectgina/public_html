<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Csv_info extends Admin_Controller {



    public function __construct() {



        parent::__construct();

        //session_start();

        unset($_SESSION['path_file']);

    }



    // index ===============

    public function index() {

        $this->load->view('header');

//        $this->load->view('csv/csv_info/index');

        $this->load->view('csv/csv_info/index_2');

        $this->load->view('footer');

    }



    // index ===============

    public function retires() {

        $this->load->view('header');

        $this->load->view('csv/retires/index');

        $this->load->view('footer');

    }



    // form iphone ===============

    public function iphone() {

        // get data from unit

        $this->load->view('header');

        // $this->load->view('csv/csv_info/iphone');

        $this->load->view('csv/csv_info/iphone');

        $this->load->view('footer');

    }



    // form iphone ===============

    public function iphone_1() {

        // get data from unit

        $this->load->view('header');

//        $this->load->view('csv/csv_info/iphone_1');

        $this->load->view('csv/csv_info/iphone_2');

        $this->load->view('footer');

    }



    // index ក្រប�?ណ្ឌក ===============

    public function index_k1() {

        $this->load->view('header');

        $this->load->view('csv/csv_info/index_k1');

        $this->load->view('footer');

    }



    // index ក្រប�?ណ្ឌ�?===============

    public function index_k2() {

        $this->load->view('header');

        $this->load->view('csv/csv_info/index_k2');

        $this->load->view('footer');

    }



    // index ក្រប�?ណ្ឌគ===============

    public function index_k3() {

        $this->load->view('header');

        $this->load->view('csv/csv_info/index_k3');

        $this->load->view('footer');

    }



    // index ក្រប�?ណ្ឌគ===============

    public function formdelete() {

        $this->load->view('header');

        $this->load->view('csv/csv_info/delete_1');

        $this->load->view('footer');

    }



    // advanced search ========

    public function advanced_search() {

        $this->load->view('header');

        $this->load->view('csv/csv_info/advanced_search');

        $this->load->view('footer');

    }



    public function formretire() {

        $this->load->view('header');

        $this->load->view('csv/csv_info/formretire');

        $this->load->view('footer');

    }



    // form ===============

    public function form() {

        // get data from unit

        $query = query("SELECT * FROM unit  WHERE status='1' ");

        $row = $query->result();

        $data['unituery'] = $row;



        // get gender rom gender table======

        $this->db->select('*');

        $this->db->from('gender');

        $data['g_row'] = $this->db->get()->result();



        // get province======================

        $this->db->select('*');

        $this->db->from('province');

        $data['p_row'] = $this->db->get()->result();

        // get general department

        $this->db->select('*');

        $this->db->from('general_departments');

        $this->db->where('status', 1);

        $data['gd_rows'] = $this->db->get()->result();

        // get department

        $this->db->select('*');

        $this->db->from('tbl_departments');

        $this->db->where('status', 1);

        $data['dp_rows'] = $this->db->get()->result();

        // get offices

        $this->db->select('*');

        $this->db->from('offices');

        $this->db->where('status', 1);

        $data['office_rows'] = $this->db->get()->result();

        // get land official

        $this->db->select('*');

        $this->db->from('land_officials');

        $this->db->where('status', 1);

        $data['land_official_rows'] = $this->db->get()->result();

        // get current rule

        $this->db->select('*');

        $this->db->from('currentrole');

        $this->db->where('status', 1);

        $data['currentrole_rows'] = $this->db->get()->result();



        $this->load->view('header');

        $this->load->view('csv/csv_info/form', $data);

        $this->load->view('footer');

    }



    public function pdf() {





        define("UPLOAD_PAYH", "assets/csv/photos/");

        $dir = UPLOAD_PAYH;

        $files1 = scandir($dir);

        $listname = [];

        foreach ($files1 as $key => $value) {

  // echo ("boss".$value) ;

            $arr = explode('.', $value);

            $listname[] = $arr[0];

    if (isset($arr[0]) || $arr[0] !='' ) {

                $getname = $this->db->query('SELECT * FROM civilservant WHERE id ="' . $arr[0] . '" ')->row();

                $newname = @$getname->lastname . ' ' . @$getname->firstname;

                //header("Content-Type: text/html; charset=utf-8");

                //rename(UPLOAD_PAYH.$value,UPLOAD_PAYH.$newname.'.'.$arr[0]);

               // echo $newname;

//                echo '<ul>';

//                echo '<li><img src="' . base_url() . UPLOAD_PAYH . $value . '"  height="52" width="52"><label>' . $newname . '</label> <label>'.$value.'</label></li>';

//                echo '</ul>';

            }

        }



//        foreach ($listname as $key) {

//            $data = array(

//                 'reference_file' => $key.'.pdf');

//            update('civilservant', $data, array('id' => $key));

//        }

    $files11 = scandir($dir);

//        echo '<pre>';

//        print_r($files11);

//        print_r(implode(',', $listname));

//        echo '</pre>';

         $id = $this->input->post('id_pdf');

         $data['id'] = $id;

         $this->load->view('csv/csv_info/pdf', $data);

    }



    // delete ===============

    public function delete() {

        $id = $this->input->post('id');



        if ($id > 0) {

            $query = query("SELECT

                                                *

                                        FROM

                                                civilservant AS cs

                                        WHERE

                                                cs.id  = '{$id}' ")->row();

            query("INSERT INTO activity_log(user_name,full_name,idtemp,action) VALUES ('" . $this->session->userdata('user_name') . "', '" . $this->session->userdata('full_name') . "', '" . $query->lastname . " " . $query->firstname . "', 'Deleted') ");

        // rathana change
            query("INSERT INTO civilservant_deleted

                        SELECT * FROM civilservant As cs

                        WHERE   cs.id  = '{$id}' ");
        // end rathana change


            query("DELETE

                        FROM

                                civilservant

                        WHERE

                                civilservant.id = '{$id}' ");
            

        }

        redirect('csv/csv_info/index');

    }



    // delete degree ==========

    public function delete_degree() {

        $degree_ids = $this->input->post('degree_ids');

        query("DELETE

                        FROM

                                degree

                        WHERE

                                degree.degree_id = '{$degree_ids}' ");

    }



    // delete train ==========

    public function delete_train() {

        $train_ids = $this->input->post('train_ids');

        query("DELETE

                        FROM

                                training

                        WHERE

                                training.train_id = '{$train_ids}' ");

    }



    // delete language ==========

    public function delete_language() {

        $language_ids = $this->input->post('language_ids');

        query("DELETE

                        FROM

                                language

                        WHERE

                                language.language_id = '{$language_ids}' ");

    }



    // delete medal ==========

    public function delete_medal() {

        $medal_ids = $this->input->post('medal_ids');

        query("DELETE

                        FROM

                                medal

                        WHERE

                                medal.medal_id = '{$medal_ids}' ");

    }



    // delete absent ==========

    public function delete_absent() {

        $absentids = $this->input->post('absentids');

        query("DELETE

                        FROM

                                absent

                        WHERE

                                absent.absentid = '{$absentids}' ");

    }



    // delete workhistory ==========

    public function delete_workhistory() {

        $work_history_ids = $this->input->post('work_history_ids');

        query("DELETE

                        FROM

                                workhistory

                        WHERE

                                workhistory.work_history_id = '{$work_history_ids}' ");

    }



    // delete workbydegree ==========

    public function delete_workbydegree() {

        $wkd_ids = $this->input->post('wkd_ids');

        query("DELETE

                        FROM

                                workbydegree

                        WHERE

                                workbydegree.wkd_id = '{$wkd_ids}' ");

    }



    // delete workpromotionhistory ==========

    public function delete_workpromotionhistory() {

        $wkph_is_ids = $this->input->post('wkph_is_ids');

        query("DELETE

                        FROM

                                workpromotionhistory

                        WHERE

                                workpromotionhistory.wkph_is_id = '{$wkph_is_ids}' ");

    }



    // delete workclasspromotehistory ==========

    public function delete_workclasspromotehistory() {

        $wkh_is_ids = $this->input->post('wkh_is_ids');

        query("DELETE

                        FROM

                                workclasspromotehistory

                        WHERE

                                workclasspromotehistory.wkh_is_id = '{$wkh_is_ids}' ");

    }



    // delete worktransfer ==========

    public function delete_worktransfer() {

        $wkt_ids = $this->input->post('wkt_ids');

        query("DELETE

                        FROM

                                worktransfer

                        WHERE

                                worktransfer.wkt_id = '{$wkt_ids}' ");

    }



    // delete workframeworkout ==========

    public function delete_workframeworkout() {

        $wkfw_ids = $this->input->post('wkfw_ids');

        query("DELETE

                        FROM

                                workframeworkout

                        WHERE

                                workframeworkout.wkfw_id = '{$wkfw_ids}' ");

    }



    // delete worknamedeleting ==========

    public function delete_worknamedeleting() {

        $wknd_ids = $this->input->post('wknd_ids');

        query("DELETE

                        FROM

                                worknamedeleting

                        WHERE

                                worknamedeleting.wknd_id = '{$wknd_ids}' ");

    }



    // delete workfreesalary============

    public function delete_workfreesalary() {

        $wknd_ids = $this->input->post('wkf_salary_ids');

        query("DELETE

                        FROM

                                workfreesalary

                        WHERE

                                workfreesalary.wkf_salary_id = '{$wkf_salary_ids}' ");

    }



    // delete worktitlelevel========

    public function delete_worktitlelevel() {



        $wktl_ids = $this->input->post('wktl_ids');

        query("DELETE

                        FROM

                                worktitlelevel

                        WHERE

                                worktitlelevel.wktl_id = '{$wktl_ids}' ");

    }



    //    delete_children==========

    public function delete_children() {

        $child_ids = $this->input->post('child_ids');

        query("DELETE

                        FROM

                                children

                        WHERE

                                children.child_id = '{$child_ids}' ");

    }



    // gender ==========

    public function gender() {

        $qr = query("SELECT DISTINCTROW

                                        c.gender

                                FROM

                                        civilservant AS c

                                ORDER BY

                                        c.gender ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // ​auto com gender children ==========

    public function gender_children() {

        $qr = query("SELECT DISTINCTROW

                                        c.gender_child

                                FROM

                                        children AS c

                                ORDER BY

                                        c.gender_child ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // auto com current_role

    public function current_role() {

        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));

        $qr = query("SELECT DISTINCTROW

                                        w.current_role

                                FROM

                                        `work` AS w

                                WHERE

                                w.current_role LIKE '%{$q}%'

                                ORDER BY

                                        w.current_role ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // auto com current_role for_biology=========

    public function auto_current_role_for_biology() {

        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));

        $qr = query("SELECT DISTINCTROW

                                        w.current_role_for_biology

                                FROM

                                        `work` AS w

                                WHERE

                                w.current_role_for_biology LIKE '%{$q}%'

                                ORDER BY

                                        w.current_role_for_biology ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // auto com work_location=========

    public function auto_work_location() {

        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));

        $qr = query("SELECT DISTINCTROW

                                        w.work_location

                                FROM

                                        `work` AS w

                                WHERE

                                w.work_location LIKE '%{$q}%'

                                ORDER BY

                                        w.work_location ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // auto com type_of_framework=========

    public function auto_type_of_framework() {

        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));

        $qr = query("SELECT DISTINCTROW

                                        w.type_of_framework

                                FROM

                                        `work` AS w

                                WHERE

                                w.type_of_framework LIKE '%{$q}%'

                                ORDER BY

                                        w.type_of_framework ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // auto com unit=========

    public function auto_unit() {

        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));

        $qr = query("SELECT DISTINCTROW

                                        w.unit

                                FROM

                                        `work` AS w

                                WHERE

                                w.unit LIKE '%{$q}%'

                                ORDER BY

                                        w.unit ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // auto com auto_work_office=========

    public function auto_work_office() {

        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));

        $qr = query("SELECT DISTINCTROW

                                        w.work_office

                                FROM

                                        `work` AS w

                                WHERE

                                w.work_office LIKE '%{$q}%'

                                ORDER BY

                                        w.work_office ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // auto com auto_equal_class=========

    public function auto_equal_class() {

        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));

        $qr = query("SELECT DISTINCTROW

                                        w.equal_class

                                FROM

                                        `work` AS w

                                WHERE

                                w.equal_class LIKE '%{$q}%'

                                ORDER BY

                                        w.equal_class ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // auto com auto_second_role=========

    public function auto_second_role() {

        $q = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('q'))));

        $qr = query("SELECT DISTINCTROW

                                        w.second_role

                                FROM

                                        `work` AS w

                                WHERE

                                w.second_role LIKE '%{$q}%'

                                ORDER BY

                                        w.second_role ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // auto com nationality ==========

    public function nationality() {

        $qr = query("SELECT DISTINCTROW

                                        c.nationality

                                FROM

                                        civilservant AS c

                                ORDER BY

                                        c.nationality ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // auto com hus_or_wife ==========

    public function hus_or_wife() {

        $qr = query("SELECT DISTINCTROW

                                        c.hus_or_wife

                                FROM

                                        family AS c

                                ORDER BY

                                        c.hus_or_wife ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // get_num_dip ==========

    public function get_num_dip() {

        $qr = query("SELECT DISTINCTROW

                                dis.disp_num

                        FROM

                                display AS dis

                        ORDER BY

                                dis.disp_num - 0 ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // edit ============

    public function edit($eid = '') {

        $id = (urldecode($eid));



        // get gender rom gender table======

        $this->db->select('*');

        $this->db->from('gender');

        $data['g_row'] = $this->db->get()->result();



        // get province======================

        $this->db->select('*');

        $this->db->from('province');

        $data['p_row'] = $this->db->get()->result();

        //return $result = $query->result();

        // get gender==========

        // $query  = query("SELECT * FROM tbl_witnesses WHERE csv_id='{$id}'");

        // $row_wit   =$query->row();

        // $data['row_wit']=$row_wit;

        // csv ==========

        $query = query("SELECT * FROM civilservant AS c WHERE c.id = '{$id}' ");

        $row = $query->row();

        $data['row'] = $row;



        // work ==========

        $query_w = query("SELECT w.*,gd.general_deps_name,o.office,dp.d_name,cr.current_role_in_khmer FROM work AS w

                                    LEFT JOIN general_departments as gd ON gd.general_dep_id= w.general_department

                                    LEFT JOIN offices as o ON o.id= w.work_office

                                    LEFT JOIN tbl_departments as dp on dp.d_id= w.department

                                    LEFT JOIN currentrole as cr on cr.id= w.current_role_id

                                    WHERE w.id = '{$id}' ");

        $row_w = $query_w->row();

        $data['row_w'] = $row_w;



        // salary ==========

        $query_s = query("SELECT * FROM salary AS s WHERE s.id = '{$id}' ");

        $row_s = $query_s->row();

        $data['row_s'] = $row_s;



        // degree ==========

        $query_d = query("SELECT * FROM degree AS d WHERE d.id = '{$id}' ");

        $row_d = $query_d->row();

        $data['row_d'] = $row_d;



        // training ==========

        $query_t = query("SELECT * FROM training AS t WHERE t.id = '{$id}' ");

        $row_t = $query_t->row();

        $data['row_t'] = $row_t;



        // language ==========

        $query_l = query("SELECT * FROM language AS l WHERE l.id = '{$id}' ");

        $row_l = $query_l->row();

        $data['row_l'] = $row_l;



        // absent ==========

        $query_a = query("SELECT * FROM absent AS a WHERE a.id = '{$id}' ");

        $row_a = $query_a->row();

        $data['row_a'] = $row_a;



        // workhistory ==========

        $query_wh = query("SELECT * FROM workhistory AS wh WHERE wh.id = '{$id}' ");

        $row_wh = $query_wh->row();

        $data['row_wh'] = $row_wh;



        // workbydegree ==========

        $query_wbd = query("SELECT * FROM workbydegree AS wbd WHERE wbd.id = '{$id}' ");

        $row_wbd = $query_wbd->row();

        $data['row_wbd'] = $row_wbd;



        // get data from unit

        $query = query("SELECT * FROM unit  WHERE status='1' ");

        $row = $query->result();

        $data['unituery'] = $row;



        // get data from witnesses=========

        $query = query("SELECT * FROM tbl_witnesses  WHERE csv_id='{$id}' ");

        $row = $query->result();

        $data['witnesses'] = $row;



        // get data from mother=========

        $query = query("SELECT * FROM mother  WHERE id='{$id}' ");

        $row = $query->row();

        $data['rowmother'] = $row;



        // get data from mother=========

        $query = query("SELECT * FROM father  WHERE id='{$id}' ");

        $row = $query->row();

        $data['rowfather'] = $row;



        // get gender rom gender table======

        $this->db->select('*');

        $this->db->from('gender');

        $data['g_row'] = $this->db->get()->result();

        // get general department

        $this->db->select('*');

        $this->db->from('general_departments');

        $this->db->where('status', 1);

        $data['gd_rows'] = $this->db->get()->result();

        // get department

        $this->db->select('*');

        $this->db->from('tbl_departments');

        $this->db->where('status', 1);

        $data['dp_rows'] = $this->db->get()->result();

        $this->db->select('*');

        $this->db->from('offices');

        $this->db->where('status', 1);

        $data['office_rows'] = $this->db->get()->result();

        // get land official

        $this->db->select('*');

        $this->db->from('land_officials');

        $this->db->where('status', 1);

        $data['land_official_rows'] = $this->db->get()->result();

        // get current rool

        $this->db->select('*');

        $this->db->from('currentrole');

        $this->db->where('status', 1);

        $data['currentrole_rows'] = $this->db->get()->result();

        // main_id =========

        $data['id'] = $id;

        $this->load->view('header');

        $this->load->view('csv/csv_info/form', $data);

        $this->load->view('footer');

    }



    // get district==========

    public function get_district() {

        $procode = $this->input->post('id');

        $this->db->select('*')->from('district')->WHERE('pro_id', $procode);

        $data['d_row'] = $this->db->get()->result();



        header('Access-Control-Allow-Origin: *');

        header("Content-Type: application/json");

        echo json_encode($data['d_row']);

    }



    // get commun==========

    public function get_commun() {

        $discode = $this->input->post('id');

        $this->db->select('*');

        $this->db->from('commune');

        $this->db->WHERE('dis_id', $discode);

        $data['c_row'] = $this->db->get()->result();



        header('Access-Control-Allow-Origin: *');

        header("Content-Type: application/json");

        echo json_encode($data['c_row']);

    }



    // get villages==========

    public function get_village() {

        $id = $this->input->post('id');

        $this->db->select('*');

        $this->db->from('village');

        $this->db->WHERE('com_id', $id);

        $data['c_row'] = $this->db->get()->result();

        //return $result = $query->result();



        header('Access-Control-Allow-Origin: *');

        header("Content-Type: application/json");

        echo json_encode($data['c_row']);

    }



    //get Degree



    public function get_degree() {



        $qr = query("SELECT * FROM `educationlevel`");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }

    

     public function get_province() {



        $qr = query("SELECT * FROM `province`");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }

    

    public function get_province1() {



        $qr = query("SELECT * FROM `province`");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // insert ===============

    public function insert_csv() {

        $ids = $this->input->post('id');

//$ids = 1;

        // get data witnesses ==========

        $witname1 = $this->input->post('wit_name1');

        $six1 = $this->input->post('witgender1');

        //$witdob1 = date('Y-m-d', strtotime($this->input->post('dobwit1')));

        

          if ($this->input->post('dobwit1') === ""){$witdob1=NULL;} 

            else {$witdob1 = date('Y-m-d', strtotime($this->input->post('dobwit1')));};

        

        $job1 = $this->input->post('job1');

        $h_num1 = $this->input->post('home_nb');

        $street1 = $this->input->post('str_nb');

        $village1 = $this->input->post('vil_nb');

        $commune1 = $this->input->post('com_nb');

        $district1 = $this->input->post('dis_nb');

        $province1 = $this->input->post('pro_nb');



        // get data witnesses2 ===============

        $witname2 = $this->input->post('wit_name2');

        $six2 = $this->input->post('witgender2');

        //$witdob2 = date('Y-m-d', strtotime($this->input->post('dobwit2')));

        

        if ($this->input->post('dobwit2') === ""){$witdob2=NULL;} 

            else {$witdob2 = date('Y-m-d', strtotime($this->input->post('dobwit2')));};

            

        $job2 = $this->input->post('job2');

        $h_num2 = $this->input->post('home_nb1');

        $street2 = $this->input->post('str_nb1');

        $village2 = $this->input->post('vil_nb1');

        $commune2 = $this->input->post('com_nb1');

        $district2 = $this->input->post('dis_nb1');

        $province2 = $this->input->post('pro_nb1');



        if ($ids == 0) {

            /* Personal Information=========== */

            $lastname = $this->input->post('lastname');

            $firstname = $this->input->post('firstname');

            // $khmer_full_name = $this->input->post('khmer_full_name');

            $english_full_name = $this->input->post('english_full_name');

            $civil_servant_id = $this->input->post('civil_servant_id');

            $nationality_id = $this->input->post('nationality_id');

            $unit_code = $this->input->post('unit');

            // get unit code id

            $common_official_code = $this->input->post('common_official_code');

            $unit_official_code = $this->input->post('unit_official_code');

            $frame_work_code = $this->input->post('frame_work_code');

            $gender = $this->input->post('gender');

            //$dateofbirth = date('Y-m-d', strtotime($this->input->post('dateofbirth')));

            

            if ($this->input->post('dateofbirth ') === ""){$dateofbirth =NULL;} 

            else {$dateofbirth  = date('Y-m-d', strtotime($this->input->post('dateofbirth')));};

            

            $nationality = $this->input->post('nationality');

            $mobile_phone = $this->input->post('mobile_phone');

            $work_phone = $this->input->post('work_phone');



            $fax_number = $this->input->post('fax_number');

            $email = $this->input->post('email');

            $website = $this->input->post('website');

            // place of birth=============

            $house_no = $this->input->post('house_no');

            $group_no = $this->input->post('group_no');

            $street = $this->input->post('street');

            $village = $this->input->post('village');

            $commune = $this->input->post('commune');

            $district = $this->input->post('district');

            $province = $this->input->post('province');

            // current place=============

            $current_house_no = $this->input->post('current_house_no');

            $current_group_no = $this->input->post('current_group_no');

            $current_street = $this->input->post('current_street');

            $current_village = $this->input->post('current_village');

            $current_commune = $this->input->post('current_commune');

            $current_district = $this->input->post('current_district');

            $current_province = $this->input->post('current_province');

            // Family Information==========

            $family_name = $this->input->post('family_name');

            //$family_dateofbirth = date('Y-m-d', strtotime($this->input->post('family_dateofbirth')));

            

                if ($this->input->post('family_dateofbirth') === ""){$family_dateofbirth =NULL;} 

            else {$family_dateofbirth  = date('Y-m-d', strtotime($this->input->post('family_dateofbirth')));};

            

            $hus_or_wife = $this->input->post('hgetus_or_wife');

            $family_job = $this->input->post('family_job');

           // $date_enter_salary = date('Y-m-d', strtotime($this->input->post('date_enter_salary')));

            

             if ($this->input->post('date_enter_salary') === ""){$date_enter_salary=NULL;} 

            else {$date_enter_salary  = date('Y-m-d', strtotime($this->input->post('date_enter_salary')));};

            

            $note_family = $this->input->post('note_family');

            $reference_file = $this->input->post('reference_file');



            $degree = $this->input->post('cbodegree');

            $skills = $this->input->post('skills');

            // photo ========

            $targetPath = '';

            define("UPLOAD_PAYH", "assets/csv/photos/");



            if (is_array($_FILES)) {

                if (isset($_FILES['photo'])) {

                    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {

                        $sourcePath = $_FILES['photo']['tmp_name'];



                        //                    $targetPath = UPLOAD_PAYH . $_FILES['photo']['name'];

                        $targetPath = UPLOAD_PAYH . strtotime(date('Y-m-d h:i:sa')) . ".jpg";

                        // $str = up.strtotime(strtotimte('Y-m-d h:i:sa'));

                        move_uploaded_file($sourcePath, $targetPath);

                        // echo '<img src="'.$targetPath.'" width="100px" height="100px" />';

                    }

                } else {

                    $targetPath = null;

                }

            } else {

                $targetPath = null;

            }



            $data = array(

                // Personal Information========

                'lastname' => $lastname, 'firstname' => $firstname,

                // 'khmer_full_name' => $khmer_full_name,

                'english_full_name' => $english_full_name, 'civil_servant_id' => $civil_servant_id,
                'nationality_id' => $nationality_id, 'unit_code' => $unit_code, 
                'common_official_code' => $common_official_code, 'unit_official_code' => $unit_official_code, 
                'frame_work_code' => $frame_work_code, 'gender' => $gender, 'dateofbirth' => $dateofbirth, 
                'nationality' => $nationality, 'mobile_phone' => $mobile_phone, 'work_phone' => $work_phone, 
                'photo' => $targetPath, 'fax_number' => $fax_number, 'email' => $email, 'website' => $website, 
                'skills' => $skills, 'degree' => $degree,

                // place of birth===========

                'house_no' => $house_no, 'group_no ' => $group_no, 'street' => $street, 'village' => $village, 
                'commune' => $commune, 'district' => $district, 'province' => $province,

                // current of birth===========

                'current_house_no' => $current_house_no, 'current_group_no ' => $current_group_no, 
                'current_street' => $current_street, 'current_village' => $current_village, 'current_commune' => $current_commune, 
                'current_district' => $current_district, 'current_province' => $current_province,

                // family information===========

                'family_name' => $family_name, 'family_dateofbirth ' => $family_dateofbirth, 'hus_or_wife' => $hus_or_wife, 
                'family_job' => $family_job, 'date_enter_salary' => $date_enter_salary, 'note_family' => $note_family, 
                'reference_file' => $reference_file);

            insert('civilservant', $data);



            // main id =========

            $id = insert_id();





            // pdf  ========

            // define("UPLOAD_PAYH_PDF", "assets/csv/files/");

            // if (is_array($_FILES)) {

            //    if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            //        $sourcePath = $_FILES['file']['tmp_name'];

            //                    $targetPath = UPLOAD_PAYH . $_FILES['photo']['name'];

            //       $targetPath = UPLOAD_PAYH_PDF . $id . ".pdf";

            //       if (move_uploaded_file($sourcePath, $targetPath)) {

            //           // echo '<img src="'.$targetPath.'" width="100px" height="100px" />';

            //       }

            //  }

            // }

            // insert mother===========

            $mothername = $this->input->post('mothername');

            //$mother_dateofbirth = date('Y-m-d', strtotime($this->input->post('mother_dateofbirth')));

            

            if ($this->input->post('mother_dateofbirth') === ""){$mother_dateofbirth=NULL;} 

            else {$mother_dateofbirth  = date('Y-m-d', strtotime($this->input->post('mother_dateofbirth')));};

            

            $pobmother = $this->input->post('pobmother');

            $mother_job = $this->input->post('mother_job');

            $mother_data = array('id' => $id, 'mother_name' => $mothername, 'mother_dateOfBirth' => $mother_dateofbirth, 'mother_placeOfBirth' => $pobmother, 'mother_job' => $mother_job);

            insert('mother', $mother_data);



            // insert father===========

            $fathername = $this->input->post('fathername');

            //$father_dateofbirth = date('Y-m-d', strtotime($this->input->post('father_dateofbirth')));

            

            if ($this->input->post('father_dateofbirth') === ""){$father_dateofbirth=NULL;} 

            else {$father_dateofbirth  = date('Y-m-d', strtotime($this->input->post('father_dateofbirth')));};

            

            $pobfather = $this->input->post('pobfather');

            $father_job = $this->input->post('father_job');

            $father_data = array('id' => $id, 'father_name' => $fathername, 'father_dateOfBirth' => $father_dateofbirth, 'father_placeOfBirth' => $pobfather, 'father_job' => $father_job);

            insert('father', $father_data);



            // insert witnesses1===========

            $wit1_data = array('csv_id' => $id, 'wit_name' => $witname1, 'gender' => $six1, 'dob' => $witdob1, 'job' => $job1, 'num_home' => $h_num1, 'streets' => $street1, 'village' => $village1, 'commun' => $commune1, 'district' => $district1, 'province' => $province1);



          //  if ($witname1 || $six1 || $job1 || $h_num1 || $street1 || $village1 || $commune1 || $district1 || $province1 != "") {

            if ($witname1 || $six1 || $job1 != "") {

                insert('tbl_witnesses', $wit1_data);

            }

            // insert witnesses2===========

            $wit2_data = array('csv_id' => $id, 'wit_name' => $witname2, 'gender' => $six2, 'dob' => $witdob2, 'job' => $job2, 'num_home' => $h_num2, 'streets' => $street2, 'village' => $village2, 'commun' => $commune2, 'district' => $district2, 'province' => $province2);



            if ($witname2 || $six2 || $job2  != "") {

                insert('tbl_witnesses', $wit2_data);

            }



            // insert work==============

            //            $query_unit = query("SELECT unit FROM unit WHERE id=" . $unit_code);

            //            foreach ($query_unit->result() as $row) {

            //                $unit = $row->unit;

            //            }

            $current_role = $this->input->post('current_role');

            $current_role_for_biology = $this->input->post('current_role_for_biology');

            $work_location = $this->input->post('work_location');

            //$date_in = date('Y-m-d', strtotime($this->input->post('date_in')));

            

             if ($this->input->post('date_in') === ""){$date_in=NULL;} 

            else {$date_in  = date('Y-m-d', strtotime($this->input->post('date_in')));};

           

            

            //check empty date

            if ($date_in >= date('Y-m-d')) {

                $date_in = null;

            } else if ($date_in <= date('Y-m-d')) {

                $date_in;

            }

            //$date_out = date('Y-m-d', strtotime($this->input->post('date_out')));

            

             if ($this->input->post('date_out') === ""){$date_out=NULL;} 

            else {$date_out  = date('Y-m-d', strtotime($this->input->post('date_out')));};

            

            //check empty date

            if ($date_out >= date('Y-m-d')) {

                $date_out = null;

            } else if ($date_out <= date('Y-m-d')) {

                $date_out;

            }

            $type_of_framework = $this->input->post('type_of_framework');

//            $promote_date = $this->input->post('promote_date');

//            //check empty date

//            if ($promote_date >= date('Y-m-d')) {

//                $promote_date = null;

//            } else if ($promote_date <= date('Y-m-d')) {

//                $promote_date;

//            }

//            $real_promote_date = $this->input->post('real_promote_date');

//            //check empty date

//            if ($real_promote_date >= date('Y-m-d')) {

//                $date_out = null;

//            } else if ($real_promote_date <= date('Y-m-d')) {

//                $real_promote_date;

//            }



            $physical_status = $this->input->post('physical_status');

            $work_office = $this->input->post('work_office');

            $province_office = $this->input->post('province_office');

            $second_role = $this->input->post('second_role');

            $equal_class = $this->input->post('equal_class');

            $note = $this->input->post('note');

            $general_dep_name = $this->input->post('general_dep_name');

            $d_name = $this->input->post('d_name');

            $land_official = $this->input->post('land_official');

            $currentRole = $this->input->post('currentRole');

            //$promote_date = $this->input->post('promote_date');

            

               if ($this->input->post('promote_date') === ""){$promote_date=NULL;} 

            else {$promote_date  = date('Y-m-d', strtotime($this->input->post('promote_date')));};

           

            

            //$real_promote_date = $this->input->post('real_promote_date');

            

               if ($this->input->post('real_promote_date') === ""){$real_promote_date=NULL;} 

            else {$real_promote_date  = date('Y-m-d', strtotime($this->input->post('real_promote_date')));};

           

            

            //$date_late_promote = $this->input->post('date_late_promote');

            

               if ($this->input->post('date_late_promote') === ""){$date_late_promote=NULL;} 

            else {$date_late_promote  = date('Y-m-d', strtotime($this->input->post('date_late_promote')));};

           

            

            $reference_promote = $this->input->post('reference_promote');

            $reference_file_in = $this->input->post('reference_file_in');

            $data_work = array('id' => $id, 'current_role' => $current_role, 'current_role_for_biology' => $current_role_for_biology, 'work_location' => $work_location, 'date_in' => $date_in, 'date_out' => $date_out, 'type_of_framework' => $type_of_framework, 'promote_date' => $promote_date, 'real_promote_date' => $real_promote_date, 'physical_status' => $physical_status, 'unit' => $unit_code, 'work_office' => $work_office, 'second_role' => $second_role, 'equal_class' => $equal_class, 'note' => $note, 'general_department' => $general_dep_name, 'department' => $d_name, 'land_official' => $land_official, 'current_role_id' => $currentRole, 'province_office' => $province_office, 'date_late_promote' => $date_late_promote, 'reference_promote' => $reference_promote, 'reference_file_in' => $reference_file_in);

            insert('work', $data_work);



            // insert salary =========

            $salary_level = $this->input->post('salary_level');

            $index_multiply = $this->input->post('index_multiply');

            $index_salary = $this->input->post('index_salary');

            $pure_salary = $this->input->post('pure_salary');

            $title_yearly = $this->input->post('title_yearly');

            $less_than_child15 = $this->input->post('less_than_child15');

            $more_than_child15 = $this->input->post('more_than_child15');

            $family_assistant = $this->input->post('family_assistant');

            $additional_salary = $this->input->post('additional_salary');

            $adviser_evidence = $this->input->post('adviser_evidence');

            $additional_expire = $this->input->post('additional_expire');

            $assistant_evidence = $this->input->post('assistant_evidence');

            $remind_salary = $this->input->post('remind_salary');

            $exchange = $this->input->post('exchange');

            $total = $this->input->post('total');

            $total_in_dollar = $this->input->post('total_in_dollar');

            $data_salary = array('id' => $id, 'salary_level' => $salary_level, 'index_multiply' => $index_multiply, 'index_salary' => $index_salary, 'pure_salary' => $pure_salary, 'title_yearly' => $title_yearly, 'less_than_child15' => $less_than_child15, 'more_than_child15' => $more_than_child15, 'family_assistant' => $family_assistant, 'additional_salary' => $additional_salary, 'adviser_evidence' => $adviser_evidence, 'additional_expire' => $additional_expire, 'assistant_evidence' => $assistant_evidence, 'remind_salary' => $remind_salary, 'exchange' => $exchange, 'total' => $total, 'total_in_dollar' => $total_in_dollar);

            insert('salary', $data_salary);



            // insert degree=========

            $degree_level = $this->input->post('degree_level');

            $level = $this->input->post('level');

            $school = $this->input->post('school');

            $study_place = $this->input->post('study_place');

            $skill = $this->input->post('skill');

            $study_date = $this->input->post('study_date');

            $end_date = $this->input->post('end_date');

            $country = $this->input->post('country');



            for ($i = 0; $i < count($degree_level); $i++) {

                if ($degree_level[$i] != '' || $level[$i] != '' || $school[$i] != '' || $study_place[$i] != '' || $skill[$i] != '' | $study_date[$i] != '' || $end_date[$i] != '' || $end_date[$i] != '' || $country[$i] != '') {

                    $data_degree = array('id' => $id, 'degree_level' => $degree_level[$i], 'level' => $level[$i], 'school' => $school[$i], 'study_place' => $study_place[$i], 'skill' => $skill[$i], 'study_date' => $study_date[$i], 'end_date' => $end_date[$i], 'country' => $country[$i]);

                    insert('degree', $data_degree);

                }

            }



            /* insert training */

            $level_train = $this->input->post('level_train');

            $school_train = $this->input->post('school_train');

            $place_train = $this->input->post('place_train');

            $skill_train = $this->input->post('skill_train');

            

            

            $start_date_train = $this->input->post('start_date_train');

            

//               if ($this->input->post('start_date_train') === ""){$start_date_train=NULL;} 

//            else {$start_date_train  = date('Y-m-d', strtotime($this->input->post('start_date_train')));};

           

            

            $stop_date_train = $this->input->post('stop_date_train');

            

//               if ($this->input->post('stop_date_train') === ""){$stop_date_train=NULL;} 

//            else {$stop_date_train  = date('Y-m-d', strtotime($this->input->post('stop_date_train')));};

           

            

            

            $type_train = $this->input->post('type_train');

            $subject_course = $this->input->post('subject_course');



            for ($i = 0; $i < count($level_train); $i++) {

                if ($level_train[$i] != '' || $school_train[$i] != '' || $place_train[$i] != '' || $skill_train[$i] != '' || $type_train[$i] != '' || $subject_course[$i] != '') {

                    $data_train = array('id' => $id, 'level_train' => $level_train[$i], 'school_train' => $school_train[$i], 'place_train' => $place_train[$i], 'skill_train' => $skill_train[$i], 'start_date_train' => date('Y-m-d', strtotime($start_date_train[$i])), 'stop_date_train' => date('Y-m-d', strtotime($stop_date_train[$i])), 'type_train' => $type_train[$i], 'subject_course' => $subject_course[$i]);

                    insert('training', $data_train);

                }

            }



            /* insert language================ */

            $language = $this->input->post('language');

            $read = $this->input->post('read');

            $conversation = $this->input->post('conversation');

            $write = $this->input->post('write');

            for ($i = 0; $i < count($language); $i++) {

                if ($language[$i] != '' || $read[$i] != '' || $conversation[$i] != '' || $write[$i] != '') {

                    $data_language = array('id' => $id, 'language' => $language[$i], 'read' => $read[$i], 'conversation' => $conversation[$i], 'write' => $write[$i]);

                    insert('language', $data_language);

                }

            }



            /* insert medal================ */

            $medal_type = $this->input->post('medal_type');

            $class = $this->input->post('class');

            $get_date = $this->input->post('get_date');

            

//               if ($this->input->post('get_date') === ""){$get_date=NULL;} 

//            else {$get_date  = date('Y-m-d', strtotime($this->input->post('get_date')));};

            

            for ($i = 0; $i < count($medal_type); $i++) {

                if ($medal_type[$i] != '' and $class[$i] != '' and  $get_date[$i] != '') {

                    $data_medal = array('id' => $id, 'medal_type' => $medal_type[$i], 'class' => $class[$i], 'get_date' => date('Y-m-d', strtotime($get_date[$i])));

                    insert('medal', $data_medal);

                }

            }



            /* insert absent================ */

            $startdate = $this->input->post('startdate');

            $enddate = $this->input->post('enddate');

            $numberofday = $this->input->post('numberofday');

            $reason = $this->input->post('reason');

            for ($i = 0; $i < count($startdate); $i++) {

                if ($startdate[$i] != '' || $enddate[$i] != '' || $numberofday[$i] != '' || $reason[$i] != '') {

                    $data_absent = array('id' => $id, 'startdate' => $startdate[$i], 'enddate' => $enddate[$i], 'numberofday' => $numberofday[$i], 'reason' => $reason[$i]);

                    insert('absent', $data_absent);

                }

            }

            /* insert to activity log */

            $query = query("SELECT

                                                *

                                        FROM

                                                civilservant AS cs

                                        WHERE

                                                cs.id  = '{$id}' ")->row();

            query("INSERT INTO activity_log(user_name,full_name,idtemp,action) VALUES ('" . $this->session->userdata('user_name') . "', '" . $this->session->userdata('full_name') . "', '" . $query->lastname . " " . $query->firstname . "', 'Inserted') ");



            // ============

            //            header('Content-Type: application/json; charset=utf-8');

            //            $arr = array('id' => $id);

            //            echo json_encode($arr);

        } else {

            //main id for update=========

            $id = $this->input->post('id');

            // Personal Information===========

            $lastname = $this->input->post('lastname');

            $firstname = $this->input->post('firstname');

            // $khmer_full_name = $this->input->post('khmer_full_name');

            $english_full_name = $this->input->post('english_full_name');

            $civil_servant_id = $this->input->post('civil_servant_id');

            $nationality_id = $this->input->post('nationality_id');

            $unit_code = $this->input->post('unit');

            $common_official_code = $this->input->post('common_official_code');

            $unit_official_code = $this->input->post('unit_official_code');

            $frame_work_code = $this->input->post('frame_work_code');

            $gender = $this->input->post('gender');

            //$dateofbirth = date('Y-m-d', strtotime($this->input->post('dateofbirth')));

            

              if ($this->input->post('dateofbirth') === ""){$dateofbirth=NULL;} 

            else {$dateofbirth  = date('Y-m-d', strtotime($this->input->post('dateofbirth')));};

            

            $nationality = $this->input->post('nationality');

            $mobile_phone = $this->input->post('mobile_phone');

            $work_phone = $this->input->post('work_phone');

            $reference_file = $this->input->post('reference_file');

            // photo ========

            define("UPLOAD_PAYH", "assets/csv/photos/");

            $targetPath = $this->input->post('txtphotoupate');

            if (is_array($_FILES)) {

                if (isset($_FILES['photo'])) {

                    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {

                        $sourcePath = $_FILES['photo']['tmp_name'];

                        //                    $targetPath = UPLOAD_PAYH . $_FILES['photo']['name'];

                        $targetPath = UPLOAD_PAYH . strtotime(date('Y-m-d h:i:sa')) . '.jpg';

                        move_uploaded_file($sourcePath, $targetPath);

                        // echo '<img src="'.$targetPath.'" width="100px" height="100px" />';

                    }

                } else {

                    $targetPath = $this->input->post('txtphotoupate');

                }

            } else {

                $targetPath = $this->input->post('txtphotoupate');

            }



            // file pdf ========

            //  define("UPLOAD_PAYH_PDF", "assets/csv/files/");

            //  if (is_array($_FILES)) {

            //      if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            //         $sourcePath = $_FILES['file']['tmp_name'];

            //         //$targetPath = UPLOAD_PAYH . $_FILES['photo']['name'];

            //        $targetPath = UPLOAD_PAYH_PDF . $id . '.pdf';

            //        if (move_uploaded_file($sourcePath, $targetPath)) {

            // echo '<img src="'.$targetPath.'" width="100px" height="100px" />';

            //    }

            // }

            // }

            $fax_number = $this->input->post('fax_number');

            $email = $this->input->post('email');

            $website = $this->input->post('website');

            // place of birth=============

            $house_no = $this->input->post('house_no');

            $group_no = $this->input->post('group_no');

            $street = $this->input->post('street');

            $village = $this->input->post('village');

            $commune = $this->input->post('commune');

            $district = $this->input->post('district');

            $province = $this->input->post('province');

            // current place=============

            $current_house_no = $this->input->post('current_house_no');

            $current_group_no = $this->input->post('current_group_no');

            $current_street = $this->input->post('current_street');

            $current_village = $this->input->post('current_village');

            $current_commune = $this->input->post('current_commune');

            $current_district = $this->input->post('current_district');

            $current_province = $this->input->post('current_province');

            // Family Information==========

            $family_name = $this->input->post('family_name');

            //$family_dateofbirth = date('Y-m-d', strtotime($this->input->post('family_dateofbirth')));

            

              if ($this->input->post('family_dateofbirth') === ""){$family_dateofbirth=NULL;} 

            else {$family_dateofbirth  = date('Y-m-d', strtotime($this->input->post('family_dateofbirth')));}

            

            $hus_or_wife = $this->input->post('hus_or_wife');

            $family_job = $this->input->post('family_job');

            //$date_enter_salary = date('Y-m-d', strtotime($this->input->post('date_enter_salary')));

            

          if ($this->input->post('date_enter_salary') === ""){$date_enter_salary =NULL;} 

          else {$date_enter_salary = date('Y-m-d', strtotime($this->input->post('date_enter_salary')));}

            

            $note_family = $this->input->post('note_family');

            $degree = $this->input->post('cbodegree');

            $skills = $this->input->post('skills');

            $data = array(

                // Personal Information========

                'lastname' => $lastname, 'firstname' => $firstname,

                // 'khmer_full_name' => $khmer_full_name,

                'english_full_name' => $english_full_name, 'civil_servant_id' => $civil_servant_id, 'nationality_id' => $nationality_id, 'unit_code' => $unit_code, 'common_official_code' => $common_official_code, 'unit_official_code' => $unit_official_code, 'frame_work_code' => $frame_work_code, 'gender' => $gender, 'dateofbirth' => $dateofbirth, 'nationality' => $nationality, 'mobile_phone' => $mobile_phone, 'work_phone' => $work_phone, 'photo' => $targetPath, 'fax_number' => $fax_number, 'email' => $email, 'website' => $website, 'skills' => $skills, 'degree' => $degree,

                // place of birth===========

                'house_no' => $house_no, 'group_no ' => $group_no, 'street' => $street, 'village' => $village, 'commune' => $commune, 'district' => $district, 'province' => $province,

                // current of birth===========

                'current_house_no' => $current_house_no, 'current_group_no ' => $current_group_no, 'current_street' => $current_street, 'current_village' => $current_village, 'current_commune' => $current_commune, 'current_district' => $current_district, 'current_province' => $current_province,

                // family information===========

                'family_name' => $family_name, 'family_dateofbirth ' => $family_dateofbirth, 'hus_or_wife' => $hus_or_wife, 'family_job' => $family_job, 'date_enter_salary' => $date_enter_salary, 'note_family' => $note_family, 'reference_file' => $reference_file);

            update('civilservant', $data, array('id' => $id));



            // insert mother===========

            $mothername = $this->input->post('mothername');

            

             if ($this->input->post('mother_dateofbirth') === ""){$mother_dateofbirth=NULL;} 

            else {$mother_dateofbirth = date('Y-m-d', strtotime($this->input->post('mother_dateofbirth')));};

            

            $pobmother = $this->input->post('pobmother');

            $mother_job = $this->input->post('mother_job');

            $mother_data = array('id' => $id, 'mother_name' => $mothername, 'mother_dateOfBirth' => $mother_dateofbirth, 'mother_placeOfBirth' => $pobmother, 'mother_job' => $mother_job);

            update('mother', $mother_data, array('id' => $id));



            // insert father===========

            $fathername = $this->input->post('fathername');

            if ($this->input->post('father_dateofbirth') === ""){$father_dateofbirth=NULL;} 

            else {$father_dateofbirth = date('Y-m-d', strtotime($this->input->post('father_dateofbirth')));};

            

            $pobfather = $this->input->post('pobfather');

            $father_job = $this->input->post('father_job');

            $father_data = array('id' => $id, 'father_name' => $fathername, 'father_dateOfBirth' => $father_dateofbirth, 'father_placeOfBirth' => $pobfather, 'father_job' => $father_job);

            update('father', $father_data, array('id' => $id));



            // insert witnesses1===========

            $csv_id1 = $this->input->post('wit_id1');

            $csv_id2 = $this->input->post('wit_id2');

            $wit1_data = array('csv_id' => $id, 'wit_name' => $witname1, 'gender' => $six1, 'dob' => $witdob1, 'job' => $job1, 'num_home' => $h_num1, 'streets' => $street1, 'village' => $village1, 'commun' => $commune1, 'district' => $district1, 'province' => $province1);

            

             if ($csv_id1 != "") {

             update('tbl_witnesses', $wit1_data, array('wit_id' => $csv_id1));}

             else{

                  insert('tbl_witnesses', $wit1_data);

             }

            // insert witnesses2===========

            $wit2_data = array('csv_id' => $id, 'wit_name' => $witname2, 'gender' => $six2, 'dob' => $witdob2, 'job' => $job2, 'num_home' => $h_num2, 'streets' => $street2, 'village' => $village2, 'commun' => $commune2, 'district' => $district2, 'province' => $province2);

            

            

               if ($csv_id2 != "") {

               update('tbl_witnesses', $wit2_data, array('wit_id' => $csv_id2));} else 

                   { insert('tbl_witnesses', $wit2_data);}

            // update work==============

            //            $query_unit = query("SELECT unit FROM unit WHERE id=" . $unit_code);

            //            foreach ($query_unit->result() as $row) {

            //                $unit = $row->unit;

            //            }

            $current_role = $this->input->post('current_role');

            $current_role_for_biology = $this->input->post('current_role_for_biology');

            $work_location = $this->input->post('work_location');

            //$date_in = date('Y-m-d', strtotime($this->input->post('date_in')));

            

            if ($this->input->post('date_in') === ""){$date_in=NULL;} 

            else {$date_in = date('Y-m-d', strtotime($this->input->post('date_in')));};

            

            //$date_out = date('Y-m-d', strtotime($this->input->post('date_out')));

            

            if ($this->input->post('date_out') === ""){$date_out=NULL;} 

            else {$date_out = date('Y-m-d', strtotime($this->input->post('date_out')));};

            

            $type_of_framework = $this->input->post('type_of_framework');

            //$promote_date = date('Y-m-d', strtotime($this->input->post('promote_date')));

            

               if ($this->input->post('promote_date') === ""){$promote_date=NULL;} 

            else {$promote_date = date('Y-m-d', strtotime($this->input->post('promote_date')));};

            

           // $real_promote_date = date('Y-m-d', strtotime($this->input->post('real_promote_date')));

            

               if ($this->input->post('real_promote_date') === ""){$real_promote_date=NULL;} 

            else {$real_promote_date = date('Y-m-d', strtotime($this->input->post('real_promote_date')));};

            

            $physical_status = $this->input->post('physical_status');

            // $unit = $this->input->post('unit');

            $work_office = $this->input->post('work_office');

            $province_office = $this->input->post('province_office');

            $second_role = $this->input->post('second_role');

            $equal_class = $this->input->post('equal_class');

            $note = $this->input->post('note');

            $general_dep_name = $this->input->post('general_dep_name');

            $d_name = $this->input->post('d_name');

            $land_officail = $this->input->post('land_official');

            $currentRole = $this->input->post('currentRole');

            //$date_late_promote = !empty($this->input->post('date_late_promote')) ? date('Y-m-d', strtotime($this->input->post('date_late_promote'))) : NULL;



                if ($this->input->post('date_late_promote') === ""){$date_late_promote=NULL;} 

            else {$date_late_promote = date('Y-m-d', strtotime($this->input->post('date_late_promote')));};

            

            $reference_promote = $this->input->post('reference_promote');

            $reference_file_in = $this->input->post('reference_file_in');

            $transfer_from = $this->input->post('transfer_from');

            $data_work = array('current_role' => $current_role, 'current_role_for_biology' => $current_role_for_biology, 'work_location' => $work_location, 'date_in' => $date_in, 'date_out' => $date_out, 'type_of_framework' => $type_of_framework, 'promote_date' => $promote_date, 'real_promote_date' => $real_promote_date, 'physical_status' => $physical_status, 'unit' => $unit_code, 'work_office' => $work_office, 'province_office' => $province_office, 'second_role' => $second_role, 'equal_class' => $equal_class, 'note' => $note, 'general_department' => $general_dep_name, 'department' => $d_name, 'land_official' => $land_officail, 'current_role_id' => $currentRole, 'date_late_promote' => $date_late_promote, 'reference_promote' => $reference_promote, 'reference_file_in' => $reference_file_in, 'transfer_from' => $transfer_from);

            update('work', $data_work, array('id' => $id));



            /* update salary ========= */

            $salary_level = $this->input->post('salary_level');

            $index_multiply = $this->input->post('index_multiply');

            $index_salary = $this->input->post('index_salary');

            $pure_salary = $this->input->post('pure_salary');

            $title_yearly = $this->input->post('title_yearly');

            $less_than_child15 = $this->input->post('less_than_child15');

            $more_than_child15 = $this->input->post('more_than_child15');

            $family_assistant = $this->input->post('family_assistant');

            $additional_salary = $this->input->post('additional_salary');

            $adviser_evidence = $this->input->post('adviser_evidence');

            $additional_expire = $this->input->post('additional_expire');

            $assistant_evidence = $this->input->post('assistant_evidence');

            $remind_salary = $this->input->post('remind_salary');

            $exchange = $this->input->post('exchange');

            $total = $this->input->post('total');

            $total_in_dollar = $this->input->post('total_in_dollar');

            $data_salary = array('salary_level' => $salary_level, 'index_multiply' => $index_multiply, 'index_salary' => $index_salary, 'pure_salary' => $pure_salary, 'title_yearly' => $title_yearly, 'less_than_child15' => $less_than_child15, 'more_than_child15' => $more_than_child15, 'family_assistant' => $family_assistant, 'additional_salary' => $additional_salary, 'adviser_evidence' => $adviser_evidence, 'additional_expire' => $additional_expire, 'assistant_evidence' => $assistant_evidence, 'remind_salary' => $remind_salary, 'exchange' => $exchange, 'total' => $total, 'total_in_dollar' => $total_in_dollar);

            update('salary', $data_salary, array('id' => $id));

            /* check salary  */

            $query_unit = query("SELECT s.id from salary as s

                                JOIN civilservant c

                                ON s.id= c.id WHERE s.id=" . $id);

            foreach ($query_unit->result() as $row) {

                $id_salary = $row->id;

            }

            if ($id != $id_salary) {

                /* insert salary ========= */

                $salary_level = $this->input->post('salary_level');

                $index_multiply = $this->input->post('index_multiply');

                $index_salary = $this->input->post('index_salary');

                $pure_salary = $this->input->post('pure_salary');

                $title_yearly = $this->input->post('title_yearly');

                $less_than_child15 = $this->input->post('less_than_child15');

                $more_than_child15 = $this->input->post('more_than_child15');

                $family_assistant = $this->input->post('family_assistant');

                $additional_salary = $this->input->post('additional_salary');

                $adviser_evidence = $this->input->post('adviser_evidence');

                $additional_expire = $this->input->post('additional_expire');

                $assistant_evidence = $this->input->post('assistant_evidence');

                $remind_salary = $this->input->post('remind_salary');

                $exchange = $this->input->post('exchange');

                $total = $this->input->post('total');

                $total_in_dollar = $this->input->post('total_in_dollar');

                $data_salary = array('id' => $id, 'salary_level' => $salary_level, 'index_multiply' => $index_multiply, 'index_salary' => $index_salary, 'pure_salary' => $pure_salary, 'title_yearly' => $title_yearly, 'less_than_child15' => $less_than_child15, 'more_than_child15' => $more_than_child15, 'family_assistant' => $family_assistant, 'additional_salary' => $additional_salary, 'adviser_evidence' => $adviser_evidence, 'additional_expire' => $additional_expire, 'assistant_evidence' => $assistant_evidence, 'remind_salary' => $remind_salary, 'exchange' => $exchange, 'total' => $total, 'total_in_dollar' => $total_in_dollar);

                insert('salary', $data_salary);

            }

            /* update degree========= */

            $degree_id = $this->input->post('degree_id');

            $degree_level = $this->input->post('degree_level');

            $level = $this->input->post('level');

            $school = $this->input->post('school');

            $study_place = $this->input->post('study_place');

            $skill = $this->input->post('skill');

            $study_date = $this->input->post('study_date');

            $end_date = $this->input->post('end_date');

            $country = $this->input->post('country');

            for ($i = 0; $i < count($degree_level); $i++) {

                if ($degree_level[$i] != '' || $level[$i] != '' || $school[$i] != '' || $study_place[$i] != '' || $skill[$i] != '' | $study_date[$i] != '' || $end_date[$i] != '' || $end_date[$i] != '' || $country[$i] != '') {

                    if ($degree_id[$i] - 0 > 0) {

                        $data_degree = array('degree_level' => $degree_level[$i], 'level' => $level[$i], 'school' => $school[$i], 'study_place' => $study_place[$i], 'skill' => $skill[$i], 'study_date' => $study_date[$i], 'end_date' => $end_date[$i], 'country' => $country[$i]);

                        update('degree', $data_degree, array('degree_id' => $degree_id[$i]));

                    } else {

                        $data_degree = array('id' => $id, 'degree_level' => $degree_level[$i], 'level' => $level[$i], 'school' => $school[$i], 'study_place' => $study_place[$i], 'skill' => $skill[$i], 'study_date' => $study_date[$i], 'end_date' => $end_date[$i], 'country' => $country[$i]);

                        insert('degree', $data_degree);

                    }

                }

            }



            /* update training=========== */

            $train_id = $this->input->post('train_id');

            $level_train = $this->input->post('level_train');

            $school_train = $this->input->post('school_train');

            $place_train = $this->input->post('place_train');

            $skill_train = $this->input->post('skill_train');

            $start_date_train = $this->input->post('start_date_train');

            

//                if ($this->input->post('start_date_train') === ""){$start_date_train=NULL;} 

//            else {$start_date_train = date('Y-m-d', strtotime($this->input->post('start_date_train')));};

            

            $stop_date_train = $this->input->post('stop_date_train');

            

//                if ($this->input->post('stop_date_train') === ""){$stop_date_train=NULL;} 

//            else {$stop_date_train = date('Y-m-d', strtotime($this->input->post('stop_date_train')));};

            

            $type_train = $this->input->post('type_train');

            $subject_course = $this->input->post('subject_course');

            for ($i = 0; $i < count($level_train); $i++) {

                if ($level_train[$i] != '' || $school_train[$i] != '' || $place_train[$i] != '' || $skill_train[$i] != '' || $start_date_train[$i] != '' || $stop_date_train[$i] != '' || $type_train[$i] != '' || $subject_course[$i] != '') {

                    if ($train_id[$i] - 0 > 0) {

                        $data_train = array('level_train' => $level_train[$i], 'school_train' => $school_train[$i], 'place_train' => $place_train[$i], 'skill_train' => $skill_train[$i], 'start_date_train' => date('Y-m-d', strtotime($start_date_train[$i])), 'stop_date_train' => date('Y-m-d', strtotime($stop_date_train[$i])), 'type_train' => $type_train[$i], 'subject_course' => $subject_course[$i]);

                        update('training', $data_train, array('train_id' => $train_id[$i]));

                    } else {

                        $data_train = array('id' => $id, 'level_train' => $level_train[$i], 'school_train' => $school_train[$i], 'place_train' => $place_train[$i], 'skill_train' => $skill_train[$i], 'start_date_train' => date('Y-m-d', strtotime($start_date_train[$i])), 'stop_date_train' => date('Y-m-d', strtotime($stop_date_train[$i])), 'type_train' => $type_train[$i], 'subject_course' => $subject_course[$i]);

                       insert('training', $data_train);

                    }

                }

            }



            /* update language================ */

            $language_id = $this->input->post('language_id');

            $language = $this->input->post('language');

            $read = $this->input->post('read');

            $conversation = $this->input->post('conversation');

            $write = $this->input->post('write');

            for ($i = 0; $i < count($language); $i++) {

                if ($language[$i] != '' || $read[$i] != '' || $conversation[$i] != '' || $write[$i] != '') {

                    if ($language_id[$i] - 0 > 0) {

                        $data_language = array('language' => $language[$i], 'read' => $read[$i], 'conversation' => $conversation[$i], 'write' => $write[$i]);

                        update('language', $data_language, array('language_id' => $language_id[$i]));

                    } else {

                        $data_language = array('id' => $id, 'language' => $language[$i], 'read' => $read[$i], 'conversation' => $conversation[$i], 'write' => $write[$i]);

                        insert('language', $data_language);

                    }

                }

            }



            // update medal================

            $medal_id = $this->input->post('medal_id');

            $medal_type = $this->input->post('medal_type');

            $class = $this->input->post('class');

            $get_date = $this->input->post('get_date');

            

//              if ($this->input->post('get_date') === ""){$get_date=NULL;} 

//            else {$get_date = date('Y-m-d', strtotime($this->input->post('get_date')));};

            

            

            for ($i = 0; $i < count($medal_type); $i++) {

                if ($medal_type[$i] != '' || $class[$i] != '' || $get_date[$i] != '') {

                    if ($medal_id[$i] - 0 > 0) {

                        

                        $data_medal = array('medal_type' => $medal_type[$i], 'class' => $class[$i], 'get_date' => date('Y-m-d', strtotime( $get_date[$i])));

                       update('medal', $data_medal, array('medal_id' => $medal_id[$i]));

                    } else {

                        $data_medal = array('id' => $id, 'medal_type' => $medal_type[$i], 'class' => $class[$i], 'get_date' => date('Y-m-d', strtotime($get_date[$i])));

                       insert('medal', $data_medal);

                    }

                }

            }



            // update absent================

            $absentid = $this->input->post('absentid');

            $startdate = date('Y-m-d', strtotime($this->input->post('startdate')));

            $enddate = date('Y-m-d', strtotime($this->input->post('enddate')));

            $numberofday = $this->input->post('numberofday');

            $reason = $this->input->post('reason');

            for ($i = 0; $i < count($startdate); $i++) {

                if ($startdate[$i] != '' || $enddate[$i] != '' || $numberofday[$i] != '' || $reason[$i] != '') {

                    if ($absentid[$i] - 0 > 0) {

                        $data_absent = array('startdate' => $startdate[$i], 'enddate' => $enddate[$i], 'numberofday' => $numberofday[$i], 'reason' => $reason[$i]);

                        update('absent', $data_absent, array('absentid' => $absentid[$i]));

                    } else {

                        $data_absent = array('id' => $id, 'startdate' => $startdate[$i], 'enddate' => $enddate[$i], 'numberofday' => $numberofday[$i], 'reason' => $reason[$i]);

                        insert('absent', $data_absent);

                    }

                }

            }

            $query = query("SELECT

                                                *

                                        FROM

                                                civilservant AS cs

                                        WHERE

                                                cs.id  = '{$id}' ")->row();

            query("INSERT INTO activity_log(user_name,full_name,idtemp,action) VALUES ('" . $this->session->userdata('user_name') . "', '" . $this->session->userdata('full_name') . "', '" . $query->lastname . " " . $query->firstname . "', 'Updated') ");

        }// if =========

        //re-update degeree=========

        $qr_d = query("SELECT

                                                d.degree_id,

                                                d.id,

                                                d.degree_level,

                                                d.skill,

                                                d.study_date,

                                                d.end_date,

                                                d.school,

                                                d.country,

                                                d.study_place,

                                                d.`level`

                                        FROM

                                                degree AS d

                                        WHERE

                                                d.id = '{$id}'

                                        ORDER BY

                                                d.end_date");

        //re-update trianing=========

        $qr_t = query("SELECT

                                            t.train_id,

                                            t.id,

                                            t.start_date_train,

                                            t.stop_date_train,

                                            t.place_train,

                                            t.type_train,

                                            t.subject_course,

                                            t.level_train,

                                            t.school_train,

                                            t.skill_train,

                                            t.country

                                    FROM

                                            training AS t

                                    WHERE

                                            t.id = '{$id}'

                                    ORDER BY

                                            t.level_train ASC");

        //re-update language=========

        $qr_l = query(" SELECT

                                            l.language_id,

                                            l.id,

                                            l.`language`,

                                            l.`read`,

                                            l.conversation,

                                            l.`write`

                                    FROM

                                            `language` AS l

                                    WHERE

                                            l.id = '{$id}'

                                    ORDER BY

                                            l.read ASC ");

        //re-update medal=========

        $qr_m = query("SELECT

                                        m.medal_id,

                                        m.id,

                                        m.name_of_medal,

                                        m.medal_type,

                                        m.class,

                                        m.get_date

                                        FROM

                                                medal AS m

                                        WHERE

                                                m.id = '{$id}'

                                        ORDER BY

                                                m.get_date ASC ");

        //re-update absent=========

        $qr_a = query("SELECT

                                        a.absentid,

                                        a.id,

                                        a.numberofday,

                                        a.startdate,

                                        a.enddate,

                                        a.reason

                                        FROM

                                                absent AS a

                                        WHERE

                                                a.id = '$id'

                                        ORDER BY

                                                a.startdate ASC  ");

        header('Content-Type: application/json; charset=utf-8');

        $re_d = $qr_d->result();

        $re_t = $qr_t->result();

        $re_l = $qr_l->result();

        $re_m = $qr_m->result();

        $re_a = $qr_a->result();

        echo json_encode(array('id' => $id, 're_d' => $re_d, 're_t' => $re_t, 're_l' => $re_l, 're_m' => $re_m, 're_a' => $re_a));

        // redirect(site_url('csv/csv_info/edit/'.$id));   

        // var_dump(json_encode(array('id' => $id, 're_d' => $re_d, 're_t' => $re_t, 're_l' => $re_l, 're_m' => $re_m, 're_a' => $re_a)));

    }



    // f.insert workhistory=========

    public function insert_workhistory() {

        $id = $this->input->post('id_wh') - 0;

        if ($id == 0) {

            exit();

        } else {

            /* update work history================ */

            $work_history_id = $this->input->post('work_history_id');

            //$start_date = date('Y-m-d', strtotime($this->input->post('start_date')));

              

//              if ($this->input->post('start_date') === ""){$start_date=NULL;} 

//          else {$start_date = date('Y-m-d', strtotime(implode('',$this->input->post('start_date'))));}

//            $message =implode('|',$this->input->post('start_date'));

//            echo "<script type='text/javascript'>alert('$message');</script>";

       $start_date = $this->input->post('start_date');

            

//$stop_date = date('Y-m-d', strtotime($this->input->post('stop_date')));

            

//              if ($this->input->post('stop_date') === ""){$stop_date=NULL;} 

//          else {$stop_date = date('Y-m-d', strtotime(implode('',$this->input->post('stop_date'))));}

            

            $stop_date = $this->input->post('stop_date');

           

            $institution = $this->input->post('institution');

            $department = $this->input->post('department');

            $office = $this->input->post('office');

            $position = $this->input->post('position');

            for ($i = 0; $i < count($start_date); $i++) {

                if ($start_date[$i] != '' || $stop_date[$i] != '' || $institution[$i] != '' || $department[$i] != '' || $office[$i] != '' || $position[$i] != '') {

                    if ($work_history_id[$i] - 0 > 0) {

                        $data_workhistory = array('start_date' => date('Y-m-d', strtotime($start_date[$i])), 'stop_date' => date('Y-m-d', strtotime($stop_date[$i])), 'institution' => $institution[$i], 'department' => $department[$i], 'office' => $office[$i], 'position' => $position[$i]);

                        update('workhistory', $data_workhistory, array('work_history_id' => $work_history_id[$i]));

                    } else {

                        $data_workhistory = array('id' => $id, 'start_date' => date('Y-m-d', strtotime($start_date[$i])), 'stop_date' => date('Y-m-d', strtotime($stop_date[$i])), 'institution' => $institution[$i], 'department' => $department[$i], 'office' => $office[$i], 'position' => $position[$i]);

                        insert('workhistory', $data_workhistory);

                    }

                }

            }

        }

        //re-update work history=========

        $qr_w_h = query("SELECT

                                                        *

                                                FROM

                                                        workhistory AS wh

                                                WHERE

                                                        wh.id = '{$id}'

                                                ORDER BY

                                                        wh.institution");

        header('Content-Type: application/json; charset=utf-8');

        $re_w_h = $qr_w_h->result();

        echo json_encode(array('id' => $id, 're_w_h' => $re_w_h));

    }



    //f.insert workbydegree===========

    public function insert_workbydegree() {

        $id = $this->input->post('id_wbd') - 0;

        if ($id == 0) {

            exit();

        } else {

            // update workbydegree===========

            $wkd_id = $this->input->post('wkd_id');

            $old_level = $this->input->post('old_level');

            //$old_date = $this->input->post('old_date');

            

               if ($this->input->post('old_date') === ""){$old_date=NULL;} 

            else {$old_date = date('Y-m-d', strtotime($this->input->post('old_date')));};

            

            $new_level = $this->input->post('new_level');

            //$new_date = $this->input->post('new_date');

            

               if ($this->input->post('new_date') === ""){$new_date=NULL;} 

            else {$new_date = date('Y-m-d', strtotime($this->input->post('new_date')));};

            

            for ($i = 0; $i < count($old_level); $i++) {

                if ($old_level[$i] != '' || $old_date[$i] != '' || $new_level[$i] != '' || $new_date[$i] != '') {

                    if ($wkd_id[$i] - 0 > 0) {

                        $data_workbydegree = array('old_level' => $old_level[$i], 'old_date' => $old_date[$i], 'new_level' => $new_level[$i], 'new_date' => $new_date[$i]);

                        update('workbydegree', $data_workbydegree, array('wkd_id' => $wkd_id[$i]));

                    } else {

                        // insert workbydegree===========

                        $data_workbydegree = array('id' => $id, 'old_level' => $old_level[$i], 'old_date' => $old_date[$i], 'new_level' => $new_level[$i], 'new_date' => $new_date[$i]);

                        insert('workbydegree', $data_workbydegree);

                    }

                }

            }

        }

        //re-update workbydegree=========

        $qr_workbydegree = query("SELECT

                                                                *

                                                        FROM

                                                                workbydegree AS wbd

                                                        WHERE

                                                                wbd.id = '{$id}'

                                                        ORDER BY

                                                                wbd.new_level ");

        header('Content-Type: application/json; charset=utf-8');

        $re_workbydegree = $qr_workbydegree->result();

        echo json_encode(array('id' => $id, 're_workbydegree' => $re_workbydegree));

    }



    //f.insert workpromotionhistory========

    public function insert_workpromotionhistory() {

        $id = $this->input->post('id_wph') - 0;

        if ($id == 0) {

            exit();

        } else {

            // update workpromotionhistory===========

            $wkph_is_id = $this->input->post('wkph_is_id');

            $oldlevel = $this->input->post('oldlevel');

            $olddate = $this->input->post('olddate');

            

               if ($this->input->post('olddate') === ""){$olddate=NULL;} 

            else {$olddate = date('Y-m-d', strtotime($this->input->post('olddate')));};

            

            $newlevel = $this->input->post('newlevel');

            //$newdate = date('Y-m-d', strtotime($this->input->post('newdate')));

            

            if ($this->input->post('newdate') === ""){$newdate=NULL;} 

            else {$newdate = date('Y-m-d', strtotime($this->input->post('newdate')));};

            

            for ($i = 0; $i < count($oldlevel); $i++) {

                if ($oldlevel[$i] != '' || $olddate[$i] != '' || $newlevel[$i] != '' || $newdate[$i] != '') {

                    if ($wkph_is_id[$i] - 0 > 0) {

                        $data_workpromotionhistory = array('oldlevel' => $oldlevel[$i], 'olddate' => $olddate[$i], 'newlevel' => $newlevel[$i], 'newdate' => $newdate[$i]);

                        update('workpromotionhistory', $data_workpromotionhistory, array('wkph_is_id' => $wkph_is_id[$i]));

                    } else {

                        $data_workpromotionhistory = array('id' => $id, 'oldlevel' => $oldlevel[$i], 'olddate' => $olddate[$i], 'newlevel' => $newlevel[$i], 'newdate' => $newdate[$i]);

                        insert('workpromotionhistory', $data_workpromotionhistory);

                    }

                }

            }

        }

        //re-update workpromotionhistory=========

        $qr_w_p_history = query("SELECT

                                                            *

                                                    FROM

                                                            workpromotionhistory AS wph

                                                    WHERE

                                                            wph.id = '{$id}'

                                                    ORDER BY

                                                            wph.newlevel");

        header('Content-Type: application/json; charset=utf-8');

        $re_w_p_history = $qr_w_p_history->result();

        echo json_encode(array('id' => $id, 're_w_p_history' => $re_w_p_history));

    }



    public function insert_workclasspromotehistory() {

        $id = $this->input->post('id_wcph') - 0;

        if ($id == 0) {

            exit();

        } else {

            // update workclasspromotehistory===========

            $wkh_is_id = $this->input->post('wkh_is_id');

            $title = $this->input->post('title');

            $level_cph = $this->input->post('level_cph');

            $rank = $this->input->post('rank');

            //$date = date('Y-m-d', strtotime($this->input->post('date')));

            

               if ($this->input->post('date') === ""){$date=NULL;} 

            else {$date = date('Y-m-d', strtotime($this->input->post('date')));};

            

            

            $framework = $this->input->post('framework');

            $class_level = $this->input->post('class_level');

            for ($i = 0; $i < count($title); $i++) {

                if ($title[$i] != '' || $level_cph[$i] != '' || $rank[$i] != '' || $date[$i] != '' || $framework[$i] != '' || $class_level[$i] != '') {

                    if ($wkh_is_id[$i] - 0 > 0) {

                        $data_workclasspromotehistory = array('title' => $title[$i], 'level_cph' => $level_cph[$i], 'rank' => $rank[$i], 'date' => $date[$i], 'framework' => $framework[$i], 'class_level' => $class_level[$i]);

                        update('workclasspromotehistory', $data_workclasspromotehistory, array('wkh_is_id' => $wkh_is_id[$i]));

                    } else {

                        $data_workclasspromotehistory = array('id' => $id, 'title' => $title[$i], 'level_cph' => $level_cph[$i], 'rank' => $rank[$i], 'date' => $date[$i], 'framework' => $framework[$i], 'class_level' => $class_level[$i]);

                        insert('workclasspromotehistory', $data_workclasspromotehistory);

                    }

                }

            }

        }

        /* re-update workclasspromotehistory========= */

        $qr_workclasspromotehistory = query("SELECT

                                                                                *

                                                                        FROM

                                                                                workclasspromotehistory AS wcph

                                                                        WHERE

                                                                                wcph.id = '{$id}'

                                                                        ORDER BY

                                                                                wcph.title");

        header('Content-Type: application/json; charset=utf-8');

        $re_workclasspromotehistory = $qr_workclasspromotehistory->result();

        echo json_encode(array('id' => $id, 're_workclasspromotehistory' => $re_workclasspromotehistory));

    }



    public function insert_worktransfer() {

        $id = $this->input->post('id_wt') - 0;

        if ($id == 0) {

            exit();

        } else {

            // update worktransfer===========

            $wkt_id = $this->input->post('wkt_id');

            $role = $this->input->post('role');

            //$date_transfer = date('Y-m-d', strtotime($this->input->post('date_transfer')));

            

              if ($this->input->post('date_transfer') === ""){$date_transfer=NULL;} 

            else {$date_transfer = date('Y-m-d', strtotime($this->input->post('date_transfer')));};

            

            

            $to_role = $this->input->post('to_role');

            $status = $this->input->post('status');

            for ($i = 0; $i < count($role); $i++) {

                if ($role[$i] != '' || $date_transfer[$i] != '' || $to_role[$i] != '' || $status[$i] != '') {

                    if ($wkt_id[$i] - 0 > 0) {

                        $data_worktransfer = array('role' => $role[$i], 'date_transfer' => $date_transfer[$i], 'to_role' => $to_role[$i], 'status' => $status[$i]);

                        update('worktransfer', $data_worktransfer, array('wkt_id' => $wkt_id[$i]));

                    } else {

                        // insert worktransfer===========

                        $data_worktransfer = array('id' => $id, 'role' => $role[$i], 'date_transfer' => $date_transfer[$i], 'to_role' => $to_role[$i], 'status' => $status[$i]);

                        insert('worktransfer', $data_worktransfer);

                    }

                }

            }

        }

        /* re-update worktransfer========= */

        $qr_worktransfer = query("SELECT

                                                            *

                                                    FROM

                                                            worktransfer AS wt

                                                    WHERE

                                                            wt.id = '{$id}'

                                                    ORDER BY

                                                            wt.role");

        header('Content-Type: application/json; charset=utf-8');

        $re_worktransfer = $qr_worktransfer->result();

        echo json_encode(array('id' => $id, 're_worktransfer' => $re_worktransfer));

    }



    public function insert_workframeworkout() {

        $id = $this->input->post('id_wkfw') - 0;

        if ($id == 0) {

            exit();

        } else {

            /* update workframeworkout=========== */

            $wkfw_id = $this->input->post('wkfw_id');

            //$start_date2 = date('Y-m-d', strtotime($this->input->post('start_date2')));

            

               if ($this->input->post('$start_date2') === ""){$$start_date2=NULL;} 

            else {$$start_date2 = date('Y-m-d', strtotime($this->input->post('$start_date2')));};

            

            //$stop_date2 = date('Y-m-d', strtotime($this->input->post('stop_date2')));

            

               if ($this->input->post('stop_date2') === ""){$stop_date2=NULL;} 

            else {$stop_date2 = date('Y-m-d', strtotime($this->input->post('stop_date2')));};

            

            

            $title_framework = $this->input->post('title_framework');

            $institution_framework = $this->input->post('institution_framework');

            $note_framework = $this->input->post('note_framework');

            for ($i = 0; $i < count($start_date2); $i++) {

                if ($start_date2[$i] != '' || $stop_date2[$i] != '' || $title_framework[$i] != '' || $institution_framework[$i] != '' || $note_framework[$i] != '') {

                    if ($wkfw_id[$i] - 0 > 0) {

                        $data_workframeworkout = array('start_date2' => $start_date2[$i], 'stop_date2' => $stop_date2[$i], 'title_framework' => $title_framework[$i], 'institution_framework' => $institution_framework[$i], 'note_framework' => $note_framework[$i]);

                        update('workframeworkout', $data_workframeworkout, array('wkfw_id' => $wkfw_id[$i]));

                    } else {

                        // insert workframeworkout===========                }

                        $data_workframeworkout = array('id' => $id, 'start_date2' => $start_date2[$i], 'stop_date2' => $stop_date2[$i], 'title_framework' => $title_framework[$i], 'institution_framework' => $institution_framework[$i], 'note_framework' => $note_framework[$i]);

                        insert('workframeworkout', $data_workframeworkout);

                    }

                }

            }

        }

        //re-update workframeworkout=========

        $qr_workframeworkout = query("SELECT

                                                        *

                                                FROM

                                                        workframeworkout AS wkfw

                                                WHERE

                                                        wkfw.id = '{$id}'

                                                ORDER BY

                                                        wkfw.institution_framework ");

        header('Content-Type: application/json; charset=utf-8');

        $re_workframeworkout = $qr_workframeworkout->result();

        echo json_encode(array('id' => $id, 're_workframeworkout' => $re_workframeworkout));

    }



    public function insert_worknamedeleting() {

        $id = $this->input->post('id_wd') - 0;

        if ($id == 0) {

            exit();

        } else {

            // update worknamedeleting===========

            $wknd_id = $this->input->post('wknd_id');

           

            

            //$regulation_start_date = $this->input->post('regulation_start_date');

            

                if ($this->input->post('regulation_start_date') === ""){$regulation_start_date=NULL;} 

            else {$regulation_start_date = date('Y-m-d', strtotime($this->input->post('regulation_start_date')));};

            

            //$regulation_stop_date = $this->input->post('regulation_stop_date');

            

                if ($this->input->post('regulation_stop_date') === ""){$regulation_stop_date=NULL;} 

            else {$regulation_stop_date = date('Y-m-d', strtotime($this->input->post('regulation_stop_date')));};

            

            

            $deleting_accouncement_date = $this->input->post('deleting_accouncement_date');

            $deleting_date = $this->input->post('deleting_date');

            $reason_deleting = $this->input->post('reason_deleting');

            for ($i = 0; $i < count($regulation_start_date); $i++) {

                if ($regulation_start_date[$i] != '' || $regulation_stop_date[$i] != '' || $deleting_accouncement_date[$i] != '' || $deleting_date[$i] != '' || $reason_deleting[$i] != '') {

                    if ($wknd_id[$i] - 0 > 0) {

                        $data_worknamedeleting = array('regulation_start_date' => $regulation_start_date[$i], 'regulation_stop_date' => $regulation_stop_date[$i], 'deleting_accouncement_date' => $deleting_accouncement_date[$i], 'deleting_date' => $deleting_date[$i], 'reason_deleting' => $reason_deleting[$i]);

                        update('worknamedeleting', $data_worknamedeleting, array('wknd_id' => $wknd_id[$i]));

                    } else {

                        // insert worknamedeleting===========

                        $data_worknamedeleting = array('id' => $id, 'regulation_start_date' => $regulation_start_date[$i], 'regulation_stop_date' => $regulation_stop_date[$i], 'deleting_accouncement_date' => $deleting_accouncement_date[$i], 'deleting_date' => $deleting_date[$i], 'reason_deleting' => $reason_deleting[$i]);

                        insert('worknamedeleting', $data_worknamedeleting);

                    }

                }

            }

        }

        //re-update worknamedeleting=========

        $qr_worknamedeleting = query("SELECT

                                                                                *

                                                                        FROM

                                                                                worknamedeleting AS wd

                                                                        WHERE

                                                                                wd.id = '{$id}'

                                                                        ORDER BY

                                                                                wd.reason_deleting");

        header('Content-Type: application/json; charset=utf-8');

        $re_worknamedeleting = $qr_worknamedeleting->result();

        echo json_encode(array('id' => $id, 're_worknamedeleting' => $re_worknamedeleting));

    }



    public function insert_workfreesalary() {

        $id = $this->input->post('id_wkf') - 0;

        if ($id == 0) {

            exit();

        } else {

            // update workfreesalary===========

            $wkf_salary_id = $this->input->post('wkf_salary_id');

            //$start_date3 = $this->input->post('start_date3');

            

              if ($this->input->post('start_date3') === ""){$start_date3=NULL;} 

            else {$start_date3 = date('Y-m-d', strtotime($this->input->post('start_date3')));};

            

           

            //$stop_date3 = $this->input->post('stop_date3');

            

              if ($this->input->post('stop_date3') === ""){$stop_date3=NULL;} 

            else {$stop_date3 = date('Y-m-d', strtotime($this->input->post('stop_date3')));};

            

            

            $note_frees_alary = $this->input->post('note_frees_alary');

            for ($i = 0; $i < count($start_date3); $i++) {

                if ($start_date3[$i] != '' || $stop_date3[$i] != '' || $note_frees_alary[$i] != '') {

                    if ($wkf_salary_id[$i] - 0 > 0) {

                        $data_workfreesalary = array('start_date3' => $start_date3[$i], 'stop_date3' => $stop_date3[$i], 'note_frees_alary' => $note_frees_alary[$i]);

                        update('workfreesalary', $data_workfreesalary, array('wkf_salary_id' => $wkf_salary_id[$i]));

                    } else {

                        // insert workfreesalary===========

                        $data_workfreesalary = array('id' => $id, 'start_date3' => $start_date3[$i], 'stop_date3' => $stop_date3[$i], 'note_frees_alary' => $note_frees_alary[$i]);

                        insert('workfreesalary', $data_workfreesalary);

                    }

                }

            }

        }

        //re-update workfreesalary=========

        $qr_wkf_salary = query("SELECT

                                                            *

                                                    FROM

                                                            workfreesalary AS wkf

                                                    WHERE

                                                            wkf.id = '{$id}'

                                                    ORDER BY

                                                            wkf.start_date3");

        header('Content-Type: application/json; charset=utf-8');

        $re_wkf_salary = $qr_wkf_salary->result();

        echo json_encode(array('id' => $id, 're_wkf_salary' => $re_wkf_salary));

    }



    public function insert_worktitlelevel() {

        $id = $this->input->post('id_wkt') - 0;

        if ($id == 0) {

            exit();

        } else {

            /* update worktitlelevel=========== */

            $wktl_id = $this->input->post('wktl_id');

            $current_title = $this->input->post('current_title');

            $seniority_date = $this->input->post('seniority_date');

            $number_of_seniority = $this->input->post('number_of_seniority');

            $level_title = $this->input->post('level_title');

            //$date_title = $this->input->post('date_title');

            

                if ($this->input->post('date_title') === ""){$date_title=NULL;} 

            else {$date_title = date('Y-m-d', strtotime($this->input->post('date_title')));};

            

            

            for ($i = 0; $i < count($current_title); $i++) {

                if ($current_title[$i] != '' || $seniority_date[$i] != '' || $number_of_seniority[$i] != '' || $level_title[$i] != '' || $date_title[$i] != '') {

                    if ($wktl_id[$i] - 0 > 0) {

                        $data_worktitlelevel = array('current_title' => $current_title[$i], 'seniority_date' => $seniority_date[$i], 'number_of_seniority' => $number_of_seniority[$i], 'level_title' => $level_title[$i], 'date_title' => $date_title[$i]);

                        update('worktitlelevel', $data_worktitlelevel, array('wktl_id' => $wktl_id[$i]));

                    } else {

                        // insert worktitlelevel===========

                        $data_worktitlelevel = array('id' => $id, 'current_title' => $current_title[$i], 'seniority_date' => $seniority_date[$i], 'number_of_seniority' => $number_of_seniority[$i], 'level_title' => $level_title[$i], 'date_title' => $date_title[$i]);

                        insert('worktitlelevel', $data_worktitlelevel);

                    }

                }

            }

        }

        /* re-update worktitlelevel========= */

        $qr_wkt_level = query("SELECT

                                                        *

                                                FROM

                                                        worktitlelevel AS wkt

                                                WHERE

                                                        wkt.id = '{$id}'

                                                ORDER BY

                                                        wkt.date_title");

        header('Content-Type: application/json; charset=utf-8');

        $re_wkt_level = $qr_wkt_level->result();

        echo json_encode(array('id' => $id, 're_wkt_level' => $re_wkt_level));

    }



    /* insert children */



    public function insert_children() {

       $id = $this->input->post('id_ch') ;

        //$id =3431;

        if ($id == 0) {

              echo($id);

            exit();

        } else {

           

            // update children========

            $child_id = $this->input->post('child_id');

            $childname = $this->input->post('childname');

            $gender_child = $this->input->post('gender_child');

            $child_job = $this->input->post('child_job');

            $dateofbirth_child = $this->input->post('dateofbirth_child');

            

//                   if ($this->input->post('dateofbirth_child') === ""){$dateofbirth_child=NULL;} 

//            else {$dateofbirth_child = date('Y-m-d', strtotime($this->input->post('dateofbirth_child')));};

            

            

           // $date_start_child = date('Y-m-d', strtotime($this->input->post('date_start_child')));

            //$date_stop_child = date('Y-m-d', strtotime($this->input->post('date_stop_child')));

           //echo( '2222');

            for ($i = 0; $i < count($childname); $i++) {

               // echo('444'.$child_id[$i]);

                if ($childname[$i] != '' || $gender_child[$i] != '' ||  $child_job[$i] != '') {

                   

                    if ($child_id[$i] - 0 > 0) {

                        $data_children = array('childname' => $childname[$i], 'gender_child' => $gender_child[$i], 'child_job' => $child_job[$i], 'dateofbirth_child' =>  date('Y-m-d', strtotime($dateofbirth_child [$i])));

                     

                        

                        update('children', $data_children, array('child_id' => $child_id[$i]));

                    } else {

                        /* insert children======== */

                        $data_children = array('id' => $id, 'childname' => $childname[$i], 'gender_child' => $gender_child[$i], 'child_job' => $child_job[$i], 'dateofbirth_child' =>  date('Y-m-d', strtotime($dateofbirth_child [$i])));

                        insert('children', $data_children);

                    }

                }

            }

        }

      

        /* re-update children========= */

        $qr_childrened = query("SELECT

                                                        *

                                                FROM

                                                        children AS ch

                                                WHERE

                                                        ch.id = '$id'

                                                ORDER BY

                                                        ch.dateofbirth_child");

        header('Content-Type: application/json; charset=utf-8');

        $re_childrened = $qr_childrened->result();

    //vichiet   

    echo json_encode(array('id' => $id, 're_childrened' => $re_childrened));

    }



    // gr csv_info. ================

    public function grid_csv_info() {

        // var ===============

        $offset = $this->input->post('offset');

        $limit = $this->input->post('limit');

        $search = trim($this->input->post('search'));

        // $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));

        // by role =============

        //        $pr_code = $this->session->userdata('pr_code');

        //        $sWhere = "";

        //        if ($pr_code == "") {

        //            $sWhere .= "1=1 ";

        //        } else {

        //            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";

        //        }



        $where = '';

        if ($search != '') {

            $where .= "AND (cs.civil_servant_id LIKE '%{$search}%' ";

            $where .= "OR cs.firstname LIKE '%{$search}%' ";

            $where .= "OR cs.lastname LIKE '%{$search}%' ";

            $where .= "OR cs.gender LIKE '%{$search}%' ";

            // $where .= "OR dateofbirth LIKE '%{$search}%' ";

            $where .= "OR cs.mobile_phone LIKE '%{$search}%' ";

            $where .= "OR w.current_role LIKE '%{$search}%' ";

            $where .= "OR w.unit LIKE '%{$search}%') ";

        }



        // cnt. ==============

        $q = query("SELECT

                                        COUNT(cs.id) AS c

                                FROM

                                        civilservant AS cs

                                LEFT JOIN `work` AS w ON cs.id = w.id

                                WHERE  1=1 {$where} ");

        $total_record = $q->row()->c - 0;

        $total_page = ceil($total_record / $limit);



        // qr. ==============

        $qr = query("SELECT

                                    cs.id,

                                    cs.civil_servant_id,

                                    cs.firstname,

                                    cs.lastname,

                                    cs.gender,

                                    DATE_FORMAT(cs.dateofbirth, '%d-%b-%Y') AS dateofbirth,

                                    cs.mobile_phone,

                                    w.current_role_id,

                                    cr.current_role_in_khmer,

                                    w.unit,

                                    u.unit AS unit_name,

                                    w.date_in,

                                    w.type_of_framework,

                                    w.work_office,

                                   IF(o.office IS NULL ,'',o.office ) as office

                            FROM

                                    civilservant AS cs

                            INNER  JOIN `work` AS w ON cs.id = w.id

                            LEFT   JOIN `offices` AS o ON o.id= w.work_office

                            LEFT   JOIN `currentrole` AS cr ON cr.id= w.current_role_id

                            LEFT   JOIN `unit` AS u ON cs.unit_code= u.id

                            WHERE     1 = 1 {$where}

                                ORDER BY

                                        CASE

                                WHEN cs.unit_official_code IN ('', '0') THEN

                                        1

                                ELSE

                                        0

                                END,

                                    CASE

                                WHEN w.current_role_id IN ('', '0') THEN

                                        1

                                ELSE

                                        0

                                END,

                                 -w.current_role_id DESC

                                LIMIT {$offset},

                                        {$limit} ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        $arr = array('total_page' => $total_page, 'res' => $res, 'total_record' => $total_record);

        echo json_encode($arr);

    }



    // grid for dataTables

    public function grid_dt_info() {

        $qr = query("SELECT

                                cs.id,

                                cs.civil_servant_id,

                                cs.firstname,

                                cs.lastname,

                                cs.gender,

                                DATE_FORMAT(cs.dateofbirth, '%d-%b-%Y') AS dateofbirth,

                                cs.mobile_phone,

                                w.current_role_id,

                                cr.current_role_in_khmer,

                                w.unit,

                                u.unit AS unit_name,

                                w.date_in,

                                w.type_of_framework,

                                w.work_office,

                               IF(o.office IS NULL ,'',o.office ) as office

                        FROM

                                civilservant AS cs

                        INNER   JOIN `work` AS w ON cs.id = w.id

                        LEFT   JOIN `offices` AS o ON o.id= w.work_office

                        LEFT   JOIN `currentrole` AS cr ON cr.id= w.current_role_id

                        LEFT   JOIN `unit` AS u ON cs.unit_code= u.id

                        WHERE     1 = 1

                            ORDER BY

                                    CASE

                            WHEN cs.unit_official_code IN ('', '0') THEN

                                    1

                            ELSE

                                    0

                            END,

                                CASE

                            WHEN w.current_role_id IN ('', '0') THEN

                                    1

                            ELSE

                                    0

                            END,

                             -w.current_role_id DESC

                         ");

        $res = $qr->result();

        // $data = array();

        //       foreach($res as $row)

        //       {

        //        $sub_array = array();

        //

    //       $sub_array[] = '<td style="text-align: left;">'.$row->civil_servant_id.'</td>';

        //       $sub_array[] = '<td style="text-align: left;">'.$row->lastname.' '.$row->firstname.'</td>';

        //       $sub_array[] = '<td style="text-align: left;">'.$row->gender.'</td>';

        //       $sub_array[] = '<td style="text-align: left;">'.$row->dateofbirth.'</td>';

        //       $sub_array[] = '<td style="text-align: left;">'.$row->current_role_in_khmer.'</td>';

        //       $sub_array[] = '<td style="text-align: left;">'.$row->mobile_phone.'</td>';

        //       $sub_array[] = '<td style="text-align: left;">'.$row->office.'</td>';

        //       $sub_array[] = '<td style="text-align: left;">'.$row->unit_name.'</td>';

        //       $data[] = $sub_array;

        //       }

        //       $output = array(

        //            "data" =>     $data

        //       );

        header('Content-Type: application/json; charset=utf-8');

        $arr = array('res' => $res);

        echo json_encode($arr);

    }



    // gr csv_info_k1. ================

    public function grid_csv_infok1() {

        // var ===============

        $offset = $this->input->post('offset');

        $limit = $this->input->post('limit');

        $search = trim($this->input->post('search'));

        // $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));

        // by role =============

        //        $pr_code = $this->session->userdata('pr_code');

        //        $sWhere = "";

        //        if ($pr_code == "") {

        //            $sWhere .= "1=1 ";

        //        } else {

        //            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";

        //        }

        $where = '';

        if ($search != '') {

            $where .= "AND (cs.civil_servant_id LIKE '%{$search}%' ";

            $where .= "OR cs.firstname LIKE '%{$search}%' ";

            $where .= "OR cs.lastname LIKE '%{$search}%' ";

            $where .= "OR cs.gender LIKE '%{$search}%' ";

            // $where .= "OR dateofbirth LIKE '%{$search}%' ";

           

            $where .= "OR salary_level LIKE '%{$search}%' ) ";

        }



        // cnt. ==============

        $q = query("SELECT

                                        COUNT(cs.id) AS c

                                FROM

                                        civilservant AS cs

                                LEFT JOIN `salary` AS w ON cs.id = w.id

                                -- INNER JOIN `list_salary` AS ls ON ls.id = cs.id

                                WHERE  salary_level LIKE 'ក%'

                                    AND 1=1 {$where} ");

        $total_record = $q->row()->c - 0;

        $total_page = ceil($total_record / $limit);



        // qr. ==============

        $qr = query("SELECT

                        	cs.id,

                        	cs.civil_servant_id,

                        	cs.firstname,

                        	cs.lastname,

                        	cs.gender,

                        	cs.unit_official_code,

                        	DATE_FORMAT(cs.dateofbirth, '%d-%b-%Y') AS dateofbirth,

                        	cs.mobile_phone,

                            cs.house_no,

                        	cs.group_no,

                        	cs.street,

                        	cs.province,

                        	cs.district,

                        	cs.commune,

                        	cs.village,

                            cs.current_house_no,

                            cs.current_group_no,

                        	cs.current_street,

                        	cs.current_village,

                        	cs.current_commune,

                        	cs.current_district,

                        	cs.current_province,

                        	w.current_role,

                            w.current_role_id,

                        	w.unit,

                            u.unit AS unit_name,

                            cr.current_role_in_khmer,

                            w.date_in,

                            w.type_of_framework,

                            w.work_office,

                                s.salary_level

                        FROM

                        	civilservant AS cs

                          INNER  JOIN `work` AS w ON cs.id = w.id

                        LEFT   JOIN `unit` AS u ON cs.unit_code= u.id

                        LEFT   JOIN `currentrole` AS cr ON cr.id= w.current_role_id

                        LEFT JOIN `salary` AS s ON cs.id = s.id

                        WHERE 1 = 1 {$where}

                        AND salary_level LIKE 'ក%'

                        ORDER BY

                           salary_level

                                LIMIT {$offset},

                                        {$limit} ");



        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        $arr = array('total_page' => $total_page, 'res' => $res, 'total_record' => $total_record);

        echo json_encode($arr);

    }



    // gr csv_info_k2. ================

    public function grid_csv_infok2() {

        // var ===============

        $offset = $this->input->post('offset');

        $limit = $this->input->post('limit');

        $search = trim($this->input->post('search'));

        // $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));

        // by role =============

        //        $pr_code = $this->session->userdata('pr_code');

        //        $sWhere = "";

        //        if ($pr_code == "") {

        //            $sWhere .= "1=1 ";

        //        } else {

        //            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";

        //        }



        $where = '';

        if ($search != '') {

            $where .= "AND ( cs.civil_servant_id LIKE '%{$search}%' ";

            $where .= "OR cs.firstname LIKE '%{$search}%' ";

            $where .= "OR cs.lastname LIKE '%{$search}%' ";

            $where .= "OR cs.gender LIKE '%{$search}%' ";

            // $where .= "OR dateofbirth LIKE '%{$search}%' ";

            

              $where .= "OR salary_level LIKE '%{$search}%' ) ";

        }



        // cnt. ==============

        $q = query("SELECT

                                        COUNT(cs.id) AS c

                                FROM

                                        civilservant AS cs

                                LEFT JOIN `salary` AS w ON cs.id = w.id

                                -- INNER JOIN `list_salary` AS ls ON ls.id = cs.id

                                WHERE  salary_level LIKE 'ខ%'

                                    AND 1=1 {$where} ");

        $total_record = $q->row()->c - 0;

        $total_page = ceil($total_record / $limit);



        // qr. ==============

            $qr = query("SELECT

                        	cs.id,

                        	cs.civil_servant_id,

                        	cs.firstname,

                        	cs.lastname,

                        	cs.gender,

                        	cs.unit_official_code,

                        	DATE_FORMAT(cs.dateofbirth, '%d-%b-%Y') AS dateofbirth,

                        	cs.mobile_phone,

                            cs.house_no,

                        	cs.group_no,

                        	cs.street,

                        	cs.province,

                        	cs.district,

                        	cs.commune,

                        	cs.village,

                            cs.current_house_no,

                            cs.current_group_no,

                        	cs.current_street,

                        	cs.current_village,

                        	cs.current_commune,

                        	cs.current_district,

                        	cs.current_province,

                        	w.current_role,

                            w.current_role_id,

                        	w.unit,

                            u.unit AS unit_name,

                            cr.current_role_in_khmer,

                            w.date_in,

                            w.type_of_framework,

                            w.work_office,

                                s.salary_level

                        FROM

                        	civilservant AS cs

                          INNER  JOIN `work` AS w ON cs.id = w.id

                        LEFT   JOIN `unit` AS u ON cs.unit_code= u.id

                        LEFT   JOIN `currentrole` AS cr ON cr.id= w.current_role_id

                        LEFT JOIN `salary` AS s ON cs.id = s.id

                        WHERE 1 = 1 {$where}

                        AND salary_level LIKE 'ខ%'

                        ORDER BY

                           salary_level

                                LIMIT {$offset},

                                        {$limit} ");



        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        $arr = array('total_page' => $total_page, 'res' => $res, 'total_record' => $total_record);

        echo json_encode($arr);

    }



    // gr csv_info_k3. ================

    public function grid_csv_infok3() {

        // var ===============

        $offset = $this->input->post('offset');

        $limit = $this->input->post('limit');

        $search = trim($this->input->post('search'));

        // $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));

        // by role =============

        //        $pr_code = $this->session->userdata('pr_code');

        //        $sWhere = "";

        //        if ($pr_code == "") {

        //            $sWhere .= "1=1 ";

        //        } else {

        //            $sWhere .= "1=1 AND (rd.pro_id IN({$pr_code})) ";

        //        }



        $where = '';

        if ($search != '') {

            $where .= "AND ( cs.civil_servant_id LIKE '%{$search}%' ";

            $where .= "OR cs.firstname LIKE '%{$search}%' ";

            $where .= "OR cs.lastname LIKE '%{$search}%' ";

            $where .= "OR salary_level LIKE '%{$search}%' ) ";

        }



        // cnt. ==============

       $q = query("SELECT

                                        COUNT(cs.id) AS c

                                FROM

                                        civilservant AS cs

                                LEFT JOIN `salary` AS w ON cs.id = w.id

                                -- INNER JOIN `list_salary` AS ls ON ls.id = cs.id

                                WHERE  salary_level LIKE 'គ.%'

                                    AND 1=1 {$where} ");

        $total_record = $q->row()->c - 0;

        $total_page = ceil($total_record / $limit);



        // qr. ==============

$qr = query("SELECT

                        	cs.id,

                        	cs.civil_servant_id,

                        	cs.firstname,

                        	cs.lastname,

                        	cs.gender,

                        	cs.unit_official_code,

                        	DATE_FORMAT(cs.dateofbirth, '%d-%b-%Y') AS dateofbirth,

                        	cs.mobile_phone,

                            cs.house_no,

                        	cs.group_no,

                        	cs.street,

                        	cs.province,

                        	cs.district,

                        	cs.commune,

                        	cs.village,

                            cs.current_house_no,

                            cs.current_group_no,

                        	cs.current_street,

                        	cs.current_village,

                        	cs.current_commune,

                        	cs.current_district,

                        	cs.current_province,

                        	w.current_role,

                            w.current_role_id,

                        	w.unit,

                            u.unit AS unit_name,

                            cr.current_role_in_khmer,

                            w.date_in,

                            w.type_of_framework,

                            w.work_office,

                                s.salary_level

                        FROM

                        	civilservant AS cs

                          INNER  JOIN `work` AS w ON cs.id = w.id

                        LEFT   JOIN `unit` AS u ON cs.unit_code= u.id

                        LEFT   JOIN `currentrole` AS cr ON cr.id= w.current_role_id

                        LEFT JOIN `salary` AS s ON cs.id = s.id

                        WHERE 1 = 1 {$where}

                        AND salary_level LIKE 'គ.%'

                        ORDER BY

                           salary_level

                                LIMIT {$offset},

                                        {$limit} ");



        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        $arr = array('total_page' => $total_page, 'res' => $res, 'total_record' => $total_record);

        echo json_encode($arr);

    }



    // gr csv_info. ================

    public function get_retires() {

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

            $where .= " AND (civil_servant_id LIKE '%{$search}%' ";

            $where .= " OR firstname LIKE '%{$search}%' ";

            $where .= " OR lastname LIKE '%{$search}%' ";

            // $where .= "OR gender LIKE '%{$search}%' ";

            $where .= " OR english_full_name LIKE '%{$search}%' ) ";

            // $where .= "OR mobile_phone LIKE '%{$search}%' ";

            if ($year != 0) {

                $where .= " AND retiredate LIKE  '{$year}%' ";

            } else {

                $where .= "  ";

            }

        } elseif ($year != 0) {

            $where .= " AND retiredate LIKE  '{$year}%' ";

        } elseif ($year == 0) {

            $where = " AND retiredate <= DATE(NOW())  ";

        }







        // cnt. ==============

        $q = query("SELECT COUNT(*) as c FROM v_retired 

                                WHERE

                                        1=1  {$where} ");

        $total_record = $q->row()->c - 0;

        $total_page = ceil($total_record / $limit);



        // qr. ==============

        $qr = query("SELECT * FROM v_retired

                            WHERE

                                    1 = 1  {$where}

                                ORDER BY

                                        CASE

                                WHEN common_official_code IN ('', '0') THEN

                                        1

                                ELSE

                                        0

                                END,

                                 common_official_code ASC

                                LIMIT {$offset}, {$limit}  ");



        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        $arr = array('total_page' => $total_page, 'res' => $res, 'total_record' => $total_record);

        echo json_encode($arr);

    }



    public function level_salary() {

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



    public function index_miltiple_salary() {

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



    // get provinces==============

    public function opt_province() {

        //        $dis_code = $this->session->userdata('dis_code');

        //        $sWhered = "";

        //        if ($dis_code == "") {

        //            $sWhered .= "";

        //        } else {

        //            $sWhered .= "AND c.district ='{$dis_code}' ";

        //        }

        $qr = query("SELECT

                                    p.`no`,

                                    p.id,

                                    p.province_name,

                                    p.khmer_name

                                    FROM

                                    province AS p

                                    ORDER BY p.id ASC

                                   ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // get district==============

    public function opt_district() {

        $province = $this->input->post('province');

        $qr = query("SELECT

                                    d.id,

                                    d.pro_code,

                                    d.dis_code,

                                    d.dis_khmer,

                                    d.dis_name,

                                    d.note_id

                                    FROM

                                    district AS d

                                    WHERE d.pro_code = $province

                                   ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }

    

       public function opt_district1() {

        $current_province = $this->input->post('current_province');

        $qr = query("SELECT

                                    d.id,

                                    d.pro_code,

                                    d.dis_code,

                                    d.dis_khmer,

                                    d.dis_name,

                                    d.note_id

                                    FROM

                                    district AS d

                                    WHERE d.pro_code = $current_province

                                   ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // get commune==============

    public function opt_commune() {

        $province = $this->input->post('province');

        $district = $this->input->post('district');

        $qr = query("SELECT

                                                c.id,

                                                c.pro_code,

                                                c.dis_code,

                                                c.com_code,

                                                c.com_khmer,

                                                c.com_name

                                        FROM

                                                commune AS c

                                        WHERE

                                                c.pro_code = $province

                                        AND c.dis_code = $district

                                                                       ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    // get village==============

    //        public function opt_village() {

    //             $province = $this->input->post('province');

    //              $district = $this->input->post('district');

    //              $commune = $this->input->post('commune');

    //        $qr = query("SELECT

    //                                    v.id,

    //                                    v.pro_code,

    //                                    v.dis_code,

    //                                    v.com_code,

    //                                    v.v_code,

    //                                    v.v_khmer,

    //                                    v.v_name

    //                                    FROM

    //                                    village AS v

    //                                    WHERE

    //                                            v.pro_code = $province

    //                                    AND v.dis_code = $district

    //                                    AND v.com_code = $commune

    //                                                                   ");

    //        $res = $qr->result();

    //        header('Content-Type: application/json; charset=utf-8');

    //        echo json_encode($res);

    //    }

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



    /* get general departments */



    public function opt_unit() {

        $this->db->select('*');

        $this->db->from('unit');

        $this->db->where('status', 1);

        $query = $this->db->get();

        $res = $query->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    /* get general departments */



    public function opt_gd() {

        $this->db->select('*');

        $this->db->from('general_departments');

        $this->db->where('status', 1);

        $query = $this->db->get();

        $res = $query->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    /* get  departments */



    public function opt_dp() {

        $id = $this->input->post('general_dep_id');

        $this->db->select('*');

        $this->db->from('tbl_departments');

        $this->db->where('general_deps_id', $id);

        $this->db->where('status', 1);

        $query = $this->db->get();

        $res = $query->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    /* get  offices */



    public function opt_offices() {

        $d_id = $this->input->post('d_id');

        $this->db->select('*');

        $this->db->from('offices');

        $this->db->where('departments_id', $d_id);

        $this->db->where('status', 1);

        $this->db->where('type', 1);

        $query = $this->db->get();

        $res = $query->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    /* get province offices */



    public function opt_pro_offices() {

        $unit = $this->input->post('unit');

        $this->db->select('*');

        $this->db->from('province_office');

        $this->db->where('u_id', $unit);

        $this->db->where('status', 1);

        $this->db->where('type', 2);

        $query = $this->db->get();

        $res = $query->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    /* get  offices */



    public function opt_land_official() {

        $u_name = $this->input->post('unit');

        $this->db->select('*');

        $this->db->from('land_officials');

        $this->db->where('unit', $u_name);

        $this->db->where('status', 1);

        $query = $this->db->get();

        $res = $query->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    public function view_pdf() {

        $this->load->view('csv/retires/pdf');

    }



    public function get_ministry() {

        $qr = query("SELECT * FROM `tbl_ministry`");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



}



