<script type='text/javascript'>

    $(document).ready(function () {
        swal({
            title: ' មិនមានក្នុងប្រព័ន្វ',
            text: 'ទន្និន័យត្រូបានលុប សូមឆែកព័ត៌មានមន្ត្រីផ្សេងទៀត',
            allowOutsideClick: false,
            type: 'info'
        });
        setTimeout(function () {
            window.location.href = "<?php echo site_url('csv/csv_update/csv_transfer_job/') ?>/";
        }, 5000);
    });
</script>