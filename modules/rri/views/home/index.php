<div class="dv_con">
    <div style="text-align: center;margin: 10px 0 20px 0;">
        <p style="font-size: 28px;font-family: khmer mef2;color: #000999;"><?= t('ប្រព័ន្ធគ្រប់គ្រងទិន្នន័យផ្លូវជនបទ') ?></p>
    </div>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -------------------->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            <li data-target="#carousel-example-generic" data-slide-to="5"></li>
            <li data-target="#carousel-example-generic" data-slide-to="6"></li>
            <li data-target="#carousel-example-generic" data-slide-to="7"></li>
            <li data-target="#carousel-example-generic" data-slide-to="8"></li>
            <li data-target="#carousel-example-generic" data-slide-to="9"></li>
            <li data-target="#carousel-example-generic" data-slide-to="10"></li>
            <li data-target="#carousel-example-generic" data-slide-to="11"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <img src="<?= base_url('assets/bs/css/images/roads/1(1).gif') ?>" />
            </div>
            <div class="item"><img src="<?= base_url('assets/bs/css/images/roads/1(2).gif') ?>" /></div>
            <div class="item"><img src="<?= base_url('assets/bs/css/images/roads/1(3).gif') ?>" /></div>
            <div class="item"><img src="<?= base_url('assets/bs/css/images/roads/1(4).gif') ?>" /></div>
            <div class="item"><img src="<?= base_url('assets/bs/css/images/roads/1(5).gif') ?>" /></div>
            <div class="item"><img src="<?= base_url('assets/bs/css/images/roads/1(6).gif') ?>" /></div>
            <div class="item"><img src="<?= base_url('assets/bs/css/images/roads/1(7).gif') ?>" /></div>
            <div class="item"><img src="<?= base_url('assets/bs/css/images/roads/1(8).gif') ?>" /></div>
            <div class="item"><img src="<?= base_url('assets/bs/css/images/roads/1(9).gif') ?>" /></div>
            <div class="item"><img src="<?= base_url('assets/bs/css/images/roads/1(10).gif') ?>" /></div>
            <div class="item"><img src="<?= base_url('assets/bs/css/images/roads/1(11).gif') ?>" /></div>
            <div class="item"><img src="<?= base_url('assets/bs/css/images/roads/1(12).gif') ?>" /></div>
        </div>

        <!-- Controls --------------->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>

<!--    <style type="text/css">
        .slide{height: 800px;margin: auto;}
    </style>-->

    <script type="text/javascript">
        $(function () {

            $('.carousel').carousel();
            interval: 100;

        });
    </script>
