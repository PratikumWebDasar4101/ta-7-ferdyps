<?php
    require_once("db.php");
    $nim = $_GET['nim'];
    $sql = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
    $row = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Data Mahasiswa</title>
</head>
<body>
    <form method="post">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo $row['nama'];?>"></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><input type="text" name="nim" pattern="\d*" maxlength="10" value="<?php echo $row['nim'];?>" readonly disabled></td>
        </tr>
        <tr>
            <td>Jenis kelamin</td>
            <td><input type="radio" name="jenis_kelamin" <?php if($row['jenis_kelamin'] == "Pria") { ?> checked <?php } ?>value="Pria">Pria</td>
            <td><input type="radio" name="jenis_kelamin" <?php if($row['jenis_kelamin'] == "Wanita") { ?> checked <?php } ?> value="Wanita">Wanita</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>
                <select name="prodi">
                    <option <?php if($row['prodi'] == "D3SI") { ?> checked <?php } ?> value="D3SI">D3 Sistem Informasi</option>
                    <option <?php if($row['prodi'] == "D3SIA") { ?> checked <?php } ?> value="D3SIA">D3 Sistem Informasi Akuntansi</option>
                    <option <?php if($row['prodi'] == "D3RKPLA") { ?> checked <?php } ?> value="D3RKPLA">D3 RKPLA</option>
                    <option <?php if($row['prodi'] == "D3SM") { ?> checked <?php } ?> value="D3SM">D4 Sistem Multimedia</option>
                    <option <?php if($row['prodi'] == "D3TK") { ?> checked <?php } ?> value="D3TK">D3 Teknologi komputer</option>
                    <option <?php if($row['prodi'] == "D3PH") { ?> checked <?php } ?> value="D3PH">D3 Perhotelan</option>
                    <option <?php if($row['prodi'] == "D3MP") { ?> checked <?php } ?> value="D3MP">D3 Manajemen pemasaran</option>
                    <option <?php if($row['prodi'] == "D3TT") { ?> checked <?php } ?> value="D3TT">D3 Teknik Telekomunikasi</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td>
                <select name="fakultas">
                    <option <?php if($row['fakultas'] == "FIT") { ?> selected <?php } ?> value="FIT">FIT</option>
                    <option <?php if($row['fakultas'] == "FEB") { ?> selected <?php } ?> value="FEB">FEB</option>
                    <option <?php if($row['fakultas'] == "FIK") { ?> selected <?php } ?> value="FIK">FIK</option>
                    <option <?php if($row['fakultas'] == "FTE") { ?> selected <?php } ?> value="FTE">FTE</option>
                    <option <?php if($row['fakultas'] == "FIF") { ?> selected <?php } ?> value="FIF">FIF</option>
                    <option <?php if($row['fakultas'] == "FRI") { ?> selected <?php } ?> value="FRI">FRI</option>
                    <option <?php if($row['fakultas'] == "FKB") { ?> selected <?php } ?> value="FKB">FKB</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Asal</td>
            <td><input type="text" name="asal" value="<?php echo $row['asal'];?>"></td>
        </tr>
        <tr>
            <td>Moto Hidup</td>
            <td><textarea name="moto" cols="30" rows="10"><?php echo $row['moto'];?></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
        </table>
    </form>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $jk = $_POST['jenis_kelamin'];
            $prodi = $_POST['prodi'];
            $fakultas = $_POST['fakultas'];
            $asal = $_POST['asal'];
            $moto = $_POST['moto'];

            $sql = "UPDATE mahasiswa SET nama='$nama', jenis_kelamin='$jk',prodi='$prodi',fakultas='$fakultas',asal='$asal',moto='$moto' WHERE nim='$nim'";

            if (mysqli_query($conn,$sql)) {
                ?>
                <script>
                    alert("Data berhasil diubah");
                    location = "lihatdata.php";
                </script>
            <?php
            }
        }
?>