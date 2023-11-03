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

                &:hover {
                    background-color: #333;
                    color: #fff;
                }
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
                Masukkan nama calon siswa yang ingin dihapus datanya.
            </p>
            <form method="post" onsubmit="return validateForm()">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Terdaftar">
                <button type="submit">Hapus</button>
            </form> 
            <a href="index.php">Kembali</a>
        </div>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nama"])) {
                $nama = $_POST["nama"];

                include "config.php";

                $sql = "DELETE FROM calon_siswa WHERE nama = '$nama'";

                if ($conn->query($sql) === TRUE) {
                    echo "</br>success";
                } else {
                    echo "error";
                }

                // Close the database connection
                $conn->close();
            }
        ?>


        <script>
            function validateForm() {
                if (
                    document.getElementById("nama").value === "" ||
                ) {
                    alert("Please fill in nama fields.");
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>
