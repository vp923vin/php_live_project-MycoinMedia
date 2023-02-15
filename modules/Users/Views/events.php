<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>MyCoinMedia | Billing Information</title>
</head>

<body>

    <!-- header -->
    <header>
        <div class="container-fluid bg-dark fw-light">
            <ul type="none" class="d-flex justify-content-end py-2 text-white">
                <a href="#" class="text-decoration-none text-white"><li class="px-3">info@MyCoinMedia.com</li></a>
                <a href="<?php echo base_url(); ?>/login" class="text-decoration-none text-white"><li class="px-3">LOGIN</li></a>
                <a href="<?php echo base_url();?>/userRegister" class="text-decoration-none text-white"><li class="px-3">REGISTER</li></a>
                <a href="#" class="text-decoration-none text-white"><li class="px-3" >EVENTS</li></a>
            </ul>
        </div>
    </header>
    <!-- header Ends -->

    <!-- nav -->
    <nav class="navbar navbar-expand-lg bg-white p-3 fw-bold">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url();?>">MyCoinMedia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 px-4">
                    <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url();?>/about">About Us</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">PR Templates</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="<?php echo base_url();?>/events">Events</a>
                    </li>

                    <li class="nav-item px-2">
                        <a class="nav-link" href="<?php echo base_url();?>/pricing">pricing</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Yahoo News</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Submit PR</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Press Room</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <ul class="d-inline-flex py-2 m-2" type="none">
                    <a target="_blank" href="https://www.twitter.com">
                        <li class="px-3"> <i class="fa-brands fa-twitter"></i></li>
                    </a>
                    <a target="_blank" href="https://www.facebook.com">
                        <li class="px-3"> <i class="fa-brands fa-facebook-f"></i> </li>
                    </a>
                    <a target="_blank" href="https://www.linkedin.com">
                        <li class="px-3"> <i class="fa-brands fa-linkedin-in"></i> </li>
                    </a>
                    <a target="_blank" href="https://www.instagram.com">
                        <li class="px-3"> <i class="fa-brands fa-instagram"></i> </li>
                    </a>
                </ul>
                
            </div>
        </div>
    </nav>
    <!-- nav Ends -->


    <?php print_r($data); exit; ?>

    <!-- pricing body -->
    <div class="container">
        <div class="card mt-5">
            <div class="card-body ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 py-4">
                            <h4>Choose package</h4>
                            <div class="col-md-7 mt-4">
                                <div class="card ml-5">
                                    <p class="px-3 py-2"> Google News + International & Local
                                        Publications Total 350+ Links </p>
                                    <p class="px-3">90 Days</p>
                                </div>
                            </div>

                            <h5 class="mt-3">Package Information</h5>
                            <p>Package Validity is :- 90 Days</p>
                            <p>No of credits is :- 1</p>
                            <p>Google News + International & Local Publications Total 350+ Links</p>
                            <p>Discount</p>

                            <hr>

                            








                            <input type="text" name="coupon" id="coupon" class="form-control" placeholder="Enter Your Coupon Here">
                        </div>
                        <div class="col-md-8 py-4">
                            <h3>shipping Details</h3>
                            <h5 class="mt-5">User Information</h5> 
                            <form action="" method="Post">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            
                                            <input type="text" class="form-control" id="name" name="name" value="" />
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="country" name="country" value="" />
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="" />
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Mobile</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" value="" />
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="" />
                                        </div>

                                    </div>
                                    <!-- <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                        </div>

                                    </div> -->

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input type="button" class="btn btn-danger px-4 py-2 mb-3 mb-3 mt-3" value="Go Back">
                    <input type="Submit" value="Proceed to Pay" class="btn btn-success px-4 py-2 mb-3 mt-3">
                </div>
            </div>
        </div>



    </div>

    <!-- pricing body Ends -->






    <!-- Footer  -->
    <footer class="mt-5 bg-dark">
        <p class="text-center text-white p-5">Copyright &copy; MyCoinMedia 2022</p>
    </footer>
    <!-- Footer Ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>