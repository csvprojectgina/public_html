

<?= $this->load->view('headerif') ?>

<?php

$dmid = $this->session->all_userdata()['dmid'];

?>



<style media="screen">





    @media (min-width: 769px){

        .navbar-toggle {

            position: relative !important;

            float: right !important;

            padding: 9px 10px !important;

            margin-top: 8px !important;

            margin-right: 15px !important;

            margin-bottom: 8px !important;

            background-color: transparent !important;

            background-image: none !important;

            border: 1px solid transparent !important;

            border-radius: 4px !important;

        }

        .navbar-header { float: left !important;}

    }

    @media(max-width: 768px){

        .container{width: 100% !important;}

        .form-horizontal .panel .panel-body{padding: 5px;}

        .img-center{margin-left: 0px !important;}

        .col-sm-10{width: 60% !important; display: inline-block;}

        .col-sm-4{width: 60% !important; display: inline-block;}

        .col-sm-2{width: 38% !important;display: inline-block;text-align: right;}

    }

    @media (min-width: 769px){

        .navbar-toggle {

            position: relative !important;

            float: right !important;

            padding: 9px 10px !important;

            margin-top: 8px !important;

            margin-right: 15px !important;

            margin-bottom: 8px !important;

            background-color: transparent !important;

            background-image: none !important;

            border: 1px solid transparent !important;

            border-radius: 4px !important;

        }

        .navbar-header { float: left !important;}

        .padding-iphone{

            padding-right: 0px;

            padding-left: 0px;

            margin-left: 60px ;


        }

    }



    ul.scroll-menu {

        max-height: 400px;

        overflow: hidden;

        overflow-y: auto;

    }



</style>



<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

    <div class="container padding-iphone">

        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display-->

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <!-- Home -->

                <a href="<?= site_url('csv/home/index') ?>" class="navbar-brand" style="font-size: 14px;color: black;"><img width="18" height="19" src="<?= base_url('assets/bs/css/images/logo.png') ?>" /> <?= t('ទំព័រដើម') ?></a>

            </div>



            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



                <!-- add-->

                <ul class="nav navbar-nav navbar-left">

                    <li class="dropdown">

                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /><?= t('បញ្ចូលព័ត៌មានមន្ត្រីរាជការ') ?><b class="caret"></b></a>

                        <ul class="dropdown-menu">

                            <?php get_link('csv', 'csv_info', 'form', 'បញ្ចូលព័ត៌មានមន្ត្រីថ្មី'); ?>
                            <?php get_link('csv', 'internship_info', 'index', 'បញ្ចូលព័ត៌មាននិស្សិតចុះកម្មសិក្សា'); ?>

                            <!-- <?php get_link('csv', 'csv_info', 'formretire', 'បញ្ចួលមន្ត្រីចូលនិវត្ដន៍'); ?>-->

                            <!--<?php get_link('csv', 'csv_importexcel', 'index', 'បញ្ចូលតាម Excel File'); ?>-->

                            <!--<li class='divider'></li>-->

                        </ul>

                    </li>

                </ul>



                <ul class="nav navbar-nav navbar-left">

                    <li class="dropdown">

                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /><?= t('បច្ចុប្បន្នភាពមន្ត្រីរាជការ') ?><b class="caret"></b></a>

                        <ul class="dropdown-menu">

                            <?php get_link('csv', 'csv_update', 'csv_terminate', 'ការចូលនិវត្តដោយការបាត់បង់សម្បទាវិជ្ជាជីវៈ'); ?>

                            <?php get_link('csv', 'csv_update', 'list_promoted_csv', 'តម្លើងឋានន្តរសក្កិ/ថ្នាក់'); ?>

            <!-- Rathana -->
                            <?php get_link('csv', 'csv_update', 'csv_promoted_former_work', 'តម្លើងឋានន្តរសក្កិតាមវេនឬ តាមអតីតការងារ'); ?>
                            <?php get_link('csv', 'csv_update', 'csv_permission_holiday', 'ច្បាប់អនុញ្ញាតច្បាប់ឈប់សម្រាក'); ?>
            <!-- end Rathana -->

                            <?php get_link('csv', 'csv_update', 'csv_promoted_certificated', 'តម្លើងឋានន្តរសក្កិ/ថ្នាក់តាមវិញានបនប័ត្រ'); ?>

                            <?php get_link('csv', 'csv_update', 'csv_transfer_job', 'ផ្ទេរការងារមន្ត្រី'); ?>

                            <?php get_link('csv', 'csv_update', 'csv_maternity_leave', 'បោះបង់ ឬ លំហែមាតុភាព'); ?>

                            <?php get_link('csv', 'csv_update', 'csv_units_dignitaries', 'គ្រឿងឥស្សរិយយស'); ?>

                            <?php get_link('csv', 'csv_info', 'formdelete', 'លុបមន្ត្រី'); ?>

                            <!--                            <li><a href="#">បោះបង់ ឬ លំហែមាតុភាព</a></li>  -->

<!--                            <li><a href="#"> គ្រឿងឥស្សរិយស</a></li>           -->

                            <li class="divider"></li>

                          

                        </ul>

                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-left">

                    <!-- search road -->

                    <li class="dropdown">

                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" /> ស្វែងរកព័ត៌មានមន្ត្រីរាជការ<b class="caret"></b></a>

                        <ul class="dropdown-menu">

                           

                            <li class="dropdown-submenu">

                                <a tabindex="-1" href="javascript:void(0)"> <?= t('តាមលក្ខខ័ណ្ឌ') ?></a>

                                <ul class="dropdown-menu">

                                    <?php get_link('csv', 'csv_info', 'index', 'ព័ត៌មានទូទៅ'); ?>

                                    <!-- <?php get_link('csv', 'csv_search_present', 'index', 'ទម្រង់ធ្វើបច្ចុប្បន្នភាព'); ?> -->

                                    <?php get_link('csv', 'csv_search_advance', 'index', 'កម្រិតខ្ពស់'); ?>

                                    <!--  <?php get_link('csv', 'csv_search', 'index', 'អង្គភាព'); ?>-->

                                    <?php get_link('csv', 'csv_search', 'unit_and_current_rule', 'មុខតំណែងនិងអង្គភាព'); ?>



                                </ul>

                            </li>

                            <!-- search by framework -->

                            <?php if ($dmid == '1'): ?>

                                <li class="dropdown-submenu">

                                    <a tabindex="-1" href="javascript:void(0)"> <?= t('តាមក្របខ័ណ្ឌ') ?></a>

                                    <ul class="dropdown-menu">

                                        <?php get_link('csv', 'csv_info', 'index_k1', 'ក្របខ័ណ្ឌ ក'); ?>

                                        <?php get_link('csv', 'csv_info', 'index_k2', 'ក្របខ័ណ្ឌ ខ'); ?>

                                        <?php get_link('csv', 'csv_info', 'index_k3', 'ក្របខ័ណ្ឌ គ'); ?>

                                        <?php get_link('csv', 'csv_retires', 'index', 'មន្រ្តីចូលនិវត្ដន៍៍'); ?>

                                    </ul>

                                </li>

                            <?php endif; ?>

                            <?php ?>

                        </ul>

                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-left ">

                    <?php if ($dmid == '1'): ?>

                        <li class="dropdown hidden">

                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trash-o fa-1x" aria-hidden="true"></i> លុបមន្រ្តី<b class="caret"></b></a>

                            <ul class="dropdown-menu">



                                <?php ?>

                                <?php get_link('csv', 'csv_info', 'formdelete', 'លុបមន្ត្រី'); ?>

                                <li class='divider'></li>

                            </ul>

                        </li>

                        <li class="dropdown">

                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> អង្គភាព<b class="caret"></b></a>

                            <ul class="dropdown-menu">

                                <?php ?>

                                <?php get_link('csv', 'csv_units', 'index', ' អង្គភាព​'); ?>

                                <?php get_link('csv', 'csv_general_departments', 'index', ' ព័ត៌មាន​ អគ្គនាយកដ្ឋាន'); ?>

                                <?php get_link('csv', 'csv_departments', 'index', ' ព័ត៌មាន​ នាយកដ្ឋាន'); ?>

                                <?php get_link('csv', 'csv_offices', 'index', ' ព័ត៌មាន​ ការិយាល័យ'); ?>

                                <?php get_link('csv', 'csv_offices', 'all_pro_office', ' ព័ត៌មាន​ ការិយាល័យរាជធានី / ខេត្ត'); ?>

                                <?php get_link('csv', 'csv_land_officials', 'index', 'ព័ត៌មាន​ ការិយាល័យភូមិបាល'); ?>

                                <?php get_link('csv', 'csv_units_dignitaries', 'csv_dignitaries', 'គ្រឿងឥស្សរិយយស'); ?>

                                <?php get_link('csv', 'csv_list_ministry', 'csv_ministry', 'រាយនាមបញ្ជីឈ្មោះក្រសួង'); ?>

                                <li class='divider'></li>

                            </ul>

                        </li>

                    <?php elseif ($dmid == '2'): ?>

                    <?php endif; ?>

                    <li class="dropdown">

                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/bs/css/images/reports.gif') ?>" /> <?= t('របាយការណ៍') ?><b class="caret"></b></a>

                        <ul class="dropdown-menu">

                            <?php get_link('csv', 'csv_report', 'index', 'មន្រ្តីតាមអង្គភាព'); ?> 

                            <?php get_link('csv', 'framework_report', 'index', 'មន្រ្តីតាមក្របខ័ណ្ឌ'); ?> 

 <!--  this is Rathana block -->
                            <li class="dropdown-submenu">

                            <a tabindex="-1" href="javascript:void(0)"> <?= t('របាយការណ៍ បច្ចុប្បន្នភាពមន្ត្រីរាជការ') ?></a>
                                <ul class="dropdown-menu">

                                <!-- <?php get_link('csv', 'csv_list_staff_update', '', 'ការចូលនិវត្តដោយការបាត់បង់សម្បទាវិជ្ជាជីវៈ'); ?>
                                <?php get_link('csv', 'csv_list_staff_update', '', 'តម្លើងឋានន្តរសក្កិ/ថ្នាក់តាមវិញានបនប័ត្រ'); ?>
                                <?php get_link('csv', 'csv_list_staff_update', '', 'តម្លើងឋានន្តរសក្កិ/ថ្នាក់'); ?> -->

                                <?php get_link('csv', 'csv_list_staff_update', 'csv_transfer_out', 'ផ្ទេរការងារមន្ត្រីចេញ'); ?>
                                <?php get_link('csv', 'csv_list_staff_update', 'csv_maternity_leave', 'លំហែមាតុភាព'); ?>
                                
                                <?php get_link('csv', 'csv_permission_holiday_report', 'index', 'មន្ត្រីទទួលបានច្បាប់ឈប់សម្រាក'); ?>
                                <?php get_link('csv', 'csv_promoted_former_work', 'index', 'តម្លើងឋានន្តរសក្កិតាម វេន/អតីតការងារ'); ?>

                                </ul>
                            </li>

                            <?php get_link('csv', 'csv_real_promote', 'index', 'មន្រ្តីតាំងស៊ប់តាមឆ្នាំ'); ?>
                            <?php get_link('csv', 'csv_new_framework_year','index', 'មន្រ្តីរាជការ ក្របខណ្ឌថ្មីតាមឆ្នាំ'); ?>
                            <?php get_link('csv', 'csv_degree_report','index', 'មន្រ្តីតាមប្រភេទសញ្ញាបត្រ និងកម្រិតសញ្ញាបត្រ'); ?>
                            <?php get_link('csv', 'csv_deleted_report', 'index', 'មន្រ្តីបានលុបឈ្មោះ'); ?>
                            <?php get_link('csv', 'internship_info', 'intern_report', 'ព័ត៌មាននិស្សិតចុះកម្មសិក្សា'); ?>
<!-- End this is Rathana block -->  

                            
                            <?php get_link('csv', 'csv_currentrole_report', 'index', 'ស្ថិតិមុខតំណែងមន្រ្តីរាជការបម្រើការងារ</br>ក្នុងទីស្តីការក្រសួង'); ?>

                            <!-- <?php //get_link('csv', 'framework_detail_report', 'index', 'មន្រ្តីលម្អិតតាមក្របខ័ណ្ឌ'); ?> -->

                           <?php get_link('csv', 'csv_report_detail', 'index', 'របាយការណ៍លម្អិត'); ?>

                            <?php get_link('csv', 'csv_currentrole_report', 'cr_report_province', 'ស្ថិតិមុខតំណែងមន្រ្តីរាជការបម្រើការងារ</br>ថ្នាក់មន្ទីរាជធានីខេត្ត'); ?>


                        </ul>

                    </li>





                </ul>





                <?php

                $query = $this->db->query('select * from unit');

                ?>



<!--                <ul class="nav navbar-nav navbar-left ">

                    <li class="dropdown">

                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/bs/css/images/reports.gif') ?>" /> <?= t('បញ្ជីមន្ត្រីតាមអង្គភាព') ?><b class="caret"></b></a>

                        <ul class="dropdown-menu scroll-menu">

                            <?php

                            foreach ($query->result() as $row) {

                                ?>

                                <li>

                                    <a href="<?php echo site_url('csv/csv_report/pdf_by_official?unit=' . $row->id) ?>" target="_blank"><?php echo $row->unit; ?></a>

                                </li>

                            <?php } ?>

                        </ul>

                    </li>

                </ul>-->

                <!-- others -->

                <ul class="nav navbar-nav navbar-right" style="margin-right: -13px;">

                    <li class="dropdown">

                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">​<img src="<?= base_url('assets/bs/css/images/others.gif') ?>" /> <?= t(' ') ?><b class="caret"></b></a>

                        <ul class="dropdown-menu">

                            <li><a href="javascript:void(0)"><img src="<?= base_url('assets/bs/css/images/khmer_flag.gif') ?>" /> <?= t('ភាសាខ្មែរ') ?></a></li>

                            <li><a href="javascript:void(0)"><img src="<?= base_url('assets/bs/css/images/uk_flag.gif') ?>" /> <?= t('ភាសាអង់គ្លេស') ?></a></li>

                            <li class="divider dv"></li>

                            <li><a href="javascript:void(0)"><b><?php echo $this->session->userdata('full_name'); ?></b> កំពុងប្រើប្រាស់...</li></a>



                            <?php ?>

                            <?php // get_link('admin', 'backup', 'index', 'ការចម្លងរក្សាទុក'); ?>

                            <?php get_link('admin', 'activity_log', 'index', 'សកម្មភាពចូលប្រើប្រាស់'); ?>

                            <?php ?>

                            <?php ?>

                              <!--<li><a href="<?= site_url('admin/backup/index') ?>"><?= t('ការចម្លងរក្សាទុក') ?></a></li>-->

                              <!--<li><a href="<?= site_url('admin/activity_log/index') ?>"><?= t('សកម្មភាពចូលប្រើប្រាស់') ?></a></li>-->

                            <?php ?>

                            <li class="divider dv"></li>

                            <li><a href="<?= site_url('admin/login/logoff') ?>"><img src="<?= base_url('assets/bs/css/images/log_out.gif') ?>" /> <?= t('ចាកចេញ') ?></a></li>

                            <li class="divider dv"></li>

                        </ul>

                    </li>



                </ul>



                <!-- manage users -->

                <?php if ($this->session->userdata('dmid') == '1') { ?>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">

                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/bs/css/images/users.gif') ?>" /> <?= t('អ្នកប្រើប្រាស់') ?> <b class="caret"></b></a>

                            <ul class="dropdown-menu">



                                <?php ?>

                                <?php get_link('admin', 'users', 'form', 'បញ្ចូលព័ត៌មានអ្នកប្រើប្រាស់'); ?>

                                <?php get_link('admin', 'users', 'index', 'ស្វែងរកព័ត៌មានអ្នកប្រើប្រាស់'); ?>

                                <li class='divider'></li>

                                <?php get_link('admin', 'roles', 'form', 'បញ្ចូលព័ត៌មានតួនាទី'); ?>

                                <?php get_link('admin', 'roles', 'index', 'ស្វែងរកព័ត៌មានតួនាទី'); ?>

                                <li class='divider'></li>

                                <?php get_link('admin', 'members', 'form', 'បញ្ចូលព័ត៌មានសមាជិក'); ?>

                                <?php get_link('admin', 'members', 'index', 'ស្វែងរកព័ត៌មានសមាជិក'); ?>

                                <li class='divider'></li>

                                <?php get_link('admin', 'role_permission', 'index', 'កំណត់សិទ្ធិ'); ?>

                                <?php ?>



                            </ul>

                        </li>

                    </ul>

                <?php } ?>

            </div>

            <!-- /.navbar-collapse -->

        </div>

        <!-- .container-fluid -->

    </div>

</nav>



<style type="text/css">

    .navbar-brand:hover{background: #CCC;}



    .navbar-default .navbar-nav > li > a {

        color: black;

    }

    .navbar-default .navbar-nav > li > a:hover {

        color: #428bca;

    }

</style>



<div class="container">

