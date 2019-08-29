<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');

/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */



/**

 * Description of framework_report

 *

 * @author manin

 */

class Framework_report extends Admin_Controller {

    public function index() {

        /*select unit ==========*/

        $query_wh = query("SELECT DISTINCT unit,id  FROM unit WHERE status='1' ");

        $row_pp = $query_wh->result();

        $data['pro_pp'] = $row_pp;

        /*select civilservant ==========*/

        $query_wh = query("SELECT  count(id) as uid FROM civilservant");

        $row_unit = $query_wh->result();

        $data['pro_phnom'] = $row_unit;

        /* select civilservant ==========*/

        $query_wh = query("SELECT count(gender) AS female FROM civilservant WHERE  gender='ស្រី'");

        $row_unit = $query_wh->result();

        $data['f_count'] = $row_unit;

        /*select ក​ framework*/

        $k1 = "SELECT

                          	COUNT(

                          		CASE

                          		WHEN cs.gender = 'ស្រី' THEN

                          			0

                          		END

                          	) AS gender,

                           	COUNT(

                          		CASE

                          		WHEN cs.id THEN

                          			0

                          		END

                          	) AS c_id

                          FROM

                          	civilservant AS cs

                          INNER JOIN salary  AS w ON cs.id = w.id

                          WHERE

                          	salary_level LIKE 'ក.%'";

        /*select ខ​ framework*/

        $k2 = "SELECT

                              COUNT(

                                CASE

                                WHEN cs.gender = 'ស្រី' THEN

                                  0

                                END

                              ) AS gender,

                              COUNT(

                                CASE

                                WHEN cs.id THEN

                                  0

                                END

                              ) AS c_id

                            FROM

                              civilservant AS cs

                            INNER JOIN salary AS w ON cs.id = w.id

                            WHERE

                              salary_level LIKE 'ខ.%'";

        // select គ​ framework

        $k3 = "SELECT

                          COUNT(

                            CASE

                            WHEN cs.gender = 'ស្រី' THEN

                              0

                            END

                          ) AS gender,

                          COUNT(

                            CASE

                            WHEN cs.id THEN

                              0

                            END

                          ) AS c_id

                        FROM

                          civilservant AS cs

                        INNER JOIN salary  AS w ON cs.id = w.id

                        WHERE

                          salary_level LIKE 'គ.%'";

       // Total ==========

        $query_wh = query($k1 ); 

        $data['pro_total'] = $query_wh->result();

        // total k2 ==========

        $query_wh2 = query($k2);


        $data['pro_total2'] = $query_wh2->result();

        // total k3 ==========

        $query_wh3 = query($k3 );


        $data['pro_total3'] = $query_wh3->result();


        

        // Phnom Penh ==========

        $query_wh = query($k1 . " AND cs.unit_code = 1 ");

        $pro_phnom = $query_wh->result();

        $data['pro_phnom'] = $pro_phnom;

        // Phnom Ponh​ k2 ==========

        $query_wh2 = query($k2 . " AND cs.unit_code = 1 ");

        $pro_phnom2 = $query_wh2->result();

        $data['pro_phnom2'] = $pro_phnom2;

        // Phnom Ponh​ k3 ==========

        $query_wh3 = query($k3 . " AND cs.unit_code = 1 ");

        $pro_phnom3 = $query_wh3->result();

        $data['pro_phnom3'] = $pro_phnom3;



        // Bonteay Meanchey ==========

        $query_wh = query($k1 . " AND cs.unit_code = 2 ");

        $pro_bonteay = $query_wh->result();

        $data['pro_bonteay'] = $pro_bonteay;

        // Bonteay Meanchey k2 ==========

        $query_wh2 = query($k2 . " AND cs.unit_code = 2 ");

        $pro_bonteay2 = $query_wh2->result();

        $data['pro_bonteay2'] = $pro_bonteay2;

        // Bonteay Meanchey k3 ==========

        $query_wh3 = query($k3 . " AND cs.unit_code = 2 ");

        $pro_bonteay3 = $query_wh3->result();

        $data['pro_bonteay3'] = $pro_bonteay3;



        // Battom bong ==========

        $query_wh = query($k1 . " AND cs.unit_code = 3 ");

        $pro_batdb = $query_wh->result();

        $data['pro_batdb'] = $pro_batdb;



        $query_wh2 = query($k2 . " AND cs.unit_code = 3 ");

        $pro_batdb2 = $query_wh2->result();

        $data['pro_batdb2'] = $pro_batdb2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 3 ");

        $pro_batdb3 = $query_wh3->result();

        $data['pro_batdb3'] = $pro_batdb3;



        // Kom Pong cham ==========

        $query_wh = query($k1 . " AND cs.unit_code = 4 ");

        $pro_kom_pch = $query_wh->result();

        $data['pro_kom_pch'] = $pro_kom_pch;



        $query_wh2 = query($k2 . " AND cs.unit_code = 4 ");

        $pro_kom_pch2 = $query_wh2->result();

        $data['pro_kom_pch2'] = $pro_kom_pch2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 4 ");

        $pro_kom_pch3 = $query_wh3->result();

        $data['pro_kom_pch3'] = $pro_kom_pch3;

        // Kom Pong chnang ==========

        $query_wh = query($k1 . " AND cs.unit_code = 5 ");

        $pro_kom_pchn = $query_wh->result();

        $data['pro_kom_pchn'] = $pro_kom_pchn;



        $query_wh2 = query($k2 . " AND cs.unit_code = 5 ");

        $pro_kom_pchn2 = $query_wh2->result();

        $data['pro_kom_pchn2'] = $pro_kom_pchn2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 5 ");

        $pro_kom_pchn3 = $query_wh3->result();

        $data['pro_kom_pchn3'] = $pro_kom_pchn3;

        // ខេត្តកំពុងស្ពឺ​ Kom pong spuer ==========

        $query_wh = query($k1 . " AND cs.unit_code = 6 ");

        $pro_kom_psp = $query_wh->result();

        $data['pro_kom_psp'] = $pro_kom_psp;



        $query_wh2 = query($k2 . " AND cs.unit_code = 6 ");

        $pro_kom_psp2 = $query_wh2->result();

        $data['pro_kom_psp2'] = $pro_kom_psp2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 6 ");

        $pro_kom_psp3 = $query_wh3->result();

        $data['pro_kom_psp3'] = $pro_kom_psp3;

        //  Kom pong thom ==========

        $query_wh = query($k1 . " AND cs.unit_code = 7 ");

        $pro_kom_pth = $query_wh->result();

        $data['pro_kom_pth'] = $pro_kom_pth;



        $query_wh2 = query($k2 . " AND cs.unit_code = 7 ");

        $pro_kom_pth2 = $query_wh2->result();

        $data['pro_kom_pth2'] = $pro_kom_pth2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 7 ");

        $pro_kom_pth3 = $query_wh3->result();

        $data['pro_kom_pth3'] = $pro_kom_pth3;

        // Kom pot ==========

        $query_wh = query($k1 . " AND cs.unit_code = 8 ");

        $row_kp = $query_wh->result();

        $data['pro_kp'] = $row_kp;



        $query_wh2 = query($k2 . " AND cs.unit_code = 8 ");

        $row_kp2 = $query_wh2->result();

        $data['pro_kp2'] = $row_kp2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 8 ");

        $row_kp3 = $query_wh3->result();

        $data['pro_kp3'] = $row_kp3;

        // Kon dal ==========

        $query_wh = query($k1 . " AND cs.unit_code = 9 ");

        $row_kd = $query_wh->result();

        $data['pro_kd'] = $row_kd;



        $query_wh2 = query($k2 . " AND cs.unit_code = 9 ");

        $row_kd2 = $query_wh2->result();

        $data['pro_kd2'] = $row_kd2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 9 ");

        $row_kd3 = $query_wh3->result();

        $data['pro_kd3'] = $row_kd3;

        // Kep ==========

        $query_wh = query($k1 . " AND cs.unit_code = 10 ");

        $row_kep = $query_wh->result();

        $data['pro_kep'] = $row_kep;



        $query_wh2 = query($k2 . " AND cs.unit_code = 10 ");

        $row_kep2 = $query_wh2->result();

        $data['pro_kep2'] = $row_kep2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 10 ");

        $row_kep3 = $query_wh3->result();

        $data['pro_kep3'] = $row_kep3;

        // Koh kong ==========

        $query_wh = query($k1 . " AND cs.unit_code = 11 ");

        $pro_kk = $query_wh->result();

        $data['pro_kk'] = $pro_kk;



        $query_wh2 = query($k2 . " AND cs.unit_code = 11 ");

        $pro_kk2 = $query_wh2->result();

        $data['pro_kk2'] = $pro_kk2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 11 ");

        $pro_kk3 = $query_wh3->result();

        $data['pro_kk3'] = $pro_kk3;

        // krojes ==========

        $query_wh = query($k1 . " AND cs.unit_code = 12 ");

        $pro_kj = $query_wh->result();

        $data['pro_kj'] = $pro_kj;



        $query_wh2 = query($k2 . " AND cs.unit_code = 12 ");

        $pro_kj2 = $query_wh2->result();

        $data['pro_kj2'] = $pro_kj2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 12 ");

        $pro_kj3 = $query_wh3->result();

        $data['pro_kj3'] = $pro_kj3;

        // Mondolkiry ==========

        $query_wh = query($k1 . " AND cs.unit_code = 13 ");

        $row_mondkr = $query_wh->result();

        $data['pro_mondkr'] = $row_mondkr;



        $query_wh2 = query($k2 . " AND cs.unit_code = 13 ");

        $row_mondkr2 = $query_wh2->result();

        $data['pro_mondkr2'] = $row_mondkr2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 13 ");

        $row_mondkr3 = $query_wh3->result();

        $data['pro_mondkr3'] = $row_mondkr3;

        // Udor mean Chey ==========

        $query_wh = query($k1 . " AND cs.unit_code = 14 ");

        $row_udormch = $query_wh->result();

        $data['pro_udormch'] = $row_udormch;



        $query_wh2 = query($k2 . " AND cs.unit_code = 14 ");

        $row_udormch2 = $query_wh2->result();

        $data['pro_udormch2'] = $row_udormch2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 14 ");

        $row_udormch3 = $query_wh3->result();

        $data['pro_udormch3'] = $row_udormch3;

        // BiyLin ==========

        $query_wh = query($k1 . " AND cs.unit_code = 15 ");

        $row_piylen = $query_wh->result();

        $data['pro_piylen'] = $row_piylen;



        $query_wh2 = query($k2 . " AND cs.unit_code = 15 ");

        $row_piylen2 = $query_wh2->result();

        $data['pro_piylen2'] = $row_piylen2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 15 ");

        $row_piylen3 = $query_wh3->result();

        $data['pro_piylen3'] = $row_piylen3;

        // Sihunok ==========

        $query_wh = query($k1 . " AND cs.unit_code = 16 ");

        $row_shn = $query_wh->result();

        $data['pro_shn'] = $row_shn;



        $query_wh2 = query($k2 . " AND cs.unit_code = 16 ");

        $row_shn2 = $query_wh2->result();

        $data['pro_shn2'] = $row_shn2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 16 ");

        $row_shn3 = $query_wh3->result();

        $data['pro_shn3'] = $row_shn3;

        // Preas Vihea ==========

        $query_wh = query($k1 . " AND cs.unit_code = 17 ");

        $row_prhear = $query_wh->result();

        $data['pro_prhear'] = $row_prhear;



        $query_wh2 = query($k2 . " AND cs.unit_code = 17 ");

        $row_prhear2 = $query_wh2->result();

        $data['pro_prhear2'] = $row_prhear2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 17 ");

        $row_prhear3 = $query_wh3->result();

        $data['pro_prhear3'] = $row_prhear3;

        // Prey Veng ==========

        $query_wh = query($k1 . " AND cs.unit_code = 18 ");

        $row_piveng = $query_wh->result();

        $data['pro_prveng'] = $row_piveng;



        $query_wh2 = query($k2 . " AND cs.unit_code = 18 ");

        $row_piveng2 = $query_wh2->result();

        $data['pro_prveng2'] = $row_piveng2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 18 ");

        $row_piveng3 = $query_wh3->result();

        $data['pro_prveng3'] = $row_piveng3;

        // Pou sat ==========

        $query_wh = query($k1 . " AND cs.unit_code = 19 ");

        $row_posat = $query_wh->result();

        $data['pro_posat'] = $row_posat;



        $query_wh2 = query($k2 . " AND cs.unit_code = 19 ");

        $row_posat2 = $query_wh2->result();

        $data['pro_posat2'] = $row_posat2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 19 ");

        $row_posat3 = $query_wh3->result();

        $data['pro_posat3'] = $row_posat3;

        // Rathanakiry ==========

        $query_wh = query($k1 . " AND cs.unit_code = 20 ");

        $row_rtnkr = $query_wh->result();

        $data['pro_rtnkr'] = $row_rtnkr;



        $query_wh2 = query($k2 . " AND cs.unit_code = 20 ");

        $row_rtnkr2 = $query_wh2->result();

        $data['pro_rtnkr2'] = $row_rtnkr2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 20 ");

        $row_rtnkr3 = $query_wh3->result();

        $data['pro_rtnkr3'] = $row_rtnkr3;

        // Seam Reap ==========

        $query_wh = query($k1 . " AND cs.unit_code = 21 ");

        $row_sr = $query_wh->result();

        $data['pro_sr'] = $row_sr;



        $query_wh2 = query($k2 . " AND cs.unit_code = 21 ");

        $row_sr2 = $query_wh2->result();

        $data['pro_sr2'] = $row_sr2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 21 ");

        $row_sr3 = $query_wh3->result();

        $data['pro_sr3'] = $row_sr3;

        // steng treng ==========

        $query_wh = query($k1 . " AND cs.unit_code = 22 ");

        $row_streng = $query_wh->result();

        $data['pro_streng'] = $row_streng;



        $query_wh2 = query($k2 . " AND cs.unit_code = 22 ");

        $row_streng2 = $query_wh2->result();

        $data['pro_streng2'] = $row_streng2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 22 ");

        $row_streng3 = $query_wh3->result();

        $data['pro_streng3'] = $row_streng3;

        // sviy reang ==========

        $query_wh = query($k1 . " AND cs.unit_code = 23 ");

        $row_svr = $query_wh->result();

        $data['pro_svr'] = $row_svr;



        $query_wh2 = query($k2 . " AND cs.unit_code = 23 ");

        $row_svr2 = $query_wh2->result();

        $data['pro_svr2'] = $row_svr2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 23 ");

        $row_svr3 = $query_wh3->result();

        $data['pro_svr3'] = $row_svr3;

        // Takeo ==========

        $query_wh = query($k1 . " AND cs.unit_code = 24 ");

        $row_tk = $query_wh->result();

        $data['pro_tk'] = $row_tk;



        $query_wh2 = query($k2 . " AND cs.unit_code = 24 ");

        $row_tk2 = $query_wh2->result();

        $data['pro_tk2'] = $row_tk2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 24 ");

        $row_tk3 = $query_wh3->result();

        $data['pro_tk3'] = $row_tk3;

        // tbong Kmom ==========

        $query_wh = query($k1 . " AND cs.unit_code = 25 ");

        $row_tkm = $query_wh->result();

        $data['pro_tkm'] = $row_tkm;



        $query_wh2 = query($k2 . " AND cs.unit_code = 25 ");

        $row_tkm2 = $query_wh2->result();

        $data['pro_tkm2'] = $row_tkm2;



        $query_wh3 = query($k3 . " AND cs.unit_code = 25 ");

        $row_tkm3 = $query_wh3->result();

        $data['pro_tkm3'] = $row_tkm3;

         //  Phnom Penh Provincial Department==========

        $query_wh = query($k1 . " AND cs.unit_code = 31 ");

        $row_pp_pd = $query_wh->result();

        $data['row_pp_pd'] = $row_pp_pd;



        $query_wh = query($k2 . " AND cs.unit_code = 31 ");

        $row_pp_pd = $query_wh->result();

        $data['row_pp_pd2'] = $row_pp_pd;



        $query_wh = query($k3 . " AND cs.unit_code = 31 ");

        $row_pp_pd = $query_wh->result();

        $data['row_pp_pd3'] = $row_pp_pd;



        $this->load->view('header');

        $this->load->view('csv/framework_report/index', $data);

        $this->load->view('footer');

    }



    public function pdf() {

        $this->load->view('header');

        $this->load->view('csv/framework_report/pdf', $data);

        $this->load->view('footer');

    }



}

