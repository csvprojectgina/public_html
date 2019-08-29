<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">ទំរង់ការបញ្ចូលមេដាយ</h3>
    </div>
    <div class="panel-body">
        <form method="post" id="frm-dignitaries" role="form" enctype="multipart/form-data">
            <div class="col-lg-12 col-md-12 form-horizontal">
                <div class="form-group">
                    <label class="col-lg-2 col-md-2 text-right">ជ្រើសមេដាយ</label>
                    <div class="col-sm-10 col-md-10">
                        <select class="selectpicker form-group" id="selected" name="selected">
                            <?php
                            $item = $this->config->item('class_dignitaries');
                            foreach ($item as $items => $value) {
                                if ($items == $row->parent){?>
                                    <option class="form-control " selected value="<?php echo $row->parent ?>"><?php echo $value ?></option>
                            <?php }else{?>
                                    <option class="form-control" value="<?php echo $items ?>"><?php echo $value ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 col-md-2 text-right">បញ្ចូលឈ្មោះមេដាយ</label>
                    <div class="col-sm-6 col-md-6">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row->name ?>"/>
                        <input type="hidden" id="id" name="id" value="<?php echo $row->id ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-md-2 text-right">បញ្ចូលពត៌មានលំអិត</label>
                    <div class="col-sm-6 col-md-6">
                        <textarea class="form-control" rows="5" name="desc" id="desc" ><?php echo $row->description ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-md-2 text-right"></label>
                    <div class="col-lg-10 col-md-10">
                        <button class="btn btn-success" type="submit">រក្សាទុក</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
<script>
    // $('#frm-dignitaries').on('submit', function (e) {
    //     e.preventDefault();
        // var id = $('#id').val();
        // var selected = $('#selected').val();
        // var name = $('#name').val();
        // var desc = $('#desc').val();
        // alert(id);
        // alert(selected;
        // alert(name);
        // alert(desc);

        $('#frm-dignitaries').on('submit', function (e) {
            e.preventDefault();
            var id = $('#id').val();
            var selected = $('#selected').val();
            var name = $('#name').val();
            var desc = $('#desc').val();
            // alert(id);
            // alert(selected);
            // alert(name);
            // alert(desc);
            $.ajax({
                type: 'post',
                url: '<?= site_url('csv/csv_units_dignitaries/update') ?>',
                datatype: 'json',
                data: {
                    id: id,
                    name: name,
                    selected: selected,
                    desc: desc
                },
                // processData: false,
                // contentType: false,
                // cache: false,
                // async: false,
                beforeSend: function () {
                    // alert($('#frm-dignitaries').serialize());
                    $('.xmodal').show();
                },
                success: function (data) {
                    // alert(data);
                    $('.xmodal').hide();
                    if (data.status === 'success') {
                        swal({
                            text: "ការបញ្ចូលមេដាយ ត្រូវបានរក្សាទុកដោយជោគជ័យ",
                            type: 'success',
                            showCancelButton: false,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            closeOnClickOutside: false
                        });
                        setTimeout(function () {
                            window.location.href = "<?php echo site_url('csv/csv_units_dignitaries/csv_dignitaries/')   ?>";
                        }, 2500);
                    }
                }
            });
        });

</script>