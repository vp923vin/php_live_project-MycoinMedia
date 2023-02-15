<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>MyCoinMedia | Pricing</title>
</head>

<body>

    <!-- header -->
    <header>
        <div class="container-fluid bg-dark fw-light">
            <ul type="none" class="d-flex justify-content-end py-2 text-white">

                <li class="px-3"><a href="#" class="text-decoration-none text-white"><i class="fa-regular fa-envelope text-primary"></i> info@MyCoinMedia.com</a></li>

                <li class="px-3"><a href="<?php echo base_url(); ?>/login" class="text-decoration-none text-primary"><strong>LOGIN</strong> </a></li>

                <li class="px-3"><a href="<?php echo base_url(); ?>/userRegister" class="text-decoration-none text-primary"><strong>REGISTER</strong></a></li>

                <li class="px-3"><a href="#" class="text-decoration-none text-white">EVENTS</a></li>

            </ul>
        </div>
    </header>
    <!-- header Ends -->

    <!-- nav -->
    <nav class="navbar navbar-expand-lg bg-white p-3 fw-bold">
        <div class="container-fluid">
            <a class="navbar-brand " href="<?php echo base_url(); ?>">MyCoinMedia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0 px-4" id="menuList">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="<?php echo base_url(); ?>/about">About Us</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">PR Templates</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link active" href="<?php echo base_url(); ?>/pricing">pricing</a>
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
    <!-- nav end -->

    <!-- Main Content -->
    <?= $this->renderSection('content'); ?>
    <!-- Main Content Ends -->


    <!-- Footer  -->
    <footer class="mt-5 bg-dark">
        <p class="text-center text-white p-5">Copyright &copy; MyCoinMedia 2022</p>
    </footer>
    <!-- Footer Ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <!-- <script>
       $(document).ready(function(){
        $('ul li a').click(function(){
            $('li a').removeClass("active");
            $(this).addClass("active");
        });
        });
    </script> -->

    
</body>

</html>