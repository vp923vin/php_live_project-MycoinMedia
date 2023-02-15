<?= $this->extend('../../modules/Users/Views/dashboard/include/header') ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 justify-content-start">
                    <h6 class="m-0 font-weight-bold text-primary my-2">Add Company Link</h6>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-end">
                    <a href="<?= base_url(); ?>/userdashboard/myPressRelease" class="btn btn-primary btn-md">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php foreach($note as $key){?>
            <form action="<?= base_url();?>/userdashboard/linkAdded/<?= $key['release_number']; ?>" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="company_link">Add Company link</label>
                            <input type="url" name="company_link" id="company_link" class="form-control" placeholder="eg. https://www.mycoinmedia.com">
                            <!-- <textarea name="company_link" class="form-control" id="company_link" cols="30" rows="10" placeholder="Add Notes here..." value="<?= $key['note'] ?>"></textarea> -->
                            
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Add Company Link">
            </form>
            <?php }?>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>