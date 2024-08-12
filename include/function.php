<?php
include_once 'db.php'; // Include your database connection

// Function to add an event
function addEvent(){
    global $conn; // Use the global database connection variable

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>Database connection is not established.</div>";
        return;
    }

    if (isset($_POST['addEvent'])) {
        // Retrieve and sanitize form input values
        $eventName = $_POST['eventName'];
        $eventLocation = $_POST['eventLocation'];
        $eventDate = $_POST['eventDate'];
        $eventDescription = $_POST['eventDescription'];
        $eventBudget = $_POST['eventBudget'];

        // Check if an image file is uploaded and no upload error occurred
        if (isset($_FILES['eventCover']) && $_FILES['eventCover']['error'] == 0) {
            $eventCover = $_FILES['eventCover'];

            // Insert event details into the database
            $query = "INSERT INTO events (eventName, eventLocation, eventDate, eventBudget, eventDescription) VALUES (?, ?, ?, ?, ?)";

            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param("ssssi", $eventName, $eventLocation, $eventDate, $eventBudget, $eventDescription);

                if ($stmt->execute()) {
                    $eventId = $stmt->insert_id; // Get the inserted event's ID

                    // Generate custom event ID
                    $customEventId = sprintf("EV-%02d-%04d-%d", date('m', strtotime($eventDate)), date('Y', strtotime($eventDate)), $eventId);

                    // Update the custom event ID in the database
                    $updateQuery = "UPDATE events SET customEventId = ? WHERE id = ?";
                    if ($updateStmt = $conn->prepare($updateQuery)) {
                        $updateStmt->bind_param("si", $customEventId, $eventId);
                        $updateStmt->execute();
                        $updateStmt->close();
                    }

                    // Process the uploaded image
                    $imageExtension = pathinfo($eventCover['name'], PATHINFO_EXTENSION);
                    $imageName = "event_" . $customEventId . "." . $imageExtension;
                    $targetDirectory = "../images/events/";
                    $targetFile = $targetDirectory . $imageName;

                    // Create the directory if it doesn't exist
                    if (!file_exists($targetDirectory)) {
                        mkdir($targetDirectory, 0777, true);
                    }

                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($eventCover['tmp_name'], $targetFile)) {
                        // Update the event record with the image name
                        $updateImageQuery = "UPDATE events SET eventCover = ? WHERE id = ?";
                        if ($updateImageStmt = $conn->prepare($updateImageQuery)) {
                            $updateImageStmt->bind_param("si", $imageName, $eventId);
                            $updateImageStmt->execute();
                            $updateImageStmt->close();

                            // Show success alert
                            echo "<div class='alert alert-success' role='alert'>Event added successfully with ID: $customEventId</div>";
                        }
                    } else {
                        // Show error alert for image upload failure
                        echo "<div class='alert alert-danger' role='alert'>Error uploading the event cover image.</div>";
                    }
                } else {
                    // Show error alert for query execution failure
                    echo "<div class='alert alert-danger' role='alert'>Error adding event: " . $conn->error . "</div>";
                }
                $stmt->close();
            } else {
                echo "<div class='alert alert-danger' role='alert'>Prepare statement failed: " . $conn->error . "</div>";
            }
        } else {
            // Show error alert for file upload issues
            echo "<div class='alert alert-danger' role='alert'>No file uploaded or file upload error.</div>";
        }
    }
}


// Function to view events
function viewEvents() {
    global $conn;

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>Database connection is not established.</div>";
        return;
    }

    $query = "SELECT * FROM events";
    $result = $conn->query($query);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $eventId = $row['id'];
            $eventName = htmlspecialchars($row['eventName']);
            $eventLocation = htmlspecialchars($row['eventLocation']);
            $eventDate = date('d/m/Y', strtotime($row['eventDate']));
            $eventDescription = htmlspecialchars($row['eventDescription']);
            $customEventId = htmlspecialchars($row['customEventId']);
            $eventBudget = number_format($row['eventBudget'], 2);
            
            echo "<tr>
                    <td class='py-3'>$customEventId</td>
                    <td class='py-3'>$eventName</td>
                    <td class='py-3'>$eventLocation</td>
                    <td class='py-3'>$eventDate</td>
                    <td class='py-3'><span class='naira'>N</span>$eventBudget</td>
                    <td class='py-3 desc'>$eventDescription</td>
                    <td class='py-3'>
                        <a href='?deleteEvent=$eventId' class='pe-lg-3 p-2 me-lg-2 text-white bg-danger d-inline-block mb-3 text-center'>
                            <i class='fa-regular fa-trash px-2'></i>Delete
                        </a>
                    </td>
                </tr>";
        }
        $result->free();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error retrieving events: " . $conn->error . "</div>";
    }
}

// Function to delete an event
function deleteEvent() {
    global $conn;

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>Database connection is not established.</div>";
        return;
    }

    if (isset($_GET['deleteEvent'])) {
        $eventId = intval($_GET['deleteEvent']);
        
        // Fetch the event cover image name first
        $selectQuery = "SELECT eventCover FROM events WHERE id = ?";
        if ($stmt = $conn->prepare($selectQuery)) {
            $stmt->bind_param("i", $eventId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result) {
                $row = $result->fetch_assoc();
                $eventCover = $row['eventCover'];
                $stmt->close();

                // Delete the record from the database
                $deleteQuery = "DELETE FROM events WHERE id = ?";
                if ($stmt = $conn->prepare($deleteQuery)) {
                    $stmt->bind_param("i", $eventId);
                    if ($stmt->execute()) {
                        // If the deletion was successful, remove the file from the folder
                        if ($eventCover) {
                            $filePath = "../images/events/" . $eventCover;
                            if (file_exists($filePath)) {
                                if (unlink($filePath)) {
                                    echo "<div class='alert alert-success' role='alert'>Event and file deleted successfully.</div>";
                                } else {
                                    echo "<div class='alert alert-danger' role='alert'>Error deleting the file.</div>";
                                }
                            } else {
                                echo "<div class='alert alert-warning' role='alert'>File does not exist: $filePath</div>";
                            }
                        } else {
                            echo "<div class='alert alert-warning' role='alert'>No file to delete for this event.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Error deleting event: " . $conn->error . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Prepare failed: " . $conn->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error retrieving event details: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Prepare failed: " . $conn->error . "</div>";
        }
    }
}



// Function to retrieve total events count
function getTotalEvents() {
    global $conn;

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>Database connection is not established.</div>";
        return 0;
    }

    $query = "SELECT COUNT(*) as total FROM events";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $row['total'];
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error retrieving total events: " . mysqli_error($conn) . "</div>";
        return 0;
    }
}

// Function to retrieve total budget and total expenses
function getTotalBudgetAndExpenses() {
    global $conn;

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>Database connection is not established.</div>";
        return [0, 0]; // [totalBudget, totalExpenses]
    }

    // Calculate total budget
    $budgetQuery = "SELECT SUM(eventBudget) as totalBudget FROM events";
    $budgetResult = mysqli_query($conn, $budgetQuery);

    $totalBudget = 0;
    if ($budgetResult) {
        $row = mysqli_fetch_assoc($budgetResult);
        $totalBudget = $row['totalBudget'] ? $row['totalBudget'] : 0;
        mysqli_free_result($budgetResult);
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error retrieving total budget: " . mysqli_error($conn) . "</div>";
    }

    // Calculate total expenses (assuming 'totalExpenses' means the total budget in this context)
    // You can modify this part if you have a different calculation for expenses
    $totalExpenses = $totalBudget;

    return [$totalBudget, $totalExpenses];
}


function getRandomEvents($limit = 10) {
    global $conn;

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>Database connection is not established.</div>";
        return [];
    }

    $query = "SELECT * FROM events ORDER BY RAND() LIMIT ?";
    
    if ($stmt = $conn->prepare($query)) {
        // Bind parameters
        $stmt->bind_param("i", $limit);
        
        // Execute and fetch results
        $stmt->execute();
        $result = $stmt->get_result();
        $events = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $events;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Prepare failed: " . $conn->error . "</div>";
        return [];
    }
}




function addEventMedia() {
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $eventCode = $_POST['eventCode'];
        $mediaType = $_POST['mediaType'];
        $videoLink = $_POST['videoLink'] ?? '';
        $picturePath = $_FILES['picturePath']['name'] ?? '';

        // Fetch event from the database using the event code
        $stmt = $conn->prepare("SELECT * FROM events WHERE customEventId = ?");
        $stmt->bind_param("s", $eventCode);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    No such event found.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            return;
        }

        // If picture is uploaded, process the upload
        if (!empty($picturePath)) {
            $targetDirectory = "../images/gallery/";
            $targetFile = $targetDirectory . basename($picturePath);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['picturePath']['tmp_name'], $targetFile)) {
                // Compress the image to a maximum of 70KB and save with "-thumb" suffix
                $compressedFile = $targetDirectory . pathinfo($picturePath, PATHINFO_FILENAME) . "-thumb." . $imageFileType;
                
                if (compressImage($targetFile, $compressedFile, 70 * 1024)) {
                    // Update the picturePath to the compressed file name
                    $picturePath = basename($compressedFile);
                } else {
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            Failed to compress the image to the desired size, original image and thumb saved.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>";
                }
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Error uploading the picture.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                return;
            }
        }

        // Insert the media details into the event_media table 
        $stmt = $conn->prepare("INSERT INTO event_media (customEventId, mediaType, videoLink, picturePath) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $eventCode, $mediaType, $videoLink, $picturePath);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Event media added successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Error adding event media: " . $conn->error . "
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        }

        $stmt->close();
    }
}

// Function to compress an image to a target size
function compressImage($sourcePath, $destinationPath, $maxSize) {
    $info = getimagesize($sourcePath);
    $mime = $info['mime'];

    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($sourcePath);
            break;
        case 'image/png':
            $image = @imagecreatefrompng($sourcePath); // Suppress warning
            break;
        case 'image/gif':
            $image = imagecreatefromgif($sourcePath);
            break;
        default:
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Unsupported image format.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            return false;
    }

    if ($image === false) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Failed to create image resource.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        return false;
    }

    // Compress and save image
    imagejpeg($image, $destinationPath, 75); // Adjust quality here

    // Check file size and adjust quality if necessary
    $currentSize = filesize($destinationPath);
    if ($currentSize > $maxSize) {
        $quality = 75;
        while ($currentSize > $maxSize && $quality > 10) {
            imagejpeg($image, $destinationPath, $quality);
            $currentSize = filesize($destinationPath);
            $quality -= 5;
        }
    }

    imagedestroy($image);

    if ($currentSize > $maxSize) {
        return false;
    }

    return true;
}



function getEventOptions() {
    global $conn;

    $query = "SELECT customEventId, eventName, eventLocation FROM events";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $eventId = $row['customEventId'];
            $eventName = $row['eventName'];
            $eventLocation = $row['eventLocation'];
            $optionText = "$eventLocation, $eventName";
            
            echo "<option value='$eventId'>$optionText</option>";
        }
        mysqli_free_result($result);
    } else {
        echo "<option disabled>No events found</option>";
    }
}





function displayGalleryItems() {
    global $conn;

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>Database connection is not established.</div>";
        return;
    }

    $query = "SELECT em.id, em.customEventId, em.mediaType, em.picturePath, em.videoLink, e.eventName, e.eventLocation 
              FROM event_media em 
              JOIN events e ON em.customEventId = e.customEventId";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mediaId = $row['id'];
            $customEventId = $row['customEventId'];
            $eventName = htmlspecialchars($row['eventName']);
            $eventLocation = htmlspecialchars($row['eventLocation']);
            $mediaType = $row['mediaType'];
            $link = ($mediaType === 'picture') ? "../images/gallery/{$row['picturePath']}" : $row['videoLink'];

            echo "<tr class='align-middle'>
                    <td class='py-2'>$customEventId</td>
                    <td class='py-2'>$eventName</td>
                    <td class='py-2'>$eventLocation</td>
                    <td class='py-2'>
                        <a href='$link' target='_blank' class='btn btn-primary me-2'>View</a>
                        <a href='view-gallery.php?deleteMedia=$mediaId' class='btn btn-danger'>Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4' class='text-center py-3'>No media found.</td></tr>";
    }
}

function deleteMedia() {
    global $conn;

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>Database connection is not established.</div>";
        return;
    }

    if (isset($_GET['deleteMedia'])) {
        $mediaId = intval($_GET['deleteMedia']);
        
        // Fetch the media details
        $selectQuery = "SELECT mediaType, picturePath FROM event_media WHERE id = ?";
        if ($stmt = $conn->prepare($selectQuery)) {
            $stmt->bind_param("i", $mediaId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $row = $result->fetch_assoc()) {
                $mediaType = $row['mediaType'];
                $picturePath = $row['picturePath'];
                $stmt->close();

                // Delete the record from the database
                $deleteQuery = "DELETE FROM event_media WHERE id = ?";
                if ($stmt = $conn->prepare($deleteQuery)) {
                    $stmt->bind_param("i", $mediaId);
                    if ($stmt->execute()) {
                        // If the deletion was successful, remove the file from the folder if it's a picture
                        if ($mediaType === 'picture' && $picturePath) {
                            $filePath = "../images/gallery/" . $picturePath;
                            $thumbnailPath = "../images/gallery/" . pathinfo($picturePath, PATHINFO_FILENAME) . '-thumb.' . pathinfo($picturePath, PATHINFO_EXTENSION);

                            $originalDeleted = false;
                            $thumbDeleted = false;

                            // Delete the original file
                            if (file_exists($filePath)) {
                                if (unlink($filePath)) {
                                    $originalDeleted = true;
                                } else {
                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                            Error deleting the original file: $filePath
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                                }
                            } else {
                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        Original file does not exist: $filePath
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }

                            // Delete the thumbnail file
                            if (file_exists($thumbnailPath)) {
                                if (unlink($thumbnailPath)) {
                                    $thumbDeleted = true;
                                } else {
                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                            Error deleting the thumbnail file: $thumbnailPath
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                                }
                            } else {
                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        Thumbnail file does not exist: $thumbnailPath
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }

                            // Success message if both were deleted
                            if ($originalDeleted && $thumbDeleted) {
                                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        Both media files deleted successfully.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            } elseif ($originalDeleted) {
                                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        Original media file deleted successfully, but the thumbnail could not be deleted.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            } elseif ($thumbDeleted) {
                                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        Thumbnail deleted successfully, but the original file could not be deleted.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }
                        } else {
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    Media deleted successfully.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Error deleting media: " . $conn->error . "
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                } else {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Prepare failed: " . $conn->error . "
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No media found with the provided ID.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Prepare failed: " . $conn->error . "
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}





function handleLogin() {
    if (isset($_POST['login'])) {
        $usernameOrEmail = trim($_POST['email']);
        $password = trim($_POST['password']);
        
        if (($usernameOrEmail === 'admin' || $usernameOrEmail === 'admin@gmail.com') && $password === 'admin1@.') {
            // Start the session and redirect to the admin panel
            session_start();
            $_SESSION['loggedIn'] = true;
            header("Location: admin/");
            exit();
        } else {
            // Show an alert for wrong credentials
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Wrong credentials. Please try again.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        }
    }
}

function checkAdminSession() {
    session_start();

    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        header("Location: ../signin.php");
        exit();
    }
}

function handleLogout() {
    session_start();
    
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: ../signin.php");
    exit();
}
