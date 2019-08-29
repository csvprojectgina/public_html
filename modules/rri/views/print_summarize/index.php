<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/reports.gif') ?>" /> <?= t('របាយការណ៍តាមប្រភេទផ្លូវ') ?></h3>
        </div>
        <div class="panel-body"> 
            <!-- dv print --------------------------------------------------->
            <div id="prt_toal_type" class="prt_toal_type">
            </div>
        </div>

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg" >
                <button data-toggle="tooltip" data-placement="left" title="បោះពុម្ពតាមប្រភេទផ្លូវ" id="btn_print" name="btn_print" type="button" class="btn btn-default glyphicon glyphicon-print" value=""> <?= t('បោះពុម្ព') ?></button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function () {

        $.ajax({
            url: '<?= site_url('rri/print_summarize/prt_summarize') ?>',
            dataType: 'html',
            type: 'post',
            async: true,
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {},
            success: function (d) {
                $('.xmodal').hide();
                $('#prt_toal_type').html(d);
            },
            error: function () {

            }
        });

    }); // end ready fun. ===============================

    $("#btn_print").on("click", function () {
        var params = [
            'height=' + screen.height,
            'width=' + screen.width,
            'fullscreen=yes',
            'modal=yes'
        ];
        var divToPrint = document.getElementById('prt_toal_type');
        //document.getElementById("prt_toal_type").innerHTML = document.title;
        var popupWin = window.open('', '_blank', params); // var popupWin = window.open('', '_blank', 'width=800,height=600'); // width=800,height=500
        popupWin.moveTo(0, 0);
        popupWin.document.open();
        popupWin.document.write('<html><head><title></title></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.print();
        popupWin.close();
    });

</script>
