<?php
// Include the database connection file
require_once("config.php");

// Get id parameter value from URL
$id = $_GET['id'];

// Select the row to get the image file path
$result = mysqli_query($conn, "SELECT foto FROM students WHERE id = $id");
$row = mysqli_fetch_assoc($result);
$fotoPath = $row['foto'];

// Delete row from the database table
$deleteResult = mysqli_query($conn, "DELETE FROM students WHERE id = $id");

// Check if the database record is deleted successfully
if ($deleteResult) {
    // Delete the associated image from the server
    if (!empty($fotoPath) && file_exists($fotoPath)) {
        unlink($fotoPath);
    }

    // Redirect to the main display page (index.php in our case)
    header("Location:index.php");
} else {
    // Handle the case where the database record deletion fails
    echo "Error deleting record.";
}
?>
