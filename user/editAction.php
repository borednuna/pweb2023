<?php
// Include the database connection file
require_once("config.php");

if (isset($_POST['update'])) {
    // Escape special characters in a string for use in an SQL statement
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);    

    // Initialize a variable to store the error message
    $errorMessage = '';

    // Check for empty fields and construct error messages
    if (empty($name)) {
        $errorMessage .= "<p style='color: red;'>Name field is empty.</p><br/>";
    }

    if (empty($age)) {
        $errorMessage .= "<p style='color: red;'>Age field is empty.</p><br/>";
    }

    if (empty($email)) {
        $errorMessage .= "<p style='color: red;'>Email field is empty.</p><br/>";
    }

    if (empty($errorMessage)) {
        // Update the database table
        $result = mysqli_query($conn, "UPDATE users SET `name` = '$name', `age` = '$age', `email` = '$email' WHERE `id` = $id");

        // Display success message
        echo "<p style='color: green;'>Data updated successfully!</p>";
        echo "<a href='index.php' style='text-decoration: none; color: #0074d9;'>View Result</a>";
    } else {
        // Display error messages
        echo $errorMessage;
    }
}
?>
