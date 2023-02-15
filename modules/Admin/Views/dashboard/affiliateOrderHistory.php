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
                            <th>Order Id</th>
                            <th>User Id</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Buyer Name</th>
                            <th>Buyer Email</th>
                            <th>Amount</th>
                            <th>Currency</th>   
                            <th>Transaction ID</th>
                            <th>Order Date</th>
                            <th>Payment Status</th>
                            <th>Payment Method</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sno = 1; ?>
                        <?php foreach($order as $key){ ?>
                            <tr>
                                <td><?= $sno; ?></td>
                                <td><?= $key['id'];?></td>
                                <td><?= $key['user_id'];?></td>
                                <td><?= $key['product_id'];?></td>
                                <td><?= $key['product_name'];?></td>
                                <td><?= $key['buyer_name'];?></td>
                                <td><?= $key['buyer_email'];?></td>
                                <td><?= $key['paid_amount'];?></td>
                                <td><?= $key['paid_amount_currency'];?></td>
                                <td><?= $key['txn_id'];?></td>
                                <td><?= $key['order_date'];?></td>
                                <td><?= $key['payment_status'];?></td>
                                <td><?= $key['payment_method'];?></td>    
                            </tr>                         
                        <?php $sno++; } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>