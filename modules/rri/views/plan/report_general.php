<a href="javascript:void(0)" class="lnk_print" id="lnk_print">បោះពុម្ព</a><br /><br />

<div class="prt_data" id="prt_data">
    <table cellpadding="10" cellspacing="0" style="font-weight: bold;width: 100%;border-top: 3px solid gray;border-bottom: 3px solid gray;">
        <tr>
            <td>General Routine Maintenance: Budget Estimate</td>
        </tr>
    </table>

    <!------------------------------------------->
    <table class="data" cellpadding="10" cellspacing="0" align="center" style="width:100%;font-weight: bold;">
        <tr>
            <td>Region:</td>
            <td>NORTH</td><!-- dynamic ---------->
            <td>Province:</td>
            <td>dynamic</td><!-- dynamic ---------->

        </tr>
        <tr>
            <td>Road:</td>
            <td>dynamic</td><!-- dynamic ---------->
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Section:</td>
            <td>dynamic</td><!-- dynamic ---------->
            <td>Length:</td>
            <td>dynamic</td><!-- dynamic ---------->
            <td>Surface Type:</td>
            <td>dynamic</td><!-- dynamic ---------->

        </tr>    
    </table><br />

    <table width="100%" class="data" cellpadding="0" cellspacing="0" align="center" style="vertical-align: middle;">
        <thead style="border-top: 3px solid;border-bottom: 3px solid;">
            <tr>
                <th>Scheduled Task:</th>
                <th>Units</th>
                <th>Period Quality</th>
                <th>Intervention Frequency</th>
                <th>Annual Work</th>
                <th>Assigned Resource</th>
                <th>Daily Productivity</th>
                <th>Repair days / cycle</th>
                <th>Daily Rate $US</th>
                <th>Annual Total $US</th>
            </tr>
        </thead>
        <tbody style="">
            <tr>
                <td colspan="9"></td>
                <td>1</td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td>2</td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td>3</td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td>4</td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td>5</td>
            </tr>
        </tbody>
        <tfoot style="border-top: 1px solid;">
            <tr style="font-weight: bold;">
                <td colspan="9" style="text-align: right;">
                    TOTAL ROUTINE MAINTENANCE ESTIMATE FOR KRAING SRAMOR-SPEAN TAING KHMAO:
                </td> 
                <td style="text-align: center;">
                    Dynamic
                </td> 
            </tr>     
            <tr>
                <td colspan="9" style="text-align: right;">
                    Rate:
                </td> 
                <td style="text-align: center;">
                    Dynamic
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<style type="text/css">
    th{text-align: center;}
</style>

<script type="text/javascript">
    // print general ===================================
    $("#lnk_print").on("click", function() {
        var params = [
            'height=' + screen.height,
            'width=' + screen.width,
            'fullscreen=yes',
            'modal=yes'
        ];
        var divToPrint = document.getElementById('prt_data');
        var popupWin = window.open('', '_blank', params); // var popupWin = window.open('', '_blank', 'width=800,height=600'); // width=800,height=500
        popupWin.moveTo(0, 0);
        popupWin.document.open();
        popupWin.document.write('<html><head><title></title></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.print();
        popupWin.close();
    });
</script>