<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');

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

class csv_units_dignitaries extends Admin_Controller

{



    public function __construct()

    {

        parent::__construct();

        //session_start();

        unset($_SESSION['path_file']);

        

    }



    public function csv_dignitaries()

    {

        $this->load->view('header');

        $this->load->view('csv_units_dignitaries/csv_dignitaries');

        $this->load->view('footer');

    }



    public function get_dignitaries()

    {

        $qr = query("SELECT * FROM `tbl_medal`");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }



    public function save_dignitaries()

    {



//        define("UPLOAD_PAYH", "assets/csv/photo-dignitaries/");

//        if (is_array($_FILES)) {

//            if (is_uploaded_file($_FILES['photo']['tmp_name'])) {

//                $sourcePath = $_FILES['photo']['tmp_name'];

//                //                    $targetPath = UPLOAD_PAYH . $_FILES['photo']['name'];

//                $filename = strtotime(date('Y-m-d h:i:sa'));

//                $targetPath = UPLOAD_PAYH.$filename. ".jpg";

//                move_uploaded_file($sourcePath, $targetPath);

//                    // echo '<img src="'.$targetPath.'" width="100px" height="100px" />';

//

//            }

//        }

       

            $data = array(

                'name' => $this->input->post('name'),

                'parent' => $this->input->post('selected'),

                'description' => $this->input->post('desc')

//                'image' => $targetPath

            );

            

        $this->db->insert('tbl_medal', $data);

           

            header('Content-Type: application/json; charset=utf-8');

            echo json_encode(['status' => 'success']);

//        } else {

//            header('Content-Type: application/json; charset=utf-8');

//            echo json_encode(['status' => 'error']);

//        }

//        $data = array('name' => $this->input->post('name'),

//            'parent' => $this->input->post('parent'),

//            'description' => $this->input->post('desc'),

//            'image' => $this->input->post('photo')

//        );

//        $this->db->insert('tbl_medal', $data);

//        header('Content-Type: application/json; charset=utf-8');

//        echo json_encode(['status' => 'success']);





    }



    public function delete(){

        $id = $this->input->post('id');

        if($id > 0){

            $query = query("DELETE FROM `tbl_medal` WHERE `tbl_medal`.`id` = $id");

        }

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode(['status' => 'success']);

//        redirect('csv/csv_units_dignitaries/csv_dignitaries');

    }



    public function edit($eid = ''){

        $id = (urldecode($eid));

            $query = query("SELECT * FROM `tbl_medal` WHERE `tbl_medal`.`id` = '{$id}'");

            $res = $query->row();

            $data['row'] = $res;

            $this->load->view('header');

            $this->load->view('csv_units_dignitaries/edit', $data);

            $this->load->view('footer');

    }



    public function update()

    {

        $id = $this->input->post('id');

        $name = $this->input->post('name');

        $selected = $this->input->post('selected');

        $desc = $this->input->post('desc');

//        var_dump($id,$name);

//        header('Content-Type: application/json; charset=utf-8');

//        echo json_encode($name,$id,$selected,$desc);

        if ($id >0){

            $query = query("UPDATE `tbl_medal` SET `name` = '{$name}', `parent` = '{$selected}', `description` = '{$desc}'  WHERE `tbl_medal`.`id` = '{$id}'");

        }

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode(['status' => 'success']);

    }



}



