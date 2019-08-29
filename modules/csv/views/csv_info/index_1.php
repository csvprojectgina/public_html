<style media="screen">

    .panel-title>a {

        color: #498fcc !important;

        font-size: 16px;

        margin-top: -10px;

        margin-right: -16px;

        padding: 5px;

        border-top-left-radius: 0px;

        border-down-left-radius: 0px;

        background: #ddd;

    }

</style>

<form action="" class="form-horizontal" method="post" role="form">

    <div class="panel panel-default">

        <div class="panel-heading thumbnail btn-group">

            <h3 class="panel-title">

                <!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ -->

                <?= t('ព័ត៌មានមន្ត្រី') ?>

                <a class="pull-right btn-xs btn-filter text-primary" href="<?= site_url('csv/csv_info/form') ?>">

                    <i class="fa fa-plus-circle">

                    </i>

                    <?= t('បញ្ចូលថ្មី') ?>

                </a>

            </h3>

        </div>

        <div class="panel-body">

        <table id="cd-grid" class="table table-hover table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" style=" font-family: khmermef1; " >

        <thead>

            <tr>

                <th style="display:none;">id</th>

                 <th>អត្តលេខមន្ត្រី</th>

                 <th>ឈ្មោះ</th>

                 <th>ភេទ</th>

                 <th>ថ្ងៃ ខែ ឆ្នាំ កំណើត</th>

                 <th>មុខតំណែង</th>

                 <th>លេខទូរស័ព្ទ</th>

                <th>ការិយាល័យ</th>

                <th>អង្គភាព</th>

            </tr>

        </thead>

        <!-- <tfoot>

            <tr>

                <th style="display:none;">id</th>

                <th>អត្តលេខមន្ត្រី</th>

                 <th>ឈ្មោះ</th>

                 <th>ភេទ</th>

                 <th>ថ្ងៃ ខែ ឆ្នាំ កំណើត</th>

                 <th>មុខតំណែង</th>

                 <th>លេខទូរស័ព្ទ</th>

                <th>ការិយាល័យ</th>

                <th>អង្គភាព</th>

            </tr>

        </tfoot> -->

            <tbody>

              <?php

              $qr = query("SELECT

                                          cs.id,

                                          cs.civil_servant_id,

                                          cs.firstname,

                                          cs.lastname,

                                          cs.gender,

                                          DATE_FORMAT(cs.dateofbirth, '%d-%b-%Y') AS dateofbirth,

                                          cs.mobile_phone,

                                          w.current_role_id,

                                          cr.current_role_in_khmer,

                                          w.unit,

                                          u.unit AS unit_name,

                                          w.date_in,

                                          w.type_of_framework,

                                          w.work_office,

                                         IF(o.office IS NULL ,'',o.office ) as office

                                  FROM

                                          civilservant AS cs

                                  INNER   JOIN `work` AS w ON cs.id = w.id

                                  LEFT   JOIN `offices` AS o ON o.id= w.work_office

                                  LEFT   JOIN `currentrole` AS cr ON cr.id= w.current_role_id

                                  LEFT   JOIN `unit` AS u ON cs.unit_code= u.id

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

                                       -w.current_role_id DESC

                                   ");

              $res = $qr->result();

               ?>

            <?php foreach ($res as $row):?>

            <tr data-id="<?php echo $row->id;?>" data-href='<?php echo site_url("csv/csv_info/edit"."/".$row->id);?>' class='clickable-row display' >

                <td style="display:none;"><?php echo $row->id; ?></td>

                <td><?php echo $row->civil_servant_id; ?></td>

                <td><?php echo $row->lastname.' '.$row->firstname ?></td>

                <td><?php echo $row->gender; ?></td>

                <td><?php echo $row->dateofbirth; ?></td>

                <td><?php echo $row->current_role_in_khmer; ?></td>

                <td><?php echo $row->mobile_phone; ?>

                <td><?php echo $row->office; ?>

                <td><?php echo $row->unit_name; ?>

            </tr>

            <?php endforeach; ?>

            </tbody>

    </table>

  </div>

  </div>

  </form>

   <script type= 'text/javascript'>

   // edit by row ===========

   $("body").delegate("#cd-grid tbody tr", "click", function () {

     var id = $(this).data('id');

     if (id - 0 > 0) {

  //  window.location="<?= site_url('csv/csv_info/edit') ?>/" + id;

    window.open("<?= site_url('csv/csv_info/edit') ?>/" + id + "", "_blank");

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



    $('#cd-grid').DataTable( {

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

    } );

// grid ==========================



    </script>

