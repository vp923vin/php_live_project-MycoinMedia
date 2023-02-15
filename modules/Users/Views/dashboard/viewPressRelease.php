<?= $this->extend('../../modules/Users/Views/dashboard/include/header') ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 justify-content-start">
                    <h6 class="m-0 font-weight-bold text-primary my-2">View Press Release</h6>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-end">
                    <a href="<?= base_url(); ?>/userdashboard/myPressRelease" class="btn btn-primary btn-md">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body">
        <div class="row">
        <?php foreach($singlepress as $key){ ?>
             
            <div class="col-md-12 col-lg-6">
                <span><strong> Release Number : </strong> <?= $key['release_number'];?></Span>
            </div>

            <div class="col-md-12 col-lg-6">
                <span><strong> Order Id : </strong>  <?= $key['order_id']; ?></Span>
            </div>
            <div class="col-md-12 col-lg-6">
                <span><strong> Package Id : </strong>  <?= $key['package_id']; ?></Span>
            </div>
            <div class="col-md-12 col-lg-6">
                <span><strong> Package Name : </strong>  <?= $key['package_name']; ?></Span>
            </div>

            <div class="col-md-12 col-lg-6">
                <span><strong> Company Name : </strong>  <?= $key['company_name']; ?></Span>
            </div>

            <div class="col-md-12 col-lg-6">
                <span><strong> Comapny Link : </strong>  <?= $key['company_link'];?></Span>
            </div>

            <div class="col-md-12 col-lg-6">
                <span><strong> Name : </strong>  <?= $key['user_name']; ?></Span>
            </div>  
            <div class="col-md-12 col-lg-6">
                <span><strong> Email : </strong>  <?= $key['user_email']; ?></Span>
            </div>
            <div class="col-md-12 col-lg-6">
                <span><strong> PR Updated Date : </strong>  <?= $key['pr_updated_date']; ?></Span>
            </div>
            <div class="col-md-12 col-lg-6">
                <span><strong> Note : </strong>  <?= $key['created_at']; ?></Span>
            </div>
            <div class="col-md-12 col-lg-6">
                <span><strong> Purchased Date : </strong>  <?= $key['created_at']; ?></Span>
            </div>
            <div class="col-md-12 col-lg-6">
                <span><strong> Updated Links : </strong>  <?= $key['updated_links']; ?></Span>
            </div>
            
           
        <?php } ?>
    </div>

        </div>
    </div>
    
</div>





<?= $this->endSection(); ?>