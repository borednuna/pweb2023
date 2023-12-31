<?php
// Include the database connection file
require_once("config.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$nis = $resultData['nis'];
$nama = $resultData['nama'];
$jenis_kelamin = $resultData['jenis_kelamin'];
$telp = $resultData['telp'];
$alamat = $resultData['alamat'];
$foto = $resultData['foto'];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    } else {
        // Check if "Jenis Kelamin" is either "Laki-laki" or "Perempuan"
        if ($jenis_kelamin != 'Laki-laki' && $jenis_kelamin != 'Perempuan') {
            $errorMessage .= "<p style='color: red;'>Jenis Kelamin should be either 'Laki-laki' or 'Perempuan'.</p><br/>";
        }
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
            // File upload handling
            $targetDir = "xampp/htdocs/crud_upload/images/"; // Adjust the directory as needed
            $targetFile = $targetDir . basename($_FILES["new_foto"]["name"]);

            // Ensure the target directory exists; create it if not
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Upload the new photo
            if (move_uploaded_file($_FILES["new_foto"]["tmp_name"], $targetFile)) {
                // Remove the old photo if it exists
                $result = mysqli_query($conn, "SELECT foto FROM students WHERE id = $id");
                $oldPhotoData = mysqli_fetch_assoc($result);
                $oldPhoto = $oldPhotoData['foto'];

                if (!empty($oldPhoto) && file_exists($oldPhoto)) {
                    unlink($oldPhoto);
                }

                // Update the database with the new photo URL
                $newFotoUrl = $targetDir . $_FILES["new_foto"]["name"];
                $updateResult = mysqli_query($conn, "UPDATE students SET nis = '$nis', nama = '$nama', jenis_kelamin = '$jenis_kelamin', telp = '$telp', alamat = '$alamat', foto = '$newFotoUrl' WHERE id = $id");

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
            $updateResult = mysqli_query($conn, "UPDATE students SET nis = '$nis', nama = '$nama', jenis_kelamin = '$jenis_kelamin', telp = '$telp', alamat = '$alamat' WHERE id = $id");

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
<html>
<head>    
    <title>Edit Data</title>
    <link rel="stylesheet" type="text/css" href="edit.css">
    <style>
        /* Add a style tag to include the CSS for the image preview */
        .image-preview {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <h2>Edit Data</h2>
    <p>
        <a href="index.php">Home</a>
    </p>
    
    <form name="edit" method="post" action="edit.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        <table border="0">
        <tr> 
                <td>NIS</td>
                <td><input type="text" name="nis" value="<?php echo $nis; ?>"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
            </tr>
            <tr> 
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin">
                        <option value="Laki-laki" <?php if ($jenis_kelamin == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($jenis_kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telp" value="<?php echo $telp; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>
                    <img class="image-preview" src="<?php echo $foto; ?>" alt="Image Preview">
                    <br>
                    <input type="file" name="new_foto">
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
