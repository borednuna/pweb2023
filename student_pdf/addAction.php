<?php
// Include the database connection file
require_once("config.php");

if (isset($_POST['submit'])) {
    // Escape special characters in a string for use in an SQL statement
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

    if (empty($_FILES['foto']['name'])) {
        $errorMessage .= "<p style='color: red;'>Foto field is empty.</p><br/>";
    }

    if (empty($errorMessage)) {
        // File upload handling
        $targetDir = "xampp/htdocs/crud_upload/images/"; // Specify the directory where you want to save the uploaded files relative to your PHP files
        $targetFile = $targetDir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $errorMessage .= "<p style='color: red;'>File is not an image.</p><br/>";
                $uploadOk = 0;
            }
        }

        // Check file size
        if ($_FILES["foto"]["size"] > 500000) {
            $errorMessage .= "<p style='color: red;'>Sorry, your file is too large.</p><br/>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $errorMessage .= "<p style='color: red;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p><br/>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errorMessage .= "<p style='color: red;'>Sorry, your file was not uploaded.</p><br/>";
        } else {
            // If everything is ok, try to upload file
            // Generate a unique filename based on the current timestamp
            $uniqueFilename = time() . '_' . $_FILES["foto"]["name"];
            $targetFile = $targetDir . $uniqueFilename;

            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
                // Insert data into the database table with the relative path to the image
                $result = mysqli_query($conn, "INSERT INTO students (nis, nama, jenis_kelamin, telp, alamat, foto) VALUES ('$nis', '$nama', '$jenis_kelamin', '$telp', '$alamat', '$targetFile')");

                // Display success message
                echo "<p style='color: green;'>Data added successfully!</p>";
                echo "<a href='index.php' style='text-decoration: none; color: #0074d9;'>View Result</a>";
            } else {
                $errorMessage .= "<p style='color: red;'>Sorry, there was an error uploading your file.</p><br/>";
            }
        }
    } else {
        // Display error messages
        echo $errorMessage;
    }
}
?>
