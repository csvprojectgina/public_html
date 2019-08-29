<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Role_permission extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    // roles ==========================================
    public function index() {
        /* $qr_role = query("SELECT
          z_r.id,
          z_r.role_name
          FROM
          z_roles AS z_r ")->result();
         * 
         */

        $qr_role = query("SELECT DISTINCT
                                    z_r.id,
                                    z_r.role_name,
                                    z_m_r.role_id
                            FROM
                                    z_roles AS z_r
                            LEFT JOIN z_modules_in_roles AS z_m_r ON z_r.id = z_m_r.role_id
                            ORDER BY
                                    z_r.role_name ");

        $data['qr_role'] = $qr_role;
        $this->load->view('header');
        $this->load->view('admin/role_permission/index', $data);
        $this->load->view('footer');
    }

    // modules ===========================================
    function get_module() {
        $id = $this->input->post('id');

        /* $qr_m = query("SELECT
          z_m.id,
          z_m.module_name
          FROM
          z_modules AS z_m
          ORDER BY
          z_m.module_name ");
         * 
         */

        $qr_m = query("SELECT DISTINCT  z_m.id, z_m.module_name, m.module_id, z_m.note
                            FROM
                                    z_modules AS z_m
                            LEFT JOIN (
                                    SELECT
                                            *
                                    FROM
                                            z_modules_in_roles
                                    WHERE
                                            role_id = '{$id}'
                            ) AS m ON z_m.id = m.module_id  WHERE z_m.`is_status` = 1
                            ORDER BY
                                    z_m.module_name ASC  ");

        header('Content-Type: application/json; charset=utf-8');
        $data = $qr_m->result();
        echo json_encode($data);
    }

    // controllers ==========================================
    function get_controller() {
        $module_id = $this->input->post('module_id');
        $role_id = $this->input->post('role_id');

        /* $qr_c = query("SELECT                                    
          z_c.id,
          z_c.controller_name
          FROM
          z_controllers AS z_c
          WHERE
          z_c.module_id = '{$module_id}'
          ORDER BY
          z_c.controller_name ");
         * 
         */

        $qr_c = query("SELECT DISTINCT
                                    z_c.id,
                                   
                                    CASE WHEN z_c.note IS NULL THEN   z_c.controller_name ELSE    z_c.note END as controller_name,
                                    
                                    z_c_r.controller_id
                            FROM
                                    z_controllers AS z_c
                            LEFT JOIN (
                                    SELECT
                                            *
                                    FROM
                                            z_controllers_in_roles
                                    WHERE
                                            role_id = '{$role_id}'
                            ) AS z_c_r ON z_c.id = z_c_r.controller_id
                            WHERE
                                    z_c.module_id = '{$module_id}'  AND z_c.is_status = 1
                            ORDER BY
                                    z_c.controller_name ASC ");

        header('Content-Type: application/json; charset=utf-8');
        $data = $qr_c->result();
        echo json_encode($data);
    }

    // actions ===========================================
    function get_action() {
        $controller_id = $this->input->post('controller_id');
        $role_id = $this->input->post('role_id');

        /* $qr_a = query("SELECT
          z_a.id,
          z_a.action_name
          FROM
          z_actions AS z_a
          WHERE
          z_a.controller_id = '{$controller_id}'
          ORDER BY
          z_a.action_name ");
         * 
         */

        $qr_a = query("SELECT DISTINCT
                                    z_a.id,
                                    z_a.action_name,
                                    z_a_r.action_id
                            FROM
                                    z_actions AS z_a
                            LEFT JOIN (
                                    SELECT
                                            *
                                    FROM
                                            z_actions_in_roles
                                    WHERE
                                            role_id = '{$role_id}'
                            ) AS z_a_r ON z_a.id = z_a_r.action_id
                            WHERE
                                    z_a.controller_id = '{$controller_id}'
                            ORDER BY
                                    z_a.action_name ASC ");

        header('Content-Type: application/json; charset=utf-8');
        $data = $qr_a->result();
        echo json_encode($data);
    }

    // get chk mode. ==========================================
    function get_chk_mode() {
        // $controller_id = $this->input->post('controller_id');
        $qr_ = query("SELECT
                                z_m_in_r.module_id
                        FROM
                                z_modules_in_roles AS z_m_in_r ");
        header('Content-Type: application/json; charset=utf-8');
        $data = $qr_->result();
        echo json_encode($data);
    }

    // insert mode. in roles =================================
    function insert_mode_in_r() {
        $id_r = $this->input->post('id_r');
        $id_mode = $this->input->post('id_mode');
        $data = array(
            'module_id' => $id_mode,
            'role_id' => $id_r
        );
        insert('z_modules_in_roles', $data);
        echo "";
    }

    // del. mode. in roles =================================
    function del_mode_in_r() {
        $id_r = $this->input->post('id_r');
        $id_mode = $this->input->post('id_mode');
        $qr_del = query("DELETE FROM z_modules_in_roles WHERE module_id = '{$id_mode}' AND role_id = '{$id_r}' ");
        echo "";
    }

    // insert con. in roles ==================================
    function insert_con_in_r() {
        $id_r = $this->input->post('id_r');
        $id_con = $this->input->post('id_con');

        $data = array(
            'controller_id' => $id_con,
            'role_id' => $id_r
        );
        insert('z_controllers_in_roles', $data);
        echo "";
    }

    // del. con. in roles =================================
    function del_con_in_r() {
        $id_r = $this->input->post('id_r');
        $id_con = $this->input->post('id_con');
        $qr_del = query("DELETE FROM z_controllers_in_roles WHERE controller_id = '{$id_con}' AND role_id = '{$id_r}' ");
        echo "";
    }

    // insert action in roles ==============================
    function insert_act_in_r() {
        $id_r = $this->input->post('id_r');
        $id_a = $this->input->post('id_a');

        $data = array(
            'action_id' => $id_a,
            'role_id' => $id_r
        );
        insert('z_actions_in_roles', $data);
        echo "";
    }

    // del. action in roles =================================
    function del_act_in_r() {
        $id_r = $this->input->post('id_r');
        $id_a = $this->input->post('id_a');
        $qr_del = query("DELETE FROM z_actions_in_roles WHERE action_id = '{$id_a}' AND role_id = '{$id_r}' ");
        echo "";
    }

    // qr. chk. mode in roles =================================
    function get_chk_mode_r() {
        $id_r = $this->input->post('id_r') - 0;
        // $id_mode = $this->input->post('id_mode') - 0;

        $qr = query("SELECT
                                m_r.role_id,
                                m_r.module_id
                        FROM
                                z_modules_in_roles AS m_r
                        WHERE
                                m_r.role_id = '{$id_r}' ");

        $data = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    // qr. get chk. roles =================================
    function get_chk_r() {
        $id_r = $this->input->post('id_r') - 0;
        $id_mode = $this->input->post('id_mode') - 0;

        $qr = query("SELECT
                                m_r.role_id,
                                m_r.module_id
                        FROM
                                z_modules_in_roles AS m_r
                        WHERE
                                m_r.role_id = {$id_r}
                        AND m_r.module_id = {$id_mode} ");

        $data = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    /* function ReadAllController($module_id) {
      $q = $this->db->query("SELECT
      c.id,
      c.controller
      FROM
      z_controllers AS c
      WHERE c.module_id = '{$module_id}' ");
      return $q->result();
      }

      function get_controller() {
      $module_id = $this->input->post('module_id');
      $result = ReadAllController($module_id);
      header('Content-type: application/json');
      echo json_encode($result);
      // echo $_GET['callback'] . '('.json_encode($result).')'; // JSONP
      } */
}
