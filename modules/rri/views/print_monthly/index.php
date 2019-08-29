<div style="text-align: right;margin-top: 20px;">
    <a href="javascript:void(0)" class="lbl_print_monthly" id="lbl_print_monthly"><img src="<?= base_url('assets/bs/css/images/print.gif') ?>" />​ បោះពុម្ព</a>
</div><br />

<!-- div print ---------------------------------------->
<div class="dv_prt_monthly" id="dv_prt_monthly"></div>

<div style="text-align: right;margin-top: 20px;">
    <a href="javascript:void(0)" class="lbl_print_monthly" id="lbl_print_monthly"><img src="<?= base_url('assets/bs/css/images/print.gif') ?>" />​ បោះពុម្ព</a>
</div>

<script type="text/javascript">

    $.ajax({
        url: "<?= site_url('rri/print_monthly/prt_monthly') ?>",
        type: "post",
        datatype: "html",
        async: true,
        beforeSend: function () {
            $('.xmodal').show();
        },
        data: {},
        success: function (d) {
            $('.xmodal').hide();
            $('#dv_prt_monthly').html(d);
        },
        error: function () {

        }
    });

    $(function () {
        // lbl print =======================
        $(".lbl_print_monthly").on("mouseover", function () {
            $(".lbl_print_monthly").css({
                "background": "#cccccc"
            });
        });

        $(".lbl_print_monthly").on("mouseout", function () {
            $(".lbl_print_monthly").css({
                "background": ""
            });
        });

        // print diag =====================
        $('.lbl_print_monthly').on("click", function () {
            var params = [
                'height=' + screen.height,
                'width=' + screen.width,
                'fullscreen=yes',
                'modal=yes'
            ];
            var divToPrint = document.getElementById('dv_prt_monthly');
            var popupWin = window.open('', '_blank', params); // var popupWin = window.open('', '_blank', 'width=800,height=600'); // width=800,height=500
            popupWin.moveTo(0, 0);
            popupWin.document.open();
            popupWin.document.write('<html><head><title></title></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.print();
            popupWin.close();
        });

    });
</script>