<html>
<head>
    <title>Add Data</title>
    <link rel="stylesheet" type="text/css" href="add.css">
</head>

<body>
    <h2>Add Data</h2>
    <p>
        <a href="index.php">Home</a>
    </p>

    <form action="addAction.php" method="post" name="add" enctype="multipart/form-data">
        <table width="25%" border="0">
            <tr> 
                <td>NIS</td>
                <td><input type="text" name="nis"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jenis_kelamin"></td>
            </tr>
            <tr> 
                <td>Telepon</td>
                <td><input type="text" name="telp"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>
