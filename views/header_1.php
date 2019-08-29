<?= $this->load->view('headerif') ?>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Home ------------------------------->
                <a href="<?= site_url('rri/home/index') ?>" class="navbar-brand" style="font-size: 14px;color: black;"><img width="18" height="19" src="<?= base_url('assets/bs/css/images/logo.png') ?>" /> <?= t('ទំព័រដើម') ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling ----------------->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-left">
                    <!-- search road ------------------------->
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" /> ស្វែងរកមន្ត្រីរាជការ<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <?php ?>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="javascript:void(0)"> <?= t('ស្វែងរកតាមលក្ខខ័ណ្ឌ') ?></a>

                                <ul class="dropdown-menu">
                                    <?php get_link('rri', 'search_province', 'index', 'រាជធានី-ខេត្ត'); ?>
                                    <li class='divider'></li>
                                    <?php get_link('rri', 'search_type_construction', 'index', 'ប្រភេទសំណង់សាធារណៈ'); ?>
                                    <?php get_link('rri', 'search_art_construction', 'index', 'ប្រភេទសំណង់សិល្បការ'); ?>
                                    <?php get_link('rri', 'search_type_road', 'index', 'ប្រភេទផ្លូវ'); ?>
                                    <?php get_link('rri', 'search_pavement', 'index', 'ប្រភេទកម្រាល'); ?>
                                    <?php get_link('rri', 'search_gis_id', 'index', 'GIS ID'); ?>
                                    <?php get_link('rri', 'roads', 'index', 'ព័ត៌មានទូទៅ'); ?>
                                    <li class='divider'></li>
                                    <?php get_link('rri', 'search_advanced', 'index', 'កម្រិតខ្ពស់'); ?>
                                </ul>
                            </li>
                            <?php get_link('rri', 'link_map', 'g_map2', 'ស្វែងរកតាមផែនទី'); ?>
                            <li class='divider'></li>
                            <?php get_link('rri', 'link_map', 'g_map2_admin', 'ស្វែងរកតាមផែនទី (admin)'); ?>
                            <?php get_link('rri', 'link_map_province', 'index', 'ស្វែងរកផែនទីតាមខេត្ត (admin)'); ?>
                            <?php ?>
                        </ul>
                    </li>
                </ul>

                <?php if ($this->session->userdata('dmid') == '1') { ?>
                    <!-- plan budget ----------------------------->
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><?= t('ផែនការថវិកា') ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">

                                <?php ?>
                                <!------------------------------->
                                <li class="dropdown-submenu">
                                    <a tabindex="1" href="javascript:void(0)"> <?= t('ការងារថែទាំ') ?></a>
                                    <ul class="dropdown-menu">
                                        <?php get_link('rri', 'maintenance', 'index', 'ការថែទាំជាប្រចាំ'); ?>
                                        <?php get_link('rri', 'maintenance', 'maintenance_by_pro', 'ការងារថែទាំតាមខេត្ត'); ?>
                                        <?php get_link('rri', 'maintenance', 'report_result', 'របាយការណ៍ប៉ាន់ស្មានលទ្ធផល'); ?>
                                    </ul>
                                </li>
                                <!----------------------------->
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="javascript:void(0)"> <?= t('កម្រិតខ្ពស់') ?></a>
                                    <ul class="dropdown-menu">
                                        <?php get_link('rri', 'plan', 'index', 'បញ្ចូល'); ?>
                                        <li class='divider'></li>
                                        <?php get_link('rri', 'assessment', 'index', 'ការវាយតម្លៃ'); ?>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="javascript:void(0)"> <?= t('ធនធាន') ?></a>
                                            <ul class="dropdown-menu">
                                                <?php get_link('rri', 'resources', 'surface_type', 'កំណត់ប្រភេទផ្ទៃក្រលា'); ?>
                                                <?php get_link('rri', 'resources', 'edit_resource', 'កែធនធានថែទាំផ្លូវ'); ?>
                                                <?php get_link('rri', 'resources', 'edit_task', 'កែការងារថែទាំផ្លូវ'); ?>
                                            </ul>
                                        </li>
                                        <!-------------------->
                                        <li class='divider'></li>
                                        <?php get_link('rri', 'plan', 'report_general', 'របាយការណ៍ប៉ាន់ប្រមាណ'); ?>
                                        <?php get_link('rri', 'plan', 'report_bill', 'របាយការណ៍'); ?>
                                    </ul>
                                </li>
                                <?php ?>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>

                <!-- add ----------------------------->
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> បញ្ចូលខ្សែផ្លូវ<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <?php ?>
                            <?php get_link('rri', 'roads', 'form', 'បញ្ចូលតាម Form'); ?>
                            <li class='divider'></li>
                            <?php get_link('rri', 'imports', 'index', 'បញ្ចូលតាម Excel'); ?>
                            <?php get_link('rri', 'import_track', 'index', 'បញ្ចូល Track'); ?>
                            <?php get_link('rri', 'roads', 'transaction', 'កែ ឬលុបខ្សែផ្លូវ'); ?>
                            <?php ?>
                        </ul>
                    </li>
                </ul>

                <!-- others --------------------------------------->
                <ul class="nav navbar-nav navbar-right" style="margin-right: -13px;">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">​<img src="<?= base_url('assets/bs/css/images/others.gif') ?>" /> <?= t(' ') ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><img src="<?= base_url('assets/bs/css/images/khmer_flag.gif') ?>" /> <?= t('ភាសាខ្មែរ') ?></a></li>
                            <li><a href="javascript:void(0)"><img src="<?= base_url('assets/bs/css/images/uk_flag.gif') ?>" /> <?= t('ភាសាអង់គ្លេស') ?></a></li>
                            <li class="divider dv"></li>
                            <li><a href="javascript:void(0)"><b><?php echo $this->session->userdata('full_name'); ?></b> កំពុងប្រើប្រាស់...</li></a>

                            <?php ?>
                            <?php get_link('admin', 'backup', 'index', 'ការចម្លងរក្សាទុក'); ?>
                            <?php get_link('admin', 'activity_log', 'index', 'សកម្មភាពចូលប្រើប្រាស់'); ?>
                            <?php ?>

                            <?php /* ?>
                              <li><a href="<?= site_url('admin/backup/index') ?>"><?= t('ការចម្លងរក្សាទុក') ?></a></li>
                              <li><a href="<?= site_url('admin/activity_log/index') ?>"><?= t('សកម្មភាពចូលប្រើប្រាស់') ?></a></li>
                              <?php */ ?>

                            <li class="divider dv"></li>
                            <li><a href="<?= site_url('admin/login/logoff') ?>"><img src="<?= base_url('assets/bs/css/images/log_out.gif') ?>" /> <?= t('ចាកចេញ') ?></a></li>
                            <li class="divider dv"></li>
                        </ul>
                    </li>

                </ul>

                <!-- manage users ----------------------------->
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

                <!-- report ------------------------------->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/bs/css/images/reports.gif') ?>" /> <?= t('របាយការណ៍') ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <?php ?>
                            <?php get_link('rri', 'print_index', 'index', 'រាជធានី-ខេត្ត'); ?>
                            <?php get_link('rri', 'print_pavement', 'index', 'ប្រភេទកម្រាល'); ?>
                            <?php get_link('rri', 'print_monthly', 'index', 'ប្រចាំខែ'); ?>
                            <?php get_link('rri', 'print_summarize', 'index', 'សង្ខេបតាមប្រភេទផ្លូវ'); ?>
                            <li class='divider'></li>
                            <?php get_link('rri', 'print_book', 'index', 'សៀវភៅបញ្ជីសារពើភ័ណ្ឌ'); ?>
                            <?php get_link('rri', 'print_book_all', 'index', 'សៀវភៅទូទាំងប្រទេស'); ?>
                            <?php get_link('rri', 'data_statistic', 'index', 'ព័ត៌មានខ្សែផ្លូវតាមស្ថិតិ'); ?>
                            <?php ?>
                        </ul>
                    </li>
                </ul>

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
