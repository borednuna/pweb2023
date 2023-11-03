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
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        p {
            font-size: 1rem;
            line-height: 1.7rem;
            text-align: center;
        }

        a  {
            display: block;
            width: 96%;
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
            <h2>Daftarkan Siswa Baru</h2>
            <p>Silahkan isi form berikut untuk mendaftarkan siswa baru.</p>
            <form action="proses-pendaftaran.php" method="post" onsubmit="return validateForm()">
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

                <button type="submit">Submit</button>
            </form>
            <a href="index.php">Kembali</a>
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
