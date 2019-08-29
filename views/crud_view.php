<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head> 
    <body>
        <div class="container">
            <table id="table" class="table table-striped table-bordered" style="font-family: khmermef1;" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ឈ្មោះ</th>
                        <th>ភេទ</th>
                        <th>មុខតំណែង</th>
                        <th>លេខទូរស័ព្ទ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                <th>ឈ្មោះ</th>
                <th>ភេទ</th>
                <th>មុខតំណែង</th>
                <th>លេខទូរស័ព្ទ</th>
                <th></th>
                </tfoot>
            </table>
        </div>

        <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>


        <script type="text/javascript">

                var save_method; //for save method string
                var table;

                $(document).ready(function () {

                    //datatables
                    table = $('#table').DataTable({

                        "processing": true, //Feature control the processing indicator.
                        "serverSide": true, //Feature control DataTables' server-side processing mode.
                        "order": [], //Initial no order.
                        // Load data for the table's content from an Ajax source
                        "ajax": {
                           url: "<?php echo base_url() . 'index.php/crud/fetch_user'; ?>",
                            "type": "POST"
                        },

                        //Set column definition initialisation properties.
                        "columnDefs": [
                            {
                                "targets": [-1], //last column
                                "orderable": false, //set not orderable
                            },
                        ],

                    });

                    //datepicker
                  

                });


          

          
     

         
        </script>

        <!-- Bootstrap modal -->
        <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Person Form</h3>
                    </div>
                    <div class="modal-body form">
                        <form action="#" id="form" class="form-horizontal">
                            <input type="hidden" value="" name="id"/> 
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">First Name</label>
                                    <div class="col-md-9">
                                        <input name="firstName" placeholder="First Name" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Last Name</label>
                                    <div class="col-md-9">
                                        <input name="lastName" placeholder="Last Name" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Gender</label>
                                    <div class="col-md-9">
                                        <select name="gender" class="form-control">
                                            <option value="">--Select Gender--</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Address</label>
                                    <div class="col-md-9">
                                        <textarea name="address" placeholder="Address" class="form-control"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Date of Birth</label>
                                    <div class="col-md-9">
                                        <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Bootstrap modal -->
    </body>
</html>