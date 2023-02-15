<?= $this->extend('../../modules/AffiliateUsers/Views/dashboard/include/header') ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 justify-content-start">
                    <h6 class="m-0 font-weight-bold text-primary my-2">View Company Data</h6>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-end">
                    <a href="<?= base_url(); ?>/affiliatedashboard/companyProfile" class="btn btn-primary btn-md">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php foreach($users as $key) { ?>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <span><strong>Company Name: </strong><?= $key['company_name'];?></span>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <span><strong>Contact Person: </strong><?= $key['user_name'];?></span>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <span><strong>Phone: </strong><?= $key['user_mobile'];?></span>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <span><strong>Email: </strong><?= $key['user_email'];?></span>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <span><strong>Created By: </strong><?= $key['user_role'];?></span>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <span><strong>Company Address: </strong><?= $key['company_address'];?></span>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <span><strong>Company Country: </strong><?= $key['company_country'];?></span>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <span><strong>Company website: </strong><?= $key['company_website'];?></span>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <span><strong>Company other Details: </strong><?= $key['company_other_details'];?></span>
                    </div>
                </div>
            <?php  }?>
            
        </div>
    </div>
</div>

<?= $this->endSection(); ?>