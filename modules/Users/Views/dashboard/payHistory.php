<?= $this->extend('../../modules/Users/Views/dashboard/include/header') ?>


<?= $this->section('content') ?>

<!-- DataTales Example -->
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payment History</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display text-dark">
                    <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Date Of Purchase</th>
                            <th>Transaction ID</th>
                            <th>Package Name</th>
                            <th>Paid Amount</th>
                            <th>Coupon Discount</th>
                            <th>Payment Method</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sno=1; ?>
                         <?php  foreach($info as $row){?>

                           
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['order_date'];?></td>
                            <td><?php echo $row['txn_id'];?></td>
                            <td><?php echo $row['product_name'];?></td>
                            <td><?php echo $row['paid_amount'];?></td>
                            <td><?php echo "No Discount";?></td>
                            <td><?php echo $row['payment_method'];?></td>
                            <td><?php echo 'Null';?></td>
                        </tr>
                        <?php $sno++; }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>