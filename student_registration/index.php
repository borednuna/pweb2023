<?php
// Include the database connection file
require_once("config.php");

// Fetch data in descending order (latest entry first)
$result = mysqli_query($conn, "SELECT * FROM student_registration ORDER BY id DESC");
?>

<html>
<head>	
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
    <h2>Homepage</h2>
    <p>
        <a href="add.php">Add New Data</a>
    </p>
    <table width='80%' border=0>
        <tr bgcolor='#DDDDDD'>
            <td><strong>Id</strong></td>
            <td><strong>NIS</strong></td>
            <td><strong>Nama</strong></td>
            <td><strong>Jenis Kelamin</strong></td>
            <td><strong>Telepon</strong></td>
            <td><strong>Alamat</strong></td>
            <td><strong>Foto</strong></td>
            <td><strong>Action</strong></td>
        </tr>
        <?php
        // Fetch the next row of a result set as an associative array
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
            echo "<td>".$res['nis']."</td>";
            echo "<td>".$res['nama']."</td>";    
            echo "<td>".$res['jenis_kelamin']."</td>";
            echo "<td>".$res['telp']."</td>";
            echo "<td>".$res['alamat']."</td>";
            echo "<td><img class='table-image' src='".$res['foto']."'></td>";
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | 
            <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</body>
</html>
