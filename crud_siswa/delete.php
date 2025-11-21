<?php
include 'config.php';
$nis = $_GET['nis'];
$conn->query("DELETE FROM siswa WHERE nis='$nis'");
header("Location: index.php");
?>
