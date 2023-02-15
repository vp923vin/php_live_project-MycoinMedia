<?= $this->extend('../../modules/Admin/Views/dashboard/include/header'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <?php if (session()->getFlashdata('add-admin')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata('add-admin'); ?></strong>.
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
        
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Add Admin</h6>
        </div>
        <div class="card-body"> 
            <form id="registerForm" class="form" method="post" action="<?php echo base_url() ?>/dashboard/addAdmin">
            <div class="container text-dark">
                <div class="row">
                    <!-- Name input -->
                    <div class="col-lg-6 col-md-12">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="fullName">Name</label>
                            <input type="text" id="user_name" name="user_name" class="form-control" required />
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="col-lg-6 col-md-12"> 
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="user_email" name="user_email" class="form-control" required />
                        </div>
                    </div>

                    <!-- Mobile input -->
                    <div class="col-lg-6 col-md-12">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="mobile">Mobile Number</label>
                            <input type="text" id="user_mobile" name="user_mobile" class="form-control" required />
                        </div>    
                    </div>

                    <!-- Password input -->
                    <div class="col-lg-6 col-md-12">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="user_password" name="user_password" class="form-control" required />
                        </div>
                    </div>

                    <!-- Confirm Password input -->
                    <div class="col-lg-6 col-md-12">    
                        <div class="form-outline mb-4">
                            <label class="form-label" for="confirmPassword">Confirm Password</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required />
                        </div>
                    </div>

                    <!-- Address input -->
                    <div class="col-lg-6 col-md-12"> 
                        <div class="form-outline mb-4">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" id="user_address" name="user_address" class="form-control" required />
                        </div>        
                    </div>

                    <!-- Select Country option -->
                    <div class="col-lg-6 col-md-12">    
                    <div class="form-outline mb-4">
                        <label for="country">Country</label>
                        <select name="user_country" id="user_country" class="form-select" required>
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

                    <input type="hidden" name="user_role" value="admin" />

                    
                </div>
                </div>
                <!-- Submit Button -->
                <div class="col-lg-12 text-center">
                        <input type="submit" class="btn btn-primary px-4 py-2 mb-4" value="Add Admin">
                    </div>
            </form>
            
        </div>
    </div>
</div>

<?= $this->endSection(); ?>