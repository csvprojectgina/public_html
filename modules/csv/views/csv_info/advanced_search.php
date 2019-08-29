<form class="form-horizontal" role="form" action="" method="post"> 


    <div class="panel panel-default">


        <div class="panel-heading">


            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​--> <?= t('ស្វែងរកកម្រិតខ្ពស់') ?></h3>


        </div>


        <div class="panel-body">





            <!------------------------------>


            <table cellpadding="0" cellspacing="0" style="margin: -10px 0 0 0; font-family: khmermef1;">                                  


                <tr>


                    <td><label for="current_role">តួនាទី</label></td>


                <td>


                    <select id="current_role" class="form-control current_role" style="width: 200px;">


                    </select>


                </td>      


<!--                </tr>


                <tr>-->


                    <td><label for="unit">អង្គភាព</label></td>


                    <td>


                        <select id="unit" class="form-control unit" style="width: 200px;"></select>                               


                    </td>


                    </tr>


                <tr>


                    <td><label for="work_office">ការិយាល័យ</label></td>


                    <td>


                        <select id="work_office" class="form-control work_office" style="width: 200px;"></select>


                    </td>


<!--                    </tr>


                <tr>-->


                    <td><label for="work_location">ទីតាំងបម្រើការងារ</label></td>


                    <td>


                        <select id="work_location" class="form-control work_location" style="width: 200px;">


                        </select>


                    </td>


                </tr>                    


            </table> 





            <!-- prt --------------------->


            <div id="dv_prt" class="dv_prt" style="display: none;"> 


                <table cellpadding="0" cellspacing="0" id="tbl_data" class="tbl_data" align="center" border="1" style="width: 100%;border: 2px solid blue;vertical-align: middle;text-align: center;border-collapse: collapse;font-family: Khmer MEF1;font-size: 14px;">


                    <thead style="font-family: khmermef1;font-weight: bold;  ">


                        <tr>


                            <td rowspan="3">ល.រ</td>


                            <td rowspan="3">លេខកូដ</td>


                            <td rowspan="3">ឃុំ/សង្កាត់</td>


                            <td rowspan="3">ឈ្មោះផ្លូវ</td>


                            <td rowspan="3">ប្រវែង (ម)</td>


                            <td rowspan="3">ទទឹង (ម)</td>


                            <td colspan="4">និយាមកា</td>


                            <!---------------->


                            <td rowspan="3">ប្រភេទសំណង់</td>


                            <td rowspan="3">ឈ្មោះសំណង់</td>





                            <td rowspan="3">ប្រភេទកម្រាល</td>


                            <td rowspan="3">ប្រភេទផ្លូវ</td>


                            <td rowspan="3">ប្រភពថវិកា</td>


                            <td rowspan="3">អនុវត្តន៍ដោយ</td>


                            <td rowspan="3">ឆ្នាំ​ជួសជុល</td>


                        </tr>


                        <tr>


                            <td colspan="2">ចំនុចដើមផ្លូវ</td>


                            <td colspan="2">ចំនុចចុងផ្លូវ</td>


                        </tr>


                        <tr>


                            <td>x</td>


                            <td>y</td>


                            <td>x</td>


                            <td>y</td>


                        </tr>


                    </thead>


                    <tbody>


                    </tbody>


                    <tfoot style="border-top: 2px solid blue;">


                        <tr>


                            <td colspan="4" style="font-family: khmermef2;font-size: 14px;">សរុបរួម</td>


                            <td id="to_l" style="font-weight: bold;text-align: right;"></td>


                            <td colspan="12"></td>


                        </tr>            


                    </tfoot>


                </table>


            </div>





            <div style="margin-bottom: 5px;">


                <select id="s_dis">


                    <option>15</option>


                    <option>50</option>


                    <option>100</option>


                    <option>500</option>


                    <option>1000</option>


                </select>


                <label for="s_dis"><?= t('នាក់') ?></label>


            </div>





            <!-- table data ----------------------->


            <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-hover" style="text-align: center; vertical-align: middle; font-family: khmermef1;" id="my_gr">


                <thead>


                    <tr>


                        <th><?= t('គោត្តនាម') ?></th>


                        <th><?= t('នាម') ?></th>


                        <th><?= t('ភេទ') ?></th>


                        <th><?= t('លេខទូរស័ព្ទ') ?></th>


                        <th><?= t('តួនាទី') ?></th>


                        <th><?= t('អង្គភាព') ?></th>


                        <th><?= t('ការិយាល័យ') ?></th>


                        <th><?= t('ទីតាំងបម្រើការងារ') ?></th>


                        <th><a href="<?= site_url('csv/csv_info/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូល​ថ្មី') ?></a></th>            


                    </tr>


                </thead>


                <tbody>


                </tbody>


                <tfoot>


                </tfoot>                


            </table>





            <table cellpadding="0" cellspacing="0" style="width: 100%;vertical-align: middle;">


                <tr>


                    <td style="text-align: left;"><span id="disp"></span></td>


                    <td style="text-align: right;"><span><ul class="pagination" id="pagination-grid" style="margin-top: 5px;"></ul></span></td>


                </tr>


            </table>





        </div>


    </div>


</form>





<<script>


     $(function() {


     


     });


     // grid ==============================


    function grid(current_page, total_display) {


        // var =================


        var limit = total_display - 0;


        var offset = (current_page - 1) * total_display;


        //work==========


       var current_role = $('#current_role').val();


        var unit = $('#unit').val();


        var work_office = $('#work_office').val();


        var work_location = $('#work_location').val();


        


        $.ajax({


            url: '<?= site_url('csv/csv_info/search') ?>',


            type: 'post',


            datatype: 'json',


            // async: false,


            beforeSend: function() {


                $('.xmodal').show();


            },


            data: {offset: offset, limit: limit,current_role: current_role,unit: unit, work_office: work_office, work_location: work_location},


            success: function(data) {


                var total_page = data.total_page;


                var record = data.res;


                var total_record = data.total_record;


                var tr = "";


                var i = 0;


                alert(record);


                return false;


                if (record.length > 0) {


                    $.each(record, function(i, row) {


                        i++;


                        tr += "<tr>" +


                                "<td>" + row.civil_servant_id + "</td>" +                                


                                "<td><a href='<?= site_url('csv/csv_info/edit') ?>/" + row.id + "' class='editor' target='_parent'>បញ្ចូលថ្មី</a></td>" +


                                "</tr>";


                    });


                    $('#my_gr tbody').html(tr);


                    $('#disp').html('បង្ហាញទិន្នន័យ ' + (offset + 1) + '-' + ((offset + total_display) - 0 > total_record ? total_record : (offset + total_display)) + ' នៃទិន្នន័យ ' + total_record);





                    var pagination = '<li><a class="a-pagination" href="javascript:void(0)" data-currentpage="1">&laquo;</a></li>';


                    for (var i = 1; i <= 4; i++) {


                        var p = 1;


                        if (current_page <= 5) {


                            p = i;


                        } else {


                            p = current_page - 5 + i;


                        }


                        if (p <= total_page) {


                            var active = current_page == p ? ' class= "active" ' : '';


                            pagination += '<li ' + active + '><a class="a-pagination" href="javascript:void(0)" data-currentpage="' + p + '">' + p + '</a></li>';


                        }


                    }





                    for (var i = 0; i <= 5; i++) {


                        var pr = 1;


                        if (current_page <= 5) {


                            pr = 5 + i;


                        } else {


                            pr = current_page + i;


                        }


                        if (pr <= total_page) {


                            var active = current_page == pr ? ' class= "active" ' : '';


                            pagination += '<li ' + active + '><a class="a-pagination" href="javascript:void(0)" data-currentpage="' + pr + '">' + pr + '</a></li>';


                        }


                    }


                    pagination += '<li><a class="a-pagination" href="javascript:void(0)" data-currentpage="' + total_page + '">&raquo;</a></li>';





                    $('#pagination-grid').html(pagination);





                } else {


                    tr += "<tr>" +


                            "<td colspan='8' style='text-align: left;'>អត់មានទិន្ន័យ!</td>" +


                            "</tr>";


                    $('#my_gr tbody').html(tr);


                    $('#pagination-grid').html("");


                    $('#disp').html("");


                }


                $('.xmodal').hide();


            },


            error: function() {





            }


        });// ajax =================


    }


</script>