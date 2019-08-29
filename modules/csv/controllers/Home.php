<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Home extends CI_Controller {



    public function index() {

      // select unit ==========

      $query_wh = query("SELECT DISTINCT unit,id  FROM unit WHERE status='1' ");

      $row_unit = $query_wh->result();

      $data['pro_unit'] = $row_unit;

      // select total civilservant ==========

      $query_wh = query("SELECT (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' )AS six, count(id) as uid FROM civilservant");

      $row_unit = $query_wh->result();

      $data['pro_civ'] = $row_unit;
      
       // select civilservant  with level ==========

      $query_wh = query("SELECT (SELECT
Count(civilservant.id)
FROM
civilservant
LEFT JOIN salary ON civilservant.id = salary.id
WHERE(
salary.salary_level LIKE 'ក.%' or salary.salary_level LIKE 'គ.%' or salary.salary_level LIKE 'ខ.%')and gender='ស្រី') as six,(SELECT
Count(civilservant.id)
FROM
civilservant
LEFT JOIN salary ON civilservant.id = salary.id
WHERE(
salary.salary_level LIKE 'ក.%' or salary.salary_level LIKE 'គ.%' or salary.salary_level LIKE 'ខ.%')) as uid;");

      $row_unit = $query_wh->result();

      $data['pro_civ_level'] = $row_unit;
      
       // select civilservant with no level ==========

      $query_wh = query("SELECT (SELECT
Count(civilservant.id)
FROM
civilservant
LEFT JOIN salary ON civilservant.id = salary.id
WHERE(
salary.salary_level LIKE 'និវត្ដន៍' or salary.salary_level LIKE 'គ្មានក្រប.' )and gender='ស្រី') as six,(SELECT
Count(civilservant.id)
FROM
civilservant
LEFT JOIN salary ON civilservant.id = salary.id
WHERE(
salary.salary_level LIKE 'និវត្ដន៍' or salary.salary_level LIKE 'គ្មានក្រប.'  )) as uid;");

      $row_unit = $query_wh->result();

      $data['pro_civ_nolevel'] = $row_unit;
      
       // select civilservant with contract==========

      $query_wh = query("SELECT (SELECT
Count(civilservant.id)
FROM
civilservant
LEFT JOIN salary ON civilservant.id = salary.id
WHERE(
salary.salary_level is NULL or salary.salary_level ='' ) and gender='ស្រី') as six,(SELECT
Count(civilservant.id)
FROM
civilservant
LEFT JOIN salary ON civilservant.id = salary.id
WHERE(
salary.salary_level is NULL or salary.salary_level ='')) as uid;");

      $row_unit = $query_wh->result();

      $data['pro_civ_contract'] = $row_unit;
      



//      // select data that retires
//
//      $retires  = query("SELECT COUNT(*) AS total,(SELECT COUNT(*) FROM v_retired WHERE 1=1 AND gender ='ស្រី'  AND retiredate < DATE(NOW()))as female FROM v_retired WHERE 1=1 AND retiredate < DATE(NOW())");
//
//      $retires_q = $retires->row();
//
//      $data['retires_q'] = $retires_q;



//    // select data that no framework
//
//    $nofwork  = query("SELECT COUNT(cs.id) AS c, ( SELECT count(gender) FROM civilservant AS civ INNER JOIN `worknamedeleting` AS wrd ON civ.id = wrd.id WHERE gender = 'ស្រី' AND wd.reason_deleting = 'គ្នានក្រប') AS six FROM civilservant AS cs INNER JOIN `worknamedeleting` AS wd ON cs.id = wd.id AND wd.reason_deleting = 'គ្នានក្រប' WHERE 1 = 1");
//
//    $no_fwork = $nofwork->result();
//
//    $data['no_fwork'] = $no_fwork;



//    // Phnom Ponh ==========
//
//    $query_wh = query("SELECT (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='1')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='1' ");
//
//    $pro_phnom = $query_wh->result();
//
//    $data['pro_phnom'] = $pro_phnom;



    // // Bonteay Meanchey ==========

    // $query_wh = query("SELECT (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='2')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='2' ");

    // $pro_bonteay = $query_wh->result();

    // $data['pro_bonteay'] = $pro_bonteay;

    //

    //  // Battom bong ==========

    //  $query_wh = query("SELECT (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='3')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='3' ");

    //  $pro_batdb = $query_wh->result();

    //  $data['pro_batdb'] = $pro_batdb;

    //

    //   // Kom Pong cham ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='4')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='4' ");

    //   $pro_kom_pch = $query_wh->result();

    //   $data['pro_kom_pch'] = $pro_kom_pch;

    //   // Kom Pong chnang ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='5')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='5' ");

    //   $pro_kom_pchn = $query_wh->result();

    //   $data['pro_kom_pchn'] = $pro_kom_pchn;

    //   // ខេត្តកំពុងស្ពឺ​ Kom pong spuer ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='6')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='6' ");

    //   $pro_kom_psp = $query_wh->result();

    //   $data['pro_kom_psp'] = $pro_kom_psp;

    //   //  Kom pong thom ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='7')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='7' ");

    //   $pro_kom_pth = $query_wh->result();

    //   $data['pro_kom_pth'] = $pro_kom_pth;

    //   // Kom pot ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='8')AS gender, count(id) AS c_id FROM civilservant WHERE unit_code='8' ");

    //   $row_kp = $query_wh->result();

    //   $data['pro_kp'] = $row_kp;

    //   // Kon dal ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='9')AS gender, count(id) AS c_id FROM civilservant WHERE unit_code='9' ");

    //   $row_kd = $query_wh->result();

    //   $data['pro_kd'] = $row_kd;

    //   // Kep ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='10')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='10' ");

    //   $row_kep = $query_wh->result();

    //   $data['pro_kep'] = $row_kep;

    //   // Koh kong ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='11')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='11' ");

    //   $pro_kk = $query_wh->result();

    //   $data['pro_kk'] = $pro_kk;

    //   // krojes ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='12')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='12' ");

    //   $pro_kj = $query_wh->result();

    //   $data['pro_kj'] = $pro_kj;

    //   // Mondolkiry ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='13')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='13' ");

    //   $row_mondkr = $query_wh->result();

    //   $data['pro_mondkr'] = $row_mondkr;

    //   // Udor mean Chey ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='14')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='14' ");

    //   $row_udormch = $query_wh->result();

    //   $data['pro_udormch'] = $row_udormch;

    //   // BiyLin ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='15')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='15' ");

    //   $row_piylen = $query_wh->result();

    //   $data['pro_piylen'] = $row_piylen;

    //   // Sihunok ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='16')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='16' ");

    //   $row_shn = $query_wh->result();

    //   $data['pro_shn'] = $row_shn;

    //   // Preas Vihea ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='17')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='17' ");

    //   $row_prhear = $query_wh->result();

    //   $data['pro_prhear'] = $row_prhear;

    //   // Prey Veng ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='18')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='18' ");

    //   $row_piveng = $query_wh->result();

    //   $data['pro_prveng'] = $row_piveng;

    //   // Pou sat ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='19')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='19' ");

    //   $row_posat = $query_wh->result();

    //   $data['pro_posat'] = $row_posat;

    //   // Rathanakiry ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='20')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='20' ");

    //   $row_rtnkr = $query_wh->result();

    //   $data['pro_rtnkr'] = $row_rtnkr;

    //   // Seam Reap ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='21')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='21' ");

    //   $row_sr = $query_wh->result();

    //   $data['pro_sr'] = $row_sr;

    //   // steng treng ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='22')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='22' ");

    //   $row_streng = $query_wh->result();

    //   $data['pro_streng'] = $row_streng;

    //   // sviy reang ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី' AND unit_code='23')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='23' ");

    //   $row_svr = $query_wh->result();

    //   $data['pro_svr'] = $row_svr;

    //   // Takeo ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='24')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='24' ");

    //   $row_tk = $query_wh->result();

    //   $data['pro_tk'] = $row_tk;

    //   // tbong Kmom ==========

    //   $query_wh = query("SELECT  (SELECT count(gender) FROM civilservant WHERE  gender='ស្រី'AND unit_code='25')AS gender,count(id) AS c_id FROM civilservant WHERE unit_code='25' ");

    //   $row_tkm = $query_wh->result();

    //   $data['pro_tkm'] = $row_tkm;



        $this->load->view('header');

        $this->load->view('csv/home/index', $data);

        $this->load->view('footer');

    }



    public function form() {

        $this->load->view('header');

        $this->load->view('csv/home/err_permission');

        $this->load->view('footer');

    }

    public function retire()

    {

      $this->load->view('header');

      $this->load->view('csv/retire/index');

      $this->load->view('footer');

    }



}

