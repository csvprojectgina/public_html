<?php

if (!defined('BASEPATH')){ exit('No direct script access allowed');}
class csv_offices extends Admin_Controller {
    // index ===============
    public function index() {
        $this->load->view('header');
        $this->load->view('csv/csv_offices/index');
        $this->load->view('footer');
    }
    // advanced search ========
    public function advanced_search() {
        $this->load->view('header');
        $this->load->view('csv/csv_info/advanced_search');
        $this->load->view('footer');
    }

    // officesform ===============
    public function form() {
        $this->load->view('header');
        $this->load->view('csv/departments/form');
        $this->load->view('footer');
    }

    // delete province===============
    public function delete() {
        $id = $this->input->post('id');
        $pro_office_id = $this->input->post('pro_office_id');
        if ($id > 0 ) {
            $query = query("update offices set status='0'  WHERE id  = '{$id}' ")->row();
          redirect('csv/offices/index');
        }
        if ($pro_office_id > 0 ) {
            $query = query("update province_office set status='0'  WHERE id  = '{$pro_office_id}' ")->row();
            redirect('csv/offices/pro_office');
        }

    }

    // edit ============
    public function edit($eid = '') {
        $id = (urldecode($eid));
        // csv ==========
        $query = query("SELECT
                            	dp.*, un.*,o.*,gd.*, office
                            FROM
                            	offices AS o
                            LEFT JOIN unit AS un ON o.u_id = un.id
                            LEFT JOIN general_departments AS gd ON gd.general_dep_id = o.general_deps_id
                            LEFT JOIN tbl_departments AS dp ON dp.d_id = o.departments_id
                WHERE
                  o.id= '{$id}' ");
                  $row = $query->row();
                  $data['row'] = $row;

     // get data from unit
        $query = query("SELECT * FROM unit  WHERE status='1' ");
        $row = $query->result();
        $data['unitquery'] = $row;
        // get general departments
         $query = query("SELECT * FROM general_departments  WHERE status='1' ");
         $row = $query->result();
         $data['gdquery'] = $row;
         // get departments
        $query = query("SELECT * FROM tbl_departments  WHERE status='1' ");
        $row = $query->result();
        $data['dpquery'] = $row;
        // main_id =========
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('csv/csv_offices/form', $data);
        $this->load->view('footer');
    }
    // edit ============
    public function edit_pro_office($eid = '') {
        $pro_office_id = (urldecode($eid));
        // csv ==========
        $query = query("SELECT
                               un.*,pro_o.*
                            FROM
                              province_office AS pro_o
                            LEFT JOIN unit AS un ON pro_o.u_id = un.id
                WHERE
                  pro_o.id= '{$pro_office_id}' ");
                  $row = $query->row();
                  $data['row'] = $row;

     // get data from unit
        $query = query("SELECT * FROM unit  WHERE status='1' ");
        $row = $query->result();
        $data['unitquery'] = $row;
        // main_id =========
        $data['id'] = $pro_office_id;
        $this->load->view('header');
        $this->load->view('csv/csv_offices/pro_office_form', $data);
        $this->load->view('footer');
    }
    function get_unit() {

        $sql = ("SELECT * FROM unit where status=1 ORDER BY id DESC");
        $data = $this->db->query($sql)->result();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function get_departments() {

        $sql = ("SELECT * FROM tbl_departments where status=1 ORDER BY d_id  DESC");
        $data = $this->db->query($sql)->result();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    //
    public function insert_offices() {
        // department Information===========
        $id = $this->input->post('id');
        $uid = $this->input->post('uid');
        $office = $this->input->post('office');
        $general_dep_id = $this->input->post('general_dep_id');
        $d_id = $this->input->post('departments_id');// departments id
        $status = '1';
        if ($id == 0) {
            $data = array(
                // Personal Information========
                'u_id' => $uid,
                'departments_id'=>$d_id,
                'office' => $office,
                'status' => $status,
                'general_deps_id' => $general_dep_id
            );
            insert('offices', $data);
        } else {
            $data = array(
              // Personal Information========
              'u_id' => $uid,
              'departments_id'=>$d_id,
              'office' => $office,
              'status' => $status,
              'general_deps_id' => $general_dep_id
            );
            update('offices', $data, array('id' => $id));
        }// if =========
        $qr_a = query("SELECT
                                      *
                                        FROM
                                                of AS a
                                        WHERE
                                                a.d_id = '$id'
                                        ORDER BY
                                                a.startdate DESC ");
        header('Content-Type: application/json; charset=utf-8');
        $re_d = $qr_d->result();
        $re_a = $qr_a->result();
        echo json_encode(array(
            'id' => $id,
            're_a' => $re_a
        ));
    }

    // gr csv_info. ================
    public function load() {
        // var ===============
        $offset = $this->input->post('offset');
        $limit = $this->input->post('limit');
        $search = trim($this->input->post('search'));
        $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));

        $where = '';
        if ($search != '') {
            $where .= "AND ( o.office LIKE '%{$search}%' ";
            $where .= "OR o.id LIKE '%{$search}%' )";
        }

        // cnt. ==============
        $q = query("SELECT COUNT(o.id) AS c
                                FROM
                                        offices AS o
                                        LEFT JOIN unit AS un ON o.u_id = un.id
                                WHERE o.status='1'");
        $total_record = $q->row()->c - 0;
        $total_page = ceil($total_record / $limit);

        // qr. ==============
        $qr = query("SELECT
                            	dp.*, un.*,o.*,gd.*, office
                            FROM
                            	offices AS o
                            LEFT JOIN unit AS un ON o.u_id = un.id
                            LEFT JOIN general_departments AS gd ON gd.general_dep_id = o.general_deps_id
                            LEFT JOIN tbl_departments AS dp ON dp.d_id = o.departments_id
                            WHERE   1 = 1 {$where}
                            AND o.status=1
                            ORDER BY
                            	un.id - 0 DESC LIMIT {$offset},  {$limit}  ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        $arr = array('total_page' => $total_page, 'res' => $res,
            'total_record' => $total_record
        );
        echo json_encode($arr);
    }
    /*province office*/
    //grid province office
    public function all_pro_office()
    {
      $this->load->view('header');
      $this->load->view('csv/csv_offices/pro_office');
      $this->load->view('footer');
    }
    public function load_pro_office()
    {
      // var ===============
      $offset = $this->input->post('offset');
      $limit = $this->input->post('limit');
      $search = trim($this->input->post('search'));
      $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));
      $where = '';
      if ($search != '') {
          $where .= "AND ( pro_o.office LIKE '%{$search}%' ";
          $where .= "OR pro_o.id LIKE '%{$search}%' )";
      }

      // cnt. ==============
      $q = query("SELECT COUNT(pro_o.id) AS c
                              FROM
                                      province_office AS pro_o
                                      LEFT JOIN unit AS un ON pro_o.u_id = un.id
                              WHERE pro_o.status='1'");
      $total_record = $q->row()->c - 0;
      $total_page = ceil($total_record / $limit);

      // qr. ==============
      $qr = query("SELECT
                            un.*,pro_o.*
                          FROM
                            province_office AS pro_o
                          LEFT JOIN unit AS un ON pro_o.u_id = un.id
                          WHERE 1=1 {$where}
                          AND
                            pro_o.`status` = '1'
                          ORDER BY
                            pro_o.u_id - 0 DESC
                        LIMIT {$offset},  {$limit}  ");
      $res = $qr->result();
      header('Content-Type: application/json; charset=utf-8');
      $arr = array('total_page' => $total_page, 'res' => $res,
          'total_record' => $total_record
      );
      echo json_encode($arr);
    }
    //insert province_office
    public function insert_pro_office() {
        // department Information===========
        $id = $this->input->post('id');
        $uid = $this->input->post('uid');
        $office = $this->input->post('province_office');
        $status = '1';
        if ($id == 0) {
            $data = array(
                // Personal Information========ss
                'u_id' => $uid,
                'office' => $office,
                'status' => $status,
            );
            insert('province_office', $data);
        } else {
            $data = array(
              // Personal Information========
              'u_id' => $uid,
              'office' => $office,
              'status' => $status,
            );
            update('province_office', $data, array('id' => $id));
        }// if =========
        $qr_a = query("SELECT
                                      *
                                        FROM
                                                of AS a
                                        WHERE
                                                a.d_id = '$id'
                                        ORDER BY
                                                a.startdate DESC ");
        header('Content-Type: application/json; charset=utf-8');
        $re_d = $qr_d->result();
        $re_a = $qr_a->result();
        echo json_encode(array(
            'id' => $id,
            're_a' => $re_a
        ));
    }
}
