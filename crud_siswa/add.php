<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    
    // Cek apakah nis sudah ada
    $check = $conn->query("SELECT nis FROM siswa WHERE nis='$nis'");
    if ($check->num_rows > 0) {
        echo "<script>alert('NIS sudah ada!'); window.location='add.php';</script>";
        exit;
    }
    
    $stmt = $conn->prepare("INSERT INTO siswa (nis, nama, kelas, alamat, tanggal_lahir, jenis_kelamin, email, jurusan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nis, $nama, $kelas, $alamat, $tanggal_lahir, $jenis_kelamin, $email, $jurusan);
    $stmt->execute();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Siswa</h2>
        <form method="POST" onsubmit="return confirm('Yakin simpan data siswa baru?') && validateForm()">
            <div class="form-group">
                <label>NIS:</label>
                <input type="text" id="nis" name="nis" required>
            </div>
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label>Kelas:</label>
                <select name="kelas" required>
                    <option value="">Pilih Kelas</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" required></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <select name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Jurusan:</label>
                <select name="jurusan" required>
                    <option value="">Pilih Jurusan</option>
                    <option value="DKV">DKV</option>
                    <option value="PPLG">PPLG</option>
                    <option value="TJKT">TJKT</option>
                    <option value="BD">BD</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>