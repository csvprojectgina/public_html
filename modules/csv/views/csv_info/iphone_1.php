<!--datatable loop from datatabase-->


<style media="screen">


    .panel-title > a{


        color: #498fcc !important;


        font-size: 16px;


        margin-top: -10px;


        margin-right: -16px;


        padding: 5px;


        border-top-left-radius: 0px;


        border-down-left-radius: 0px;


        background: #ddd;}


    .container{


        padding-right: 0px ;


        padding-left: 0px;


    }


    .dataTables_filter input { 


       ma: -30px;


    }


</style>


<form class="form-horizontal" action="" role="form" method="post" style="padding-left:0px; padding-right:0px;">


    <div class="panel panel-default">





        <div class="panel-heading thumbnail btn-group">


            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ --><?= t('ព័ត៌មានមន្ត្រី') ?></h3>


        </div>


        <div class="panel-body">


            <div style="margin: -5px 0 10px 0;vertical-align: middle;">


                <table id="cd-grid" style=" font-family: khmermef1; " cellpadding="0" cellspacing="0" border="1" class="table table-hover table-striped table-bordered dt-responsive nowrap">


                    <thead>


                        <?php $dmid = $this->session->all_userdata()['dmid']; ?>


                        <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">


                            <!-- <th style="text-align: center;width: 5%;"><?= t('ល.រ') ?></th> -->


                            <th style="display:none;">id</th>


                            <th style="text-align: center;"><?= t('ឈ្មោះ') ?></th>


                            <th style="text-align: center;"><?= t('ភេទ') ?></th>


                            <th style="text-align: center;"><?= t('មុខតំណែង') ?></th>


                            <th style="text-align: center;"><?= t('លេខទូរស័ព្ទ') ?></th>


                            <th style="text-align: center;"><?= t('') ?></th>


                        </tr>


                    </thead>


                    <tbody>


                        <?php


                                $qr = query("SELECT


                                          cs.id,


                                          cs.firstname,


                                          cs.lastname,


                                          cs.gender,


                                          cs.mobile_phone,


                                          w.current_role_id,


                                          cr.current_role_in_khmer


                                  FROM


                                          civilservant AS cs


                                  INNER   JOIN `work` AS w ON cs.id = w.id


                                  LEFT   JOIN `currentrole` AS cr ON cr.id= w.current_role_id


                                  WHERE     1 = 1


                                      ORDER BY


                                              CASE


                                      WHEN cs.unit_official_code IN ('', '0') THEN


                                              1


                                      ELSE


                                              0


                                      END,


                                          CASE


                                      WHEN w.current_role_id IN ('', '0') THEN


                                              1


                                      ELSE


                                              0


                                      END,


                                       -w.current_role_id ASC


                                   ");


                        $res = $qr->result();


                        ?>


                        <?php foreach ($res as $row): ?>


                            <tr data-id="<?php echo $row->id; ?>" data-href='<?php echo site_url("csv/csv_info/edit" . "/" . $row->id); ?>' class='clickable-row display' >


                                <td style="display:none;"><?php echo $row->id; ?></td>


                                <td style=""><?php echo $row->lastname . ' ' . $row->firstname ?></td>


                                <td style="text-align: left;padding-right:0px;padding-left:0px; "><?php echo $row->gender; ?></td>


                                <td style="text-align: left;padding-right: 4px;padding-left:4px"><?php echo $row->current_role_in_khmer; ?></td>


                                <td style="text-align: left; white-space:nowrap;"><?php echo $row->mobile_phone; ?>


                                <td style="text-align: left; font-size: 11 ">​​<a href="<?= site_url('csv/csv_info/edit/'.$row->id) ?>" class="editor" target="_parent">លម្អិត</a></td>


                            </tr>


                        <?php endforeach; ?>


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





<!-- js. -->


<script type="text/javascript">


    // edit by row ===========


    $("body").delegate("#cd-grid tbody tr", "click", function () {


        var id = $(this).data('id');


        if (id - 0 > 0) {


              window.location="<?= site_url('csv/csv_info/edit') ?>/" + id;


//            window.open("<?= site_url('csv/csv_info/edit') ?>/" + id + "", "_blank");


        } else {


            alert("អត់មានទិន្នន័យ!");


            return false;


        }


    }


    );


    // row hover ===========


    $("body").delegate("#cd-grid tbody tr", "mouseover", function () {


        $(this).css('cursor', 'hand');


        // $(this).css('cursor', 'pointer');


    }


    );


    //  jQuery(document).ready(function($) {


    //   $(".clickable-row").click(function() {


    //       window.location = $(this).data("href");


    //   });


    //  });


    $('#cd-grid').DataTable({


        "oLanguage": {"sLengthMenu": "\_MENU_"},


        dom: 'Bfrtip',


        buttons: [


            {


                extend: 'copyHtml5',


                exportOptions: {


                    columns: ':contains("Office")'


                }


            },


            'excelHtml5',


            'csvHtml5',


            'pdfHtml5'


        ]


    });


</script>


