
<form class="form-horizontal f_save" role="form" method="post" id="f_save">
    <div class="panel panel-default ">
        <div class="panel-heading">
            <h3 class="panel-title">
               <?php echo 'បញ្ចូលមន្ត្រីចួលនិរត្តន៍'; ?>
           
        </div>
        <div class="panel-body"​>
            <div class="form-group">
                <div class="col-lg-4 col-md-4"> 
                    <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">
                        <?= t('អត្តលេខមន្ត្រី') ?>
                    </label>
                    <div class="col-lg-8 col-md-8">
                        <input class="form-control" name="officer_id" type="text"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                        <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">
                        <?= t('ឈ្មោះ') ?>
                    </label>
                    <div class="col-lg-8 col-md-8">
                        <input class="form-control" name="officer_name" type="text"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                        <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">
                        <?= t('ថ្ងៃ ខែ ឆ្នាំកំណើត') ?>
                    </label>
                    <div class="col-lg-8 col-md-8">
                        <input class="form-control" name="officer_dateofbirth" type="text"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>