<?= $this->extend('../../modules/Admin/Views/dashboard/include/header'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6 col-md-12  py-2">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
                </div>
                <div class="col-lg-6 col-md-12 d-flex justify-content-end">
                    <a href="<?= base_url(); ?>/dashboard/products" class="btn btn-primary px-4 py-2">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            
                <form action="<?= base_url(); ?>/dashboard/products" method="post">
                <?php foreach ($products as $key) { ?>
                    <div class="row">
                        <input type="hidden" name="id" value="<?= $key['id']; ?>">
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $key['name']; ?>" required />
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="<?= $key['price']; ?>" required />
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="currency" class="form-label">Currency</label>
                                <input type="text" class="form-control" id="currency" name="currency" value="<?= $key['currency']; ?>" required />
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="services" class="form-label">Services</label>
                                <input type="text" class="form-control" id="services" name="services" value="<?= $key['services'] ?>" required />
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="validity" class="form-label">Validity</label>
                                <input type="text" class="form-control" id="validity" name="validity" value="<?= $key['validity'] ?>" required />
                            </div>
                        </div>
                    </div>
                        <input type="submit" class="btn btn-primary px-4 py-2" value="Edit Product">
                    <?php } ?>  
                </form>
            

        </div>
    </div>
</div>


<?= $this->endSection(); ?>