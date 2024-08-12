<?php
require_once 'include/header.php';
require_once 'include/db.php';

if (isset($_GET['id'])) {
    $customEventId = $_GET['id'];

    // Query to get event details
    $query = "SELECT eventName, eventLocation, eventDate, eventBudget, eventCover, eventDescription FROM events WHERE customEventId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $customEventId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();
    } else {
        echo "<p>Event not found</p>";
        exit();
    }

    // Query to get event media (pictures)
    $mediaQuery = "SELECT picturePath FROM event_media WHERE customEventId = ? AND mediaType = 'picture' ORDER BY RAND() LIMIT 2";
    $stmt = $conn->prepare($mediaQuery);
    $stmt->bind_param("s", $customEventId);
    $stmt->execute();
    $mediaResult = $stmt->get_result();
    $media = $mediaResult->fetch_all(MYSQLI_ASSOC);

    // Query to get video link
    $videoQuery = "SELECT videoLink FROM event_media WHERE customEventId = ? AND mediaType = 'video'";
    $stmt = $conn->prepare($videoQuery);
    $stmt->bind_param("s", $customEventId);
    $stmt->execute();
    $videoResult = $stmt->get_result();
    $video = $videoResult->fetch_assoc();
}
?>

<section class="promo-area" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="promo-wrap">
                    <h1 class="promo-title">our <span>Events</span></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="event.php">Events</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $customEventId; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="cause-details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <article class="cause-content">
                    <div class="wow fadeIn mb-4 w-100 overflow-hidden" data-wow-delay="200ms">
                        <img src="images/events/<?php echo htmlspecialchars($event['eventCover']); ?>" class="rounded object-fit-cover w-100" alt="...">
                    </div>

                    <div class="cause-info">
                        <div class="border-bottom mb-4">
                            <h2 class="mb-2"><?php echo htmlspecialchars($event['eventName']); ?></h2>
                            <div class="text-decoration-none list-style2 ps-0 mb-2">
                                <p class="d-inline-block"><i class="far fa-clock pe-2 color"></i><?php echo htmlspecialchars(date('l jS F, Y h:i A', strtotime($event['eventDate']))); ?></p>
                                <p class="d-inline-block ps-3"><i class="fas fa-map-marker-alt pe-2 color"></i><?php echo htmlspecialchars($event['eventLocation']); ?></p>
                                <p class="d-inline-block ps-3"><i class="fas fa-money-bill-alt pe-2 color"></i><?php echo htmlspecialchars(number_format($event['eventBudget'], 2)); ?></p>
                            </div>
                        </div>

                        <p><?php echo htmlspecialchars($event['eventDescription']); ?></p>

                        <?php if ($video): ?>
                            <div class="cause-gallery">
                                <iframe class="col-12" height="340" src="<?php echo htmlspecialchars($video['videoLink']); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        <?php endif; ?>

                        <div class="cause-gallery">
                            <?php if (count($media) > 0): ?>
                                <ul>
                                    <?php foreach ($media as $item): ?>
                                        <li><img src="images/gallery/<?php echo htmlspecialchars($item['picturePath']); ?>" alt></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>No media for this event.</p>
                            <?php endif; ?>
                            <a href="gallery.php">View more</a>
                        </div>
                    </div>

                    <!-- Social Share & Comment Section -->
                    <div class="p-3 mb-3">
                        <h6 class="mb-0 d-inline-block">Share us on:</h6>
                        <div class="footer-social my-2">
                            <a target="_blank" href="https://wa.me/+2347051196129?text=Hello%20Moses%20Moradeun%20Charity%20Foundation.%20I..."><i class="fa-brands fa-whatsapp"></i></a>
                            <a target="_blank" href="https://www.facebook.com/profile.php?id=61563409328830&mibextid=LQQJ4d"><i class="fa-brands fa-facebook-f"></i></a>
                            <a target="_blank" href="https://x.com/MoradeunCharity"><i class="fa-brands fa-x"></i></a>
                            <a target="_blank" href="https://www.youtube.com/@mosesmoradeuncharityfoundation"><i class="fa-brands fa-youtube"></i></a>
                            <a target="_blank" href="https://instagram.com/mosesmoradeuncharityfoundation/"><i class="fa-brands fa-instagram"></i></a>
                            <a target="_blank" href="https://tikTok.com/@mosesmoradeuncharity"><i class="fa-brands fa-tiktok"></i></a>
                            <a target="_blank" href="https://threads.net/@mosesmoradeuncharityfoundation" class="mt-2"><i class="fa-brands fa-threads"></i></a>
                        </div>

                        <!-- Comment Form -->
                      
                        <!-- End Comment Form -->
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-sm-12 h-100 overflow-hidden">
                <img src="images/banner/banner.jpg" class="object-fit-cover h-100" alt="Mosesmoradeun Charity Foundation">
            </div>
            <!-- End Sidebar -->
        </div>
    </div>
</div>

<?php require_once 'include/footer.php'; ?>
