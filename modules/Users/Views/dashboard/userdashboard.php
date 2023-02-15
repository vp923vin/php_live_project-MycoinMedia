<?= $this->extend('../../modules/Users/Views/dashboard/include/header') ?>

<?= $this->section('content'); ?>
<?php if(session()->getFlashdata('email-send-confirm')) {?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= session()->getFlashdata('email-send-confirm'); ?></strong>
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<!-- DataTales Example -->
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>PR Limit</th>
                            <th>Used PR</th>
                            <th>Remaining Credit</th>
                            <th>Package Expiry</th>
                            <th>Renew Package</th>
                            <!-- <th>Column 7</th>
                            <th>Column 8</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>