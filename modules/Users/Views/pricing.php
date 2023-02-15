<?= $this->extend('../../modules/Users/Views/dashboard/include/headerHome'); ?>

<?= $this->section('content'); ?>

    <!-- price table -->
    <div class="container mt-5">
        <h2 class="text-center">Our Plans</h2>
        <div class="row py-3">
        <?php foreach($products as $key){ ?>
        <div class="col-lg-4 col-sm-12 px-4 mt-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center"><?= $key['name']; ?></h3>
                    </div>
                    <div class="card-body text-center">
                        <?= $key['services']; ?>
                    </div>
                    <div class="text-center mb-2">
                        <p><sup>$</sup><strong><?= $key['price']; ?></strong></p>
                        <a href="<?= base_url(); ?>/billing/<?= $key['id']; ?>" class="btn btn-primary fw-bold px-3">Buy Now</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        


<!-- 
            <div class="col-lg-4 col-sm-12 px-4 mt-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Basic</h3>
                    </div>
                    <div class="card-body text-center">
                        <p>100+ Reputed News Channels/Publications</p>
                        <p>Google News Syndication</p>
                        <p>150+ Local News <br> Channels/Publications</p>
                    </div>
                    <div class="text-center mb-2">
                        <p><sup>$</sup><strong>9</strong></p>
                        <a href="<?php echo base_url(); ?>/billing/?plan=Basic" class="btn btn-primary fw-bold px-3">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12 px-4 mt-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Standard</h3>
                    </div>
                    <div class="card-body text-center">
                        <p>100+ Reputed News Channels/Publications</p>
                        <p>Google News Syndication</p>
                        <p>150+ Local News <br> Channels/Publications</p>
                    </div>
                    <div class=" text-center mb-2">
                    <p><sup>$</sup><strong>29</strong></p>
                        <a href="<?php echo base_url(); ?>/billing/?plan=Standard" class="btn btn-primary fw-bold px-3">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12 px-4 mt-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Premium</h3>
                    </div>
                    <div class="card-body text-center">
                        <p>100+ Reputed News Channels/Publications</p>
                        <p>Google News Syndication</p>
                        <p>150+ Local News <br> Channels/Publications</p>
                    </div>
                    <div class="text-center mb-2">
                        <p><sup>$</sup><strong>39</strong></p>
                        <a href="<?php echo base_url(); ?>/billing/?plan=Premium" class="btn btn-primary fw-bold px-3 ">Buy Now</a>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
    <!-- price table Ends -->

    <?= $this->endSection(); ?>

  
