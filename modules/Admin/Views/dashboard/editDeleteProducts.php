<?= $this->extend('../../modules/Admin/Views/dashboard/include/header'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <?php if (session()->getFlashdata('edit-product')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata('edit-product'); ?></strong>.
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('del-product')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata('del-product'); ?></strong>.
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="mt-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Edit / Remove Products</h6>
            </div>
            <div class="card-body">
                <table id="myTable" class="display text-dark">
                    <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Currency</th>
                            <th>Services</th>
                            <th>Validity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sno = 1;
                        foreach ($products as $key) { ?>
                            <tr>
                                <td><?= $sno; ?></td>
                                <td><?= $key['id']; ?></td>
                                <td><?= $key['name']; ?></td>
                                <td><?= $key['price']; ?></td>
                                <td><?= $key['currency']; ?></td>
                                <td><?= $key['services']; ?></td>
                                <td><?= $key['validity']; ?></td>
                                <td>
                                    <a class=" btn btn-primary btn-sm" href="<?= base_url('/dashboard/editProducts/'.$key['id'].''); ?>">Edit</a>
                                    <a class=" btn btn-danger btn-sm" href="<?= base_url('/dashboard/products/delete-product/'.$key['id'].''); ?>">Delete</a>
                                </td>
                            </tr>

                        <?php $sno++; ?>
                        <?php  } ?>

                    </tbody>
                </table>

                
            </div>
        </div>
    </div>

</div>



<? $this->endSection(); ?>