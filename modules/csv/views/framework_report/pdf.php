<?php
include_once(APPPATH . "third_party/mpdf60/mpdf.php");
ini_set('memory_limit', '100024M');
set_time_limit(1200);
$mpdf = new mPDF('utf-8', 'A4');
$id = isset($id) ? $id : 0;
?>
// select civil===========
<div style = "text-align: right;margin-top: 10px;">
    <form class = "form-horizontal" role = "form" action = "<?= site_url('csv/framework_report/pdf') ?>" method = "post" autocomplete = "off">
        <button class = "btn btn-default " type = "submit" id = "btn_pdf"><span class = "glyphicon glyphicon-print"></span> PDF</button>
    </form>
</div>
<table class = "table" align = "center" style = "text-align: center;font-family: khmer mef1;color: blue;">
    <tbody>
        <tr>
            <td>
            <!--<img src = "<?= base_url('assets/bs/css/images/search.gif') ?>" />​ -->
                <? = t('របាយការណ៍ព័ត៌មានមន្ត្រី')
                ?>
            </td>
        </tr>
    </tbody>
</table>
<table border="1" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" id="my_gr">
    <thead>
        <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
            <th rowspan="2" style="text-align: left;width: 20%;">
                <?= t('ទីតាំងអង្គភាព') ?>
            </th>
            <!-- <th style="text-align: center;width: 12%;" colspan="2"><?= t('មន្ត្រីទាំងអស់') ?></th> -->
            <th colspan="2" style="text-align: center;width: 12%;">
                <?= t('ក្របខ័ណ្ឌ ក') ?>
            </th>
            <th colspan="2" style="text-align: center;width: 12%;">
                <?= t('ក្របខ័ណ្ឌ ខ') ?>
            </th>
            <th colspan="2" style="text-align: center;width: 12%;">
                <?= t('ក្របខ័ណ្ឌ គ') ?>
            </th>
            <!-- <th style="text-align: center;"><?= t('ភេទ') ?></th>
            <th style="text-align: center;"><?= t('ថ្ងៃ​ ខែ ឆ្នាំ កំណើត') ?></th>
            <th style="text-align: center;"><?= t('ថ្ងៃ​បម្រើការងារ') ?></th> -->
        </tr>
        <tr>
            <!-- framwork ក -->
            <th style="text-align: center;">
                <?= t('ចំនួនសរុប') ?>
            </th>
            <th style="text-align: center;">
                <?= t('ស្រី') ?>
            </th>
            <!-- framwork ខ -->
            <th style="text-align: center;">
                <?= t('ចំនួនសរុប') ?>
            </th>
            <th style="text-align: center;">
                <?= t('ស្រី') ?>
            </th>
            <!-- framwork គ -->
            <th style="text-align: center;">
                <?= t('ចំនួនសរុប') ?>
            </th>
            <th style="text-align: center;">
                <?= t('ស្រី') ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php #foreach ($pro_v as $keypv){  ?>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[0]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_phnom[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_phnom[0]->
                gender;
                ?> 
            </td>
            ​​
            <td style="text-align: center;">
                <?php
                echo $pro_phnom2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_phnom2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_phnom3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_phnom3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[1]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_bonteay[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_bonteay[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_bonteay2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_bonteay2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_bonteay3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_bonteay3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[2]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_batdb[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_batdb[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_batdb2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_batdb2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_batdb3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_batdb3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[3]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pch[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pch[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pch2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pchn2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pch3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pch3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[4]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pchn[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pchn[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pchn2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pchn2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pchn3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pchn3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[5]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_psp[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_psp[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_psp2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_psp2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_psp3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_psp3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[6]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pth[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pth[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pth2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pth2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pth3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kom_pth3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[7]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kp[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kp[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kp2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kp2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kp3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kp3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[8]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kd[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kd[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kd2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kd2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kd3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kd3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[9]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kep[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kep[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kep2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kep2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kep3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kep3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[10]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kk[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kk[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kk2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kk2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kk3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kk3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[11]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kj[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kj[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kj2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kj2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kj3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_kj3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[12]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_mondkr[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_mondkr[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_mondkr2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_mondkr2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_mondkr3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_mondkr3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[13]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_udormch[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_udormch[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_udormch2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_udormch2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_udormch3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_udormch3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[14]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_piylen[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_piylen[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_piylen2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_piylen2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_piylen3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_piylen3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[15]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_shn[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_shn[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_shn2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_shn2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_shn3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_shn3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[16]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prhear[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prhear[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prhear2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prhear2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prhear3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prhear3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[17]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prveng[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prveng[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prveng2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prveng2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prveng3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_prveng3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[18]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_posat[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_posat[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_posat2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_posat2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_posat3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_posat3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[19]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_rtnkr[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_rtnkr[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_rtnkr2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_rtnkr2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_rtnkr3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_rtnkr3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[20]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_sr[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_sr[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_sr2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_sr2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_sr3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_sr3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[21]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_streng[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_streng[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_streng2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_streng2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_streng3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_streng3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[22]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_svr[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_svr[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_svr2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_svr2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_svr3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_svr3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[23]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tk[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tk[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tk2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tk2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tk3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tk3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <tr class="editor" data-href="" data-id="" target="_parent">
            <td style="">
                <?php
                echo $pro_pp[24]->
                unit;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tkm[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tkm[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tkm2[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tkm2[0]->
                gender;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tkm3[0]->
                c_id;
                ?> 
            </td>
            <td style="text-align: center;">
                <?php
                echo $pro_tkm3[0]->
                gender;
                ?> 
            </td>
        </tr>
        <?php #};    ?>
    </tbody>
    <thead style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
        <tr class="editor " data-href="" data-id="" target="_parent">
            <td style="">
                <h4>
                    មន្រ្តីសរុប
                </h4>
            </td>
            <td style="text-align: center;background:#D8D8D8;">
                <h4>
                    <?php
                    echo $pro_civ[0]->
                    uid;
                    ?> នាក់
                </h4>
            </td>
            <td style="">
                <h4>
                    ស្រី
                </h4>
            </td>
            <td style="text-align: center;background:#D8D8D8;">
                <h4>
                    <?php
                    echo $f_count[0]->
                    female;
                    ?> នាក់
                </h4>
            </td>
        </tr>
    </thead>
</table>
<?php
$mpdf->AddPage('p', 'A4');
$mpdf->SetHTMLFooter('<p style="vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;text-align: center;">ទំព័រ {PAGENO} - {nb}</p>');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit();
?>
