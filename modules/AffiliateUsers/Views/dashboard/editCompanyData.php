<?= $this->extend('../../modules/AffiliateUsers/Views/dashboard/include/header') ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 justify-content-start">
                    <h6 class="m-0 font-weight-bold text-primary my-2">Edit</h6>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-end">
                    <a href="<?= base_url(); ?>/affiliatedashboard/companyProfile" class="btn btn-primary btn-md">Back</a>
                </div>
            </div>
           
        </div>
        <div class="card-body">
            <?php foreach($users as $key ){?> 
            <form action="<?= base_url(); ?>/updateCompanyData/<?= $key['user_id']?>" method="post">
                <div class="row">
                    
                    <!-- Company Name Input -->
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Contact Person</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $key['user_name']?>" placeholder="Enter Company Name" required/>
                        </div>
                    </div>
                    <!-- Company Name Input -->
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="user_email" name="user_email" value="<?php echo $key['user_email']?>" placeholder="Enter Company Name" required/>
                        </div>
                    </div>
                    
                    <!-- Company Name Input -->
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="user_mobile" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="user_mobile" name="user_mobile" value="<?php echo $key['user_mobile']?>" placeholder="Enter Company Name" required/>
                        </div>
                    </div>
                    <!-- Company Name Input -->
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Comapany Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $key['company_name']?>" placeholder="Enter Company Name" required/>
                        </div>
                    </div>
                    <!-- Company Address Input -->
                    <div class="col-lg-6 col-md-12">
                        <label for="company_address">Company Address</label>
                        <div class="form-floating">
                            <textarea class="form-control" id="company_address" name="company_address"  style="height: 100px" placeholder="Enter Company Address" required><?= $key['company_address']; ?></textarea>     
                        </div>
                    </div>
                    <!-- Select option input -->
                    <div class="col-lg-6 col-md-12"> 
                        <div class="form-outline mb-4 mt-4">
                            <label for="company_country">Comapany Country</label>
                            <select name="company_country" id="company_country" class="form-select" required>
                                <option disabled selected>Please Select Country</option>
                                <option value="india">India</option>
                                <option value="australia">Austraila</option>
                                <option value="usa">USA</option>
                                <option value="china">China</option>
                                <option value="canada">Canada</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                            </select>
                        </div>
                    </div>
                    <!-- Company Website Input  -->
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3 mt-4">
                            <label for="company_website" class="form-label">Websites</label>
                            <input type="url" class="form-control" id="company_website" name="company_website" value="<?php echo $key['company_website']?>" placeholder="Enter Website" required/>
                        </div>
                    </div>
                    <!-- Company Other Details -->
                    <div class="col-lg-6 col-md-12">
                        <label for="company_other_details">Other Details</label>
                        <div class="form-floating mb-4">
                            <textarea class="form-control" id="company_other_details" name="company_other_details" style="height: 100px" placeholder="If you want To add any other details...."><?= $key['company_other_details']; ?></textarea>   
                        </div>
                    </div>

                </div>

                <!-- submit Form -->
                <input type="submit" value="Edit Company Details" class="btn btn-primary">

            </form>
            <?php } ?>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>