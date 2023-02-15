<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/user/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/user/css/style.css">
    <title>MyCoinMedia | Admin Registration</title>
</head>

<body>

<div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
            </div>

            <div class="col-md-12 col-lg-6">
                <h3>Register</h3>
                <form id="registerForm" class="form" method="post" action="<?php echo base_url('login') ?>">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="fullName">Name</label>
                        <input type="text" id="user_name" name="user_name" class="form-control" required/>    
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email address</label>
                        <input type="email" id="user_email" name="user_email" class="form-control" required/>   
                    </div>

                    <!-- Mobile input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="mobile">Mobile Number</label>
                        <input type="text" id="user_mobile" name="user_mobile" class="form-control" required/>
                    </div>
        
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control" required/>
                    </div>
                    
                    <!-- Confirm Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required/> 
                    </div>

                     <!-- Address input -->
                     <div class="form-outline mb-4">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" id="user_address" name="user_address" class="form-control" required/> 
                    </div>

                     <!-- Select Country option -->
                     <div class="form-outline mb-4">
                        <label for="country">Country</label>
                        <select name="user_country" id="user_country" class="form-select" required>
                            <option disabled selected>select</option>
                            <option value="india">India</option>
                            <option value="australia">Austraila</option>
                            <option value="usa">USA</option>
                            <option value="china">China</option>
                            <option value="canada">Canada</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option> 
                        </select>
                    </div>

                    <input type="hidden" name="user_role" value="admin" />
                    <!-- input -->
                    <!-- <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example2">Confirm Password</label>
                        <input type="text" id="form2Example2" class="form-control" /> 
                    </div> -->
        
                    <!-- Submit button -->
                    <input type="submit" class="btn btn-primary btn-block mb-4" value="Register">
                </form>
            </div>

            <div class="col-lg-3">
            </div>
        </div>  
    </div>


    

    <script src="<?php echo base_url() ?>/public/assets/user/bootstrap/css/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/form-main.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/form.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/form-validator.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/validate.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/validation.js"></script>
    <!-- <script src="<?php echo base_url() ?>/public/assets/user/js/formjs/validate.min.js"></script> -->
    <script type="text/javascript">
        setForm('registerForm');
    </script>
</body>

</html>