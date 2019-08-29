<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Xls extends Admin_Controller {

    public function index() {
        $this->load->view('headerif');
        $this->load->view('login/index');
        $this->load->view('footerif');
    }

    public function read_file() {

        include_once(APPPATH . "libraries/Excel/reader.php");
        $data = new Spreadsheet_Excel_Reader();

        //$data->setOutputEncoding('CP1251');
        $data->setUTFEncoder('iconv');
        $data->setOutputEncoding('UTF-8');

        // $data = new Spreadsheet_Excel_Reader("test.xls",true,"UTF-16");
        $data->read('assets/xls/rri/001.xls');
        // $data->read($_FILES['userfile']['tmp_name']);

        $numColsAll = $data->sheets[0]['numCols'];
        $numRowsAll = $data->sheets[0]['numRows'];

        /*$rowStart = 8;
        $colStart = 2;
        
        $colLessStart = 8;
        $rowLessStart = 1;*/
		
		echo '<meta charset="UTF-8">';
		echo "<pre>";
		//print_r($data->sheets[0]['cells'][10][1]);
		echo "</pre>";
        
		for($r=12;$r<=$numRowsAll;$r++){
			$dis = $data->sheets[0]['cells'][$r][1];
			$com = $data->sheets[0]['cells'][$r][2];
			$vil = $data->sheets[0]['cells'][$r][3];
			echo "$dis || $com || $vil <br>";	
		}
                
        //echo $data->sheets[0]['cells'][$rowStart][$colStart];
       // echo '<br>';
        //echo $data->sheets[0]['cells'][$rowStart][$colStart+1];      
    }

}
