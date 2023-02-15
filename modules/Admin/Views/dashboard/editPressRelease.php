<?= $this->extend('../../modules/Admin/Views/dashboard/include/header'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6 col-md-12  py-2">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Press Release</h6>
                </div>
                <div class="col-lg-6 col-md-12 d-flex justify-content-end">
                    <a href="<?= base_url(); ?>/dashboard/pressRelease" class="btn btn-primary px-4 py-2">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php foreach ($value as $key) { ?>
                
                <form action="<?= base_url(); ?>/dashboard/pressRelease/<?= $key['release_number']; ?>" method="post">
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" value="<?= $key['status']; ?>" placeholder="pending, progress or completed"  required />
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">                       
                            <div class="mb-3">
                                <label for="links" class="form-label">Links</label>
                                <textarea name="links" class="form-control" id="links" cols="30" rows="10"><?= $key['updated_links']; ?></textarea>
                               
                            </div>
                        </div>

                    </div>
                    <input type="submit" value="Edit" class="btn btn-primary px-4 py-2">
                </form>
            <?php } ?>


        </div>
    </div>
</div>

<?= $this->endSection(); ?>