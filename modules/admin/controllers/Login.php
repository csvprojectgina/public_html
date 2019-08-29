<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('headerif');
        $this->load->view('login/index');
        $this->load->view('footerif');
    }

    public function logoff() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('admin/login/index', 'refresh');
    }

    public function gologin() {
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('headerif');
            $this->load->view('login/index');
            $this->load->view('footerif');
        } else {
            $user_name = $this->input->post('user_name');
            $password = $this->input->post('password');
            $u = escape_str_login($user_name);
            $p = escape_str_login($password);
            $query = query("SELECT u.* FROM users AS u WHERE u.`password` = '$p' AND ( u.user_name = '{$u}' OR u.e_mail = '{$u}' ) ");
            if ($query->num_rows() > 0) {
                $this->session->set_userdata($query->row_array());
                $this->session->set_userdata("users", "users");

                // activity log ============
                query("INSERT INTO activity_log (user_name,full_name,action) VALUES ('" . $this->session->userdata('user_name') . "','" . $this->session->userdata('full_name') . "','Log In') ");
                redirect('csv/home/index', 'refresh');
            } else {
                /* $querym = query("SELECT u.* FROM members AS u WHERE u.`password` = '{$p}' AND ( u.user_name = '{$u}' OR u.e_mail = '{$u}' ) ");
                  if ($querym->num_rows() > 0) {
                  $this->session->set_userdata($querym->row_array());
                  $this->session->set_userdata("members", "members");
                  redirect('admin/members/index', 'refresh');
                  } */
                $data['failedlogin'] = t('ឈ្មោះអ្នកប្រើប្រាស់ ឬ លេខសំងាត់មិនត្រឹមត្រូវ​ !');
                $this->load->view('headerif');
                $this->load->view('login/index', $data);
                $this->load->view('footerif');
            }
        }
    }

}
