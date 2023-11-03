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

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #333;
        }

        th, td {
            border: 1px solid #333;
            padding: 0.5rem;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Calon Siswa Terdaftar</h2>
        <p>Berikut adalah daftar calon siswa yang telah terdaftar.</p>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Asal Sekolah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'config.php';
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM calon_siswa");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td><?php echo $data['jenis_kelamin']; ?></td>
                            <td><?php echo $data['agama']; ?></td>
                            <td><?php echo $data['sekolah_asal']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="menu">
            <a href="index.php">Kembali</a>
        </div>
    </div>
</body>
</html>
