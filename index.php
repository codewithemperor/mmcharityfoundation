

    <?php require_once 'include/header.php' ?>
    <?php
    // Include the database connection
    include_once 'include/db.php';

    // Initialize variables
    $totalExpenses = 0;
    $totalEvents = 0;

    // Query to calculate total expenses (summing the eventBudget)
    $expenseQuery = "SELECT SUM(eventBudget) as totalExpenses FROM events";
    $result = $conn->query($expenseQuery);
    if ($result && $row = $result->fetch_assoc()) {
        $totalExpenses = $row['totalExpenses'];
    }

    // Query to count total events
    $eventQuery = "SELECT COUNT(*) as totalEvents FROM events";
    $result = $conn->query($eventQuery);
    if ($result && $row = $result->fetch_assoc()) {
        $totalEvents = $row['totalEvents'];
    }
    ?>

    <!-- Banner Statrt Here -->
    <section class="banner-area">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carouel">
            <div class="carousel-inner">
                <div class="carousel-item banner-area active">
                    <img src="images/banner/student.jpg" class="d-block w-100" alt="...">
                    <div class="banner-info col-9">
                        <h1 class="col col-md-10 col-lg-7 banner-title text-white mb-2">Educating <span>Future Leaders</span></h1>
                        <p class="text-white text-start">Empowering the next generation through education.</p>
                        <div class="banner-btn mt-3">
                            <a href="#" class="custom-btn py-3">Learn More</a>
                        </div>
                    </div>
                </div>
            
                <div class="carousel-item banner-area">
                    <img src="images/banner/woman_at_market.jpeg" class="d-block w-100" alt="...">
                    <div class="banner-info col-9">
                        <h1 class="col col-md-10 col-lg-7 banner-title text-white mb-2">Empowering <span>Entrepreneurs</span> </h1>
                        <p class="text-white text-start">Supporting entrepreneurs to build sustainable businesses.</p>
                        <div class="banner-btn mt-3">
                            <a href="#" class="custom-btn py-3">Get Involved</a>
                        </div>
                    </div>
                </div>
            
                <div class="carousel-item banner-area">
                    <img src="images/banner/orphange.jpeg" class="d-block w-100" alt="...">
                    <div class="banner-info col-9">
                        <h1 class="col col-md-10 col-lg-7 banner-title text-white mb-2">Supporting <span>Orphanage</span> </h1>
                        <p class="text-white text-start">Providing hope and a brighter future for children in need.</p>
                        <div class="banner-btn mt-3">
                            <a href="#" class="custom-btn py-3">Donate Now</a>
                        </div>
                    </div>
                </div>
            
                <div class="carousel-item banner-area">
                    <img src="images/banner/Nigerian_Prison_Service.jpg" class="d-block w-100" alt="...">
                    <div class="banner-info col-md-9">
                        <h1 class="col col-md-7 banner-title text-white mb-2">Reforming <span>Lives</span></h1>
                        <p class="text-white text-start">Providing basic amenities and support to inmates.</p>
                        <div class="banner-btn mt-3">
                            <a href="#" class="custom-btn py-3">See How</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section>
    
    <!-- Banner ends here -->
    
    <section class="history-area section-padding">
        <div class="container">
            <div class="row row-gap-md-3 d-flex align-items-center flex-column-reverse flex-lg-row">
                
                <div class="col-lg-6">
                    <div class="">
                        <h2 class="section-title mb-2">Our History</h2>
                        <p class="small-text">The Moses Moradeun Charity Foundation (MMF) was born out of a deep commitment to support the less privileged and drive community development in Nigeria. Originally known as Kunbis Charity Foundation from 2011 to 2022, it was renamed to Moses Moradeun Charity Foundation in honor of my late mother, Moradeun. MMF was officially registered with the Corporate Affairs Commission (CAC) in 2024. Our foundation has been dedicated to promoting gender equality, economic empowerment, and providing essential support to those in need. Our journey began with a focus on enhancing educational opportunities for children and has since expanded to include support for motherless homes, aspiring entrepreneurs, and inmates in prison yards.</p>
                        <a href="about.html" class="custom-btn">Read more</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="images/gallery/about.jpg" class="section-media" alt=>
                </div>

            </div>
        </div>
    </section>
    

    <section class="feature-area2">
        <div class="container">
            <div class="row g-lg-5 g-2">
                
                <div class="col-xl-4 col-md-6">
                    <a href="#" class="d-flex feature-item">
                        <span class="icon shadow"><img src="images/components/mis1.png" alt=""></span>
                        <div class="feat-txt ms-4">
                            <h3>Become a volunteer</h3>
                            <p class="text-start">Join our team to help transform lives and strengthen our community. Your time and effort can make a world of difference.</p>
                        </div>
                    </a>
                </div> 

                <div class="col-xl-4 col-md-6">
                    <a href="#" class="d-flex feature-item">
                        <span class="icon shadow"><img src="images/components/mis2.png" alt=""></span>
                        <div class="feat-txt ms-4">
                            <h3>Helping each Other</h3>
                            <p class="text-start">By supporting one another, we create a network of care and compassion. Together, we can overcome challenges and thrive</p>
                        </div>
                    </a>
                </div> 

                <div class="col-xl-4 col-md-6">
                    <a href="#" class="d-flex feature-item">
                        <span class="icon shadow"><img src="images/components/donate.png" alt=""></span>
                        <div class="feat-txt ms-4">
                            <h3>Start Donating</h3>
                            <p class="text-start">Your donation provides vital resources for those in need. Every contribution helps us build a better future</p>
                        </div>
                    </a>
                </div> 
            </div>
        </div>
    </section>

    <!-- Our Mission Starts here -->
    <section class="misson-area section-padding">
        <div class="container">
            <div class="row row-gap-3 align-items-center">
                <div class="col-lg-6">
                    <div class="section-media">
                        <img src="images/banner/MOSES.png" alt>
                        <div class="video-block">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                            <a href="" class="video vedio-popup" data-autoplay="true" data-vbtype="video">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="">
                        <h2 class="section-title mb-2">Our Mission</h2>
                        <p class="small-text">To provide children with access to quality education and introduce skills to improve their learning environment. We aim to support motherless homes by offering essential resources and instilling hope for a brighter future. Additionally, we empower hardworking individuals from less privileged backgrounds by funding their businesses and providing necessary training. Our mission also extends to improving the living conditions of inmates by providing basic amenities and fostering their rehabilitation..</p>
                        <a href="about.html" class="custom-btn">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Mission Ends here -->
    
    <!-- Counter Area Section Start -->
    
    <section class="counter-area">
        <div class="container">
            <div class="row row-cols-2 row-cols-md-4">
                <div class="col">
                    <div class="single-counter">
                        <img src="images/components/ct1.png" alt>
                        <span class="counter">30</span>
                        <h3>Volunteers</h3>
                    </div>
                </div>
                <div class="col">
                    <div class="single-counter">
                        <img src="images/components/ct2.png" alt>
                        <span class="counter"><?php echo number_format($totalExpenses, 0, '.', ','); ?></span>
                        <h3>Donation</h3>
                    </div>
                </div>
                <div class="col">
                    <div class="single-counter">
                        <img src="images/components/ct3.png" alt>
                        <span class="counter"><?php echo $totalEvents; ?></span>
                        <h3>Total Project</h3>
                    </div>
                </div>
                <div class="col">
                    <div class="single-counter">
                        <img src="images/components/ct4.png" alt>
                        <span class="counter">1</span>
                        <h3>Countries</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Area Section End -->

    <!-- Causes Area Section Start -->
    <section class="causes-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-intro">
                        <h2 class="section-title text-center">Our Project</h2>
                        <p class="text-center">We provide essential resources and opportunities to underserved communities for lasting change.</p>
                    </div>
                </div>
            </div>
            
                <?php include_once('include/func.php'); 
                    echo display_random_events();
                ?>


        </div>
    </section>
    <!-- Causes Area Section End -->

    <!-- Donation Area Section Start -->
    <section class="donation-area section-padding"">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="volunteer-wrap">
                        <h2 class="section-title">Make a <span class="color">Donation</span></h2>
                        <form action="#" class="volunteer-form row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="name">*Name</label>
                                    <input type="text" id="name">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="amount">*Amount (USD)</label>
                                    <input type="text" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="email">*Email</label>
                                    <input type="text" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="fund">Fund Option</label>
                                    <select name="fund" id="fund" class="nice-select mb-3">
                                        <option value="Food Campaign" selected>Food Campaign</option>
                                        <option value="Educate Children">Educate Children</option>
                                        <option value="Campaign for Old">Campaign for Old</option>
                                        <option value="Clean Water">Clean Water</option>
                                        <option value="Campaign for Women">Campaign for Women</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="comment">*Message</label>
                                    <textarea name="comment" id="comment"></textarea>
                                </div>
                                <button class="custom-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Donation Area Section End -->


   



    <?php require_once 'include/footer.php' ?>
    
