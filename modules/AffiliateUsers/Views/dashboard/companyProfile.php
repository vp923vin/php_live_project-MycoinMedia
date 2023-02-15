<?= $this->extend('../../modules/AffiliateUsers/Views/dashboard/include/header') ?>

<?= $this->section('content'); ?>

<!-- DataTales Example -->
<div class="container">
    
    <?php if(session()->getFlashdata('company-msg')){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata('company-msg'); ?></strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>   
    <?php } ?>

    <?php if(session()->getFlashdata('add-success')){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata('add-success'); ?></strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>   
    <?php } ?>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-6 col-md-12 mt-3">
                    <h6 class="m-0 font-weight-bold text-primary">Company Profile</h6>
                </div>
                <div class="col-lg-6 col-md-12 d-flex justify-content-end">
                    <a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#companyModal">
                        <i class="fas fa-plus"></i> Add Company Profile
                    </a>
                </div>
            </div> 
        </div>


        <!-- company Modal-->
        <div class="modal fade" id="companyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Company Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url(); ?>/affiliatedashboard/companyProfile" method="post">
                        <div class="modal-body">

                            <!-- company name input -->
                            <div class=" col-md-12">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Comapany Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" required />
                                </div>
                            </div>

                            <!-- Contact person input -->
                            <div class=" col-md-12">
                                <div class="mb-3">
                                    <label for="user_name" class="form-label">Contact Person</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter Contact Person" required />
                                </div>
                            </div>

                            <!-- Phone Number input -->
                            <div class=" col-md-12">
                                <div class="mb-3">
                                    <label for="user_mobile" class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" id="user_mobile" name="user_mobile" placeholder="Enter Phone Number" required />
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class=" col-md-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter Company Name" required />
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" value="Add Company Details">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End company Modal -->


        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display text-dark">
                    <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Company Name</th>
                            <th>Contact Person</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Created By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sno = 1; ?>
                        <?php foreach ($users as $key) { ?>
                            <tr>
                                <td><?php echo $sno; ?></td>
                                <td><?php echo $key['company_name']; ?></td>
                                <td><?php echo $key['user_name']; ?></td>
                                <td><?php echo $key['user_mobile']; ?></td>
                                <td><?php echo $key['user_email']; ?></td>
                                <td><?php echo $key['user_role']; ?></td>
                                <td>
                                    <a href="<?= base_url();?>/editCompanyData/<?= $key['user_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="<?= base_url();?>/viewCompanyData/<?= $key['user_id']; ?>" class="btn btn-primary btn-sm">View</a>
                                </td>

                            </tr>


                        <?php $sno++;
                        } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>