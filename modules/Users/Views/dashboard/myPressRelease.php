<?= $this->extend('../../modules/Users/Views/dashboard/include/header') ?>

<?= $this->section('content'); ?>

<!-- DataTales Example -->
<div class="container">
<?php if(session()->getFlashdata('note-msg')){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata('note-msg'); ?></strong>.
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">My Press Release</h6>
        </div>
        <div class="card-body">
        
            <div class="table-responsive">
                <table id="myTable" class="display text-dark">
                    <thead>
                        <tr>
                            <!-- <th>Sl.No.</th> -->
                            <th>Release No.</th>
                            <th>Order Id</th>
                            <th>Package Name</th>
                            <th>PR Updated Date</th>
                            <th>Company Name</th>
                            <th>Company Link</th>
                            <th>Updated Links</th>
                            <th>Status</th>
                            <th>Actions</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php  foreach ($press as $key) { ?>
                            

                            <tr>
                                
                                <td><?= $key['release_number']; ?></td>
                                <td><?= $key['order_id']; ?></td>
                                <td><?= $key['package_name']; ?></td>
                                <td><?= $key['pr_updated_date']; ?></td>
                                <td><?= $key['company_name']; ?></td>
                                <td><?= $key['company_link']; ?></td>
                                <td><?= $key['updated_links']; ?></td>
                                <td><?= $key['status']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>/userdashboard/view/<?= $key['release_number']; ?>" class="btn btn-primary btn-sm" >View</a>
                                    <a href="<?= base_url(); ?>/userdashboard/addCompanyLink/<?= $key['release_number']; ?>" class="btn btn-primary btn-sm">company link</a>
                                    <a href="<?= base_url(); ?>/userdashboard/addNote/<?= $key['release_number']; ?>" class="btn btn-primary btn-sm">Add Note</a>
                                </td>
                                <td><?= $key['note']; ?> </td>
                            </tr>
                        <?php  } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






<?= $this->endSection(); ?>