


<form class="form-horizontal" action="" role="form" method="post">
    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ --><?= t('របាយការណ៍ព័ត៌មានមន្ត្រី') ?></h3>
        </div>

        <div class="panel-body">
            <table cellpadding="0" cellspacing="0" border="1" style="font-family: khmermef1;" class="table table-striped table-bordered table-hover" id="my_gr">
                <thead>
                    <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
                        <th style="text-align: left;width: 20%;" rowspan="2"><?= t('ទីតាំងអង្គភាព') ?></th>
                        <th style="text-align: center;width: 12%;" colspan="2"><?= t('មន្ត្រីទាំងអស់') ?></th>
                        <!-- <th style="text-align: center;"><?= t('ភេទ') ?></th>
                        <th style="text-align: center;"><?= t('ថ្ងៃ​ ខែ ឆ្នាំ កំណើត') ?></th>
                        <th style="text-align: center;"><?= t('ថ្ងៃ​បម្រើការងារ') ?></th> -->
                    </tr>
                    <tr>
                        <th style="text-align: center;"><?= t('ចំនួនមន្រ្តី') ?></th>
                        <th style="text-align: center;"><?= t('ស្រី') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php #foreach ($pro_v as $keypv){ ?>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
<!--                        <td style=''><?php echo $pro_pp[0]->unit; ?></td>-->
                        <td>
                            <ul id="treeview">
                                <li data-icon-cls=""><?php echo $pro_pp[0]->unit; ?>
                                    <ul> 
                                        <li>
                                            <table class="table table-bordered"  >
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th style="width: 243.6px; text-align: center;" class="col-md-6">សរុប</th>
                                                        <th style="width: 243.6px;text-align: center;">ស្រី</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <tr>
                                                        <td>ថ្នាក់ដឹកនាំក្រសួង (១០០)</td>
                                                        <td>100</td>
                                                        <td>3</td>
                                                    </tr>
                                                     <tr>
                                                        <td>ខុទ្ធកាល័យ (១០០)</td>
                                                        <td>100</td>
                                                        <td>3</td>
                                                    </tr>
                                                     <tr>
                                                        <td>ទីប្រឹក្សា (១០០)</td>
                                                        <td>100</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>អគ្គនាយកដ្ឋានរដ្ឋបាល</td>
                                                        <td>100</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: px;">នាយកដ្ឋាន​​រដ្ឋបាល</td>
                                                        <td>100</td>
                                                        <td>2</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: px;">ការិយាល័យ​តម្កល់ឯកសា</td>
                                                        <td>390</td>
                                                        <td>23</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                        <td style='text-align: center;'><?php echo $pro_phnom[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_phnom[0]->gender; ?> នាក់</td>



                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[1]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_bonteay[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_bonteay[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[2]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_batdb[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_batdb[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[3]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_kom_pch[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_kom_pch[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[4]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_kom_pchn[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_kom_pchn[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[5]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_kom_psp[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_kom_psp[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[6]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_kom_pth[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_kom_pth[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[7]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_kp[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_kp[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[8]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_kd[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_kd[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[9]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_kep[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_kep[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[10]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_kk[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_kk[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[11]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_kj[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_kj[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[12]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_mondkr[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_mondkr[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[13]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_udormch[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_udormch[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[14]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_piylen[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_piylen[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[15]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_shn[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_shn[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[16]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_prhear[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_prhear[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[17]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_prveng[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_prveng[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[18]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_posat[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_posat[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[19]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_rtnkr[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_rtnkr[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[20]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_sr[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_sr[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[21]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_streng[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_streng[0]->gender; ?> នាក់</td>
                    </tr>
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[22]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_svr[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_svr[0]->gender; ?> នាក់</td>
                    </tr>
                    <!--តាកែវ-->
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[23]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_tk[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_tk[0]->gender; ?> នាក់</td>
                    </tr>
                    <!--ត្បូងឃ្មុំ-->
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[24]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_tkm[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_tkm[0]->gender; ?> នាក់</td>
                    </tr>
                    <!--Phnom Penh provincial department-->
                    <tr data-id="" data-href='' class='editor' target='_parent'>
                        <td style=''><?php echo $pro_pp[25]->unit; ?></td>
                        <td style='text-align: center;'><?php echo $pro_pp_pd[0]->c_id; ?> នាក់</td>
                        <td style='text-align: center;'><?php echo $pro_pp_pd[0]->gender; ?> នាក់</td>
                    </tr>
                    <?php #}; ?>
                </tbody>
                <thead style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">

                    <tr data-id="" data-href='' class='editor ' target='_parent'>
                        <td style='text-align: center;' colspan="3"></td>
                    </tr>
                    <tr data-id="" data-href='' class='editor ' target='_parent'>
                        <td style='' ><h4>មន្រ្តីសរុប</h4></td>
                        <td style='text-align: center;background:#D8D8D8;'><h4><?php echo $pro_civ[0]->uid; ?> នាក់</h4></td>
                        <td style='text-align: center;background:#D8D8D8;'><h4><?php echo $f_count[0]->female; ?> នាក់</h4></td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</form>

<!-- js. -->
<!-- you need to include the ShieldUI CSS and JS assets in order for the TreeView widget to work -->
<link rel="stylesheet" type="text/css" href="https://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
<script type="text/javascript" src="https://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#treeview").shieldTreeView();
    });
</script>
<!-- Tree View - END -->

