<?php require_once 'include/function.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Charity, Non Profit and NGO Website created with Bootstrap and Sass">
    <meta name="author" content="Tariqul Islam">

    <title>Mosesmoradeun Charity Foundation</title>

    <link rel="shortcut icon" href="images/components/favicon.png   ">

    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- <link rel="stylesheet" href="css/fontawesome/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="css/font/flaticon.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"> -->
    
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"> -->

    <link rel="stylesheet" href="css/nice-select.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"> -->    

    <link rel="stylesheet" href="css/style.css">    
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body class="login-page">


    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>




    <main >
    <div class="container">
        <div class="login-wrap bg-light">
            <h2 class="fw-normal mb-5 h6"> Hello <span class="fw-bold tex-primary d-block display-5 ">Welcome!</span></h2>
            <?php handleLogin(); ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Username or Email <span class="required">*</span></label>
                    <input class="form-control" type="text" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="required">*</span></label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                    
                <div class="d-flex align-items-center mb-3">
                    <button name="login" type="submit" class="custom-btn">Login</button>
                </div>
                <p><a href="index.php">Back to Home Page</a></p>
            </form>
        </div>
    </div>

    </main>



<!-- 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.stellar/0.6.2/jquery.stellar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollUp/2.4.1/jquery.scrollUp.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/syotimer/2.1.0/jquery.syotimer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/isotope/3.0.6/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxchimp/1.3.0/jquery.ajaxchimp.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <script src="js/form.js"></script>
    <script src="js/custom.js"></script> -->
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.syotimer.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/form.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/custom.js"></script>
    
</body>


</html>