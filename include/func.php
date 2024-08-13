<?php
// Include your database connection
include_once('db.php');

function display_random_events() {
    global $conn; // Use the global $conn variable for the database connection

    // Prepare the SQL query to select 6 random events
    $sql = "SELECT id, eventName, eventLocation, eventCover, eventDescription, customEventId 
            FROM events 
            ORDER BY RAND() 
            LIMIT 6";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Start output buffering
    ob_start();

    // Check if there are any results
    if ($result && mysqli_num_rows($result) > 0) {
        echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-gap-3 row-gap-md-4">';
        while ($event = mysqli_fetch_assoc($result)) {
            // Slice the description to 740 characters and add ellipsis if necessary
            $description = $event['eventDescription'];
            if (strlen($description) > 440) {
                $description = substr($description, 0, 440) . '...';
            }

            echo '
            <div class="col">
                <div class="single-project rounded-2 shadow">
                    <figure class="project-thumb">
                        <img src="images/events/' . htmlspecialchars($event['eventCover']) . '" alt="Moses Moradeun  Charity Foundation">
                    </figure>
                    <div class="project-info p-lg-4 p-3">
                        <h3><a href="single-cause.php?id=' . htmlspecialchars($event['customEventId']) . '">' . htmlspecialchars($event['eventName']) . '</a></h3>
                        <p>' . htmlspecialchars($description) . '</p>
                        <a href="single-event.php?id=' . htmlspecialchars($event['customEventId']) . '" class="custom-btn mt-3">View Project</a>
                    </div>
                </div>
            </div>';
        }
        echo '</div>';
    } else {
        echo '<p>No events found.</p>';
    }

    // Return the buffered output
    return ob_get_clean();
}

