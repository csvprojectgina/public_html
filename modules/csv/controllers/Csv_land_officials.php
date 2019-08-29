<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of csv_land_officials
 *
 * @author chiev
 */
class csv_land_officials extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('csv_land_officials/index');
        $this->load->view('footer');
    }

    public function get_offices() {
        $this->db->select('*');
        $this->db->from('offices');
        $this->db->where('status', 1);
        $data = $this->db->get()->result();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function insert_land_officials() {
        // department Information===========
        $id = $this->input->post('id');
        $u_name = $this->input->post('u_name');
        $office_name = $this->input->post('office_name');
        $land_official = $this->input->post('land_official');
        $status = '1';
        if ($id == 0) {
            $data = array(
                'unit' => $u_name,
                'office' => $office_name,
                'land_official' => $land_official,
                'status' => $status
            );
            insert('land_officials', $data);
        } else {
            $data = array(
                'unit' => $u_name,
                'office' => $office_name,
                'land_official' => $land_official,
                'status' => $status
            );
            update('land_officials', $data, array('id' => $id));
        }// if =========


        $qr_a = query("SELECT
                                        a.absentid,
                                        a.id,
                                        a.numberofday,
                                        a.startdate,
                                        a.enddate,
                                        a.reason
                                        FROM
                                                tbl_departments AS a
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

    public function get_land_officials() {
        // var ===============
        $offset = $this->input->post('offset');
        $limit = $this->input->post('limit');
        $search = trim($this->input->post('search'));
        $search = trim(preg_replace("/\\s+/iu", "", str_replace('​', '', $this->input->post('search'))));
        $where = '';
        if ($search != '') {
            $where .= "AND ( land_official LIKE '%{$search}%' ";
            $where .= "OR d_id LIKE '%{$search}%' ";
        }

        // cnt. ==============
        $this->db
                ->select('count(land_officials.id) as c')
                ->from('land_officials')
                ->join('unit', ' land_officials.unit= unit.id', 'left')
                ->where('land_officials.status', '1');
        $query = $this->db->get();
        $total_record = $query->row()->c - 0;
        $total_page = ceil($total_record / $limit);
        // qr. ==============
        $qr = query("SELECT
	lo.id,lo.land_official, lo.`status`, un.unit,o.office
                FROM
                        land_officials AS lo
                LEFT JOIN unit AS un ON lo.unit = un.id
                LEFT JOIN offices AS o ON lo.office = o.id
                WHERE
	lo. STATUS = 1
                ORDER BY
	lo.id - 0 DESC LIMIT {$offset},  {$limit}  ");
        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        $arr = array('total_page' => $total_page, 'res' => $res,
            'total_record' => $total_record
        );
        echo json_encode($arr);
    }

    public function delete() {
        $id = $this->input->post('id');
        if ($id > 0) {
            $query = query("update land_officials set status='0'  WHERE id  = '{$id}' ")->row();
        }
        redirect('csv/edit/index');
    }

    public function edit($eid = '') {
        $id = (urldecode($eid));
        // csv ==========
        $query = query("SELECT
                            lo.id,lo.land_official, lo.`status`, lo.unit,lo.office
                            FROM
                            	land_officials AS lo
                            LEFT JOIN unit AS un ON lo.unit = un.id
                            LEFT JOIN offices AS o ON lo.office = o.id
                WHERE
                  lo.id= '{$id}' ");
        $row = $query->row();
        $data['row'] = $row;
        // get data from unit
        $query = query("SELECT * FROM unit  WHERE status='1' ");
        $row = $query->result();
        $data['unitquery'] = $row;
          // get data from office
        $query = query("SELECT * FROM offices  WHERE status='1' ");
        $row = $query->result();
        $data['o_query'] = $row;
        // main_id =========
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('csv/csv_land_officials/form', $data);
        $this->load->view('footer');
    }

}
