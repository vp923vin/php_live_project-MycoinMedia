<?= $this->extend('../../modules/Users/Views/dashboard/include/header') ?>

<?= $this->section('content'); ?>

<!-- profile page -->
<div class="container">
    <div class="card">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
        </div>
        <div class="card-body">
        <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>
            <?php foreach($user as $key){ ?>
                
            <form  action="<?php echo base_url(); ?>/userdashboard/myProfile" method="post" enctype="multipart/form-data" >
                <div class="container text-dark">
                    <div class="row">
                        <input type="hidden" name="user_id" value="<?php echo $key['user_id'] ?>">

                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $key['user_name']?>" placeholder="Enter Your Full Name" required/>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="user_email" name="user_email" value="<?php echo $key['user_email']?>" placeholder="Enter Email" required/>

                            </div>

                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" id="user_mobile" name="user_mobile" value="<?php echo $key['user_mobile']?>" placeholder="Enter Mobile Number" required/>

                            </div>

                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="user_address" name="user_address" value="<?php echo $key['user_address']?>" placeholder="Address" required/>

                            </div>

                        </div>
                        <!-- Select option input -->
                        <div class="col-lg-6 col-md-12">
                            
                            <div class="form-outline mb-4">
                                <label for="country">Country</label>
                                <select name="user_country" id="user_country" class="form-select"  required>
                                    <option disabled selected>select</option>
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
                        <div class="col-lg-6 col-md-12">
                            <div class="form-outline mb-4">
                                <label for="imageUpload">Profile Picture</label><br>
                                <input type="file" name="user_profile_pic" id="user_profile_pic" class="form-control" required />
                            </div>
                        </div>
                        <!-- <div class="col-lg-12 mt-2 mb-2">
                            <h5> Change Password</h5>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="user_password" name="user_password"  placeholder="Enter New Password"/>

                            </div>

                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword"  placeholder="Enter New Confirmed Password"/>

                            </div>

                        </div> -->
                        <div class="col-lg-12 mt-2 mb-2">
                            <h5>Company Info (Biling Information)</h5>
                        </div>
                        <!-- <div class="col-lg-12"> -->
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Comapany Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $key['company_name']?>" placeholder="Enter Company Name" required/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <label for="companyAddress">Company Address</label>
                            <div class="form-floating">
                                <textarea class="form-control" id="company_address" name="company_address" value="<?php echo $key['company_address']?>" style="height: 100px" placeholder="Enter Company Address" required></textarea>
                                <label for="company_address">Enter Company Address</label>
                            </div>
                        </div>
                        <!-- </div> -->
                        <div class="col-lg-6 col-md-12">
                            <!-- Select option input -->
                            <div class="form-outline mb-4 mt-4">
                                <label for="companyCountry">Comapany Country</label>
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
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3 mt-4">
                                <label for="website" class="form-label">Websites</label>
                                <input type="url" class="form-control" id="company_website" name="company_website" value="<?php echo $key['company_website']?>" placeholder="Enter Website" required/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <label for="otherDetails">Other Details</label>
                            <div class="form-floating mb-4">
                                <textarea class="form-control" id="company_other_details" name="company_other_details" value="<?php echo $key['company_other_details']?>" style="height: 100px" placeholder="If you want To add any other details...."></textarea>
                                <label for="otherDetails">If you want To add any other details....</label>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <input type="submit" class="btn btn-primary btn-md" value="Save Changes">
                    <input type="reset" class="btn btn-primary btn-md" value="Refresh">
                </div>
            </form>
            <?Php } ?>

        </div>
        <!-- <div class="card-footer">

        </div> -->
    </div>
</div>



<?= $this->endSection(); ?>