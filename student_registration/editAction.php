<?php
// Include the database connection file
require_once("config.php");

if (isset($_POST['update'])) {
    // Escape special characters in a string for use in an SQL statement
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nis = mysqli_real_escape_string($conn, $_POST['nis']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    // Initialize a variable to store the error message
    $errorMessage = '';

    // Check for empty fields and construct error messages
    if (empty($nis)) {
        $errorMessage .= "<p style='color: red;'>NIS field is empty.</p><br/>";
    }

    if (empty($nama)) {
        $errorMessage .= "<p style='color: red;'>Nama field is empty.</p><br/>";
    }

    if (empty($jenis_kelamin)) {
        $errorMessage .= "<p style='color: red;'>Jenis Kelamin field is empty.</p><br/>";
    }

    if (empty($telp)) {
        $errorMessage .= "<p style='color: red;'>Telepon field is empty.</p><br/>";
    }

    if (empty($alamat)) {
        $errorMessage .= "<p style='color: red;'>Alamat field is empty.</p><br/>";
    }

    if (empty($errorMessage)) {
        // Check if a new photo is uploaded
        if (!empty($_FILES["new_foto"]["name"])) {
            // Process the new photo
            $targetDir = "xampp/htdocs/crud_upload/images/"; // Adjust the directory as needed
            $targetFile = $targetDir . basename($_FILES["new_foto"]["name"]);

            // Upload the new photo
            if (move_uploaded_file($_FILES["new_foto"]["tmp_name"], $targetFile)) {
                // Remove the old photo if it exists
                $result = mysqli_query($conn, "SELECT foto FROM student_registration WHERE id = $id");
                $oldPhotoData = mysqli_fetch_assoc($result);
                $oldPhoto = $oldPhotoData['foto'];

                if (!empty($oldPhoto) && file_exists($oldPhoto)) {
                    unlink($oldPhoto);
                }

                // Update the database with the new photo URL
                $newFotoUrl = $targetDir . $_FILES["new_foto"]["name"];
                $updateResult = mysqli_query($conn, "UPDATE student_registration SET nis = '$nis', nama = '$nama', jenis_kelamin = '$jenis_kelamin', telp = '$telp', alamat = '$alamat', foto = '$newFotoUrl' WHERE id = $id");

                if ($updateResult) {
                    echo "<p style='color: green;'>Data updated successfully!</p>";
                } else {
                    echo "<p style='color: red;'>Error updating data.</p>";
                }
            } else {
                echo "<p style='color: red;'>Error uploading new photo.</p>";
            }
        } else {
            // No new photo uploaded, update other fields without changing the photo
            $updateResult = mysqli_query($conn, "UPDATE student_registration SET nis = '$nis', nama = '$nama', jenis_kelamin = '$jenis_kelamin', telp = '$telp', alamat = '$alamat' WHERE id = $id");

            if ($updateResult) {
                echo "<p style='color: green;'>Data updated successfully!</p>";
            } else {
                echo "<p style='color: red;'>Error updating data.</p>";
            }
        }
        echo "<a href='index.php' style='text-decoration: none; color: #0074d9;'>View Result</a>";
    } else {
        // Display error messages
        echo $errorMessage;
    }
}
?>
