<?php
include 'config.php';
$nis = $_GET['nis'];
$result = $conn->query("SELECT * FROM siswa WHERE nis='$nis'");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    
    $stmt = $conn->prepare("UPDATE siswa SET nama=?, kelas=?, alamat=?, tanggal_lahir=?, jenis_kelamin=?, email=?, jurusan=? WHERE nis=?");
    $stmt->bind_param("ssssssss", $nama, $kelas, $alamat, $tanggal_lahir, $jenis_kelamin, $email, $jurusan, $nis);
    $stmt->execute();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Siswa</h2>
        <form method="POST" onsubmit="return confirm('Yakin update data siswa ini?') && validateForm()">
            <div class="form-group">
                <label>NIS:</label>
                <input type="text" id="nis" name="nis" value="<?php echo $row['nis']; ?>" readonly required> <!-- NIS readonly karena primary key -->
            </div>
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Kelas:</label>
                <select name="kelas" required>
                    <option value="">Pilih Kelas</option>
                    <option value="X" <?php if ($row['kelas'] == 'X') echo 'selected'; ?>>X</option>
                    <option value="XI" <?php if ($row['kelas'] == 'XI') echo 'selected'; ?>>XI</option>
                    <option value="XII" <?php if ($row['kelas'] == 'XII') echo 'selected'; ?>>XII</option>
                </select>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" required><?php echo $row['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <select name="jenis_kelamin" required>
                    <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jurusan:</label>
                <select name="jurusan" required>
                    <option value="">Pilih Jurusan</option>
                    <option value="DKV" <?php if ($row['jurusan'] == 'DKV') echo 'selected'; ?>>DKV</option>
                    <option value="PPLG" <?php if ($row['jurusan'] == 'PPLG') echo 'selected'; ?>>PPLG</option>
                    <option value="TJKT" <?php if ($row['jurusan'] == 'TJKT') echo 'selected'; ?>>TJKT</option>
                    <option value="BD" <?php if ($row['jurusan'] == 'BD') echo 'selected'; ?>>BD</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>