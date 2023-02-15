<?= $this->extend('../../modules/Admin/Views/dashboard/include/header'); ?>

<?= $this->section('content'); ?>

<div class="container">
        <?php if (session()->getFlashdata('update-press')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata('update-press'); ?></strong>.
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>  
        <?php endif; ?>
        
        <?php if(session()->getFlashdata('del-press')){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata('del-press'); ?></strong>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Press Release</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display text-dark">
                    <thead>
                        <tr>
                            <th>Release No.</th>
                            <th>Order Id</th>
                            <th>Package Name</th>
                            <th>Company Name</th>
                            <th>User Name</th>
                            <th>Company Link</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>PR Updated Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($press as $key) { ?>
                            
                        <tr>
                            <td><?= $key['release_number']; ?></td>
                            <td><?= $key['order_id']; ?></td>
                            <td><?= $key['package_name']; ?></td>
                            <td><?= $key['company_name']; ?></td>
                            <td><?= $key['user_name']; ?></td>
                            <td><?= $key['company_link']; ?></td>
                            <td><?= $key['updated_links']; ?></td>
                            <td><?= $key['status']; ?></td>
                            <td><?= $key['pr_updated_date']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>/dashboard/editPressRelease/<?= $key['release_number']; ?>" class="btn btn-primary btn-sm">Update</a>
                                <a href="<?= base_url(); ?>/dashboard/deletePressRelease/<?= $key['release_number']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>