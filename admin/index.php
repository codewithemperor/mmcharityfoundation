<?php require_once '../include/function.php'; 
    checkAdminSession(); 
    if (isset($_GET['logout'])) {
        handleLogout();
    }
?>
<?php $totalEvents = getTotalEvents();
    list($totalBudget, $totalExpenses) = getTotalBudgetAndExpenses(); 
    $randomEvents = getRandomEvents(10); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Charity, Non Profit and NGO Website created with Bootstrap and Sass">
    <meta name="author" content="Tariqul Islam">

    <title>Mosesmoradeun Charity Foundation</title>

    <!--Favicon  -->
    <link rel="shortcut icon" href="resources/img/favicon.png">
    
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/fontawesome.min.css" integrity="sha512-B46MVOJpI6RBsdcU307elYeStF2JKT87SsHZfRSkjVi4/iZ3912zXi45X5/CBr/GbCyLx6M1GQtTKYRd52Jxgw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/solid.min.css" integrity="sha512-/r+0SvLvMMSIf41xiuy19aNkXxI+3zb/BN8K9lnDDWI09VM0dwgTMzK7Qi5vv5macJ3VH4XZXr60ip7v13QnmQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    
    <title>KOFEM - Farm Manager</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body>

    <div class="main">

        <section id="sidebar" class="py-3">
            <a href="../index.php" class="d-flex align-items-center justify-content-center py-3 my-3 text-decoration-none">
                <img src="resources/img/favicon.png" alt="Mosesmoradeun Charity Foundation Logo" class="w-50">
            </a>
    
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="dropdown active">
                    <a href="index.php" class="nav-link text-white ">
                        <i class="fa-regular fa-chart-line"></i>
                        Dashboard
                    </a>
                </li>
    
               
    
                <li class="dropdown">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="manageCropsToggle">
                        <i class="fa-regular fa-calendar-days"></i>
                        Events
                    </a>
                    <ul class="d-none drop-menu" id="manageCropsDropdown">
                        <li><a class="" href="add-event.php"><i class="fa-regular fa-plus"></i>Add Event</a></li>
                        <li><a class="" href="view-event.php"><i class="fa-regular fa-eye"></i>View Events</a></li>
                    </ul>
                </li>
    
                <li class="dropdown">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="farmActivitiesToggle">
                        <i class="fa-regular fa-photo-film"></i>
                        Gallery
                    </a>
                    <ul class="d-none drop-menu" id="farmActivitiesDropdown">
                        <li><a class="" href="add-gallery.php"><i class="fa-regular fa-plus"></i>Add Gallery</a></li>
                        <li><a class="" href="view-gallery.php"><i class="fa-regular fa-eye"></i>View Gallery</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="?logout" class="nav-link text-white ">
                        <i class="fa-regular fa-right-from-bracket"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </section>

        <section id="content">
            <div class="container-fluid p-0">

                <!-- Header  -->
                <div class=" search  d-flex justify-content-between align-items-center">
                    <!-- search box -->
                    <div class="col">
                      <span class="bars d-md-none pe-3">
                        <i class="fa-regular fa-bars"  style="font-size: 30px;"></i>
                      </span>
                    </div>
                    
                    <!-- search box -->
        
                    
  
                    <!-- User details -->
                    <div class="dropdown user-details col-md-4 d-flex justify-content-end align-items-center">
                        <h5 class="m-0 d-none d-md-flex align-items-center">Admin</h5>
                        <a href="#" class="d-flex align-items-center justify-content-center link-body-emphasis text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="resources/img/02.jpg" alt="user" width="40px" height="auto" class="ms-3">
                        </a>
  
                        <ul class="dropdown-menu text-small shadow">
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                    <!-- User details -->
                </div>
                <!-- Header  -->

                <div class="p-3 p-md-4 p-lg-5">
                    <div class="row px-3 px-md-0">
                        <div class="col mb-2">
                            <div class="row g-3">
                                <div class="col ps-0">
                                    <div class="card mb-3 border-black text-center h-100">
                                        <div class="card-header bg-dark py-3"></div>
                                        <div class="card-body">
                                            <p class="card-text">Total Event</p>
                                            <h2 class="card-title mt-1 fw-bold"><?php echo $totalEvents; ?></h2>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col pe-0">
                                    <div class="card mb-3 border-danger text-center h-100">
                                        <div class="card-header bg-danger py-3"></div>
                                        <div class="card-body">
                                            <p class="card-text">Total Expenses</p>
                                            <h2 class="card-title mt-1 fw-bold"><span class="naira">N</span><?php echo number_format($totalExpenses, 0, '.', ','); ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>

                
                    <div class="row mt-3 px-3 px-md-0 row-cols-1 ">
                        <div class="col px-0 pe-md-1 mb-3">
                            <div class="card border-dark px-0">
                                <div class="card-header bg-dark py-3"></div>
                                <div class="col px-3 my-2">
                                    <p class="fs-3 fw-bold">List of Events</p>
                                    <p class="mb-2">Quick view of all the Project registered in your system.</p>
                                </div>
                                
                                <div class="px-md-3">
                                <table class="table table-hover">
                                    <thead class="table-success">
                                        <tr>
                                            <th class="py-3">S/N</th>
                                            <th class="py-3">Project Name</th>
                                            <th class="py-3">Location</th>
                                            <th class="py-3">Budget</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($randomEvents)) {
                                            $serialNumber = 1;
                                            foreach ($randomEvents as $event) {
                                                $eventName = htmlspecialchars($event['eventName']);
                                                $eventLocation = htmlspecialchars($event['eventLocation']);
                                                $eventBudget = number_format($event['eventBudget'], 0, '.', ','); // Format budget with commas
                                                
                                                echo "<tr>
                                                        <td class='py-3'>{$serialNumber}.</td>
                                                        <td class='py-3'>{$eventName}</td>
                                                        <td class='py-3'>{$eventLocation}</td>
                                                        <td class='py-3'>{$eventBudget}</td>
                                                    </tr>";
                                                
                                                $serialNumber++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='4' class='py-3'>No events found.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                </div>

                            </div>
                        </div>

                       
                        
                    </div>

                
                </div>
            </div>
        </section>
    
        
    </div>
    
    
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>