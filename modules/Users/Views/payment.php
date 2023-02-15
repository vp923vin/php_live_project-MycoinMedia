<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | Success</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/user/bootstrap/css/bootstrap.min.css">
    <?php ?>
</head>
<body>
    <div class="container ">
        <?php if(session()->getFlashdata('wallet-not-sufficient')) {?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata('wallet-not-sufficient'); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <div class="bg-success mt-5 ">
        <p class="text-white">You have successfully completed the payment</p>
        </div>
        <a class="btn btn-primary px-4 py-2" href="<?= base_url(); ?>/pricing">Back</a>
    </div>
    
    

    <script src="<?php echo base_url(); ?>/public/assets/user/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>