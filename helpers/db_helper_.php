<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
    $salt = 'lion007';
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_3DES, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}

function simple_decrypt($text) {
    $salt = 'lion007';
    return trim(mcrypt_decrypt(MCRYPT_3DES, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

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

if (!function_exists('getoption')) {

    function getoption($sql, $key, $display, $select = '', $istop = false) {
        $ci = & get_instance();
        $query = $ci->db->query($sql);
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
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

