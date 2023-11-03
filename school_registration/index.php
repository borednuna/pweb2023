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

            .menu {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                margin-top: 1.1rem;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Website Pendaftaran Sekolah</h2>
            <p>
                Selamat datang di Web Pendaftaran Sekolah. Silakan pilih menu yang tersedia untuk melakukan pendaftaran.
            </p>
            <div class="menu">
                <a href="./form-daftar.php">Form Pendaftaran Siswa Baru</a>
                <a href="./list-siswa.php">Daftar Calon Siswa Baru Telah Terdaftar</a>
                <a href="./proses-edit.php">Ubah Data Siswa</a>
                <a href="./hapus.php">Hapus Data Siswa</a>
            </div>
        </div>
    </body>
</html>
