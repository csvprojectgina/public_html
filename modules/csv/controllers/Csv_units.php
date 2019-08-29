<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class csv_units extends Admin_Controller {

    // index ===============
    public function index() {
        $this->load->view('header');
        $this->load->view('csv/units/index');
        $this->load->view('footer');
    }

    // advanced search ========
    public function advanced_search() {
        $this->load->view('header');
        $this->load->view('csv/csv_info/advanced_search');
        $this->load->view('footer');
    }

    // form ===============
    public function form() {
        $this->load->view('header');
        $this->load->view('csv/csv_units/form');
        $this->load->view('footer');
    }

    // delete ===============
    public function delete() {
        $id = $this->input->post('id');

        if ($id > 0) {
            $query = query("update unit set status='0'  WHERE id  = '{$id}' ")->row();
        }
        redirect('csv/csv_unit/index');
    }

    // edit ============
    public function edit($eid = '') {
        $id = (urldecode($eid));

        // csv ==========
        $query = query("SELECT * FROM unit  WHERE id = '{$id}' ");
        $row = $query->row();
        $data['row'] = $row;



        // main_id =========
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('csv/units/form', $data);
        $this->load->view('footer');
    }

    // insert ===============
    public function insert_unit() {
        $ids = $this->input->post('id');

        if ($ids == 0) {
            // Personal Information===========
            $unitname = $this->input->post('unit');
            $status = '1';
            $data = array(
                // Personal Information========
                'unit' => $unitname,
                'status' => $status
            );
            insert('unit', $data);
        } else {
            //main id for update=========
            $id = $this->input->post('id');
            // Personal Information===========
            $unitname = $this->input->post('unit');

            $data = array(
                // Personal Information========
                'unit' => $unitname
            );
            update('unit', $data, array('id' => $id));
        }// if =========

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
        echo json_encode(array(
            'id' => $id,
            're_d' => $re_d,
            're_t' => $re_t,
            're_l' => $re_l,
            're_m' => $re_m,
            're_a' => $re_a
        ));
    }

    // f.insert workhistory=========
    public function insert_workhistory() {
        $id = $this->input->post('id_wh') - 0;
        if ($id == 0) {
            exit();
        } else {
            // update work history================
            $work_history_id = $this->input->post('work_history_id');
            $start_date = $this->input->post('start_date');
            $stop_date = $this->input->post('stop_date');
            $institution = $this->input->post('institution');
            $department = $this->input->post('department');
            $office = $this->input->post('office');
            $position = $this->input->post('position');
            for ($i = 0; $i < count($start_date); $i++) {
                if ($start_date[$i] != '' || $stop_date[$i] != '' || $institution[$i] != '' || $department[$i] != '' || $office[$i] != '' || $position[$i] != '') {
                    if ($work_history_id[$i] - 0 > 0) {
                        $data_workhistory = array(
                            'start_date' => $start_date[$i],
                            'stop_date' => $stop_date[$i],
                            'institution' => $institution[$i],
                            'department' => $department[$i],
                            'office' => $office[$i],
                            'position' => $position[$i]
                        );
                        update('workhistory', $data_workhistory, array('work_history_id' => $work_history_id[$i]));
                    } else {
                        $data_workhistory = array(
                            'id' => $id,
                            'start_date' => $start_date[$i],
                            'stop_date' => $stop_date[$i],
                            'institution' => $institution[$i],
                            'department' => $department[$i],
                            'office' => $office[$i],
                            'position' => $position[$i]
                        );
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
            $old_date = $this->input->post('old_date');
            $new_level = $this->input->post('new_level');
            $new_date = $this->input->post('new_date');
            for ($i = 0; $i < count($old_level); $i++) {
                if ($old_level[$i] != '' || $old_date[$i] != '' || $new_level[$i] != '' || $new_date[$i] != '') {
                    if ($wkd_id[$i] - 0 > 0) {
                        $data_workbydegree = array(
                            'old_level' => $old_level[$i],
                            'old_date' => $old_date[$i],
                            'new_level' => $new_level[$i],
                            'new_date' => $new_date[$i]
                        );
                        update('workbydegree', $data_workbydegree, array('wkd_id' => $wkd_id[$i]));
                    } else {
                        // insert workbydegree===========
                        $data_workbydegree = array(
                            'id' => $id,
                            'old_level' => $old_level[$i],
                            'old_date' => $old_date[$i],
                            'new_level' => $new_level[$i],
                            'new_date' => $new_date[$i]
                        );
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
            $newlevel = $this->input->post('newlevel');
            $newdate = $this->input->post('newdate');
            for ($i = 0; $i < count($oldlevel); $i++) {
                if ($oldlevel[$i] != '' || $olddate[$i] != '' || $newlevel[$i] != '' || $newdate[$i] != '') {
                    if ($wkph_is_id[$i] - 0 > 0) {
                        $data_workpromotionhistory = array(
                            'oldlevel' => $oldlevel[$i],
                            'olddate' => $olddate[$i],
                            'newlevel' => $newlevel[$i],
                            'newdate' => $newdate[$i]
                        );
                        update('workpromotionhistory', $data_workpromotionhistory, array('wkph_is_id' => $wkph_is_id[$i]));
                    } else {
                        $data_workpromotionhistory = array(
                            'id' => $id,
                            'oldlevel' => $oldlevel[$i],
                            'olddate' => $olddate[$i],
                            'newlevel' => $newlevel[$i],
                            'newdate' => $newdate[$i]
                        );
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
            $date = $this->input->post('date');
            $framework = $this->input->post('framework');
            $class_level = $this->input->post('class_level');
            for ($i = 0; $i < count($title); $i++) {
                if ($title[$i] != '' || $level_cph[$i] != '' || $rank[$i] != '' || $date[$i] != '' || $framework[$i] != '' || $class_level[$i] != '') {
                    if ($wkh_is_id[$i] - 0 > 0) {
                        $data_workclasspromotehistory = array(
                            'title' => $title[$i],
                            'level_cph' => $level_cph[$i],
                            'rank' => $rank[$i],
                            'date' => $date[$i],
                            'framework' => $framework[$i],
                            'class_level' => $class_level[$i]
                        );
                        update('workclasspromotehistory', $data_workclasspromotehistory, array('wkh_is_id' => $wkh_is_id[$i]));
                    } else {
                        $data_workclasspromotehistory = array(
                            'id' => $id,
                            'title' => $title[$i],
                            'level_cph' => $level_cph[$i],
                            'rank' => $rank[$i],
                            'date' => $date[$i],
                            'framework' => $framework[$i],
                            'class_level' => $class_level[$i]
                        );
                        insert('workclasspromotehistory', $data_workclasspromotehistory);
                    }
                }
            }
        }
        //re-update workclasspromotehistory=========
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
            $date_transfer = $this->input->post('date_transfer');
            $to_role = $this->input->post('to_role');
            $status = $this->input->post('status');
            for ($i = 0; $i < count($role); $i++) {
                if ($role[$i] != '' || $date_transfer[$i] != '' || $to_role[$i] != '' || $status[$i] != '') {
                    if ($wkt_id[$i] - 0 > 0) {
                        $data_worktransfer = array(
                            'role' => $role[$i],
                            'date_transfer' => $date_transfer[$i],
                            'to_role' => $to_role[$i],
                            'status' => $status[$i]
                        );
                        update('worktransfer', $data_worktransfer, array('wkt_id' => $wkt_id[$i]));
                    } else {
                        // insert worktransfer===========
                        $data_worktransfer = array(
                            'id' => $id,
                            'role' => $role[$i],
                            'date_transfer' => $date_transfer[$i],
                            'to_role' => $to_role[$i],
                            'status' => $status[$i]
                        );
                        insert('worktransfer', $data_worktransfer);
                    }
                }
            }
        }
        //re-update worktransfer=========
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
            // update workframeworkout===========
            $wkfw_id = $this->input->post('wkfw_id');
            $start_date2 = $this->input->post('start_date2');
            $stop_date2 = $this->input->post('stop_date2');
            $title_framework = $this->input->post('title_framework');
            $institution_framework = $this->input->post('institution_framework');
            $note_framework = $this->input->post('note_framework');
            for ($i = 0; $i < count($start_date2); $i++) {
                if ($start_date2[$i] != '' || $stop_date2[$i] != '' || $title_framework[$i] != '' || $institution_framework[$i] != '' || $note_framework[$i] != '') {
                    if ($wkfw_id[$i] - 0 > 0) {
                        $data_workframeworkout = array(
                            'start_date2' => $start_date2[$i],
                            'stop_date2' => $stop_date2[$i],
                            'title_framework' => $title_framework[$i],
                            'institution_framework' => $institution_framework[$i],
                            'note_framework' => $note_framework[$i]
                        );
                        update('workframeworkout', $data_workframeworkout, array('wkfw_id' => $wkfw_id[$i]));
                    } else {
                        // insert workframeworkout===========                }
                        $data_workframeworkout = array(
                            'id' => $id,
                            'start_date2' => $start_date2[$i],
                            'stop_date2' => $stop_date2[$i],
                            'title_framework' => $title_framework[$i],
                            'institution_framework' => $institution_framework[$i],
                            'note_framework' => $note_framework[$i]
                        );
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
            $regulation_start_date = $this->input->post('regulation_start_date');
            $regulation_stop_date = $this->input->post('regulation_stop_date');
            $deleting_accouncement_date = $this->input->post('deleting_accouncement_date');
            $deleting_date = $this->input->post('deleting_date');
            $reason_deleting = $this->input->post('reason_deleting');
            for ($i = 0; $i < count($regulation_start_date); $i++) {
                if ($regulation_start_date[$i] != '' || $regulation_stop_date[$i] != '' || $deleting_accouncement_date[$i] != '' || $deleting_date[$i] != '' || $reason_deleting[$i] != '') {
                    if ($wknd_id[$i] - 0 > 0) {
                        $data_worknamedeleting = array(
                            'regulation_start_date' => $regulation_start_date[$i],
                            'regulation_stop_date' => $regulation_stop_date[$i],
                            'deleting_accouncement_date' => $deleting_accouncement_date[$i],
                            'deleting_date' => $deleting_date[$i],
                            'reason_deleting' => $reason_deleting[$i]
                        );
                        update('worknamedeleting', $data_worknamedeleting, array('wknd_id' => $wknd_id[$i]));
                    } else {
                        // insert worknamedeleting===========
                        $data_worknamedeleting = array(
                            'id' => $id,
                            'regulation_start_date' => $regulation_start_date[$i],
                            'regulation_stop_date' => $regulation_stop_date[$i],
                            'deleting_accouncement_date' => $deleting_accouncement_date[$i],
                            'deleting_date' => $deleting_date[$i],
                            'reason_deleting' => $reason_deleting[$i]
                        );
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
            $start_date3 = $this->input->post('start_date3');
            $stop_date3 = $this->input->post('stop_date3');
            $note_frees_alary = $this->input->post('note_frees_alary');
            for ($i = 0; $i < count($start_date3); $i++) {
                if ($start_date3[$i] != '' || $stop_date3[$i] != '' || $note_frees_alary[$i] != '') {
                    if ($wkf_salary_id[$i] - 0 > 0) {
                        $data_workfreesalary = array(
                            'start_date3' => $start_date3[$i],
                            'stop_date3' => $stop_date3[$i],
                            'note_frees_alary' => $note_frees_alary[$i]);
                        update('workfreesalary', $data_workfreesalary, array('wkf_salary_id' => $wkf_salary_id[$i]));
                    } else {
                        // insert workfreesalary===========
                        $data_workfreesalary = array(
                            'id' => $id,
                            'start_date3' => $start_date3[$i],
                            'stop_date3' => $stop_date3[$i],
                            'note_frees_alary' => $note_frees_alary[$i]
                        );
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
            // update worktitlelevel===========
            $wktl_id = $this->input->post('wktl_id');
            $current_title = $this->input->post('current_title');
            $seniority_date = $this->input->post('seniority_date');
            $number_of_seniority = $this->input->post('number_of_seniority');
            $level_title = $this->input->post('level_title');
            $date_title = $this->input->post('date_title');
            for ($i = 0; $i < count($current_title); $i++) {
                if ($current_title[$i] != '' || $seniority_date[$i] != '' || $number_of_seniority[$i] != '' || $level_title[$i] != '' || $date_title[$i] != '') {
                    if ($wktl_id[$i] - 0 > 0) {
                        $data_worktitlelevel = array(
                            'current_title' => $current_title[$i],
                            'seniority_date' => $seniority_date[$i],
                            'number_of_seniority' => $number_of_seniority[$i],
                            'level_title' => $level_title[$i],
                            'date_title' => $date_title[$i]
                        );
                        update('worktitlelevel', $data_worktitlelevel, array('wktl_id' => $wktl_id[$i]));
                    } else {
                        // insert worktitlelevel===========
                        $data_worktitlelevel = array(
                            'id' => $id,
                            'current_title' => $current_title[$i],
                            'seniority_date' => $seniority_date[$i],
                            'number_of_seniority' => $number_of_seniority[$i],
                            'level_title' => $level_title[$i],
                            'date_title' => $date_title[$i]
                        );
                        insert('worktitlelevel', $data_worktitlelevel);
                    }
                }
            }
        }
        //re-update worktitlelevel=========
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

    public function insert_children() {
        $id = $this->input->post('id_ch') - 0;
        if ($id == 0) {
            exit();
        } else {
            // update children========
            $child_id = $this->input->post('child_id');
            $childname = $this->input->post('childname');
            $gender_child = $this->input->post('gender_child');
            $dateofbirth_child = $this->input->post('dateofbirth_child');
            $date_start_child = $this->input->post('date_start_child');
            $date_stop_child = $this->input->post('date_stop_child');
            for ($i = 0; $i < count($childname); $i++) {
                if ($childname[$i] != '' || $gender_child[$i] != '' || $dateofbirth_child[$i] != '' || $date_start_child[$i] != '' || $date_stop_child[$i] != '') {
                    if ($child_id[$i] - 0 > 0) {
                        $data_children = array(
                            'childname' => $childname[$i],
                            'gender_child' => $gender_child[$i],
                            'dateofbirth_child' => $dateofbirth_child[$i],
                            'date_start_child' => $date_start_child[$i],
                            'date_stop_child' => $date_stop_child[$i]
                        );
                        update('children', $data_children, array('child_id' => $child_id[$i]));
                    } else {
                        // insert children========
                        $data_children = array(
                            'id' => $id,
                            'childname' => $childname[$i],
                            'gender_child' => $gender_child[$i],
                            'dateofbirth_child' => $dateofbirth_child[$i],
                            'date_start_child' => $date_start_child[$i],
                            'date_stop_child' => $date_stop_child[$i]
                        );
                        insert('children', $data_children);
                    }
                }
            }
        }
        //re-update children=========
        $qr_childrened = query("SELECT
                                                        *
                                                FROM
                                                        children AS ch
                                                WHERE
                                                        ch.id = '{$id}'
                                                ORDER BY
                                                        ch.childname");
        header('Content-Type: application/json; charset=utf-8');
        $re_childrened = $qr_childrened->result();
        echo json_encode(array('id' => $id, 're_childrened' => $re_childrened));
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
            $where .= "AND ( unit LIKE '%{$search}%' ";
            $where .= "OR id LIKE '%{$search}%')";
        }

        // cnt. ==============
        $q = query("SELECT COUNT(cs.id) AS c
                                FROM
                                        unit AS cs
                                WHERE status='1'");
        $total_record = $q->row()->c - 0;
        $total_page = ceil($total_record / $limit);

        // qr. ==============
        $qr = query("SELECT * FROM unit
                            WHERE   1 = 1 {$where} and  status=1
                            ORDER BY id - 0
                            DESC LIMIT {$offset}, {$limit}  ");

        $res = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        $arr = array('total_page' => $total_page, 'res' => $res,
            'total_record' => $total_record
        );
        echo json_encode($arr);
    }

}
