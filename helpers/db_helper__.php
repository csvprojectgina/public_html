<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function year_kh($xyear_kh) {
    $arr = array('០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩');
    $cc = str_split($xyear_kh);
    $str = '';
    foreach ($cc as $k => $v) {
        $str .= $arr[$v];
    }
    return $str;
}

// get link ===================================
function get_link($modoule_name, $controller_name, $action_name, $label) {
    $ci = & get_instance();
    $role_id = $ci->session->userdata('dmid');
    // echo $role_id;
    $str = "";

    // get mode. =========================
    $qr_get_m = $ci->db->query("SELECT
                                            m.id AS mode_id,
                                            m.module_name,
                                            m_r.role_id
                                    FROM
                                            z_modules AS m
                                    INNER JOIN z_modules_in_roles AS m_r ON m.id = m_r.module_id
                                    WHERE
                                            m_r.role_id = '{$role_id}'
                                    AND m.module_name = '{$modoule_name}' ");


    if ($qr_get_m->num_rows() > 0) {
        $m_row = $qr_get_m->row();
        if ($m_row->mode_id > 0) {

            // get con. ===========================
            $qr_get_c = $ci->db->query("SELECT
                                                    c.id AS con_id,
                                                    c.module_id,
                                                    c.controller_name,
                                                    c_r.role_id
                                            FROM
                                                    z_controllers AS c
                                            INNER JOIN z_controllers_in_roles AS c_r ON c.id = c_r.controller_id
                                            WHERE
                                                    c_r.role_id = '{$role_id}'
                                            AND c.module_id = '{$m_row->mode_id}'
                                            AND c.controller_name = '{$controller_name}' ");
            if ($qr_get_c->num_rows() > 0) {
                $c_row = $qr_get_c->row();
                if ($c_row->con_id > 0) {

                    // get act. =========================
                    $qr_get_a = $ci->db->query("SELECT
                                                            a.id,
                                                            a.controller_id,
                                                            a.action_name,
                                                            a_r.role_id
                                                    FROM
                                                            z_actions AS a
                                                    INNER JOIN z_actions_in_roles AS a_r ON a.id = a_r.action_id
                                                    WHERE
                                                            a_r.role_id = '{$role_id}'
                                                    AND a.controller_id = '{$c_row->con_id}'
                                                    AND a.action_name = '{$action_name}' ");
                    if ($qr_get_a->num_rows() > 0) {
                        $a_row = $qr_get_a->row();
                        if ($a_row->role_id > 0) {
                            echo "<li><a href='" . site_url($m_row->module_name .
                                    '/' . $c_row->controller_name .
                                    '/' . $a_row->action_name) . "'>{$label}</a></li>";
                        }
                    }
                }
            }
        }
    }
    echo $str;
}

// month as number ====================================================
function month_kh($xmonth_kh) {
    $arr = array('០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩', '១០', '១១', '១២');
    $cc = str_split($xmonth_kh);
    $str = '';
    foreach ($cc as $k => $v) {
        $str .= $arr[$v];
    }
    return $str;
}

// month khmer as letter ===================================
function month_kh_letter() {
    // kh month ==================================
    $month = date('m');
    switch ($month) {
        case '01':
            $month = 'មករា';
            break;
        case '02':
            $month = 'កុម្ភៈ';
            break;
        case '03':
            $month = 'មិនា';
            break;
        case '04':
            $month = 'មេសា';
            break;
        case '05':
            $month = 'ឧសភា ';
            break;
        case '06':
            $month = 'មិថុនា';
            break;
        case '07':
            $month = 'កក្កដា';
            break;
        case '08':
            $month = 'សីហា';
            break;
        case '09':
            $month = 'កញ្ញា';
            break;
        case '10':
            $month = 'តុលា';
            break;
        case '11':
            $month = 'វិច្ឆិកា';
            break;
        default:
            $month = 'ធ្នូ';
            break;
    }
    echo $month;
}

function day_kh($xday_kh) {
    $arr = array('០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩', '១០', '១១', '១២', '១៣', '១៤', '១៥', '១៦',
        '១៧', '១៨', '១៩', '២០', '២១', '២២', '២៣', '២៤', '២៥', '២៦', '២៧', '២៨', '២៩', '៣០', '៣១');
    $cc = str_split($xday_kh);
    $str = '';
    foreach ($cc as $k => $v) {
        $str .= $arr[$v];
    }
    return $str;
}

if (!function_exists('escape_str')) {

    function escape_str($str) {
        $ci = & get_instance();
        return $ci->db->escape_str($str);
    }

}
if (!function_exists('escape_str_login')) {

    function escape_str_login($str) {
        $ci = & get_instance();
        return $ci->db->escape_str($str);
    }

}
if (!function_exists('escape_like_str')) {

    function escape_like_str($str) {
        $ci = & get_instance();
        return $ci->db->escape_like_str($str);
    }

}

if (!function_exists('query')) {

    function query($sql) {
        $ci = & get_instance();
        return $ci->db->query($sql);
    }

}

if (!function_exists('insert')) {

    function insert($table, $data) {
        $ci = & get_instance();
        return $ci->db->insert($table, $data);
    }

}

if (!function_exists('insert_id')) {

    function insert_id() {
        $ci = & get_instance();
        return $ci->db->insert_id();
    }

}

if (!function_exists('update')) {

    function update($table, $data, $array_where) {
        $ci = & get_instance();
        return $ci->db->update($table, $data, $array_where);
    }

}

if (!function_exists('delete')) {

    function delete($table, $array_where) {
        $ci = & get_instance();
        return $ci->db->delete($table, $array_where);
    }

}

function simple_encrypt($text) {
    return trim(base64_encode($text));
}

function simple_decrypt($text) {
    return trim(base64_decode($text));
}

/* function simple_encrypt($text) {
  return ($text - 0) * 7;
  $salt = 'lion007';
  return trim(base64_encode(mcrypt_encrypt(MCRYPT_3DES, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
  }

  function simple_decrypt($text) {
  return ($text - 0) / 7;
  $salt = 'lion007';
  return trim(mcrypt_decrypt(MCRYPT_3DES, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
  } */

function t($txt = '') {
    return $txt;
}

function val($txt) {
    try {
        return $txt . '';
    } catch (Exception $e) {
        return '';
    }
}

// sel. options ===================================
if (!function_exists('myCombo')) {
    function myCombo($arr_op, $selected = "") {
        $stop = "";
        if ($selected != "") {
            $arrSelected = explode(",", $selected);
        }
        if (count($arr_op) > 0) {
            foreach ($arr_op as $op) {
                if (count($arrSelected) > 0) {
                    if (in_array($op, $arrSelected)) {
                        $stop.='<option value="' . $op . '" selected="selected">' . $op . '</option>';
                    } else {
                        $stop.='<option value="' . $op . '">' . $op . '</option>';
                    }
                } else {
                    $stop.='<option value="' . $op . '">' . $op . '</option>';
                }
            }
        }
        return $stop;
    }
}

// ======================================
if (!function_exists('getoption')) {
    function getoption($sql, $key, $display, $select = '', $istop = false) {
        $ci = & get_instance();
        $query = $ci->db->query($sql);

        // =============================
//        if ($select != "") {
//            $arrSelected = explode(",", $select);
//        }
        // =============================

        $op = "";
        if ($istop) {
            $op .= '<option value=""></option>';
        }
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $op .= '<option ' . ($select == $row[$key] ? ' selected= "selected" ' : '') . '  value="' . $row[$key] . '">' . $row[$display] . '</option>';
            }
        }
        return $op;
    }
}

function gen_pay_multi($league_detal_id) {
    $ci = & get_instance();
    $sql = "SELECT DISTINCT
                d.play_id
                FROM
                play_multi_detail AS d
                WHERE d.league_detal_id = '{$league_detal_id}' ";
    $query = $ci->db->query($sql);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $play_id = $row->play_id;
            $q = $ci->db->query("SELECT
                    md.result,
                    md.percentage
                    FROM
                    play_multi_detail AS md
                    WHERE md.play_id = '{$play_id}' AND md.result > -1 ");

            $c_win = $q->num_rows();

            $pay_rate = 0;
            $p = 0;

            $arr_win = array();
            $am = array();

            if ($c_win > 0) {
                foreach ($q->result() as $rrq) {
                    $result = $rrq->result - 0;
                    $p = $rrq->percentage - 0;
                    if ($result == -0.5) {
                        $pay_rate *= (1 - 0.5);
                        $am[] = 0.5;
                        $arr_win = 0;
                    } else {
                        $pay_rate *= (1 + $result * $p);
                        $am[] = 1;
                        $arr_win[] = $result;
                    }
                }
                $p = $p / 100;
            }

            $qca = $ci->db->query("SELECT
                    count(md.id) as c
                    FROM
                    play_multi_detail AS md
                    WHERE md.play_id = '{$play_id}' ")->row()->c - 0;



            $qp = $ci->db->query("SELECT p.id,
                                        p.total_bong,
                                        p.amount,
                                        p.pay_amount
                                        FROM
                                        play_multi AS p
                                        WHERE p.play_id = '{$play_id}' ");
            if ($qp->num_rows() > 0) {
                $rp = $qp->row();
                $total_bong = $rp->total_bong - 0;
                $amount = $rp->amount - 0;
                $idxx = $rp->id;
                $total_pay = $pay_rate * $amount;

                if ($qca == 3) {
                    if ($c_win == 2) {
                        if ($total_bong == 4) {
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                    }
                    if ($c_win == 3) {
                        if ($total_bong == 1) {
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                        if ($total_bong == 4) {

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                    }
                } else if ($qca == 4) {
                    if ($c_win == 3) {
                        if ($total_bong == 5) {
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                    }
                    if ($c_win == 4) {
                        if ($total_bong == 1) {
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                        if ($total_bong == 5) {
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                    }
                } else if ($qca == 5) {
                    if ($c_win == 3) {
                        if ($total_bong == 10 || $total_bong == 16 || $total_bong == 31) {
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                    }
                    if ($c_win == 4) {
                        if ($total_bong == 6) {
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                        if ($total_bong == 10 || $total_bong == 16) {
                            if ($total_bong == 10) {
                                $total_pay = 0;
                            }
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                        if ($total_bong == 31) {

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                    }
                    if ($c_win == 5) {
                        if ($total_bong == 1) {
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }

                        if ($total_bong == 6) {

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }

                        if ($total_bong == 10) {
                            $total_pay = 0;
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }

                        if ($total_bong == 16) {

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);


                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }

                        if ($total_bong == 31) {

                            //win 5 x 4 = 5;
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            //win 5 x 4 x 4 = 5;
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            // win 5 x 4 x 3
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            //==============================================================================================================

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            // end win 5 x 4 x 3

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                    }
                } else if ($qca == 6) {
                    if ($c_win == 3) {
                        if ($total_bong == 20 || $total_bong == 42) {
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                    }

                    if ($c_win == 4) {
                        if ($total_bong == 15 || $total_bong == 43) {
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }

                        if ($total_bong == 20) {
                            $total_pay = 0;
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }

                        if ($total_bong == 42) {
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                    }

                    if ($c_win == 5) {
                        if ($total_bong == 7) {
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                        if ($total_bong == 15) {
                            $total_pay = 0;
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                        if ($total_bong == 20) {
                            $total_pay = 0;
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                        if ($total_bong == 42) {
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);


                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                        if ($total_bong == 43) {
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                    }

                    if ($c_win == 6) {
                        if ($total_bong == 1) {
                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                        if ($total_bong == 7) {
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }

                        if ($total_bong == 15) {
                            $total_pay = 0;

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }

                        if ($total_bong == 20) {
                            $total_pay = 0;
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                        if ($total_bong == 42) {
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);


                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);


                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }

                        if ($total_bong == 43) {

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);


                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            //==========================================================

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[1] + $arr_win[1] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[0] + $arr_win[0] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[5] + $arr_win[5] * $p);
                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[2] + $arr_win[2] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[1] + $arr_win[1] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);

                            $total_pay += $amount * ($am[2] + $arr_win[2] * $p) * ($am[3] + $arr_win[3] * $p) * ($am[4] + $arr_win[4] * $p) * ($am[5] + $arr_win[5] * $p);


                            $ci->db->query("UPDATE play_multi SET pay = '{$total_pay}' WHERE id = '{$idxx}' ; ");
                        }
                    }
                }
            }
        }
    }
}

function validate_time($str) {
//Assume $str SHOULD be entered as HH:MM
    // list($hh, $mm) = split('[:]', $str);
    $arr = split('[:]', $str);
    $hh = isset($arr[0]) ? $arr[0] : '';
    $mm = isset($arr[1]) ? $arr[1] : '';

    if (!is_numeric($hh) || !is_numeric($mm)) {
        return FALSE;
    } else if ((int) $hh > 24 || (int) $mm > 59) {
        return FALSE;
    } else if (mktime((int) $hh, (int) $mm) === FALSE) {
        return FALSE;
    }

    return TRUE;
}

function dmid_in() {
    return '1,2,3,4,5,6,7,8,9';
}

function get_dmid() {
    return 1;
}

function play_win($play, $win) {
    if ($play - 0 == 1) {
        if ($win == 1) {
            return 1;
        }
        if ($win == 2) {
            return -1;
        }
        if ($win == 2.5) {
            return -0.5;
        }
        if ($win == 0) {
            return 0;
        }
    } else {
        if ($win == 1) {
            return -1;
        }
        if ($win == 2) {
            return 1;
        }
        if ($win == 2.5) {
            return 0.5;
        }
        if ($win == 0) {
            return 0;
        }
    }
}

function win($event_id, $result_team1, $result_team2) {
    if ($result_team2 > $result_team1) {
        return 2;
    }

    $def = $result_team1 - $result_team2;

    $r3 = $event_id % 3;
    if ($r3 > 0) {
        $d3 = ($event_id - $r3) / 3;
    } else {
        $d3 = ($event_id - 3) / 3;
    }

    if ($r3 == 1) {
        if ($def > $d3) {
            return 1;
        } elseif ($def < $d3) {
            return 2;
        } else {
            return 0;
        }
    } elseif ($r3 == 2) {
        if ($def > $d3) {
            return 1;
        } elseif ($def < $d3) {
            return 2;
        } else {
            return 2.5;
        }
    } else {
        if ($def > $d3) {
            return 1;
        } else {
            return 2;
        }
    }
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
