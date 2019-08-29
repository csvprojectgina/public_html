<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">ទំរង់ការកែរសម្រួល</h3>
    </div>
    <div class="panel-body">
        <form method="post" id="frm-ministry" role="form">
            <div class="col-lg-12 col-md-12 form-horizontal">
                <div class="col-lg-12 col-md-12 form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-2 col-md-2 text-right">បញ្ចូលឈ្មោះក្រសួង</label>
                        <div class="col-sm-6 col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row->name_ministry ?>"/>
                            <input type="hidden" id="id" name="id" value="<?php echo $row->id ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-md-2 text-right"></label>
                        <div class="col-lg-10 col-md-10">
                            <button class="btn btn-primary" id="btn-submit" type="submit">រក្សាទុក</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('#frm-ministry').on('submit', function (e) {
        e.preventDefault();
        var id = $('#id').val();
        var name = $('#name').val();
        $.ajax({
            type: 'post',
            url: '<?= site_url('csv/csv_list_ministry/update_ministry') ?>',
            datatype: 'json',
            // data: new FormData(this),
            data: {
               id: id,
                name: name
            },

            beforeSend: function () {
                // alert($('#frm-ministry').serialize());
               // / alert(id);
               // alert(name);
                $('.xmodal').show();
            },
            success: function (data) {
                // alert(data);
                $('.xmodal').hide();
                if (data.status === 'success') {
                    swal({
                        text: "ការកែរឈ្មោះក្រសួង ត្រូវបានរក្សាទុកដោយជោគជ័យ",
                        type: 'success',
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        closeOnClickOutside: false
                    });
                    setTimeout(function () {
                        window.location.href = "<?php echo site_url('csv/csv_list_ministry/csv_ministry/')   ?>";
                    }, 2500);
                }
            }
        });
    });

</script>

<!--if (data.status === 'success') {-->
<!--swal({-->
<!--title:"ដោយជោគជ័យ",-->
<!--text: " ត្រូវបានរក្សាទុកដោយជោគជ័យ",-->
<!--type:"success",-->
<!--showCancelButton: false,-->
<!--showConfirmButton: false,-->
<!--allowOutsideClick: false,-->
<!--closeOnClickOutside: false-->
<!--});-->
<!--setTimeout(function () {-->
<!--window.location.href = "--><?php //echo site_url('csv/csv_list_ministry/csv_ministry/') ?><!--/";-->
<!--}, 3000);-->
<!--} else {-->
<!--swal({-->
<!--title:"បរាជ័យ",-->
<!--text: "បច្ចុប្បន្នភាព ត្រូវបានរក្សាទុកបរាជ័យ",-->
<!--type: 'info',-->
<!--showCancelButton: false,-->
<!--showConfirmButton: false,-->
<!--allowOutsideClick: false,-->
<!--closeOnClickOutside: false-->
<!--});-->
<!--}-->