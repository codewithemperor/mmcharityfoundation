
    <?php require_once 'include/header.php' ?>

    <section class="promo-area" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="promo-wrap">
                        <h1 class="promo-title">our <span>Events</span></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Events</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="event-page page-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                <div class="holder"></div>

                <?php

                require_once 'include/db.php';

                // Get the current page number from the URL parameter (default is 1)
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $limit = 10; // Number of events per page
                $offset = ($page - 1) * $limit; // Calculate the offset for the query

                // Query to get the total number of events
                $totalEventsQuery = "SELECT COUNT(*) as total FROM events";
                $totalEventsResult = $conn->query($totalEventsQuery);
                $totalEvents = $totalEventsResult->fetch_assoc()['total'];
                $totalPages = ceil($totalEvents / $limit); // Calculate the total number of pages

                // Query to get the events for the current page
                $eventsQuery = "SELECT customEventId, eventName, eventDescription, eventDate, eventCover, eventLocation FROM events LIMIT $limit OFFSET $offset";
                $eventsResult = $conn->query($eventsQuery);

                ?>
                
                <div class="event-list">
                    <?php while($event = $eventsResult->fetch_assoc()): ?>
                    <div class="single-event">
                        <figure class="event-thumb" style="background: url('<?php $event['eventCover'] ?>') no-repeat center top / cover;">
                            <figcaption><strong><?php echo date('d', strtotime($event['eventDate'])); ?></strong> <?php echo date('M', strtotime($event['eventDate'])); ?></figcaption>
                        </figure>
                        <div class="event-details">
                            <h3><a href="single-event.php?id=<?php echo $event['customEventId']; ?>"><?php echo $event['eventName']; ?></a></h3>
                            <p><?php echo substr($event['eventDescription'], 0, 250) . '...'; ?></p>
                            <a href="single-event.php?id=<?php echo $event['customEventId']; ?>" class="custom-btn">read more</a>
                        </div>
                    </div>
                    <?php endwhile; ?>

                    <div class="pager text-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
                                    <a class="page-link" href="?page=<?php echo $page - 1; ?>"><<</a>
                                </li>
                                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?php if($i == $page) echo 'active'; ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?php if($page >= $totalPages) echo 'disabled'; ?>">
                                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">>></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>



                   
                </div> 

                <div class="col-lg-4 col-sm-12 h-100 overflow-hidden">
                    <img src="images/banner/banner.jpg" class="object-fit-cover h-100" alt="Mosesmoradeun Charity Foundation">
                </div>

                
            </div>
        </div>
    </section>

    <?php require_once 'include/footer.php' ?>

