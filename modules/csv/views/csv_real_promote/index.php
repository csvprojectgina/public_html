<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css"/>

<style media="screen">
    .panel-title > a {
        color: #498fcc !important;
        font-size: 16px;
        margin-top: -10px;
        margin-right: -16px;
        padding: 5px;
        border-top-left-radius: 0px;
        border-down-left-radius: 0px;
        /*background: #ddd;*/
    }

    .remove-file, #add-field {
        cursor: pointer;
    }

    .remove-file i {
        color: red;
    }

    .panel-title a {

    }

</style>

<div class="panel panel-default">
    <div class="panel-heading thumbnail btn-group">
        <h3 class="panel-title">
            
            <?= t('ស្ថិតិមន្រ្តីរាជការ តាំងស៊ប់តាមឆ្នាំ') ?>
        </h3>
    </div>
    <div class="panel-body">
        <div style="margin: -10px 0 40px 0;vertical-align: middle;">
                <span style="float: left;margin: 5px 0 0 0;">
                    <label for="year"> <?= t('តាមរយៈឆ្នាំ') ?>:</label>
                    <select name="retire_by_year" id="by_year"
                            style="height: 30px;border-radius: 4px;line-height: 4px; width: 80px">
                        <?php
                        $preyear = date("Y", strtotime("-20 year"));
                        $nowyear = date('Y', strtotime("0 year"));
                        while (strtotime($nowyear) >= strtotime($preyear)) {

                            if ($nowyear == date('Y')) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }

                            echo "<option value='{$nowyear}'  {$selected}>{$nowyear}</option>";
                            $nowyear -= 1;
                        }
                        ?>
                        <option value="0">--All--</option>

                    </select>
                </span>
            <span class="pull-right">


            <div style="text-align: right;">
    <form class="form-horizontal" role="form" action="<?= site_url('csv/csv_report/pdf') ?>" method="post">
        <span class="search" style="float: right;">
            <label class="btn btn-default" type="submit" id="btn_print"><span class="glyphicon glyphicon-print"></span> PDF</label>
        </span>
    </form>
</div>

                </span>
        </div>
        <table cellpadding="0" cellspacing="0" border="1"
               class="table table-hover table-striped table-bordered dt-responsive nowrap" id="my_gr"
               data-name="cool-table">
            <thead>
            <?php
            //            $dmid = $this->session->all_userdata()['dmid'];
            ?>
            <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
                <th style="text-align: center; vertical-align: middle;"><?= t('ល.រ') ?></th>
                <th style="text-align: center; vertical-align: middle;"><?= t('ឈ្មោះ') ?></th>
                <th style="text-align: center; vertical-align: middle;"><?= t('ភេទ') ?></th>
                <th style="text-align: center;  vertical-align: middle;"><?= t('មុខតំណែង') ?></th>
                <th style="text-align: center; vertical-align: middle;"><?= t('អង្គភាព') ?></th>
                <th style="text-align: center; vertical-align: middle;"><?= t('កាលបរិច្ឆេទតាំងស៊ប់') ?></th>
               
            </tr>
            </thead>
            <tbody>


            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

<script type="text/javascript">

    $(function () {
        var by_year = $('#by_year').val();
        $.ajax({
            url: '<?= site_url('csv/csv_real_promote/get_csv_real_promote') ?>',
            type: 'post',
            datatype: 'json',
            beforeSend: function () {

            },

            data: {by_year: by_year},

            success: function (data) {
                $('#my_gr tbody').html(data);
            }
        });
    });
    $('#by_year').on('change', function () {
        var by_year = $('#by_year').val();
        $.ajax({
            url: '<?= site_url('csv/csv_real_promote/get_csv_real_promote') ?>',
            type: 'post',
            datatype: 'json',
            beforeSend: function () {

            },

            data: {by_year: by_year},

            success: function (data) {
                $('#my_gr tbody').html(data);
            }
        });
    });

    
    $(document).on('click', '#btn_print', function (e) {

        var by_year = $('#by_year').val();
        var win = window.open('<?= site_url('csv/csv_real_promote/report_pdf?by_year=') ?>'+by_year, '_blank');
        if (win) {
            //Browser has allowed it to be opened
            win.focus();
        } else {
            //Browser has blocked it
            alert('Please allow popups for this website');
        }
    });
</script>
