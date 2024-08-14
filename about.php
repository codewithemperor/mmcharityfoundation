
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


    <section class="promo-area" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="promo-wrap">
                        <h1 class="promo-title"><span>About</span> Us</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ourself-area section-padding">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="about-txt pe-lg-3">
                <h3 class="section-title mb-4">Know US <span class="color"> Better </span></h3>
                <p class="small-text">We are the Moses Moradeun Charity Foundation (MMF), a non-profit organization registered in Nigeria with a mission to support the less privileged, drive community development, promote gender equality, and implement economic empowerment schemes across Nigeria. Originally known as Kunbis Charity Foundation from 2011 to 2022, it was renamed to Moses Moradeun Charity Foundation in honor of my late mother, Moradeun. Founded in 2011 and officially registered with the CAC in 2024.</p>

                <p class="small-text">Our journey began with a mission to tackle the educational challenges faced by children in public schools, ensuring they have access to quality materials and resources. We believe education is the most effective way to break the cycle of poverty and empower future generations.</p>
                
                <p class="small-text">At MMF, we also extend our support to motherless homes, striving to instill hope and a brighter future for the children. By providing food, clothing, educational materials, and emotional support, we aim to create a nurturing environment where these children can thrive. </p>

                <p class="small-text">In addition to our educational initiatives, we help hardworking individuals from less privileged backgrounds start or fund their businesses. Through grants, microloans, and business training programs, we support aspiring entrepreneurs in realizing their dreams and contributing to their communities.</p>

                <p class="small-text">Our mission also includes providing essential amenities and support to inmates in prison yards across Nigeria. We ensure they receive basic necessities such as food, clothing, and hygiene products, enhancing their living conditions and offering them a sense of dignity and hope.</p>

                <h3 class="mb-2 mb-md-3">Our Key initiatives</h3>
                <ul class="my-2 my-md-3">
                  <li>Providing scholarships, stationaries, and textbooks to children in public schools.</li>
                  <li>Supplying food, clothing, educational materials, and emotional support.</li>
                  <li>Offering grants, microloans, and business training programs to less privileged individuals.</li>
                  <li>Providing basic necessities and support to inmates in prison yards.</li>
                </ul>
                <a href="donate.html" class="custom-btn mt-2">Support Us</a>
              </div>
            </div>

            <div class="col-lg-4 col-sm-12 h-100 overflow-hidden">
                <img src="images/banner/banner.jpg" class="object-fit-cover h-100" alt="Mosesmoradeun Charity Foundation">
            </div>

            <div class="d-none d-lg-block col-4 overflow-hidden">
                <img src="" alt="" class="w-100 object-fit-cover">
            </div>
          </div>
        </div>
    </section>
      
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

    <main class="main faq-area section-padding">
        <div class="container">
            <div class="row">
                <div class="section-header text-center">
                    <h2 class="display-5 fw-bold">Frequently Asked Questions</h2>
                    <p class="text-center p-2 pb-0 mb-0">Find answers to some of the most common questions about our mission, activities, and how you can get involved.</p>      
                </div>

                <div class="accordion event-accordion g-1 g-md-4 row row-cols-1 row-cols-md-2 px-3 px-md-0" id="accordionExample">
                    
                    <div class="col">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What kind of events do you organize?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We organize a variety of events focused on community development, education, and support for the less privileged. These events include educational workshops, vocational training sessions, fundraising events, and community outreach programs aimed at providing essential services to those in need.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    How do you assist less privileged individuals in starting businesses?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse " aria-labelledby="headingFive" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    We help hardworking individuals from less privileged backgrounds start or fund their businesses through grants, microloans, and business training programs. We support aspiring entrepreneurs in realizing their dreams and contributing to their communities, fostering economic empowerment and sustainable growth.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Which areas do you focus on the most?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Our primary focus areas include education, support for motherless homes, economic empowerment, and prison support. We prioritize providing scholarships and educational materials to children, offering essential amenities and support to motherless homes, assisting less privileged individuals in starting or expanding their businesses, and providing basic necessities to inmates in prison yards.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What is the importance of your educational initiatives?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Education is at the core of our mission. We believe that providing children with access to quality education is the most effective way to break the cycle of poverty. Our educational initiatives include providing scholarships, stationaries, textbooks, and vocational training to bridge the gap between public and private schools, ensuring that every child has the opportunity to succeed.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    How do you support motherless homes?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We extend our support to motherless homes by providing food, clothing, educational materials, and emotional support. Our goal is to create a nurturing environment where these children can thrive and feel valued. We aim to instill hope and a vision of a brighter future for them, empowering them to overcome the challenges they face.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    How do you support inmates in prison yards?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    Our mission includes providing essential amenities and support to inmates in prison yards across Nigeria. We ensure that they receive basic necessities such as food, clothing, and hygiene products. Our commitment is to enhance their living conditions and offer them a sense of dignity and hope. We believe that providing these basic needs can significantly improve their rehabilitation and reintegration into society.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    What other initiatives do you undertake?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    In addition to our main focus areas, we engage in various other initiatives aimed at improving the quality of life for the underprivileged. These include health campaigns, environmental conservation efforts, and community development projects that address specific needs and challenges within different communities.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    How can I get involved with your foundation?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    There are many ways to get involved with our foundation. You can volunteer your time, donate funds or resources, participate in our events, or partner with us to support our various initiatives. We welcome anyone who shares our vision and is committed to making a positive impact in the lives of the less privileged.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
              
            </div>
        </div>
    </main>
    


    <?php require_once 'include/footer.php' ?>
