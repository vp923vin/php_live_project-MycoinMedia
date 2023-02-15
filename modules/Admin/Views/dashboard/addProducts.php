<?= $this->extend('../../modules/Admin/Views/dashboard/include/header'); ?>

<?= $this->section('content');?>

<div class="container">

    <?php if (session()->getFlashdata('add-product')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata('add-product'); ?></strong>.
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

     
    <div class="card">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Add Products</h6>
            
        </div>
        <div class="card-body">
            <form action="<?= base_url(); ?>/dashboard/added" method="post">
                <div class="row">

                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name"  required/>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="price" class="form-label">Product Price</label>
                            <input type="text" class="form-control" id="price" name="price"  required/>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="currency" class="form-label">Currency</label>
                            <input type="text" class="form-control" id="currency" name="currency"  required/>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="services" class="form-label">Services</label>
                            <input type="text" class="form-control" id="services" name="services"  required/>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="validity" class="form-label">Validity</label>
                            <input type="text" class="form-control" id="validity" name="validity"  required/>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <input type="submit" class="btn btn-primary" value="Add Product">
                    </div>
                    

                </div>
                
            </form>
        </div>
        
    </div>

    

</div>





<?= $this->endSection(); ?>