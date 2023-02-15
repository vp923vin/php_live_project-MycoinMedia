<?= $this->extend('../../modules/Users/Views/dashboard/include/header') ?>

<?= $this->section('content'); ?>

<!-- DataTales Example -->
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">My Gallery</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display text-dark">
                    <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Image URL</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>