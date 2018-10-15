<?php
 require_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lihat Data</title>
</head>
<body>
    <table border=1>
        <tr>
            <td><form action="lihatdata.php" method="POST">
                <input type="text" name="datamahasiswa">
                <input type="submit" value="search">
            </form>
            </td>
        </tr>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Aksi</th>
        </tr>
        <?php
            @$datamahasiswa = $_POST['datamahasiswa'];
            $sql = "SELECT nim, nama FROM mahasiswa WHERE nim LIKE '%$datamahasiswa%' OR nama LIKE '%$datamahasiswa%'";
            $result = mysqli_query($conn, $sql);
            while ($data=mysqli_fetch_assoc($result)) {
                ?>
            <tr>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['nim']; ?></td>
                <td><a href="hapus.php?nim=<?php echo $data['nim']; ?>">Hapus Data</a> | <a href="detail.php?nim=<?php echo $data['nim']?>">Detail</a></td>
            </tr>
            <?php
            }            
        ?>
    </table>
    <a href="input.php">Input data</a>
</body>
</html>