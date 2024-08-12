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

        <link rel="stylesheet" href="css/nice-select.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"> -->  
         
        <link href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.0/css/lightgallery.css" rel="stylesheet">
        

        <link rel="stylesheet" href="css/style.css">    
        <link rel="stylesheet" href="css/responsive.css">

    </head>
    <body>
        
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>

        <!-- Header Starts here -->
        <header class="hearer">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <ul class="top-info d-none d-md-block">
                                <li>
                                    <a href="mailto:info@mmcharityfoundation.com" title="Message" class="">
                                        <i class="fa fa-paper-plane"></i>info@mmcharityfoundation.com
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:+2347051196113" title="Account">
                                        <i class="fa fa-phone"></i>+234 705 119 6113
                                    </a>
                                </li>
                                <li class="d-none d-md-inline">
                                    <a href="tel:+2347051196129" title="Account">
                                        <i class="fa fa-phone pe-2"></i>+2347051196129
                                    </a>
                                </li>
                            </ul>
                            <div class="top-info d-md-none">
                                <a href="tel:+2347051196129" title="Account">
                                    <i class="fa fa-phone pe-2"></i>+2347051196129
                                </a>
                            </div>
                        </div>
                        <!-- <div class="col-4">
                            <div class="account-info d-flex align-items-center">
                                <div class="lang-dropdown d-flex align-items-center">
                                    <span><i class="fa fa-flag"></i></span>
                                    <select name="lang" id="lang">
                                        <option value="1">English</option>
                                        <option value="2">Spanish</option>
                                        <option value="3">Dutch</option>
                                    </select>
                                </div>
                                <a class="d-none d-sm-block" href="#" title="Login">
                                    <i class="fa fa-user me-2"></i>My Account
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            

            <div class="offcanvas offcanvas-top bg-info" id="offcanvas-search" data-bs-scroll="true">
                <div class="container d-flex flex-row py-5">
                    <form class="search-form w-100">
                        <input id="search-form" type="text" class="form-control" placeholder="Type keyword and hit enter">
                    </form>
                    <button type="button" class="btn-close icon-xs bg-light rounded-5" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg bg-light px-md-5 py-2 p-lg-0 ">
                <div class="container px-lg-0">
                    <a class="navbar-brand col-6 col-md-4 d-block d-lg-none" href="index">
                        <img src="images/components/logo.png" alt="Mosesmoradeun Charity Organization Hunger Logo" class="w-100"/>
                    </a>
                    <button class="navbar-toggler offcanvas-nav-btn" type="button">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="offcanvas offcanvas-start offcanvas-nav">
                        <div class="offcanvas-header">
                            <a href="index.php" class="text-inverse"><img src="images/components/logo.png" alt="Mosesmoradeun Charity Organization Hunger Logo"></a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body pt-0 align-items-center justify-content-md-between">
                            <a class="navbar-brand d-none d-md-block col" href="index.php"><img src="images/components/logo.png" alt="Mosesmoradeun Charity Organization Hunger Logo" height="40"></a>
                            <ul class="navbar-nav mx-auto align-items-lg-center justify-content-center col">
                                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                                <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                                <li class="nav-item"><a href="event.php" class="nav-link text-nowrap">Our Projects</a></li>
                                <li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>
                                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                            </ul>

                            <div class="text-end col align-items-center d-flex justify-content-end gap-2">
                                <a class="text-reset icon" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-search"><i class="fa fa-search"></i></a>
                                <a href="donate.php" class="custom-btn">Donate Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Header Ends here -->