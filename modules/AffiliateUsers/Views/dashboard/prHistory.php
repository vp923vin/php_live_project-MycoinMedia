<?= $this->extend('../../modules/AffiliateUsers/Views/dashboard/include/header') ?>


<?= $this->section('content') ?>

<!-- DataTales Example -->
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PR History</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display text-dark">
                    <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Release No.</th>
                            <th>Package Name</th>
                            <th>PR Updated Date</th>
                            <th>Company Link</th>
                            <th>Updated Links</th>
                            <th>Status</th>
                            <th>Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $sno=1; foreach($press as $val) {?>
                            
                                <tr>
                                    <td><?= $sno; ?></td>
                                    <td><?= $val['release_number']; ?></td>
                                    <td><?= $val['package_name']; ?></td>
                                    <td><?= $val['pr_updated_date'];?></td>
                                    <td><?= $val['company_link']; ?></td>
                                    <td><?= $val['updated_links']; ?></td>
                                    <td><?= $val['status'];?></td>
                                    <td>NULL</td>
                                </tr>
                          
                        <?php $sno++; } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>