<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/user/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/user/css/style.css">
    <title>MyCoinMedia | Forget Password</title>
</head>

<body>


    <div class="container mt-5">
    <?php if(session()->getFlashdata('forget-success-msg')){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata('forget-success-msg'); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <?php if(session()->getFlashdata('forget-msg')){ ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata('forget-msg'); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <div class="row">

            <div class="col-lg-3">
            </div>

            <div class="col-md-12 col-lg-6">
                <h3>Reset Password</h3>
                <span class="text-danger">fill the form to reset the password</span>
                <form action="<?= base_url('forgetPassword/resetPassword');?>" method="post" id="forgetPasswordForm" class="form" >
                    <!-- Select option input -->
                    <div class="form-outline mb-4 mt-3">
                        <select name="user_role" id="user_role" class="form-select" required>
                            <option disabled selected>select</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <option value="affiliate">Affiliate User</option>
                        </select>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="user_email">Email address</label>
                        <input type="email" id="user_email" name="user_email" class="form-control" required/>
                    </div>

                   
                    <!-- Submit button -->
                    <input type="submit" class="btn btn-primary btn-block mb-4" value="Reset Password">
                    
                </form>
                <a href="<?= base_url(); ?>/login" class="btn btn-primary">Back</a>
            </div>

            <div class="col-lg-3">
            </div>
        </div>
    </div>



    
    <script src="<?php echo base_url() ?>/public/assets/user/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/form-main.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/form.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/form-validator.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/validate.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/validation.js"></script>
    <!-- <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/validate.min.js"></script> -->
    <script type="text/javascript">
        setForm('forgetPasswordForm');
    </script>
</body>

</html>