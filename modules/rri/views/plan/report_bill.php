<a href="javascript:void(0)" class="lnk_print" id="lnk_print">បោះពុម្ព</a>
<div class="prt_data" id="prt_data">
    <!------------------------------------------->
    <table class="data" cellpadding="5" cellspacing="0" align="center" style="vertical-align: middle;text-align: center;width:100%;font-weight: bold;font-size: 18px;border-bottom: 4px solid gray;">
        <tr>
            <td><img width="70" height="75" src="<?= base_url('assets/bs/css/images/logo_rpt.gif') ?>" /></td>
            <td>MINISTRY OF RURAL DEVELOPMENT</td>
            <td></td>
        </tr> 
    </table>

    <!------------------------------------------->
    <table class="data" cellpadding="5" cellspacing="0" align="center" style="width:100%;font-weight: bold;">
        <!--<caption style="text-align: center;font-size: 16px;">Bill of Quantities</caption><br />-->
        <tr>
            <td></td>
            <td style="text-align: center;font-size: 16px;text-decoration: underline;">Bill of Quantities</td>
            <td></td>
        </tr>
        <tr>
            <td>Province:</td>
            <td>Dynamic</td><!-- dynamic ---------->
        </tr>
        <tr>
            <td>Contact No:</td>
            <td>dynamic</td><!-- dynamic ---------->
        </tr>        
        <tr>
            <td>Road Section Name:</td>
            <td>dynamic</td><!-- dynamic ---------->
            <td>Commune:</td>
            <td>dynamic</td><!-- dynamic ---------->
        </tr>

        <tr>
            <td>Section Length:</td>
            <td>dynamic</td><!-- dynamic ---------->
            <td>District:</td>
            <td>dynamic</td><!-- dynamic ---------->
        </tr>    
    </table><br />

    <table width="100%" class="data" cellpadding="0" cellspacing="0" align="center" border="1" style="border: 2px solid blue;border-collapse: collapse;vertical-align: middle;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Works Description</th>
                <th>Unit</th>
                <th>Quantities</th>
                <th>Unit Rate ($US)</th>
                <th>Amount ($US)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>R-3</td>
                <td>Heavy Grading,...</td>
                <td>workday</td>
                <td></td>
                <td></td>
                <td></td>                
            </tr>

            <tr>
                <td></td>
                <td>Heavy Grading,...</td>
                <td>workday</td>
                <td></td>
                <td></td>
                <td></td>                
            </tr>
            <tr>
                <td>R-4</td>
                <td>Heavy Grading,...</td>
                <td>workday</td>
                <td></td>
                <td></td>
                <td></td>                
            </tr>
            <tr>
                <td>R-2</td>
                <td>Heavy Grading,...</td>
                <td>workday</td>
                <td></td>
                <td></td>
                <td></td>                
            </tr>
            <tr>
                <td>R-1</td>
                <td>Heavy Grading,...</td>
                <td>workday</td>
                <td></td>
                <td></td>
                <td></td>                
            </tr>
            <tr>
                <td>R-6</td>
                <td>Heavy Grading,...</td>
                <td>workday</td>
                <td></td>
                <td></td>
                <td></td>                
            </tr>
            <tr>
                <td>R-7</td>
                <td>Heavy Grading,...</td>
                <td>workday</td>
                <td></td>
                <td></td>
                <td></td>                
            </tr>
            <tr>
                <td>R-5</td>
                <td>Heavy Grading,...</td>
                <td>workday</td>
                <td></td>
                <td></td>
                <td></td>                
            </tr>
            <tr>
                <td>R-2,R-3</td>
                <td>Heavy Grading,...</td>
                <td>workday</td>
                <td></td>
                <td></td>
                <td></td>                
            </tr>

        </tbody>
        <tfoot style="border-top: 1px solid;">
            <tr>
                <td>
                </td> 
                <td colspan="4">
                    Total Repair Cost for Section
                </td> 
                <td style="border: 2px solid;">                    
                </td>                 
            </tr>     
        </tfoot>
    </table><br />

    <!-------------------------------------->
    <table class="data" cellpadding="5" cellspacing="0" align="center" style="width:100%;">
        <tr>
            <td>Note:</td>
            <td>The Gravel haulage distance about 30 km to the site</td>
        </tr>
        <tr>
            <td>Signed:</td>
            <td>...........................</td>
            <td>Date:</td>
            <td>...........................</td>
        </tr>
        <tr>
            <td colspan="2" style="">(Contractor)</td>
        </tr>
        <tr>
            <td>Name:</td>
            <td>..........................</td>
        </tr>

    </table>
</div>
<style type="text/css">
    th{text-align: center;}
</style>

<script type="text/javascript">
    // print bill ===================================
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
