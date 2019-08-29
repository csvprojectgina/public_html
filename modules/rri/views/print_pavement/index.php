<div style="text-align: right;margin-top: 20px;">
    <a href="javascript:void(0)" class="lbl_print_pavement" id="lbl_print_pavement"><img src="<?= base_url('assets/bs/css/images/print.gif') ?>" />​ បោះពុម្ព</a>
</div>

<!---------------------------------------------------------->
<div class="prt_pavement" id="prt_pavement">
</div>

<div style="text-align: right;margin-top: 20px;">
    <a href="javascript:void(0)" class="lbl_print_pavement" id="lbl_print_pavement"><img src="<?= base_url('assets/bs/css/images/print.gif') ?>" />​ បោះពុម្ព</a>
</div>

<script type="text/javascript">
    $(function () {

        $.ajax({
            url: '<?= site_url('rri/print_pavement/rpt_pave') ?>',
            dataType: 'html',
            type: 'post',
            async: true,
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {},
            success: function (d) {
                $('.xmodal').hide();
                $('#prt_pavement').html(d);
            },
            error: function () {

            }
        });

        $(".lbl_print_pavement").on("mouseover", function () {
            $(".lbl_print_pavement").css({
                "background": "#cccccc"
            });
        });

        $(".lbl_print_pavement").on("mouseout", function () {
            $(".lbl_print_pavement").css({
                "background": ""
            });
        });

        // print ========================
        $(".lbl_print_pavement").on("click", function () {
            var params = [
                'height=' + screen.height,
                'width=' + screen.width,
                'fullscreen=yes',
                'modal=yes'
            ];
            var divToPrint = document.getElementById('prt_pavement');
            var popupWin = window.open('', '_blank', params); // var popupWin = window.open('', '_blank', 'width=800,height=600'); // width=800,height=500
            popupWin.moveTo(0, 0);
            popupWin.document.open();
            popupWin.document.write('<html><head><title></title></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.print();
            popupWin.close();
        });

    });
</script>

