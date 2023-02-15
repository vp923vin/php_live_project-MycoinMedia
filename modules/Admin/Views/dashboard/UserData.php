<?= $this->extend('../../modules/Admin/Views/dashboard/include/header'); ?>

<?= $this->section('content'); ?>

<!-- DataTales Example -->
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order History</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display text-dark">
                    <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Country</th>
                            <th>Company Name</th>
                            <th>Company Address</th>   
                            <th>Company Website</th>
                            <th>Company details</th>
                            <th>Created At</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sno = 1; ?>
                        <?php foreach($users as $key){ ?>
                            <tr>
                                <td><?= $sno; ?></td>
                                <td><?= $key['user_id'];?></td>
                                <td><?= $key['user_name'];?></td>
                                <td><?= $key['user_email'];?></td>
                                <td><?= $key['user_mobile'];?></td>
                                <td><?= $key['user_address'];?></td>
                                <td><?= $key['user_country'];?></td>
                                <td><?= $key['company_name'];?></td>
                                <td><?= $key['company_address'];?></td>
                                <td><?= $key['company_website'];?></td>
                                <td><?= $key['company_other_details'];?></td>
                                <td><?= $key['created_at'];?></td>
                                
                               
                            </tr> 
                            
                        
                        <?php $sno++; } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>