<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of csv_report_detail
 *
 * @author chiev
 */
class csv_report_detail extends Admin_Controller {
     // index ===============
    public function index() {
        // select unit ==========
        $query_wh = query("SELECT DISTINCT unit,id  FROM unit WHERE status='1' ");
        $row_pp = $query_wh->result();
        $data['pro_pp'] = $row_pp;
        // select civilservant ==========
        $query_wh = query("SELECT  count(id) as uid FROM civilservant");
        $row_unit = $query_wh->result();
        $data['pro_civ'] = $row_unit;
        // select civilservant ==========
        $query_wh = query("SELECT count(gender) AS female FROM civilservant WHERE  gender='ស្រី'");
        $row_unit = $query_wh->result();
        $data['f_count'] = $row_unit;
        // Phnom Ponh ==========
        $query_wh = query("SELECT (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='1')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='1' ");
        $pro_phnom = $query_wh->result();
        $data['pro_phnom'] = $pro_phnom;

        // Bonteay Meanchey ==========
        $query_wh = query("SELECT (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='2')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='2' ");
        $pro_bonteay = $query_wh->result();
        $data['pro_bonteay'] = $pro_bonteay;

        // Battom bong ==========
        $query_wh = query("SELECT (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='3')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='3' ");
        $pro_batdb = $query_wh->result();
        $data['pro_batdb'] = $pro_batdb;

        // Kom Pong cham ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='4')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='4' ");
        $pro_kom_pch = $query_wh->result();
        $data['pro_kom_pch'] = $pro_kom_pch;
        // Kom Pong chnang ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='5')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='5' ");
        $pro_kom_pchn = $query_wh->result();
        $data['pro_kom_pchn'] = $pro_kom_pchn;
        // ខេត្តកំពុងស្ពឺ​ Kom pong spuer ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='6')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='6' ");
        $pro_kom_psp = $query_wh->result();
        $data['pro_kom_psp'] = $pro_kom_psp;
        //  Kom pong thom ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='7')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='7' ");
        $pro_kom_pth = $query_wh->result();
        $data['pro_kom_pth'] = $pro_kom_pth;
        // Kom pot ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='8')AS gender, count(id) AS c_id FROM civilservant WHERE unit_code='8' ");
        $row_kp = $query_wh->result();
        $data['pro_kp'] = $row_kp;
        // Kon dal ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='9')AS gender, count(id) AS c_id FROM civilservant WHERE unit_code='9' ");
        $row_kd = $query_wh->result();
        $data['pro_kd'] = $row_kd;
        // Kep ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='10')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='10' ");
        $row_kep = $query_wh->result();
        $data['pro_kep'] = $row_kep;
        // Koh kong ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='11')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='11' ");
        $pro_kk = $query_wh->result();
        $data['pro_kk'] = $pro_kk;
        // krojes ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='12')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='12' ");
        $pro_kj = $query_wh->result();
        $data['pro_kj'] = $pro_kj;
        // Mondolkiry ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='13')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='13' ");
        $row_mondkr = $query_wh->result();
        $data['pro_mondkr'] = $row_mondkr;
        // Udor mean Chey ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='14')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='14' ");
        $row_udormch = $query_wh->result();
        $data['pro_udormch'] = $row_udormch;
        // BiyLin ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='15')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='15' ");
        $row_piylen = $query_wh->result();
        $data['pro_piylen'] = $row_piylen;
        // Sihunok ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='16')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='16' ");
        $row_shn = $query_wh->result();
        $data['pro_shn'] = $row_shn;
        // Preas Vihea ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='17')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='17' ");
        $row_prhear = $query_wh->result();
        $data['pro_prhear'] = $row_prhear;
        // Prey Veng ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='18')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='18' ");
        $row_piveng = $query_wh->result();
        $data['pro_prveng'] = $row_piveng;
        // Pou sat ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='19')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='19' ");
        $row_posat = $query_wh->result();
        $data['pro_posat'] = $row_posat;
        // Rathanakiry ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='20')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='20' ");
        $row_rtnkr = $query_wh->result();
        $data['pro_rtnkr'] = $row_rtnkr;
        // Seam Reap ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='21')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='21' ");
        $row_sr = $query_wh->result();
        $data['pro_sr'] = $row_sr;
        // steng treng ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='22')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='22' ");
        $row_streng = $query_wh->result();
        $data['pro_streng'] = $row_streng;
        // sviy reang ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='23')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='23' ");
        $row_svr = $query_wh->result();
        $data['pro_svr'] = $row_svr;
        // Takeo ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='24')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='24' ");
        $row_tk = $query_wh->result();
        $data['pro_tk'] = $row_tk;
        // tbong Kmom ==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='25')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='25' ");
        $row_tkm = $query_wh->result();
        $data['pro_tkm'] = $row_tkm;
         //  Phnom Penh Provincial Department==========
        $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='31')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='31' ");
        $row_pp_pd = $query_wh->result();
        $data['pro_pp_pd'] = $row_pp_pd;

        $this->load->view('header');
        $this->load->view('csv/csv_report_detail/index', $data);
        $this->load->view('footer');
    }

    public function print_biology() {
        $id = $this->input->post('id');
        $data['id'] = $id;
        $this->load->view('csv/csv_report/printprofile', $data);
    }

    public function pdf() {
        $id = $this->input->post('id_pdf');
        $data['id'] = $id;
        $this->load->view('csv/csv_report/report_pdf', $data);
    }

    public function load() {
        // qr. ==============
        $qr = query("SELECT DISTINCT province FROM civilservant  ORDER BY id - 0 DESC ");

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
    
}
