<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>School Registration</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                text-align: center;
            }

            h2 {
                color: #333;
                font-size: 2rem;
                margin-bottom: 1rem;
            }

            p {
                font-size: 1rem;
                line-height: 1.6rem;
                text-align: center;
            }

            a  {
                display: block;
                width: 100%;
                padding: 0.6rem;
                margin: 0.6rem 0;
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 5px;
                text-decoration: none;
                color: #333;
                font-size: 1rem;
                line-height: 1.6rem;
                text-align: center;
                transition: all 0.3s ease-in-out;
            }

            a:hover {
                background-color: #333;
                color: #fff;
            }

            /* Form Styles */
            .container {
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 20px;
            }

            form {
                display: flex;
                flex-direction: column;
            }

            label {
                font-weight: bold;
                margin-bottom: 0.5rem;
            }

            input {
                padding: 0.6rem;
                margin-bottom: 0.7rem;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            button {
                background-color: #333;
                color: #fff;
                border: none;
                padding: 10px;
                border-radius: 5px;
                cursor: pointer;
            }

            button:hover {
                background-color: #555;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Website Pendaftaran Sekolah</h2>
            <p>
                Silakan masukkan nama calon siswa yang ingin diubah datanya,</br>kemudian isikan data yang baru
            </p>

            <!-- Update Form -->
            <form action="" method="post">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama">
                
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat">

                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input type="text" id="jenis_kelamin" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin">

                <label for="agama">Agama</label>
                <input type="text" id="agama" name="agama" placeholder="Masukkan Agama">

                <label for="sekolah_asal">Asal Sekolah</label>
                <input type="text" id="sekolah_asal" name="sekolah_asal" placeholder="Masukkan Asal Sekolah">

                <button type="submit" name="update">Update</button>
            </form>
            <a href="index.php">Kembali</a>

            <?php
                if (isset($_POST['update'])) {
                    $nama = $_POST["nama"];
                    $alamat = $_POST["alamat"];
                    $jenis_kelamin = $_POST["jenis_kelamin"];
                    $agama = $_POST["agama"];
                    $sekolah_asal = $_POST["sekolah_asal"];

                    include 'config.php';

                    // SQL update statement
                    $sql = "UPDATE calon_siswa SET alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', agama = '$agama', sekolah_asal = '$sekolah_asal' WHERE nama = '$nama'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Data updated successfully.";
                    } else {
                        echo "Error updating data: " . $conn->error;
                    }

                    // Close the database connection
                    $conn->close();
                }
            ?>
        </div>

        <script>
                function validateForm() {
                    if (
                        document.getElementById("nama").value === "" ||
                        document.getElementById("alamat").value === "" ||
                        document.getElementById("jenis_kelamin").value === "" ||
                        document.getElementById("agama").value === "" ||
                        document.getElementById("sekolah_asal").value === ""
                    ) {
                        alert("Please fill in all fields.");
                        return false;
                    }
                    return true;
                }
            </script>
    </body>
</html>
