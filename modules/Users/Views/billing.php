<?= $this->extend('../../modules/Users/Views/dashboard/include/headerHome'); ?>

<?= $this->section('content'); ?>

    <!-- pricing body -->
    <div class="container">
        
        <div class="card mt-5">
            <div class="card-body ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 py-4">
                            <h4>Choose package</h4>
                            <?php  foreach($price as $val){ ?>
                            <div class="col-md-7 mt-4">
                                <div class="card ml-5">
                                    <p class="px-3 py-2"><?php echo $val['services']; ?></p>
                                    <p class="px-3"><?php echo $val['validity']; ?></p>
                                </div>
                            </div>
                            
                            <h5 class="mt-3">Package Information</h5>
                            <p>Package Validity: <?php echo $val['validity']; ?></p>
                            <p>No of credits is :- 1</p>
                            <p><?php echo $val['services']; ?></p>
                            <p class="text-primary"><?php echo $val['price'];?> </p> 
                            <p>Discount</p>
                            
                            <hr>

                            <input type="text" name="coupon" id="coupon" class="form-control" placeholder="Enter Your Coupon Here">
                        </div>
                        <div class="col-md-8 py-4">
                            <h3>shipping Details</h3>
                            <h5 class="mt-5">User Information</h5>
                            <?php 
                           
                            foreach ($data as $key) { 
                            
                                ?>
                                    
                            
                            <form action="<?php echo base_url();?>/stripepayment/<?php echo $val['id']; ?>" method="Post">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $key['user_name'] ?>" />
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="country" name="country" value="<?= $key['user_country'] ?>" />
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="<?= $key['user_address'] ?>" />
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Mobile</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $key['user_mobile'] ?>" />
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $key['user_email'] ?>" />
                                        </div>

                                    </div>
                                    <!-- <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                        </div>

                                    </div> -->

                                </div>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="<?php echo base_url(); ?>/pricing"><button type="button" class="btn btn-danger text-white px-4 py-2 mb-3 mb-3 mt-3">Go Back</button></a>
                   <button type="Submit" class="btn btn-success px-4 py-2 mb-3 mt-3" >Proceed to Pay</button>
                </div>
                </form>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
        



    </div>

    <!-- pricing body Ends -->

<?= $this->endSection(); ?>