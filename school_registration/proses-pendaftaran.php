<?php
    include 'config.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $agama = $_POST["agama"];
        $sekolah_asal = $_POST["sekolah_asal"];

        $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Berhasil mendaftarkan siswa baru</p><br>
            <a style='display: block; width: 96%; padding: 0.6rem; margin: 0.6rem 0; background-color: #fff; border: 1px solid #ccc; border-radius: 5px; text-decoration: none; color: #333; font-size: 1rem; line-height: 1.6rem; text-align: center; transition: all 0.3s ease-in-out;' href='index.php'>Kembali</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>
